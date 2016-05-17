<?php
class Team extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('teams', $data)) ? true : false;
        return $response;
    }
    
    public function get_all() {
        $select = array(
            'id',
            'position',
            'detail',
            'image',
            'status'
        );
        $this->db->select($select);
        $query = $this->db->get('teams');
        return $query->result();
    }
    
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('teams');
        return $query->row();
    }
}
