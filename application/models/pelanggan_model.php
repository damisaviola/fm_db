<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    // Insert pelanggan, pastikan data mencakup user_id
    public function insert_pelanggan($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

    // Mendapatkan semua pelanggan milik user_id tertentu
    public function get_all_pelanggan($user_id)
    {
        // Hanya ambil pelanggan yang sesuai dengan user_id
        $this->db->where('user_id', $user_id);
        return $this->db->get('pelanggan')->result_array();
    }

    // Mendapatkan pelanggan berdasarkan id_pelanggan dan user_id
    public function get_pelanggan_by_id($id_pelanggan, $user_id)
    {
        // Hanya ambil pelanggan yang sesuai dengan user_id
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('user_id', $user_id);
        return $this->db->get('pelanggan')->row_array();
    }

    // Update pelanggan hanya jika sesuai dengan user_id
    public function update_pelanggan($id_pelanggan, $user_id, $data)
    {
        // Pastikan id_pelanggan dan user_id sesuai
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

}
