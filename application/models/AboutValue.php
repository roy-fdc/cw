<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AboutValue extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->fields = array(
            'id',
            'value_title',
            'value_image',
            'value_description',
            'value_status'
        );
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('about_values', $data)) ? true : false;
        return $response;
    }
    
    public function update($data, $id) {
        $filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('about_values', $data)) ? true : false;
        return $response;
    }
    
    private function get_image_filename($id) {
        $this->db->where('id', $id);
        $this->db->select(array('value_image'));
        $result = $this->db->get('about_values');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $filename = $row->value_image;
        } else {
            $filename = false;
        }
        return $filename;
    }
    
    public function get_all() {
        array_push($this->fields, 'value_status');
        $this->db->select($this->fields);
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
        $filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('about_values')) ? true : false;
        return $response;
    }
    
    public function api_get_value($id) {
        if ($id != 0) {
            $this->db->where('id', $id);
        }
        $this->db->where('value_status', 1);
        $this->db->select($this->fields);
        $values = $this->db->get('about_values');
        return $values->result();
    }
}
