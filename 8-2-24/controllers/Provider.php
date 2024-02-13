<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProviderModel');
	    $this->load->model('QueryModel');
        $this->load->library('session');
        
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('type')=='provider' && $this->session->userdata('subtype')=='') { 
            return 1;      
        }
		else
		{ 
            $url = $this->uri->segment(1);
            set_cookie('last_url_login',strtolower($url),'31536000');
			echo "<script>window.open('".base_url()."login','_self')</script>"; 
		}
    }
    public function index()
    { 
    	//print_r($this->session->userdata('id'));die;
	    $id = $this->session->userdata('id');
	    $credited_amount = 0;
	    $debited_amount = 0; 
	    $tobePaid = 0;
		$credited_condition = array('conditions' => ['user_id' => $id,'payment_nature' => 'credited']);
		$creditedData = $this->ProviderModel->selectData('transation',$credited_condition);
		// echo "<pre>"; print_r($creditedData);die;
		if(!empty($creditedData)){
			$credited_amount= 0;
			foreach ($creditedData as $creditedDataval){
                if(!empty($creditedDataval['amount']) && !empty($creditedDataval['currency_type'])){
				$new_amount = get_currency_without_symbol_user_view($creditedDataval['amount'],$creditedDataval['currency_type']);
                }else{
                    $new_amount= 0;
                }
				$credited_amount = $credited_amount+$new_amount;
			}
		}
		$debited_condition = array('conditions' => ['user_id' => $id,'payment_nature' => 'debited']);
		$debitedData = $this->ProviderModel->selectData('transation',$debited_condition);
		if(!empty($debitedData)){
			$debited_amount= 0;
			foreach ($debitedData as $debitedDataval){
                if(!empty($debitedDataval['amount']) && !empty($debitedDataval['currency_type'])){
				$new_debit_amount = get_currency_without_symbol_user_view($debitedDataval['amount'],$debitedDataval['currency_type']);
                }else{
                    $new_debit_amount= 0;
                }
				$debited_amount = $debited_amount+$new_debit_amount;
			}
		}
	    // $credited_amount = $this->ProviderModel->get_total_credited($id);
	    // $debited_amount  = $this->ProviderModel->get_total_debited($id);
	    if($debited_amount>=$credited_amount){
	      $tobePaid = 0 ;
	    }else{
	      $tobePaid = $credited_amount - $debited_amount;
	    }
	    $data['tobePaid'] = $tobePaid;
            $data['credited_amount'] = $credited_amount;
            $data['debited_amount'] = $debited_amount;
        //echo "<pre>"; print_r($data);die;
        if ($this->agent->is_mobile()) {
            $data['content'] = 'provider/offer_list';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/provider/offer_list';
            $this->load->view("desktop/template/template",$data);
        }
    } 
    
    public function get_voucher_items() {
		$limit = 10;
		$offset = $_POST['offset'];
        $user_id = $this->session->userdata('id');

		// $condition = array('conditions' => ['id' => $user_id , 'type' => 'provider']);
		// $provider = $this->QueryModel->selectSingleRow('users' ,$condition);
		// $default_currency = $provider['default_currency'];


        $items = $this->ProviderModel->get_items($offset, $limit,$user_id);
		$keyToModify = 'name';
        foreach($items as $key=>$list){
			
			$condition = array('conditions' => ['name' => $list->name]);
			$offers = $this->QueryModel->selectSingleRow('offer' ,$condition);
			$currency_type = $offers['currency_type'];

	        $list->name = get_translation($list->name);
            $total_commission = 0;
            $total_commission = $list->total_system_commission + $list->total_affialiator_commission;
            $total_amount = $list->total_sale_amount - $total_commission;
            $net_amount = $total_amount; 
		    $list->total_sale_amount = get_currency($net_amount,$currency_type);
        }
        header('Content-Type: application/json');
        echo json_encode($items);
    }
    public function getVoucherListByMonth(){
        $user_id = $this->session->userdata('id');
        $month = $_POST['selectedMonth'];
        $userInputYear = date('Y');
        $items = $this->ProviderModel->get_items_by_month($user_id,$month,$userInputYear);
        foreach($items as $key=>$list){
			
			$condition = array('conditions' => ['name' => $list->name]);
			$offers = $this->QueryModel->selectSingleRow('offer' ,$condition);
			$currency_type = $offers['currency_type'];

	        $list->name = get_translation($list->name);
            $total_commission = 0;
            $total_commission = $list->total_system_commission + $list->total_affialiator_commission;
            $total_amount = $list->total_sale_amount - $total_commission;
            $net_amount = $total_amount; 
		    $list->total_sale_amount = get_currency($net_amount,$currency_type);
        }
        header('Content-Type: application/json');
        echo json_encode($items); 
    }
    public function sales()
    {
        $data['sale_list']  = $this->ProviderModel->get_Sale_List();
        if ($this->agent->is_mobile()) {
            $data['content'] = 'provider/sales';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/provider/sales';
            $this->load->view("desktop/template/template",$data);
        }
    }
    public function scan_voucher($status)
    {  
        $response_data = base64_decode($status);
        $response = json_decode($response_data);
        // print_r($response);exit;
        $data['status']= $response->status;//$_POST['status'];
        $data['message']= $response->message;//$_POST['status'];
        $data['content'] = 'provider/qr';
        $this->load->view("template/template",$data);
    }
    public function create_response_file($res){
      $file_path = 'response.txt';
       if (!file_exists($file_path)) {
         // Create the file if it doesn't exist
        file_put_contents($file_path, '<?php' . PHP_EOL);
        }
        $new_php_code = $res . PHP_EOL;

        // Append the code to the file
        file_put_contents($file_path, $new_php_code, FILE_APPEND | LOCK_EX);
    }
    public function verify_voucher(){
        
        $user_id =  $this->session->userdata('id');
        $voucher_code =  substr($_POST['qr_code'], 0, strpos( $_POST['qr_code'], ' '));//trim($_POST['qr_code'],"- 31");
        $voucher = array('conditions' => ['voucher_code' => $voucher_code,'provider_id'=>$user_id]);
        $voucher_data =$this->QueryModel->selectSingleRow('vouchers',$voucher);
        $users_condition = array('conditions' => ['id' => $voucher_data['user_id']]);
        $users_details =$this->QueryModel->selectSingleRow('users',$users_condition);
        if(empty($voucher_data)){
            $aaa='qr not valid';
            $response['status'] = false;
            $response['code'] = $voucher_code;
            // $response['message']= lang('voucher_not_found');
            $response['message']= lang('you_are_failed_to_charge_voucher_please_try_again_later');
            $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
            echo json_encode($response);
            $this->create_response_file(json_encode($response));
            return;
        }
        $current_date = date("Y-m-d H:i:s");
        if($voucher_data['status']=='unreedem'){
            if($voucher_data['expire_date']> $current_date){
                $offer = array('conditions' => ['id' => $voucher_data['offer_id']]);
                $offer_data =$this->QueryModel->selectSingleRow('offer',$offer);
                if($voucher_data['person_type']=='adult' || $voucher_data['person_type']=='ticket'){
                    if($offer_data['adult_discount']!=0){
                        $adult_price=$offer_data['adult_discount'];
                    }else{
                        $adult_price=  $offer_data['adult_price'];
                    }
                    $total_price = $adult_price;
                    $affiliator_commision = $total_price / 100 * 5;
                    $total_comission = $offer_data['adult_commission'];
                    $admin_comission =$total_comission - $affiliator_commision;
                    $final_amount = $total_price - $total_comission;
                }else{
                    if($offer_data['child_discount']!=0){
                        $child_price=$offer_data['child_discount'];
                    }else{
                        $child_price=  $offer_data['child_price'];
                    }
                    $total_price = $child_price;
                    $affiliator_commision = $total_price / 100 * 5;
                    $total_comission = $offer_data['child_commission'];
                    $admin_comission =$total_comission - $affiliator_commision;
                    $final_amount = $total_price - $total_comission;
                }
                $transation = array( 
                    'user_id' => $user_id,
                    'offer_detail'=>$offer_data['name'],
                    'offer_id'=>$offer_data['id'],
                    'currency_type'=>$offer_data['currency_type'],
                    'comission' => $admin_comission,
                    'amount' => $final_amount,
                    'voucher_code'=>$voucher_code,
                    'affialiator_commission' => $affiliator_commision

                );
                $this->QueryModel->insert('transation',$transation);
                $provider_condition = array('conditions' => ['id' => $user_id]);
                $provider_details =$this->QueryModel->selectSingleRow('users',$provider_condition);
                $mail_data['type']='provider';
                $mail_data['earning']=getCurrencySymbol($provider_details['default_currency']).get_currency_without_symbol($final_amount,$provider_details['default_currency']);
                $mail_data['offer_name']= $offer_data['name'];
                $mail_data['offer_price']= $total_price;
                $mail_data['provider_name']= $provider_details['name'];
                send_mail_new_other($provider_details['email'], 'Holider', $this->load->view('verify_voucher_email_template_provider', $mail_data, true));
                if(!empty($voucher_data['affilator_id'])){
                    $transation_affialiator = array( 
                        'user_id' => $voucher_data['affilator_id'],
                        'offer_detail'=>$offer_data['name'],
                        'offer_id'=>$offer_data['id'],
                        'currency_type'=>$offer_data['currency_type'],
                        'comission' => 0,
                        'amount' => $affiliator_commision,
                        'voucher_code'=>$voucher_code,
                        'affialiator_commission' => 0,
                        'transaction_nature' =>'commision',
                    );
                    $this->QueryModel->insert('transation',$transation_affialiator);
                    $affiliate_condition = array('conditions' => ['id' => $voucher_data['affilator_id']]);
                    $affiliate_details =$this->QueryModel->selectSingleRow('users',$affiliate_condition);
                    $mail_data['type']='afiliator';
                    $mail_data['earning']=getCurrencySymbol($affiliate_details['default_currency']).get_currency_without_symbol($affiliator_commision,$affiliate_details['default_currency']);
                    $mail_data['offer_name']= $offer_data['name'];
                    $mail_data['offer_price']= $total_price;
                    $mail_data['affiliator_name']= $affiliate_details['name'];
                    send_mail_new_other($affiliate_details['email'], 'Holider', $this->load->view('verify_voucher_email_template', $mail_data, true));
                }


                $aaa='valid';
                $response['status'] = true;
                $response['code'] = $aaa;
                $response['message']= lang('you_successfully_redeemed_your_voucher');
                $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
                $condition = array('id' => $voucher_data['id']);
                $updateValue = array(
                    'status' => 'reedem',
                    'redeem_by' => $user_id
                );
                $updateRes = $this->QueryModel->update('vouchers',$condition,$updateValue);
            }else{
                $aaa='reedem';
                $response['status'] = false;
                $response['message']= lang('this_voucher_is_expired');
                $response['code'] = $aaa;
                $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
            }
        }else{
            $aaa='reedem';
            $response['status'] = false;
            $response['message']= lang('this_voucher_already_used');
            $response['code'] = $aaa;
            $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
         
        }
        
        // $this->scan_voucher(json_encode($response));
        echo json_encode($response);
          
        $this->create_response_file(json_encode($response));
        return;
    }
    public function verify_nfc_voucher(){
        
        $user_id =  $this->session->userdata('id');
        // print_r($user_id);exit;
        $voucher_code =  $_POST['qr_code'];
        
        
        $voucher = array('conditions' => ['voucher_code' => $voucher_code,'provider_id'=>$user_id]);
        //echo "<pre>";print_r($voucher);die;
        $voucher_data =$this->QueryModel->selectSingleRow('vouchers',$voucher);
        
        if(empty($voucher_data)){
            $aaa='qr not valid';
            // $response['url']= base_url('provider/scan_voucher/0');
            $response['status'] = false;
            $response['code'] = $voucher_code;
            $response['message']= lang('not_found_voucher');
            $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
             echo json_encode($response);
            // $this->scan_voucher(json_encode($response));
            $this->create_response_file(json_encode($response));
            
            return;
        }
        $current_date = date("Y-m-d H:i:s");
        if($voucher_data['status']=='unreedem'){
            if($voucher_data['expire_date']> $current_date){
                $offer = array('conditions' => ['id' => $voucher_data['offer_id']]);
                $offer_data =$this->QueryModel->selectSingleRow('offer',$offer);
                    // print_r($offer_data);
                if($voucher_data['person_type']=='parrent'){

                    if($offer_data['adult_discount']!=0){
                        
                        $adult_price=$offer_data['adult_discount'];
                    }else{
                        $adult_price=  $offer_data['adult_price'];
                    }
                    $total_price = $adult_price;
                    $total_comission = $offer_data['adult_commission'];
                    $final_amount = $total_price - $total_comission;
                    $affiliator_commision = $total_price / 100 * 5;
                    // $total_comission = $offer_data['child_commission'];
                    $admin_comission =$total_comission - $affiliator_commision;
                    // $final_amount = $total_price - $total_comission;
                }else{

                    if($offer_data['child_discount']!=0){
                        
                        $child_price=$offer_data['child_discount'];
                    }else{
                        $child_price=  $offer_data['child_price'];
                    }
                    $total_price = $child_price;
                    $total_comission = $offer_data['child_commission'];
                    // $final_amount = $total_price - $total_comission;
                    $affiliator_commision = $total_price / 100 * 5;
                    // $total_comission = $offer_data['child_commission'];
                    $admin_comission =$total_comission - $affiliator_commision;
                    $final_amount = $total_price - $total_comission;
                }
                $transation = array( 
                    'user_id' => $user_id,
                    'offer_detail'=>$offer_data['name'],
                    'offer_id'=>$offer_data['id'],
                    'currency_type'=>$offer_data['currency_type'],
                    'comission' => $admin_comission,
                    'amount' => $final_amount,
                    'voucher_code'=>$voucher_code,
                    'affialiator_commission' => $affiliator_commision
                );
                $this->QueryModel->insert('transation',$transation);
                if(!empty($voucher_data['affilator_id'])){
                    $transation_affialiator = array( 
                        'user_id' => $voucher_data['affilator_id'],
                        'offer_detail'=>$offer_data['name'],
                        'offer_id'=>$offer_data['id'],
                        'currency_type'=>$offer_data['currency_type'],
                        'comission' => 0,
                        'amount' => $affiliator_commision,
                        'voucher_code'=>$voucher_code,
                        'affialiator_commission' => 0,
                        'transaction_nature' =>'commision',
    
                    );
                    $this->QueryModel->insert('transation',$transation_affialiator);
                }
                $aaa='valid';
                // $response['url']= base_url('provider/scan_voucher/1');
                $response['status'] = true;
                $response['code'] = $aaa;
                $response['message']= lang('voucher_is_now_charged');
                $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
            
                $condition = array('id' => $voucher_data['id']);
                $updateValue = array(
                    'status' => 'reedem',
                    'redeem_by' => $user_id,
                    'voucher_reader'=>'ncfreader',
                );
                $updateRes = $this->QueryModel->update('vouchers',$condition,$updateValue);
            }else{
                $aaa='reedem';
            $response['status'] = false;
            $response['message']= lang('this_voucher_is_expired');
            $response['code'] = $aaa;
            $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
            }
        }else{
            $aaa='reedem';
            $response['status'] = false;
            $response['message']= lang('this_voucher_already_used');
            $response['code'] = $aaa;
            $response['url']= base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
         
        }
        
        // $this->scan_voucher(json_encode($response));
        echo json_encode($response);
          
        $this->create_response_file(json_encode($response));
        return;
    }
    public function voucher()
    {
        $unUsed_cond = array('conditions' => ['status' => 'unreedem']);
        $data['unused_vouchers'] =$this->ProviderModel->selectData('vouchers',$unUsed_cond);
        $used_cond = array('conditions' => ['status' => 'reedem']);        
        $data['used_vouchers'] =$this->ProviderModel->selectData('vouchers',$used_cond);
        $data['content'] = 'provider/voucher';
        $this->load->view("template/template",$data);
    }

    public function getVoucher_detail($id)
    {
        $user_id = $this->session->userdata('id');
        $user_cond = array('conditions' => ['id' => $user_id]);
        $data['user'] =$this->ProviderModel->selectSingleRow('users',$user_cond);
        $condition = array('conditions' => ['id' => $id]);
        $voucher = $this->ProviderModel->selectSingleRow('vouchers',$condition);
        $data['voucher'] = $voucher;
        $condition_offer = array('conditions' => ['id' => $voucher['offer_id']]);
        $data['offer'] =$this->ProviderModel->selectSingleRow('offer',$condition);
        $data['content'] = 'provider/voucher-detail';
        $this->load->view("template/template",$data);
    }

    public function voucher_detail_ajax()
    {
        $url_slug = fetcharea();
        $id = $_POST['id'];
        $response['status'] = true;
        $response['url'] = base_url('provider/getVoucher_detail/'.$id.'');
        echo json_encode($response);
        return;
    }

      public function open_offer()
    {
        $data['choose_offer_data'] = $this->ProviderModel->selectData('offer');
        $data['content'] = 'provider/choose-offer';
        $this->load->view("template/template",$data);
    }
    public function checkDeviceWithVoucher($serialNumber){
        /*if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
         }*/
       // $provider_id = $this->session->userdata('id');
       $provider_id = $this->session->userdata('id');
        $nfcDeviceData = $this->ProviderModel->getDeviceData($serialNumber);
        if(!empty($nfcDeviceData)){
          $userDevice = $this->ProviderModel->getUSerDeviceExist($serialNumber,$nfcDeviceData->user_id);
          if(!empty($userDevice)){
            $voucherList = $this->ProviderModel->getUserVoucherList($provider_id,$nfcDeviceData->user_id);
            if(!empty($voucherList)){
                $response['status'] = true;
                $response['message']= lang('device_scan_sucessfully');
                $response['data']=  $voucherList;
            }else{
                $response['status'] = false;
                $response['message']= lang('voucher_does_not_exist_for_the_user');
                $response['data']=  [];
            }
            
          }else{
            $response['status'] = true;
            $response['message']= lang('user_device_does_not_exist');
            $response['data']=  [];
          }
        }else{
            $response['status'] = false;
            $response['message']= lang('device_does_not_exist');
            $response['data']=  [];
        }
        echo json_encode($response);
        return;
    }
    public function successPageDemo(){
        $response['status'] = false;
        $response['code'] = 'k5415df11fghgfbf1'; 
        $response['message']= lang('you_are_failed_to_charge_voucher_please_try_again_later');
        $url = base_url('provider/scan_voucher/'.base64_encode(json_encode($response)));
        redirect($url);
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
		
		$this->form_validation->set_rules('editName', 'Name', 'trim|required');
		$this->form_validation->set_rules('editEmail', 'Email', 'trim|required|valid_email');
		//$this->form_validation->set_rules('editPhone', 'Phone', 'trim|required');

		if ($this->form_validation->run() === TRUE) {

			$name = $this->input->post('editName');
			$email = $this->input->post('editEmail');
			//$phone = $this->input->post('editPhone');

			$updateData = array(
				'name' => $name,
				'email' => $email,
				//'phone' => $phone
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
			redirect('provider/profile', 'refresh'); 
		}
	
	$this->load->view('desktop/profile');
			
	}
    public function employee(){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|is_unique[users.phone]');
        
            if ($this->form_validation->run() == FALSE) {
               

        if ($this->agent->is_mobile()) {
			$data['content'] = 'provider/employee';
			$this->load->view("template/template",$data);
        }else{
			$data['content'] = 'desktop/provider/employee';
			$this->load->view("desktop/template/template",$data);
        }
    }else{


    }
    }

	public function save_employee() {
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', array(
            'is_unique' => lang('this_email_already')
        ));
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|is_unique[users.phone]', array(
            'is_unique' => lang('this_phone_number')
        ));
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'email' => form_error('email'),
                'phone' => form_error('phone')
            );
            if (!empty($errors['email'])) {
                $response['message'] = $errors['email'];
            }
            if (!empty($errors['phone'])) {
                $response['message'] = $errors['phone'];
            }
            $response['status'] = false;
            echo json_encode($response);
            return;
        } else {
            // Validation passed, proceed with saving the employee
            // Retrieve form data
			$id = $this->session->userdata('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $status_employee = $this->input->post('status_employee');

            $value = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'status' => $status_employee,
				'type' => 'provider',
				'provider_id' => $id,
				'subtype' => 'employee',
			);
			$insertData = $this->ProviderModel->insert('users',$value);
			if($insertData){
				$pro_val = array(
					'provider_id' => $id,
					'employee_id' => $insertData,
					'status' => '1'
				);
				$insrtId = $this->ProviderModel->insert('provider_employee',$pro_val);
				$response['status'] = true;
				$response['message'] = lang('employee_saved_successfully');
				$response['url'] = base_url().'provider/employee_list';
				echo json_encode($response);
			}else{
				$response['status'] = false;
				$response['message'] = lang('something_went_wrong');
				echo json_encode($response);
			}

        }
    }

    public function employee_list()
    {
        $id = $this->session->userdata('id');
        $condition = array('conditions' => ['provider_id' => $id,'subtype'=>'employee']);
        $data['employee_list'] = $this->QueryModel->selectData('users',$condition);
        //print_r($data['employee_list']);die;
        if ($this->agent->is_mobile()) {
			$data['content'] = 'provider/employee_list';
			$this->load->view("template/template",$data);
        }else{
			$data['content'] = 'desktop/provider/employee_list';
			$this->load->view("desktop/template/template",$data);
        }
    }

	public function editEmployeeAjaxRequest()
	{
		$id = $_POST['id'];
		$url = base_url().'provider/editEmployee/'.$id;
		$response['status'] = true;
		$response['url'] = $url;
		echo json_encode($response);
	}

	public function editEmployee($id)
	{
		$condition = array('conditions' => ['id' => $id]);
		$data['empDetail'] = $this->ProviderModel->selectSingleRow('users',$condition);
		if ($this->agent->is_mobile()) {
			$data['content'] = 'provider/edit_employee';
			$this->load->view("template/template",$data);
        }else{
			$data['content'] = 'desktop/provider/edit_employee';
			$this->load->view("desktop/template/template",$data);
        }
	}

	public function unique_email($email) {
		$id = $this->input->post('id');
		$check_condition = ['conditions' => ['email' => $email]];
		$isExistemail = $this->QueryModel->selectSingleRow('users', $check_condition);
	
		if ($isExistemail && ($isExistemail['id'] !== $id)) {
			$this->form_validation->set_message('unique_email', 'The {field} is already taken.');
			return FALSE;
		}
	
		return TRUE;
	}
	
	public function unique_phone($phone) {
		$id = $this->input->post('id');
		$check_condition = ['conditions' => ['phone' => $phone]];
		$isExistPhone = $this->QueryModel->selectSingleRow('users', $check_condition);

		if ($isExistPhone && ($isExistPhone['id'] !== $id)) {
			$this->form_validation->set_message('unique_phone', 'The {field} is already taken.');
			return FALSE;
		}
	
		return TRUE;
	}

	public function update_employee()
	{
		// Set validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|callback_unique_phone');
	
		// Run validation
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, return validation errors
			$response['status'] = false;
			$response['message'] = validation_errors();
			echo json_encode($response);
			return;
		} else {
			// Validation passed, proceed with saving the employee
			// Retrieve form data
			$id = $this->input->post('id'); // Assuming you have 'id' in your form
	
			$condition = array('id' => $id);
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$status_employee = $this->input->post('status_employee');
	
			$value = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'status' => $status_employee
			);
	
			$updateData = $this->ProviderModel->update('users', $condition, $value);
			if ($updateData) {
				$response['status'] = true;
				$response['message'] = lang('employee_updated_successfully');
				$response['url'] = base_url() . 'provider/employee_list';
				echo json_encode($response);
			} else {
				$response['status'] = false;
				$response['message'] = lang('something_went_wrong');
				echo json_encode($response);
			}
		}
	}
	
	
}
