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

    
    public function api_get_album() {
        $this->db->where('album_status', 1);
        $this->db->select(array('id', 'album_name'));
        $albums = $this->db->get('gallery_albums');
        return $albums->result();
    }

    public function api_get_all() {
        $sql = "select ga.id, album_name, image_name
                from gallery_albums ga
                left join galleries g on ga.id = g.album_id
                where album_status = ? and image_status =?
                group by id"; 
        $query = $this->db->query($sql, array(1, 1));
        return $query->result();
    }
}

