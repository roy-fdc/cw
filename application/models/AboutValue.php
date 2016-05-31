<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * AboutValue class (model)
 * table use : about_values
 */
class AboutValue extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        // construct field most used
        $this->fields = array(
            'id',
            'value_title',
            'value_image',
            'value_description',
            'value_status'
        );
    }
    
    /*
     * Insert data
     * @params : $data (array)
     * @return : $response (array)
     */
    public function insert($data) {
        $response['added'] = ($this->db->insert('about_values', $data)) ? true : false;
        return $response;
    }
    
    /*
     * Update
     * @params : $data (array), $id (int)
     * @return : $response (array)
     */
    public function update($data, $id) {
        $filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('about_values', $data)) ? true : false;
        return $response;
    }
    
    /*
     * Get image name
     * @params : $id (int)
     * @return : $filename (object, boolean)
     */
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
    
    /*
     * get all
     * @params : 
     * @return : $query (object)
     */
    public function get_all() {
        array_push($this->fields, 'value_status');
        $this->db->select($this->fields);
        $query = $this->db->get('about_values');
        return $query->result();
    }
    
    /*
     * get single data
     * @params : $id (int)
     * @return : object
     */
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('about_values');
        return $query->row();
    }

    /*
     * single data
     * @params :
     * @return : object
     */
    public function single_data() {
        $sql = "SELECT id, benefit_title, benefit_description, benefit_detail, benefit_image FROM benefits WHERE benefit_status = ? order by created desc limit 1"; 
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
        $response['changed'] = ($this->db->update('about_values', array('value_status' => $status))) ? true : false;
        return $response;
    }
    
    /*
     * delete 
     * @params : $id (int),
     * @return : $response (array)
     */
    public function delete($id) {
        $filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($filename) ? $filename : false;
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('about_values')) ? true : false;
        return $response;
    }
    
    /*
     * API - get value
     * @params : $id (int)
     * @return : object
     */
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
