<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 class AdminUser extends CI_Model {
     
     
    public function register($data) {
        $response['added'] = ($this->db->insert('admin_users', $data)) ? true : false;
        return $response;
    }
    
    public function get_all() {
        $select = array(
            'admin_firstname',
            'admin_lastname',
            'admin_status',
            'admin_lastlogin',
            'admin_lastlogout'
        );
        $this->db->select($select);
        $query = $this->db->get('admin_users');
        return $query->result();
    }
    
    public function login($username) {
        //$query = $this->db->get_where('admin_users', array('admin_username' => $username));
        $query = $this->db->query('SELECT id, admin_username, admin_password FROM admin_users WHERE admin_username="'.$username.'"');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $response = array(
                'correct' => true,
                'id' => $row->id,
                'username' => $row->admin_username,
                'hash' => $row->admin_password
            );
        } else {
            $response = array(
                'correct' => false
            );
        }
        return $response;
    }
    
    public function save_login_logout($id, $data) {
        $this->db->where('id', $id);
        $update = $this->db->update('admin_users', $data);
        $response['saved'] = ($update) ? true : false;
        return $response;
    }
     
 }