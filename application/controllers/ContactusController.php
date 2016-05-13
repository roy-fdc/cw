<?php



class ContactusController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['page_title'] = 'FDC-INC.COM | Contact Us';
        $data['page_header_title'] = 'Feel Free to Connect with Us';
        $this->load->view('user/header/header-link', $data);
        $this->load->view('user/header/header-menu');
        $this->load->view('user/contents/contact-us');
        $this->load->view('user/footer/footer');
    }
    
}
