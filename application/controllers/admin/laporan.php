<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->model('Subscription_model');
        $this->load->model('User_model');
        $this->load->library('session');
      
        if (!$this->session->userdata('is_logged_in')) {
      
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('login');
                }
                $user_id = $this->session->userdata('user_id');
                $user = $this->User_model->get_user_by_id($user_id);
                
                if (!$user || $user->is_active != '1') {
                
                    $this->session->set_flashdata('error', 'Akun Anda belum aktif.');
                    redirect('login');
                }
    
    
              
    }
        

    
     public function index() {
    $user_id = $this->session->userdata('user_id');
    $start_date = $this->input->get('start_date');
    $end_date = $this->input->get('end_date');

    $filters = [];
    if ($start_date) {
        $filters['tanggal_transaksi >='] = $start_date . ' 00:00:00';
    }
    if ($end_date) {
        $filters['tanggal_transaksi <='] = $end_date . ' 23:59:59';
    }

   
    $data['pembayaran'] = $this->Booking_model->get_pembayaran($filters, $user_id);
    $data['total_pemasukan'] = array_sum(array_column($data['pembayaran'], 'jumlah_bayar'));

  
  
    $this->load->view('admin/laporan/header');
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/laporan/laporan', $data);
    $this->load->view('admin/laporan/footer');
}

public function export_csv()
{

    $user_id = $this->session->userdata('user_id'); 

    $this->load->model('Booking_model');
    $data_lapangan = $this->Booking_model->get_pembayaran($user_id);
    $filename = 'data_laporan_' . date('Ymd') . '.csv';

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename={$filename}");
    header("Pragma: no-cache");
    header("Expires: 0");

    $file = fopen('php://output', 'w');


    $header = ['User ID', 'ID Pembayaran', 'ID Pelanggan', 'TOtal Harga', 'Metode', 'Jumlah Bayar', 'Tanggal Transaksi'];
    fputcsv($file, $header);

    foreach ($data_lapangan as $row) {
        $csv_row = [
            'user_id' => $user_id, 
            'id_booking' => $row['id_booking'],
            'id_pembayaran' => $row['id_pembayaran'],
            'id_pelanggan' => $row['id_pelanggan'],
            'total_harga' => $row['total_harga'],
            'metode' => $row['metode'],
            'jumlah_bayar' => $row['jumlah_bayar'],
            'tanggal_transaksi' => $row['tanggal_transaksi'],
        ];
        fputcsv($file, $csv_row);
    }

    fclose($file);
    exit();
}


}



    ?>