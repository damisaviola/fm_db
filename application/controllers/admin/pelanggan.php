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
        $this->load->helper('url');
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

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/pelanggan/edit_pelanggan/' . $id);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->Pelanggan_model->updatePelanggan($id, $data);

            $this->session->set_flashdata('message', 'Data pelanggan berhasil diperbarui!');
            redirect('admin/pelanggan');
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
        $this->load->view('admin/pelanggan/footer', $data);

    }

    public function edit_pelanggan($id)
{
    // Pastikan model sudah dimuat
    $this->load->model('Pelanggan_model');

    // Validasi ID, pastikan ID valid
    if (!is_numeric($id) || $id <= 0) {
        $this->session->set_flashdata('error', 'ID pelanggan tidak valid.');
        redirect('admin/pelanggan');
    }
    $data['pelanggan'] = $this->Pelanggan_model->getById($id);
    if (!$data['pelanggan']) {
        $this->session->set_flashdata('error', 'Data pelanggan tidak ditemukan.');
        redirect('admin/pelanggan');
    }

    // Muat tampilan
    $this->load->view('admin/pelanggan/header');
    $this->load->view('admin/pelanggan/edit_pelanggan', $data);
    $this->load->view('admin/dashboard/menu', $data);
    $this->load->view('admin/pelanggan/footer');
}


    public function hapus($id) {
        if ($this->Pelanggan_model->hapusPelanggan($id)) {
            $this->session->set_flashdata('message', 'Pelanggan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pelanggan.');
        }
        redirect('admin/pelanggan');
    }
    

}
