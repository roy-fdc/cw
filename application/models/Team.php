<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Team class (model)
 * table used : teams
 */
class Team extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        // construct field most used
        $this->fields = array(
            'id',
            'team_name',
            'team_position',
            'team_description',
            'team_image'
        );
    }
    
    /*
     * insert 
     * @params : $data (array)
     * @return : @response (array)
     */
    public function insert($data) {
        $response['created'] = ($this->db->insert('teams', $data)) ? true : false;
        return $response;
    }
    
    /*
     * update 
     * @params : $data (array), $id (int)
     * @return : $response (array)
     */
    public function update($data, $id) {
        $old_filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($old_filename) ? $old_filename : false; 
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('teams', $data)) ? true : false;
        return $response;
    }
    
    /*
     * get image filename
     * @params : $id (int)
     * @return : $filename (object, boolean)
     */
    private function get_image_filename($id) {
        $this->db->where('id', $id);
        $this->db->select(array('team_image'));
        $result = $this->db->get('teams');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $filename = $row->team_image;
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
        array_push($this->fields, 'team_status');
        $this->db->select($this->fields);
        $query = $this->db->get('teams');
        return $query->result();
    }
    
    /*
     * single
     * @params : $id (int)
     * @return : object
     */
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('teams');
        return $query->row();
    }
    
    /*
     * change status
     * @params : $id (int), $status (int)
     * @return : $response (array)
     */
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('teams', array('team_status' => $status))) ? true : false;
        return $response;
    }
    
    /*
     * delete
     * @params : $id (int)
     * @return : $response (array)
     */
    public function delete($id) {
        $old_filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($old_filename) ? $old_filename : false; 
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('teams')) ? true : false;
        return $response;
    }
    
    /*
     * API - for team
     * @params : 
     * @return  : object
     */
    public function api_get_all() {
        $this->db->where('team_status', 1);
        $this->db->select($this->field);
        $query = $this->db->get('teams');
        return $query->result();
    }
    
    /*
     * API - for team via ID
     * @params : $id (int)
     * @return : object
     */
    public function api_get_team($id) {
        if ($id != 0) {
            $this->db->where('id', $id);
        }
        $this->db->where('team_status', 1);
        $this->db->select($this->fields);
        $teams = $this->db->get('teams');
        return $teams->result();
    }
    
}
