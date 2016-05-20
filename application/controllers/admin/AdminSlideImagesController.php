<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSlideImagesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('SlideImage');
        $this->load->library('Alert');
    }
    
    public function index() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            
            $data = array(
                'pagetitle' => 'Admin-hompage',
                'page_header' => 'Slide Image',
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'all_images' =>  $this->table(),
                'action_status_link' => 'admin-image-status',
                'action_delete_link' => 'admin-image-delete',
                'item_name' => 'slide image'
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/slide-image');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/modal/delete-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    private function table() {
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-bordered">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('No', 'Image', 'Created', 'Modified', 'Action');
        $response = $this->SlideImage->getAll();
        $counter = 1;
        foreach($response as $row) {
            $btn_text = ($row->slide_image_status == 0) ? 'Enable' : 'Disable';
            $btn_type = ($row->slide_image_status == 0) ? 'success' : 'warning';
            $update_button = '<a href="'.base_url().'admin/admin-edit-slide-image/'.$row->id.'" class="btn btn-primary">Update</a>';
            $change_status_button = '<a onclick="change_status('.$row->id.', '.$row->slide_image_status.')"  class="btn btn-'.$btn_type.'">'.$btn_text.'</a>';
            $delete_button = '<a onclick="delete_item('.$row->id.')" class="btn btn-danger">Delete</a>';
            $to_row = array(
                $counter++,
                '<img src="'.  base_url().'image/slides/'.$row->slide_image_name.'" class="img-responsive" width="200" height="100"/>',
                ($row->created) ? $row->created : '........',
                ($row->modified) ? $row->modified : '........',
                $update_button.' '.$change_status_button.' '.$delete_button
            );
            $this->table->add_row($to_row);
        }
        return $this->table->generate();
    }
    
    
    
    public function add_exec() {
        if ($this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $validate = array(
                array(
                    'field' => 'image',
                    'label' => 'Image',
                    'rules' => 'callback_handle_upload'
                )
            );
            $config = array(
                'upload_path' => 'image/slides',
                'allowed_types' => 'jpg|jpeg|png'
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules($validate);
            if ($this->form_validation->run() == false) {
               $this->index();
            } else {
                $name = $this->input->post('image');
                $to_save = array(
                    'slide_image_name' => $name,
                    'created' => date('Y-m-d H:i:s')
                );
                $response = $this->SlideImage->insert($to_save);
                if (!$response['created']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot add image for homepage slide', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Image add success!', 1));
                }
                redirect(base_url().'admin/admin-image-slide');
                exit();
            }
            
        } else {
            redirect(base_url().'admin');
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
    
    public function change_status() {
        if ($this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $status = ($status == 0) ? 1 : 0;
            $response = $this->SlideImage->change_status($id, $status);
            if (!$response['changed']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot change image status', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Image change status success!', 1));
            }
            redirect(base_url().'admin/admin-image-slide');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    public function delete() {
        if ($this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $response = $this->SlideImage->delete($id);
            if (!$response['deleted']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot delete image.', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Image delete success!', 1));
            }
            redirect(base_url().'admin/admin-image-slide');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    
    
}

