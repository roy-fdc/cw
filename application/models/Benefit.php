<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Benefit extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->field = array(
            'id',
            'benefit_title',
            'benefit_image',
            'benefit_description'
        );
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
        $this->field['benefit_status'];
        $this->db->select($this->field);
        $query = $this->db->get('benefits');
        return $query->result();
    }
    
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('benefits');
        return $query->row();
    }


    public function single_data() {
        $sql = "SELECT id, benefit_title, benefit_description, benefit_image FROM benefits WHERE benefit_status = ? order by created desc limit 1"; 
        $query = $this->db->query($sql, array(1));
        return $query->result();
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

    
    public function api_get_benefit($id) {
        $field = array(
            'id',
            'benefit_title',
            'benefit_description',
            'benefit_image'
        );
        if ($id != 0) {
            $this->db->where('id', $id);
        }
        $this->db->where('benefit_status', 1);
        $this->db->select($field);
        $benefits = $this->db->get('benefits');
        return $benefits->result();
    }

}
