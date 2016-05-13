<?php


class AboutusController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['page_title'] = 'FDC-INC.COM | About Us';
        $data['page_header_title'] = 'About';
        $this->load->view('user/contents/about-us', $data);
    }
    
}
