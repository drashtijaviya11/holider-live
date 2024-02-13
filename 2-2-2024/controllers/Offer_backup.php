<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('QueryModel');
        $this->load->library('session');
    }

    public function index()
    {   
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
        $country = '';
        $state = isset($_GET['state'])? $_GET['state']: '';       
        if(get_uri_segment()){
            $iso3_name = strtoupper(get_uri_segment());
            $condition = array('conditions' => ['iso3' => $iso3_name]);
            $country_data = $this->QueryModel->selectData('countries',$condition);
            $country = (isset($country_data)) ? $country_data[0]['name'] : '';
        }
        if($state){
            $state_string = get_url_segment_second(2);
            $stateArray = explode('-', $state_string);
            $state = end($stateArray);

        }
			// echo "<pre>";
			// print_r($country);
			// die;
        //die('test');
        //$state = $this->input->cookie('state', true);
        //echo $country.'-'.$state;die; 
        if ($country != '' && $state != '') {
            $condition = array('conditions' => ['country' => $country, 'state' => $state]);
        } elseif ($country != '' && $state == '') {
            $condition = array('conditions' => ['country' => $country]);
        } elseif ($country == '' && $state != '') {
            $condition = array('conditions' => ['state' => $state]);
        } else {
            $condition = '';
        }
        $offers = $this->QueryModel->selectData('offer', $condition);
        $ratingMap = array();
        foreach ($r as $rating) {
            $ratingMap[$rating['offer_id']] = $rating['average_rate'];
        }
    
        $mergedArray = array();
    
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

        // echo "<pre>";
        // print_r($mergedArray);
        // die;
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');   
        $data['offers'] = $mergedArray;
        $data['category'] = $this->QueryModel->selectData('category');
        if ($this->agent->is_mobile()) {
            $data['content'] = 'offer';
            $this->load->view("template/template", $data);
        }else{
            $data['content'] = 'desktop/categories';
            $this->load->view("desktop/template/template", $data);
        }
    }
    public function get_cat_offer(){
        $cat_id = $_POST['cat_id'];
		$offset = 0;
		$limit = 10;
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
        $condition =  array(
			'conditions' => ['categories'=>$cat_id],
			'offset' => $offset,
			'limit' => $limit
		);;
        $offers = $this->QueryModel->selectData('offer', $condition);
        $ratingMap = array();
        foreach ($r as $rating) {
            $ratingMap[$rating['offer_id']] = $rating['average_rate'];
        }
        $mergedArray = array();
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
      	// echo "<pre>";
        // print_r($mergedArray);
        // die;
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');   
        $data['offers'] = $mergedArray;
        $data['category'] = $this->QueryModel->selectData('category');
		$data['offers'] = $mergedArray;
		// $html = $this->load->view("desktop/offer_list", $data, true);
		if ($this->agent->is_mobile()) {
            // $data['content'] = 'offer';
            $html = $this->load->view("get_offer_list", $data,true);
        }else{
            // $data['content'] = 'desktop/categories';
            $html = $this->load->view("desktop/offer_list", $data,true);
        }
		$response = array(
			'status' => true,
			'html' => $html,
		);

		// Set the content type header
		$this->output->set_content_type('application/json');
		echo json_encode($response);
		return;

    }
    public function list(){
       echo $this->uri->segment(1);die('mmmm');
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
        $country = '';
        $state = '';
       echo get_url_segment_second(2); die('test');           
        if(get_uri_segment()){
            $iso3_name = strtoupper(get_uri_segment());
            $condition = array('conditions' => ['iso3' => $iso3_name]);
            $country_data = $this->QueryModel->selectData('countries',$condition);
            $country = (!empty($country_data['area']) && isset($country_data)) ? $country_data['area'][0]['name'] : '';
        }
        if(get_url_segment_second(2)){
            $state_string = get_url_segment_second(2);
            $stateArray = explode('-', $state_string);
            $state = end($stateArray);
        }
        //die('test');
        //$state = $this->input->cookie('state', true);
        //echo $country.'-'.$state;die;
        if ($country != '' && $state != '') {
            $condition = array('conditions' => ['country' => $country, 'state' => $state]);
        } elseif ($country != '' && $state == '') {
            $condition = array('conditions' => ['country' => $country]);
        } elseif ($country == '' && $state != '') {
            $condition = array('conditions' => ['state' => $state]);
        } else {
            $condition = '';
        }
        $offers = $this->QueryModel->selectData('offer', $condition);
        $ratingMap = array();
        foreach ($r as $rating) {
            $ratingMap[$rating['offer_id']] = $rating['average_rate'];
        }
    
        $mergedArray = array();
    
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

        // echo "<pre>";
        // print_r($mergedArray);
        // die;
        $data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');   
        $data['offers'] = $mergedArray;
        $data['category'] = $this->QueryModel->selectData('category');
        $data['content'] = 'offer';
        $this->load->view("template/template", $data);
    }
    public function getArea()
    {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $condition = array('conditions' => ['id' => $id]);
        if($type == 'country')
        {
            delete_cookie('state');
            $data['area'] = $this->QueryModel->selectData('countries',$condition);
            $area = (!empty($data['area']) && isset($data['area'][0]['name'])) ? $data['area'][0]['name'] : '';
            set_cookie("country", $data['area'][0]['name'], time() + (24 * 60 * 60));
            $short_name = strtolower($data['area'][0]['iso3']);
            $url = base_url().'offer/'.$short_name.'?country='.makeUrlString($area);
        }
        else if($type == 'state')
        {        
            $countryName = $this->input->cookie('country',true);
            $data['area'] = $this->QueryModel->selectData('states',$condition);
            $area = (!empty($data['area']) && isset($data['area'][0]['name'])) ? $data['area'][0]['name'] : '';
            $state_name = (!empty($data['area']) && isset($data['area'][0]['iso2'])) ? $data['area'][0]['name'] : '';
            $area_slug = $this->slug($area);
            $area_slug =$area_slug.'-'.$data['area'][0]['id'];
            set_cookie("state", $data['area'][0]['name'], time() + (24 * 60 * 60));
            // country detail 
            $condition_country = array('conditions' => ['id' => $data['area'][0]['country_id']]);
            $country_data = $this->QueryModel->selectData('countries',$condition_country);
            $short_name = strtolower($country_data[0]['iso3']);
            // $url = base_url().'offer?country='.$countryName.'&state='.$state_name.'/'.$area_slug;
            $url = base_url().'offer/'.$short_name.'?country='.$countryName.'&state='.$state_name;

        }
        $response['url'] = $url ;
        $response['status'] = true;
        echo json_encode($response);
        return;
    }
function slug($string, $spaceRepl = "-")
{
    $string = str_replace("&", "and", $string);

    $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);

    $string = strtolower($string);

    $string = preg_replace("/[ ]+/", " ", $string);

    $string = str_replace(" ", $spaceRepl, $string);

    return $string;
}
    public function viewOffer()
    {
        $url_slug = fetcharea();
        $id = $_POST['id'];
        $condition = array('conditions' => ['id' => $id]);
        $data['offer_detail'] = $this->QueryModel->selectSingleRow('offer',$condition);
        //$html = $this->load->view('single_offer',$data,true);
        $responsedata['url_slug'] = $url_slug;
        // if ($this->agent->is_mobile()) {
            $responsedata['url'] = base_url('offer/single_offer/'.$id.''.$url_slug);
        // }else{
        //     $responsedata['url'] = base_url('desktop/offer/single_offer/'.$id.''.$url_slug);
        // }
        $responsedata['id'] = $id;
        echo json_encode($responsedata);
        return;
    }

    public function single_offer($id)
    {
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $no_of_column_rating = $this->QueryModel->record_count('offer_rating', ['conditions' => ['offer_id' => $id]]);
        $total_rating = $this->QueryModel->selectSumColumn('offer_rating', ['conditions' => ['offer_id' => $id]], 'rate')[0]['rate'];
        $data['average_rating'] = ($no_of_column_rating > 0) ? ($total_rating / $no_of_column_rating) : 0;
        $offer_datail_condition = array('conditions' => ['id' => $id]);
        $data['offer_detail'] = $this->QueryModel->selectSingleRow('offer', $offer_datail_condition);
        $response = trim($data['offer_detail']['image'], "[]");
        $data['imageArray'] = explode(',',$response);
        $imagePathsArray = array_filter(array_map('trim', $data['imageArray']));
		$data['country'] = $this->QueryModel->selectData('countries');
        $data['state'] = $this->QueryModel->selectData('states');  
        // echo "<pre>";
        // print_r( $data);
        // die;
        if ($this->agent->is_mobile()) {
            $data['content'] = 'single_offer';
            $this->load->view("template/template", $data);
        }else{
            $data['content'] = 'desktop/single_offer';
            $this->load->view("desktop/template/template", $data);
        }
    }

	public function get_offer_items()
	{
		$cat_id =$_POST['cat_id'];
		$offset = $_POST['offset'];
		$limit = 10;
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
        $condition =  array(
			'conditions' => ['categories'=>$cat_id],
			'offset' => $offset,
			'limit' => $limit
		);
        $offers = $this->QueryModel->selectData('offer', $condition);
        $ratingMap = array();
        foreach ($r as $rating) {
            $ratingMap[$rating['offer_id']] = $rating['average_rate'];
        }
        $mergedArray = array();
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
      	// echo "<pre>";
        // print_r($mergedArray);
        // die;
		$data['offers'] = $mergedArray;
		$html = $this->load->view("desktop/offer_list", $data, true);
		$response = array(
			'offer' => $data['offers'],
			'status' => true,
			'html' => $html,
		);

		// Set the content type header
		$this->output->set_content_type('application/json');
		echo json_encode($response);
		return;
	}

    
}
