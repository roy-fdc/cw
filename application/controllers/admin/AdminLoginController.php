<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLoginController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->invalid_account = 'Invalid login username / password.';
        $this->load->model('AdminUser');
    }
    
    /*
     * Admin Login page
     * @params : 
     * @return : void
     */
    public function index() {
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            $this->load->view('admin/header/head');
            $this->load->view('admin/contents/admin-login');
            $this->load->view('admin/footer/login-footer');
        } else {
            redirect(base_url().'admin/homepage');
            exit();
        }
    }
    
    /*
     * admin login exec
     * @params : 
     * @return : void
     */
    public function login_exec() {
        // construct validation in array
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
        // run validation 
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            // sanitize inputed data
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // check username - otherwise get password if username is correct
            $login_result = $this->AdminUser->login($username);
            if (!$login_result['correct']) {
                // return if invalid username
                $this->session->set_flashdata('error', $this->invalid_account);
                redirect(base_url() . 'admin');
                exit();
            } else {
                // initialize password account
                $hash_password = $login_result['hash'];    
                // compare / check input and account password
                if (!hash_equals($hash_password, crypt($password, $hash_password))) {
                    // return if invalid password
                    $this->session->set_flashdata('error', $this->invalid_account);
                    redirect(base_url() . 'admin');
                    exit();
                } else {
                    // generate token
                    $this->load->library('generate');
                    $admin_token = $this->generate->getString(88);
                    $admin_login_time = date('Y-m-d H:i:s');
                    // prepare for login log
                    $prepare_data = array(
                        'admin_token' => $admin_token,
                        'admin_flag' => 1,
                        'admin_lastlogin' => $admin_login_time
                    );
                    // save login log
                    $login_save_result = $this->AdminUser->save_login_logout($login_result['id'], $prepare_data);
                    if (!$login_save_result['saved']) {
                        // return if cannot save login log
                        $this->session->set_flashdata('error', 'Cannot login your account.');
                        redirect(base_url() . 'admin');
                        exit();
                    } else {
                        // prepare the session data in array (login true)
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
