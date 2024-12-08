<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function insertLapangan($data) {
        return $this->db->insert('lapangan', $data);
    }

    public function get_all($user_id)
{
    return $this->db->get_where('lapangan', ['user_id' => $user_id])->result_array();
}

public function get_all_lapangan($user_id)
    {
        // Hanya ambil pelanggan yang sesuai dengan user_id
        $this->db->where('user_id', $user_id);
        return $this->db->get('lapangan')->result_array();
    }

    // Ambil data lapangan berdasarkan id dan user_id
    public function getLapanganById($id, $user_id) {
        $this->db->where('id_lapangan', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('lapangan')->row();
    }

    // Update data lapangan berdasarkan id dan user_id
    public function updateLapangan($id, $user_id, $data) {
        $this->db->where('id_lapangan', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->update('lapangan', $data);
    }

    // Hapus data lapangan berdasarkan id dan user_id
    public function deleteLapangan($id, $user_id) {
        $this->db->where('id_lapangan', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('lapangan');
    }

    // Alias untuk menghapus data lapangan (dengan validasi user_id)
    public function hapusLapangan($id_lapangan, $user_id) {
        $this->db->where('id_lapangan', $id_lapangan);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('lapangan');
    }

    public function getLapanganByIdAndUserId($id_lapangan, $user_id)
{
    // Mencari lapangan berdasarkan ID dan user_id
    $this->db->where('id_lapangan', $id_lapangan);
    $this->db->where('user_id', $user_id);
    return $this->db->get('lapangan')->row(); // Mengambil satu hasil
}

}
