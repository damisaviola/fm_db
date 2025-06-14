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


    public function index()
    {
        $this->load->view('member/auth/login');
    }
}
