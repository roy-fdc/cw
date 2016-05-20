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
        $this->db->where('id', $id);
        $result['deleted'] = ($this->db->delete('galleries')) ? true : false;
        return $result;
    }
}