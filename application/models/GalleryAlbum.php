<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Gallery Album clas (model)
 * table used: gallery_albums
 */
class GalleryAlbum extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * insert
     * @params : $data (array)
     * @return : $result (array)
     */
    public function insert($data) {
        $result['created'] = ($this->db->insert('gallery_albums', $data)) ? true : false;
        return $result;
    }
    
    /*
     * delete
     * @params : $id (int)
     * @return : $result (array)
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $result['deleted'] = ($this->db->delete('gallery_albums')) ? true : false;
        return $result;
    }
    
    /*
     * get all
     * @params : 
     * @return : object
     */
    public function getAll(){
        $query = $this->db->get('gallery_albums');
        return $query->result();
    }
    
    /*
     * change status
     * @params : $id (int), $status (int)
     * @return : $result (array)
     */
    public function change_status($id, $status) {
        $this->db->where('id', $id);
        $result['changed'] = ($this->db->update('gallery_albums', array('album_status' => $status))) ? true : false;
        return $result;
    }
    
    /*
     * update
     * @params : $id (int), $name (String)
     * @return : $result (array)
     */
    public function update($id, $name) {
        $this->db->where('id', $id);
        $result['updated'] = ($this->db->update('gallery_albums', array('album_name' => $name))) ? true : false;
        return $result;
    }

    /*
     * API - for gallery albums
     * @params : 
     * @return : object
     */
    public function api_get_album() {
        $this->db->where('album_status', 1);
        $this->db->select(array('id', 'album_name'));
        $albums = $this->db->get('gallery_albums');
        return $albums->result();
    }
}

