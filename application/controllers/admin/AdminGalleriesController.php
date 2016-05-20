<?php


class AdminGalleriesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        $this->load->model('GalleryAlbum');
        $this->load->model('Gallery');
        $this->load->library('Alert');
    }
    
    public function index() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $album = $this->GalleryAlbum->getAll();
            $data = array(
                'pagetitle' => 'Admin-hompage',
                'page_header' => 'Image Gallery',
                'username_admin_account' => $this->session_data['ADMIN_USERNAME'],
                'action_status_link' => 'admin-gallery-status',
                'action_delete_link' => 'admin-gallery-image-delete',
                'item_name' => 'gallery image',
                'image_by_album' => $this->gallery_by_album($album)
            );
            $this->load->view('admin/header/head', $data);
            $this->load->view('admin/header/header-bar');
            $this->load->view('admin/header/menu-bar');
            $this->load->view('admin/contents/gallery-image');
            $this->load->view('admin/modal/add-image-modal');
            $this->load->view('admin/modal/status-modal');
            $this->load->view('admin/modal/update-album-modal');
            $this->load->view('admin/modal/delete-modal');
            $this->load->view('admin/footer/footer');
        } else {
            redirect(base_url().'admin');
        }
    }
    
    public function gallery_by_album($album) {
        $counter = 0;
        foreach($album as $row) {
            $data[$counter] = array(
                'album_id' => $row->id,
                'album_name' => $row->album_name,
                'album_status' => $row->album_status,
                'album_created' => $row->created,
                'album_modified' => $row->modified
            );
            $get_image = $this->Gallery->getImage($row->id);
            foreach($get_image as $gallery) {
                $data[$counter]['images'][] = array(
                    'image_id' => $gallery->id,
                    'image_name' => $gallery->image_name,
                    'image_status' => $gallery->image_status,
                    'image_created' => $gallery->created,
                    'image_modified' => $gallery->modified
                ); 
            }
            $counter++;
        }
        return $data;
    }
    
    public function delete(){
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $response = $this->Gallery->delete($id);
            if (!$response['deleted']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot delete image!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Image delete success!', 1));
            }
            redirect(base_url().'admin/admin-gallery');
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    public function add_image_exec() {
        if ( $this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')) {
            $validate = array(
                array(
                    'field' => 'image',
                    'label' => 'Image',
                    'rules' => 'callback_handle_upload'
                )
            );
            $this->load->library('upload', $this->file_validation());
            $this->form_validation->set_rules($validate);
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', $this->alert->show(form_error('image'), 0));
                redirect(base_url().'admin/admin-gallery');
            } else {
                $album_id = $this->input->post('album_id');
                $image = $this->input->post('image');
                $to_save = array(
                    'album_id' => $album_id,
                    'image_name' => $image,
                    'created' => date('Y-m-d H:i:s')
                );
                $response = $this->Gallery->insert($to_save);
                if (!$response['created']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot add image', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Image add success!', 1));
                } 
                redirect(base_url().'admin/admin-gallery');
            }
        } else {
            redirect(base_url().'admin');
        }
        exit();
    }
    
    private function file_validation() {
        $config['upload_path'] = 'image/galleries';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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
    
    
}
