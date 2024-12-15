<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    

    public function get_tours_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tour');
        return $query->result_array();
    }
 
    public function insert_tour($data) {
        return $this->db->insert('tour', $data);
    }

    public function get_all_tour($user_id)
{
    $this->db->select('*');
    $this->db->from('tour');
    $this->db->where('user_id', $user_id);  
    return $this->db->get()->result_array();
}


    public function update_tour($id_tour, $user_id, $data) {
        $this->db->where('id_tour', $id_tour);
        $this->db->where('user_id', $user_id);
        return $this->db->update('tour', $data);
    }


    public function delete_tour($id_tour, $user_id) {
        $this->db->where('id_tour', $id_tour);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('tour');
    }

    

    public function add_tour($data)
    {
        return $this->db->insert('tour', $data);
    }

        public function check_booking_conflict($tgl_mulai, $tgl_selesai, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('tgl_bermain >=', $tgl_mulai);
        $this->db->where('tgl_bermain <=', $tgl_selesai);
        $query = $this->db->get('booking');

        return $query->num_rows() > 0; 
    }

    public function check_tour_availability($tgl_mulai, $tgl_selesai, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->group_start()
                ->where('tanggal_mulai <=', $tgl_selesai)
                ->where('tanggal_selesai >=', $tgl_mulai)
                ->group_end();
        $query = $this->db->get('tour');

        return $query->num_rows() > 0; 
    }

    public function get_tour_by_id($id_tour, $user_id) {
        return $this->db->get_where('tour', ['id_tour' => $id_tour, 'user_id' => $user_id])->row_array();
    }


    public function check_tour_availability_for_edit($tgl_mulai, $tgl_selesai, $id_tour, $user_id)
{
    $this->db->where('user_id', $user_id);
    $this->db->where('id_tour !=', $id_tour);
    $this->db->group_start()
             ->where('tanggal_mulai <=', $tgl_selesai)
             ->where('tanggal_selesai >=', $tgl_mulai)
             ->group_end();
    return $this->db->get('tour')->num_rows() > 0; 
}






    
}
