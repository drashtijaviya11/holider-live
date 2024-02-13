<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'libraries/dompdf/autoload.inc.php';
// use function GuzzleHttp\json_decode;
use Dompdf\Dompdf;
use Dompdf\Options;
class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->library('session');
        $this->load->library('stripe_lib');
    }

    public function createPayment()
    {   //print_r($this->input->post('stripeToken'));
        if($this->input->post('stripeToken')){
            // Retrieve stripe token, card and user info from the submitted form data
            $postData = $this->input->post();
            // $postData['product'] = $product;
            
            // Make payment
            // print_r($postData);
            $paymentID = $this->payment($postData);
            print_r($paymentID);exit;
            // If payment successful
            if($paymentID){
                print_r($paymentID);exit;
                redirect('payment/payment_status');
            }else{
                $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
                $data['error_msg'] = 'Transaction has been failed!'.$apiError;
            }
        }
        die;
    }
    function payment($postData){
		$user_id = $this->session->userdata('id');
        
        // session_destroy('buy_now_session');
        $this->session->unset_userdata('buy_now_session');
		// If post data is not empty
		if(!empty($postData)){
            // return $postData;
			// Retrieve stripe token, card and user info from the submitted form data
			$token  = $postData['stripeToken'];
			$name = 'hardik';//$postData['name'];
			$email = 'hardik.l2036@gmail.com';//$postData['email'];
			$offer_id = $postData['offer_id'];
            $picTime = $postData['picTime'];
            $adult_Qnty = $postData['adult_Qnty'];
            $child_Qnty = $postData['child_Qnty'];
            $adult_Rate = $postData['adult_Rate'];
            $picDate = $postData['picDate'];
            $child_Rate = $postData['child_Rate'];
            $cardNum = $postData['cardNum'];
            $cvcNum = $postData['cvcNum'];
            $dateText = $postData['dateText'];
            $yearText = $postData['yearText'];
            $condition = array('conditions' => ['id' => $offer_id]);
            $offers = $this->QueryModel->selectSingleRow('offer',$condition);
            $provider_id = $offers['provider_id']; 
            $totalammount = $adult_Qnty * $adult_Rate + $child_Qnty * $child_Rate;
			// Unique order ID
			$orderID = strtoupper(str_replace('.','',uniqid('', true)));
			// return $orderID;
			// Add customer to stripe
			$customer = $this->stripe_lib->addCustomer($email, $token);
// 			print_r($customer);die('jkbhjvbfxj');
// 			return $customer->id;
			if($customer){
			
                $charge = $this->stripe_lib->createCharge($customer->id, $offers['name'], $totalammount, $orderID);
				print_r($charge);die('kkkkkkkkkkk');
				if($charge){
					// Check whether the charge is successful
					if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){
						// Transaction details 
						$transactionID = $charge['balance_transaction'];
						$paidAmount = $charge['amount'];
						$paidAmount = ($paidAmount/100);
						$paidCurrency = $charge['currency'];
						$payment_status = $charge['status'];
						
						
					
						// Insert tansaction data into the database
                        $insert_data = array(
                            'offer_id' => $offer_id,
                            'user_id' => $user_id,
                            'provider_id' => $provider_id,
                            'qty' => $adult_Qnty,
                            'offer_rate' => $adult_Rate,
                            'child_qty' => $child_Qnty,
                            'child_offer_rate' =>$child_Rate,
                            'total_amount' => $totalammount,
                            'currency_type' => trim(strtoupper($currencytype)),
                            'pickup_date' => $picDate,
                            'pickup_time' => $picTime,
                            'child_commission'=>$offers['child_commission'],
                            'adult_commission'=>$offers['adult_commission'],
                        );
                        $orderID = $this->QueryModel->insert('offer_purchase',$insert_data);
                        // $this->saveCard($cardNum,$user_id,$dateText,$yearText);
                        if($orderID){
                            $this->createVoucher($offer_id,$orderID,$child_Qnty,$adult_Qnty,$picDate);
                            // $response = array(
                            //     'status' => true,
                            //     'data' => $insert_data,
                            // );
                        }
                        // echo json_encode($response);
						
						// If the order is successful
						if($payment_status == 'succeeded'){
							return $payment_status;
						}
					}
				}
			}
		}
		return false;
    }
	
	function payment_status(){
		$data = array();
		
		// Get order data from the database
        $order = 'success';
		
        // Pass order data to the view
		$data['order'] = $order;
        $this->load->view('payment-status', $data);
    }
    function cancel(){
        echo 'cancle';
    }
    public function  success_payment(){
        $this->session->unset_userdata('buy_now_session');
		delete_cookie('login_redirect');
        $get_data=$this->input->get();
        $key = $get_data['session_id'];
        $user_id = $this->session->userdata('id');
        $data = json_decode($get_data['data']);
        $condition = array('conditions' => ['id' => $data->offer_id]);
        $offers = $this->QueryModel->selectSingleRow('offer',$condition);
        $offer_currency = $offers['currency_type'];
        // print_r($data->offer_id);die;
        $data->user_id = $this->session->userdata('id');
        $data->provider_id = $offers['provider_id']; 
        $data->total_amount = $data->qty * $data->offer_rate + $data->child_qty * $data->child_offer_rate;
        $data->currency_type = trim(strtoupper($data->currency_type));
        $orderID = $this->QueryModel->insert('offer_purchase',$data);
        // print_r($data->offer_id);exit;
        if($orderID){
            $inserted_value = $this->createVoucher($data->offer_id,$orderID,$data->child_qty,$data->qty,$data->pickup_date,$key,$user_id,$data->pickup_time,$offers['offer_type']);
        }
       
        //  redirect('offer');
        $order = 'success';
		
        // Pass order data to the view
		$datanew['payment_status'] = $order;
		$datanew['inserted_value'] = $inserted_value;
		$redirect_url = 'payment/payment_success_status?' . http_build_query(['payment_status' => $order, 'inserted_value' => json_encode($datanew),'trans_id'=>$key,'offer_id'=>$data->offer_id,'total_amount'=>$data->total_amount,'offer_name'=>$offers['name'],'adult_qty'=>$data->qty,'child_qty'=>$data->child_qty,'offer_currency'=>$offer_currency]);
		redirect($redirect_url);
    }

	public function payment_success_status()
	{
		// Retrieve parameters from the URL
		$payment_status = $this->input->get('payment_status');
		$inserted_value_json = $this->input->get('inserted_value');
        $trans_id = $this->input->get('trans_id');
        $total_amount = $this->input->get('total_amount');
        $adult_qty =$this->input->get('adult_qty');
        $child_qty =$this->input->get('child_qty');
        $offer_id =$this->input->get('offer_id');
        $offer_currency =$this->input->get('offer_currency');
		// Decode JSON to get the original array
        $offer_name = $this->input->get('offer_name');
		$currency_condition = array('conditions' => ['name' => $offer_name],'fields' => 'currency_type');
		$data['currency_type'] = $this->QueryModel->selectSingleRow('offer',$currency_condition);
		$datanew = json_decode($inserted_value_json, true);
		$data['payment_status'] = $payment_status;
		$data['inserted_value'] = $datanew['inserted_value'];
		
	    $user_id =$this->session->userdata('id');
        $condition = array('conditions' => ['id' => $user_id]);
        $users_data = $this->QueryModel->selectSingleRow('users',$condition);
        $data['email']= $users_data['email'];
        $data['mobile']=$users_data['phone'];
        $data['trans_id'] = $trans_id; 
        $data['total_amount'] = $total_amount;
        $data['offer_name'] = $offer_name;
        $data['child_qty'] = $child_qty;
        $data['offer_id'] = $offer_id;
        $data['offer_currency'] = $offer_currency;
        $data['adult_qty'] = $adult_qty;
		if ($this->agent->is_mobile()) {
            $data['content'] = 'payment-status';
			$this->load->view("template/template", $data);
		} else {
            $data['content'] = 'desktop/payment-status';
			$this->load->view("desktop/template/template", $data);
		}
	}


    public function cancle_payment(){
        echo 'cancle';
    }
    public function purchaseOffer(){
        if($this->input->post() !='' && $this->input->post() != null){
            $data['picTime'] = $_POST['picTime'];
            $data['adult_Qnty'] = $_POST['adult_Qnty'];
            $data['child_Qnty'] = $_POST['child_Qnty'];
            $data['adult_Rate'] = $_POST['adult_Rate'];
            $data['child_Rate'] = $_POST['child_Rate'];
            $data['sellingPrice'] = $_POST['sellingPrice'];
            $data['offer_id'] = $_POST['offer_id'];
            $data['picDate'] = $_POST['picDate'];
            $data['postData'] = $this->input->post();
            $data['totalValue'] = $data['adult_Qnty'] * $data['adult_Rate']  + $data['child_Qnty'] * $data['child_Rate'];
            $this->session->set_userdata('buy_now_session',$data);
        }
        if($this->session->userdata('type') != 'users' &&  $this->session->userdata('logged_in') != TRUE)
        {
            set_cookie("login_redirect",base_url('payment/purchaseOffer/'), time() + (24 * 60 * 60));
			set_cookie("redirect_from",base_url('offer/single_offer/').$_POST['offer_id'], time() + (24 * 60 * 60));
            redirect('login');
            return;
        }
        $buy_now= $this->session->userdata('buy_now_session');
        $data['picTime'] = $buy_now['picTime'];
        $data['adult_Qnty'] = $buy_now['adult_Qnty'];
        $data['child_Qnty'] = $buy_now['child_Qnty'];
        $data['adult_Rate'] = $buy_now['adult_Rate'];
        $data['child_Rate'] = $buy_now['child_Rate'];
        $data['sellingPrice'] = $buy_now['sellingPrice'];
        $data['picDate'] = $buy_now['picDate']; //$_POST['picDate'];
        $data['offer_id'] = $buy_now['offer_id'];
        $condition = array('conditions' => ['id' => $buy_now['offer_id']]);
        $offers = $this->QueryModel->selectSingleRow('offer',$condition);
        $data['offername'] = $offers['name'];
        $data['totalValue'] = $data['adult_Qnty'] * $data['adult_Rate']  + $data['child_Qnty'] * $data['child_Rate'];
		$data['currencies'] = $this->QueryModel->selectData('currencies');
        if ($this->agent->is_mobile()) {
        $data['content'] = 'payment';
        $this->load->view("template/template",$data);
        }else{
        $data['content'] = 'desktop/payment';
        $this->load->view("desktop/template/template",$data);
        }
    }

    public function createVoucher($offerId,$insertId,$child_Qnty,$adult_Qnty,$picDate,$key,$user_id,$time,$offet_type){
        $user_id = $this->session->userdata('id');
        $condition = array('conditions' => ['id' => $offerId ]);
        $offers = $this->QueryModel->selectSingleRow('offer',$condition);

        $conditionuser = array('conditions' => ['id' => $user_id ]);
        $user_data = $this->QueryModel->selectSingleRow('users',$conditionuser);
        
	$pickup_date = '';
	$pickup_time = '';
    $hour = '';
    $minute = '';
    $pickup_time = $time;//$hour.':'.$minute;
    $pickup_date =$picDate;
	// Format the updated date
        $final_expire = date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 day'));// $dateTime->format('Y-m-d H:i:s');
        $insert_data = array(
            'offer_id' => $offerId,
            'user_id' =>$user_id,
            'affilator_id'=>$user_data['affilator_id'],
            'offer_purchase_id' => $insertId,
            'provider_id' => $offers['provider_id'],
            'currency_type' =>$offers['currency_type'],
            'offer_name' => $offers['name'],
            'offer_code' => $offers['barcode'],
            'transaction_key' =>$key,
            'purchase_date' => date('Y-m-d H:i:s'),
            'pickup_date' => $pickup_date,
            'pickup_time' => $pickup_time,
            'expire_date' =>$final_expire,//date('Y-m-d H:i:s'),
            'status' => 'unreedem'
        );
        $condition_user = array('conditions' => ['id' => $user_id]);
        $users_details = $this->QueryModel->selectSingleRow('users',$condition_user);
        $condition_provider = array('conditions' => ['id' => $offers['provider_id']]);
        $provider_details = $this->QueryModel->selectSingleRow('users',$condition_provider);
        $insertedIds = [];
    if($offet_type=='both'){
        for($i=0; $i<$child_Qnty; $i++)
        {
            if($offers['child_discount'] != 0){
                $voucher_price = $offers['child_discount'];
            }else{
                $voucher_price = $offers['child_price'];
            }
            $uniqueCode = generate_unique_code(20);
            $image_path = $this->generate_QRCode($uniqueCode,$offerId);
            $insert_data['qr_image'] = $image_path;
            $insert_data['voucher_code'] = $uniqueCode;
            $insert_data['currency_type'] = $offers['currency_type'];
            $insert_data['person_type'] = 'child';
            $insert_data['price'] =  $voucher_price;
            $total_comission = $offers['child_commission'];
            if($total_comission != 0){
                $affiliator_commision = $voucher_price / 100 * 5;
                $admin_comission =$total_comission - $affiliator_commision;
            }else{
                $affiliator_commision= 0;
                $admin_comission= 0;
            }
            $insert_data['commission'] =  $admin_comission;
            $insert_data['affialiator_commission'] =  $affiliator_commision;
            $insertId = $this->QueryModel->insert('vouchers',$insert_data);
            $insertedIds[] =$insertId;
            if(!empty($users_details['email'])){
                $this->data['qr_image'] = $image_path;
                $this->data['voucher_code'] = $uniqueCode;
                $this->data['offer_name'] = $offers['name'];
                $this->data['currency_type'] = $offers['currency_type'];
                $this->data['offer_price'] = $voucher_price;
                $this->data['address'] = $user_data['address'];
                $this->data['phone'] = $user_data['phone'];
                $this->data['username'] = $user_data['name'];
                $this->data['provider'] = $provider_details['name'];
                $this->data['expire_date'] = $final_expire;
                $this->data['pickup_date'] = $pickup_date;
                $this->data['pickup_time'] = $pickup_time;
                $this->data['hour'] = $hour;
                $this->data['minute'] = $minute;
                $this->data['type'] = 'child';
                $this->data['voucher_id'] = $insertId;
                $this->data['purchasedate'] = date('Y-m-d H:i:s');
                $this->data['provider_name'] = $provider_details['name'];
                $this->data['provider_phone'] = $provider_details['phone'];
                $this->data['provider_address'] = $provider_details['address'];
                // ===============pdf===================


                $path = FCPATH.'uploads/order_pdf/';
            if (!is_dir($path)){
                mkdir($path, 0755, TRUE);
            }
            $html = $this->load->view("pdf", $this->data, true);
                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $options->set('defaultFont', 'DejaVuSans');
                    $options->set('fontFallback', 'Arial, Helvetica, sans-serif');
                    $dompdf = new Dompdf($options);
					$dompdf->setPaper('A4', 'portrait');
					$dompdf->set_option('margin_left', '0mm');
					$dompdf->set_option('margin_right', '0mm');
					$dompdf->set_option('margin_top', '0mm');
					$dompdf->set_option('margin_bottom', '0mm');
                    $dompdf->load_html($html);
                    $dompdf->render();
                  
                    //Save PDF in server.
                    if(file_put_contents($path."holider_".$uniqueCode.".pdf", $dompdf->output())){
                        $order_pdfs['file_name'] = "holider_".$uniqueCode.".pdf";
                        $attach = base_url()."uploads/order_pdf/holider_".$uniqueCode.".pdf";
                    }

                send_mail_new($users_details['email'], 'Holider', $this->load->view('email_template', $this->data, true),$attach);
                send_mail_new($provider_details['email'], 'Holider', $this->load->view('email_template_provider', $this->data, true));
            }
        }
        for($i=0; $i<$adult_Qnty; $i++)
        {
            if($offers['adult_discount'] != 0){
                $voucher_price = $offers['adult_discount'];
            }else{
                $voucher_price = $offers['adult_price'];
            }
            $uniqueCode = generate_unique_code(20);
            $image_path = $this->generate_QRCode($uniqueCode,$offerId);
            $insert_data['qr_image'] = $image_path;
            $insert_data['voucher_code'] = $uniqueCode;
            $insert_data['person_type'] = 'adult';
            $insert_data['currency_type'] = $offers['currency_type'];
            $insert_data['price'] =  $voucher_price;
            $total_comission = $offers['adult_commission'];
            if($total_comission != 0){
                $affiliator_commision = $voucher_price / 100 * 5;
                $admin_comission =$total_comission - $affiliator_commision;
            }else{
                $affiliator_commision= 0;
                $admin_comission= 0;
            }
           
            $insert_data['commission'] =  $admin_comission;
            $insert_data['affialiator_commission'] =  $affiliator_commision;
            $insertId = $this->QueryModel->insert('vouchers',$insert_data);
            $insertedIds[] =$insertId;
            if(!empty($users_details['email'])){
                $this->data['qr_image'] = $image_path;
                $this->data['voucher_code'] = $uniqueCode;
                $this->data['offer_name'] = $offers['name'];
                $this->data['currency_type'] = $offers['currency_type'];
                $this->data['offer_price'] = $voucher_price;
                $this->data['address'] = $user_data['address'];
                $this->data['phone'] = $user_data['phone'];
                $this->data['provider'] = $provider_details['name'];
                $this->data['username'] = $user_data['name'];
                $this->data['expire_date'] = $final_expire;
                // $this->data['pickupdate'] = $final_pickup;
                $this->data['pickup_date'] = $pickup_date;
                $this->data['pickup_time'] = $pickup_time;
                $this->data['hour'] = $hour;
                $this->data['minute'] = $minute;
                $this->data['type'] = 'adult';
                $this->data['voucher_id'] = $insertId;
                $this->data['purchasedate'] = date('Y-m-d H:i:s');
                // $this->data['user_name'] = $user_data['name'];
                $this->data['purchasedate'] = date('Y-m-d H:i:s');
                $this->data['provider_name'] = $provider_details['name'];
                $this->data['provider_phone'] = $provider_details['phone'];
                $this->data['provider_address'] = $provider_details['address'];
                // ===============pdf===================


                $path = FCPATH.'uploads/order_pdf/';
            if (!is_dir($path)){
                mkdir($path, 0755, TRUE);
            }
            // $this->data['order_items'] = 'aaaa';
                   
                    $html = $this->load->view("pdf", $this->data, true);
                    // $html = $this->load->view("pdf");
    
                    // $dompdf = new DOMPDF();
                    //use Dompdf\Options;
                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $options->set('defaultFont', 'DejaVuSans');
                    $options->set('fontFallback', 'Arial, Helvetica, sans-serif');
                    $dompdf = new Dompdf($options);
					// $dompdf->setPaper([0, 0, 180, 300], 'portrait');
                    $dompdf->setPaper('A4', 'portrait');
					$dompdf->set_option('margin_left', '0mm');
					$dompdf->set_option('margin_right', '0mm');
					$dompdf->set_option('margin_top', '0mm');
					$dompdf->set_option('margin_bottom', '0mm');
                    $dompdf->load_html($html);
                    // $dompdf->load_html(utf8_decode($html), 'UTF-8');
                    $dompdf->render();
                  
                    //Save PDF in server.
                    if(file_put_contents($path."holider_".$uniqueCode.".pdf", $dompdf->output())){
                        $order_pdfs['file_name'] = "holider_".$uniqueCode.".pdf";
                        $attach = base_url()."uploads/order_pdf/holider_".$uniqueCode.".pdf";
                    }

                send_mail_new($users_details['email'], 'Holider', $this->load->view('email_template', $this->data, true),$attach);
                send_mail_new($provider_details['email'], 'Holider', $this->load->view('email_template_provider', $this->data, true));
            }
        }
    }else{
        for($i=0; $i<$child_Qnty; $i++)
        {
            if($offers['child_discount'] != 0){
                $voucher_price = $offers['child_discount'];
            }else{
                $voucher_price = $offers['child_price'];
            }
            $uniqueCode = generate_unique_code(20);
            $image_path = $this->generate_QRCode($uniqueCode,$offerId);
            $insert_data['qr_image'] = $image_path;
            $insert_data['voucher_code'] = $uniqueCode;
            $insert_data['currency_type'] = $offers['currency_type'];
            $insert_data['person_type'] = 'ticket';
            $insert_data['price'] =  $voucher_price;
            $total_comission = $offers['child_commission'];
            if($total_comission != 0){
                $affiliator_commision = $voucher_price / 100 * 5;
                $admin_comission =$total_comission - $affiliator_commision;
            }else{
                $affiliator_commision= 0;
                $admin_comission= 0;
            }
            $insert_data['commission'] =  $admin_comission;
            $insert_data['affialiator_commission'] =  $affiliator_commision;
            $insertId = $this->QueryModel->insert('vouchers',$insert_data);
            $insertedIds[] =$insertId;
            if(!empty($users_details['email'])){
                $this->data['qr_image'] = $image_path;
                $this->data['voucher_code'] = $uniqueCode;
                $this->data['offer_name'] = $offers['name'];
                $this->data['currency_type'] = $offers['currency_type'];
                $this->data['offer_price'] = $voucher_price;
                $this->data['address'] = $user_data['address'];
                $this->data['phone'] = $user_data['phone'];
                $this->data['username'] = $user_data['name'];
                $this->data['provider'] = $provider_details['name'];
                $this->data['expire_date'] = $final_expire;
                // $this->data['pickupdate'] = $final_pickup;
                $this->data['pickup_date'] = $pickup_date;
                $this->data['pickup_time'] = $pickup_time;
                $this->data['hour'] = $hour;
                $this->data['minute'] = $minute;
                $this->data['type'] = 'ticket';
                $this->data['voucher_id'] = $insertId;
                $this->data['purchasedate'] = date('Y-m-d H:i:s');
                $this->data['provider_name'] = $provider_details['name'];
                $this->data['provider_phone'] = $provider_details['phone'];
                $this->data['provider_address'] = $provider_details['address'];
                // $this->data['user_name'] = $user_data['name'];

                // ===============pdf===================


                $path = FCPATH.'uploads/order_pdf/';
            if (!is_dir($path)){
                mkdir($path, 0755, TRUE);
            }
            // $this->data['order_items'] = 'aaaa';
                   
                    $html = $this->load->view("pdf", $this->data, true);
                    // $html = $this->load->view("pdf");
    
                    // $dompdf = new DOMPDF();
                   
                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $options->set('defaultFont', 'DejaVuSans');
                    $options->set('fontFallback', 'Arial, Helvetica, sans-serif');
                    $dompdf = new Dompdf($options);
					// $dompdf->setPaper([0, 0, 180, 300], 'portrait');
                    $dompdf->setPaper('A4', 'portrait');
					$dompdf->set_option('margin_left', '0mm');
					$dompdf->set_option('margin_right', '0mm');
					$dompdf->set_option('margin_top', '0mm');
					$dompdf->set_option('margin_bottom', '0mm');
                    $dompdf->load_html($html);
                    // $dompdf->load_html(utf8_decode($html), 'UTF-8');
                    $dompdf->render();
                  
                    //Save PDF in server.
                    if(file_put_contents($path."holider_".$uniqueCode.".pdf", $dompdf->output())){
                        $order_pdfs['file_name'] = "holider_".$uniqueCode.".pdf";
                        $attach = base_url()."uploads/order_pdf/holider_".$uniqueCode.".pdf";
                    }

                send_mail_new($users_details['email'], 'Holider', $this->load->view('email_template', $this->data, true),$attach);
                send_mail_new($provider_details['email'], 'Holider', $this->load->view('email_template_provider', $this->data, true));
            }
        }
        for($i=0; $i<$adult_Qnty; $i++)
        {
            if($offers['adult_discount'] != 0){
                $voucher_price = $offers['adult_discount'];
            }else{
                $voucher_price = $offers['adult_price'];
            }
            $uniqueCode = generate_unique_code(20);
            $image_path = $this->generate_QRCode($uniqueCode,$offerId);
            $insert_data['qr_image'] = $image_path;
            $insert_data['voucher_code'] = $uniqueCode;
            $insert_data['person_type'] = 'ticket';
            $insert_data['currency_type'] = $offers['currency_type'];
            $insert_data['price'] =  $voucher_price;
            $total_comission = $offers['adult_commission'];
            if($total_comission != 0){
                $affiliator_commision = $voucher_price / 100 * 5;
                $admin_comission =$total_comission - $affiliator_commision;
            }else{
                $affiliator_commision= 0;
                $admin_comission= 0;
            }
           
            $insert_data['commission'] =  $admin_comission;
            $insert_data['affialiator_commission'] =  $affiliator_commision;
            $insertId = $this->QueryModel->insert('vouchers',$insert_data);
            $insertedIds[] =$insertId;
            if(!empty($users_details['email'])){
                $this->data['qr_image'] = $image_path;
                $this->data['voucher_code'] = $uniqueCode;
                $this->data['offer_name'] = $offers['name'];
                $this->data['currency_type'] = $offers['currency_type'];
                $this->data['offer_price'] = $voucher_price;
                $this->data['address'] = $user_data['address'];
                $this->data['phone'] = $user_data['phone'];
                $this->data['provider'] = $provider_details['name'];
                $this->data['username'] = $user_data['name'];
                $this->data['expire_date'] = $final_expire;
                // $this->data['pickupdate'] = $final_pickup;
                $this->data['pickup_date'] = $pickup_date;
                $this->data['pickup_time'] = $pickup_time;
                $this->data['hour'] = $hour;
                $this->data['minute'] = $minute;
                $this->data['type'] = 'ticket';
                $this->data['voucher_id'] = $insertId;
                $this->data['purchasedate'] = date('Y-m-d H:i:s');
                // $this->data['user_name'] = $user_data['name'];
                $this->data['purchasedate'] = date('Y-m-d H:i:s');
                $this->data['provider_name'] = $provider_details['name'];
                $this->data['provider_phone'] = $provider_details['phone'];
                $this->data['provider_address'] = $provider_details['address'];
                // ===============pdf===================


                $path = FCPATH.'uploads/order_pdf/';
            if (!is_dir($path)){
                mkdir($path, 0755, TRUE);
            }
            // $this->data['order_items'] = 'aaaa';
                   
                    $html = $this->load->view("pdf", $this->data, true);
                    // $html = $this->load->view("pdf");
    
                    // $dompdf = new DOMPDF();
                    //use Dompdf\Options;
                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $options->set('defaultFont', 'DejaVuSans');
                    $options->set('fontFallback', 'Arial, Helvetica, sans-serif');
                    $dompdf = new Dompdf($options);
					// $dompdf->setPaper([0, 0, 180, 300], 'portrait');
                    $dompdf->setPaper('A4', 'portrait');
					$dompdf->set_option('margin_left', '0mm');
					$dompdf->set_option('margin_right', '0mm');
					$dompdf->set_option('margin_top', '0mm');
					$dompdf->set_option('margin_bottom', '0mm');
                    $dompdf->load_html($html);
                    // $dompdf->load_html(utf8_decode($html), 'UTF-8');
                    $dompdf->render();
                  
                    //Save PDF in server.
                    if(file_put_contents($path."holider_".$uniqueCode.".pdf", $dompdf->output())){
                        $order_pdfs['file_name'] = "holider_".$uniqueCode.".pdf";
                        $attach = base_url()."uploads/order_pdf/holider_".$uniqueCode.".pdf";
                    }

                send_mail_new($users_details['email'], 'Holider', $this->load->view('email_template', $this->data, true),$attach);
                send_mail_new($provider_details['email'], 'Holider', $this->load->view('email_template_provider', $this->data, true));
            }
        }
    }
       // print_r($attach);exit;
        return $insertedIds;
    }

    // public function saveCard($cardNum,$user_id,$dateText,$yearText)
    // {
    //     $insertCard = array(
    //         'user_id' => $user_id,
    //         'payment_type' => 'Card',
    //         'card_number' => $cardNum,
    //         'expire_date' => $dateText,
    //         'expire_year' => $yearText
    //     );
    //     // $insertId = $this->QueryModel->insert('payment_method',$insertCard);
    // }
    	public function generate_QRCode($code = null,$offer_id = null) {
        $this->load->library('ciqrcode');
        $params['data'] = $code. ' - ' .$offer_id;
        $params['level'] = 'H';
        $params['size'] = 10;
    $upload_folder = 'upload/';


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
     return $file_path;

    }
   
}
