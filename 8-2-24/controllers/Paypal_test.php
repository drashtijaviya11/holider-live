<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaypalController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
    }

    public function index() {
        // Load the PayPal library
        $this->load->library('paypal_lib');

        // Set variables for paypal form
        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test PayPal URL
        $paypalID = 'your_seller_email@example.com'; // Your PayPal Email

        $data = array(
            'cmd' => '_xclick',
            'business' => $paypalID,
            'item_name' => 'Test Item',
            'item_number' => '1',
            'amount' => '10.00',
            'currency_code' => 'USD',
            'notify_url' => base_url() . 'paypal/ipn',
            'cancel_return' => base_url() . 'paypal/cancel',
            'return' => base_url() . 'paypal/success',
        );

        $this->load->view('paypal/paypal_form', $data);
    }

    public function success() {
        // Payment success logic here
        $this->load->view('paypal/success');
    }

    public function cancel() {
        // Payment canceled logic here
        $this->load->view('paypal/cancel');
    }

    public function ipn() {
        // PayPal IPN logic here
    }

}
