<?php


class Career extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('careers', $data)) ? true : false;
        return $response;
    }
    
    public function get_all() {
        $select = array(
            'id',
            'career_title',
            'career_description',
            'career_detail',
            'career_image',
            'career_status'
        );
        $this->db->select($select);
        $query = $this->db->get('careers');
        return $query->result();
    }
    
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('careers');
        return $query->row();
    }
}
