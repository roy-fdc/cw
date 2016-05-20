<?php

class AdminGalleryAlbumsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('GalleryAlbum');
        $this->load->library('Alert');
    }
    
    public function add_album_exec() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $validate = array(
                array(
                    'field' => 'album',
                    'label' => 'Album name',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($validate);
            if ($this->form_validation->run() == false) {
                $this->index();
            } else {
                $name = trim($this->input->post('album'));
                $to_save = array(
                    'album_name' => $name,
                    'created' => date('Y-m-d H:i:s')
                );
                $response = $this->GalleryAlbum->insert($to_save);
                if (!$response['created']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot add album name', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Album name add success!', 1));
                }
                redirect(base_url().'admin/admin-gallery');
                exit();
            }
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function change_status() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $status = ($status == 0) ? 1 : 0;
            $response = $this->GalleryAlbum->change_status($id, $status);
            if (!$response['changed']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot change status!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Change status success!', 1));
            }
            redirect(base_url().'admin/admin-gallery');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    public function update() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('album_id');
            $name = $this->input->post('album_name');
            $response = $this->GalleryAlbum->update($id, $name);
            if (!$response['updated']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot update album name!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Album update success!', 1));
            }
            redirect(base_url().'admin/admin-gallery');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
}