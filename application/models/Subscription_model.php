<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_subscription($data) {
        return $this->db->insert('subscriptions', $data);
    }

    public function update_subscription($subscription_id, $data) {
        $this->db->where('id', $subscription_id);
        return $this->db->update('subscriptions', $data);
    }


    public function get_subscription_by_id($subscription_id) {
        return $this->db->get_where('subscriptions', ['id' => $subscription_id])->row_array();
    }

    public function get_active_subscription($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('end_date >=', date('Y-m-d H:i:s'));  // Memeriksa apakah subscription masih aktif
        $query = $this->db->get('subscriptions'); // 'subscriptions' adalah tabel langganan
        return $query->row(); // Mengembalikan data langganan yang aktif
    }

}