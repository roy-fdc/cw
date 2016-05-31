<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Career class (model)
 * table used : careers
 */
class Career extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        // construct field most used
        $this->fields = array(
            'id',
            'career_title',
            'career_description',
            'career_detail',
            'career_image'
        );
    }
    
    /*
     * insert 
     * @params : $data (array)
     * @return : $response (array)
     */
    public function insert($data) {
        $response['added'] = ($this->db->insert('careers', $data)) ? true : false;
        return $response;
    }
    
    /*
     * update
     * @params : $data (array), $id (int)
     * @return : $response (array)
     */
    public function update($data, $id) {
        $file_name = $this->get_image_filename($id);
        $response['old_image_filename'] = ($file_name) ? $file_name : false;
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('careers', $data)) ? true : false;
        return $response;
    }
    
    /*
     * get iamge filename
     * @params : $id (int)
     * @return : $filename (String, boolean)
     */
    private function get_image_filename($id) {
        $this->db->where('id', $id);
        $this->db->select(array('career_image'));
        $result = $this->db->get('careers');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $filename = $row->career_image;
        } else {
            $filename = false;
        } 
        return $filename;
    }
    
    /*
     * get all
     * @params : 
     * @return : object
     */
    public function get_all() {
        array_push($this->fields, 'career_status');
        $this->db->select($this->fields);
        $query = $this->db->get('careers');
        return $query->result();
    }
    
    /*
     * get single data via given ID
     * @params : $id (int)
     * @return : object
     */
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('careers');
        return $query->row();
    }
    
    /*
     * change status
     * @params : $id (int), $status (int)
     * @return : $response (array)
     */
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('careers', array('career_status' => $status))) ? true : false;
        return $response;
    }
    
    /*
     * delete 
     * @params : $id (int)
     * @return : $response (array)
     */
    public function delete($id) {
        $file_name = $this->get_image_filename($id);
        $response['old_image_filename'] = ($file_name) ? $file_name : false;
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('careers')) ? true : false;
        return $response;
    }

    /*
     * API - benefit
     * @params : $id (int)
     * @return : object
     */
    public function api_get_career($id = null) {
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->where('career_status', 1);
        $this->db->select($this->fields);
        $query = $this->db->get('careers');
        return $query->result();
    }
    
}
