<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Pastikan Anda sudah mengimpor Midtrans SDK dengan benar
require_once(APPPATH . 'libraries/midtrans/Midtrans.php');

class Midtrans {

    public function __construct() {
        // Menggunakan konfigurasi secara langsung tanpa memanggil $this->load
        $CI =& get_instance(); // Menyimpan instance CodeIgniter
        $CI->config->load('midtrans'); // Memuat file konfigurasi manual

        // Set konfigurasi Midtrans
        \Midtrans\Config::$serverKey = $CI->config->item('midtrans_server_key');
        \Midtrans\Config::$clientKey = $CI->config->item('midtrans_client_key');
        \Midtrans\Config::$isProduction = $CI->config->item('midtrans_is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function getSnapToken($transaction_data) {
        try {
            return \Midtrans\Snap::getSnapToken($transaction_data);
        } catch (Exception $e) {
            log_message('error', 'Midtrans Snap Token Error: ' . $e->getMessage());
            return null;
        }
    }
}
