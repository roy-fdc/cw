<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Benefit class (model)
 * table used : benefitss
 */
class Benefit extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        // construct field most used
        $this->fields = array(
            'id',
            'benefit_title',
            'benefit_image',
            'benefit_description'
        );
    }
    
    /*
     * insert / add - function
     * @params : $data (array)
     * @return : $response (array)
     */
    public function insert($data) {
        $response['added'] = ($this->db->insert('benefits', $data)) ? true : false;
        return $response;
    }
    
    /*
     * update 
     * @params : $data (array), $id (int)
     * @return : $response (array)
     */
    public function update($data, $id) {
        $filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('benefits', $data)) ? true : false;
        return $response;
    }
    
    /*
     * get image filename
     * @params : $id (int)
     * @return : $filename (object, boolean)
     */
    private function get_image_filename($id) {
        $this->db->where('id', $id);
        $this->db->select(array('benefit_image'));
        $result = $this->db->get('benefits');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $filename = $row->benefit_image;
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
        array_push($this->fields, 'benefit_status');
        $this->db->select($this->fields);
        $query = $this->db->get('benefits');
        return $query->result();
    }
    
    /*
     * get single data by id
     * @params : $id (int)
     * @return : object
     */
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('benefits');
        return $query->row();
    }

    /*
     * single data
     * @params :
     * @return  : object
     */
    public function single_data() {
        $sql = "SELECT id, benefit_title, benefit_description, benefit_image FROM benefits WHERE benefit_status = ? order by created desc limit 1"; 
        $query = $this->db->query($sql, array(1));
        return $query->result();
    }
    
    /*
     * change status
     * @params : $id (int), $status (int)
     * @return : $response (array)
     */
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('benefits', array('benefit_status' => $status))) ? true : false;
        return $response;
    }
    
    /*
     * delete 
     * @params : $id (int)
     * @return : $response (array)
     */
    public function delete($id) {
        $filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('benefits')) ? true : false;
        return $response;
    }

    
    /*
     * API - (api for benefit)
     * @params : $id (int, can be null)
     * @return : object
     */
    public function api_get_benefit($id) {
        if ($id != 0) {
            $this->db->where('id', $id);
        }
        $this->db->where('benefit_status', 1);
        $this->db->select($this->fields);
        $benefits = $this->db->get('benefits');
        return $benefits->result();
    }

}
