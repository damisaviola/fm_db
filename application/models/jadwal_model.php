<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_jadwal_belum_lunas()
{

    $user_id = $this->session->userdata('user_id');
    $this->db->select('id_booking, tgl_bermain, id_lapangan, jam_awal, jam_akhir');
    $this->db->from('booking');
    $this->db->where('status', 'belum lunas'); 
    $this->db->where('user_id', $user_id); 
    $this->db->order_by('tgl_bermain', 'ASC');
    $query = $this->db->get();

    return $query->result(); 
}
}

?>