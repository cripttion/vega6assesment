<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function register($data) {
        // If the picture is provided as base64, it's already in the correct format
        return $this->db->insert('users', $data);
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', array('id' => $id))->row();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function update_password($id, $new_password) {
        $this->db->where('id', $id);
        return $this->db->update('users', array('password' => $new_password));
    }
}