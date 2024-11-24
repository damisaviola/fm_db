<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('mail');
        $this->load->model('User_model');
        $this->load->library('form_validation'); 
        $this->load->helper('url');
    }


    public function index() {
        $this->load->view('auth/forgot');
    }

    public function reset_password_request() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login/identify');
        }
    
        $email = $this->input->post('email');
        $user = $this->User_model->get_user_by_email($email);
    
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $this->User_model->save_reset_token($user->id, $token);
    

            $reset_link = site_url('auth/forgot/reset_password_form/' . $token);
            $message = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        background-color: #f9f9f9;
                        color: #333;
                        margin: 0;
                        padding: 0;
                    }
                    .email-container {
                        max-width: 600px;
                        margin: 20px auto;
                        background: #ffffff;
                        border: 1px solid #dddddd;
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                    }
                    .header {
                        background: #198754;
                        color: #ffffff;
                        text-align: center;
                        padding: 15px;
                        border-radius: 8px 8px 0 0;
                    }
                    .header h1 {
                        margin: 0;
                        font-size: 24px;
                    }
                    .content {
                        padding: 20px;
                        text-align: center;
                    }
                    .content p {
                        font-size: 16px;
                        margin: 15px 0;
                    }
                    .content a {
                        display: inline-block;
                        background: #198754;
                        color: #ffffff;
                        text-decoration: none;
                        font-weight: bold;
                        padding: 10px 20px;
                        border-radius: 4px;
                        margin-top: 10px;
                    }
                    .content a:hover {
                        background: #198754;
                    }
                    .footer {
                        text-align: center;
                        padding: 10px;
                        font-size: 12px;
                        color: #999;
                        border-top: 1px solid #dddddd;
                    }
                </style>
            </head>
            <body>
                <div class="email-container">
                    <div class="header">
                        <h1>Reset Password</h1>
                    </div>
                    <div class="content">
                        <p>Halo,</p>
                        <p>Kami menerima permintaan untuk mereset password akun Anda.</p>
                        <p>Jika ini benar, silakan klik tombol di bawah untuk mereset password Anda:</p>
                        <a href="' . $reset_link . '">Reset Password</a>
                        <p>Jika Anda tidak meminta ini, abaikan email ini.</p>
                    </div>
                    <div class="footer">
                        <p>© 2024 Booth. Semua hak dilindungi.</p>
                    </div>
                </div>
            </body>
            </html>';
            
    
            $this->load->library('mail');
            $subject = 'Reset Password';
            $from_email = 'no-reply@yourdomain.com'; 
            $from_name = 'Booth.';  
    
            $send = $this->mail->send($email, $subject, $message, $from_email, $from_name);
    
            if ($send) {
                $this->session->set_flashdata('message', 'Link reset password telah dikirim ke email Anda.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengirim email. Coba lagi.');
            }
        } else {
            $this->session->set_flashdata('error', 'Email tidak ditemukan.');
        }
    
        redirect('login/identify');
    }
    

    public function reset() {
      $this->load->view('auth/reset_password_form');
    }

    public function reset_password_form($token = null) {
        if ($token) {
            $this->load->model('User_model');
            $user = $this->User_model->get_user_by_token($token);
            if ($user) {
                $data['token'] = $token;
                $this->load->view('auth/reset_password_form', $data);  
            } else {
                $this->session->set_flashdata('error', 'Token tidak valid atau telah kedaluwarsa.');
                redirect('login/identify');
            }
        } else {
            redirect('login/identify');
        }
    }

    public function reset_password() {
     
        $this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
          
            redirect('auth/forgot/reset_password_form/' . $this->input->post('token'));
        }
    
    
        $token = $this->input->post('token');
        $password = $this->input->post('password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_token($token);
    
        if ($user) {
         
            $this->User_model->update_password($user->id, $hashed_password);
    
          
            $this->User_model->clear_reset_token($user->id);
    
          
            $this->session->set_flashdata('message', 'Password berhasil diperbarui. Silakan login.');
            redirect('login');
        } else {
        
            $this->session->set_flashdata('error', 'Token tidak valid atau telah kedaluwarsa.');
            redirect('auth/forgot/reset_password_form/' . $token);
        }
    }
}