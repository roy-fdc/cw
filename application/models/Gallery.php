<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Gallery class (model)
 * table used : galleries
 */
class Gallery extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * insert
     * @params : $data (array)
     * @return : $result (array)
     */
    public function insert($data) {
        $result['created'] = ($this->db->insert('galleries', $data)) ? true : false;
        return $result;
    }
    
    /*
     * get image
     * @params : $album_id (int)
     * @return : object
     */
    public function getImage($album_id) {
        $this->db->where('album_id', $album_id);
        $query = $this->db->get('galleries');
        return $query->result();
    }
    
    public function delete_by_album($id) {
        $this->db->where('album_id', $id);
        $this->db->delete('galleries');
    }
    
    /*
     * delete
     * @params : $id (int)
     * @return : $result (array)
     */
    public function delete($id) {
        $image_info = $this->get_image_filename($id);
        if ($image_info == false) {
            $result['old_image_filename'] = false;
        } else {
            $result = array(
                'old_image_filename' => $image_info['filename'],
                'album_id' => $image_info['album_id']
            );
        }
        $this->db->where('id', $id);
        $result['deleted'] = ($this->db->delete('galleries')) ? true : false;
        return $result;
    }
    
    /*
     * get image filename
     * @params : $id (int)
     * @return : $filename (object, boolean)
     */
    private function get_image_filename($id) {
        $this->db->where('id', $id);
        $this->db->select(array('image_name', 'album_id'));
        $result = $this->db->get('galleries');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $image_info = array(
                'filename' => $row->image_name,
                'album_id' => $row->album_id
            );
        } else {
            $image_info = false;
        }
        return $image_info;
    }
    
    /*
     * get image by album
     * @params : $album_id (int)
     * @return : object
     */
    public function get_images_by_album($album_id) {
        $this->db->where('album_id', $album_id);
        $this->db->select(array('image_name'));
        $images = $this->db->get('galleries');
        return $images->result();
    }
    
    /*
     * API for galleries
     * @params : $album_id,
     * @return : object
     */
    public function api_get_gallery($album_id) {
        $this->db->where('album_id', $album_id);
        $this->db->where('image_status', 1);
        $this->db->select(array('id', 'image_name'));
        $images = $this->db->get('galleries');
        return $images->result();
    }
    
}