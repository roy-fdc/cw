<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
    public function sample() {
        $this->load->view('user/header/head');
        $this->load->view('user/header/menu-bar');
        $this->load->view('user/content/home');
        $this->load->view('sample');
        $this->load->view('user/content/benefits');
        $this->load->view('user/content/career');
        $this->load->view('user/content/contact');
        //$this->load->view('user/content/about');
      	$this->load->view('user/footer/footer1');
    }
}
