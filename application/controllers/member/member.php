<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->model('Subscription_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Lapangan_model');
        $this->load->model('Booking_model');
        $this->load->model('Transaksi_model');
        $user_id = $this->session->userdata('user_id');
       
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
          
            $lapangan_usage = $this->Lapangan_model->get_lapangan_usage();
            $labels = [];
            $data = [];
        
            foreach ($lapangan_usage as $usage) {
                $labels[] = "Lapangan " . $usage['id_lapangan'];
                $data[] = $usage['usage_count'];
            }
        
            $data['lapangan_labels'] = json_encode($labels);
            $data['lapangan_data'] = json_encode($data);
        
        
            $user_id = $this->session->userdata('user_id');
        
       
            $subscription_data = $this->Subscription_model->get_subscription_by_user($user_id);
            $data['subscription_start_date'] = $subscription_data ? $subscription_data['start_date'] : null;
            $data['subscription_end_date'] = $subscription_data ? $subscription_data['end_date'] : null;
            $data['subscription_plan_name'] = $subscription_data ? $subscription_data['plan_name'] : null;
        
      
            $data['recent_customers'] = $this->Pelanggan_model->get_recent_customers($user_id);
            $data['total_customers'] = $this->Pelanggan_model->get_total_customers_by_user($user_id);
            $data['total_lapangan'] = $this->Lapangan_model->get_total_lapangan_by_user($user_id);
            $data['total_booking'] = $this->Booking_model->get_total_booking_by_user($user_id);
            $data['total_transaksi'] = $this->Transaksi_model->get_total_transaksi_by_user($user_id);
        
       
            $data['bookings'] = $this->Booking_model->get_all_bookings($user_id);
            $data['transactions_per_month'] = $this->Transaksi_model->get_transactions_per_month($user_id);
        
      
            $this->load->view('member/dashboard/header');
            $this->load->view('member/dashboard/dashboard', $data);
            $this->load->view('member/dashboard/menu');
            $this->load->view('member/dashboard/footer');
        }
        

            


}
