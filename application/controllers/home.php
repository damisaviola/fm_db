<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load URL helper
        $this->load->helper('url');
    }

    public function index() {
        // Load view 'home'
        $this->load->view('home/header');
        $this->load->view('home/home');
        $this->load->view('home/footer');
    }
}
