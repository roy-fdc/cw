<?php


class Career extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['added'] = ($this->db->insert('careers', $data)) ? true : false;
        return $response;
    }
    
}
