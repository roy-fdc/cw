<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data) {
        $response['created'] = ($this->db->insert('teams', $data)) ? true : false;
        return $response;
    }
    
    public function update($data, $id) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update('teams', $data)) ? true : false;
        return $response;
    }
    
    public function get_all() {
        $select = array(
            'id',
            'team_name',
            'team_position',
            'team_description',
            'team_image',
            'team_status'
        );
        $this->db->select($select);
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
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete('teams')) ? true : false;
        return $response;
    }

    public function single_data() {
        $sql = "SELECT id, team_name, team_position, team_description, team_image FROM teams WHERE team_status = ? order by created desc limit 1"; 
        $query = $this->db->query($sql, array(1));
        return $query->result();
    }
    
}
