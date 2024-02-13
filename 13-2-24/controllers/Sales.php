<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->library('session');
    }
    public function index()
    {
        $data['content'] = 'sales_report';
        $this->load->view("template/template",$data);
    }
    
   
}
