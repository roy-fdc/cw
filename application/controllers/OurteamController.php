<?php


class OurteamController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data['page_title'] = 'FDC-INC.COM | Our Team';
        $data['page_header_title'] = 'Our Team';
        $this->load->view('user/header/header-link', $data);
        $this->load->view('user/header/header-menu');
        $this->load->view('user/contents/our-team');
        $this->load->view('user/footer/footer');
    }
    
}
