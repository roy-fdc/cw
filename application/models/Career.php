<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->field = array(
            'career_title',
            'career_description',
            'career_detail',
            'career_image'
        );
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('careers', $data)) ? true : false;
        return $response;
    }
    
    public function update($data, $id) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('careers', $data)) ? true : false;
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
    
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('careers', array('career_status' => $status))) ? true : false;
        return $response;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('careers')) ? true : false;
        return $response;
    }

    
    // for all career list API
    public function api_get_career($id) {
        if ($id != 0) {
            $this->db->where('id', $id);
        }
        $this->db->where('career_status', 1);
        $this->db->select($this->field);
        $result = $this->db->get('careers');
        return $result->result();
    }
     
    public function single_data() {
        $sql = "SELECT id, career_title, career_description, career_detail, career_image FROM careers WHERE career_status = ? order by career_created desc limit 1"; 
        $query = $this->db->query($sql, array(1));
        return $query->result();
    }
    
}
