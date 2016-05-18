<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLoginController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->invalid_account = 'Invalid login username / password.';
    }
    
    public function index() {
        $this->load->view('admin/header/head');
        $this->load->view('admin/contents/admin-login');
        $this->load->view('admin/footer/login-footer');
    }
    
    public function login_exec() {
        $validate = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('AdminUser');
            $login_result = $this->AdminUser->login($username);
            if (!$login_result['correct']) {
                $this->session->set_flashdata('error', $this->invalid_account);
                redirect(base_url() . 'admin');
                exit();
            } else {
                if (!password_verify($password, $login_result['hash'])) {
                    $this->session->set_flashdata('error', $this->invalid_account);
                    redirect(base_url() . 'admin');
                    exit();
                } else {
                    $this->load->library('generate');
                    $admin_token = $this->generate->getString(88);
                    $admin_login_time = date('Y-m-d H:i:s');
                    $prepare_data = array(
                        'admin_token' => $admin_token,
                        'admin_flag' => 1,
                        'admin_lastlogin' => $admin_login_time
                    );
                    $login_save_result = $this->AdminUser->save_login_logout($login_result['id'], $prepare_data);
                    if (!$login_save_result['saved']) {
                        $this->session->set_flashdata('error', 'Cannot login your account.');
                        redirect(base_url() . 'admin');
                        exit();
                    } else {
                        $ready_to_session = array(
                            'ADMIN_LOGIN_STATUS' => true,
                            'ADMIN_LOGIN_TOKEN' => $admin_token,
                            'ADMIN_LOGIN_ID' => $login_result['id'],
                            'ADMIN_USERNAME' => $login_result['username']
                        );
                        $this->session->set_userdata('logged_in', $ready_to_session);
                        redirect(base_url().'admin/homepage');
                        exit();
                    }
                }
            }
        }
    }
    
}
