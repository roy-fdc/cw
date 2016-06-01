<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * AdminUser class
 * table used : admin_users
 */
 class AdminUser extends CI_Model {
     
    /*
     * Register
     * @params : $data (array)
     * @return : $response (array)
     */
    public function register($data) {
        $response['added'] = ($this->db->insert('admin_users', $data)) ? true : false;
        return $response;
    }
    
    /*
     * check existing username
     * @params : $id (int), $token (String), $username (String)
     * @return : $result (array)
     */
    public function check_username($id, $username) {
        $query = $this->db->query('SELECT admin_username FROM admin_users WHERE id <>'.$id.' AND admin_username = "'.$username.'"');
        $result['exist'] = ($query->num_rows() > 0) ? true : false;
        return $result;
    }
    
    /*
     * Update admin account
     * @params : $id (int), $token (String), $data (array)
     * @return  : $result (array)
     */
    public function update($id, $token, $data) {
        $this->db->where('id', $id);
        $this->db->where('admin_token', $token);
        $result['updated'] = ($this->db->update('admin_users', $data)) ? true : false;
        return $result;
    }
    
    /*
     * get account information
     * @params $id admin Id
     * @return (object, boolean)
     */
    public function get_my_info($id) {
        $fields = array(
            'admin_firstname',
            'admin_lastname',
            'admin_username'
        );
        $this->db->where('id' , $id);
        $this->db->select($fields);
        $query = $this->db->get('admin_users');
        if  ($query->num_rows() > 0) {
            $result['account_info'] = $query->row();
        } else {
            $result['account_info'] = false;
        }
        return $result;
    }
    
    /*
     * get all admin user
     * @params
     * @return : object
     */
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
    
    /*
     * Login
     * @params : $username (String)
     * @return : $response (array)
     */
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
    
    /*
     * save login / logout logs
     * @params : $id (int), $data (array)
     * @return : $response (array)
     */
    public function save_login_logout($id, $data) {
        $this->db->where('id', $id);
        $update = $this->db->update('admin_users', $data);
        $response['saved'] = ($update) ? true : false;
        return $response;
    }
     
 }