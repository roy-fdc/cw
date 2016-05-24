<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AboutValue extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('about_values', $data)) ? true : false;
        return $response;
    }
    
    public function update($data, $id) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('about_values', $data)) ? true : false;
        return $response;
    }
    
    public function get_all() {
        $select = array(
            'id',
            'value_title',
            'value_image',
            'value_description',
            'value_status'
        );
        $this->db->select($select);
        $query = $this->db->get('about_values');
        return $query->result();
    }
    
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('about_values');
        return $query->row();
    }


    public function single_data() {
        $sql = "SELECT id, benefit_title, benefit_description, benefit_detail, benefit_image FROM benefits WHERE benefit_status = ? order by created desc limit 1"; 
        $query = $this->db->query($sql, array(1));
        return $query->result();
    }
    
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('about_values', array('value_status' => $status))) ? true : false;
        return $response;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('about_values')) ? true : false;
        return $response;
    }
    
    public function api_get_value($id) {
        $fields = array(
            'id',
            'value_title',
            'value_image'
        );
        if ($id != 0) {
            $this->db->where('id', $id);
        }
        $this->db->where('value_status', 1);
        $this->db->select($fields);
        $values = $this->db->get('about_values');
        return $values->return();
    }
}
