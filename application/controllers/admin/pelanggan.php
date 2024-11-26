<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('login'); 
        }
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/pelanggan', $data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');

    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama harus diisi.']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Format email tidak valid.'
        ]);
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|regex_match[/^[0-9]{10,15}$/]', [
            'required' => 'Nomor HP harus diisi.',
            'regex_match' => 'Nomor HP harus berupa angka 10-15 digit.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat harus diisi.']);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/input_pelanggan');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'alamat' => $this->input->post('alamat'),
            ];

            if ($this->Pelanggan_model->insert_pelanggan($data)) {
                $this->session->set_flashdata('message', 'Data pelanggan berhasil ditambahkan.');
                redirect('admin/pelanggan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data pelanggan.');
                redirect('admin/input_pelanggan');
            }
        }
    }
    


    public function input_pelanggan() {
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/input_pelanggan');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');

    }

    public function daftar_pelanggan() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/pelanggan', $data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');

    }


    

}
