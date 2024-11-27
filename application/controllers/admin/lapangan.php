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
        $data['lapangan'] = $this->Lapangan_model->get_all();
            $this->load->view('admin/pelanggan/header');
            $this->load->view('admin/lapangan/lapangan', $data);
            $this->load->view('admin/dashboard/menu');
            $this->load->view('admin/pelanggan/footer');

       
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

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Semua data harus diiisi!');
            redirect('admin/lapangan'); 
        } else {
            $config['upload_path']   = './uploads/lapangan/'; 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['max_size']      = 2048; 
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/lapangan/input_lapangan'); 
            } else {
                $file_data = $this->upload->data();
                $data = [
                    'nama'      => $this->input->post('nama', TRUE),
                    'jenis'     => $this->input->post('jenis', TRUE),
                    'deskripsi' => $this->input->post('deskripsi', TRUE),
                    'gambar'    => $file_data['file_name'] 
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

    public function hapus($id_lapangan)
{
    $lapangan = $this->Lapangan_model->getLapanganById($id_lapangan);

    if ($lapangan) {
        $gambarPath = FCPATH . 'uploads/lapangan/' . $lapangan->gambar; 
        if (file_exists($gambarPath)) {
            unlink($gambarPath); 
        }
        $this->Lapangan_model->hapusLapangan($id_lapangan);
        $this->session->set_flashdata('message', 'Data lapangan berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Data lapangan tidak ditemukan!');
    }
    redirect('admin/lapangan');
}


    
}
