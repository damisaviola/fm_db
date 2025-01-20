<?php

use Midtrans\Config;
use Midtrans\Snap;

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->config('midtrans'); 
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $plan_name = 'elite'; 
        $plan_details = $this->get_plan_details($plan_name);

        $price = (float) str_replace(['Rp', 'K', '.'], '', $plan_details['price']);
        $formatted_price = number_format($price, 0, ',', '.');

        $data = [
            'plan_name' => $plan_details['name'],
            'price' => 'Rp ' . $formatted_price,
            'features' => $plan_details['features'],
        ];

        $this->load->view('plans/payment_form', $data);
    }

    public function checkout() {
        $plan_name = $this->input->post('plan_name');
        $price = (float) $this->input->post('price');
        $user_id = $this->session->userdata('user_id');
    
        if (!$user_id) {
            redirect('login');
        }
    
        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_id($user_id);
    
        if (!$user) {
            show_error('Data pengguna tidak ditemukan.');
        }
    
        $this->load->library('Midtrans');
    

        Config::$serverKey = $this->config->item('midtrans_server_key');
        Config::$clientKey = $this->config->item('midtrans_client_key');
        Config::$isProduction = $this->config->item('midtrans_is_production');
        Config::$isSanitized = $this->config->item('midtrans_is_sanitized');
        Config::$is3ds = $this->config->item('midtrans_is_3ds');
    
        $transaction_details = [
            'order_id' => uniqid('order_'),
            'gross_amount' => $price,
        ];
    

        $customer_details = [
            'first_name' => $user->full_name,
            'email' => $user->email,
            'phone' => $user->phone,
        ];
    

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];
    
        try {
   
            $snapToken = Snap::getSnapToken($transaction_data);
            $start_date = date('Y-m-d H:i:s');
            $end_date = date('Y-m-d H:i:s', strtotime('+1 month'));  

            $payment_data = [
                'user_id' => $user_id,
                'plan_name' => $plan_name,
                'price' => $price,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ];

       
            $this->load->model('Subscription_model');
            if ($this->Subscription_model->create_subscription($payment_data)) {
                $data['snapToken'] = $snapToken;
                $this->load->view('plans/snap_redirect', $data);
            } else {
                show_error('Failed to save payment data.');
            }
    
        } catch (Exception $e) {
            show_error('Error: ' . $e->getMessage());
        }
    }

    private function get_plan_details($plan_name) {
        $plans = [
            'elite' => [
                'name' => 'Elite Plan',
                'price' => '200000',
                'features' => [
                    'All Features In Pro Plan',
                    'Event Organizer',
                    'Reporting Analytics',
                    'Transaction Management',
                    'Backup & Restore'
                ]
            ],
            'pro' => [
                'name' => 'Pro Plan',
                'price' => '100000',
                'features' => [
                    'Schedule Management',
                    'Booking Management',
                    'Futsal Court Management',
                    'Backup & Restore'
                ]
            ]
        ];

        return $plans[$plan_name] ?? null;
    }
}
