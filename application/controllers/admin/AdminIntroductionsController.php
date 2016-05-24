<?php

class AdminIntroductionsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('Introduction');
        $this->load->library('Alert');
    }
    
    public function index() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $intro = $this->Introduction->getAll();
            $data = array(
                'pagetitle' => 'Admin- Page Introduction',
                'page_header' => 'Page Introduction',
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'action_status_link' => 'admin-introduction-status',
                'page_introduction' => $this->introduction_table($intro)
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/page-introduction');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/modal/update-introduction-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    private function introduction_table($introductions) {
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-bordered table-hovered">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('No', 'Name', 'Introduction', 'Modified', 'Action');
        $counter = 1;
        foreach ($introductions as $row) {
            $btn_text = ($row->status == 0) ? 'Enable' : 'Disable';
            $btn_class = ($row->status == 0) ? 'success' : 'warning';
            $update_button = '<a onclick="update_introduction('.$row->id.', \''.$row->name.'\', \''.$row->description.'\')" class="btn btn-primary">Update</a>';
            $status_button = '<a onclick="change_status('.$row->id.', '.$row->status.')" class="btn btn-'.$btn_class.'">'.$btn_text.'</a>';
            $to_row = array(
                $counter++,
                strtoupper($row->name),
                $row->description,
                ($row->modified) ? $row->modified : '........',
                $update_button.' '.$status_button
            );
            $this->table->add_row($to_row);
        }
        return $this->table->generate();
    }
    
    public function update_exec() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $name = trim($this->input->post('name'));
            $introduction = trim($this->input->post('introduction'));
            $to_save = array(
                'name' => $name,
                'description' => $introduction
            );
            $response = $this->Introduction->update($id, $to_save);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update introduction!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Introduction update success!', 1));
            }
            redirect(base_url().'admin/admin-introduction');
            exit();
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
            $response = $this->Introduction->change_status($id, $status);
            if (!$response['changed']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot change introduction status!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Status change success!', 1));
            }
            redirect(base_url().'admin/admin-introduction');
            exit();
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
}