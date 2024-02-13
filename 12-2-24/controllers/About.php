<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->library('session');
    }

    public function index()
    { 
        $data['about'] = $this->QueryModel->selectSingleRow('about_us');
        $data['content'] = 'about';
        $this->load->view("template/template", $data);
    }
}