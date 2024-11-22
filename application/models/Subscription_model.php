<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_subscription($data) {
        $this->db->insert('subscriptions', $data);
        return $this->db->insert_id();
    }

    public function update_subscription($subscription_id, $data) {
        $this->db->where('id', $subscription_id);
        return $this->db->update('subscriptions', $data);
    }


    public function get_subscription_by_id($subscription_id) {
        return $this->db->get_where('subscriptions', ['id' => $subscription_id])->row_array();
    }

}