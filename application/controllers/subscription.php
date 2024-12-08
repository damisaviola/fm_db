<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Midtrans\Config;
use Midtrans\Snap;

class Subscription extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->model('Subscription_model');
        $this->load->model('User_model');

        // Konfigurasi Midtrans
        Config::$serverKey = config_item('midtrans_server_key');
        Config::$isProduction = config_item('midtrans_is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

  
    public function index() {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            redirect('login');
        }

        $subscription = $this->Subscription_model->get_active_subscription($user_id);

        if ($subscription) {
            redirect('dashboard'); 
        } else {
            redirect('subscription/choose_plan'); 
        }
    }

  
    public function choose_plan() {
        $this->load->view('subscription/choose_plan'); 
    }

 
    public function process_plan() {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            redirect('login');
        }

        $plan = $this->input->post('plan');
        $price = $plan === 'pro' ? 100000 : ($plan === 'elite' ? 200000 : 0);

        if (!$plan || $price <= 0) {
            $this->session->set_flashdata('error', 'Plan tidak valid.');
            redirect('subscription/choose_plan');
        }

    
        $subscription_data = [
            'user_id' => $user_id,
            'plan' => $plan,
            'price' => $price,
            'status' => 'pending',
            'start_date' => null,
            'end_date' => null
        ];

        $subscription_id = $this->Subscription_model->create_subscription($subscription_data);

        // Data transaksi Midtrans
        $transaction_data = [
            'transaction_details' => [
                'order_id' => 'SUB-' . $subscription_id . '-' . time(),
                'gross_amount' => $price
            ],
            'customer_details' => [
                'first_name' => $this->session->userdata('full_name'),
                'email' => $this->session->userdata('email'),
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction_data);

            $data = [
                'snapToken' => $snapToken,
                'plan' => $plan,
                'price' => $price
            ];

            $this->load->view('subscription/payment_page', $data); // View untuk halaman pembayaran
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            $this->session->set_flashdata('error', 'Inisialisasi pembayaran gagal.');
            redirect('subscription/choose_plan');
        }
    }

    /**
     * Menangani notifikasi dari Midtrans setelah pembayaran
     */
    public function notification_handler() {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result, true);

        if ($result) {
            $order_id = $result['order_id'];
            $transaction_status = $result['transaction_status'];

            $subscription_id = explode('-', $order_id)[1];
            $subscription = $this->Subscription_model->get_subscription_by_id($subscription_id);

            if ($subscription) {
                if ($transaction_status == 'settlement') {
                    $start_date = date('Y-m-d');
                    $end_date = date('Y-m-d', strtotime('+1 month'));

                    $this->Subscription_model->update_subscription($subscription_id, [
                        'status' => 'active',
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    ]);
                } elseif (in_array($transaction_status, ['cancel', 'deny', 'expire'])) {
                    $this->Subscription_model->update_subscription($subscription_id, [
                        'status' => 'expired'
                    ]);
                }
            }
        }
    }

    /**
     * Halaman sukses setelah pembayaran
     */
    public function success() {
        $this->load->view('subscription/success'); // View untuk halaman sukses
    }

    /**
     * Halaman error setelah pembayaran gagal
     */
    public function error() {
        $this->load->view('subscription/error'); // View untuk halaman error
    }
}
