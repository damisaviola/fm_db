<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('login'); 
        }
        $this->load->model('Lapangan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id'); 
        if (!$user_id) {
            redirect('login'); 
        }
    
    
        $this->load->model('Lapangan_model');
        $user_id = $this->session->userdata('user_id');  // Misalnya user_id diambil dari session
        $data['user_id'] = $user_id;    
        $data['lapangan'] = $this->Lapangan_model->get_all($user_id);
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/lapangan/lapangan', $data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');
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

    

    public function input_lapangan() { 
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/lapangan/input_lapangan');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');
    }

    public function tambah() {
    $this->form_validation->set_rules('nama', 'Nama Lapangan', 'required|trim');
    $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric'); 

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Semua data harus diisi!');
        redirect('admin/input_lapangan'); 
    } else {
    
        $config['upload_path']   = './uploads/lapangan/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; 

        $this->load->library('upload', $config);

       
        if (!$this->upload->do_upload('gambar')) {
        
            if ($this->upload->display_errors() == 'The file you are attempting to upload is larger than the permitted size.') {
                $this->session->set_flashdata('error', 'Ukuran file gambar tidak boleh lebih dari 2MB!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah file gambar! ' . 'Ukuran file gambar tidak boleh lebih dari 2MB!');
            }
            redirect('admin/input_lapangan');
        } else {
           
            $file_data = $this->upload->data();

         
            $data = [
                'nama'      => $this->input->post('nama', TRUE),
                'jenis'     => $this->input->post('jenis', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'gambar'    => $file_data['file_name'],
                'harga'     => $this->input->post('harga', TRUE),
                'user_id'   => $this->session->userdata('user_id'),
            ];                


           
           
            if ($this->Lapangan_model->insertLapangan($data)) {
                $this->session->set_flashdata('message', 'Data berhasil disimpan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data!');
            }

            redirect('admin/lapangan'); 
        }
    }
}


public function hapus($id_lapangan, $user_id)
{
    $lapangan = $this->Lapangan_model->getLapanganByIdAndUserId($id_lapangan, $user_id);

    if ($lapangan) {
        $gambarPath = FCPATH . 'uploads/lapangan/' . $lapangan->gambar;
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
        $this->Lapangan_model->hapusLapangan($id_lapangan, $user_id);
        $this->session->set_flashdata('message', 'Data lapangan berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Data lapangan tidak ditemukan atau tidak sesuai dengan user_id!');
    }

    redirect('admin/lapangan');
}






public function edit_lapangan($id_lapangan) {
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu!');
        redirect('admin/login');
    }
    $this->load->model('Lapangan_model');
    $lapangan = $this->Lapangan_model->getLapanganById($id_lapangan, $user_id);
    if (!$lapangan) {
        $this->session->set_flashdata('error', 'Data lapangan tidak ditemukan atau tidak memiliki izin akses!');
        redirect('admin/lapangan');
    }
    $data['lapangan'] = $lapangan;
    $this->load->view('admin/pelanggan/header');
    $this->load->view('admin/lapangan/edit_lapangan', $data);
    $this->load->view('admin/dashboard/menu');
    $this->load->view('admin/pelanggan/footer');
}


public function update($id_lapangan) {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
        $this->edit_lapangan($id_lapangan);
        $this->session->set_flashdata('error', 'Semua data harus diisi!');
        redirect('admin/edit_lapangan/' . $id_lapangan);
    } else {
        $config['upload_path']   = './uploads/lapangan/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; // 2MB
        $this->load->library('upload', $config);

        $data = [
            'nama'      => $this->input->post('nama', TRUE),
            'jenis'     => $this->input->post('jenis', TRUE),
            'harga'     => $this->input->post('harga', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
        ];

        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $file_data = $this->upload->data();
                $lapangan = $this->Lapangan_model->getLapanganById($id_lapangan, $this->session->userdata('user_id'));
                if (file_exists('./uploads/lapangan/' . $lapangan->gambar)) { 
                    unlink('./uploads/lapangan/' . $lapangan->gambar);
                }
                $data['gambar'] = $file_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                redirect('admin/edit_lapangan' . $id_lapangan);
            }
        }
        

        $user_id = $this->session->userdata('user_id');
        if ($this->Lapangan_model->updateLapangan($id_lapangan, $user_id, $data)) {
            $this->session->set_flashdata('message', 'Data berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data!');
        }
        redirect('admin/lapangan');
    }
}

}
