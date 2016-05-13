<?php


class GalleriesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['page_title'] = 'FDC-INC.COM | Galleries';
        $data['page_header_title'] = 'Galleries';
        $this->load->view('user/header/header-link', $data);
        $this->load->view('user/header/header-menu');
        $this->load->view('user/contents/galleries');
        $this->load->view('user/footer/footer');
    }
    
}