<?php

class CareersController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index() {
        $data['page_title'] = 'FDC-INC.COM | Careers';
        $data['page_header_title'] = 'Our Recruitment';
        $this->load->view('user/header/header-link', $data);
        $this->load->view('user/header/header-menu');
        $this->load->view('user/contents/careers');
        $this->load->view('user/footer/footer');
    }
    
}