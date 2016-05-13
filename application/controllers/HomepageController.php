<?php

class HomepageController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['page_title'] = 'FDC-INC.COM | Homepage';
        $this->load->view('user/header/header-link', $data);
        $this->load->view('user/header/header-menu');
        $this->load->view('user/contents/homepage');
        $this->load->view('user/footer/footer');
    }
}
