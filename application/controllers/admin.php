<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('admin/dashboard/header');
        $this->load->view('admin/dashboard/dashboard');
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/dashboard/footer');

    }
}
