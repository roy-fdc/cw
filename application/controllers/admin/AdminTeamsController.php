<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTeamsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('Team');
        $this->load->library('alert');
        $this->title = 'Admin-teams';
        $this->pageHeader = 'Teams';
    }
    
    public function index() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'page_header' => $this->pageHeader,
                'form' => array(
                    'name' => true,
                    'position' => true,
                    'action' => 'admin-add-team-exec'
                )
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/form-content');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    public function add_exec() { 
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $this->load->library('upload', $this->file_validation());
            $this->form_validation->set_rules($this->validation());
            if  ($this->form_validation->run() == false) {
                $this->index();
            } else {
                $to_save = array(
                    'team_name' => $this->input->post('name'),
                    'team_position' => $this->input->post('position'),
                    'team_description' => $this->input->post('description'),
                    'team_image' => $this->input->post('image'),
                    'created' => date('Y-m-d H:i:s'),
                );
                $response = $this->Team->insert($to_save);
                if (!$response['created']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot add Team', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Add success', 1));
                }
                redirect(base_url().'admin/admin-add-team');
                exit();
            }
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    
    public function edit_exec() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $this->load->library('upload', $this->file_validation());
            $this->form_validation->set_rules($this->validation());
            if  ($this->form_validation->run() == false) {
                $this->edit($_POST['id']);
            } else {
                $to_update = array(
                    'team_name' => $this->input->post('name'),
                    'team_position' => $this->input->post('position'),
                    'team_description' => $this->input->post('description'),
                    'modified' => date('Y-m-d H:i:s')
                );
                $id = $this->input->post('id');
                if ($_POST['image'] != ''){
                    $to_update['team_image'] = $_POST['image'];
                }
                $response = $this->Team->update($to_update, $id);
                if (!$response['updated']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot update team', 0));
                } else {
                    if ($response['old_image_filename']) {
                        unlink('images/teams/'.$response['old_image_filename']);
                    }
                    $this->session->set_flashdata('success', $this->alert->show('Update success', 1));
                }
                redirect(base_url().'admin/admin-edit-team/'.$id);
                exit();
            }
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    private function validation() {
        $validate = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'position',
                'label' => 'Position',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'image',
                'label' => 'Image',
                'rules' => 'callback_handle_upload'
            )
        );
        return $validate;
    }
    
    private function file_validation(){
        $config['upload_path'] = 'images/teams';
        $config['allowed_types'] = 'gif|jpg|png';
        return $config;
    }
    
    
    function handle_upload() {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
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
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $_POST['image'] = '';
                return true;
            } else {
                // throw an error because nothing was uploaded
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return false;
            }
        }
    }
    
    
    public function view(){
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $teams = $this->Team->get_all();
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'all_teams' => $this->team_table($teams),
                'action_status_link' => 'admin-status-team',
                'action_delete_link' => 'admin-delete-team',
                'page_header' => $this->pageHeader,
                'item_name' => 'team'
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/view-teams');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/modal/delete-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    private function team_table($teams) {
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-bordered">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('No', 'Image', 'Name', 'Position', 'Description', 'Status', 'Action');
        $counter = 1;
        foreach($teams as $row) {
            $btn_text = ($row->team_status == 0) ? 'Enable' : 'Disable';
            $btn_type = ($row->team_status == 0) ? 'success' : 'warning';
            $update_btn = '<a href="'.base_url().'admin/admin-edit-team/'.$row->id.'" class="btn btn-primary">Update</a>';
            $change_status_btn = '<a onclick="change_status('.$row->id.', '.$row->team_status.')"  class="btn btn-'.$btn_type.'">'.$btn_text.'</a>';
            $delete_btn = '<a onclick="delete_item('.$row->id.')" class="btn btn-danger">Delete</a>';
            $to_row = array(
                $counter++,
                '<img src="'.base_url().'images/teams/'.$row->team_image.'" width="50" height="50"/>',
                $row->team_name,
                $row->team_position,
                $row->team_description,
                ($row->team_status == 1) ? 'Active' : '.........',
                $update_btn.' '.$change_status_btn.' '.$delete_btn
            );
            $this->table->add_row($to_row);
        }
        return $this->table->generate();
    }
    
    public function edit($id) {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'team' => $this->Team->single($id),
                'page_header' => $this->pageHeader
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/edit-teams');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    public function change_status(){
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $status = ($status == 0) ? 1 : 0;
            $response = $this->Team->change_status($id, $status);
            if (!$response['changed']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot change team status', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Success change status.', 1));
            }
            redirect(base_url().'admin/admin-view-team');
            exit();
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
    public function delete() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $response = $this->Team->delete($id);
            if (!$response['deleted']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot delete team', 0));
            } else {
                if ($response['old_image_filename']) {
                    unlink('images/teams/'.$response['old_image_filename']);
                }
                $this->session->set_flashdata('success', $this->alert->show('Success delete!', 1));
            }
            redirect(base_url().'admin/admin-view-team');
            exit();
        } else {
            redirect(base_url().'admin');
            exit();
        }
    }
    
}