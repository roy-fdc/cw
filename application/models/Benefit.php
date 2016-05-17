<?php


class Benefit extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('benefits', $data)) ? true : false;
        return $response;
    }
    
    public function update($data, $id) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('benefits', $data)) ? true : false;
        return $response;
    }
    
    public function get_all() {
        $select = array(
            'id',
            'benefit_title',
            'benefit_image',
            'benefit_description',
            'benefit_status'
        );
        $this->db->select($select);
        $query = $this->db->get('benefits');
        return $query->result();
    }
    
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('benefits');
        return $query->row();
    }
    
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('benefits', array('benefit_status' => $status))) ? true : false;
        return $response;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('benefits')) ? true : false;
        return $response;
    }
}
