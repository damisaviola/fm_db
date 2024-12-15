<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    public function get_all_bookings_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('booking')->result_array();
    }

    public function create_booking($data)
    {
        return $this->db->insert('booking', $data);
    }

    public function insert_pembayaran($data) {
        return $this->db->insert('pembayaran', $data);
    }

    public function get_pembayaran($filters = [], $user_id = null) {
        $this->db->select('*');
        $this->db->from('pembayaran');
    
        // Filter berdasarkan id_user
        if (!is_null($user_id)) {
            $this->db->where('user_id', $user_id);
        }
    
        // Mengaplikasikan filter tambahan (misalnya tanggal)
        if (!empty($filters)) {
            $this->db->where($filters);
        }
    
        $this->db->order_by('tanggal_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    

    public function delete_booking($id_booking, $user_id) {
        $this->db->where('id_booking', $id_booking);
        $this->db->where('user_id', $user_id);
        $result = $this->db->delete('booking');
        return $result; 
    }

    public function update_booking_status($id_booking, $data) {
        $this->db->where('id_booking', $id_booking);
        return $this->db->update('booking', $data); // Update status di tabel booking
    }


    public function get_booking_by_id($id_booking) {
        return $this->db->get_where('booking', ['id_booking' => $id_booking])->row_array();
    }

    public function get_booking_with_customer($id_booking) {
        $this->db->select('b.*, p.nama, l.nama'); // Ambil data booking, nama pelanggan, dan lapangan
        $this->db->from('booking b');
        $this->db->join('pelanggan p', 'b.id_pelanggan = p.id_pelanggan', 'left'); // Join tabel pelanggan
        $this->db->join('lapangan l', 'b.id_lapangan = l.id_lapangan', 'left');   // Join tabel lapangan
        $this->db->where('b.id_booking', $id_booking);
        return $this->db->get()->row_array();
    }
    
    

    public function get_all_bookings($user_id)
{
    $this->db->select('b.*, p.nama AS nama_pelanggan, l.nama AS nama_lapangan');
    $this->db->from('booking b');
    $this->db->join('pelanggan p', 'b.id_pelanggan = p.id_pelanggan');
    $this->db->join('lapangan l', 'b.id_lapangan = l.id_lapangan');
    $this->db->where('b.user_id', $user_id);
    $query = $this->db->get();
    return $query->result_array();
}

public function check_availability($id_lapangan, $tgl_bermain, $jam_awal, $jam_akhir)
{
    $jam_awal = date('H:i:s', strtotime($jam_awal));
    $jam_akhir = date('H:i:s', strtotime($jam_akhir));

    $this->db->where('id_lapangan', $id_lapangan);
    $this->db->where('tgl_bermain', $tgl_bermain);
    $this->db->group_start()
        ->where('jam_awal <=', $jam_akhir)
        ->where('jam_akhir >=', $jam_awal)
    ->group_end();

    $query = $this->db->get('booking');
    return $query->num_rows() === 0;
}


public function get_by_id($id_booking, $user_id) {
    $this->db->where('id_booking', $id_booking);
    $this->db->where('user_id', $user_id);  
    return $this->db->get('booking')->row_array(); 
}
public function update_booking($id_booking, $data)
{
    $this->db->where('id_booking', $id_booking);
    $this->db->update('booking', $data);
}

public function update($id_booking, $data) {
    $this->db->where('id_booking', $id_booking);
    return $this->db->update('booking', $data);
}

public function update_booking_data($id_booking, $user_id, $data) {
    $this->db->where('id_booking', $id_booking);
    $this->db->where('user_id', $user_id); 
    $this->db->update('booking', $data);
    return $this->db->affected_rows() > 0;
}


public function is_date_available($tanggal_mulai, $tanggal_selesai, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('tanggal_mulai <=', $tanggal_selesai);
        $this->db->where('tanggal_selesai >=', $tanggal_mulai);
        $query = $this->db->get('booking');

        return $query->num_rows() == 0; 
    }


    public function getBookingById($id_booking) {
        return $this->db->get_where('booking', ['id_booking' => $id_booking])->row_array();
    }







}
