<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_transaksi_by_user($user_id)
{
    $this->db->select('*');
    $this->db->from('pembayaran');
    $this->db->where('user_id', $user_id); 
    $query = $this->db->get();
    return $query->result_array(); 
}

public function getPembayaranById($id_pembayaran) {
    return $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
}

public function get_total_transaksi_by_user($user_id) {
    $this->db->where('user_id', $user_id);
    return $this->db->count_all_results('pembayaran'); 
}


public function get_transactions_per_month($user_id) {
    $this->db->select('MONTH(tanggal_transaksi) as month, COUNT(*) as total');
    $this->db->from('pembayaran');
    $this->db->where('user_id', $user_id);
    $this->db->group_by('MONTH(tanggal_transaksi)');
    $this->db->order_by('month', 'ASC');
    return $this->db->get()->result_array();
}
    
}

?>