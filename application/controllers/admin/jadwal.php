<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jadwal_model');
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
        $data['jadwal'] = $this->Jadwal_model->get_jadwal_belum_lunas();
        $this->load->view('admin/jadwal/header');
        $this->load->view('admin/jadwal/jadwal', $data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/jadwal/footer');
    }
}

?>