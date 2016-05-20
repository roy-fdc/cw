<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->title = 'Admin-users';
        $this->pageHeader = 'User';
        $this->load->model('AdminUser');
    }
    
    public function add() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
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
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function add_exec() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
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
                    'admin_password' => password_hash(trim($this->input->post('password')), PASSWORD_BCRYPT),
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
        } else {
            redirect(base_url().'admin');
        }
    }
    
    
    public function view() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
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
        } else {
            redirect(base_url().'admin');
        }
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
