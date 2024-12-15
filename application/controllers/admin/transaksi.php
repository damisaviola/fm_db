<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;


class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Transaksi_model');
        $this->load->helper('pdf_helper');
        $id_user = $this->session->userdata('user_id');
    
    if (!$id_user) {
        redirect('login');
    }
    
    }

    public function index() {
        $id_user = $this->session->userdata('user_id');
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_user($id_user);
        $this->load->view('admin/transaksi/header');
        $this->load->view('admin/transaksi/transaksi' ,$data);
        $this->load->view('admin/dashboard/menu');
        $this->load->view('admin/transaksi/footer');
    }

    public function cetak($id_pembayaran) {
        $this->load->helper('pdf_helper');
        $this->load->model('Transaksi_model');
        $data['pembayaran'] = $this->Transaksi_model->getPembayaranById($id_pembayaran);
    
        if (!$data['pembayaran']) {
            echo "error";
        }
    
        $html = $this->load->view('admin/bukti_pembayaran', $data, true);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Bukti_Pembayaran_" . $id_pembayaran . ".pdf", array("Attachment" => 0));
    }
}
?>