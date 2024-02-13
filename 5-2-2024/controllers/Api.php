<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
        function __construct()
        {
            parent::__construct();
            $this->load->model('QueryModel');
            // $this->load->helper('cookie');  
            // $this->load->library('session');
        }

        public function index()
        {
            $data['content'] = 'dashboard';
            $this->load->view("template/template",$data);
        }
    public function login()
    {
        $type = $this->input->cookie('last_url_login',true); 
        $login_url_type = $this->input->cookie('login_url_type',true);
        if(!empty($login_url_type)){
            $login_url_type= $login_url_type;
        }else{
            $login_url_type = 'demo';
        }
        // print_r($login_url_type);exit;
        $phone = $this->input->get('phone'); 
        $phone = str_replace("'", "", $phone);
        if($this->input->cookie('lang',true)){
            $language = $this->input->cookie('lang',true);
        }else{
            $language = 'english';
        }
        if(!empty($type))
        {
            $type = $type;//$this->input->cookie('last_url_login',true);
            $condition = array('conditions' => ['phone' => $phone,'type'=>$type]);//type= cookie(last_url_login)
    
        }else
        {
            $condition = array('conditions' => ['phone' => $phone]);//type= cookie(last_url_login)
    
        }
        $userDetail= $this->QueryModel->selectSingleRow('users',$condition);
       
        if(!empty($userDetail)){
            $string = "id=".$userDetail['id'].'&date='.date("Y-m-d h:i:s");
        }else{
            $value = array(  
                'phone' => $phone,
                'type' => 'users',
            );
            $userDetail  = $this->QueryModel->insert('users',$value);
            $string = "id=".$userDetail.'&date='.date("Y-m-d h:i:s");
        }

        $six_digit_random_number = random_int(100000000, 999999999);
        if($type!='' && $type !='admin'){
            $condition = array('phone' => $phone,'type'=>$type);
            $updateValue = array(
                'otp' => $six_digit_random_number,
                'otp_time'=> date("Y-m-d h:i:s")
            );
            $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
        }else if($type==''&& $type !='admin'){
            $condition = array('phone' => $phone);
            $updateValue = array(
                'otp' => $six_digit_random_number,
                'otp_time'=> date("Y-m-d h:i:s")
            );
            $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
        }
        if(!empty($type))
        {
            $type = $type;//$this->input->cookie('last_url_login',true);
            $condition = array('conditions' => ['phone' => $phone,'type'=>$type]);//type= cookie(last_url_login)
    
        }else
        {
            $condition = array('conditions' => ['phone' => $phone]);//type= cookie(last_url_login)
    
        }
        $userDetail= $this->QueryModel->selectSingleRow('users',$condition);
       
        if(!empty($userDetail)){
            $string = "id=".$userDetail['id'].'&date='.date("Y-m-d h:i:s");
        }else{
            $value = array(  
                'phone' => $phone,
                'type' => 'users',
            );
            $userDetail  = $this->QueryModel->insert('users',$value);
            $string = "id=".$userDetail.'&date='.date("Y-m-d h:i:s");
        }

        if(!empty($userDetail['name'])){
            $name= $userDetail['name'];
        }else{
            $name='';
        }
        $login_code = $userDetail['otp'];
        
        
        $string = "id=".$userDetail['id'].'&date='.date("Y-m-d h:i:s").'&name='.$name;
        $array = array('id'=>$userDetail['id'],'date'=>date("Y-m-d h:i:s"),'name'=>$name);
        $new_array =json_encode($array);
        // $string = "id=".$userDetail;
        $key = base64_encode($new_array);
        $responsedata['status'] = true;
        $responsedata['key'] =$key;
        $responsedata['code']=$login_code;
        $responsedata['name']=$name;
        $responsedata['language']=$language;
        $responsedata['login_url_type']=$login_url_type;
        // delete_cookie('login_url_type');
        echo json_encode($responsedata);
        return;
    }
    

    }
