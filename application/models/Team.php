<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->fields = array(
            'id',
            'team_name',
            'team_position',
            'team_description',
            'team_image'
        );
    }
    
    public function insert($data) {
        $response['created'] = ($this->db->insert('teams', $data)) ? true : false;
        return $response;
    }
    
    public function update($data, $id) {
        $old_filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($old_filename) ? $old_filename : false; 
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('teams', $data)) ? true : false;
        return $response;
    }
    
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
    
    public function get_all() {
        array_push($this->fields, 'team_status');
        $this->db->select($this->fields);
        $query = $this->db->get('teams');
        return $query->result();
    }
    
    public function single($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('teams');
        return $query->row();
    }
    
    public function change_status($id, $status){
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update('teams', array('team_status' => $status))) ? true : false;
        return $response;
    }
    
    public function delete($id) {
        $old_filename = $this->get_image_filename($id);
        $response['old_image_filename'] = ($old_filename) ? $old_filename : false; 
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('teams')) ? true : false;
        return $response;
    }
    
    public function api_get_all() {
        $this->db->where('team_status', 1);
        $this->db->select($this->field);
        $query = $this->db->get('teams');
        return $query->result();
    }
    
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
