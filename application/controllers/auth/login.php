<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('mail');
        $this->load->library('form_validation'); 
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function forget() {
        $this->load->view('auth/forgot');
    }

    public function authenticate() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login');
        }

        $email = $this->input->post('email', TRUE); 
        $password = $this->input->post('password', TRUE); 

        $user = $this->User_model->check_user($email, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('user_name', $user->full_name);
            $this->session->set_userdata('user_email', $user->email);
            $this->session->set_userdata('is_logged_in', TRUE);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah, atau akun Anda belum diaktifkan.');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}