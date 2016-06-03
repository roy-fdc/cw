<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminGalleryAlbumsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->model('GalleryAlbum');
        $this->load->model('Gallery');
        $this->load->library('Alert');
    }
    
    
    /*
     * admin/admin-gallery-status
     * @params :
     * @return : void
     */
    public function change_status() {
        // sanitize data
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status == 0) ? 1 : 0;
        // call to change status
        $response = $this->GalleryAlbum->change_status($id, $status);
        if (!$response['changed']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot change status!', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Change status success!', 1));
        }
        $this->session->set_flashdata('accor_id',$id);
        redirect(base_url().'admin/admin-gallery');
        exit();
    }
    
    /*
     * admin/admin-album-update-exec
     * @params : 
     * @return : void
     */
    public function update() {
        // sanitize data
        $id = $this->input->post('album_id');
        $name = $this->input->post('album_name');
        // call to update album name
        $response = $this->GalleryAlbum->update($id, $name);
        if (!$response['updated']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot update album name!', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Album update success!', 1));
        }
        $this->session->set_flashdata('accor_id',$id);
        redirect(base_url().'admin/admin-gallery');
        exit();
    }
    
    /*
     * admin/admin-album-delete
     * @params :
     * @return : void
     */
    public function delete() {
        // sanitize data
        $id = $this->input->post('id');
        // delete album
        $response = $this->GalleryAlbum->delete($id);
        if (!$response['deleted']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot delete album1', 0));
            redirect(base_url().'admin/admin-gallery');
            exit();
        } else {
            // get image name
            $images = $this->Gallery->get_images_by_album($id);
            $this->Gallery->delete_by_album($id);
            foreach($images as $row) {
                // delete image
                if (file_exists('images/galleries/'.$row->image_name)) {
                    unlink('images/galleries/'.$row->image_name);
                } 
                if  (file_exists('images/galleries/thumb/'.$row->image_name)) {
                    unlink('images/galleries/thumb/'.$row->image_name);
                }
            }
            $this->session->set_flashdata('del_success', $this->alert->show('Album delete success!', 1));
            redirect(base_url().'admin/admin-gallery');
            exit();
        }
    }
    
}