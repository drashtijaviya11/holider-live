<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Endroid\QrCode\QrCode;
class QrCodeController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // $this->load->model('QueryModel');
        // $this->load->helper('cookie');  
        $this->load->library('Ciqrcode');
    }
    public function index()
    {   delete_cookie('state');
        delete_cookie('country');
        $r = $this->db->query('SELECT offer_id, AVG(rate) as average_rate FROM offer_rating GROUP BY offer_id')->result_array();
        $country = $this->input->cookie('country', true);
        $state = $this->input->cookie('state', true);
    
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

        $data['offers'] = $mergedArray;
        $data['category'] = $this->QueryModel->selectData('category');
        $data['content'] = 'offer_testing';
        $this->load->view("template/template", $data);
    }
    
	public function generate_QRCode($data = null) {
        $this->load->library('ciqrcode');
        $params['data'] = 'This is a text to encode become QR Code';
        $params['level'] = 'H';
        $params['size'] = 10;
    $upload_folder = FCPATH . 'upload/';

    // Check if the upload folder exists, create it if not
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder, 0777, true);
    }

    // Set the file name for the saved QR code image
    $file_name = 'tes.png';

    // Set the full path for the saved QR code image
    $file_path = $upload_folder . $file_name;

    $params['savename'] = $file_path;

    $this->ciqrcode->generate($params);

    // Output the image in the browser
     return $file_path;

    }
    public function nfc() {
        $this->load->view("nfc");
    }
}
