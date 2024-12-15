<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_user_by_id2($user_id) {
        return $this->db->get_where('users', ['id' => $user_id])->row();
    } 
    public function insert_user($data)
    {
        return $this->db->insert('users', $data); 
    }

    public function get_pembayaran($filters = []) {
        $this->db->select('*');
        $this->db->from('pembayaran');
        
        // Mengaplikasikan filter jika ada
        if (!empty($filters)) {
            $this->db->where($filters);
        }
    
        // Menambahkan urutan berdasarkan tanggal transaksi
        $this->db->order_by('tanggal_transaksi', 'DESC');
        
        // Menjalankan query dan mengembalikan hasil
        $query = $this->db->get();
        return $query->result_array();
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
                return $user;
            }
        }
    
        return FALSE;
    }
    
    public function get_user_by_id($user_id) {
       
        $this->db->where('id', $user_id);
        $query = $this->db->get('users'); 
        return $query->row();  
    }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('users')->row();
    }

    public function save_reset_token($user_id, $token) {
        $data = [
            'reset_token' => $token,
            'token_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ];
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function get_user_by_token($token) {
        $this->db->where('reset_token', $token);
        $this->db->where('token_expiry >', date('Y-m-d H:i:s'));
        return $this->db->get('users')->row();
    }

    public function update_password($user_id, $password) {
        $this->db->where('id', $user_id);
        $this->db->update('users', ['password' => $password, 'reset_token' => NULL]);
    }
    
    public function clear_reset_token($user_id) {
        $this->db->where('id', $user_id);
        $this->db->update('users', ['reset_token' => NULL, 'token_expiry' => NULL]);
    }
    
    
}
