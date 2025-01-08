<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login'); 
        }
    }


    public function index()
    {
        $this->load->view('errors/err/error_404'); 
    }


    public function error_500()
    {
        $this->load->view('errors/err/error_500'); 
    }
}


?>
