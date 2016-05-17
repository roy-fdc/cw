<?php

class AdminBenefitsController extends CI_Controller {
		public function __construct() {
	        parent::__construct();
	        $this->session_data = $this->session->userdata('logged_in');
	        $this->load->model('Benefit');
	    }

	    public function index() {
	    	if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
	            $data['pagetitle'] = 'Admin-benefits';
	            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
	            $this->load->view('admin/header/head', $data);
	            $this->load->view('admin/header/header-bar');
	            $this->load->view('admin/header/menu-bar');
	            $this->load->view('admin/contents/add-benefits');
	            $this->load->view('admin/footer/footer');
	        } else {
	            redirect(base_url().'admin');
	        }
	    }

	    public function view(){
	        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
	            $data['pagetitle'] = 'Admin-benefits';
	            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
	            $data['all_benefits'] = $this->Benefit->get_all();
	            $this->load->view('admin/header/head', $data);
	            $this->load->view('admin/header/header-bar');
	            $this->load->view('admin/header/menu-bar');
	            $this->load->view('admin/contents/benefits');
	            $this->load->view('admin/footer/footer');
	        } else {
	            redirect(base_url().'admin');
	        }
	    }
	    
	    public function edit($id) {
	        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
	            $data['pagetitle'] = 'Admin-benefits';
	            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
	            $data['benefits'] = $this->Benefit->single($id);
	            $this->load->view('admin/header/head', $data);
	            $this->load->view('admin/header/header-bar');
	            $this->load->view('admin/header/menu-bar');
	            $this->load->view('admin/contents/edit-benefits');
	            $this->load->view('admin/footer/footer');
	        } else {
	            redirect(base_url().'admin');
	        }
	    }

	    public function add_exec() {  
	        $validate = array(
	            array(
	                'field' => 'benefit_title',
	                'label' => 'Title',
	                'rules' => 'required' 
	            ),
	            array(
	                'field' => 'details',
	                'label' => 'Details',
	                'rules' => 'required'
	            ),
	            array(
	                'field' => 'benefit_image',
	                'label' => 'Image',
	                'rules' => 'callback_handle_upload'
	            )
	        );
	        
	        $config['upload_path'] = 'image/benefits';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $this->load->library('upload', $config);
	        $this->form_validation->set_rules($validate);
	        if  ($this->form_validation->run() == false) {
	            $this->index();
	        } else {
	            $to_save = array(
	                'benefit_title' => $this->input->post('benefit_title'),
	                'benefit_detail' => $this->input->post('details'),
	                'benefit_image' => $this->input->post('image'),
	                'created' => date('Y-m-d H:i:s'),
	                'modified' => date('Y-m-d H:i:s')
	            );
	            $this->load->library('alert');
	            $response = $this->Benefit->insert($to_save);
	            if (!$response['added']) {
	                $this->session->set_flashdata('error', $this->alert->show('Cannot add benefit.', 0));
	                redirect(base_url().'admin/admin-add-benefit');
	                exit();
	            } else {
	                $this->session->set_flashdata('success', $this->alert->show('Add Success!' , 1));
	                redirect(base_url().'admin/admin-add-benefit');
	                exit();
	            }
	        }
	    }
	    
	    function handle_upload() {
	        if (isset($_FILES['benefit_image']) && !empty($_FILES['benefit_image']['name'])) {
	            if ($this->upload->do_upload('benefit_image')) {
	                // set a $_POST value for 'image' that we can use later
	                $upload_data    = $this->upload->data();
	                $_POST['image'] = $upload_data['file_name'];
	                return true;
	            } else {
	                // possibly do some clean up ... then throw an error
	                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
	                return false;
	            }
	        } else {
	          // throw an error because nothing was uploaded
	          $this->form_validation->set_message('handle_upload', "You must upload an image!");
	          return false;
	        }
	    }
}
?>
