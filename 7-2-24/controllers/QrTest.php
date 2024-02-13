<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Endroid\QrCode\QrCode;
class QrTest extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // $this->load->model('QueryModel');
        // $this->load->helper('cookie');  
        $this->load->library('Ciqrcode');
    }
    public function index(){
        die('test');
        echo __DIR__ . '/vendor/autoload.php';
    }
    public function qr_scanner() {
        $this->load->view('qr_scanner');
    }

    public function processQrCode() {
        $data = json_decode($this->input->post('qr_data'), true);
        
        // Handle the scanned QR code data
        // You can perform database operations or any other processing here
        // For demonstration purposes, we'll just print the data
        print_r($data);
    }
}