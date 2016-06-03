<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->title = 'Admin-users';
        $this->pageHeader = 'User';
        $this->load->model('AdminUser');
        $this->load->library('Alert');
        $this->adminInfo = $this->AdminUser->get_info($this->session_data['ADMIN_LOGIN_ID']);
    }
    
    /*
     * admin user settings
     * @params : 
     * @return : void
     */
    public function settings() {
        $data = array(
            'pagetitle' => $this->title,
            'page_header' => $this->pageHeader,
            'account' => $this->adminInfo
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/settings-admin-user');
        $this->load->view('admin/modal/change-password-modal');
        $this->load->view('admin/modal/change-profile-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin user settings exec
     * @params :
     * @return : void
     */
    public function setting_exec() {
        // validation in array form
        $validate = array(
            array(
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[5]|max_length[25]'
            )
        );
        // run validation
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->settings();
        } else {
            // sanitize data input
            $firstname = trim($this->input->post('firstname'));
            $lastname = trim($this->input->post('lastname'));
            $username = $this->input->post('username');
            $id = $this->session_data['ADMIN_LOGIN_ID'];
            $token = $this->session_data['ADMIN_LOGIN_TOKEN'];
            // check username exist
            $check_username = $this->AdminUser->check_username($id, $username);
            if ($check_username['exist']) {
                $this->session->set_flashdata('error', $this->alert->show('Username is already exist', 0));
            } else {
                // prepare data to update
                $prepare_data = array(
                    'admin_firstname' => $firstname,
                    'admin_lastname' => $lastname,
                    'admin_username' => $username
                );
                $response = $this->AdminUser->update($id, $token, $prepare_data);
                if (!$response['updated']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot update your account!', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Account update success!', 1));
                }
            }
            redirect(base_url().'admin/admin-settings');
            exit();
        }
    } 
    
    /*
     * Add admin user
     * @params :
     * @return : void
     */
    public function add() {
        $data = array(
            'pagetitle' => $this->title,
            'page_header' => $this->pageHeader,
            'account' => $this->adminInfo
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/add-admin-user');
        $this->load->view('admin/modal/change-profile-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * Add admin exec
     * @params :
     * @return : void
     */
    public function add_exec() {
        // validation in array form
        $validate = array(
            array(
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[admin_users.admin_username]|min_length[5]|max_length[25]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[7]'
            ),
            array(
                'field' => 'password_confirm',
                'label' => 'Password Confirm',
                'rules' => 'required|matches[password]'
            )
        );
        // run validation
        $this->form_validation->set_rules($validate);
        if($this->form_validation->run() == false) {
            $this->add();
        } else {
            // prepare data
            $prepared_data = array(
                'admin_firstname' => trim($this->input->post('firstname')),
                'admin_lastname' => trim($this->input->post('lastname')),
                'admin_username' => trim($this->input->post('username')),
                'admin_password' => crypt(trim($this->input->post('password'))),
                'created' => date('Y-m-d H:i:s')
            );
            $register = $this->AdminUser->register($prepared_data);
            if ($register['added']) {
                $this->session->set_flashdata('success', 'Admin user add success.');
                redirect(base_url().'admin/admin-user-view');
                exit();
            } else {
                $this->session->set_flashdata('error', 'Cannot add admin user.');
                redirect(base_url().'admin/admin-user-add');
                exit();
            }
        }
    }
    
    /*
     * View Admin Users list
     * @params : 
     * @return : void
     */
    public function view() {
        $allAdmin = $this->AdminUser->get_all();
        $data = array(
            'pagetitle' => $this->title,
            'page_header' => $this->pageHeader,
            'allAdminUser' => $this->table($allAdmin),
            'account' => $this->adminInfo
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/view-admin-user');
        $this->load->view('admin/modal/change-profile-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin user table
     * @params : $all_admin (object)
     * @return : String
     */
    private function table($all_admin) {
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-bordered">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('No', 'Firstname', 'Lastname', 'Last login', 'Last logout');
        $counter = 1;
        foreach ($all_admin as $row) {
            $to_row = array(
                $counter++,
                ucwords(strtolower($row->admin_firstname)),
                ucwords(strtolower($row->admin_lastname)),
                ($row->admin_lastlogin) ? $row->admin_lastlogin : '........',
                ($row->admin_lastlogout) ? $row->admin_lastlogout : '........'
            );
            $this->table->add_row($to_row);
        }
        return $this->table->generate();
    }
    
    
    /*
     * change user profile
     * @params : 
     * @return : $response (array)
     */
    public function change_profile() {
        $id = $this->session_data['ADMIN_LOGIN_ID'];
        $token = $this->session_data['ADMIN_LOGIN_TOKEN'];
        // sanitize image 
        $profile = $_FILES['profile_image'];
        if (empty($profile['name'])) {
            $reponse['error'] = 'Please select profile image!';
        } else {
            // get old image used to delete if new file is upload successful.
            $old_profile = $this->AdminUser->get_old_profile($id);
            if (!$old_profile['had_profile']) {
                $response['error'] = 'Error in uploading profile image!';
            } else {
                // udpate profile name in database
                $update_profile = $this->AdminUser->update_profile($id, $token, $profile['name']);
                if (!$update_profile['udpated']) {
                    $reponse['error'] = 'Cannot update profile image!';
                } else {
                    if ($old_profile['image_profile']->admin_image && !empty($old_profile['image_profile']->admin_image)) {
                        // check old file if exist 
                        if (file_exists('images/users/'.$old_profile['image_profile']->admin_image)) {
                            // remove old profile
                            unlink('images/users/'.$old_profile['image_profile']->admin_image);
                        }
                        // updload new profile
                        move_uploaded_file($profile['tmp_name'], 'images/users/'.$profile['name']);
                    }
                    $this->session->set_flashdata('success_profile_update', $this->alert->show('Profile image update success!', 1));
                }
            }
        }
        echo $response['error'];
    }
    
    /*
     * change password
     * @params :
     * @return : $response (JSON)
     */
    public function change_password_exec() {
        // sanitize password input 
        $new_password = $this->input->post('newPassword');
        $new_password_conf = $this->input->post('newPasswordConf');
        $old_password = $this->input->post('oldPassword');
        // validate password
        if (empty($new_password)) {
            $response['error'] = 'The New Password field is required!';
        } else if (strlen($new_password) < 7){
            $response['error'] = 'The New Password field must be at least 7 characters in length!';
        } else if (empty ($new_password_conf)) {
            $response['error'] = 'The Confirm Password field is required!';
        } else if ($new_password != $new_password_conf) {
            $response['error'] = 'Password confirm not match! ';
        } else if (empty ($old_password)) {
            $response['error'] = 'The Old Password field is required!';
        } else {
            $id = $this->session_data['ADMIN_LOGIN_ID'];
            $token = $this->session_data['ADMIN_LOGIN_TOKEN'];
            // get old password in database
            $checkPassword = $this->AdminUser->get_password($id, $token, $old_password);
            if (!$checkPassword['correct']) {
                $response['error'] = 'Error in changing password!';
            } else {
                $current_password = $checkPassword['password']->admin_password;
                // compare the old password inputed and in database
                if (!hash_equals($current_password, crypt($old_password, $current_password))) {
                    $response['error'] = 'In correct Old passwrod';
                } else {
                    // if comparison is true construct array to udpate new password
                    $prepare_data = array(
                        'admin_password' => crypt(trim($new_password)),
                        'modified' => date('Y-m-d H:i:s')
                    );
                    //call to update
                    $update = $this->AdminUser->update_password($id, $token, $prepare_data);
                    if (!$update['updated']) {
                        $response['error'] = 'Cannot update your acount!';
                    } else {
                        $response['success'] = 'Change password success!';
                    }
                }
            }
            
        }
        echo json_encode($response);
    }

}
