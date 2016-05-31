<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * About class (model)
 * used table : abouts
 */
class About extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * get about description
     * @params : $id (int)
     * @return : object
     */
    public function get_description($id){
        $this->db->where('state', $id);
        $get = $this->db->get('abouts');
        return $get->row();
    }
    
    /*
     * update about
     * @params : $id (int), $description (String)
     * @return : $response (array)
     */
    public function update($id, $description){
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('abouts', array('description' => $description))) ? true : false;
        return $response;
    }
    
    /*
     * change status
     * @params : $id (int), $status (int)
     * @return : $response (array)
     */
    public function change_status($id, $status) {
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('abouts', array('status' => $status))) ? true : false;
        return $response;
    }
    
    /*
     * API - get all enable 
     * @params : $state (int)
     * @return : object
     */
    public function api_get_about($state) {
        $field = array(
            'id',
            'description'
        );
        $this->db->where('state', $state);
        $this->db->where('status', 1);
        $this->db->select($field);
        $about = $this->db->get('abouts');
        return $about->result();
    }
}