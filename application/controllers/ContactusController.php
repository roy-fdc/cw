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

    public function processMail(){
        var_dump($_POST);

        $this->load->library('email');

        $this->email->from($_POST['email'], $_POST['name']);
        $this->email->to('fdcgrace@gmail.com');  

        $this->email->subject($_POST['subject']);
        $this->email->message($_POST['message']);  

        $this->email->send();

        echo $this->email->print_debugger();
    }
    
}
