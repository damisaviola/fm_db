<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    public function insert_pelanggan($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

 
    public function get_all_pelanggan($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('pelanggan')->result_array();
    }

    public function get_pelanggan_by_id($id_pelanggan, $user_id)
    {
    
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('user_id', $user_id);
        return $this->db->get('pelanggan')->row_array();
    }

    public function update_pelanggan($id_pelanggan, $user_id, $data)
    {
      
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('user_id', $user_id);
        return $this->db->update('pelanggan', $data);
    }

    public function hapus_pelanggan($id_pelanggan, $user_id)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('pelanggan'); 
    }

 
    public function getById($id_pelanggan, $user_id)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('pelanggan');
        return $query->row_array(); 
    }

    public function update_pelanggan_data($id_pelanggan, $user_id, $data)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('user_id', $user_id);
        return $this->db->update('pelanggan', $data);
    }

    public function get_recent_customers($user_id) {
        $this->db->select('nama, email'); 
        $this->db->from('pelanggan');
        $this->db->where('user_id', $user_id); 
        $this->db->limit(3); 
        return $this->db->get()->result_array();
    }

    public function get_total_customers_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('pelanggan'); 
    }

}
