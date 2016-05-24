<?php

class BenefitsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['page_title'] = 'FDC-INC.COM | Benefits';
        $data['page_header_title'] = 'Benefits';
        $this->load->view('user/header/header-link', $data);
        $this->load->view('user/header/header-menu');
        $this->load->view('user/contents/benefits');
        $this->load->view('user/footer/footer');
    }
    
}