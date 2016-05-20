<?php

class GalleryAlbum extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $result['created'] = ($this->db->insert('gallery_albums', $data)) ? true : false;
        return $result;
    }
    
    public function getAll(){
        $query = $this->db->get('gallery_albums');
        return $query->result();
    }
    
    public function change_status($id, $status) {
        $this->db->where('id', $id);
        $result['changed'] = ($this->db->update('gallery_albums', array('album_status' => $status))) ? true : false;
        return $result;
    }
    
    public function update($id, $name) {
        $this->db->where('id', $id);
        $result['updated'] = ($this->db->update('gallery_albums', array('album_name' => $name))) ? true : false;
        return $result;
    }
}

