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


    public function get_all_pelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

   
    public function get_pelanggan_by_id($id_pelanggan)
    {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
    }


    public function update_pelanggan($id_pelanggan, $data)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->update('pelanggan', $data);
    }

    public function hapusPelanggan($id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->delete('pelanggan'); // 'pelanggan' adalah nama tabel
    }

    public function getById($id)
{
    $query = $this->db->get_where('pelanggan', ['id_pelanggan' => $id]);
    return $query->row_array(); // Mengembalikan array data pelanggan
}


    public function updatePelanggan($id, $data)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->update('pelanggan', $data);
    }

    
}
