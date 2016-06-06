<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAboutsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->model('About');
        $this->load->model('AdminUser');
        $this->load->library('Alert');
        $this->title = 'Admin - about company';
        $this->pageHeader = 'About the company';
        $this->adminInfo = $this->AdminUser->get_info($this->session_data['ADMIN_LOGIN_ID']);
    }
    
    /*
     * admin/admin-company/{mission} - (view about infor for the site)
     * @params : 
     * @return : void
     */
    public function index() {
        // get url segment / check segment for url
        $segment = $this->uri->segment(3);
        if ($segment == 'about') 
            $state = 1;
        if ($segment == 'mission') 
            $state = 2;
        if ($segment == 'vision') 
            $state = 3;
        // construc  data for view in array form
        $data = array(
            'pagetitle' => $this->title,
            'page_header' => $this->pageHeader,
            'about' => $this->About->get_description($state),
            'action_status_link' => 'admin-status-about',
            'panel_title' => $segment,
            'account' => $this->adminInfo
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/view-company-about');
        $this->load->view('admin/modal/status-modal');
        $this->load->view('admin/modal/change-profile-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin/admin-company-edit/1 (Edit page for about the company)
     * @params : $id (int)
     * @return : void
     */
    public function edit($id) {
        //construct data for view in array form
        $data = array(
            'pagetitle' => $this->title,
            'page_header' => $this->pageHeader,
            'about' => $this->About->get_description($id),
            'account' => $this->adminInfo
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/edit-company-detail');
        $this->load->view('admin/modal/status-modal');
        $this->load->view('admin/modal/change-profile-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin/admin-company-edit-exec (Edit exec for about the company)
     * @params : 
     * @return : void
     */
    public function edit_exec(){
        // sanitize input data
        $id = $this->input->post('id');
        $description = $this->input->post('details');
        // initialize input validation in array form
        $validate = array(
            array(
                'field' => 'details',
                'label' => 'Description',
                'rules' => 'required'
            )
        );
        // run input validation
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->edit($id);
        } else {
            // call to update data
            $response = $this->About->update($id, $description);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update.', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Update success.', 1));
            }
            redirect(base_url().'admin/admin-company-edit/'.$id);
            exit();
        }
    }
    
    /*
     * admin/admin-status-about - (Change status for about the company)
     * @params :
     * @return : void
     */
    public function change_status() {
        // sanitize input data
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status == 0) ? 1 : 0;
        // call to update status
        $response = $this->About->change_status($id, $status);
        if (!$response['changed']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot change status!.', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Status change success!.', 1));
        }
        // get proper uri, used for return page
        if ($id == 1) $uri = 'about';
        if ($id == 2) $uri = 'mission';
        if ($id == 3) $uri = 'vision';
        redirect(base_url().'admin/admin-company/'.$uri);
        exit();
    }
}