<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $responsedata['url'] = base_url('dashboard/my_voucher'.$url_slug);
        $responsedata['status'] = true;
        echo json_encode($responsedata);
        return;
    }

    public function my_voucher()
    {

        $unUsed_cond = array(
            'joins' => array(
                array(
                    'table' => 'offer',
                    'joinWith' => 'offer.id = vouchers.offer_id',
                    'type' => 'left',
                ),
            ),
            'conditions' => ['status' => 'unreedem'],
            'fields' => 'vouchers.*, offer.image', 
        );        
        $data['unused_vouchers'] =$this->QueryModel->selectData('vouchers',$unUsed_cond);
        // echo "<pre>";
        // print_r($data['unused_vouchers'][0]['image']);die;
        $used_cond = array(
            'joins' => array(
                array(
                    'table' => 'offer',
                    'joinWith' => 'offer.id = vouchers.offer_id',
                    'type' => 'left',
                ),
            ),
            'conditions' => ['status' => 'reedem'],
            'fields' => 'vouchers.*, offer.image', 
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
            'fields' => 'vouchers.*, offer.image', 
        );
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');  
        $data['voucher'] = $this->QueryModel->selectSingleRow('vouchers', $condition);
        $data['content'] = 'voucher_detail';
        $this->load->view("template/template",$data);
    }

    public function voucher_detail_ajax()
    {
        $url_slug = fetcharea();
        $id = $_POST['id'];
        $response['status'] = true;
        $response['url'] = base_url('dashboard/get_voucher_detail/'.$id.''.$url_slug);
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
            $response['url'] = base_url('login'.$url_slug);
            echo json_encode($response);
            return;
        }else{
            $response['val'] = $data['sellingVal'];
            $response['data'] = $data;
            $response['status'] = true;
            $response['url'] = base_url('dashboard/payment/'.$id.''.$url_slug);
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
            if($userDetailnew->name == ''){
                $this->session->set_userdata('show_modal', true);
                $this->session->set_userdata('whatsapp_user_id', $userDetailnew->id);
                // $url = base_url() . 'login';
            }
            if($userDetailnew->type=='users'){
                $sesdata = array(
					'id'		=> $userDetailnew->id,
					'name'      => $userDetailnew->name,
					'type' => $userDetailnew->type,
                    'subtype'=> $userDetailnew->subtype,
                    'logged_in' => TRUE,
				);
                $this->session->set_userdata($sesdata);
                if($this->input->cookie('login_redirect',true))
                {
	    	    delete_cookie('login_redirect');
                    $url = $this->input->cookie('login_redirect',true);
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
                $url = base_url() . 'affilator';
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
            $responsedata['url'] = $url;
            $responsedata['status'] = true;
            $responsedata['message'] = 'Success';
            echo json_encode($responsedata);
            return;
        } else {
            $responsedata['status'] = false;
            $responsedata['message'] = 'Otp is Not Matched';
            echo json_encode($responsedata);
            return;
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
    $responsedata['message'] = 'Inserted Successfully';
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
        $response['message'] = 'Payment Success';
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
            $response['message'] = 'Payment Success';
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
        $response['message'] = 'Invalid payment type or missing details';
    }

    // Return the JSON response
    echo json_encode($response);
    return;
}
public function insert_all_labels_into_db(){
// echo 'aa';
    $get_all_languages = $this->QueryModel->selectData('languages');
    if(isset($get_all_languages) && !empty($get_all_languages)){
        foreach ($get_all_languages as $key => $value) {
            $lang = strtolower($value['language_name']);

            insert_labels_into_db($lang);
        }
    }
// print_r($aaa);
    print_r('All labels inserted into db');
}
public function get_total_price()
{      
    $id = $_POST['id'];
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
    $response['totalPrice'] = get_price($total_price);
    echo json_encode($response);
    return;
}

public function loginRequestAjax()
{
    $url_slug = fetcharea();
    $responsedata['url'] = base_url() . 'login'.$url_slug;
    $responsedata['status'] = true;
    echo json_encode($responsedata);
    return;
}

function logout()
{
    session_unset();
    $url_slug = fetcharea();
    $responsedata['url'] = base_url() . 'login'.$url_slug;
    $responsedata['status'] = true;
    echo json_encode($responsedata);
    return;
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
        $response['status'] = false;
        $response['message'] = "Key Expired";
        echo json_encode($response);
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
                $url = base_url() . 'affilator';
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
        $response['message'] = "Invalid Key";
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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $condition = array('id' => $id);
    $updateValue = array(
        'name' => $name
    );
    $updateRes = $this->QueryModel->update('users',$condition,$updateValue);
    $userDetail = $this->QueryModel->selectSingleRow('users',['conditions' => ['id' => $updateRes]]);
    if($updateRes)
    {
        $userDetail = $this->QueryModel->selectSingleRow('users',['conditions' => ['id' => $updateRes]]);
        $this->session->set_userdata('userAuth', $userDetail);
        if($this->input->cookie('login_redirect',true))
        {
            $url = $this->input->cookie('login_redirect',true);
        }else
        {
            $url = base_url() . 'offer';
        }
        redirect($url);
    }
}

}
