<?php
// $countryCode = $this->input->cookie('country',true);
// $condition = array('conditions' => ['name' => $countryCode]);
// $country = $this->QueryModel->selectData('countries',$condition);
// if($country)
// {
//     // set_cookie("country",$country, time() + (24 * 60 * 60));
//     $cond = array('conditions' => ['country_id' => $country[0]['id']]);
//     $header_data['area'] = $this->QueryModel->selectData('states',$cond);
//     $header_data['countryCode'] = $this->input->cookie('country',true);   
//     $stateName = $this->input->cookie('state',true);
//     if($stateName)
//     {
//         $header_data['stateCode'] = $stateName;
//     } else
//     {
//         setcookie("state", "", time() - 3600, "/");
//     }
// }else{
//     $header_data['area'] = $this->QueryModel->selectData('countries');
// }
// $header_data['stateCode'] = $this->input->cookie('state',true); 
// $header_data['countryCode'] = $this->input->cookie('country',true); 
$header_data['currency'] = $this->QueryModel->selectData('currencies');
$header_data['areas'] = $this->QueryModel->selectData('area');
$this->load->view('desktop/include/header',$header_data);
$this->load->view($content);
$this->load->view('desktop/include/footer');