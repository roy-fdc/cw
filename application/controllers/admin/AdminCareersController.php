<?php

class AdminCareersController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->library('alert');
        $this->load->model('Career');
    }
    
    public function index() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data['pagetitle'] = 'Admin-careers';
            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/add-careers');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function add_exec() {  
        $validate = array(
            array(
                'field' => 'career_title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'career_description',
                'label' => 'Descriptions',
                'rules' => 'required'
            ),
            array(
                'field' => 'details',
                'label' => 'Details',
                'rules' => 'required'
            ),
            array(
                'field' => 'career_image',
                'label' => 'Image',
                'rules' => 'callback_handle_upload'
            )
        );
        $config['upload_path'] = 'image/careers';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules($validate);
        if  ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $to_save = array(
                'career_title' => $this->input->post('career_title'),
                'career_description' => $this->input->post('career_description'),
                'career_detail' => $this->input->post('details'),
            );
            
            // add save array index
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $to_save['career_modified'] = date('Y-m-d H:i:s');
                if ($this->input->post('image') != '') {
                    $to_save['career_image'] = $this->input->post('image');
                }
                $action = $this->input->post('id');
            } else {
                $to_save['career_image'] = $this->input->post('image');
                $to_save['career_created'] = date('Y-m-d H:i:s');
                $action = 'add';
            }
            
            $response = $this->add_edit($to_save, $action);
            $ident = ($response['status'] == 0) ? 'error' : 'success';
            $this->session->set_flashdata($ident, $this->alert->show($response['message'], $response['status']));
            redirect(base_url().'admin/'.$response['link']);
        }
    }
    
    public function add_edit($to_save, $action) {
        if ($action == 'add') {
            $add = $this->Career->insert($to_save);
            if (!$add['added']) {
                $message['message'] = 'Cannot add career.';
                $message['status'] = 0;
            } else {
                $message['message'] = 'Add Success!';
                $message['status'] = 1;
            }
            $message['link'] = 'admin-add-career';
        } else {
            $update = $this->Career->update($to_save, $action);
            if (!$update['updated']) {
                $message['message'] = 'Cannot update career';
                $message['status'] = 0;
            } else {
                $message['message'] = 'Update Success!';
                $message['status'] = 1;
            }
            $message['link'] = 'admin-edit-career/'.$action;
        }
        return $message;
    }
    
    function handle_upload() {
        if (isset($_FILES['career_image']) && !empty($_FILES['career_image']['name'])) {
            if ($this->upload->do_upload('career_image')) {
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
            $data['pagetitle'] = 'Admin-careers';
            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
            $data['all_careers'] = $this->Career->get_all();
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/view-careers');
            $this->load->view('admin/modal/disable-career-modal');
            $this->load->view('admin/modal/delete-career-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function edit($id) {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $data['pagetitle'] = 'Admin-careers';
            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
            $data['career'] = $this->Career->single($id);
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/edit-careers');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('career_id');
        $status = $this->input->post('career_status');
        $career_status = ($status == 0) ? 1 : 0;
        $response = $this->Career->change_status($id, $career_status);
        if (!$response['changed']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot change career status', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Success change status.', 1));
        }
        redirect(base_url().'admin/admin-view-career');
        exit();
    }
    
    public function delete() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('career_id');
            $response = $this->Career->delete($id);
            if (!$response['deleted']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot delete career', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Succecss delete!', 1));
            }
            redirect(base_url().'admin/admin-view-career');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
}