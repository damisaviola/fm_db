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
        $this->db->where('user_id', $user_id);
        return $this->db->get('lapangan')->result_array();
    }


    public function getLapanganById($id, $user_id) {
        $this->db->where('id_lapangan', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('lapangan')->row();
    }


    public function updateLapangan($id, $user_id, $data) {
        $this->db->where('id_lapangan', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->update('lapangan', $data);
    }

  
    public function deleteLapangan($id, $user_id) {
        $this->db->where('id_lapangan', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('lapangan');
    }

  
    public function hapusLapangan($id_lapangan, $user_id) {
        $this->db->where('id_lapangan', $id_lapangan);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('lapangan');
    }

    public function getLapanganByIdAndUserId($id_lapangan, $user_id)
{
   
    $this->db->where('id_lapangan', $id_lapangan);
    $this->db->where('user_id', $user_id);
    return $this->db->get('lapangan')->row(); 
}

public function get_total_lapangan_by_user($user_id) {
    $this->db->where('user_id', $user_id);
    return $this->db->count_all_results('lapangan'); 
}


public function get_lapangan_usage()
{
    
    $user_id = $this->session->userdata('user_id');
    $this->db->select('id_lapangan, COUNT(id_booking) as usage_count');
    $this->db->from('booking');
    $this->db->where('user_id', $user_id);
    $this->db->group_by('id_lapangan');
    $this->db->order_by('usage_count', 'DESC');
    $query = $this->db->get();

    return $query->result_array(); 
}




}
