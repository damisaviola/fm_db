<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($data)
    {
        return $this->db->insert('users', $data); 
    }

 
    public function activate_account($activation_code) {
        $this->db->where('activation_code', $activation_code);
        $user = $this->db->get('users')->row();
    
        if ($user) {
            $this->db->set('is_active', 1);
            $this->db->where('id', $user->id);
            $this->db->update('users');
            return true;
        }
        return false;
    }

    public function check_user($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();

            if (password_verify($password, $user->password)) {
                if ($user->is_active == 1) {
                    return $user;
                }
            }
        }
        return false;
    }

    public function get_user_by_id($user_id) {
       
        $this->db->where('id', $user_id);
        $query = $this->db->get('users'); 
        return $query->row();  
    }
    
}
