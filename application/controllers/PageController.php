<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {
	public function index(){
	$this->load->view('user/header/header.php');
        $this->load->view('user/contents/menu_bar.php');
        $this->load->view('user/contents/main_slider.php');
        $this->load->view('user/contents/about.php');
        $this->load->view('user/contents/benefits.php');
        $this->load->view('user/contents/gallery.php');
        $this->load->view('user/contents/career.php');
        $this->load->view('user/contents/contact.php');
        $this->load->view('user/footer/footer_link.php');
        $this->load->view('user/footer/footer_script.php');
	}
        
}
