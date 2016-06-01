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
    }
    
    public function settings() {
        $response = $this->AdminUser->get_my_info($this->session_data['ADMIN_LOGIN_ID']);
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader,
            'admin_info' => $response['account_info']
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/settings-admin-user');
        $this->load->view('admin/footer/footer');
    }
    
    public function setting_exec() {
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
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->settings();
        } else {
            $firstname = trim($this->input->post('firstname'));
            $lastname = trim($this->input->post('lastname'));
            $username = $this->input->post('username');
            $id = $this->session_data['ADMIN_LOGIN_ID'];
            $token = $this->session_data['ADMIN_LOGIN_TOKEN'];
            $check_username = $this->AdminUser->check_username($id, $username);
            if ($check_username['exist']) {
                $this->session->set_flashdata('error', $this->alert->show('Username is already exist', 0));
            } else {
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
    
    public function add() {
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/add-admin-user');
        $this->load->view('admin/footer/footer');
    }
    
    public function add_exec() {
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
        $this->form_validation->set_rules($validate);
        if($this->form_validation->run() == false) {
            $this->add();
        } else {
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
    
    
    public function view() {
        $allAdmin = $this->AdminUser->get_all();
        $data = array(
            'all_admin' => $this->AdminUser->get_all(),
            'pagetitle' => $this->title,
            'page_header' => $this->pageHeader,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'allAdminUser' => $this->table($allAdmin)
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/view-admin-user');
        $this->load->view('admin/footer/footer');
    }
    
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
                $row->admin_firstname,
                $row->admin_lastname,
                ($row->admin_lastlogin) ? $row->admin_lastlogin : '........',
                ($row->admin_lastlogout) ? $row->admin_lastlogout : '........'
            );
            $this->table->add_row($to_row);
        }
        return $this->table->generate();
    }

}
