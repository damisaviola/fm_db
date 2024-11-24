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
        // Aturan validasi
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
        'required' => 'Email harus diisi.',
        'valid_email' => 'Format email tidak valid.',
        'is_unique' => 'Email ini sudah digunakan.'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]', [
        'required' => 'Password harus diisi.',
        'min_length' => 'Password minimal 6 karakter.'
    ]);
    $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|regex_match[/^[0-9]{10,15}$/]', [
        'required' => 'Nomor telepon harus diisi.',
        'regex_match' => 'Nomor telepon harus berupa angka 10-15 digit.'
    ]);

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('register'); // Tampilkan kembali form registrasi
    } else {
       
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
}
    
    private function send_activation_email($email, $activation_code) {
        $activation_url = site_url('auth/register/activate/' . $activation_code);
        $subject = "Aktivasi Akun Anda";
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
                    <h1>Aktivasi Akun</h1>
                </div>
                <div class="content">
                    <p>Terima kasih telah mendaftar di layanan kami!</p>
                    <p>Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini:</p>
                    <a href="' . $activation_url . '">Aktifkan Akun</a>
                    <p>Jika Anda tidak mendaftar akun, silakan abaikan email ini.</p>
                </div>
                <div class="footer">
                    <p>© 2024 Perusahaan Anda. Semua hak dilindungi.</p>
                </div>
            </div>
        </body>
        </html>';

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