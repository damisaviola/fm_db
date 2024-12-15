<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login'); // Redirect ke halaman login jika belum login
        }
        
    }

    
     public function index() {
    // Cek ID user dari sesi
    $user_id = $this->session->userdata('user_id');

    // Kode laporan di bawah ini hanya dijalankan setelah debugging selesai
    $start_date = $this->input->get('start_date');
    $end_date = $this->input->get('end_date');

    $filters = [];
    if ($start_date) {
        $filters['tanggal_transaksi >='] = $start_date . ' 00:00:00';
    }
    if ($end_date) {
        $filters['tanggal_transaksi <='] = $end_date . ' 23:59:59';
    }

    // Ambil data laporan berdasarkan id_user
    $data['pembayaran'] = $this->Booking_model->get_pembayaran($filters, $user_id);
    $data['total_pemasukan'] = array_sum(array_column($data['pembayaran'], 'jumlah_bayar'));

    // Load view laporan
  
    $this->load->view('admin/laporan/header');
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/laporan/laporan', $data);
    $this->load->view('admin/laporan/footer');
}

public function export_csv()
{

    $user_id = $this->session->userdata('user_id'); 

    $this->load->model('Lapangan_model');
    $data_lapangan = $this->Lapangan_model->get_all_lapangan($user_id);
    $filename = 'data_lapangan_' . date('Ymd') . '.csv';

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename={$filename}");
    header("Pragma: no-cache");
    header("Expires: 0");

    $file = fopen('php://output', 'w');


    $header = ['User ID', 'ID Lapangan', 'Nama Lapangan', 'Harga', 'deskripsi'];
    fputcsv($file, $header);

    foreach ($data_lapangan as $row) {
        $csv_row = [
            'user_id' => $user_id, 
            'id_lapangan' => $row['id_lapangan'],
            'nama' => $row['nama'],
            'harga' => $row['harga'],
            'deskripsi' => $row['deskripsi']
        ];
        fputcsv($file, $csv_row);
    }

    fclose($file);
    exit();
}


}



    ?>