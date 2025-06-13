<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
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
        if ($user_id) {
            $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan($user_id);
        } else {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('login');
        }
    
        $this->load->view('admin/member/header');
         $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/member/daftar_member', $data);
        $this->load->view('admin/member/footer');
    }


    public function export_csv()
    {
        $user_id = $this->session->userdata('user_id'); 
        $this->load->model('Pelanggan_model');
        $data_pelanggan = $this->Pelanggan_model->get_all_pelanggan($user_id);
    
        $filename = 'data_pelanggan_' . date('Ymd') . '.csv';
    
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename={$filename}");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        $file = fopen('php://output', 'w');
        $header = ['User ID', 'ID Pelanggan', 'Nama', 'Email', 'Telepon', 'Alamat'];
        fputcsv($file, $header);
        foreach ($data_pelanggan as $row) {
            $csv_row = [
                'user_id' => $user_id, 
                'id_pelanggan' => $row['id_pelanggan'],
                'nama' => $row['nama'],
                'email' => $row['email'],
                'telepon' => $row['nomor_hp'],
                'alamat' => $row['alamat']
            ];
            fputcsv($file, $csv_row);
        }
    
        fclose($file);
        exit();
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
                'user_id'   => $this->session->userdata('user_id')
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
         $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|regex_match[/^[0-9]{10,15}$/]', [
        'required' => 'Nomor telepon harus diisi.',
        'regex_match' => 'Nomor telepon harus berupa angka 10-15 digit.'
    ]);
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
    
         
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                $this->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
                redirect('login'); 
            }
            $this->Pelanggan_model->update_pelanggan_data($id, $user_id, $data);
    
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
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan($user_id);
        } else {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu!');
            redirect('login'); 
        }
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/pelanggan', $data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');
    }
    

    public function edit_pelanggan($id)
    {
        $this->load->model('Pelanggan_model');
    
        if (!is_numeric($id) || $id <= 0) {
            $this->session->set_flashdata('error', 'ID pelanggan tidak valid.');
            redirect('admin/pelanggan');
        }
    
        $user_id = $this->session->userdata('user_id');
        
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('login'); 
        }
    
    
        $data['pelanggan'] = $this->Pelanggan_model->getById($id, $user_id);
    
        if (!$data['pelanggan']) {
            $this->session->set_flashdata('error', 'Data pelanggan tidak ditemukan.');
            redirect('admin/pelanggan');
        }
    
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/edit_pelanggan', $data);
        $this->load->view('admin/dashboard/menu', $data);
        $this->load->view('admin/pelanggan/footer');
    }
    

public function hapus($id_pelanggan) {

    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu!');
        redirect('login'); 
    }

    if ($this->Pelanggan_model->hapus_pelanggan($id_pelanggan, $user_id)) {
        $this->session->set_flashdata('message', 'Pelanggan berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus pelanggan.');
    }

    redirect('admin/pelanggan');
}

    

}
