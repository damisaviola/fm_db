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

 

    public function get_all()
    {
    return $this->db->get('lapangan')->result_array();
    }

    public function getLapanganById($id) {
        return $this->db->get_where('lapangan', ['id_lapangan' => $id])->row();
    }

    public function updateLapangan($id, $data) {
        $this->db->where('id_lapangan', $id);
        return $this->db->update('lapangan', $data);
    }

    public function deleteLapangan($id) {
        $this->db->where('id_lapangan', $id);
        return $this->db->delete('lapangan');
    }

    public function hapusLapangan($id_lapangan)
    {
        $this->db->delete('lapangan', ['id_lapangan' => $id_lapangan]);
    }

}
