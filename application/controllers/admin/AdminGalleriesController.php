<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminGalleriesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->session_data = $this->session->userdata('logged_in');
        if ( !$this->session->has_userdata('logged_in') && !$this->session->userdata('logged_in')) {
            redirect(base_url().'admin');
        }
        $this->load->model('GalleryAlbum');
        $this->load->model('Gallery');
        $this->load->library('Alert');
        $this->load->library('ImageValidator');
        $this->load->library('Generate');
    }
    
    /*
     * admin/admin-gallery (View all image by album)
     * @param :
     * @return : void
     */
    public function index() {
        // get all gallery album
        $album = $this->GalleryAlbum->getAll();
        // construct data to view in array form
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
        $this->load->view('admin/modal/delete-album-modal');
        $this->load->view('admin/footer/footer');
    }
    
    /*
     * construct gallery by album
     * @params : $album (object)
     * @return : $data (array)
     */
    private function gallery_by_album($album) {
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
    
    
    /*
     * admin/admin-gallery-image-delete (Delete gallery image)
     * @params :
     * @return : void
     */
    public function delete(){
        // sanitize data
        $id = $this->input->post('id');
        $response = $this->Gallery->delete($id);
        if (!$response['deleted']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot delete image!', 0));
        } else {
            // delete image in server
            if ($response['old_image_filename']) {
                unlink('images/galleries/'.$response['old_image_filename']);
            }
            $this->session->set_flashdata('success', $this->alert->show('Image delete success!', 1));
        }
        redirect(base_url().'admin/admin-gallery');
        exit();
    }
    
    /*
     * admin/admin-add-gallery-exec
     * @param :
     * @return : void
     */
    public function add_image_exec() {

        $album_id = $this->input->post('album_id');
        $counter = 0;
        define ("MAX_SIZE","400");
        $validExtensions = array('jpg', 'jpeg', 'gif', 'png');
        foreach($_FILES['image']['name'] as $image) {
            //get image extension
            $extension = $this->imagevalidator->getExtension($image);

            $uploadedfile = $_FILES['image']['tmp_name'][$counter];
            // rename image
            $new_image_name = $this->generate->getString(20).'.'.$extension;

            if (!isset($extension) || empty($extension)) {
                $not_upload[] = array(
                    'image_name' => $image,
                    'error' => 'Invalid file extension!'
                );
            } else {
                if (!in_array($extension, $validExtensions)) {
                    $not_upload[] = array(
                        'image_name' => $image,
                        'error' => 'Invalid file extension!'
                    );
                } else {
                    $size = filesize($_FILES['image']['tmp_name'][$counter]);
                    if ($size > MAX_SIZE*1024) {
                        $not_upload[] = array(
                            'image_name' => $image,
                            'error' => 'Exceeded the size limit!'
                        );
                    } else {
                        if ($extension == "jpg" || $extension == "jpeg") {
                            $src = imagecreatefromjpeg($uploadedfile);
                        } else if ($extension == "png") {
                            $src = imagecreatefrompng($uploadedfile);
                        } else {
                            $src = imagecreatefromgif($uploadedfile);
                        }

                        list($width, $height) = getimagesize($uploadedfile);

                        $newwidth = 100;
                        $newheight = ($height / $width) * $newwidth;
                        $tmp = imagecreatetruecolor($newwidth, $newheight);

                        $newwidth1 = 25;
                        $newheight1 = ($height / $width) * $newwidth1;
                        $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                        imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

                        imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

                        $filename = "images/galleries/". $new_image_name;

                        $filename1 = "images/galleries/thumb/". $new_image_name;

                        imagejpeg($tmp,$filename,100);

                        imagejpeg($tmp1,$filename1,100);

                        imagedestroy($src);
                        imagedestroy($tmp);
                        imagedestroy($tmp1);

                        $to_save = array(
                            'album_id' => $album_id,
                            'image_name' => $new_image_name,
                            'created' => date('Y-m-d H:i:s')
                        );
                        $response = $this->Gallery->insert($to_save);
                        if (!$response['created']) {
                            $not_upload[] = array(
                                'image_name' => $image,
                                'error' => 'Cannot save image to server!'
                            );
                        } else {
                            $yes_upload[] = array(
                                'image_name' => $image
                            );
                        } 
                    }
                }
            }
            $counter++;
        }

        if (isset($yes_upload)) {
            foreach($yes_upload as $yes) {
                $successMessage = $successMessage.'<li>'.$yes['image_name'].'</li>';
            }
            $this->session->set_flashdata('success', $this->alert->show('<ul>'.$successMessage.'</ul>', 1));
        }
        if (isset($not_upload)) {
            foreach($not_upload as $not) {
                $errorMessage = $errorMessage.'<li>'.$not['image_name'].' - ('.$not['error'].')</li>';
            }
            $this->session->set_flashdata('error', $this->alert->show('<ul>'.$errorMessage.'</ul>', 0));
        }

        redirect(base_url().'admin/admin-gallery');
        exit();      
    }
    
    /*
     * image file validation 
     * @params :
     * @returns : $config (array)
     */
    private function file_validation() {
        $config['upload_path'] = 'images/galleries';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        return $config;
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
    
    
}
