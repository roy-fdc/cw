<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAboutValuesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->model('AboutValue');
        $this->load->library('Alert');
        $this->title = 'Admin-values';
        $this->pageHeader = 'Company values';
    }
    
    /*
     * admin/admin-add-values
     * @params 
     * @return : void
     */
    public function index(){
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
        
    }
        
    /*
     * admin/admin-add-value-exec
     * @params
     * @return : void
     */
    public function add_exec() {
        $this->load->library('upload', $this->file_validation());
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->index();
        } else {
            // prepare to save data
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
    }
    
    /*
     * file validation config
     * @params :
     * @return : $config (array)
     */
    private function file_validation() {
        $config['upload_path'] = 'images/values';
        $config['allowed_types'] = 'gif|jpg|png';
        return $config;
    }
    
    /*
     * input validation of adding values
     * @params :
     * @return : $validate (array)
     */
    private function validation() {
        // construct input validation in array form
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
    
    /*
     * handle for image upload
     * @params :
     * @return : boolean
     */
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
    
    /*
     * admin/admin-view-value
     * @params : 
     * @return : void
     */
    public function view(){
        // construct data for view in array form
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
    }
    
    /*
     * admin/admin-edit-value/1 (view in page of single value to edit)
     * @params : $id (int)
     * @return : void
     */
    public function edit($id) {
        // construct data for view in array form
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
    }
    
    /*
     * admin/admin-edit-value-exec (edit exec for values)
     * @params :
     * @return : void
     */
    public function edit_exec() {
        // load the file validation
        $this->load->library('upload', $this->file_validation());
        // set the validation rules
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->edit($_POST['id']);
        } else {
            // construct data for update in array form
            $to_update = array(
                'value_title' => $this->input->post('title'),
                'value_description' => $this->input->post('description'),
                'modified' => date('Y-m-d H:i:s')
            );
            $id = $this->input->post('id');
            if ($_POST['image'] != ''){
                $to_update['value_image'] = $_POST['image'];
            }
            // do an update execution
            $response = $this->AboutValue->update($to_update, $id);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update benefit', 0));
            } else {
                if ($response['old_image_filename'] && !empty($_POST['image'])) {
                    if (file_exists('images/values/'.$response['old_image_filename'])) {
                        unlink('images/values/'.$response['old_image_filename']);
                    }
                }
                $this->session->set_flashdata('success', $this->alert->show('Update success', 1));
            }
            redirect(base_url().'admin/admin-edit-value/'.$id);
            exit();
        }
    }
    
   /*
    * admin/admin-status-value (change status exec. for single value)
    * @params :
    * @return : void
    */
    public function change_status(){
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
        exit();
    }
    
    /*
     * admin/admin-delete_value (delete single value)
     * @params :
     * @return : void
     */
    public function delete() {
        $id = $this->input->post('id');
        $response = $this->AboutValue->delete($id);
        if (!$response['deleted']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot delete benefit', 0));
        } else {
            if ($response['old_image_filename']) {
                if (file_exists('images/values/'.$response['old_image_filename'])) {
                    unlink('images/values/'.$response['old_image_filename']);
                }
            }
            $this->session->set_flashdata('success', $this->alert->show('Succecss delete!', 1));
        }
        redirect(base_url().'admin/admin-view-value');
        exit();
    }
    
}