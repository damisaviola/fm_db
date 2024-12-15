<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_transaksi_by_user($user_id)
{
    // Query untuk mengambil transaksi berdasarkan id_user yang login
    $this->db->select('*');
    $this->db->from('pembayaran');
    $this->db->where('user_id', $user_id); // Filter berdasarkan user yang login
    $query = $this->db->get();
    return $query->result_array(); // Mengembalikan hasil sebagai array
}

public function getPembayaranById($id_pembayaran) {
    return $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
}

    
}

?>