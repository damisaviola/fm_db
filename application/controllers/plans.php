<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

   
    public function index() {
       
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }

       
        redirect('plans/detail/elite');
    }


    public function detail($plan_name) {
    
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }

      
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user_by_id($user_id);


        if ($this->is_subscribed($user)) {
            redirect('dashboard'); 
        }

        $plan_details = $this->get_plan_details($plan_name);

        if ($plan_details === null) {
            show_404(); 
        }


        $price = (float) str_replace(['Rp', 'K', '.'], '', $plan_details['price']);
        $formatted_price = 'Rp ' . number_format($price, 0, ',', '.'); 
        $data = [
            'user' => $user,
            'plan_name' => $plan_details['name'],  
            'price' => $formatted_price,
            'features' => $plan_details['features']  
        ];

        $this->load->view('plans/detail', $data);
    }

    private function is_subscribed($user) {
        return $user->plan_name && strtotime($user->end_date) > time();
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
?>
