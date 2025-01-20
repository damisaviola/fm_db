<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('mail');
        $this->load->library('form_validation'); 
        $this->load->model('User_model');
        $this->load->model('Subscription_model');  
        $this->load->helper('cookie');
    }

    public function index() {
        $remember_me = $this->input->cookie('remember_me', TRUE);

        if ($remember_me) {
            $credentials = json_decode($remember_me, TRUE);
            $user = $this->User_model->check_user($credentials['email'], $credentials['password']);

            if ($user && $user->is_active == 1) {
               
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_name', $user->full_name);
                $this->session->set_userdata('user_email', $user->email);
                $this->session->set_userdata('is_logged_in', TRUE);

                if ($this->is_subscribed($user)) {
                    redirect('admin');  
                } else {
                    redirect('home');   
                }
            } else {
                $this->session->set_flashdata('error', 'Akun Anda belum diaktifkan atau kredensial salah.');
                redirect('login');
            }
        }

        $this->load->view('auth/login');
    }

    public function authenticate() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Format email tidak valid.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password harus diisi.',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login');
        }

        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $remember_me = $this->input->post('remember_me', TRUE);

        $user = $this->User_model->check_user($email, $password);

        if ($user) {
           
            if ($user->is_active == 1) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_name', $user->full_name);
                $this->session->set_userdata('user_email', $user->email);
                $this->session->set_userdata('is_logged_in', TRUE);

                
                if ($this->is_subscribed($user)) {
                    redirect('admin');  
                } else {
                    $this->session->set_flashdata('error', 'Akun Anda belum berlangganan.');
                    redirect('home');  
                }

               
                if ($remember_me) {
                    $cookie_data = array(
                        'name'   => 'remember_me',
                        'value'  => json_encode(['email' => $email, 'password' => $password]),
                        'expire' => 300, 
                        'secure' => TRUE
                    );
                    $this->input->set_cookie($cookie_data);
                }
            } else {
                $this->session->set_flashdata('error', 'Akun Anda belum diaktifkan.');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email dan Password Anda salah.');
            redirect('login');
        }
    }

   
    private function is_subscribed($user) {
       
        $subscription = $this->Subscription_model->get_active_subscription($user->id);
        return $subscription !== NULL;  
    }

    public function logout() {
        $this->load->helper('cookie');
        if (get_cookie('remember_me')) {
            delete_cookie('remember_me');
        }
        $this->session->sess_destroy();
        redirect('login');
    }
}
