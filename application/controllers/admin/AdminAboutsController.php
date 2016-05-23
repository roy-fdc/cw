<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAboutsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('About');
        $this->load->library('Alert');
        $this->title = 'Admin - about company';
        $this->pageHeader = 'About the company';
    }
    
    public function index() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $segment = $this->uri->segment(3);
            if ($segment == 'about') 
                $state = 1;
            if ($segment == 'mission') 
                $state = 2;
            if ($segment == 'vision') 
                $state = 3;
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'page_header' => $this->pageHeader,
                'about' => $this->About->get_description($state),
                'action_status_link' => 'admin-status-about',
                'panel_title' => $segment
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/view-company-about');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    public function edit($id) {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data = array(
                'pagetitle' => $this->title,
                'page_header' => $this->pageHeader,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'about' => $this->About->get_description($id)
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/edit-company-detail');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    public function edit_exec(){
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $validate = array(
                array(
                    'field' => 'details',
                    'label' => 'Description',
                    'rules' => 'required'
                )
            );
            $id = $this->input->post('id');
            $description = $this->input->post('details');
            $this->form_validation->set_rules($validate);
            if ($this->form_validation->run() == false) {
                $this->edit($id);
            } else {
                $response = $this->About->update($id, $description);
                if (!$response['updated']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot update.', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Update success.', 1));
                }
                redirect(base_url().'admin/admin-company-edit/'.$id);
                exit();
            }
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    public function change_status() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $status = ($status == 0) ? 1 : 0;
            $response = $this->About->change_status($id, $status);
            if (!$response['changed']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot change status!.', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Status change success!.', 1));
            }
            if ($id == 1) $uri = 'about';
            if ($id == 2) $uri = 'mission';
            if ($id == 3) $uri = 'vision';
            redirect(base_url().'admin/admin-company/'.$uri);
            exit();
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
}