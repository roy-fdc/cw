<?php

class Gallery extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $result['created'] = ($this->db->insert('galleries', $data)) ? true : false;
        return $result;
    }
    
    public function getImage($album_id) {
        $this->db->where('album_id', $album_id);
        $query = $this->db->get('galleries');
        return $query->result();
    }
    
    public function delete($id) {
        $filename = $this->get_image_filename($id);
        $result['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $result['deleted'] = ($this->db->delete('galleries')) ? true : false;
        return $result;
    }
    
    private function get_image_filename($id) {
        $this->db->where('id', $id);
        $this->db->select(array('image_name'));
        $result = $this->db->get('galleries');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $filename = $row->image_name;
        } else {
            $filename = false;
        }
        return $filename;
    }
    
    public function get_images_by_album($album_id) {
        $this->db->where('album_id', $album_id);
        $this->db->select(array('image_name'));
        $images = $this->db->get('galleries');
        return $images->result();
    }
    
    public function api_get_gallery($album_id) {
        $this->db->where('album_id', $album_id);
        $this->db->where('image_status', 1);
        $this->db->select(array('id', 'image_name'));
        $images = $this->db->get('galleries');
        return $images->result();
    }
    
}