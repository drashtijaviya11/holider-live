<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Affiliator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
		$this->load->model('affiliatorModel');
        $this->load->library('session');
        $this->load->helper('cookie');
        // if (!$this->session->userdata('affiliatorAuth')) {
        //     // if(!$this->session->userdata('isAdminTrue')){
        //         redirect(base_url('login'));
        //     // }
        // }
		//echo print_r($_SESSION);die;
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('type')=='affiliator') { 
            return 1;      
        }else
		{  
            $url = $this->uri->segment(1);
            // print_r($url);exit;
            // $condition = array('id' => 1);
            // $updateValue = array(
            //     'type' => 'provider'
            // );
            // $updateRes = $this->QueryModel->update('last_login_url',$condition,$updateValue);
            set_cookie('last_url_login',strtolower($url),'31536000');
			echo "<script>window.open('".base_url()."login','_self')</script>"; 
		}
    }
    public function index()
    { 
		$limit = 10;
		$offset = 0;
        $user_id = $this->session->userdata('id');
        $condition = array(
			'conditions' => array('id' => $user_id),
		);
        $userData = $this->QueryModel->selectSingleRow('users',$condition);
	    $data['userData'] = $userData;
		// $condition = array('conditions' => ['transaction_nature' => 'commision' , 'payment_nature' => 'credited']);
		// $data['totalCommission'] = $this->affiliatorModel->AffiliatorTotalCommission('transation',$user_id,$condition);
        $totalCommission = 0;
	    // $debited_amount = 0; 
	    // $tobePaid = 0;
		$credited_condition = array('conditions' => ['user_id' => $user_id,'payment_nature' => 'credited','transaction_nature'=>'commision']);
		$creditedData = $this->QueryModel->selectData('transation',$credited_condition);
		// echo "<pre>"; print_r($creditedData);die;
		if(!empty($creditedData)){
			$totalCommission= 0;
			foreach ($creditedData as $creditedDataval){
                if(!empty($creditedDataval['amount']) && !empty($creditedDataval['currency_type'])){
				    $new_commision = get_price_without_symbol($creditedDataval['amount'],$creditedDataval['currency_type'],$creditedDataval['created_at']);
                }else{
                    $new_commision= 0;
                }
				$totalCommission = $totalCommission+$new_commision;
			}
		}
        $data['totalCommission'] =$totalCommission;
		$data['affiliatorCommissionList'] = $this->affiliatorModel->affiliatorCommissionList('transation',$user_id);
        foreach($data['affiliatorCommissionList'] as &$list){
            $list->username = $this->affiliatorModel->getUserByVoucherCode($list->voucher_code);
        }
        if ($this->agent->is_mobile()) {
        $data['content'] = 'affiliator';
        $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/affilator/affilator';
            $this->load->view("desktop/template/template",$data);
        }
    }
    public function add_affilator()
    {
        $data['content'] = 'affilator/add_affilator';
        $this->load->view("admin/template/template",$data);
    }

    public function list_affilator()
    {
        
    }
    public function generate_refenceLink() {
		$user_id = $this->session->userdata('id');
		$encrypted_string = $this->customEncrypt($user_id, 'fXK9RNGo2D');
	
		// Get the base URL
		$base_url = rtrim(base_url(), '/\\');
	
		// Parse the base URL to extract the scheme (protocol)
		$parsed_url = parse_url($base_url);
	
		// Check if the scheme is HTTP, then change it to HTTPS
		if ($parsed_url['scheme'] === 'http') {
			$base_url = str_replace('http://', 'https://', $base_url);
		}
	
		// Construct the reference link
		$reference_link = $base_url . '?refid=' . $encrypted_string;
	
		// Prepare the response
		$response['status'] = true;
		$response['url'] = $reference_link;
	
		// Output the response as JSON
		echo json_encode($response);
		return;
	}
	
	public function generate_QRCode() {
		$this->load->library('ciqrcode');
		$user_id = $this->session->userdata('id');
		$encrypted_string = $this->customEncrypt($user_id, 'fXK9RNGo2D');
		$base_url = rtrim(base_url(), '/');
	
		// Parse the base URL to extract the scheme (protocol)
		$parsed_url = parse_url($base_url);
	
		// Check if the scheme is HTTP, then change it to HTTPS
		if ($parsed_url['scheme'] === 'http') {
			$base_url = str_replace('http://', 'https://', $base_url);
		}
	
		$reference_link = $base_url . '?refid=' . $encrypted_string;
		$condition = array('conditions' => array('id' => $user_id));
		$userData = $this->QueryModel->selectSingleRow('users', $condition);
	
		if ($userData['reference_qr'] != '') {
			$file_path = $userData['reference_qr'];
			$file_name = '';
		} else {
			$params['data'] = $reference_link;
			$params['level'] = 'H';
			$params['size'] = 10;
			$upload_folder = 'affiliator_qr/';
	
			// Check if the upload folder exists, create it if not
			if (!is_dir($upload_folder)) {
				mkdir($upload_folder, 0777, true);
			}
	
			// Set the file name for the saved QR code image
			$file_name = 'qr_' . time() . '_' . uniqid() . '.png';
	
			// Set the full path for the saved QR code image
			$file_path = $upload_folder . $file_name;
	
			$params['savename'] = $file_path;
	
			$this->ciqrcode->generate($params);
	
			// Output the image in the browser
			$condition = array('id' => $user_id);
			$updateValue = array(
				'reference_qr' => $file_path
			);
			$updateRes = $this->QueryModel->update('users', $condition, $updateValue);
		}
	
		$response['status'] = true;
		$response['url'] = base_url() . $file_path;
		$response['name'] = $file_name;
		$response['link'] = $reference_link;
		echo json_encode($response);
		return;
	}
	
    private function customEncrypt($data, $key) {
        $key = md5($key); // Hash the key for consistency
        $result = '';
    
        for ($i = 0; $i < strlen($data); $i++) {
            $result .= chr(ord($data[$i]) ^ ord($key[$i % strlen($key)]));
        }
    
        return base64_encode($result);
    }
    
    private function customDecrypt($data, $key) {
        $key = md5($key); // Hash the key for consistency
        $data = base64_decode($data);
        $result = '';
    
        for ($i = 0; $i < strlen($data); $i++) {
            $result .= chr(ord($data[$i]) ^ ord($key[$i % strlen($key)]));
        }
    
        return $result;
    }
    public function checkDevice()
{
	$id = $this->session->userdata('id');
	// $id = $_POST['id'];
	// $ip = $_POST['serialNumber'];
	$postData = file_get_contents("php://input");
	$ip = json_decode($postData);
	$ip =  $ip->serialNumber;
	$condition = array('conditions' => ['serial' => $ip]);
	$serial = $this->QueryModel->selectSingleRow('nfc_devices',$condition);
	// print_r($serial['user_id']);die;
	if(!empty($serial)){
	
		if($serial['affiliator_id'] == null)
		{
			$insert = array(
				'affiliator_id' => $id
			);
			$nfc_condition = array('serial' => $serial['serial']);
			$resp =$this->QueryModel->update('nfc_devices',$nfc_condition,$insert);
			if($resp)
			{
				$user_condition = array('id' => $id);
				$insData = array(
					'nfc_serial_number' => $ip,
				);
				$this->QueryModel->update('users',$user_condition,$insData);
				$response = [
					'Message' => lang('your_registered_device_is').": ".$serial['serial'],
					'status' => true,
				];
				echo json_encode($response);
			}
		}
		else{
            $insert = array(
				'affiliator_id' => $id
			);
            $nfc_condition = array('serial' => $serial['serial']);
			$resp =$this->QueryModel->update('nfc_devices',$nfc_condition,$insert);
			if($resp)
			{
				$user_condition = array('id' => $id);
				$insData = array(
					'nfc_serial_number' => $ip,
				);
				$this->QueryModel->update('users',$user_condition,$insData);
				$response = [
					'Message' => lang('your_registered_device_is').": ".$ip,
					'status' => true,
				];
				echo json_encode($response);
			}
		}
	}else{
		$insertData = array(
						'serial' => $ip,
						'user_id' => $id
					);
		$res = $this->QueryModel->insert('nfc_devices',$insertData);
		if($res)
		{
		 $user_condition = array('id' => $id);
				$insData = array(
					'nfc_serial_number' => $ip,
				);
				$this->QueryModel->update('users',$user_condition,$insData);
			$response = [
				'Message' =>  lang('your_registered_device_is').": ".$ip,
				'status' => true,
			];
			echo json_encode($response); 
		}
	}
}
public function affilator_reference(){
    if(isset($_GET['refid']) && $_GET['refid']!=''){
        $referenceCookie = $this->input->cookie('refid', true);
		$referenceId = isset($referenceCookie) ? $referenceCookie : '';
        echo $referenceId.' __ working';
        set_cookie("refid", $_GET['refid'], time() + (24 * 60 * 60));
    }
}

public function profile()
{
	$id = $this->session->userdata('id');
	$condition = array('conditions' => ['id' => $id]);
	$data['userDetail'] = $this->QueryModel->selectSingleRow('users',$condition);
	if ($this->agent->is_mobile()) {
		$data['content'] = 'profile';
		$this->load->view("template/template",$data);
	}else{
		$data['content'] = 'desktop/profile';
		$this->load->view("desktop/template/template",$data);
	}
}

public function edit_profile()
{
	$id = $this->session->userdata('id');
	$condition = array('id' => $id);
	

		$name = $this->input->post('editName');
		$email = $this->input->post('editEmail');
		$phone = $this->input->post('editPhone');

		$updateData = array(
			'name' => $name,
			'email' => $email,
			// 'phone' => $phone
		);
		$update = $this->QueryModel->update('users',$condition,$updateData);
		$userCondition = array('conditions' => ['id' => $id]);
		$userDetail = $this->QueryModel->selectSingleRow('users',$userCondition);
		$sesdata = array(
			'id'		=> $userDetail['id'],
			'name'      => $userDetail['name'],
			'type' => $userDetail['type'],
			'subtype'=> $userDetail['subtype'],
			'logged_in' => TRUE,
		);
		$this->session->set_userdata($sesdata);
		redirect('affiliator/profile', 'refresh'); 
			
}

// controller affiliator

public function getAffiliatorCommission(){
	$limit = 10;
	$offset = $_POST['offset'];
	$user_id = $this->session->userdata('id');
	// $condition = array(
	// 	'conditions' => array('id' => $user_id),
	// );
	// $userData = $this->QueryModel->selectSingleRow('users',$condition);
	// $data['userData'] = $userData;
	// $condition = array('conditions' => ['transaction_nature' => 'commision' , 'payment_nature' => 'credited']);
	// $data['totalCommission'] = $this->affiliatorModel->AffiliatorTotalCommission('transation',$user_id,$condition);
	$data['affiliatorCommissionList'] = $this->affiliatorModel->affiliatorCommissionList('transation',$user_id,$limit,$offset);
	foreach($data['affiliatorCommissionList'] as &$list){
		$list->username = $this->affiliatorModel->getUserByVoucherCode($list->voucher_code);
	}
	$html = $this->load->view('affiliatorCommissionList',$data,true);
	$response = [
		'status' => true,
		'affiliatorCommissionList' => $data['affiliatorCommissionList'],
		'html' => $html,
	];
	header('Content-Type: application/json');
	echo json_encode($response);
}
}
