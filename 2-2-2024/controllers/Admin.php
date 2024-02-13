<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->model('AffiliatorModel');
        $this->load->helper('string');
        $this->load->helper('custom_helper');
        $this->load->library('session');	
        set_cookie("lang", 'english', time() + (24 * 60 * 60));
        set_cookie("currency_code", 'USD', time() + (24 * 60 * 60));
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('type')=='admin') { 
            return 1;      
        }
		else
		{ $url = $this->uri->segment(1);
            set_cookie('last_url_login',strtolower($url),'31536000');
            echo "<script>window.open('".base_url()."login','_self')</script>"; 
		}
    }
    
    public function index()
    {   
        // $user_data = $this->session->userdata('adminAuth');
        // print_r($user_data['type']);exit;
        $data['content'] = 'admin/admin_dashboard';
        $this->load->view("admin/template/template",$data);
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
    
    public function dashboard()
    {
        $data ['category'] = $this->QueryModel->selectData('category');
        $data['content'] = 'add_offer';
        $this->load->view("admin/template/template",$data);
    }
    public function image_modal_for_add()
    {
        // $res_id = get_rest_id();
        // $id = $this->input->post('item_id');
        // $conditions = array();
        // $this->data['item_id'] = $id;
        // // $conditions = array();
        // // $conditions['conditions'] = array("id" => $id);
        // // $this->data['record_images'] = $this->QueryModel->selectSingleRow("items", $conditions);
        // $conditions = array("id" => $id);
        $this->data['record_images'] = '';//get_single_item_from_file($res_id, $conditions);

        $responsedata['content'] = $this->load->view('image_cropper', $this->data, TRUE);
        $responsedata['status'] = true;

        echo json_encode($responsedata);
        return;
    }
    public function image_add()
    {
        $postData = $this->input->post();
        $images = json_decode($postData['item_images']);
        $image = $images[0];
        echo json_encode(array('image_name' => $image));
    }
    public function upload_item_img()
    {
        $img = $this->input->post('image');
        $remove_type = explode(";", $img);
        $remove_base = explode(",", $remove_type[1]);
        $final_data = $remove_base[1];
        $final_img = base64_decode($final_data);

        $fn = 'uploads/items/item_image_' . time() . ".png";
        $imagedata = file_put_contents($fn, $final_img);
        $i_data = explode('/', $fn);
        echo json_encode(array('image_name' => $i_data[2]));
        return;
    }
    public function save_offer() {
        $this->load->library('upload');
        $config['upload_path']   = 'uploads/';
        $targetDir = "uploads/";
        // $thumbnailDir = "thumbnail/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';  // Add 'mp4' to the allowed file types
        $this->upload->initialize($config);
        
        $adult_price = isset($_POST['adult_price']) ? $_POST['adult_price'] : 0;
        $child_price = isset($_POST['child_price']) ? $_POST['child_price'] : 0;
        $file_paths  = [];
        
        foreach ($_FILES['image']['name'] as $key => $name) {
            $_FILES['file']['name']     = $_FILES['image']['name'][$key];
            $_FILES['file']['type']     = $_FILES['image']['type'][$key];
            $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$key];
			$_FILES['file']['size']     = $_FILES['image']['size'][$key]; // Add this line for size
        
            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $file_names[] = $uploadData['file_name'];
                $file_paths[] = ['url' => 'uploads/' . $uploadData['file_name']];
                $fileName = $uploadData['file_name'];
                $sourceImage = $targetDir . $fileName;
                $mobileThumbnail = "thumbnail/mobile/" .$fileName;
                $desktopThumbnail = "thumbnail/desktop/" .$fileName;
                // Create mobile thumbnail (e.g., 320x240)
                createThumbnail($sourceImage, $mobileThumbnail, 540, 480);

                // Create desktop thumbnail (e.g., 640x480)
                createThumbnail($sourceImage, $desktopThumbnail, 468, 170);

            }
        }
        

            $encodedImagePaths = json_encode($file_paths);
            $random_code = generate_unique_code(20);
            $description=$_POST['detail'];
            // $description =iconv(mb_detect_encoding($desc, mb_detect_order(), true), "UTF-8", $desc);
            $insert_data = array(
                'name'        => $_POST['offer_name'],
                'address'     => $_POST['address'],
                'country'     => $_POST['country'],
                'state'       => $_POST['state'],
                'phone'       => $_POST['phone'],
                'details'     => $description,
                'barcode'    => $random_code,
                'provider_id' => $_POST['provider'],
                'categories'    => $_POST['category'],
                'image'       => $encodedImagePaths,
				'adult_price'      => !empty($_POST['adult_price']) ? $_POST['adult_price'] : 0,
				'adult_discount'   => !empty($_POST['adult_discount']) ? $_POST['adult_discount'] : 0,
				'adult_commission' => !empty($_POST['adult_commission']) ? $_POST['adult_commission'] : 0,
				'child_price'      => !empty($_POST['child_price']) ? $_POST['child_price'] : 0,
				'child_discount'   => !empty($_POST['child_discount']) ? $_POST['child_discount'] : 0,
				'child_commission' => !empty($_POST['child_commission']) ? $_POST['child_commission'] : 0,
                'direct_pay' => $_POST['direct_pay'],
                'traveling_time' => $_POST['travelling_time'],
                'payment_time' => $_POST['payment_time'],
                'terms_and_condition' => $_POST['termsConditions'],
				'pickup' => isset($_POST['pickup']) ? $_POST['pickup'] : 'NO',
				'refund' => isset($_POST['refund']) ? $_POST['refund'] : 'NO',
				'special_offer' => isset($_POST['special_offer']) ? $_POST['special_offer'] : '',
				'area' => isset($_POST['area']) ? $_POST['area'] : '',
				'currency_type' => $_POST['default_currency'],
				'offer_type' => $_POST['offer_type'],
				'google_map' => $_POST['google_map'],
				'visiting_start' => $_POST['visiting_start'],
				'visiting_end' => $_POST['visiting_end'],
				// 'is_real' => 1
            );
			// $insert_area = array(
			// 	'area' => isset($_POST['area']) ? $_POST['area'] : '',
			// );
			// $area_response = $this->QueryModel->insert('area', $insert_area);
            $res = $this->QueryModel->insert('offer', $insert_data);

            if(insert_trans_lang($_POST['offer_name'],$_POST['detail'],$_POST['termsConditions'],$_POST['special_offer']) === true){
                //add_translation_data_on_file();
            }
            if($res){
                $condition = array('conditions' => ['id' => $res]);
                $user_condition = array('conditions' => ['type' => 'provider']);
                // $data['offers'] = $this->QueryModel->selectData('offer',$condition);
                $data['providers'] = $this->QueryModel->selectData('users',$user_condition);
                $providerOffer = $this->QueryModel->selectData('offer',$condition);
                foreach($providerOffer as &$offer){
                    $condition_ofr = array(
                        'conditions' => ['offer_id' => $offer['id']]
                        );
                    $purchaseResult = $this->QueryModel->offerPurchased('offer_purchase',$condition_ofr);
                    $cat_condition = array(
                        'conditions' => ['id' => $offer['categories']]
                    );
                    $cat_Result = $this->QueryModel->selectData('category',$cat_condition);
                    $temmpCond = array(
                        'conditions' => ['offer_id' => $offer['id']]
                    );
                    $offer['countOffer'] = $this->QueryModel->record_count('offer_purchase',$temmpCond);
                    $totAmCond = array(
                        'conditions' => ['offer_id' => $offer['id']],
                    );
                    $offer['totalAmount'] = $this->QueryModel->totalAmount('offer_purchase',$totAmCond,'total_amount');
                    $offer['category'] = $cat_Result[0]['category_name'];
                    $offer['adlt_purchased_offer'] = $purchaseResult->total_adlt_offer;
                    $offer['chld_purchased_offer'] = $purchaseResult->total_chld_offer;
                }
                $data['offers'] = $providerOffer;      
                $data['country'] = $this->QueryModel->selectData('countries');
                $data['state'] = $this->QueryModel->selectData('states');          
                $html = $this->load->view("admin/appendOffer",$data,true);
                $respon = array(
                    'data' => $insert_data,
                    'status'   => true,
                    'id'   => $res,
                    'message'  => 'Offer added successfully.',
                    'html' => $html
                );
            }else{
                $respon = array(
                    'status'   => false,
                    'res'   => $res,
                );
            }
            echo json_encode($respon);
    }
    public function save_translations()
    {
        $session_language='english';
        $all_languages = get_all_language_from_db();
        // $_POST = $this->input->post();
        
            $condition = array('id' => $_POST['tlang_id']);
            $records1['title'] = $_POST[$session_language . '-item-title'];
            $records1['description'] = $_POST[$session_language . '-item-description'];
            $records1['terms_and_condition'] = $_POST[$session_language . '-item-term'];
            foreach ($all_languages as $key => $value) {
                if($value['language_name'] == 'English'){
                    $records1['title_eng'] = $_POST['english-item-title'];     
                    $records1['description_eng'] = $_POST['english-item-description'];
                    $records1['term_en'] = $_POST['english-item-term'];     
                }elseif ($value['language_name'] == 'Dutch') {
                    $records1['title_du'] = $_POST['dutch-item-title'];              
                    $records1['description_du'] = $_POST['dutch-item-description'];
                    $records1['term_du'] = $_POST['dutch-item-term'];              
                }elseif ($value['language_name'] == 'German') {
                    $records1['title_ger'] = $_POST['german-item-title'];        
                    $records1['description_ger'] = $_POST['german-item-description'];
                    $records1['term_ger'] = $_POST['german-item-term'];        
                }elseif ($value['language_name'] == 'Hebrew') {
                    $records1['title_heb'] = $_POST['hebrew-item-title'];  
                    $records1['description_heb'] = $_POST['hebrew-item-description'];  
                    $records1['term_heb'] = $_POST['hebrew-item-term'];  
                }
                else{
                    $records1['title_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-title'];        
                    $records1['description_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-description'];
                    $records1['term_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-term'];        
                }
            }

            $this->QueryModel->update("translate_lang", $condition, $records1);
             
            $value_data = array(
                'name' => $_POST[$session_language . '-item-title'],
                'details'       => $_POST[$session_language . '-item-description'],
                'terms_and_condition' => $_POST[$session_language . '-item-term'],
            );
            // print_r($_POST['offer_id']);
            $update_condition_new = array('id' => $_POST['offer_id']);
            $this->QueryModel->update('offer',$update_condition_new,$value_data);
                // add_items_data_file($res_id);
            // }

            $responsedata['status'] = true;
            $responsedata['msg'] = 'successs';
            echo json_encode($responsedata);
            return;
       
    }
    
    public function get_translations()
    { 
        //print_r($this->input->post('offer_id'));exit;
        $all_languages = get_all_language_from_db();
        $incoming = array();
        $id = $_POST['offer_id'];
        $check_condition = array('conditions' => ['id' => $id]);
        $offers = $this->QueryModel->selectSingleRow('offer', $check_condition);
        // print_r($offers);exit;
        $tlang = get_single_data_from_file(array('title' => $offers['name']));

        $title_lang = array();
        $desc_lang = array();

        if(isset($tlang) && !empty($tlang)){
            foreach ($all_languages as $key => $value) {
                if($value['language_name'] == 'English'){
                    $title_lang[$key]['title'] = 'english';
                    $title_lang[$key]['trans'] = $tlang['title_eng'];
                }elseif ($value['language_name'] == 'Dutch') {
                    $title_lang[$key]['title'] = 'dutch';
                    $title_lang[$key]['trans'] = $tlang['title_du'];
                }elseif ($value['language_name'] == 'German') {
                    $title_lang[$key]['title'] = 'german';
                    $title_lang[$key]['trans'] = $tlang['title_ger'];
                }elseif ($value['language_name'] == 'Hebrew') {
                    $title_lang[$key]['title'] = 'hebrew';
                    $title_lang[$key]['trans'] = $tlang['title_heb'];
                }else{
                    $title_lang[$key]['title'] = strtolower($value['language_name']);
                    $title_lang[$key]['trans'] = $tlang['title_'.strtolower($value['code'])];
                }
            }
            
            //---------------------------------------------------------------\\
            foreach ($all_languages as $key => $value) {
                if($value['language_name'] == 'English'){
                    $desc_lang[$key]['title'] = 'english';
                    $desc_lang[$key]['trans'] = $tlang['description_eng'];
                }elseif ($value['language_name'] == 'Dutch') {
                    $desc_lang[$key]['title'] = 'dutch';
                    $desc_lang[$key]['trans'] = $tlang['description_du'];
                }elseif ($value['language_name'] == 'German') {
                    $desc_lang[$key]['title'] = 'german';
                    $desc_lang[$key]['trans'] = $tlang['description_ger'];
                }elseif ($value['language_name'] == 'Hebrew') {
                    $desc_lang[$key]['title'] = 'hebrew';
                    $desc_lang[$key]['trans'] = $tlang['description_heb'];
                }else{
                    $desc_lang[$key]['title'] = strtolower($value['language_name']);
                    $desc_lang[$key]['trans'] = $tlang['description_'.strtolower($value['code'])];
                }
            }

            foreach ($all_languages as $key => $value) {
                if($value['language_name'] == 'English'){
                    $term[$key]['title'] = 'english';
                    $term[$key]['trans'] = $tlang['term_en'];
                }elseif ($value['language_name'] == 'Dutch') {
                    $term[$key]['title'] = 'dutch';
                    $term[$key]['trans'] = $tlang['term_du'];
                }elseif ($value['language_name'] == 'German') {
                    $term[$key]['title'] = 'german';
                    $term[$key]['trans'] = $tlang['term_ger'];
                }elseif ($value['language_name'] == 'Hebrew') {
                    $term[$key]['title'] = 'hebrew';
                    $term[$key]['trans'] = $tlang['term_heb'];
                }else{
                    $term[$key]['title'] = strtolower($value['language_name']);
                    $term[$key]['trans'] = $tlang['term_'.strtolower($value['code'])];
                }
            }
            foreach ($all_languages as $key => $value) {
               
                    $sp[$key]['title'] = strtolower($value['language_name']);
                    $sp[$key]['trans'] = $tlang['sp_'.strtolower($value['code'])];
            }
        }else{
            if(insert_trans_lang($item['title'],$item['description']) === true){
                // if(add_translation_data_on_file()){
                    $tlang = get_single_data_from_file(array('title' => $item['title']));
                    if(!empty($tlang)){
                        foreach ($all_languages as $key => $value) {
                            if($value['language_name'] == 'English'){
                                $title_lang[$key]['title'] = 'english';
                                $title_lang[$key]['trans'] = $tlang['title_eng'];

                                $desc_lang[$key]['title'] = 'english';
                                $desc_lang[$key]['trans'] = $tlang['description_eng'];

                                $term[$key]['title'] = 'english';
                                $term[$key]['trans'] = $tlang['term_en'];

                                $sp[$key]['title'] = 'english';
                                $sp[$key]['trans'] = $tlang['sp_en'];
                            }elseif ($value['language_name'] == 'Dutch') {
                                $title_lang[$key]['title'] = 'dutch';
                                $title_lang[$key]['trans'] = $tlang['title_du'];
                                
                                $desc_lang[$key]['title'] = 'dutch';
                                $desc_lang[$key]['trans'] = $tlang['description_du'];

                                $term[$key]['title'] = 'dutch';
                                $term[$key]['trans'] = $tlang['term_du'];

                                $sp[$key]['title'] = 'dutch';
                                $sp[$key]['trans'] = $tlang['sp_du'];
                            }elseif ($value['language_name'] == 'German') {
                                $title_lang[$key]['title'] = 'german';
                                $title_lang[$key]['trans'] = $tlang['title_ger'];

                                $desc_lang[$key]['title'] = 'german';
                                $desc_lang[$key]['trans'] = $tlang['description_ger'];

                                $term[$key]['title'] = 'german';
                                $term[$key]['trans'] = $tlang['term_ger'];

                                $sp[$key]['title'] = 'german';
                                $sp[$key]['trans'] = $tlang['sp_ge'];
                            }elseif ($value['language_name'] == 'Hebrew') {
                                $title_lang[$key]['title'] = 'hebrew';
                                $title_lang[$key]['trans'] = $tlang['title_heb'];

                                $desc_lang[$key]['title'] = 'hebrew';
                                $desc_lang[$key]['trans'] = $tlang['description_heb'];

                                $term[$key]['title'] = 'hebrew';
                                $term[$key]['trans'] = $tlang['term_heb'];

                                $sp[$key]['title'] = 'hebrew';
                                $sp[$key]['trans'] = $tlang['sp_he'];
                            }else{
                                $title_lang[$key]['title'] = strtolower($value['language_name']);
                                $title_lang[$key]['trans'] = $tlang['title_'.strtolower($value['code'])];

                                $desc_lang[$key]['title'] = strtolower($value['language_name']);
                                $desc_lang[$key]['trans'] = $tlang['description_'.strtolower($value['code'])];

                                $term[$key]['title'] = strtolower($value['language_name']);
                                $term[$key]['trans'] = $tlang['term_'.strtolower($value['code'])];

                                $sp[$key]['title'] = strtolower($value['language_name']);
                                $sp[$key]['trans'] = $tlang['sp_'.strtolower($value['code'])];
                            }
                        }
                    }
                // }
            }
        }
        $incoming['title'] = $title_lang;
        $incoming['description'] = $desc_lang;
        $incoming['term'] = $term;
        $incoming['sp'] = $sp;
        $incoming['tlang_id'] = $tlang['id'];
       
        $responsedata['status'] = true;
        $responsedata['data'] = $incoming;
        echo json_encode($responsedata);
        return;
    } 

    public function get_about_us_translations()
    { 
        //print_r($this->input->post('offer_id'));exit;
        $all_languages = get_all_language_from_db();
        $incoming = array();
        $id = $_POST['id'];
        $check_condition = array('conditions' => ['id' => $id]);
        $aboutus = $this->QueryModel->selectSingleRow('about_us', $check_condition);
        // print_r($offers);exit;
        // $tlang = get_single_data_from_file(array('title' => $aboutus['heading']));
        $conditions = array();
        $conditions['conditions'] = array('heading' => $aboutus['heading']);
        $tlang = $this->QueryModel->selectSingleRow("about_us_translation", $conditions);
        $heading = array();
        // $desc_lang = array();
        $title_lang = array();
        // $desc_lang = array();

        if(isset($tlang) && !empty($tlang)){

            foreach ($all_languages as $key => $value) {
              
                    $title_lang[$key]['title'] = strtolower($value['language_name']);
                    // $title_lang[$key]['trans'] = $tlang[strtolower($value['code'])];
                
            }

            foreach ($all_languages as $key => $value) {
                    $heading[$key]['title'] = strtolower($value['language_name']);
                    $heading[$key]['trans'] = $tlang['heading_'.strtolower($value['code'])];
            }
            
            //---------------------------------------------------------------\\
            foreach ($all_languages as $key => $value) {
                    $mission[$key]['title'] = strtolower($value['language_name']);
                    $mission[$key]['trans'] = $tlang['our_mission_'.strtolower($value['code'])];
            }

            foreach ($all_languages as $key => $value) {
                    $vision[$key]['title'] = strtolower($value['language_name']);
                    $vision[$key]['trans'] = $tlang['our_vision_'.strtolower($value['code'])];
            }
            foreach ($all_languages as $key => $value) {
               
                    $history[$key]['title'] = strtolower($value['language_name']);
                    $history[$key]['trans'] = $tlang['our_history_'.strtolower($value['code'])];
            }
        }
        $incoming['title'] = $title_lang;
        $incoming['heading'] = $heading;
        $incoming['history'] = $history;
        $incoming['mission'] = $mission;
        $incoming['vision'] = $vision;
        $incoming['tlang_id'] = $tlang['id'];
       
        $responsedata['status'] = true;
        $responsedata['data'] = $incoming;
        echo json_encode($responsedata);
        return;
    }
    public function get_testimonial_translations()
    { 
       $all_languages = get_all_language_from_db();
        $incoming = array();
        $id = $_POST['id'];
        $check_condition = array('conditions' => ['id' => $id]);
        $testimonial = $this->QueryModel->selectSingleRow('testimonial', $check_condition);
        $conditions = array();
        $conditions['conditions'] = array('content' => $testimonial['content']);
        $tlang = $this->QueryModel->selectSingleRow("testimonial_translation", $conditions);
        $heading = array();
        // $desc_lang = array();
        $title_lang = array();
        if(isset($tlang) && !empty($tlang)){

            foreach ($all_languages as $key => $value) {
              
                    $title_lang[$key]['title'] = strtolower($value['language_name']);
                    // $title_lang[$key]['trans'] = $tlang[strtolower($value['code'])];
            }  
            foreach ($all_languages as $key => $value) {
               
                    $content[$key]['title'] = strtolower($value['language_name']);
                    $content[$key]['trans'] = $tlang['content_'.strtolower($value['code'])];
            }
        }
        $incoming['title'] = $title_lang;
        $incoming['content'] = $content;
        $incoming['tlang_id'] = $tlang['id'];
        $responsedata['status'] = true;
        $responsedata['data'] = $incoming;
        echo json_encode($responsedata);
        return;
    }
    public function get_faq_translations()
    { 
       $all_languages = get_all_language_from_db();
        $incoming = array();
        $id = $_POST['id'];
        $check_condition = array('conditions' => ['id' => $id]);
        $faq = $this->QueryModel->selectSingleRow('faq', $check_condition);
        $conditions = array();
        $conditions['conditions'] = array('question' => $faq['question']);
        $tlang = $this->QueryModel->selectSingleRow("faq_translation", $conditions);
        $heading = array();
        // $desc_lang = array();
        $title_lang = array();
        if(isset($tlang) && !empty($tlang)){

            // foreach ($all_languages as $key => $value) {
              
            //         $title_lang[$key]['title'] = strtolower($value['language_name']);
            //         // $title_lang[$key]['trans'] = $tlang[strtolower($value['code'])];
            // }  
            foreach ($all_languages as $key => $value) {
               
                    $que[$key]['title'] = strtolower($value['language_name']);
                    $que[$key]['trans'] = $tlang['question_'.strtolower($value['code'])];
            }
            foreach ($all_languages as $key => $value) {
               
                $ans[$key]['title'] = strtolower($value['language_name']);
                $ans[$key]['trans'] = $tlang['answer_'.strtolower($value['code'])];
        }
        }
        // $incoming['title'] = $title_lang;
        $incoming['question'] = $que;
        $incoming['answer'] = $ans;
        $incoming['tlang_id'] = $tlang['id'];
        $responsedata['status'] = true;
        $responsedata['data'] = $incoming;
        echo json_encode($responsedata);
        return;
    }
    public function save_about_us_translations()
    {
        $session_language='english';
        $all_languages = get_all_language_from_db();
        // $_POST = $this->input->post();
        
            $condition = array('id' => $_POST['tlang_id']);
            $records1['heading'] = $_POST[$session_language . '-item-title'];
            $records1['our_mission'] = $_POST[$session_language . '-item-mission'];
            $records1['our_vision'] = $_POST[$session_language . '-item-vision'];
            $records1['our_history'] = $_POST[$session_language . '-item-history'];
            foreach ($all_languages as $key => $value) {
               
                    $records1['heading_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-title'];        
                    $records1['our_mission_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-mission'];
                    $records1['our_vision_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-vision'];   
                    $records1['our_history_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-history'];          
                
            }

            $this->QueryModel->update("about_us_translation", $condition, $records1);
             
            $value_data = array(
                'heading' => $_POST[$session_language . '-item-title'],
                'our_mission' => $_POST[$session_language . '-item-mission'],
                'our_vision' => $_POST[$session_language . '-item-vision'],
                'our_history' => $_POST[$session_language . '-item-history'],
            );
            // print_r($_POST['offer_id']);
            $update_condition_new = array('id' => $_POST['offer_id']);
            $this->QueryModel->update('about_us',$update_condition_new,$value_data);
           
            $responsedata['status'] = true;
            $responsedata['msg'] = 'successs';
            echo json_encode($responsedata);
            return;
       
    } 
    public function sav_testimonial_translations()
    {
        $session_language='english';
        $all_languages = get_all_language_from_db();
        // $_POST = $this->input->post();
        
            $condition = array('id' => $_POST['tlang_id']);
            $records1['content'] = $_POST[$session_language . '-item-content'];
            foreach ($all_languages as $key => $value) {
                    $records1['content_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-content'];            
            }
            $this->QueryModel->update("testimonial_translation", $condition, $records1);
             
            $value_data = array(
                'content' => $_POST[$session_language . '-item-content'],
            );
            // print_r($_POST['offer_id']);
            $update_condition_new = array('id' => $_POST['offer_id']);
            $this->QueryModel->update('testimonial',$update_condition_new,$value_data);
           
            $responsedata['status'] = true;
            $responsedata['msg'] = 'successs';
            echo json_encode($responsedata);
            return;
       
    }
    public function save_faq_translation()
    {
        $session_language='english';
        $all_languages = get_all_language_from_db();
        // $_POST = $this->input->post();
        
            $condition = array('id' => $_POST['tlang_id']);
            $records1['question'] = $_POST[$session_language . '-item-title'];
            $records1['answer'] = $_POST[$session_language . '-item-answer'];
            foreach ($all_languages as $key => $value) {
                    $records1['question_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-title'];  
                    $records1['answer_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-answer'];            
            }
            $this->QueryModel->update("faq_translation", $condition, $records1);
             
            $value_data = array(
                'question' => $_POST[$session_language . '-item-title'],
                'answer' => $_POST[$session_language . '-item-answer'],
            );
            // print_r($_POST['offer_id']);
            $update_condition_new = array('id' => $_POST['offer_id']);
            $this->QueryModel->update('faq',$update_condition_new,$value_data);
           
            $responsedata['status'] = true;
            $responsedata['msg'] = 'successs';
            echo json_encode($responsedata);
            return;
       
    }
  
    public function get_cate_translations()
    { 
        //print_r($this->input->post('offer_id'));exit;
        $all_languages = get_all_language_from_db();
        $incoming = array();
        $id = $_POST['cat_id'];
        $check_condition = array('conditions' => ['id' => $id]);
        $categories = $this->QueryModel->selectSingleRow('category', $check_condition);
        // print_r($offers);exit;
        $tlang = get_single_categories_from_file(array('category_name' => $categories['category_name']));

        $title_lang = array();
        $desc_lang = array();

        if(isset($tlang) && !empty($tlang)){
            foreach ($all_languages as $key => $value) {
                if($value['language_name'] == 'English'){
                    $title_lang[$key]['title'] = 'english';
                    $title_lang[$key]['trans'] = $tlang['category_eng'];
                }elseif ($value['language_name'] == 'Dutch') {
                    $title_lang[$key]['title'] = 'dutch';
                    $title_lang[$key]['trans'] = $tlang['category_du'];
                }elseif ($value['language_name'] == 'German') {
                    $title_lang[$key]['title'] = 'german';
                    $title_lang[$key]['trans'] = $tlang['category_ger'];
                }elseif ($value['language_name'] == 'Hebrew') {
                    $title_lang[$key]['title'] = 'hebrew';
                    $title_lang[$key]['trans'] = $tlang['category_heb'];
                }else{
                    $title_lang[$key]['title'] = strtolower($value['language_name']);
                    $title_lang[$key]['trans'] = $tlang['category_'.strtolower($value['code'])];
                }
            }
            
            //---------------------------------------------------------------\\
            
        }else{
            // if(insert_trans_lang($item['title'],$item['description']) === true){
            //     // if(add_translation_data_on_file()){
            //         $tlang = get_single_data_from_file(array('title' => $item['title']));
            //         if(!empty($tlang)){
            //             foreach ($all_languages as $key => $value) {
            //                 if($value['language_name'] == 'English'){
            //                     $title_lang[$key]['title'] = 'english';
            //                     $title_lang[$key]['trans'] = $tlang['title_eng'];

            //                     $desc_lang[$key]['title'] = 'english';
            //                     $desc_lang[$key]['trans'] = $tlang['description_eng'];
            //                 }elseif ($value['language_name'] == 'Dutch') {
            //                     $title_lang[$key]['title'] = 'dutch';
            //                     $title_lang[$key]['trans'] = $tlang['title_du'];
                                
            //                     $desc_lang[$key]['title'] = 'dutch';
            //                     $desc_lang[$key]['trans'] = $tlang['description_du'];
            //                 }elseif ($value['language_name'] == 'German') {
            //                     $title_lang[$key]['title'] = 'german';
            //                     $title_lang[$key]['trans'] = $tlang['title_ger'];

            //                     $desc_lang[$key]['title'] = 'german';
            //                     $desc_lang[$key]['trans'] = $tlang['description_ger'];
            //                 }elseif ($value['language_name'] == 'Hebrew') {
            //                     $title_lang[$key]['title'] = 'hebrew';
            //                     $title_lang[$key]['trans'] = $tlang['title_heb'];

            //                     $desc_lang[$key]['title'] = 'hebrew';
            //                     $desc_lang[$key]['trans'] = $tlang['description_heb'];
            //                 }else{
            //                     $title_lang[$key]['title'] = strtolower($value['language_name']);
            //                     $title_lang[$key]['trans'] = $tlang['title_'.strtolower($value['code'])];

            //                     $desc_lang[$key]['title'] = strtolower($value['language_name']);
            //                     $desc_lang[$key]['trans'] = $tlang['description_'.strtolower($value['code'])];
            //                 }
            //             }
            //         }
            //     // }
            // }
        }
        $incoming['title'] = $title_lang;
        // $incoming['description'] = $desc_lang;
        $incoming['tlang_id'] = $tlang['id'];
       
        $responsedata['status'] = true;
        $responsedata['data'] = $incoming;
        echo json_encode($responsedata);
        return;
    }
    public function cate_save_translations()
    {
        $session_language='english';
        $all_languages = get_all_language_from_db();
        $condition3 = array('id' => $_POST['tlang_id']);
        $records2['category_name'] = $_POST[$session_language . '-item-title'];
        foreach ($all_languages as $key => $value) {
            if($value['language_name'] == 'English'){
                $records2['category_eng'] = $_POST['english-item-title'];     
            }elseif ($value['language_name'] == 'Dutch') {
                $records2['category_du'] = $_POST['dutch-item-title'];              
            }elseif ($value['language_name'] == 'German') {
                $records2['category_ger'] = $_POST['german-item-title'];        
            }elseif ($value['language_name'] == 'Hebrew') {
                $records2['category_heb'] = $_POST['hebrew-item-title'];  
            }else{
                $records2['category_'.strtolower($value['code'])] = $_POST[strtolower($value['language_name']).'-item-title'];        
            }
        }
        $this->QueryModel->update("category_translation", $condition3, $records2);
        
        $value_data = array(
            'category_name' => $_POST[$session_language . '-item-title'],
        );
        $update_condition_new = array('id' => $_POST['cat_id']);
        $this->QueryModel->update('category',$update_condition_new,$value_data);
        
        $responsedata['status'] = true;
        $responsedata['msg'] = 'successs';
        echo json_encode($responsedata);
        return;   
    }
    public function add_new_user()
    {
        $data['content'] = 'add_user';
        $this->load->view("template/template",$data);
    }

    public function save_new_user()
    {
        $value = array(
                    'name' => $_POST['name'],
                    'email'       => $_POST['email'],
                    'type'   => 'user',
                    'username'     => $_POST['username'],
                    'password'      => $_POST['password'],
                    'country'    => $_POST['country'],
                    'state'     => $_POST['state'],
                    'phone'      => $_POST['phone'],
                );
        $response = $this->QueryModel->insert('users',$value);
        $url = base_url('admin/viewUser');
        $response = array(
            'url' => $url,
            'value' => $value,
            'status'  => true,
            'message' => 'User added successfully.',
        );
        echo json_encode($response);
    }

    public function viewUser()
    {
        $data['users'] = $this->QueryModel->selectData('users');
        $data['content'] = 'user_table';
        $this->load->view("template/template",$data);
    }
    public function provider()
    {
        $count_condition = array('conditions' => ['type' => 'provider']);
        $totalItems = $this->QueryModel->record_count('users',$count_condition);
        $itemsPerPage = 100;
        $pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $totalPages = ceil($totalItems / $itemsPerPage);
        $offset = ($pageNumber - 1) * $itemsPerPage;
        $condition = array('conditions' => ['type' => 'provider','subtype !=' => 'employee'],'limit' => $itemsPerPage,'offset' => $offset);
        $providerList = $this->QueryModel->selectData('users',$condition);
        foreach($providerList as &$list){
            $condition_unrdm = array('conditions' => ['status' => 'unreedem','provider_id'=>$list['id']]);
            $unrdmPrice = $this->QueryModel->selectData('vouchers',$condition_unrdm);
            $unrdm = 0;
            if(!empty($unrdmPrice)){
                foreach($unrdmPrice as $unrdmPrice_val){
                    if(!empty($unrdmPrice_val['price'])){
                        $new_unrdm = get_price_without_symbol($unrdmPrice_val['price'],$unrdmPrice_val['currency_type']);
                    }else{
                        $new_unrdm = 0;
                    }
                    $unrdm= $unrdm + $new_unrdm;
                }
            }
            $list['unredm_vouchers'] = $unrdm;
            $condition_rdm = array('conditions' => ['status' => 'reedem','provider_id'=>$list['id']]);
            $remPrice = $this->QueryModel->selectData('vouchers',$condition_rdm);
            $rdm = 0;
            if(!empty($remPrice)){
                foreach($remPrice as $remPrice_val){
                    if(!empty($remPrice_val['price'])){
                        $new_rdm = get_price_without_symbol($remPrice_val['price'],$remPrice_val['currency_type']);
                    }else{
                        $new_rdm = 0;
                    }
                    $rdm= $rdm + $new_rdm;
                }
            }
            $list['redm_vouchers'] = $rdm;
            $comm_condition = array(
                'conditions' => ['user_id' => $list['id']]
            );
        $unpaid_condition = array('conditions' => ['user_id' => $list['id'],'payment_nature'=>'credited']);
        $unpaid_trasnation = $this->QueryModel->selectData('transation',$unpaid_condition);
        $unpaid_total = 0;
        $comission = 0;
        $aff_comission = 0;
        if(!empty($unpaid_trasnation)){
            foreach($unpaid_trasnation as $unpaid_trasnation_val){
                if(!empty($unpaid_trasnation_val['amount'])){
                    $new_unpaid_amount = get_price_without_symbol($unpaid_trasnation_val['amount'],$unpaid_trasnation_val['currency_type']);
                }else{
                    $new_unpaid_amount = 0;
                }
                if(!empty($unpaid_trasnation_val['comission'])){
                    $new_comission = get_price_without_symbol($unpaid_trasnation_val['comission'],$unpaid_trasnation_val['currency_type']);
                }else{
                    $new_comission = 0;
                }
                if(!empty($unpaid_trasnation_val['affialiator_commission'])){
                    $new_aff_comission = get_price_without_symbol($unpaid_trasnation_val['affialiator_commission'],$unpaid_trasnation_val['currency_type']);
                }else{
                    $new_aff_comission = 0;
                }
                $unpaid_total = $unpaid_total + $new_unpaid_amount;
                $comission = $comission + $new_comission;
                $aff_comission = $aff_comission + $new_aff_comission;
            }
        }

        $paid_condition = array('conditions' => ['user_id' => $list['id'],'payment_nature'=>'debited']);
        $paid_trasnation = $this->QueryModel->selectData('transation',$paid_condition);
        $paid_total = 0;
        if(!empty($paid_trasnation)){
            foreach($paid_trasnation as $paid_trasnation_val){
                if(!empty($paid_trasnation_val['amount'])){
                    $new_paid_amount = get_price_without_symbol($paid_trasnation_val['amount'],$paid_trasnation_val['currency_type']);
                }else{
                    $new_paid_amount = 0;
                }
                $paid_total = $paid_total + $new_paid_amount;
            }
        }
        $list['commission'] = $comission;//$transaction_detail->comission;
        $list['aff_comission'] = $aff_comission;
	    $list['paid'] = $paid_total;// $transaction_detail->paid;
	    $list['unpaid'] = $unpaid_total;// $transaction_detail->unpaid-$transaction_detail->paid;
            // $list['unredm_vouchers'] = $this->QueryModel->selectSumColumnValue('vouchers',$condition_rdm,'price');
        }
       
	    $data['provider'] = $providerList;
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        // $content = $this->load->view('admin/provider',$data,true);
        $data['content'] = 'admin/provider';
        $this->load->view("admin/template/template",$data);
    }

    // public function provider(){
    //     $condition = array('conditions' => ['type' => 'provider']);
    //     $data['provider'] = $this->QueryModel->selectData('users',$condition);
    //     $html = $this->load->view("admin/provider",$data,true);
    //     $response = array(
    //         'status'  => true,
    //         'html' => $html,
    //     );
    //     echo json_encode($response);
    // }
    
public function provider_ajaxRequest()
{
	$data['currency'] = $this->QueryModel->selectData('currencies');
    $data['country'] = $this->QueryModel->selectData('countries');
    $data['state'] = $this->QueryModel->selectData('states');
    $modal = $this->load->view("admin/add_provider",$data,true);
    $response = array(
        'status'  => true,
        'html' => $modal,
    );
    echo json_encode($response);
}

public function save_provider()
{
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
	$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|is_unique[users.phone]');
	// Run validation
	if ($this->form_validation->run() == FALSE) {
		// Validation failed, return validation errors
		$response['status'] = false;
		$response['Message'] = validation_errors();
		echo json_encode($response);
		return;
	}

    $value = array(
        'name' => $_POST['name'],
        'email'       => $_POST['email'],
        'type'   => 'provider',
        'status'     => $_POST['status'],
        'country'    => $_POST['country'],
        'state'     => $_POST['state'],
        'phone'      => $_POST['phone'],
        'address'      => $_POST['address'],
        'type'        => 'provider',
        'default_currency' =>$_POST['default_currency'],
        'bank_name' => $_POST['bank_name'],
        'account_name' => $_POST['acc_number'],
        'account_number' => $_POST['account_name'],
        'ifsc_code' => $_POST['ifsc_code'],
    );
    $respo = $this->QueryModel->insert('users',$value);
    if($respo)
    {
        $condition = array('conditions' => ['id' => $respo]);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');  
        $data['provider'] = $this->QueryModel->selectData('users',$condition);
        $html = $this->load->view("admin/appendPro",$data,true);
        $response = array(
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
    }
    else{
        $response = array(
            'status'  => false,
            'html' => "SOmething went wrong",
        );
        echo json_encode($response);
    }
}

public function edit_provider_ajaxRequest()
{
    $id = $_POST['id'];
    $condition = array('conditions' => ['id' => $id]);
    $data['country'] = $this->QueryModel->selectData('countries');
    $data['state'] = $this->QueryModel->selectData('states');
    $data['provider'] = $this->QueryModel->selectSingleRow('users',$condition);
    $data['currency'] = $this->QueryModel->selectData('currencies');
    $modal = $this->load->view("admin/edit_provider",$data,true);
    $response = array(
        'status'  => true,
        'html' => $modal,
    );
    echo json_encode($response);
}

public function edit_provider()
{
	$id = $_POST['id'];
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_unique_email');
	$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|callback_unique_phone');
	// Run validation
	if ($this->form_validation->run() == FALSE) {
		// Validation failed, return validation errors
		$response['status'] = false;
		$response['Message'] = validation_errors();
		echo json_encode($response);
		return;
	}
    $value = array(
        'name' => $_POST['name'],
        'email'       => $_POST['email'],
        'type'   => 'provider',
        'status'     => $_POST['status'],
        'country'    => $_POST['country'],
        'state'     => $_POST['state'],
        'phone'      => $_POST['phone'],
        'default_currency'=> $_POST['default_currency'],
        'address'   => $_POST['address'],
        'type'        => 'provider',
        'bank_name' => $_POST['bank_name'],
        'account_name' => $_POST['acc_number'],
        'account_number' => $_POST['account_name'],
        'ifsc_code' => $_POST['ifsc_code'],
    );
    $update_condition = array('id' => $id);
    $respo = $this->QueryModel->update('users',$update_condition,$value);
    $condition = array('conditions' => ['id' => $id]);
    $data['provider'] = $this->QueryModel->selectData('users',$condition);
    $data['country'] = $this->QueryModel->selectData('countries');
    $data['state'] = $this->QueryModel->selectData('states');  
    $html = $this->load->view("admin/appendPro",$data,true);
    $response = array(
        'id' => $id,
        'status'  => true,
        'html' => $html,
    );
    echo json_encode($response);
}

// public function affiliator(){
//     $condition = array('conditions' => ['type' => 'affiliator']);
//     $data['affiliator'] = $this->QueryModel->selectData('users',$condition);
//     $html = $this->load->view("admin/affiliator",$data,true);
//     $response = array(
//         'status'  => true,
//         'html' => $html,
//     );
//     echo json_encode($response);
// }

public function affiliator()
{
    $count_condition = array('conditions' => ['type' => 'affiliator']);
    $totalItems = $this->QueryModel->record_count('users',$count_condition);
    $itemsPerPage = 30;
    $pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $offset = ($pageNumber - 1) * $itemsPerPage;
    $condition = array('conditions' => ['type' => 'affiliator'],'limit' => $itemsPerPage,'offset' => $offset);
    $data['country'] = $this->QueryModel->selectData('countries');
    $data['state'] = $this->QueryModel->selectData('states');
    // $data['affiliator'] = $this->QueryModel->selectData('users',$condition);
	$affiliator = $this->QueryModel->selectData('users', $condition);
    // print_r($affiliator);exit;
	foreach ($affiliator as &$list) {
		// $affiliatorUserCondition = array(
		// 	'fields' => 'id',
		// 	'conditions' => ['affilator_id' => $list['id']],
		// );
		// $affiliatorUserId = $this->QueryModel->selectData('users', $affiliatorUserCondition);
		
		// $affiliatorUserId = array_column($affiliatorUserId,'id');
		// $affiliatorTotalCommission = $this->AffiliatorModel->get_total_credited($list['id']);
		// $total_credit_condition = array(
		// 	'user_id' => $list['id'],
        //     'payment_nature'=> 'credited',
        //     'transaction_nature'=>'commision',
		// );
        $total_credit_condition = array('conditions' => ['user_id' => $list['id'],'payment_nature'=>'credited','transaction_nature'=>'commision']);
        $credit_amount = $this->QueryModel->selectData('transation',$total_credit_condition);
        // print_r($credit_amount);exit;
        $crdt_amt = 0;
        if(!empty($credit_amount)){
            foreach($credit_amount as $credit_amount_val){
                if(!empty($credit_amount_val['amount'])){
                    $new_amt = get_price_without_symbol($credit_amount_val['amount'],$credit_amount_val['currency_type']);
                }else{
                    $new_amt = 0;
                }
                $crdt_amt = $crdt_amt + $new_amt;
            }
        }

		$list['affiliatorTotalCommission'] = $crdt_amt;
        // $affiliatorTransaction = $this->AffiliatorModel->get_total_debited($list['id']);
        // $total_dedit_condition = array(
		// 	'user_id' => $list['id'],
        //     'payment_nature'=> 'debited',
        //     // 'transaction_nature'=>'commision',
		// );
        $total_dedit_condition = array('conditions' => ['user_id' => $list['id'],'payment_nature'=>'debited']);
       
        $debit_amount = $this->QueryModel->selectData('transation',$total_dedit_condition);
        $dbt_amt = 0;
        if(!empty($debit_amount)){
            foreach($debit_amount as $debit_amount_val){
                if(!empty($debit_amount_val['amount'])){
                    $new_dbt = get_price_without_symbol($debit_amount_val['amount'],$debit_amount_val['currency_type']);
                }else{
                    $new_dbt = 0;
                }
                $dbt_amt = $dbt_amt + $new_dbt;
            }
        }
		$list['Paid'] = $dbt_amt;
        if($dbt_amt>=$crdt_amt){
            $unpaid = 0;
        }else{
            $unpaid = $crdt_amt-$dbt_amt;
        }
		$list['Unpaid'] = $unpaid;
	}
	
	$data['affiliator'] = $affiliator;
	// echo "<pre>"; print_r($data['affiliator']); die;	
    $data['content'] = 'admin/affiliator';
        $this->load->view("admin/template/template",$data);
    $content = $this->load->view('admin/affiliator',$data,true);
    $paginationLinks = '<ul class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i === $pageNumber) ? 'active' : '';
        $paginationLinks .= "<li class='$activeClass'><a href='#' class='pagination-link' data-page='$i'>$i</a></li>";
    }
    $paginationLinks .= '</ul>';
    $response = [
        'status' => true,
        'totalPages' => $totalItems,
        'content' => $content,
        'pagination' => $paginationLinks,
    ];
    // header('Content-Type: application/json');
    // echo json_encode($response);
}

    public function affiliator_ajaxRequest()
    {
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $modal = $this->load->view("admin/add_affiliator",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
    }
    public function activeDeactiveProvider()
    {
        $id = $_POST['id'];
        if($_POST['sta'] == 1)
        {
            $status = 0;
        }else{
            $status = 1;
        }
        $value = array(
            'status' => $status,
        );
        $update_condition = array('id' => $id);
        $respo = $this->QueryModel->update('users',$update_condition,$value);
        if($respo)
        {
            $response = array(
                'sta' => $status,
                'status'  => true,
            );
        }
        echo json_encode($response);
    }
    
    public function users()
    {
        $condition = array('conditions' => ['type' => 'users']);
        $data['users'] = $this->QueryModel->selectData('users',$condition);
        // $html = $this->load->view("admin/users",$data,true);
        $data['content'] = 'admin/users';
        $this->load->view("admin/template/template",$data);       
    }
    public function save_affiliator()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|is_unique[users.phone]');
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return validation errors
            $response['status'] = false;
            $response['Message'] = validation_errors();
            echo json_encode($response);
            return;
        }
               // $phone = $_POST['phone'];
		// $inputMobileNumber = str_replace(' ', '', $this->input->post('phone'));
		// $check_condition = array('conditions' => ['phone' => $inputMobileNumber]);
		// $isExistPhone = $this->QueryModel->selectSingleRow('users', $check_condition);
		
		// if ($isExistPhone) {
		// 	$response = array(
		// 		'status'  => false,
		// 		'type' => $isExistPhone["type"],
		// 		'Message' => 'Mobile number is already Exist As ' . $isExistPhone['type'] . ''
		// 	);
		// 	echo json_encode($response);
		// 	return;
		// }			
        $value = array(
            'name' => $_POST['name'],
            'email'       => $_POST['email'],
            'type'   => 'affiliator',
            'status'     => $_POST['status'],
            'country'    => $_POST['country'],
            'state'     => $_POST['state'],
            'phone'      => $_POST['phone'],
            'type'        => 'affiliator',
        );
        $respo = $this->QueryModel->insert('users',$value);
        $str = $this->db->last_query();
        // print_r($str);exit;
    
        $condition = array('conditions' => ['id' => $respo]);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $data['affiliator'] = $this->QueryModel->selectData('users',$condition);
        $html = $this->load->view("admin/appendAffi",$data,true);
        $response = array(
            'id' => $respo,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
    }

    public function edit_affiliator_ajaxRequest()
    {
        $id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $data['affiliator'] = $this->QueryModel->selectSingleRow('users',$condition);
        $modal = $this->load->view("admin/edit_affiliator",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        echo json_encode($response);
    }

    public function update_affiliator()
    {
        $id = $_POST['id'];
        // $phone = $_POST['phone'];
        // $check_condition = array('conditions' => ['phone' => $phone]);
        // $isExistPhone = $this->QueryModel->selectSingleRow('users', $check_condition);
        // if($isExistPhone && ($isExistPhone['id'] !==  $_POST['id'])){
        //     $response = array(
        //         'status'  => false,
        //         'type' => $isExistPhone["type"],
        //         'Message' => 'Mobile number is already Exist As '.$isExistPhone['type'].''
        //     );
        //     echo json_encode($response);
        //     return;
        // }
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|callback_unique_phone');
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return validation errors
            $response['status'] = false;
            $response['Message'] = validation_errors();
            echo json_encode($response);
            return;
        }
        $value = array(
            'name' => $_POST['name'],
            'email'       => $_POST['email'],
            'type'   => 'affiliator',
            'status'     => $_POST['status'],
            'country'    => $_POST['country'],
            'state'     => $_POST['state'],
            'phone'      => $_POST['phone'],
            'address'      => $_POST['address'],
            'type'        => 'affiliator',
        );
        $update_condition = array('id' => $id);
        $respo = $this->QueryModel->update('users',$update_condition,$value);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $condition = array('conditions' => ['id' => $id]);
        $data['affiliator'] = $this->QueryModel->selectData('users',$condition);
        $html = $this->load->view("admin/appendAffi",$data,true);
        $response = array(
            'id' => $id,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
    }

    // public function offers()
    // {
    //     $data['offers'] = $this->QueryModel->selectData('offer');
    //     $html = $this->load->view("admin/offers",$data,true);
    //     if($html)
    //     {
    //         $response = array(
    //             'status'  => true,
    //             'html' => $html,
    //         );
    //     }
    //     echo json_encode($response);

    // }

    public function offer()
    {
        $totalItems = $this->QueryModel->record_count('offer');
        $itemsPerPage = 100;
        $pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $totalPages = ceil($totalItems / $itemsPerPage);
        $offset = 0;
       /* $condition = array(
                'limit' => $itemsPerPage,
                'offset' => $offset
            );
            */
        // $data['offers'] = $this->QueryModel->selectData('offer',$condition);
        $user_condition = array('conditions' => ['type' => 'provider']);
        $data['providers'] = $this->QueryModel->selectData('users',$user_condition);
        //$providerOffer = $this->QueryModel->selectData('offer',$condition);
        $providerOffer = $this->QueryModel->selectData('offer');
        foreach($providerOffer as &$offer){
            $condition_ofr = array(
                'conditions' => ['offer_id' => $offer['id']]
                );
            $purchaseResult = $this->QueryModel->offerPurchased('offer_purchase',$condition_ofr);
            $cat_condition = array(
                'conditions' => ['id' => $offer['categories']]
            );
            $cat_Result = $this->QueryModel->selectSingleRow('category',$cat_condition);
            $temmpCond = array(
                'conditions' => ['offer_id' => $offer['id']]
            );
            $offer['countOffer'] = $this->QueryModel->record_count('offer_purchase',$temmpCond);
            $totAmCond = array(
                'conditions' => ['offer_id' => $offer['id']], 
            );
            
            $totalamount = $this->QueryModel->selectData('offer_purchase',$totAmCond);
            
            $totlamt = 0;
            if(!empty($totalamount)){
                
                foreach($totalamount as $totalamount_val){
                   
                    if(!empty($totalamount_val['total_amount'])){
                        // print_r($totalamount_val['total_amount']);
                        $new_totalamount = get_price_without_symbol($totalamount_val['total_amount'],$totalamount_val['currency_type']);
                        // print_r($new_totalamount).'<br>';
                        

                    }else{
                        $new_totalamount = 0;
                    }
                    $totlamt= $totlamt + $new_totalamount;
                }
                // print_r($totalamount_val['total_amount']);
            }
            $offer['totalAmount'] = $totlamt;//$this->QueryModel->totalAmount('offer_purchase',$totAmCond,'total_amount');
            $offer['category'] = $cat_Result['category_name'];
            $offer['adlt_purchased_offer'] = $purchaseResult->total_adlt_offer;
            $offer['chld_purchased_offer'] = $purchaseResult->total_chld_offer;
        }
        $data['offers'] = $providerOffer;
        // echo "<pre>";print_r($providerOffer);die;
        // $content = $this->load->view('admin/offers',$data,true);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $data['content'] = 'admin/offers';
        $this->load->view("admin/template/template",$data);

        // $paginationLinks .= '<ul class="pagination">';
        // $prevPage = $pageNumber - 1;
        // $prevDisabledClass = ($pageNumber === 1) ? 'disabled' : '';
        // $paginationLinks .= "<li class='$prevDisabledClass'><a href='#' class='pagination-link' data-page='$prevPage'>Previous</a></li>";
        
        // // Page links
        // for ($i = 1; $i <= $totalPages; $i++) {
        //     $activeClass = ($i === $pageNumber) ? 'active' : '';
        //     $paginationLinks .= "<li class='$activeClass'><a href='#' class='pagination-link' data-page='$i'>$i</a></li>";
        // }

        // // Next link
        // $nextPage = $pageNumber + 1;
        // $nextDisabledClass = ($pageNumber == $totalPages) ? 'disabled' : '';
        // $paginationLinks .= "<li class='$nextDisabledClass'><a href='#' class='pagination-link' data-page='$nextPage'>Next</a></li>";
        
        // $paginationLinks .= '</ul>';
        // $response = [
        //     'status' => true,
        //     'totalPages' => $data,
        //     'content' => $content,
        //     'pagination' => $paginationLinks,
        // ];
        // // header('Content-Type: application/json');
        // echo json_encode($response);
    }

    public function addOffer()
    {
        // $data['pro_id'] = $_POST['id'];
        $condition = array('conditions' => ['type' => 'provider']);
		$data['currency'] = $this->QueryModel->selectData('currencies');
        $data['provider'] = $this->QueryModel->selectData('users',$condition);
        $data ['category'] = $this->QueryModel->selectData('category');
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
		$data['areas'] = $this->QueryModel->selectData('area');
        $modal = $this->load->view("admin/add_offer",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        echo json_encode($response);
    }

    public function edit_offer_ajaxRequest()
    {
        $id = $_POST['id'];
		$data['currency'] = $this->QueryModel->selectData('currencies');
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
		$data['areas'] = $this->QueryModel->selectData('area');
        $condition = array('conditions' => ['type' => 'provider']);
        $data['provider'] = $this->QueryModel->selectData('users',$condition);
        $data ['category'] = $this->QueryModel->selectData('category');
        $offer_condition = array('conditions' => ['id' => $id]);
        $data['offer'] = $this->QueryModel->selectSingleRow('offer',$offer_condition);
        $modal = $this->load->view("admin/edit_offer",$data,true);
        $response = array(
            'status'  => true,
            'id'  => $id,
            'html' => $modal,
        );
        echo json_encode($response);
    }

    public function updateOffer()
    {
        $this->load->library('upload');
        $config['upload_path']   = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';
        $this->upload->initialize($config);
        $file_paths = [];
        if($this->input->post('showing_img')!=''){
            $existImage = json_decode($this->input->post('showing_img'));
            foreach($existImage as $key=>$list){
                $file_paths[] =  array('url' => $list);
            }
        }
        // $showingImages = $_POST['showing_img'];
            foreach ($_FILES['image']['name'] as $key => $name) {
                $_FILES['file']['name'] = $_FILES['image']['name'][$key];
                $_FILES['file']['type'] = $_FILES['image']['type'][$key];
                $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$key];
				$_FILES['file']['error'] = $_FILES['image']['error'][$key];
				$_FILES['file']['size'] = $_FILES['image']['size'][$key];
    
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $file_names[] = $uploadData['file_name'];
                    $file_paths[] = array("url" => 'uploads/' . $uploadData['file_name']);
                }
            }
            //print_r($file_paths);die;
            $encodedImagePaths = json_encode($file_paths);
            $insert_data = array(
                'name'        => $_POST['offer_name'],
                'address'     => $_POST['address'],
                'country'     => $_POST['country'],
                'state'       => $_POST['state'],
                'phone'       => $_POST['phone'],
                'details'     => $_POST['detail'],
                'provider_id' => $_POST['provider'],
                'categories'    => $_POST['category'],
                'image'       => $encodedImagePaths,
				'adult_price'      => !empty($_POST['adult_price']) ? $_POST['adult_price'] : 0,
				'adult_discount'   => !empty($_POST['adult_discount']) ? $_POST['adult_discount'] : 0,
				'adult_commission' => !empty($_POST['adult_commission']) ? $_POST['adult_commission'] : 0,
				'child_price'      => !empty($_POST['child_price']) ? $_POST['child_price'] : 0,
				'child_discount'   => !empty($_POST['child_discount']) ? $_POST['child_discount'] : 0,
				'child_commission' => !empty($_POST['child_commission']) ? $_POST['child_commission'] : 0,				
                'direct_pay' => $_POST['direct_pay'],
                'traveling_time' => $_POST['travelling_time'],
                'payment_time' => $_POST['payment_time'],
                'terms_and_condition' => $_POST['termsConditions'],
				'pickup' => isset($_POST['pickup']) ? $_POST['pickup'] : 'NO',
				'refund' => isset($_POST['refund']) ? $_POST['refund'] : 'NO',
				'special_offer' =>isset($_POST['special_offer']) ? $_POST['special_offer'] : '',
				'area' =>isset($_POST['area']) ? $_POST['area'] : '',
				'currency_type' => $_POST['default_currency'],
				'offer_type' => $_POST['offer_type'],
				'google_map' => $_POST['google_map'],
				'visiting_start' => $_POST['visiting_start'],
				'visiting_end' => $_POST['visiting_end'],
            );
            $id = $_POST['id'];
            $condition = array('id' => $_POST['id']);
            $res = $this->QueryModel->update('offer', $condition ,$insert_data);

            $conditions['conditions'] = array("id" => $_POST['id']);
            $old_name = $this->QueryModel->selectSingleRow("offer", $conditions);
            $translatedata = get_single_data_from_file(array("title" => $old_name['name']));
            if (!empty($translatedata)) {
                $all_languages = get_all_language_from_db();

                $c_lang = "english";

                $lang_key = array_keys(array_combine(array_keys($all_languages), array_column($all_languages, 'language_name')),ucfirst($c_lang));
                $current_lang = (isset($all_languages[$lang_key[0]]))?$all_languages[$lang_key[0]]:array();

                $current_lang_code = (isset($current_lang) && !empty($current_lang)) ?$current_lang['code']:'EN';
                

                $condition = array("title" => $old_name['name']);
                $update['title'] = $_POST['offer_name'];
                $update['description'] = $_POST['detail'];
                $update['terms_and_condition'] = $_POST['termsConditions'];
                foreach ($all_languages as $key => $language){
                    if($language['language_name'] == 'English'){
                        $update['title_eng'] = translate_lang($_POST['offer_name'],$current_lang_code, $language['code']);
                        $update['description_eng'] = translate_lang($_POST['detail'], $current_lang_code, $language['code']);
                        $update['term_en'] = translate_lang($_POST['termsConditions'], $current_lang_code, $language['code']);
                        $update['sp_en'] = translate_lang($_POST['special_offer'], $current_lang_code, $language['code']);
                    }elseif($language['language_name'] == 'Dutch'){
                        $update['title_du'] = translate_lang($_POST['offer_name'], $current_lang_code, $language['code']);
                        $update['description_du'] = translate_lang($_POST['detail'],$current_lang_code, $language['code']);
                        $update['term_du'] = translate_lang($_POST['termsConditions'],$current_lang_code, $language['code']);
                        $update['sp_du'] = translate_lang($_POST['special_offer'], $current_lang_code, $language['code']);
                    }elseif($language['language_name'] == 'German'){
                        $update['title_ger'] = translate_lang($_POST['offer_name'], $current_lang_code, $language['code']);
                        $update['description_ger'] = translate_lang($_POST['detail'], $current_lang_code, $language['code']);
                        $update['term_ger'] = translate_lang($_POST['termsConditions'], $current_lang_code, $language['code']);
                        $update['sp_ger'] = translate_lang($_POST['special_offer'], $current_lang_code, $language['code']);
                    }elseif($language['language_name'] == 'Hebrew'){
                        $update['title_heb'] = translate_lang($_POST['offer_name'], $current_lang_code, $language['code']);
                        $update['description_heb'] = translate_lang($_POST['detail'], $current_lang_code, $language['code']);
                        $update['term_heb'] = translate_lang($_POST['termsConditions'], $current_lang_code, $language['code']);
                        $update['sp_he'] = translate_lang($_POST['special_offer'], $current_lang_code, $language['code']);
                    }else{
                        $update['title_'.strtolower($language['code'])] = translate_lang($_POST['offer_name'], $current_lang_code, $language['code']);
                        $update['description_'.strtolower($language['code'])] = translate_lang($_POST['detail'], $current_lang_code, $language['code']);
                        $update['term_'.strtolower($language['code'])] = translate_lang($_POST['termsConditions'], $current_lang_code, $language['code']);
                        $update['sp_'.strtolower($language['code'])] = translate_lang($_POST['special_offer'], $current_lang_code, $language['code']);
                    }
                }
               
                $update_condition = array('id' => $id);
                if($this->QueryModel->update("translate_lang", $condition, $update)){
                    // add_translation_data_on_file();
                }
            }

            // foreach ($postData as $key => $value) {
            //     if ($key != "submit" &&  $key != "t_name" && $key != "e_name" && $key != 'toppings_id' && $key != 'eitem_id' && $key != 'e_price' && $key != 'option_active' && $key != "img_name" && $key != 'spicy_type') {
            //         if ($key == 'price') {
            //             $records[$key] = convert_to_usd($value)['price'];
            //         } else if ($key == 'item_type') {
            //             $records[$key] = json_encode($value);
            //         } else {
            //             $records[$key] = $value;
            //         }
            //     }
            // }
            if(insert_trans_lang($_POST['offer_name'],$_POST['detail'],$_POST['termsConditions']) === true){
                //add_translation_data_on_file();
            }
            $user_condition = array('conditions' => ['type' => 'provider']);
            $data['providers'] = $this->QueryModel->selectData('users',$user_condition);
            $offer_condition = array('conditions' => ['id' => $id]);
            $providerOffer = $this->QueryModel->selectData('offer',$offer_condition);

            foreach($providerOffer as &$offer){
                $condition_ofr = array(
                    'conditions' => ['offer_id' => $offer['id']]
                    );
                $purchaseResult = $this->QueryModel->offerPurchased('offer_purchase',$condition_ofr);
                $cat_condition = array(
                    'conditions' => ['id' => $offer['categories']]
                );
                $cat_Result = $this->QueryModel->selectData('category',$cat_condition);
                $temmpCond = array(
                    'conditions' => ['offer_id' => $offer['id']]
                );
                $offer['countOffer'] = $this->QueryModel->record_count('offer_purchase',$temmpCond);
                $totAmCond = array(
                    'conditions' => ['offer_id' => $offer['id']],
                );
                $offer['totalAmount'] = $this->QueryModel->totalAmount('offer_purchase',$totAmCond,'total_amount');
                $offer['category'] = $cat_Result[0]['category_name'];
                $offer['adlt_purchased_offer'] = $purchaseResult->total_adlt_offer;
                $offer['chld_purchased_offer'] = $purchaseResult->total_chld_offer;
            }
            $data['offers'] = $providerOffer;
            $data['country'] = $this->QueryModel->selectData('countries');
            $data['state'] = $this->QueryModel->selectData('states');
            $html = $this->load->view("admin/appendOffer",$data,true);
            if($res){
                $respon = array(
                    'data' => $insert_data,
                    'id' => $_POST['id'],
                    'status'   => true,
                    'res'   => $res,
                    'html' => $html
                );
            }else{
                $respon = array(
                    'status'   => false,
                    'message'  => 'Something went wrong',
                    'res'   => $res,
                );
            }
            echo json_encode($respon);
    }

    public function delete_offerAjaxRequest()
    {
        $id = $_POST['id'];
        $condition = array('id' => $id);
        $delete = $this->QueryModel->delete('offer',$condition);
        $respon = array(
            'status'   => true,
            'message'  => 'Deleted Successfully',
        );
        echo json_encode($respon);
    }

    public function deleteImage()
    {
        $imgValue = $_POST['imgValue'];
        $imageArray = json_decode($_POST['imgValue'], true);
        $index = $_POST['index'];
        if (is_numeric($index) && $index >= 0 && $index < count($imageArray)) {
            array_splice($imageArray, $index, 1);
            $check = json_encode($imageArray ,true);
            $response = array(
                'status'   => true,
                'imgValue'  => $check,
                'index'  => $index,
            );
        } else {
            $response = array(
                'status'   => false,
                'error'    => 'Invalid index',
            );
        }
        echo json_encode($response);
    }
    
    public function add_offer_by_provider()
    {
        $data['pro_id'] = $_POST['id'];
		$data['areas'] = $this->QueryModel->selectData('area');
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['currency'] = $this->QueryModel->selectData('currencies');
        $data['state'] = $this->QueryModel->selectData('states');
        $condition = array('conditions' => ['type' => 'provider' , 'id' => $data['pro_id']]);
        $data['provider'] = $this->QueryModel->selectData('users',$condition);
        $data ['category'] = $this->QueryModel->selectData('category');
        $modal = $this->load->view("admin/addOfferByProvider",$data,true);
        $response = array(
            'status'  => true,
            'data'  => $data['provider'][0]['name'],
            'html' => $modal,
        );
        echo json_encode($response);
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }


    public function category()
    {
        $data['category'] = $this->QueryModel->selectData('category');
        $data['content'] = 'admin/category';
        $this->load->view("admin/template/template",$data);
        
    }
     public function edit_category_ajaxRequest()
     {
       $id=  $_POST['id'];
       $condition = array('conditions'=>['id' => $id]);
       $data['category'] = $this->QueryModel->selectSingleRow('category',$condition);
        $html = $this->load->view('admin/edit_category' ,$data,true);
        if($html)
        {
            $response = array(
                'status'  => true,
                'html' => $html,
            );
        }
        echo json_encode($response);

     }
     public function edit_category()
     {
        $category_id = $_POST['id'];
        $condition = array('conditions'=>['id' => $_POST['id']]);
        $category_data = $this->QueryModel->selectSingleRow('category',$condition);
        if($category_data['category_name']==$_POST['name']){
            $id = $_POST['id'];
            $value = array(
                'category_name' => $_POST['name'],
                
            );
            $update_condition = array('id' => $id);
            $respo = $this->QueryModel->update('category',$update_condition,$value);
            $condition = array('conditions' => ['id' => $id]);
            $data['category'] = $this->QueryModel->selectData('category',$condition);
            $html = $this->load->view("admin/tempCat",$data,true);
            if(insert_trans_cate($_POST['name']) === true){
                //add_translation_data_on_file();
            }
            $response = array(
                'data'=> $data,
                'id' => $id,
                'status'  => true,
                'html' => $html,
            );
            echo json_encode($response);
        }else{
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|is_unique[category.category_name]');
            if ($this->form_validation->run() === false) {
                // Validation failed
                $error_message = 'The category name is already exist. Please choose a different category name.';
                $response = array(
                    'status'  => false,
                    'Message' => $error_message,
                );
                echo json_encode($response);
            }else{
                $id = $_POST['id'];
            $value = array(
                'category_name' => $_POST['name'],
                
            );
            $update_condition = array('id' => $id);
            $respo = $this->QueryModel->update('category',$update_condition,$value);
            $condition = array('conditions' => ['id' => $id]);
            $data['category'] = $this->QueryModel->selectData('category',$condition);
            $html = $this->load->view("admin/tempCat",$data,true);
            if(insert_trans_cate($_POST['name']) === true){
                //add_translation_data_on_file();
            }
            $response = array(
                'data'=> $data,
                'id' => $id,
                'status'  => true,
                'html' => $html,
            );
            echo json_encode($response);
            }
        }
     }
     public function delete_category()
     {
        $id = $_POST['id'];
        $condition = array('id' => $id);
        $delete = $this->QueryModel->delete('category',$condition);
        $respon = array(
            'status'   => true,
            'message'  => 'Deleted Successfully',
        );
        echo json_encode($respon);
     }

     public function add_category_ajaxRequest()
     {
        $data = '';
        $modal = $this->load->view("admin/add_category",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
     }
     function notWhitespaceOnly($input) {
        return (strlen($input) > 0 && trim($input) !== '');
    }
    function sanitizeInput($input) {
        $input = trim($input);
        return $input;
    }
     public function add_category()
     {
        if (!$this->notWhitespaceOnly($_POST['name'])) {
            
            $response = array(
                'status'  => false,
                'Message' => 'The category name must not be just whitespace.',
            );
            echo json_encode($response);
            die();
        }
           $this->form_validation->set_rules('name', 'Category Name', 'trim|required|is_unique[category.category_name]');
           //$this->form_validation->set_message('not_just_whitespace', 'The category name must not be just whitespace.');
           if ($this->form_validation->run() === false) {
            // Validation failed
               $error_message = 'The category name is already exist. Please choose a different category name.';
                
                $response = array(
                    'status'  => false,
                    'Message' => $error_message,
                );
                echo json_encode($response);
            }else{
                $value = array(
                    'category_name' => $_POST['name'],
                );
                $respo = $this->QueryModel->insert('category',$value);
                if(insert_trans_cate($_POST['name']) === true){
                    //add_translation_data_on_file();
                }
                // $str = $this->db->last_query();
                // print_r($str);exit;
                $condition = array('conditions' => ['id' => $respo]);
                $data['category'] = $this->QueryModel->selectData('category',$condition);
                $html = $this->load->view("admin/tempCat",$data,true);
                $response = array(
                    'id' => $respo,
                    'status'  => true,
                    'html' => $html,
                );
                echo json_encode($response);
            }
            
        
     }
     public function is_category_name_unique($category_name) {
        $this->load->model('category_model'); // Load your model
        // Check if the category name is unique
        $is_unique = $this->category_model->is_category_name_unique($category_name);
    
        if ($is_unique) {
            return true;
        } else {
            $this->form_validation->set_message('is_category_name_unique', 'The {field} already exists.');
            return false;
        }
    }
    

     public function providerOfferList()
     {
        $id = $_POST['id'];
         $condition = array('conditions' => ['provider_id' => $id]);
        $providerOffer = $this->QueryModel->selectData('offer',$condition);
        foreach($providerOffer as &$offer){
            $condition_ofr = array('conditions' => ['offer_id' => $offer['id'] , 'provider_id' => $offer['provider_id']]);
            $purchaseResult = $this->QueryModel->offerPurchased('offer_purchase',$condition_ofr);
            $cat_condition = array(
                'conditions' => ['id' => $offer['categories']]
            );
            $cat_Result = $this->QueryModel->selectData('category',$cat_condition);
            $temmpCond = array(
                'conditions' => ['offer_id' => $offer['id'], 'provider_id' => $offer['provider_id']]
            );
            $offer['countOffer'] = $this->QueryModel->record_count('offer_purchase',$temmpCond);
            $totAmCond = array(
                'conditions' => ['offer_id' => $offer['id'], 'provider_id' => $offer['provider_id']],
            );
            // $offer['totalAmount'] = $this->QueryModel->totalAmount('offer_purchase',$totAmCond,'total_amount');
            
            $totalamount = $this->QueryModel->selectData('offer_purchase',$totAmCond);
            $totlamt = 0;
            if(!empty($totalamount)){
                foreach($totalamount as $totalamount_val){
                    if(!empty($totalamount_val['total_amount'])){
                        $new_totalamount = get_price_without_symbol($totalamount_val['total_amount'],$totalamount_val['currency_type']);
                    }else{
                        $new_totalamount = 0;
                    }
                    $totlamt= $totlamt + $new_totalamount;
                }
            }
            $offer['totalAmount']= $totlamt;
            // print_r($cat_Result);die;
            if (!empty($cat_Result)) {
                $offer['category'] = $cat_Result[0]['category_name'];
            } else {
                // Handle the case when $cat_Result is empty (e.g., set a default value)
                $offer['category'] = 'Default Category';
            }            
            $offer['adlt_purchased_offer'] = $purchaseResult->total_adlt_offer;
            $offer['chld_purchased_offer'] = $purchaseResult->total_chld_offer;
        }
        $data['offers'] = $providerOffer;
        $data['providers'] = $this->QueryModel->selectData('users');
		$data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $content = $this->load->view('admin/providerOfferList',$data,true);
        $response = [
            'status' => true,
            // 'totalPages' => $totalPages,
            'content' => $content,
        ];
        // header('Content-Type: application/json');
        echo json_encode($response);
     }
    
     public function reedemVoucherList()
     {
        $provider_id = $_POST['id'];
        $condition = array(
            'conditions' => ['provider_id' => $provider_id, 'status' => 'reedem'],
        );
        $data['vouchers'] = $this->QueryModel->selectData('vouchers',$condition);
        $html = $this->load->view('admin/providerVouchersList',$data,true);
        $response = [
            'status' => true,
            'html' => $html,
        ];
        echo json_encode($response);
     }

     public function unReedemVoucherList()
     {
        $provider_id = $_POST['id'];
        $condition = array(
            'conditions' => ['provider_id' => $provider_id, 'status' => 'unreedem'],
        );
        $data['vouchers'] = $this->QueryModel->selectData('vouchers',$condition);
        $html = $this->load->view('admin/providerVouchersList',$data,true);
        $response = [
            'status' => true,
            'html' => $html,
        ];
        echo json_encode($response);
     }


    public function employee(){
        $provider_id = $this->uri->segment(2);
        $condition = array(
            'conditions' => ['provider_id' => $provider_id],
            'fields' => 'employee_id'
        );
        $employee = $this->QueryModel->selectData('provider_employee',$condition);
        $employeeIds = array_column($employee, 'employee_id')?array_column($employee, 'employee_id'):'';
        $condi = array(
            'where_in' => array(
                'id' => $employeeIds
            )
        );
        $data['provider_id'] = $provider_id;
        $data['employee'] = $this->QueryModel->selectData('users',$condi);
        $data['content'] = 'admin/Employee';
        $this->load->view("admin/template/template",$data);
    }

    public function add_employee_ajaxRequest()
    {
        $data['id'] = $_POST['id'];
        $condition = array('conditions' => ['id' => $data['id']]);
        $data['provider'] = $this->QueryModel->selectSingleRow('users',$condition);
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');
        $modal = $this->load->view("admin/add_employee",$data,true);
        $response = array(
            'status'  => true,
            'providerId' => $data['id'],
            'html' => $modal,
        );
        echo json_encode($response);
    }

    public function save_employee()
    {
        $provider_id = $_POST['provider_id'];
        $phone = $_POST['phone'];
        $check_condition = array('conditions' => ['phone' => $phone]);
        $isExistPhone = $this->QueryModel->selectSingleRow('users', $check_condition);
        if($isExistPhone){
            $response = array(
                'status'  => false,
                'type' => $isExistPhone["type"],
                'Message' => 'Mobile number is already Exist As '.$isExistPhone['type'].''
            );
            echo json_encode($response);
            return;
        }
        $value = array(
            'name' => $_POST['name'],
            'email'       => $_POST['email'],
            'status'     => $_POST['status'],
            'country'    => $_POST['country'],
            'state'     => $_POST['state'],
            'phone'      => $_POST['phone'],
            'address'      => $_POST['address'],
            'provider_id' => $_POST['provider_id'],
            'type' =>   'provider',
            'subtype'        => 'employee',
        );
        $respo = $this->QueryModel->insert('users',$value);
        if($respo)
        {
            $pro_val = array(
                'provider_id' => $provider_id,
                'employee_id' => $respo,
                'status' => '1'
            );
            $insrtId = $this->QueryModel->insert('provider_employee',$pro_val);
            $condition = array('conditions' => ['id' => $respo]);
            $data['employee'] = $this->QueryModel->selectData('users',$condition);
            $html = $this->load->view("admin/appendEmp",$data,true);
            $response = array(
				'id' => $insrtId,
                'status'  => true,
                'html' => $html,
            );
            echo json_encode($response);
        }
        else{
            $response = array(
                'status'  => false,
                'html' => "SOmething went wrong",
            );
            echo json_encode($response);
        }
    }

    public function edit_employee_ajaxRequest()
{
    $id = $_POST['id'];
    $provider_id = $_POST['provider_id'];;
    $proCondiiton = array('conditions' => ['id' => $provider_id]);
    $data['provider'] = $this->QueryModel->selectSingleRow('users',$proCondiiton);
    $condition = array('conditions' => ['id' => $id]);
    $data['employee'] = $this->QueryModel->selectSingleRow('users',$condition);
    $data['country'] = $this->QueryModel->selectData('countries');
    $data['state'] = $this->QueryModel->selectData('states');
    $modal = $this->load->view("admin/edit_employee",$data,true);
    $response = array(
        'status'  => true,
        'html' => $modal,
    );
    echo json_encode($response);
}

public function edit_employee()
{
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $check_condition = array('conditions' => ['phone' => $phone]);
    $isExistPhone = $this->QueryModel->selectSingleRow('users', $check_condition);
    if($isExistPhone && ($isExistPhone['id'] !==  $_POST['id'])){
        $response = array(
            'status'  => false,
            'type' => $isExistPhone["type"],
            'Message' => 'Mobile number is already Exist As '.$isExistPhone['type'].''
        );
        echo json_encode($response);
        return;
    }
    $value = array(
        'name' => $_POST['name'],
        'email'       => $_POST['email'],
        'status'     => $_POST['status'],
        'country'    => $_POST['country'],
        'state'     => $_POST['state'],
        'phone'      => $_POST['phone'],
        'address'      => $_POST['address'],
        'provider_id' => $_POST['provider_id'],
        'type' =>   'provider',
        'subtype'        => 'employee',
    );
    $update_condition = array('id' => $id);
    $respo = $this->QueryModel->update('users',$update_condition,$value);
    $condition = array('conditions' => ['id' => $id]);
    $data['employee'] = $this->QueryModel->selectData('users',$condition);
    $html = $this->load->view("admin/appendEmp",$data,true);
    $response = array(
        'id' => $id,
        'status'  => true,
        'html' => $html,
    );
    echo json_encode($response);
}

public function deleteEmployee()
{
    $id = $_POST['id'];
    $condition = array('id' => $id);
    $respo = $this->QueryModel->delete('users',$condition);
    if($respo)
    {
        $response = array(
            'status'  => true,
        );
        echo json_encode($response);
    }
}

public function activeDeactiveEmployee()
{
    $id = $_POST['id'];
    if($_POST['sta'] == 1)
    {
        $status = 0;
    }else{
        $status = 1;
    }
    $value = array(
        'status' => $status,
    );
    $update_condition = array('id' => $id);
    $respo = $this->QueryModel->update('users',$update_condition,$value);
    if($respo)
    {
        $response = array(
            'sta' => $status,
            'status'  => true,
        );
    }
    echo json_encode($response);
}

public function paidList()
{
 $this->load->model('ProviderModel');
    $data['paidList'] = $this->ProviderModel->getvouchertransation();
    $html = $this->load->view('admin/paidTable',$data,true);
    $response = [
        'status' => true,
        'html' => $html,
    ];
    echo json_encode($response);
}

public function unPaidList()
{
    $provider_id = $_POST['id'];
    $condition = array(
        'conditions' => ['user_id' => $provider_id, 'payment_nature' => 'credited','transaction_nature'=>'redeem'],
    );
    $data['paidList'] = $this->QueryModel->selectData('transation',$condition);
    $html = $this->load->view('admin/unPaidTable',$data,true);
    $response = [
        'status' => true,
        'html' => $html,
    ];
    echo json_encode($response);
}

public function setting()
{
    $data['languages'] = $this->QueryModel->selectData('languages');
    $data['currency'] = $this->QueryModel->selectData('currencies');
	$data['setting'] = $this->QueryModel->selectSingleRow('setting');
    $data['content'] = 'admin/setting';
    $this->load->view("admin/template/template",$data);
}

public function viewOfferDetali_ajaxRequest()
{
    $id = $_POST['id'];

    // $data['offer'] = $this->QueryModel->selectData('offer',$condition);
    $user_condition = array('conditions' => ['type' => 'provider']);
    $data['providers'] = $this->QueryModel->selectData('users',$user_condition);
    $condition = array('conditions' => ['id' => $id]);
    $providerOffer = $this->QueryModel->selectData('offer',$condition);
    foreach($providerOffer as &$offer){
        $condition_ofr = array(
            'conditions' => ['offer_id' => $offer['id']]
            );
        $purchaseResult = $this->QueryModel->offerPurchased('offer_purchase',$condition_ofr);
        $cat_condition = array(
            'conditions' => ['id' => $offer['categories']]
        );
        $cat_Result = $this->QueryModel->selectData('category',$cat_condition);
        $temmpCond = array(
            'conditions' => ['offer_id' => $offer['id']]
        );
        $offer['countOffer'] = $this->QueryModel->record_count('offer_purchase',$temmpCond);
        $totAmCond = array(
            'conditions' => ['offer_id' => $offer['id']],
        );
        $offer['totalAmount'] = $this->QueryModel->totalAmount('offer_purchase',$totAmCond,'total_amount');
        $offer['category'] = $cat_Result[0]['category_name'];
        $offer['adlt_purchased_offer'] = $purchaseResult->total_adlt_offer;
        $offer['chld_purchased_offer'] = $purchaseResult->total_chld_offer;
    }
    $data['offers'] = $providerOffer;
    $html = $this->load->view("admin/viewSingleOfferDetail",$data,true);
    $response = [
        'status' => true,
        'html' => $html,
    ];
    echo json_encode($response);
}

    public function viewOfferQr()
    {
        $offer_id = $_POST['id'];
        $condition = array('where_in' => ['offer_id' => $offer_id]);
        $data['offerVoucher'] = $this->QueryModel->selectData('vouchers',$condition);
        $html = $this->load->view("admin/offerVoucherQr",$data,true);
        $response = [
            'status' => true,
            'html' => $html,
        ];
        echo json_encode($response);
    }

    public function viewProviderOfferQr()
    {
        $pro_id = $_POST['id'];
        $condition = array('where_in' => ['provider_id' => $pro_id]);
        $comm_condition = array(
            'conditions' => ['user_id' => $pro_id]
        );
        $comissionAmount = $this->QueryModel->totalAmount('transation',$comm_condition,'comission');
        $data['commission'] = round($comissionAmount, 2);
        $data['offerVoucher'] = $this->QueryModel->selectData('vouchers',$condition);
        $html = $this->load->view("admin/providerOfferVoucher",$data,true);
        $response = [
            'status' => true,
            'html' => $html,
        ];
        echo json_encode($response);
    }

    public function viewproviderSingleOfferQr()
    {
        $offer_id = $_POST['offer_id'];
        $pro_id = $_POST['pro_id'];
        $condition = array('where_in' => ['provider_id' => $pro_id,'offer_id' => $offer_id],'order_by' => ['field' => 'id','order'=>'DESC']);
        $data['offerVoucher'] = $this->QueryModel->selectData('vouchers',$condition);
        $html = $this->load->view("admin/providerOfferVoucher",$data,true);
        $response = [
            'status' => true,
            'html' => $html,
        ];
        echo json_encode($response);
    }
	public function devices()
	{
		$condition = array(
			'joins' => array(
                array(
                    'table' => 'users',
                    'joinWith' => 'users.nfc_serial_number = nfc_devices.serial',
                    'type' => 'left',
                ),
            ),
		);
		$data['devices'] = $this->QueryModel->selectData('nfc_devices',$condition);
		$data['content'] = 'admin/devices';
        $this->load->view("admin/template/template",$data);
	}

	public function add_device()
    {   
        $data['content'] = 'admin/add_device';
        $this->load->view("admin/template/template",$data);
    }

	public function checkDevice()
	{
		$postData = file_get_contents("php://input");
		$ip = json_decode($postData);
		$ip =  $ip->serialNumber;
		$condition = array('conditions' => ['serial' => $ip]);
		$serial = $this->QueryModel->selectData('nfc_devices',$condition);
		if($serial){
			$response = [
				'Message' => "Device Already Exist",
				'status' => true,
			];
			echo json_encode($response);
		}else{
			$insertData = array(
							'serial' => $ip,
						);
			$res = $this->QueryModel->insert('nfc_devices',$insertData);
			if($res)
			{
				$response = [
					'Message' => "Device Register Successfully",
					'status' => true,
				];
				echo json_encode($response);
			}
		}
	}

	public function viewAffiliatorUser()
	{
		$id = $_POST['id'];
		$condition = array('conditions' => ['affilator_id' => $id]);
		// $data['affiliatorUser'] = $this->QueryModel->selectData('users',$condition);
		$affiliatorUser = $this->QueryModel->selectData('users',$condition);
		$affiliatorUserList = array();
		foreach($affiliatorUser as &$list)
		{
			$affiliatorCommission = $this->QueryModel->AffiliatorUserCommission('transation',$list['id']);
			$list['affiliatorCommission'] = $affiliatorCommission;
		}
		$data['affiliatorUser'] = $affiliatorUser;
		// echo "<pre>";print_r($data['affiliatorUser']);die;
		$html = $this->load->view('admin/affiliatorUser',$data,true);
		$response = [
            'status' => true,
            'html' => $html
        ];
        echo json_encode($response);
	}
	public function affiliatorCommissionOffer()
	{
		$affiliator_id = $_POST['id'];
        $condition = array('conditions' => ['user_id' => $affiliator_id]); 
		$data['affiliatorCommissionOffer'] = $this->QueryModel->selectData('transation',$condition);
		$html = $this->load->view('admin/AffiliatorOfferCommission',$data,true);

		$response = [
            'status' => true,
			'html' => $html,
            'affiliatorUserId' => $data['affiliatorCommissionOffer']
        ];
        echo json_encode($response);
	}

	public function area()
	{
		$data['areas'] = $this->QueryModel->selectData('area');
		$data['content'] = 'admin/area';
        $this->load->view("admin/template/template",$data);
	}

	public function addArea_ajaxRequest()
	{
		$data['areas'] = $this->QueryModel->selectData('area');
        $modal = $this->load->view("admin/add_area",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
	}

	public function save_area()
	{
        if (!$this->notWhitespaceOnly($_POST['area'])) {
            
            $response = array(
                'status'  => false,
                'message' => 'The area name must not be just whitespace.',
            );
            echo json_encode($response);
            die();
        }
		$this->form_validation->set_rules(
			'area', 'Area',
			'required|is_unique[area.area]',
			array(
				'required'  => 'Area name is required',
				'is_unique' => 'This %s name already exists.'
			)
		);		
        if ($this->form_validation->run() === false) {
            $error_message = 'The area name is already exist. Please choose a different area name.';
                
                $response = array(
                    'status'  => false,
                    'message' => $error_message,
                );
                echo json_encode($response);
        }else{
            $value = array(
                'area' => $_POST['area'],
            );
            $respo = $this->QueryModel->insert('area',$value);
            $str = $this->db->last_query();
            // print_r($str);exit;
        
            $condition = array('conditions' => ['id' => $respo]);
            $data['area'] = $this->QueryModel->selectData('area',$condition);
            $html = $this->load->view("admin/appendArea",$data,true);
            $response = array(
                'id' => $respo,
                'status'  => true,
                'html' => $html,
            );
            echo json_encode($response);
        }
	}

	public function edit_area_ajaxRequest()
	{
		$id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
        $data['areas'] = $this->QueryModel->selectSingleRow('area',$condition);
        $modal = $this->load->view("admin/edit_area",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        echo json_encode($response);
	}

	public function update_area()
	{
        if (!$this->notWhitespaceOnly($_POST['area_name'])) {
            
            $response = array(
                'status'  => false,
                'message' => 'The area name must not be just whitespace.',
            );
            echo json_encode($response);
            die();
        }
        $condition = array('conditions'=>['id' => $_POST['id']]);
        $category_data = $this->QueryModel->selectSingleRow('area',$condition);
        if($category_data['area'] == $_POST['area_name']){
            $id = $_POST['id'];
            $value = array(
                'area' => $_POST['area_name'],
            );
            $update_condition = array('id' => $id);
            $respo = $this->QueryModel->update('area',$update_condition,$value);
            $condition = array('conditions' => ['id' => $id]);
            $data['area'] = $this->QueryModel->selectData('area',$condition);
            $html = $this->load->view("admin/appendArea",$data,true);
            $response = array(
                'id' => $id,
                'status'  => true,
                'html' => $html,
            );
            echo json_encode($response);
        }else{
            $condition = array('conditions' => ['area' => $_POST['area_name']]);
            $areaData = $this->QueryModel->selectData('area',$condition);
            if ($areaData) {
                $error_message = 'The area name is already exist. Please choose a different area name.';
                    
                    $response = array(
                        'status'  => false,
                        'message' => $error_message,
                    );
                    echo json_encode($response);
                    die();
            }else{

            $id = $_POST['id'];
            $value = array(
                'area' => $_POST['area_name'],
            );
            $update_condition = array('id' => $id);
            $respo = $this->QueryModel->update('area',$update_condition,$value);
            $condition = array('conditions' => ['id' => $id]);
            $data['area'] = $this->QueryModel->selectData('area',$condition);
            $html = $this->load->view("admin/appendArea",$data,true);
            $response = array(
                'id' => $id,
                'status'  => true,
                'html' => $html,
            );
            echo json_encode($response);
            }
        }
		
	}
	public function delete_AreaAjaxRequest()
	{
		$id = $_POST['id'];
		$condition = array('id' => $id);
		$respo = $this->QueryModel->delete('area',$condition);
		if($respo)
		{
			$response = array(
				'status'  => true,
				'message'  => 'Deleted Successfully',
			);
			echo json_encode($response);
		}
	}
	public function about_us()
	{
		$data['about_us'] = $this->QueryModel->selectData('about_us');
		$data['content'] = 'admin/about_us';
        $this->load->view("admin/template/template",$data);
	}

	public function addabout_us_ajaxRequest()
	{
		$data['about_us'] = $this->QueryModel->selectData('about_us');
        $modal = $this->load->view("admin/add_about",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
	}

	public function save_about()
	{
		
		$this->load->library('upload');

		// Set the upload configuration
		$config['upload_path'] = './uploads/';  // Change this to your desired upload directory
		$config['allowed_types'] = 'mp4';  // Define allowed file types
		$config['max_size'] = 2048;  // Set maximum file size in kilobytes (2 MB in this case)
		
		// Initialize the upload library with the configuration
		$this->upload->initialize($config);
		
		// Check if any files are uploaded
		if (!empty($_FILES['photo']['name'][0])) {
			$uploadedFiles = array();
		
			// Loop through each uploaded file
			for ($i = 0; $i < count($_FILES['photo']['name']); $i++) {
				$_FILES['userfile']['name']     = $_FILES['photo']['name'][$i];
				$_FILES['userfile']['type']     = $_FILES['photo']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
				$_FILES['userfile']['error']    = $_FILES['photo']['error'][$i];
				$_FILES['userfile']['size']     = $_FILES['photo']['size'][$i];
		
				// Check if the file upload is successful
				if ($this->upload->do_upload('userfile')) {
					// File uploaded successfully, get the file data
					$uploadedData = $this->upload->data();
					$uploadedFileName = $uploadedData['file_name'];
		
					// Only store the filename in the array
					$uploadedFiles[] = './uploads/'.$uploadedFileName;
				} else {
					// Handle the case where file upload fails
					$uploadedFiles[] = null; // or any other default value
				}
			}
		
			// Convert the array of filenames to JSON format
			$jsonImageData = json_encode($uploadedFiles);
		} else {
			// No files were uploaded
			$jsonImageData = ''; // or any other default value
		}
		$value = array(
            'heading' => $_POST['heading'],
			'our_mission' => $_POST['our_mission'],
			'our_vision' => $_POST['our_vision'],
			'our_history' => $_POST['our_history'],
			'files' =>  $jsonImageData,
        );
        $respo = $this->QueryModel->insert('about_us',$value);
        $str = $this->db->last_query();
        // print_r($str);exit;
    
        $condition = array('conditions' => ['id' => $respo]);
        $data['about_us'] = $this->QueryModel->selectData('about_us',$condition);
        if(insert_trans_about($_POST['heading'],$_POST['our_mission'],$_POST['our_vision'],$_POST['our_history']) === true){
            //add_translation_data_on_file();
        }
        $html = $this->load->view("admin/appendAbout",$data,true);
        $response = array(
			'id' => $respo,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
	}

	public function edit_about_us_ajaxRequest()
	{
		$id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
        $data['about_us'] = $this->QueryModel->selectSingleRow('about_us',$condition);
        $modal = $this->load->view("admin/edit_about",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        echo json_encode($response);
	}

	public function update_about()
	{
		$id = $_POST['id'];

		$this->load->library('upload');
	
		// Set the upload configuration
		$config['upload_path'] = './uploads/';  // Change this to your desired upload directory
		$config['allowed_types'] = 'mp4';  // Define allowed file types
		$config['max_size'] = 2048;  // Set maximum file size in kilobytes (2 MB in this case)
	
		// Initialize the upload library with the configuration
		$this->upload->initialize($config);
	
		// Initialize $file_paths as an empty array
		$file_paths = [];
	
		// Get the existing images from the 'showing_img' input
		$existingImages = json_decode($this->input->post('showing_img'), true);
	
		// Check if decoding was successful and the result is an array
		if ($existingImages !== null && is_array($existingImages)) {
			$file_paths = $existingImages;
		}
	
		// Check if any files are uploaded
		foreach ($_FILES['photo']['name'] as $key => $name) {
			$_FILES['file']['name'] = $_FILES['photo']['name'][$key];
			$_FILES['file']['type'] = $_FILES['photo']['type'][$key];
			$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$key];
			$_FILES['file']['size'] = $_FILES['photo']['size'][$key];
	
			if ($this->upload->do_upload('file')) {
				$uploadData = $this->upload->data();
				$file_paths[] = 'uploads/' . $uploadData['file_name'];
			}
		}
	
		// Convert the array of file paths to JSON format
		$jsonImageData = json_encode($file_paths);
	

		$value = array(
            'heading' => $_POST['heading'],
			'our_mission' => $_POST['our_mission'],
			'our_vision' => $_POST['our_vision'],
			'our_history' => $_POST['our_history'],
			'files' => $jsonImageData,
        );
        $update_condition = array('id' => $id);
        $respo = $this->QueryModel->update('about_us',$update_condition,$value);
        $condition = array('conditions' => ['id' => $id]);
        $data['about_us'] = $this->QueryModel->selectData('about_us',$condition);
        $html = $this->load->view("admin/appendAbout",$data,true);
        $response = array(
            'id' => $id,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
	}

	public function delete_about_usAjaxRequest()
	{
		$id = $_POST['id'];
		$condition = array('id' => $id);
		$respo = $this->QueryModel->delete('about_us',$condition);
		if($respo)
		{
			$response = array(
				'status'  => true,
				'message'  => 'Deleted Successfully',
			);
			echo json_encode($response);
		}
	}

	public function testimonial()
	{
		$data['testimonial'] = $this->QueryModel->selectData('testimonial');
		$data['content'] = 'admin/testimonial';
        $this->load->view("admin/template/template",$data);
	}

	public function addtestimonial_ajaxRequest()
	{
		$data['testimonial'] = $this->QueryModel->selectData('testimonial');
        $modal = $this->load->view("admin/add_testimonial",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
	}

	public function save_testimonial()
	{

		$this->load->library('upload');

		// Set the upload configuration
		$config['upload_path'] = './uploads/';  // Change this to your desired upload directory
		$config['allowed_types'] = 'gif|jpg|jpeg|png';  // Define allowed file types
		$config['max_size'] = 2048;  // Set maximum file size in kilobytes (2 MB in this case)
		
		// Initialize the upload library with the configuration
		$this->upload->initialize($config);
		
		// Check if any files are uploaded
		if (!empty($_FILES['photo']['name'][0])) {
			$uploadedFiles = array();
		
			// Loop through each uploaded file
			for ($i = 0; $i < count($_FILES['photo']['name']); $i++) {
				$_FILES['userfile']['name']     = $_FILES['photo']['name'][$i];
				$_FILES['userfile']['type']     = $_FILES['photo']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
				$_FILES['userfile']['error']    = $_FILES['photo']['error'][$i];
				$_FILES['userfile']['size']     = $_FILES['photo']['size'][$i];
		
				// Check if the file upload is successful
				if ($this->upload->do_upload('userfile')) {
					// File uploaded successfully, get the file data
					$uploadedData = $this->upload->data();
					$uploadedFileName = $uploadedData['file_name'];
		
					// Only store the filename in the array
					$uploadedFiles[] = './uploads/'.$uploadedFileName;
				} else {
					// Handle the case where file upload fails
					$uploadedFiles[] = null; // or any other default value
				}
			}
		
			// Convert the array of filenames to JSON format
			$jsonImageData = json_encode($uploadedFiles);
		} else {
			// No files were uploaded
			$jsonImageData = ''; // or any other default value
		}
		
		// Rest of your code...

		$value = array(
            'heading' => $_POST['heading'],
			'content' => $_POST['content'],
			'name' => $_POST['name'],
			'photo' => $jsonImageData,
        );
        $respo = $this->QueryModel->insert('testimonial',$value);
        if(insert_trans_testimonial($_POST['content']) === true){
            //add_translation_data_on_file();
        }
        $str = $this->db->last_query();
        // print_r($str);exit;
    
        $condition = array('conditions' => ['id' => $respo]);
        $data['testimonial'] = $this->QueryModel->selectData('testimonial',$condition);
        $html = $this->load->view("admin/appendTestimonial",$data,true);
        $response = array(
			'id' => $respo,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
	}


	public function edit_testimonial_ajaxRequest()
	{
		$id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
        $data['testimonial'] = $this->QueryModel->selectSingleRow('testimonial',$condition);
        $modal = $this->load->view("admin/edit_Testimonial",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        echo json_encode($response);
	}

	public function update_testimonial()
	{
		$id = $this->input->post('id'); // Use CI input class for security
	
		$this->load->library('upload');
	
		// Set the upload configuration
		$config['upload_path'] = './uploads/';  // Change this to your desired upload directory
		$config['allowed_types'] = 'gif|jpg|jpeg|png';  // Define allowed file types
		$config['max_size'] = 2048;  // Set maximum file size in kilobytes (2 MB in this case)
	
		// Initialize the upload library with the configuration
		$this->upload->initialize($config);
	
		// Initialize $file_paths as an empty array
		$file_paths = [];
	
		// Get the existing images from the 'showing_img' input
		$existingImages = json_decode($this->input->post('showing_img'), true);
	
		// Check if decoding was successful and the result is an array
		if ($existingImages !== null && is_array($existingImages)) {
			$file_paths = $existingImages;
		}
	
		// Check if any files are uploaded
		foreach ($_FILES['photo']['name'] as $key => $name) {
			$_FILES['file']['name'] = $_FILES['photo']['name'][$key];
			$_FILES['file']['type'] = $_FILES['photo']['type'][$key];
			$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$key];
			$_FILES['file']['size'] = $_FILES['photo']['size'][$key];
	
			if ($this->upload->do_upload('file')) {
				$uploadData = $this->upload->data();
				$file_paths[] = 'uploads/' . $uploadData['file_name'];
			}
		}
	
		// Convert the array of file paths to JSON format
		$jsonImageData = json_encode($file_paths);
	
		// Rest of your code...
		$value = array(
			'heading' => $this->input->post('heading'),  // Use CI input class for security
			'content' => $this->input->post('content'),
			'name' => $this->input->post('name'),
			'photo' => $jsonImageData,
		);
	
		$update_condition = array('id' => $id);
		$respo = $this->QueryModel->update('testimonial', $update_condition, $value);
	
		$condition = array('conditions' => ['id' => $id]);
		$data['testimonial'] = $this->QueryModel->selectData('testimonial', $condition);
		$html = $this->load->view("admin/appendTestimonial", $data, true);
		$response = array(
			'id' => $id,
			'status'  => true,
			'html' => $html,
		);
		echo json_encode($response);
	}
	

	public function delete_testimonialAjaxRequest()
	{
		$id = $_POST['id'];
		$condition = array('id' => $id);
		$respo = $this->QueryModel->delete('testimonial',$condition);
		if($respo)
		{
			$response = array(
				'status'  => true,
				'message'  => 'Deleted Successfully',
			);
			echo json_encode($response);
		}
	}

	
	public function deleteTestimonialImage()
	{
		$imgValue = $_POST['imgValue'];
        $imageArray = json_decode($_POST['imgValue'], true);
        $index = $_POST['index'];
        if (is_numeric($index) && $index >= 0 && $index < count($imageArray)) {
            array_splice($imageArray, $index, 1);
            $check = json_encode($imageArray ,true);
            $response = array(
                'status'   => true,
                'imgValue'  => $check,
                'index'  => $index,
            );
        } else {
            $response = array(
                'status'   => false,
                'error'    => 'Invalid index',
            );
        }
        echo json_encode($response);
	}
	
	public function faq()
	{
		$data['faq'] = $this->QueryModel->selectData('faq');
		$data['content'] = 'admin/faq';
        $this->load->view("admin/template/template",$data);
	}

	public function destination()
	{
		$data['about_us'] = $this->QueryModel->selectData('about_us');
		$data['content'] = 'admin/destination';
        $this->load->view("admin/template/template",$data);
	}
	public function addFAQ_ajaxRequest()
	{
		$data['faq'] = '';
        $modal = $this->load->view("admin/add_faq",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
	}

	public function save_faq()
	{
		$value = array(
            'question' => $_POST['question'],
			'answer' => $_POST['answer'],
        );
        $respo = $this->QueryModel->insert('faq',$value);
    
        $condition = array('conditions' => ['id' => $respo]);
        $data['faq'] = $this->QueryModel->selectData('faq',$condition);
        $html = $this->load->view("admin/appendFAQ",$data,true);
        $response = array(
			'id' => $respo,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
	}

	public function edit_faq_ajaxRequest()
	{
		$id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
        $data['faq'] = $this->QueryModel->selectSingleRow('faq',$condition);
        $modal = $this->load->view("admin/editFAQ",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        echo json_encode($response);
	}

	public function update_faq()
	{
		$id = $this->input->post('id');
		$value = array(
            'question' => $_POST['question'],
			'answer' => $_POST['answer'],
		);
	
		$update_condition = array('id' => $id);
		$respo = $this->QueryModel->update('faq', $update_condition, $value);
	
		$condition = array('conditions' => ['id' => $id]);
		$data['faq'] = $this->QueryModel->selectData('faq', $condition);
		$html = $this->load->view("admin/appendFAQ", $data, true);
		$response = array(
			'id' => $id,
			'status'  => true,
			'html' => $html,
		);
		echo json_encode($response);
	}
	
	public function delete_faqAjaxRequest()
	{
		$id = $_POST['id'];
		$condition = array('id' => $id);
		$respo = $this->QueryModel->delete('faq',$condition);
		if($respo)
		{
			$response = array(
				'status'  => true,
				'message'  => 'Deleted Successfully',
			);
			echo json_encode($response);
		}
	}

	public function getState()
	{
		$countryId = $this->input->post('countryId');
		$condition = array('conditions' => ['country_id' => $countryId]);

		$data['states'] = $this->QueryModel->selectData('states' ,$condition);
		$html = $this->load->view("admin/get_state", $data, true);
		// Send the response back to the client
		$response['status'] = true;
		$response['html'] = $html;
		$response['condition'] = $condition;
		echo json_encode($response);
	}
	
	public function deleteabout_usImage()
	{
		$imgValue = $_POST['imgValue'];
        $imageArray = json_decode($_POST['imgValue'], true);
        $index = $_POST['index'];
        if (is_numeric($index) && $index >= 0 && $index < count($imageArray)) {
            array_splice($imageArray, $index, 1);
            $check = json_encode($imageArray ,true);
            $response = array(
                'status'   => true,
                'imgValue'  => $check,
                'index'  => $index,
            );
			echo json_encode($response);
        } else {
            $response = array(
                'status'   => false,
                'error'    => 'Invalid index',
            );
			echo json_encode($response);
        }
	}

	public function contact_support()
	{
		$msgCondition = array(
			'conditions' => ['status' => '']
		);
		$data['contactSupport_message'] = $this->QueryModel->selectData('contact_support',$msgCondition);
		$msgRplyCondition = array(
			'conditions' => ['status !=' => '']
		);
		$data['contactSupport_messageReply'] = $this->QueryModel->selectData('contact_support',$msgRplyCondition);
		$data['content'] = 'admin/contact_support';
        $this->load->view("admin/template/template",$data);
	}
	public function contact_support_reply_ajaxRequest()
	{
		$id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
		$data['contact_support'] = $this->QueryModel->selectSingleRow('contact_support',$condition);
        $modal = $this->load->view("admin/contact_support_reply",$data,true);
        $response = array(
            'status'  => true,
            'html' => $modal,
        );
        // print_r($response);exit;
        echo json_encode($response);
	}

	public function save_contact_support_reply()
	{
		$id = $_POST['id'];
		$value = array(
            'message' => $_POST['message_reply'],
			'parrent_id' => $_POST['parrent_id'],
			'offer_id' => $_POST['offer_id'],
			'provider_id' => $_POST['provider_id'],
			'voucher_id' => $_POST['voucher_id'],
			'status' => 'reply'
        );
        $respo = $this->QueryModel->insert('contact_support',$value);
    
        $condition = array('conditions' => ['id' => $respo]);
        $data['contactSupport_message'] = $this->QueryModel->selectData('contact_support',$condition);
		$data['id'] = $respo;
        $html = $this->load->view("admin/append_contact_support",$data,true);
        $response = array(
			'id' => $id,
            'status'  => true,
            'html' => $html,
        );
        echo json_encode($response);
	}
	public function save_setting() {

		$condition = array('id' => 1);
            $data = array(
                'default_currency' => $this->input->post('currency'),
                'default_lang' => $this->input->post('language'),
            );
            $result = $this->QueryModel->update('setting',$condition,$data); 

            if ($result) {
                $response = array('status' => true,'message' => 'Success');
            } else {
                $response = array('status' => false,'message' => 'Failed');
            }
			// echo json_encode($response);
            $this->output->set_content_type('application/json')->set_output(json_encode($response));

    }

	public function getProviderCurrency()
	{
		$providerId = $this->input->post('providerId');
		$condition = array('conditions' => ['id' => $providerId , 'type' => 'provider']);

		$data['provider'] = $this->QueryModel->selectSingleRow('users' ,$condition);
		$data['default_currency'] = $data['provider']['default_currency'];
		if(!empty($data['default_currency']))
		{
			$default_currency = $data['default_currency'];
		}else{
			$default_currency = "USD";
		}
		$response['status'] = true;
		$response['default_currency'] = $default_currency;
		echo json_encode($response);
	}
    // public function add_employee()
    // {
    //     $this->form_validation->set_rules('name', 'Name', 'required');
    //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    //     $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|is_unique[users.phone]');
    
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('provider/employee');
    //     } else {
    //         if ($this->is_unique_email_and_phone()) {
    //             $this->process_form_data();
    //         } else {
    //             $this->session->set_flashdata('error', 'Email or phone number is already in use.');
    //             redirect('provider/employee');
    //         }
    //     }
    // }
    
}
   