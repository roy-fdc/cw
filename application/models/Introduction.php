<?php

class Introduction extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAll() {
        $query = $this->db->get('introductions');
        return $query->result();
    }
    
    public function change_status($id, $status) {
        $this->db->where('id', $id);
        $result['changed'] = ($this->db->update('introductions', array('status' => $status))) ? true : false;
        return $result;
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        $result['updated'] = ($this->db->update('introductions', $data)) ? true : false;
        return $result;
    }

    public function api_get_all() {
        $select = array(
                'id','name','description', 'image'
            );
        $this->db->select($select);
        $this->db->where('status', 1);
        $query = $this->db->get('introductions');
        return $query->result();
    }
    
}