<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {
	public function index()
	{
	$this->load->view('user/header/head');
        $this->load->view('user/content/home');
        $this->load->view('user/content/about');
        $this->load->view('user/content/galleries');
        $this->load->view('user/content/benefits');
        $this->load->view('user/content/career');
        $this->load->view('user/content/contact');
      	$this->load->view('user/footer/footer');
	}
        
}
