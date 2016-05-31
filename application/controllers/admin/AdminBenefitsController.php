<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBenefitsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->model('Benefit');
        $this->load->library('Alert');
        $this->title = 'Admin-benefits';
        $this->pageHeader = 'Benefits';
    }

    /*
     * admin/admin-add-benefit (Add page for benefits)
     * @params :
     * @return : void
     */
    public function index() {
        //construct data for view in array form
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader,
            'form' => array(
                'title' => true,
                'action' => 'admin-add-benefit-exec'
            )
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/form-content');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin/admin-add-benefit-exec (Benefit add exec)
     * @params :
     * @return : void
     */
    public function add_exec() {
        // load the file validation config
        $this->load->library('upload', $this->file_validation());
        // run the input validation
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->index();
        } else {
            // prepare data to save  in array form
            $to_save = array(
                'benefit_title' => $this->input->post('title'),
                'benefit_description' => $this->input->post('description'),
                'benefit_image' => $this->input->post('image'),
                'created' => date('Y-m-d H:i:s'),
            );
            $response = $this->Benefit->insert($to_save);
            if (!$response['added']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot add Team', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Add success', 1));
            }
            redirect(base_url().'admin/admin-add-benefit');
            exit();
        }
    }
    
    /*
     * image file validation 
     * @params :
     * @returns : $config (array)
     */
    private function file_validation() {
        $config['upload_path'] = 'images/benefits';
        $config['allowed_types'] = 'gif|jpg|png';
        return $config;
    }
    
    /*
     * input validation
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
     * handle image file upload
     * @params :
     * @return : boolean
     */
    private function handle_upload() {
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
     * admin/admin-view-benefit (view all benefit in page)
     * @params :
     * @return :
     */
    public function view(){
        // call for get all benefit
        $benefits = $this->Benefit->get_all();
        // data for view construct in array form
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader,
            'all_benefits' => $this->benefit_table($benefits),
            'action_status_link' => 'admin-status-benefit',
            'action_delete_link' => 'admin-delete-benefit',
            'item_name' => 'benefit'
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/view-benefits');
        $this->load->view('admin/modal/status-modal');
        $this->load->view('admin/modal/delete-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * Construct benefit table for view
     * @params : $benefits (object)
     * @return : generated trable (string)
     */
    private function benefit_table($benefits) {
        // laod table library
        $this->load->library('table');
        // set table template
        $template = array(
            'table_open' => '<table class="table table-bordered">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('NO', 'Image', 'Title', 'Description', 'Status', 'Action');
        $counter = 1;
        // load benefit object to construct a table row
        foreach ($benefits as $row) {
            $btn_text = ($row->benefit_status == 0) ? 'Enable' : 'Disable';
            $btn_type = ($row->benefit_status == 0) ? 'success' : 'warning';
            $update_btn = '<a href="'.base_url().'admin/admin-edit-benefit/'.$row->id.'" class="btn btn-primary">Update</a>';
            $change_status_btn = '<a onclick="change_status('.$row->id.', '.$row->benefit_status.')"  class="btn btn-'.$btn_type.'">'.$btn_text.'</a>';
            $delete_btn = '<a onclick="delete_item('.$row->id.')" class="btn btn-danger">Delete</a>';
            $to_row = array(
                $counter++,
                '<img src="'.base_url().'images/benefits/'.$row->benefit_image.'" width="50" height="50"/>',
                $row->benefit_title,
                $row->benefit_description,
                ($row->benefit_status == 1) ? 'Active' : '........',
                $update_btn.' '.$change_status_btn.' '.$delete_btn
            );
            $this->table->add_row($to_row);
        }
        return $this->table->generate();
    }
    
    /*
     * admin/admin-edit-benefit/1 ( page for edit benefit)
     * @params : $id (int)
     * @return : void
     */
    public function edit($id) {
        // construct data to view in array form
        $data = array(
            'pagetitle' => $this->title,
            'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
            'page_header' => $this->pageHeader,
            'benefit' => $this->Benefit->single($id)
        );
        $this->load->view('admin/header/head', $data);
        $this->load->view('admin/header/header-bar');
        $this->load->view('admin/header/menu-bar');
        $this->load->view('admin/contents/edit-benefits');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * admin/admin-edit-benefit-exec (Edit benefit exec.)
     * @params :
     * @return : void
     */
    public function edit_exec() {
        // load the image file validation
        $this->load->library('upload', $this->file_validation());
        // run data input validation rules
        $this->form_validation->set_rules($this->validation());
        if  ($this->form_validation->run() == false) {
            $this->edit($_POST['id']);
        } else {
            // prepare data to update in array form
            $to_update = array(
                'benefit_title' => $this->input->post('title'),
                'benefit_description' => $this->input->post('description'),
                'modified' => date('Y-m-d H:i:s')
            );
            $id = $this->input->post('id');
            // check if image field is not empty
            if ($_POST['image'] != ''){
                $to_update['benefit_image'] = $_POST['image'];
            }
            // call to udpate benefit
            $response = $this->Benefit->update($to_update, $id);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update benefit', 0));
            } else {
                if ($response['old_image_filename']) {
                    unlink('images/benefits/'.$response['old_image_filename']);
                }
                $this->session->set_flashdata('success', $this->alert->show('Update success', 1));
            }
            redirect(base_url().'admin/admin-edit-benefit/'.$id);
            exit();
        }
    }
    
   /*
    * admin/admin-status-benefit (Change benefit status)
    * @params :
    * @return : void
    */
    public function change_status(){
        // sanitize data 
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status == 0) ? 1 : 0;
        // call to update benefit status
        $response = $this->Benefit->change_status($id, $status);
        if (!$response['changed']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot change benefit status', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Success change status.', 1));
        }
        redirect(base_url().'admin/admin-view-benefit');
        exit();
    }
    
    /*
     * admin/admin-delete-benefit - (delete benefit status)
     * @params :
     * @return : void
     */
    public function delete() {
        // sanitize benefit Id
        $id = $this->input->post('id');
        // call to delete benefit by the sanitize ID
        $response = $this->Benefit->delete($id);
        if (!$response['deleted']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot delete benefit', 0));
        } else {
            // delete image file in server
            if ($response['old_image_filename']) {
                unlink('images/benefits/'.$response['old_image_filename']);
            }
            $this->session->set_flashdata('success', $this->alert->show('Succecss delete!', 1));
        }
        redirect(base_url().'admin/admin-view-benefit');
        exit();
    }
    
}