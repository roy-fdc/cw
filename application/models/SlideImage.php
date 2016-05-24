<?php

class SlideImage extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['created'] = ($this->db->insert('slide_images', $data)) ? true : false;
        return $response;
    }
    
    public function getAll() {
        $query = $this->db->get('slide_images');
        return $query->result();
    }
    
    public function change_status($id, $status) {
        $this->db->where('id', $id);
        $result['changed'] = ($this->db->update('slide_images', array('slide_image_status' => $status)));
        return $result;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $result['deleted'] = ($this->db->delete('slide_images'));
        return $result;
    }

    
    public function api_get_slide() {
        $this->db->where('slide_image_status', 1);
        $this->db->select(array('slide_image_name'));
        $slides = $this->db->get('slide_images');
        return $slides->result();
    }

    public function api_get_all() {
        $select = array(
            'slide_image_name'
        );
        $this->db->where('slide_image_status', 1);
        $this->db->select($select);
        $query = $this->db->get('slide_images');
        return $query->result();
    }
}

