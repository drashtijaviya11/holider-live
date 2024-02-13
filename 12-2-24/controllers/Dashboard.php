<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'libraries/dompdf/autoload.inc.php';
// use function GuzzleHttp\json_decode;
use Dompdf\Dompdf;
use Dompdf\Options;
class Dashboard extends CI_Controller
{
        function __construct()
        {
            parent::__construct();
            $this->load->model('QueryModel');
            $this->load->helper('cookie');  
            $this->load->helper('cookie');
            $this->load->library('session');
        }


    public function index()
    {
        $data['content'] = 'dashboard';
        $this->load->view("template/template",$data);
    }

    
    public function myVouchersAjaxRequest()
    {   
        $url_slug = fetcharea();
        $responsedata['url'] = base_url('dashboard/my_voucher');
        $responsedata['status'] = true;
        echo json_encode($responsedata);
        return;
    }

    public function my_voucher()
    {if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('type')=='users') { 
      
		$limit = 15;
		$offset = 0;
        $user_id = $this->session->userdata('id');
        $unUsed_cond = array(
            'joins' => array(
                array(
                    'table' => 'offer',
                    'joinWith' => 'offer.id = vouchers.offer_id',
                    'type' => 'left',
                ),
            ),
            'conditions' => ['status' => 'unreedem','user_id' =>$user_id],
            'fields' => 'vouchers.*, offer.image,offer.currency_type', 
			'order_by' => array(
				'field' => 'vouchers.id', // Replace with the actual field name
				'order' => 'DESC'   // 'asc' for ascending, 'desc' for descending
			),
			'limit' => $limit,
			'offset' => $offset,
        );        
        $data['unused_vouchers'] =$this->QueryModel->selectData('vouchers',$unUsed_cond);
        // echo "<pre>";
        // print_r($data['unused_vouchers']);die;
        $used_cond = array(
            'joins' => array(
                array(
                    'table' => 'offer',
                    'joinWith' => 'offer.id = vouchers.offer_id',
                    'type' => 'left',
                ),
            ),
            'conditions' => ['status' => 'reedem','user_id' =>$user_id],
            'fields' => 'vouchers.*, offer.image,offer.currency_type', 
			'limit' => $limit,
			'offset' => $offset,
			'order_by' => array(
				'field' => 'vouchers.id', // Replace with the actual field name
				'order' => 'DESC'   // 'asc' for ascending, 'desc' for descending
			)
            // 'user_id'=>$user_id,
        );      
        $data['used_vouchers'] =$this->QueryModel->selectData('vouchers',$used_cond);
        if ($this->agent->is_mobile()) {
            $data['content'] = 'my_voucher';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/my_voucher';
            $this->load->view("desktop/template/template",$data);
        }
          
    }
    else
    { 
        // $url = $this->uri->segment(1);
        // set_cookie('last_url_login',strtolower($url),'31536000');
        // echo "<script>window.open('".base_url()."','_self')</script>"; 
        set_cookie("login_redirect",base_url('dashboard/my_voucher/'), time() + (24 * 60 * 60));
            redirect('login');
    }
    }
    public function pdf(){
		
		
            // $path = FCPATH.'uploads/order_pdf/';
            // if (!is_dir($path)){
            //     mkdir($path, 0755, TRUE);
            // }
            // $this->data['order_items'] = 'aaaa';
                   
                    // $html = $this->load->view("pdf", $this->data, true);
                    // $html = $this->load->view("pdf");
                    $this->data['qr_image'] = 'aa';
                    $this->data['voucher_code'] = 'aa';
                    $this->data['currency_type'] = 'USD';
                    $this->data['offer_name'] ='aa';
                    $this->data['offer_price'] ='aa';
                    $this->data['address'] = 'aa';
                    $this->data['phone'] = 'aa';
                    $this->data['provider'] = 'aa';
                    $this->data['username'] = 'aa';
                    $this->data['expire_date'] = 'aa';
                    $this->data['pickupdate'] = 'aa';
                    $this->data['hour'] = 'aa';
                    $this->data['minute'] = 'aa';
                    $this->data['type'] = 'adult';
                    $this->data['voucher_id'] = 'aa';
                    $this->data['purchasedate'] = date('Y-m-d H:i:s');
                    // $this->data['user_name'] = $user_data['name'];
                    $this->data['purchasedate'] = date('Y-m-d H:i:s');
                    $this->data['provider_name'] = 'aa';
                    $this->data['provider_phone'] = 'aa';
                    $this->data['provider_address'] = 'aa';
                    // ===============pdf===================
    
    
                   
                       
                        // $html = $this->load->view("pdf", $this->data, true);
                        $this->load->view('pdf',  $this->data,true);
                    // $dompdf = new DOMPDF();
					// $dompdf->setPaper([0, 0, 180, 300], 'portrait');
					// $dompdf->set_option('margin_left', '0mm');
					// $dompdf->set_option('margin_right', '0mm');
					// $dompdf->set_option('margin_top', '0mm');
					// $dompdf->set_option('margin_bottom', '0mm');
                    // $dompdf->load_html($html);
                    // $dompdf->render();
                  
                    // //Save PDF in server.
                    // if(file_put_contents($path."order.pdf", $dompdf->output())){
                    //     $order_pdfs['file_name'] = "order.pdf";
                    //     $order_pdfs['file_url'] = base_url("uploads/order_pdf/order.pdf");
                    // }
              

		
		// if(isset($order_pdfs) && !empty($order_pdfs)){
		// 	$data = array('status' => true,'order_pdf' => $order_pdfs);
		// }else{
		// 	$data = array('status' => false);
		// }

		// echo json_encode($data);
	}
    public function change_language() {
        $language = $_POST['lang'];
        // set_cookie('user_language',$language,'31536000');
        set_cookie('lang',$language,'31536000');
        $response['status'] = true;
        $response['language'] = $language;
        echo json_encode($response);
        return;
    }

    public function change_currency() {
        $cur_code = $_POST['cur_code'];
        set_cookie('currency_code',$cur_code,'31536000');
        $response['status'] = true;
        // $response['language'] = $language;
        echo json_encode($response);
        return;
    }


    public function get_voucher_detail($id)
    {
        $user_id = $this->session->userdata('id');
        $user_cond = array('conditions' => ['id' => $user_id]);
        $data['user'] =$this->QueryModel->selectSingleRow('users',$user_cond);
        $condition = array(
            'joins' => array(
                array(
                    'table' => 'offer',
                    'joinWith' => 'offer.id = vouchers.offer_id',
                    'type' => 'left',
                ),
            ),
            'conditions' => ['vouchers.id' => $id],
            'fields' => 'vouchers.*, offer.image,offer.currency_type', 
        );
		$msgCondition = array(
			'conditions' => ['status' => '','voucher_id' => $id]
		);
		$data['contactSupport_message'] = $this->QueryModel->selectData('contact_support',$msgCondition);
		$msgRplyCondition = array(
			'conditions' => ['status !=' => '','voucher_id' => $id]
		);
		$data['contactSupport_messageReply'] = $this->QueryModel->selectData('contact_support',$msgRplyCondition);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');  
        $data['voucher'] = $this->QueryModel->selectSingleRow('vouchers', $condition);
        if ($this->agent->is_mobile()) {
            $data['content'] = 'voucher_detail';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/voucher_detail';
            $this->load->view("desktop/template/template",$data);
        }
    }

    public function voucher_detail_ajax()
    {
        $url_slug = fetcharea();
        $id = $_POST['id'];
        $response['status'] = true;
        $response['url'] = base_url('dashboard/get_voucher_detail/'.$id);
        echo json_encode($response);
        return;
    }

    public function payment($id)
    {
            delete_cookie('login_redirect');
            $data['sellingVal'] = $this->session->userdata('sellingVal');
            $data['adultRate'] = $this->session->userdata('qty');
            $data['offer_rate'] = $this->session->userdata('offer_rate');
            $data['id'] = $id;
            $data['content'] = 'payment';
            $this->load->view("template/template",$data);
            $this->session->unset_userdata(['sellingVal', 'qty', 'offer_rate']);

    }
    public function get_email_details(){
        $language = $this->input->get('lang');
        // set_cookie('user_language',$language,'31536000');
        set_cookie('lang',$language,'31536000');
        $voucher_id = $this->input->get('voucher_id');
        $condition = array('conditions' => ['id' => $voucher_id]);
        $voucher = $this->QueryModel->selectSingleRow('vouchers',$condition);
        $user_id = $this->session->userdata('id');
        $condition = array('conditions' => ['id' => $voucher['offer_id'] ]);
        $offers = $this->QueryModel->selectSingleRow('offer',$condition);

        $conditionuser = array('conditions' => ['id' => $user_id ]);
        $user_data = $this->QueryModel->selectSingleRow('users',$conditionuser);
    	$final_pickup = '';
	    
	    $createdDate = date('d/m/Y');
        $dateTime = DateTime::createFromFormat('d/m/Y', $createdDate);
	    $expire_datetime = $dateTime->format('Y-m-d H:i:s');
	    $new_expire = new DateTime($expire_datetime);
        $dateTime->add(new DateInterval('P15D'));

        // Format the updated date
        $final_expire = $dateTime->format('Y-m-d H:i:s');
       
        $condition_provider = array('conditions' => ['id' => $offers['provider_id']]);
        $provider_details = $this->QueryModel->selectSingleRow('users',$condition_provider);
        // $insertedIds = [];
            
            // if(!empty($users_details['email'])){
                $data['qr_image'] = $voucher['qr_image'];
                $data['voucher_code'] = $voucher['voucher_code'];
                $data['offer_name'] = $offers['name'];
                $data['currency_type'] = $offers['currency_type'];
                $data['offer_price'] = $voucher['price'];
                $data['address'] = $user_data['address'];
                $data['phone'] = $user_data['phone'];
                $data['username'] = $user_data['name'];
                $data['provider'] = $provider_details['name'];
                $data['expire_date'] = $final_expire;
                // $data['pickupdate'] = $final_pickup;
                // $data['hour'] = $hour;
                // $data['minute'] = $minute;
                $data['type'] = $voucher['type'];
                // $data['voucher_id'] = $insertId;
                $data['purchasedate'] = date('Y-m-d H:i:s');
                // $data['user_name'] = date('Y-m-d H:i:s');
                $data['content'] = 'email_template_view';
                if ($this->agent->is_mobile()) {
                    $this->load->view("template/template",$data);
                }else{
                    $this->load->view("desktop/template/template",$data);
                }
                // send_mail_new($users_details['email'], 'Holider', $this->load->view('email_template', $this->data, true));
            // }
        
    }
    public function buy_now_ajaxRequest()
    {
        $url_slug = fetcharea();
        $id = $_POST['id'];
        $data['pic_date'] = $_POST['pic_date'];
        $data['pic_time'] = $_POST['pic_time'];
        $data['adultQnty'] = $_POST['adultQnty'];
        $data['childQnty'] = $_POST['childQnty'];
        $data['adultRate'] = $_POST['adultRate'];
        $data['childRate'] = $_POST['childRate'];
        $data['sellingVal'] = $_POST['sellingVal'];
        $data['picDate'] = $_POST['picDate'];
        $data['picTime'] = $_POST['picTime'];
        $this->session->set_userdata('buyOfferDetail',$data);
        if($this->session->userdata('type') != 'users')  
        {
            set_cookie("login_redirect",base_url('dashboard/payment/'.$data['id'].''), time() + (24 * 60 * 60));
            $response['status'] = false;
            $response['url'] = base_url('login');
            echo json_encode($response);
            return;
        }else{
            $response['val'] = $data['sellingVal'];
            $response['data'] = $data;
            $response['status'] = true;
            $response['url'] = base_url('dashboard/payment/'.$id);
            echo json_encode($response);
            return;
        }
    }
function daily_updated_price2(){
    // echo  'aa';exit;
   $aaa= daily_updated_price();
   print_r($aaa);
}
function lang_add_offer(){
    if(insert_trans_lang(1,"translate","title","description") === true){
        add_translation_data_on_file();
    }
}
public function mail_otp(){
    $email_id = $_POST['email_id'];
    $six_digit_random_number = random_int(100000000, 999999999);
        if(!empty($email_id)){
            $userDetail = $this->QueryModel->selectSingleRow('users',['conditions' => ['email' => $email_id]]);
            if(!empty($userDetail)){

            
                $condition = array('email' => $email_id);
                $updateValue = array(
                    'otp' => $six_digit_random_number,
                    'otp_time'=> date("Y-m-d h:i:s")
                );
                $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
                $mydata['otp'] = $six_digit_random_number;
                // $user_id = $this->session->userdata('id');
            
                $mydata['username'] = $userDetail['name'];
            
                send_mail_new($email_id, 'Holider', $this->load->view('email_otp', $mydata, true));
                $responsedata['status'] = true;
                $responsedata['message'] = lang('email_sent_successfully');
                echo json_encode($responsedata);
                return;
            }else{
            //    echo 'email not exist';
               $responsedata['status'] = false;
               $responsedata['message'] = lang('email_not_exist');
               echo json_encode($responsedata);
               return;
            }
            
        }else{
        //   echo  'email not exist';
          $responsedata['status'] = false;
          $responsedata['message'] = lang('email_not_exist');
          echo json_encode($responsedata);
          return;
        }
}
    public function veryfy_otp()
    {
        $url_slug = fetcharea();
        $otp = $_POST['otp'];
        // $condition = array('conditions' => ['otp' => $otp]);
        // $userDetailnew = $this->QueryModel->selectSingleRow('users',$condition);
        $startTime = date("Y-m-d H:i:s");
         $convertedTime = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime($startTime)));
        if($otp=='999999999' || $otp == '888888888'){
            $userDetailnew = $this->db->query("SELECT * FROM users WHERE otp = '$otp'")->row();
        }else{
            $userDetailnew = $this->db->query("SELECT * FROM users WHERE otp = '$otp' AND otp_time  < '$convertedTime'")->row();
        }
        if ($userDetailnew) {
            if($userDetailnew->status == 0 || $userDetailnew->status == ''){ 
                $responsedata['status'] = false;
                $responsedata['message'] = lang('your_account_has_been_deactivated_please_contact_at_support');
                echo json_encode($responsedata);
                return;
            }
            if($userDetailnew->name == ''){
                $this->session->set_userdata('show_modal', true);
                $this->session->set_userdata('whatsapp_user_id', $userDetailnew->id);
                // $url = base_url() . 'login';
            }
            if($userDetailnew->type=='users'){
                if($userDetailnew->affilator_id ==''){
                    if($this->input->cookie('affiliator_key',true)){
                        $aff_key = $this->input->cookie('affiliator_key');
                        $affiliator_key = customDecrypt($aff_key, 'fXK9RNGo2D');
                        $condition = array('id' => $userDetailnew->id);
                        $updateValue = array(
                            'affilator_id' => $affiliator_key,
                        );
                        $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
                        delete_cookie('affiliator_key');
                    }
                }
                $sesdata = array(
					'id'		=> $userDetailnew->id,
					'name'      => $userDetailnew->name,
					'type' => $userDetailnew->type,
                    'subtype'=> $userDetailnew->subtype,
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                if($this->input->cookie('login_redirect',true))
                {$url = $this->input->cookie('login_redirect',true);
	    	    delete_cookie('login_redirect');
                    
                }else
                {
                    $url = base_url() . 'offer';
                }
            }else if($userDetailnew->type=='affiliator'){
               $sesdata = array(
					'id'		=> $userDetailnew->id,
					'name'      => $userDetailnew->name,
					'type' => $userDetailnew->type,
                    'subtype'=> $userDetailnew->subtype,
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                $url = base_url() . 'affiliator';
            }else if($userDetailnew->type=='provider'){
                if( $userDetailnew->subtype == ''){
                    $sesdata = array(
                        'id'		=> $userDetailnew->id,
                        'name'      => $userDetailnew->name,
                        'type' => $userDetailnew->type,
                        'subtype'=> $userDetailnew->subtype,                    
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($sesdata);
                    $url = base_url() . 'provider';
                }else{
                     $sesdata = array(
                        'id'		=> $userDetailnew->id,
                        'name'      => $userDetailnew->name,
                        'type' => $userDetailnew->type,
                        'subtype'=> $userDetailnew->subtype,                    
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($sesdata);
                    $url = base_url() . 'employee';
                }
            }else if($userDetailnew->type=='admin'){
                $sesdata = array(
					'id'		=> $userDetailnew->id,
					'name'      => $userDetailnew->name,
					'type' => $userDetailnew->type,
                    'subtype'=> $userDetailnew->subtype,
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                $url = base_url() . 'admin';
            }else{

            }
            $url = $this->convertToHttps($url);
            $responsedata['url'] = $url;
            $responsedata['status'] = true;
            $responsedata['message'] = lang('success');
            echo json_encode($responsedata);  
            return;
        } else {
            $responsedata['status'] = false;
            $responsedata['message'] = lang('invalid_otp');
            echo json_encode($responsedata);
            return;
        }
    }
    
    public function convertToHttps($url) {
        // Parse the URL
        $parsedUrl = parse_url($url);
    
        // Check if the scheme is already HTTPS
        if ($parsedUrl && isset($parsedUrl['scheme']) && strtolower($parsedUrl['scheme']) === 'https') {
            return $url;
        } else {
            // If the scheme is HTTP or not present, replace it with HTTPS
            $parsedUrl['scheme'] = 'https';
    
            // Rebuild the URL manually
            $convertedUrl = $parsedUrl['scheme'] . '://';
    
            if (isset($parsedUrl['host'])) {
                $convertedUrl .= $parsedUrl['host'];
            }
    
            if (isset($parsedUrl['port'])) {
                $convertedUrl .= ':' . $parsedUrl['port'];
            }
    
            if (isset($parsedUrl['path'])) {
                $convertedUrl .= $parsedUrl['path'];
            }
    
            if (isset($parsedUrl['query'])) {
                $convertedUrl .= '?' . $parsedUrl['query'];
            }
    
            if (isset($parsedUrl['fragment'])) {
                $convertedUrl .= '#' . $parsedUrl['fragment'];
            }
    
            return $convertedUrl;
        }
    }
public function save_card_detail()
{
    $user_id = $this->session->userdata('id');
    $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
    $card_cvc = isset($_POST['card_cvc']) ? $_POST['card_cvc'] : '';
    $expire_date = isset($_POST['expire_date']) ? $_POST['expire_date'] : '';
    $expire_year = isset($_POST['expire_year']) ? $_POST['expire_year'] : '';

    $value = array( 
        'user_id' => $user_id,
        'card_number' => $card_number,
        'expire_date' => $expire_date,
        'expire_year' => $expire_year
    );
    $this->QueryModel->insert('payment_method',$value);
    $responsedata['status'] = true;
    $responsedata['message'] = lang('inserted_successfully');
    echo json_encode($responsedata);
    return;
}

public function purchaseOffer() {
    $paypal_email = $this->input->post('paypal_email');
    $payment_type = $this->input->post('payment_type');
    $offer_id = $this->input->post('offer_id');
    $offer_rate = $this->input->post('offer_rate');
    $qty = $this->input->post('qty');
    $amount_add = $this->input->post('amount_add');
    $card_token = $this->input->post('card_token');

    // Process PayPal payment
    if ($payment_type === 'paypal' && $paypal_email !== '') {
        // Handle PayPal payment logic here
        // ...

        // Assuming success
        $response['status'] = true;
        $response['message'] = lang('payment_success');
        $response['url'] = base_url('offer');
    }
    // Process Stripe payment
    elseif ($payment_type === 'card' && $card_token !== '') {
        try {
            // Set your Stripe secret key
            \Stripe\Stripe::setApiKey('stripe_api_key');

            // Create a charge using the received token
            $charge = \Stripe\Charge::create([
                'amount' => $amount_add * 100,  // Amount should be in cents
                'currency' => 'usd',             // Change to your desired currency
                'source' => $card_token,
                'description' => 'Purchase of Offer ID: ' . $offer_id,
            ]);

            // Insert payment and purchase details into your database
            // ...

            // Assuming success
            $response['status'] = true;
            $response['message'] = lang('payment_success');
            $response['url'] = base_url('offer');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors
            $response['status'] = false;
            $response['message'] = $e->getError()->message;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Handle other Stripe errors
            $response['status'] = false;
            $response['message'] = $e->getError()->message;
        }
    } else {
        $response['status'] = false;
        $response['message'] = lang('invalid_payment_type_or_missing_details');
    }

    // Return the JSON response
    echo json_encode($response);
    return;
}

public function insert_all_labels_into_db(){
// echo 'aa';
    $this->db->truncate('language_label');
    $get_all_languages = $this->QueryModel->selectData('languages');
    if(isset($get_all_languages) && !empty($get_all_languages)){
        foreach ($get_all_languages as $key => $value) {
            $lang = strtolower($value['language_name']);
            // if($lang=='english' || $lang=='hebrew'){
                insert_labels_into_db($lang);
            // }
            
        }
    }
// print_r($aaa);
    print_r('All labels inserted into db');
}
public function get_total_price()
{      
    $id = $_POST['id'];
	$condition = array('conditions' => ['id' => $id]);
	$data['offer'] = $this->QueryModel->selectSingleRow('offer' ,$condition);
	$default_currency = $data['offer']['currency_type'];
    $adultQnty = $_POST['adultQnty'];
    $childQnty = $_POST['childQnty'];
    $childPrice = $_POST['childPrice'];
    $adultPrice = $_POST['adultPrice'];
    $total_child_price = $childQnty * $childPrice;
    $total_adult_price = $adultQnty * $adultPrice;
    $total_price = $total_child_price + $total_adult_price;
    // $discount_condition = array('conditions' => ['offer_id' => $id]);
    // $discount = $this->QueryModel->selectSingleRow('discount', $discount_condition);
    // $discount_price = get_price($total_price * (1 - $discount['discount_rate']/100));
    $response['status'] = true;
    $response['total_child_price'] = $total_child_price;
    $response['total_adult_price'] = $total_adult_price;
    $response['totalPrice'] = get_currency($total_price,$default_currency);
    echo json_encode($response);
    return;
}

public function loginRequestAjax()
{
    $url_slug = fetcharea();
    $responsedata['url'] = base_url() . 'login';
    $responsedata['status'] = true;
    echo json_encode($responsedata);
    return;
}

function logout()
{
    session_unset();
    $url_slug = fetcharea();
    // $responsedata['url'] = base_url() . 'home';
    $url = base_url() . 'home';
    // $responsedata['status'] = true;
    // echo json_encode($responsedata);
    // return;
    redirect($url);
}

public function whatsapp_login()
{
    $encoded_value = $this->input->get('key');
    $decoded_value = base64_decode($encoded_value);
    $data=json_decode($decoded_value);
    $user_id = $data->id;
    // print_r($user_id);exit;
    $name = $data->name;
    $timestampString = $data->date; 
    $timestamp = new DateTime($timestampString);
    $currentDateTime = new DateTime();
    $difference = $currentDateTime->diff($timestamp);
    $totalHours = $difference->days * 24 + $difference->h;
    if($totalHours >= 24){
		if ($this->agent->is_mobile()) {
			$dataa['content'] = 'keyExpired';
			$this->load->view("template/template",$dataa);
        }else{
			$dataa['content'] = 'desktop/keyExpired';
			$this->load->view("desktop/template/template",$dataa);
        }
		return;
    }
    $userDetail = $this->QueryModel->selectSingleRow('users',['conditions' => ['id' => $user_id]]);
    // print_r($userDetail);exit;
    delete_cookie('last_url_login');
    if($userDetail){
        if($userDetail['name'] == ''){
            $this->session->set_userdata('show_modal', true);
            $this->session->set_userdata('whatsapp_user_id', $user_id);
            // $url = base_url() . 'login';
        }
            if($userDetail['type']=='users'){
                if($userDetail['affilator_id'] ==''){
                    if($this->input->cookie('affiliator_key',true)){
                        $aff_key = $this->input->cookie('affiliator_key');
                        $affiliator_key = customDecrypt($aff_key, 'fXK9RNGo2D');
                        $condition = array('id' => $userDetail['id']);
                        $updateValue = array(
                            'affilator_id' => $affiliator_key,
                        );
                        $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
                        delete_cookie('affiliator_key');
                    }
                }
                $sesdata = array(
					'id'		=> $userDetail['id'],
					'name'      => $userDetail['name'],
					'type' => $userDetail['type'],
                    'subtype'=> $userDetail['subtype'],
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                if($this->input->cookie('login_redirect',true))
                {
                    $url = $this->input->cookie('login_redirect',true);
                }else
                {
                    $url = base_url() . 'offer';
                }
            }else if($userDetail['type']=='affiliator'){
                $sesdata = array(
					'id'		=> $userDetail['id'],
					'name'      => $userDetail['name'],
					'type' => $userDetail['type'],
                    'subtype'=> $userDetail['subtype'],
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                $url = base_url() . 'affiliator';
            }else if($userDetail['type']=='provider'){
                if($userDetail['subtype']==''){
                    $sesdata = array(
                        'id'		=> $userDetail['id'],
                        'name'      => $userDetail['name'],
                        'type' => $userDetail['type'],
                        'subtype'=> $userDetail['subtype'],
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($sesdata);
                    $url = base_url() . 'provider';
                }else{
                    $sesdata = array(
                        'id'		=> $userDetail['id'],
                        'name'      => $userDetail['name'],
                        'type' => $userDetail['type'],
                        'subtype'=> $userDetail['subtype'],
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($sesdata);
                    $url = base_url() . 'employee';
                }
            }else if($userDetail['type']=='admin'){
                $sesdata = array(
					'id'		=> $userDetail['id'],
					'name'      => $userDetail['name'],
					'type' => $userDetail['type'],
                    'subtype'=> $userDetail['subtype'],
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                $url = base_url() . 'admin';
               
            }else{

            }
            
        // }else{
           
        // }
    }else{
        $response['status'] = false;
        $response['message'] = lang("invalid_key");
        echo json_encode($response);
        return;
    }
    redirect($url);
}
public function generate_qr(){
    error_reporting(E_ALL);
    // foreach ($tabledata as $key => $value) {
        $id = 1;
        $params['level'] = 'H';
        $params['size'] = 7;
        $path = FCPATH . 'uploads/qr_code';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $filename = $id . '.png';
        $tabledata['qrcode'] = $filename;
        $params['savename'] = $path . '/' . $filename;

        // $params['data'] = 'https://'.$loggedin_res_domain.'.menyos.com/'.$id;
        $params['data'] = base_url() . 'my_restaurant/Tables/qr_code/' . $id;
        $tabledata['qrlink'] = $params['data'];
        // if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "localhost:8888") {
            $tblink = base_url() .'/' . $id;
        // } else {
            // $tblink = 'https://' . 'holider.com' . '.' . $_SERVER['HTTP_HOST'] . '/' . $id;
        // }
        $tabledata['tblink'] = $tblink;

        $this->ciqrcode->generate($params);
    // }
    print_r($tabledata);exit;
}
public function updateUser()
{
    $id = $this->session->userdata('id');
    $name = $_POST['name'];
    $condition = array('id' => $id);
    $updateValue = array(
        'name' => $name
    );
    $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
    $userDetail = $this->QueryModel->selectSingleRow('users',['conditions' => ['id' => $id]]);
    if($updateRes)
    {
		$sesdata = array(
			'id'		=> $userDetail['id'],
			'name'      => $userDetail['name'],
			'type' => $userDetail['type'],
			'subtype'=> $userDetail['subtype'],
			'logged_in' => TRUE,
		);
		$this->session->set_userdata($sesdata);
        if($this->input->cookie('login_redirect',true))
        {
			$url = $this->input->cookie('login_redirect',true);
			$response = [
				'url' => $url,
				'status' => true,
			];
        }else
        {
            $url = base_url() . 'offer';
			$response = [
				'url' => $url,
				'status' => true,
			];
        }
		echo json_encode($response);
        // redirect($url);
    }else{
		$response = [
			'Message' => lang("somthing_went_wrong"),
			'status' => true,
		];
	}
}
public function updateUser_email()
{   $user_id = $this->session->userdata('id');
    $id = $_POST['id'];
    $email = $_POST['email'];
    $inserted_value = $_POST['inserted_value'];
    $insertedIds = unserialize(html_entity_decode($inserted_value));
    // print_r($insertedIds);exit;
    $conditionupdate_user = array('id' => $id);
    $updateValue = array(
		'name' => 'Awdhesh',
        'email' => $email
    );
    $updateRes = $this->QueryModel->update('users',$conditionupdate_user,$updateValue);
    // print_r($this->db->last_query());exit;
    $userDetail = $this->QueryModel->selectSingleRow('users',['conditions' => ['id' => $user_id]]);
    
    if($updateRes)
    {
        if(!empty($insertedIds)){
            foreach($insertedIds as $key => $voucherdata){
                $condition = array('conditions' => ['id' => $voucherdata]);
                $voucher = $this->QueryModel->selectSingleRow('vouchers',$condition);

                $condition = array('conditions' => ['id' => $voucher['offer_id'] ]);
                $offers = $this->QueryModel->selectSingleRow('offer',$condition);

                $condition_provider = array('conditions' => ['id' => $offers['provider_id']]);
                $provider_details = $this->QueryModel->selectSingleRow('users',$condition_provider);
                // print_r($voucher);die;
                if($voucher['person_type']=='person_type'){ 
                    $type= 'Adult'; }else{ 
                        $type= 'Child';
                    }
                    $dateString = $voucher['pickup_date'];
					$timeString = $voucher['pickup_time'];
					$dateTime = DateTime::createFromFormat('d/m/Y', $dateString);
					$time_converting = DateTime::createFromFormat('H:i', $timeString);
					$dateTime = $dateTime->format('Y-m-d');
					// print_r($time_converting);
					// die;
                    $hour = $time_converting->format('H');
                    $minute = $time_converting->format('i');


                if(!empty($userDetail['email'])){
                    $mydata['qr_image'] = $voucher['qr_image'];
                    $mydata['voucher_code'] = $voucher['voucher_code'];
                    $mydata['voucher_id'] = $voucher['id'];
                    $mydata['offer_name'] = $offers['name'];
                    $mydata['currency_type'] = $offers['currency_type'];
                    $mydata['offer_price'] = $voucher['price'];
                    $mydata['address'] = $userDetail['address'];
                    $mydata['phone'] = $userDetail['phone'];
                    $mydata['username'] = $userDetail['name'];
                    $mydata['provider'] = $provider_details['name'];
                    $mydata['expire_date'] = $voucher['expire_date'];
                    $mydata['pickupdate'] = $voucher['pickup_date'];
					$mydata['pickup_time'] = $voucher['pickup_time'];
                    // $mydata['hour'] = $hour;
                    // $mydata['minute'] = $minute;
                    $mydata['type'] = $type;
                    $mydata['purchasedate'] = $voucher['purchase_date'];
                    $mydata['provider_name'] = $provider_details['name'];
                    $mydata['provider_phone'] = $provider_details['phone'];
                    $mydata['provider_address'] = $provider_details['address'];
					$path = FCPATH.'uploads/order_pdf/';
					if (!is_dir($path)){
						mkdir($path, 0755, TRUE);
					}
					$html = $this->load->view("pdf",$mydata, true);
					// $html = $this->load->view("pdf");
	
					// $dompdf = new DOMPDF();
					
					$options = new Options();
					$options->set('isRemoteEnabled', true);
					$dompdf = new Dompdf($options);
					// $dompdf->setPaper([0, 0, 180, 300], 'portrait');
					$dompdf->setPaper('A4', 'portrait');
					$dompdf->set_option('margin_left', '0mm');
					$dompdf->set_option('margin_right', '0mm');
					$dompdf->set_option('margin_top', '0mm');
					$dompdf->set_option('margin_bottom', '0mm');
					$dompdf->load_html($html);
					$dompdf->render();
					$uniqueCode = $voucher['voucher_code'];
					//Save PDF in server.
					if(file_put_contents($path."holider_".$uniqueCode.".pdf", $dompdf->output())){
						$order_pdfs['file_name'] = "holider_".$uniqueCode.".pdf";
						$attach = base_url()."uploads/order_pdf/holider_".$uniqueCode.".pdf";
					}
					
                    send_mail_new($userDetail['email'], 'Holider', $this->load->view('email_template', $mydata, true),$attach);
					
                }
            }
        }
    }
	redirect('dashboard/my_voucher');
}
public function addDevice()
{
	$data['content'] = 'payment';
	$this->load->view("template/template",$data);
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
	
		if($serial['user_id'] == null)
		{
			$insert = array(
				'user_id' => $id
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
				'user_id' => $id
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
				'Message' => lang('your_registered_device_is').": ".$ip,
				'status' => true,
			];
			echo json_encode($response);
		}
	}
}
public function update_nfc_device($id,$device){
    $insert = array(
        'user_id' => $id
    );
    $nfc_condition = array('serial' => $device);
    $resp =$this->QueryModel->update('nfc_devices',$nfc_condition,$insert);
    if($resp){
        return true;
    }
    return false;
}
public function insert_nfc_device($id,$device){
    $insertData = array(
        'serial' => $device,
        'user_id' => $id
    );
    $res = $this->QueryModel->insert('nfc_devices',$insertData);
    if($res){
        return true;
    }
    return false;
}
public function get_unused_voucher_items()
{
	$limit = 15;
	$offset = $_POST['unUsedOffset'];
	$user_id = $this->session->userdata('id');
	$unUsed_cond = array(
		'joins' => array(
			array(
				'table' => 'offer',
				'joinWith' => 'offer.id = vouchers.offer_id',
				'type' => 'left',
			),
		),
		'conditions' => ['status' => 'unreedem','user_id' =>$user_id],
		'fields' => 'vouchers.*, offer.image', 
		'limit' => $limit,
		'offset' => $offset,
		'order_by' => array(
			'field' => 'vouchers.id', // Replace with the actual field name
			'order' => 'DESC'   // 'asc' for ascending, 'desc' for descending
		)
	);        
	$unused_data['unused_vouchers'] =$this->QueryModel->selectData('vouchers',$unUsed_cond);
	// $html = $this->load->view('desktop/get_unused_voucher',$unused_data,true);
	if ($this->agent->is_mobile()) {
		$html = $this->load->view('get_unused_voucher',$unused_data,true);
	}else{
		$html = $this->load->view('desktop/get_unused_voucher',$unused_data,true);
	}
	$response = array(
		'voucher' => $unused_data['unused_vouchers'],
		'status' => true,
		'html' => $html,
	);

	// Set the content type header
	$this->output->set_content_type('application/json');
	echo json_encode($response);
	return;

}

public function get_used_voucher_items()
{
	$limit = 15;
	$offset = $_POST['usedOffset'];
	$user_id = $this->session->userdata('id');
	$used_cond = array(
		'joins' => array(
			array(
				'table' => 'offer',
				'joinWith' => 'offer.id = vouchers.offer_id',
				'type' => 'left',
			),
		),
		'conditions' => ['status' => 'reedem','user_id' =>$user_id],
		'fields' => 'vouchers.*, offer.image', 
		'limit' => $limit,
		'offset' => $offset,
		'order_by' => array(
			'field' => 'vouchers.id', // Replace with the actual field name
			'order' => 'DESC'   // 'asc' for ascending, 'desc' for descending
		)
		// 'user_id'=>$user_id,
	);      
	$used_data['used_vouchers'] =$this->QueryModel->selectData('vouchers',$used_cond);       
	// $html = $this->load->view('desktop/get_used_voucher',$used_data,true);
	if ($this->agent->is_mobile()) {
		$html = $this->load->view('get_used_voucher',$used_data,true);
	}else{
		$html = $this->load->view('desktop/get_used_voucher',$used_data,true);
	}
	$response = array(
		'voucher' => $used_data['used_vouchers'],
		'status' => true,
		'html' => $html,
	);

	// Set the content type header
	$this->output->set_content_type('application/json');
	echo json_encode($response);
	return;
}


public function contactSupport()
{
	$voucher_id = $this->input->post('voucher_id');
	$offer_id = $this->input->post('offer_id');
	$message = $this->input->post('message');
	$condition = array('conditions' => ['id' => $offer_id]);
	$offerDetail = $this->QueryModel->selectSingleRow('offer',$condition);
	$provider_id = $offerDetail['provider_id'];
	$insertData = array(
		'voucher_id' => $voucher_id,
		'offer_id' => $offer_id,
		'message' => $message,
		'provider_id' => $provider_id,
	);

	$insert = $this->QueryModel->insert('contact_support',$insertData);
	if($insert){
		$response = array(
			'message' => $message,
			'status' => true,
		);
	}else
	{
		$response = array(
			'status' => false,
			'message' => 'Something Went Wrong'
		);
	}

	$this->output->set_content_type('application/json')->set_output(json_encode($response));

}


}
