<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NfcController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         $this->load->model('QueryModel');
        // $this->load->helper('cookie');  
      
    }
    public function index()
    {
          $this->load->library('user_agent');
         $user_id = $this->session->userdata('id');
        $condition = array('conditions' => array('id' => $user_id));
        $userData = $this->QueryModel->selectSingleRow('users',$condition);
	$data['userData'] = $userData;
        if ($this->agent->is_mobile()) {
        $data['content'] = 'nfcreader';
        $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'nfcreader';
        $this->load->view("desktop/template/template",$data);
        }
    }
}