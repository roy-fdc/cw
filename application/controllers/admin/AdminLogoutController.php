<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogoutController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $save_to_logout = array(
            'admin_flag' => 0,
            'admin_lastlogout' => date('Y-m-d H:i:s')
        );
        $id = $this->session->userdata('ADMIN_LOGIN_ID');
        $this->load->model('AdminUser');
        $logout = $this->AdminUser->save_login_logout($id, $save_to_logout);
        if ($logout['saved']) {
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect(base_url().'admin');
            exit();
        } else {
            redirect(base_url().'admin/AdminLogoutController');
            exit();
        }
    }
}
