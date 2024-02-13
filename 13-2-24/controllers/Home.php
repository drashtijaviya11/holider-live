<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->helper('cookie');
        $this->load->library('session');

    }
    public function index()
    {
		$cat_id = isset($_POST['cat_id'])? $_POST['cat_id']: '';
		$offset = 0;
		$limit = 6;
		$areaIdCookie = $this->input->cookie('areaId', true);
		$areaId = isset($areaIdCookie) ? $areaIdCookie : '';
		
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
		if($cat_id !== '' && $areaId !== ''){
			$condition =  array(
				'conditions' => ['categories'=>$cat_id,'area' => $areaId],
				'offset' => $offset,
				'limit' => $limit
			);
		}else if($cat_id == '' && $areaId !== ''){
			$condition =  array(
				'conditions' => ['area' => $areaId],
				'offset' => $offset,
				'limit' => $limit
			);
		}else if($cat_id !== '' && $areaId == ''){
			$condition =  array(
				'conditions' => ['categories'=>$cat_id],
				'offset' => $offset,
				'limit' => $limit
			);
		}elseif($cat_id == '' && $areaId == ''){
			$condition =  array(
				'offset' => $offset,
				'limit' => $limit
			);
		}

        $offers = $this->QueryModel->selectData('offer', $condition);
        $ratingMap = array();
        if(!empty($r)){
            foreach ($r as $rating) {
                $ratingMap[$rating['offer_id']] = $rating['average_rate'];
            }
        }
	//print_r($offers);
        $mergedArray = array();
        if(!empty($offers)){
            foreach ($offers as $offer) {
                $offerId = $offer['id'];
                // $n = strpos($offer['image'], "[");
                $response = trim($offer['image'], "[]");

                $imagePathsArray = explode(',',$response);
                $imagePathsArray = array_filter(array_map('trim', $imagePathsArray));
                $decodedImages = array_map(function ($json) {
                    return json_decode($json, true);
                }, $imagePathsArray);

                $firstImagePath = !empty($decodedImages) ? trim($decodedImages[0]['url']) : '';
        
                $mergedArray[] = array_merge(
                    $offer,
                    array('average_rate' => isset($ratingMap[$offerId]) ? $ratingMap[$offerId] : 0, 'first_image' => $firstImagePath)
                );
            }
        }
		// echo "<pre>";print_r($mergedArray);die;
		$data['offers'] = $mergedArray;
        if ($this->agent->is_mobile()) {
            $data['content'] = 'home';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/home';
            $this->load->view("desktop/template/template",$data);
        }
    }
    public function destination()
    {
		$data['destinations'] = $this->QueryModel->selectData('area');
        if ($this->agent->is_mobile()) {
            $data['content'] = 'destination';
            $this->load->view("template/template",$data);
        }else{

            $data['content'] = 'desktop/destination';
            $this->load->view("desktop/template/template",$data);
        }
    
    }
    public function contact_us()
    {
        if ($this->agent->is_mobile()) {
            $data['content'] = 'contact';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/contact_us';
            $this->load->view("desktop/template/template",$data);
        }
    }
    public function about()
    {   
		$data['testimonial'] = $this->QueryModel->selectData('testimonial');
		// print_r($data['testimonial']);die;
		$data['about'] = $this->QueryModel->selectSingleRow('about_us');
        if ($this->agent->is_mobile()) {
            $data['content'] = 'about';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/about';
            $this->load->view("desktop/template/template",$data);
        }
    }
    public function faq()
    {
		$data['faqs'] = $this->QueryModel->selectData('faq');
        if ($this->agent->is_mobile()) {
            $data['content'] = 'faq';
            $this->load->view("template/template",$data);
        }else{
            $data['content'] = 'desktop/faq';
            $this->load->view("desktop/template/template",$data);
        }
    }

	public function saveContectUs()
	{
        // Get form data
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('text');

        $value = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        );
        $data['name'] = $name;
        $data['subject'] = $subject;
        $data['message'] = $message;
        $insert = $this->QueryModel->insert('contect_us',$value);
        if($insert)
        {
            send_mail_new($email, 'Holider', $this->load->view('userEmail_template',$data, true));
            redirect('home/contact_us');
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
			redirect('home/profile', 'refresh'); 
		
	}
   
}
