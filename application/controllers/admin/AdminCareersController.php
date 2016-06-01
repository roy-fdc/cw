<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCareersController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->library('alert');
        $this->load->model('Career');
        $this->title = 'Admin-careers';
        $this->pageHeader = 'Careers';
    }
    
    /*
     * admin/admin-add-career (Add career page)
     * @params :
     * @return : void
     */
    public function index() {
        // Prepare data in array to view
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader,
            'form' => array(
                'title' => true,
                'action' => 'admin-add-career-exec',
                'detail' => true
            )
        );
        // load layout
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/form-content');
        $this->load->view('admin/footer/footer');       
    }
    
    /*
     * admin/admin-add-career-exec (Add career exec)
     * @params :
     * @return : void
     */
    public function add_exec() {  
        // load the image validation config
        $this->load->library('upload', $this->file_validation());
        // run the input validation
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->index();
        } else {
            // prepare data to save in array form
            $to_save = array(
                'career_title' => $this->input->post('title'),
                'career_description' => $this->input->post('description'),
                'career_detail' => $this->input->post('details'),
                'career_image' => $this->input->post('image'),
                'career_created' => date('Y-m-d H:i:s')
            );
            // call to save constructed data
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
   
    /*
     * handle image file upload
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
     * admin/admin-view-career (View all career list)
     * @params :
     * @return : void
     */
    public function view(){
        // construct data for view in array form
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader,
            'all_careers' => $this->Career->get_all(),
            'action_status_link' => 'admin-status-career',
            'action_delete_link' => 'admin-delete-career',
            'item_name' => 'Carrer'
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/view-careers');
        $this->load->view('admin/modal/status-modal');
        $this->load->view('admin/modal/delete-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin/admin-edit-career/1 (Edit career page)
     * @params : $id (int)
     * @return : void
     */
    public function edit($id) {
        // construct data for view in array form
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'career' => $this->Career->single($id),
            'page_header' => $this->pageHeader
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/edit-careers');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin/admin-edit-career-exec (Edit career exec)
     * @params :
     * @return : void
     */
    public function edit_exec(){
        // load image file validation
        $this->load->library('upload', $this->file_validation());
        // run validation 
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->edit($_POST['id']);
        } else {
            // prepare data update
            $to_update = array(
                'career_title' => $this->input->post('title'),
                'career_description' => $this->input->post('description'),
                'career_detail' => $this->input->post('details'),
                'career_modified' => date('Y-m-d H:i:s')
            );
            // sanitize Id 
            $id = $this->input->post('id');
            echo $_POST['image'];
            if (!empty($_POST['image'])){
                $to_update['career_image'] = $_POST['image'];
            }
            // call to udpate career
            $response = $this->Career->update($to_update, $id);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update team', 0));
            } else {
                // delete old image in server
                if ($response['old_image_filename'] && !empty($_POST['image'])) {
                    if (file_exists('images/careers/'.$response['old_image_filename'])) {
                        unlink('images/careers/'.$response['old_image_filename']);
                    }
                }
                $this->session->set_flashdata('success', $this->alert->show('Update success', 1));
            }
            redirect(base_url().'admin/admin-edit-career/'.$id);
            exit();
        }
    }
    
    /*
     * image file validation 
     * @params :
     * @returns : $config (array)
     */
    public function file_validation(){
        $config['upload_path'] = 'images/careers';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        return $config;
    }
    
    /*
     * input validation
     * @params :
     * @return : $validate (array)
     */
    public function validation() {
        // construct input validation in array form
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
    
    /*
    * admin/admin-status-career (Change career status)
    * @params :
    * @return : void
    */
    public function change_status(){
        // sanitize data
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status == 0) ? 1 : 0;
        // call to update career status
        $response = $this->Career->change_status($id, $status);
        if (!$response['changed']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot change career status', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Success change status.', 1));
        }
        redirect(base_url().'admin/admin-view-career');
        exit();
    }
    
    /*
     * admin/admin-delete-career - (delete career status)
     * @params :
     * @return : void
     */
    public function delete() {
        // sanitize career ID
        $id = $this->input->post('id');
        // call to delete career
        $response = $this->Career->delete($id);
        if (!$response['deleted']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot delete career', 0));
        } else {
            // delete old image in server
            if ($response['old_image_filename']) {
                if (file_exists('images/careers/'.$response['old_image_filename'])) {
                    unlink('images/careers/'.$response['old_image_filename']);
                }
            }
            $this->session->set_flashdata('success', $this->alert->show('Succecss delete!', 1));
        }
        redirect(base_url().'admin/admin-view-career');
        exit();
    }
    
}