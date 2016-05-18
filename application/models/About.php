<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_description($id){
        $this->db->where('state', $id);
        $get = $this->db->get('abouts');
        return $get->row();
    }
    
    public function update($id, $description){
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('abouts', array('description' => $description))) ? true : false;
        return $response;
    }
    
    public function change_status($id, $status) {
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('abouts', array('status' => $status))) ? true : false;
        return $response;
    }
    
}