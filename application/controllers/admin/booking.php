<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;


class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Lapangan_model');
        $this->load->helper('pdf_helper');
        $this->load->model('Subscription_model');
        $this->load->model('User_model');


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
    
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Harap login terlebih dahulu.');
        redirect('auth/login');
    }

    $this->load->model('Booking_model');
    $data['bookings'] = $this->Booking_model->get_all_bookings($user_id);

    $this->load->view('admin/booking/header');
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/booking/booking', $data);
    $this->load->view('admin/booking/footer');
}

public function cetak($id_booking) {
    $this->load->model('Booking_model');
    $data['booking'] = $this->Booking_model->getBookingById($id_booking);

    if (!$data['booking']) {
        echo "error";
    }

    $html = $this->load->view('admin/bukti_booking', $data, true);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("Bukti_Booking_" . $id_booking . ".pdf", array("Attachment" => 0));
}


public function export_csv()
{
 
    $user_id = $this->session->userdata('user_id'); 
    $this->load->model('Booking_model');
    $data_booking = $this->Booking_model->get_all_bookings($user_id);
    $filename = 'data_booking_' . date('Ymd') . '.csv';

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename={$filename}");
    header("Pragma: no-cache");
    header("Expires: 0");

    $file = fopen('php://output', 'w');
    $header = [
        'User ID', 
        'ID Booking', 
        'Nama Pelanggan', 
        'Nama Lapangan', 
        'Tanggal Bermain', 
        'Tanggal Booking', 
        'Jam Awal', 
        'Jam Akhir', 
        'Status', 
        'Total Harga'
    ];
    fputcsv($file, $header);

    foreach ($data_booking as $row) {
        $csv_row = [
            'user_id' => $row['user_id'], 
            'id_booking' => $row['id_booking'],
            'nama_pelanggan' => $row['nama_pelanggan'],
            'nama_lapangan' => $row['nama_lapangan'],
            'tgl_bermain' => date('d-m-Y', strtotime($row['tgl_bermain'])),
            'tgl_booking' => date('d-m-Y', strtotime($row['tgl_booking'])),
            'jam_awal' => $row['jam_awal'],
            'jam_akhir' => $row['jam_akhir'],
            'status' => ucfirst($row['status']),
            'total_harga' => 'Rp ' . number_format($row['harga'], 2, ',', '.'),
            'tanggal_transaksi' => date('Y-m-d H:i:s')
        ];
        fputcsv($file, $csv_row);
    }

    fclose($file);
    exit();
}



    public function input_booking() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Harap login terlebih dahulu.');
            redirect('login');
        }
    
      
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan($user_id);
        $data['lapangan'] = $this->Lapangan_model->get_all_lapangan($user_id);
        $this->load->view('admin/booking/header'); 
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/booking/input_booking', $data); 
        $this->load->view('admin/booking/footer'); 
    }
    

    public function create()
    {
        
        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('id_lapangan', 'Lapangan', 'required');
        $this->form_validation->set_rules('tanggal_bermain', 'Tanggal Bermain', 'required');
        $this->form_validation->set_rules('jam_awal', 'Jam Awal', 'required');
        $this->form_validation->set_rules('jam_akhir', 'Jam Akhir', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    
        if ($this->form_validation->run() === FALSE) {
            $user_id = $this->session->userdata('user_id');
            $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan($user_id);
            $data['lapangan'] = $this->Lapangan_model->get_all_lapangan($user_id);
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/input_booking');
        } else {
            $booking_data = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_lapangan' => $this->input->post('id_lapangan'),
                'user_id' => $this->session->userdata('user_id'),
                'tgl_bermain' => $this->input->post('tanggal_bermain'),
                'tgl_booking' => $this->input->post('tanggal_booking'),
                'jam_awal' => $this->input->post('jam_awal'),
                'jam_akhir' => $this->input->post('jam_akhir'),
                'harga' => $this->input->post('harga'),
                'status' => 'belum lunas',
            ];
            $is_available = $this->Booking_model->check_availability(
                $booking_data['id_lapangan'],
                $booking_data['tgl_bermain'],
                $booking_data['jam_awal'],
                $booking_data['jam_akhir']
            );
    
            if ($is_available) {
                $this->Booking_model->create_booking($booking_data);
                $this->session->set_flashdata('message', 'Booking berhasil ditambahkan!');
                redirect('admin/booking');
            } else {
                $this->session->set_flashdata('error', 'Lapangan sudah dibooking di jam tersebut.');
                redirect('admin/input_booking');
            }
        }
    }


    public function update_booking($id_booking) {
        
        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('id_lapangan', 'Lapangan', 'required');
        $this->form_validation->set_rules('tanggal_bermain', 'Tanggal Bermain', 'required');
        $this->form_validation->set_rules('jam_awal', 'Jam Awal', 'required');
        $this->form_validation->set_rules('jam_akhir', 'Jam Akhir', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    
       
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/edit_halaman/' . $id_booking);
            return;
        }
    
        
        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_lapangan' => $this->input->post('id_lapangan'),
            'tgl_bermain' => $this->input->post('tanggal_bermain'),
            'jam_awal' => $this->input->post('jam_awal'),
            'jam_akhir' => $this->input->post('jam_akhir'),
            'harga' => $this->input->post('harga'),
        ];
    
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu!');
            redirect('login');
            return;
        }
    
        $booking = $this->Booking_model->get_by_id($id_booking, $user_id);
        if (!$booking) {
            $this->session->set_flashdata('error', 'Data booking tidak ditemukan atau bukan milik Anda.');
            redirect('admin/booking');
            return;
        }
    
       
        $is_time_changed = 
            $data['id_lapangan'] != $booking['id_lapangan'] ||
            $data['tgl_bermain'] != $booking['tgl_bermain'] ||
            $data['jam_awal'] != $booking['jam_awal'] ||
            $data['jam_akhir'] != $booking['jam_akhir'];
    
        if ($is_time_changed) {
            $is_available = $this->Booking_model->check_availability(
                $data['id_lapangan'],
                $data['tgl_bermain'],
                $data['jam_awal'],
                $data['jam_akhir'],
                $id_booking
            );
    
            if (!$is_available) {
                $this->session->set_flashdata('error', 'Lapangan sudah dipesan pada waktu tersebut!');
                redirect('admin/edit_halaman/' . $id_booking);
                return;
            }
        }
    
        if ($this->Booking_model->update_booking_data($id_booking, $user_id, $data)) {
            $this->session->set_flashdata('message', 'Data booking berhasil diperbarui!');
        } else {
            if ($this->db->affected_rows() === 0) {
                $this->session->set_flashdata('message', 'Tidak ada perubahan pada data booking.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data booking!');
            }
        }
    
        redirect('admin/booking');
    }
    
    

public function edit_halaman($id_booking) {

    $user_id = $this->session->userdata('user_id'); 
    $this->load->model('Booking_model');
    $this->load->model('Pelanggan_model');
    $this->load->model('Lapangan_model');
    

    $data['booking'] = $this->Booking_model->get_by_id($id_booking, $user_id);
    if (!$data['booking']) {
     echo "error"; 
    }

    $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan($user_id);
    $data['lapangan'] = $this->Lapangan_model->get_all_lapangan($user_id);


    $this->load->view('admin/booking/header'); 
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/booking/edit_booking', $data); 
    $this->load->view('admin/booking/footer');
}



public function hapus_booking($id_booking) {
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu!');
        redirect('login');
    }
    $result = $this->Booking_model->delete_booking($id_booking, $user_id);
    if ($result) {
        $this->session->set_flashdata('message', 'Data booking berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data booking!');
    }
    redirect('admin/booking');
}


public function pay($id_booking) {
    $this->load->model('Booking_model');


    $data['booking'] = $this->Booking_model->get_booking_with_customer($id_booking);

    if (!$data['booking']) {
        $this->session->set_flashdata('error', 'Data booking tidak ditemukan.');
        redirect('admin/booking');
    }


    $this->load->view('admin/booking/header');
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/booking/payment_detail', $data);
    $this->load->view('admin/booking/footer');
}



public function process_payment() {
    $id_booking = $this->input->post('id_booking');
    $payment_method = $this->input->post('payment_method');


    $data = [
        'status' => 'lunas', 
        'payment_method' => $payment_method
    ];
    $this->Booking_model->update_booking($id_booking, $data);

    $this->session->set_flashdata('success', 'Pembayaran berhasil diproses.');
    redirect('admin/booking');
}

public function proses_pembayaran() {
    $this->load->model('Booking_model');

    // Validasi input dari form
    $this->form_validation->set_rules('id_booking', 'ID Booking', 'required|integer');
    $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required|integer');
    $this->form_validation->set_rules('total_harga', 'Total Harga', 'required|numeric');
    $this->form_validation->set_rules('metode', 'Metode Pembayaran', 'required|in_list[tunai,qris]');
    $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required|numeric');

    // Jika validasi gagal
    if ($this->form_validation->run() === FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/booking/pay/' . $this->input->post('id_booking'));
        return;
    }

    // Ambil data dari input
    $id_booking = $this->input->post('id_booking');
    $id_pelanggan = $this->input->post('id_pelanggan');
    $total_harga = str_replace(['Rp', '.', ','], '', $this->input->post('total_harga'));
    $metode = $this->input->post('metode');
    $jumlah_bayar = $this->input->post('jumlah_bayar') ?: $total_harga;
    $kembalian = ($metode == 'tunai') ? $jumlah_bayar - $total_harga : 0;

    // Data yang akan disimpan
    $data = [
        'id_booking'    => $id_booking,
        'id_pelanggan'  => $id_pelanggan,
        'total_harga'   => $total_harga,
        'metode'        => $metode,
        'jumlah_bayar'  => $jumlah_bayar,
        'kembalian'     => $kembalian,
        'user_id'       => $this->session->userdata('user_id'),
    ];

    // Insert pembayaran ke database
    if ($this->Booking_model->insert_pembayaran($data)) {
        // Update status booking
        $update_status = ['status' => 'Lunas'];
        $this->Booking_model->update_booking_status($id_booking, $update_status);

        $this->session->set_flashdata('message', 'Pembayaran berhasil diproses dan status booking diperbarui menjadi Lunas!');
    } else {
        $this->session->set_flashdata('error', 'Gagal memproses pembayaran!');
    }

    redirect('admin/booking');
}




}





