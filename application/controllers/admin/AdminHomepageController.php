<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHomepageController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->model('AdminUser');
        $id = $this->session_data['ADMIN_LOGIN_ID'];
        $this->adminInfo = $this->AdminUser->get_info($id);
    }
    
    /*
     * Admin dashboard
     * @params :
     * @return : void     
     */
    public function index() {
        $data = array(
            'pagetitle' => 'Admin-hompage',
            'page_header' => 'Dashboard',
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'account' => $this->adminInfo
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/homepage');
        $this->load->view('admin/modal/change-profile-modal');
        $this->load->view('admin/footer/footer');
    }
}
