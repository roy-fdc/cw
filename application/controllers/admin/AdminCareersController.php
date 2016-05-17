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
            $data['page_header'] = 'Admin Careers';
            $data['form'] = array(
                'title' => true,
                'action' => 'admin-add-career-exec',
                'detail' => true
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            //$this->load->view('admin/contents/add-careers');
            $this->load->view('admin/contents/form-content');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function add_exec() {  
        $config['upload_path'] = 'image/careers';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $to_save = array(
                'career_title' => $this->input->post('title'),
                'career_description' => $this->input->post('description'),
                'career_detail' => $this->input->post('details'),
                'career_image' => $this->input->post('image'),
                'career_created' => date('Y-m-d H:i:s')
            );
            $response = $this->Career->insert($to_save);
            if (!$response['added']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot add career.', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Add success', 1));
            }
            redirect(base_url().'admin/admin-add-career');
            exit();
        }
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
            $data['pagetitle'] = 'Admin-careers';
            $data['username_admin_account']  = $this->session_data['ADMIN_USERNAME'];
            $data['all_careers'] = $this->Career->get_all();
            $data['action_status_link'] = 'admin-status-career';
            $data['action_delete_link'] = 'admin-delete-career';
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/view-careers');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/modal/delete-modal');
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
    
    public function edit_exec(){
        $config['upload_path'] = 'image/teams';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->edit($_POST['id']);
        } else {
            $to_update = array(
                'career_title' => $this->input->post('title'),
                'career_description' => $this->input->post('description'),
                'career_detail' => $this->input->post('details'),
                'career_modified' => date('Y-m-d H:i:s')
            );
            $id = $this->input->post('id');
            if ($_POST['image'] != ''){
                $to_update['career_image'] = $_POST['image'];
            }
            $response = $this->Career->update($to_update, $id);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update team', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Update success', 1));
            }
            redirect(base_url().'admin/admin-edit-career/'.$id);
            exit();
        }
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
                'label' => 'Descriptions',
                'rules' => 'required'
            ),
            array(
                'field' => 'details',
                'label' => 'Details',
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
    
    public function change_status(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status == 0) ? 1 : 0;
        $response = $this->Career->change_status($id, $status);
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
            $id = $this->input->post('id');
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