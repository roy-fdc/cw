<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHomepageController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
    }
    
    /*
     * Admin dashboard
     * @params :
     * @return : void     
     */
    public function index() {
        $data['pagetitle'] = 'Admin-hompage';
        $data['page_header'] = 'Dashboard';
        $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/homepage');
        $this->load->view('admin/footer/footer');
    }
}
