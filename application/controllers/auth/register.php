<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('mail');
        $this->load->library('form_validation'); 
        $this->load->model('User_model');
      
    }


    public function index() {
        $this->load->view('auth/register');
    }

  
    public function register_user() {
       
        $email = $this->input->post('email');
        $full_name = $this->input->post('full_name');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $phone = $this->input->post('phone');
        $activation_code = md5(uniqid(rand(), true));
    
      
        $data = array(
            'email' => $email,
            'full_name' => $full_name,
            'password' => $password,
            'phone' => $phone,
            'activation_code' => $activation_code
        );
    
        if ($this->User_model->insert_user($data)) {
            $this->send_activation_email($email, $activation_code);
    
            $this->session->set_flashdata('message', 'Registrasi berhasil! Cek email Anda untuk aktivasi.');
            redirect('register'); 
        } else {
            $this->session->set_flashdata('error', 'Registrasi gagal.');
            redirect('register');
        }
    }
    
    private function send_activation_email($email, $activation_code) {
        $activation_url = site_url('auth/register/activate/' . $activation_code);
        $subject = "Aktivasi Akun Anda";
        $message = "<p>Terima kasih telah mendaftar. Klik tautan berikut untuk mengaktifkan akun Anda:</p>";
        $message .= "<p><a href='$activation_url'>$activation_url</a></p>";
    

        $sent = $this->mail->send($email, $subject, $message);
    
        if (!$sent) {
            log_message('error', 'Email aktivasi gagal dikirim.');
        }
    }
    


    public function activate($activation_code)
    {
        if ($this->User_model->activate_account($activation_code)) {
            $this->session->set_flashdata('message', 'Akun Anda berhasil diaktifkan!');
        } else {
            $this->session->set_flashdata('error', 'Aktivasi akun gagal.');
        }
        redirect('login');
    }
}