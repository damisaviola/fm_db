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
    }

    public function index() {
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/pelanggan');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');

    }


    public function input_pelanggan() {
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/input_pelanggan');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');

    }

    public function daftar_pelanggan() {
        $this->load->view('admin/pelanggan/header');
        $this->load->view('admin/pelanggan/pelanggan');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/pelanggan/footer');

    }


    

}
