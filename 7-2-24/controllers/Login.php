<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->helper('cookie');
        $this->load->library('session');

    }
    public function index()
    {   $currentURL = current_url(); //http://myhost/main
        // if (str_contains($currentURL, 'demo')) { 
        if (strpos($currentURL, 'demo') !== false) {
            // print_r($currentURL);exit;
            set_cookie('login_url_type','demo','31536000');
        }else{
            set_cookie('login_url_type','live','31536000');
        }
        // print_r($this->input->cookie('login_url_type',true));exit;
        if(isset($_GET['refid'])){
            $key = $_GET['refid'];
            set_cookie("affiliator_key", $key, time() + (24 * 60 * 60));
        }
        // print_r($key);
        // $data['content'] = 'login';
        // $this->load->view("template/template",$data);
        if ($this->agent->is_mobile()) {
            $data['content'] = 'login_with_code';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/login';
            $this->load->view("desktop/template/template",$data);
        }
    }

    public function login()
    {
        $postData = $this->input->post();
        $uname = $postData['uname'];
        $password = $postData['psw'];
        $remember_me = $postData['remember_me'];
        if ($remember_me == 1) {
            set_cookie("uname", $uname, time() + (24 * 60 * 60));
            set_cookie("password", $password, time() + (24 * 60 * 60));
        }

        $condition = array('conditions' => array('username' => $uname, 'password' => $password));
        $value = $this->QueryModel->selectSingleRow('users',$condition);
        set_cookie("country", $value['country'], time() + (24 * 60 * 60));
        set_cookie("state", $value['state'], time() + (24 * 60 * 60));
        if ($value) {
            $this->session->set_userdata('userAuth', $value);
            $responsedata['url'] = base_url('admin');
            $responsedata['remember_me'] = $remember_me;
            $responsedata['status'] = true;
            $responsedata['message'] = 'Success';
            echo json_encode($responsedata);
            return;
        } else {
            $responsedata['url'] = base_url();
            $responsedata['status'] = false;
            $responsedata['data'] = $value;
            $responsedata['message'] = 'User or password is not matched.';
            echo json_encode($responsedata);
            return;
        }
    }




   
}
