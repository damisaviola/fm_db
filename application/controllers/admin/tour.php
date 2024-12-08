<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tour_model');
        $this->load->library('form_validation');
        $this->load->model('Booking_model');    
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('login');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['tour'] = $this->Tour_model->get_tours_by_user($user_id);
        $this->load->view('admin/tour/header');
        $this->load->view('admin/tour/tour', $data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/tour/footer');
    }


    public function export_csv(){
    $user_id = $this->session->userdata('user_id'); 


    $this->load->model('Tour_model');
    $data_tour = $this->Tour_model->get_all_tour($user_id);

    $filename = 'data_tour_' . date('Ymd') . '.csv';

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename={$filename}");
    header("Pragma: no-cache");
    header("Expires: 0");

    $file = fopen('php://output', 'w');

    $header = [
        'ID Tour', 
        'ID User', 
        'Nama Tour', 
        'Deskripsi', 
        'Tanggal Mulai', 
        'Tanggal Selesai'
    ];
    fputcsv($file, $header);

    foreach ($data_tour as $row) {
        $csv_row = [
            'id_tour' => $row['id_tour'], 
            'id_user' => $row['id_user'], 
            'nama_tour' => $row['nama_tour'],
            'deskripsi' => $row['deskripsi_tour'],
            'tanggal_mulai' => date('d-m-Y', strtotime($row['tanggal_mulai'])),
            'tanggal_selesai' => date('d-m-Y', strtotime($row['tanggal_selesai'])),
        ];
        fputcsv($file, $csv_row);
    }

    fclose($file);
    exit();
}



    public function input_tour() {
        $this->load->view('admin/tour/header');
        $this->load->view('admin/tour/input_tour');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/tour/footer');

    }


    public function add()
    {
        $this->form_validation->set_rules('nama_tour', 'Nama Tour', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Semua data harus diisi!');
            redirect('admin/tour/input_tour');
        } else {
            $data = [
                'user_id' => $this->session->userdata('user_id'),
                'nama_tour' => $this->input->post('nama_tour'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'deskripsi_tour' => $this->input->post('deskripsi_tour'),
            ];
    
            $user_id = $this->session->userdata('user_id');
            $tgl_mulai = $data['tanggal_mulai'];
            $tgl_selesai = $data['tanggal_selesai'];
    
        
            if ($this->Tour_model->check_booking_conflict($tgl_mulai, $tgl_selesai, $user_id)) {
                $this->session->set_flashdata('error', 'Tanggal bermain pada tour konflik dengan data booking yang ada.');
                redirect('admin/tour/input_tour');
            }
            if ($this->Tour_model->check_tour_availability($tgl_mulai, $tgl_selesai, $user_id)) {
                $this->session->set_flashdata('error', 'Jadwal tour konflik dengan jadwal tour lainnya.');
                redirect('admin/tour/input_tour');
            }
    
            $this->Tour_model->insert_tour($data);
            $this->session->set_flashdata('message', 'Data tour berhasil ditambahkan.');
            redirect('admin/tour');
        }
    }

    public function edit_tour($id_tour)
{
    $user_id = $this->session->userdata('user_id');
    $data['tour'] = $this->Tour_model->get_tour_by_id($id_tour, $user_id);

    if (!$data['tour']) {
        redirect('admin/tour');
    }
    $this->load->view('admin/tour/header');
    $this->load->view('admin/tour/edit_tour', $data);
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/tour/footer');
}

public function update($id_tour)
{       

    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Anda harus login untuk mengubah data.');
        redirect('admin/tour');
    } 

    $this->form_validation->set_rules('nama_tour', 'Nama Tour', 'required');
    $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
    $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');

    if ($this->form_validation->run() === FALSE) {
        echo "error";
        $this->edit($id_tour); 
    } else {
        $user_id = $this->session->userdata('user_id');
        $data = [
            'nama_tour' => $this->input->post('nama_tour'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'deskripsi_tour' => $this->input->post('deskripsi_tour'),
        ];

        $tgl_mulai = $data['tanggal_mulai'];
        $tgl_selesai = $data['tanggal_selesai'];

   
        if ($this->Tour_model->check_booking_conflict($tgl_mulai, $tgl_selesai, $user_id)) {
            $this->session->set_flashdata('error', 'Tanggal bermain konflik dengan data booking.');
            redirect('admin/tour/edit/' . $id_tour);
        }

        if ($this->Tour_model->check_tour_availability_for_edit($tgl_mulai, $tgl_selesai, $id_tour, $user_id)) {
            $this->session->set_flashdata('error', 'Jadwal tour konflik dengan jadwal tour lain.');
            redirect('admin/tour/edit/' . $id_tour);
        }

        if ($this->Tour_model->update_tour($id_tour, $user_id, $data)) {
            $this->session->set_flashdata('message', 'Data tour berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data tour.');
        }

        redirect('admin/tour');
    }

}
}

