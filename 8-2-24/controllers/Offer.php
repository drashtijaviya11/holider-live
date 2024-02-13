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
		if(isset($_GET['refid'])){
			$key = $_GET['refid'];
			set_cookie("affiliator_key", $key, time() + (24 * 60 * 60));
			if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('type')=='users'){
				if($this->input->cookie('affiliator_key',true)){
					$aff_key = $this->input->cookie('affiliator_key');
					$affiliator_key = customDecrypt($aff_key, 'fXK9RNGo2D');
					$condition = array('id' => $this->session->userdata('id'));
					$updateValue = array(
						'affilator_id' => $affiliator_key,
					);
					$updateRes = $this->QueryModel->update('users',$condition,$updateValue);
					delete_cookie('affiliator_key');
				}
			}
		}
		$search = $search = $this->input->get('search') ?? '';
		delete_cookie('login_redirect');
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
		$areaIdCookie = $this->input->cookie('areaId', true);
		$areaId = isset($areaIdCookie) ? $areaIdCookie : '';
		$condition = array();
		if($areaId !== ''){
			$condition =  array(
				'conditions' => ['area' => $areaId],
			);
		}else{
			$condition = array();
		}
		if (!empty($search)) {
			$condition['like'] = array(
				'name' => $search,
			);
		
			$condition['or_like'] = array(
				'details' => $search,
			);
		}
	
        // $country = '';
        // $state = isset($_GET['state'])? $_GET['state']: '';       
        // if(get_uri_segment()){
        //     $iso3_name = strtoupper(get_uri_segment());
        //     $condition = array('conditions' => ['iso3' => $iso3_name]);
        //     $country_data = $this->QueryModel->selectData('countries',$condition);
        //     $country = (isset($country_data)) ? $country_data[0]['name'] : '';
        // }
        // if($state){
        //     $state_string = get_url_segment_second(2);
        //     $stateArray = explode('-', $state_string);
        //     $state = end($stateArray);

        // }
			// echo "<pre>";
			// print_r($country);
			// die;
        //die('test');
        //$state = $this->input->cookie('state', true);
        //echo $country.'-'.$state;die; 
        // if ($country != '' && $state != '') {
        //     $condition = array('conditions' => ['country' => $country, 'state' => $state]);
        // } elseif ($country != '' && $state == '') {
        //     $condition = array('conditions' => ['country' => $country]);
        // } elseif ($country == '' && $state != '') {
        //     $condition = array('conditions' => ['state' => $state]);
        // } else {
        //     $condition = '';
        // }
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
	public function offer_destination()
    {   
        delete_cookie('login_redirect');
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
		$areaIdCookie = $this->input->cookie('areaId', true);
		$areaId = isset($areaIdCookie) ? $areaIdCookie : '';
		if($areaId !== ''){
			$condition =  array(
				'conditions' => ['area' => $areaId],
			);
		}else{
			$condition =  '';
		}
        // $country = '';
        // $state = isset($_GET['state'])? $_GET['state']: '';       
        // if(get_uri_segment()){
        //     $iso3_name = strtoupper(get_uri_segment());
        //     $condition = array('conditions' => ['iso3' => $iso3_name]);
        //     $country_data = $this->QueryModel->selectData('countries',$condition);
        //     $country = (isset($country_data)) ? $country_data[0]['name'] : '';
        // }
        // if($state){
        //     $state_string = get_url_segment_second(2);
        //     $stateArray = explode('-', $state_string);
        //     $state = end($stateArray);

        // }
			// echo "<pre>";
			// print_r($country);
			// die;
        //die('test');
        //$state = $this->input->cookie('state', true);
        //echo $country.'-'.$state;die; 
        // if ($country != '' && $state != '') {
        //     $condition = array('conditions' => ['country' => $country, 'state' => $state]);
        // } elseif ($country != '' && $state == '') {
        //     $condition = array('conditions' => ['country' => $country]);
        // } elseif ($country == '' && $state != '') {
        //     $condition = array('conditions' => ['state' => $state]);
        // } else {
        //     $condition = '';
        // }
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
		$keyUpsrch_value = isset($_POST['keyUpsrch_value'])? $_POST['keyUpsrch_value']: '';
        $cat_id = isset($_POST['cat_id'])? $_POST['cat_id']: '';
		$search = isset($_POST['search'])? $_POST['search']: '';
		$offset = 0;
		$limit = 15;
		$currentURL = current_url();
        // if (str_contains($currentURL, 'offer_destination')) {
            if (strpos($currentURL, 'offer_destination') !== false) {
		$areaIdCookie = $this->input->cookie('areaId', true);
		$areaId = isset($areaIdCookie) ? $areaIdCookie : '';
        }else{
            delete_cookie('areaId');
            $areaId='';
            // delete_cookie('state');
        }
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
		$lang = $this->input->cookie('lang', true);
		if (!empty($keyUpsrch_value)) {
			if($lang == ''){
				$lang = 'english'; 
			}
			if($lang == 'english')
			{
				$srch_condition['like'] = array(
					'title_eng' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_eng' => $keyUpsrch_value,
				);
			}
			if($lang == 'hebrew')
			{
				$srch_condition['like'] = array(
					'title_heb' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_heb' => $keyUpsrch_value,
				);
			}
			if($lang == 'russian')
			{
				$srch_condition['like'] = array(
					'title_ru' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_ru' => $keyUpsrch_value,
				);
			}
			if($lang == 'french')
			{
				$srch_condition['like'] = array(
					'title_fr' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_fr' => $keyUpsrch_value,
				);
			}
			if($lang == 'german')
			{
				$srch_condition['like'] = array(
					'title_ger' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_ger' => $keyUpsrch_value,
				);
			}
			if($lang == 'thai')
			{
				$srch_condition['like'] = array(
					'title_th' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_th' => $keyUpsrch_value,
				);
			}
			if($lang == 'italian')
			{
				$srch_condition['like'] = array(
					'title_it' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_it' => $keyUpsrch_value,
				);
			}

		$trans_offer = $this->QueryModel->selectData('translate_lang', $srch_condition);
		$searched_offers = array();
		foreach($trans_offer as &$trans_offer_data)
		{
			$condition['like'] = array(
				'name' => $trans_offer_data['title']
			);
		
			$condition['or_like'] = array(
				'details' => $trans_offer_data['description']
			);
			// $condition = array(
			// 	'like' => ['name' => $trans_offer_data['title']],
			// 	'or_like' => ['details' => $trans_offer_data['description']]
			// );
			$srched_offer =  $this->QueryModel->selectData('offer', $condition);
			$trans_offer_data['searched_offer'] = $srched_offer;
			if (!empty($srched_offer)) {
				$searched_offers = array_merge($searched_offers, $srched_offer);
			}
		}
		// print_r($condition);die;
		$offers = $searched_offers;
	}else{
		$offers = $this->QueryModel->selectData('offer', $condition);
	}
       
        $ratingMap = array();
        if(!empty($r)){
            foreach ($r as $rating) {
                $ratingMap[$rating['offer_id']] = $rating['average_rate'];
            }
        }

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

		$data['offers'] = $mergedArray;
        $data['country'] = $this->QueryModel->selectData('countries');
 		//echo "<pre>";print_r($data);die('test'); 
		$html = $this->load->view("desktop/offer_list",$data,true);
		//       	echo "<pre>";
        // print_r($html);
        // die;
		$response = array(
			'url' => current_url(),
			'search' => $search,
			'cate'=>$cat_id,
			'area' => $areaId,
			'status' => true,
			'html' => $html
		);     
		//print_r($response);die('scds');
	//	$this->output->set_content_type('application/json');
		//header('Content-Type: application/json; charset=utf-8');
		// Set the content type header 
		echo json_encode($response,JSON_UNESCAPED_UNICODE); 
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
	public function new_getArea()
    {
        $id = $_POST['id'];
		$condition = array('conditions' => ['id' => $id]);
		$data['area'] = $this->QueryModel->selectSingleRow('area',$condition);
		// Set a cookie named 'your_cookie_name' with a value 'your_cookie_value'
		$area_name = $data['area']['area'];
		$area = str_replace(' ', '_', $area_name);
		set_cookie("area", $area, time() + (24 * 60 * 60));
		set_cookie("areaId", $data['area']['id'], time() + (24 * 60 * 60));
        $response['url'] = base_url().'offer/offer_destination?area='.$area;
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
            $responsedata['url'] = base_url('offer/single_offer/'.$id);
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
		$keyUpsrch_value = isset($_POST['srching_value'])?$_POST['srching_value']:'';
		$cat_id = isset($_POST['cat_id'])?$_POST['cat_id']:'';
		// $search = isset($_POST['search'])? $_POST['search']: '';
		$offset = $_POST['offset'];
		$limit = 15;
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

		$lang = $this->input->cookie('lang', true);

		if (!empty($keyUpsrch_value)) {
			if($lang == 'english')
			{
				$srch_condition['like'] = array(
					'title_eng' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_eng' => $keyUpsrch_value,
				);
			}
			if($lang == 'hebrew')
			{
				$srch_condition['like'] = array(
					'title_heb' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_heb' => $keyUpsrch_value,
				);
			}
			if($lang == 'russian')
			{
				$srch_condition['like'] = array(
					'title_ru' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_ru' => $keyUpsrch_value,
				);
			}
			if($lang == 'french')
			{
				$srch_condition['like'] = array(
					'title_fr' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_fr' => $keyUpsrch_value,
				);
			}
			if($lang == 'german')
			{
				$srch_condition['like'] = array(
					'title_ger' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_ger' => $keyUpsrch_value,
				);
			}
			if($lang == 'thai')
			{
				$srch_condition['like'] = array(
					'title_th' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_th' => $keyUpsrch_value,
				);
			}
			if($lang == 'italian')
			{
				$srch_condition['like'] = array(
					'title_it' => $keyUpsrch_value,
				);
			
				$srch_condition['or_like'] = array(
					'description_it' => $keyUpsrch_value,
				);
			}

		$trans_offer = $this->QueryModel->selectData('translate_lang', $srch_condition);
		$searched_offers = array();
		foreach($trans_offer as &$trans_offer_data)
		{
			$condition['like'] = array(
				'name' => $trans_offer_data['title']
			);
		
			$condition['or_like'] = array(
				'details' => $trans_offer_data['description']
			);
			// $trans_condition = array(
			// 	'like' => ['name' => $trans_offer_data['title']],
			// 	'or_like' => ['details' => $trans_offer_data['description']]
			// );
			$srched_offer =  $this->QueryModel->selectData('offer', $condition);
			$trans_offer_data['searched_offer'] = $srched_offer;
			if (!empty($srched_offer)) {
				$searched_offers = array_merge($searched_offers, $srched_offer);
			}
		}
		// print_r($condition);die;
		$offers = $searched_offers;
	}else{
		$offers = $this->QueryModel->selectData('offer', $condition);
	}
	$mergedArray = array();
	if(!empty($offers)){
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
	}
      	// echo "<pre>";
        // print_r($mergedArray);
        // die;
		$data['offers'] = $mergedArray;
        $data['country'] = $this->QueryModel->selectData('countries');
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

    public function get_first_load_offer()
	{
			$offset = 0;
			$limit = 15;
			$areaId = $area_value = $this->input->cookie('areaId', true);
			$this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
			$r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
			$condition =  array(
				'offset' => $offset,
				'limit' => $limit
			);
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
	
			$data['offers'] = $mergedArray;
			 //echo "<pre>";print_r($data);die('test'); 
             $data['country'] = $this->QueryModel->selectData('countries');
			$html = $this->load->view("desktop/offer_list",$data,true);
			//       	echo "<pre>";
			// print_r($html);
			// die;
			$response = array(
				'status' => true,
				'html' => $html
			);     
			//print_r($response);die('scds');
		//	$this->output->set_content_type('application/json');
			//header('Content-Type: application/json; charset=utf-8');
			// Set the content type header 
			echo json_encode($response,JSON_UNESCAPED_UNICODE); 
			return;
		
	}

	public function getSearchOfferMobile()
	{
		$keyUpsrch_value = isset($_POST['keyUpsrch_value'])? $_POST['keyUpsrch_value']: '';
		$search = $search = $this->input->get('search') ?? '';
		delete_cookie('login_redirect');
        $this->db->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
		$areaIdCookie = $this->input->cookie('areaId', true);
		$areaId = isset($areaIdCookie) ? $areaIdCookie : '';
		$condition = array();
		if($areaId !== ''){
			$condition =  array(
				'conditions' => ['area' => $areaId],
			);
		}else{
			$condition = array();
		}

		$lang = $this->input->cookie('lang', true);

		if (!empty($keyUpsrch_value)) {
			if($lang == 'english')
			{
				$condition['like'] = array(
					'title_eng' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_eng' => $keyUpsrch_value,
				);
			}
			if($lang == 'hebrew')
			{
				$condition['like'] = array(
					'title_heb' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_heb' => $keyUpsrch_value,
				);
			}
			if($lang == 'russian')
			{
				$condition['like'] = array(
					'title_ru' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_ru' => $keyUpsrch_value,
				);
			}
			if($lang == 'french')
			{
				$condition['like'] = array(
					'title_fr' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_fr' => $keyUpsrch_value,
				);
			}
			if($lang == 'german')
			{
				$condition['like'] = array(
					'title_ger' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_ger' => $keyUpsrch_value,
				);
			}
			if($lang == 'thai')
			{
				$condition['like'] = array(
					'title_th' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_th' => $keyUpsrch_value,
				);
			}
			if($lang == 'italian')
			{
				$condition['like'] = array(
					'title_it' => $keyUpsrch_value,
				);
			
				$condition['or_like'] = array(
					'description_it' => $keyUpsrch_value,
				);
			}

		$trans_offer = $this->QueryModel->selectData('translate_lang', $condition);
		$searched_offers = array();
		foreach($trans_offer as &$trans_offer_data)
		{
			$trans_condition = array(
				'like' => ['name' => $trans_offer_data['title']],
				'or_like' => ['details' => $trans_offer_data['description']]
			);
			$srched_offer =  $this->QueryModel->selectData('offer', $trans_condition);
			$trans_offer_data['searched_offer'] = $srched_offer;
			if (!empty($srched_offer)) {
				$searched_offers = array_merge($searched_offers, $srched_offer);
			}
		}
		// print_r($trans_offer);die;
		$offers = $searched_offers;
		}else{
			$offers = $this->QueryModel->selectData('offer', $condition);
		}

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
		$data['offers'] = $mergedArray;
        $data['state'] = $this->QueryModel->selectData('states');   
        $data['category'] = $this->QueryModel->selectData('category');
        $data['country'] = $this->QueryModel->selectData('countries');
		$html = $this->load->view("offerList",$data,true);

		$response = array(
			'status' => true,
			'html' => $html
		);     

		echo json_encode($response,JSON_UNESCAPED_UNICODE); 
		return;
	}
}
