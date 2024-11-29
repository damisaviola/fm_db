<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function index() {
        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('login'); 
        }

   
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user_by_id($user_id);

        if (!$user || $user->is_active != '1') {
            $this->session->set_flashdata('error', 'Akun Anda belum aktif atau belum .');
            redirect('login'); 
        }
        $this->load->view('admin/dashboard/header');
        $this->load->view('admin/dashboard/dashboard');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/dashboard/footer');
    }


}
