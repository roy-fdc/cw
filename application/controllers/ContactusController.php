<?php

defined('BASEPATH') OR exit('No direct script access allowed');

ini_set("display_errors",1);
error_reporting(E_ALL);

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
       
        if (!empty($_FILES['attachment']['name'])) {
            $this->load->library('upload');
            $config['upload_path'] = 'images/attachment/';
            //$config['allowed_types'] = 'doc|docx|pdf|odt|rt';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('attachment')) {
                 $error = array('error' => $this->upload->display_errors());
                 var_dump($error);
            } 
            $data = array('upload_data' => $this->upload->data());
        }    
        //send Email
        
        $this->load->library('email');
        $conf['charset'] = "utf-8";
        $conf['mailtype'] = "text";
        $conf['newline'] = "\r\n";
        $conf['crlf'] = "\r\n";


        $this->email->initialize($conf);
        $to = 'fdcgrace@gmail.com';
        $this->email->from($_POST['email'], $_POST['name']);
        $this->email->to('fdcgrace@gmail.com');

        $this->email->subject($_POST['subject']);
        if(isset($data)){
            $this->email->attach($data['upload_data']['full_path']);    
        }
        $content = "Name: ".$_POST['name']."\r\n".
                   "Email: ".$_POST['email']."\r\n".
                   "Phone: ".$_POST['phone']."\r\n\r\n".$_POST['message'];


        $this->email->message($content);
        if($this->email->send()){
            if(isset($data)){
                unlink($data['upload_data']['full_path']);
            }

            echo "Email successfully sent.";
        }  else{
            echo "Error in sending email.";
        }
    }
    
}
