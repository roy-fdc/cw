<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAboutValuesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('AboutValue');
        $this->load->library('Alert');
        $this->title = 'Admin-values';
        $this->pageHeader = 'Company values';
    }
    
    public function index(){
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'page_header' => $this->pageHeader,
                'form' => array(
                    'title' => true,
                    'action' => 'admin-add-value-exec'
                )
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/form-content');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
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
                    'value_title' => $this->input->post('title'),
                    'value_description' => $this->input->post('description'),
                    'value_image' => $this->input->post('image'),
                    'created' => date('Y-m-d H:i:s'),
                );
                $response = $this->AboutValue->insert($to_save);
                if (!$response['added']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot add Team', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Add success', 1));
                }
                redirect(base_url().'admin/admin-add-values');
                exit();
            }
        } else {
            redirect(base_url().'admin');
        }
    }
    
    private function file_validation() {
        $config['upload_path'] = 'image/values';
        $config['allowed_types'] = 'gif|jpg|png';
        return $config;
    }
    
    private function validation() {
        $validate = array(
            array(
                'field' => 'title',
                'label' => 'Title',
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
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'page_header' => $this->pageHeader,
                'all_values' => $this->AboutValue->get_all(),
                'action_status_link' => 'admin-status-value',
                'action_delete_link' => 'admin-delete_value',
                'item_name' => 'value'
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/view-values');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/modal/delete-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function edit($id) {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data = array(
                'pagetitle' => $this->title,
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'page_header' => $this->pageHeader,
                'value' => $this->AboutValue->single($id)
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/edit-values');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
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
                    'value_title' => $this->input->post('title'),
                    'value_description' => $this->input->post('description'),
                    'modified' => date('Y-m-d H:i:s')
                );
                $id = $this->input->post('id');
                if ($_POST['image'] != ''){
                    $to_update['value_image'] = $_POST['image'];
                }
                $response = $this->AboutValue->update($to_update, $id);
                if (!$response['updated']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot update benefit', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Update success', 1));
                }
                redirect(base_url().'admin/admin-edit-value/'.$id);
                exit();
            }
        } else {
            redirect(base_url().'admin');
        }
    }
    
   
    public function change_status(){
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $status = ($status == 0) ? 1 : 0;
            $response = $this->AboutValue->change_status($id, $status);
            if (!$response['changed']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot change benefit status', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Success change status.', 1));
            }
            redirect(base_url().'admin/admin-view-value');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    public function delete() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $response = $this->AboutValue->delete($id);
            if (!$response['deleted']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot delete benefit', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Succecss delete!', 1));
            }
            redirect(base_url().'admin/admin-view-value');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    
    
}