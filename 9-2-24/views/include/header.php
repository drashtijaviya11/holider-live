<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8mb4" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> 
    <title>Holider</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="icon" href="<?= base_url('assets/img/logo.png')  ?>" type="image/x-icon">
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="<?php echo base_url() ; ?>assets\js\jquery-1.12.4.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Literata:opsz,wght@7..72,400;7..72,600;7..72,700;7..72,800;7..72,900&family=Livvic:wght@400;500;600;700&family=Lora:wght@400;600;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Literata:opsz,wght@7..72,400;7..72,600;7..72,700;7..72,800;7..72,900&family=Livvic:wght@400;500;600;700&family=Lora:wght@400;600;700&display=swap" rel="stylesheet"/> -->
<!-- /*****************************     Noty Css And Js     ******************************** */ -->
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.js"></script>
<script src="<?php echo base_url(); ?>assets/js/noty.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/noty.css" />
<!-- /*****************************   End  Noty Css And Js     ******************************** */ -->

<!-- /*****************************  Star Rating Css And Js     ******************************** */ -->
<!-- 
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
<link rel = "stylesheet" href ="<?php echo base_url(); ?>assets\css\bootstrap.min.css"/> 
<!--<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->
<!--<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  -->
<!--  Add bootstrap icon Library  -->  
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" > -->
<link rel = "stylesheet" href = "<?php echo base_url(); ?>assets\css\bootstrap-icons.css"/>
<link rel = "stylesheet" href = "<?php echo base_url(); ?>assets\css\font-awesome.min.css"/>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
<!-- /*****************************   End  Star Rating Css And Js      ******************************** */ -->
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1419132379005520');
fbq('track', 'PageView');
</script>
<noscript>
	<img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=1419132379005520&ev=PageView&noscript=1"/>
</noscript>
<!-- End Meta Pixel Code-->
<style>
    a{
		text-decoration: none !important;
	}
.country .area{
    color:#fff;
}
.search-box.active {
    z-index: 3;
}
        .sub-menu-currency{
            display: none;
            position: absolute;
            color: rgb(255, 255, 255);
            background: rgb(0 64 78);
            z-index: 9999999;
            box-shadow: 0px 0px 1px 2px rgba(0, 86, 105, 0.29);
            text-align:center;
            margin-top: 395px;
        }
        .currency_list{
            width: calc(70*var(--aspect-ratio));
            height: calc(16.5*var(--aspect-ratio));
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: calc(7*var(--aspect-ratio)) !important;
            color: #FFF;
            background: #01323D;
            border: none;
            text-decoration:none;
            margin-top: 5px;
        }
        .sub-menu{
            display: none;
            position: absolute;
            color: rgb(255, 255, 255);
            background: rgb(0 64 78);
            z-index: 9999999;
            box-shadow: 0px 0px 1px 2px rgba(0, 86, 105, 0.29);
            text-align:center;
			margin-top: 355px;
        }
        /* .language_list{
            width: calc(70*var(--aspect-ratio));
            height: calc(16.5*var(--aspect-ratio));
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: calc(7*var(--aspect-ratio)) !important;
            color: #FFF;
            background: #01323D;
            border: none;
            text-decoration:none;
            margin-top: 5px;
        } */
        .language_list {
    width: calc(54*var(--aspect-ratio));
    height: calc(16.5*var(--aspect-ratio));
    display: flex;
    /* justify-content: space-between; */
    align-items: center;
    padding: calc(7*var(--aspect-ratio)) !important;
    color: #FFF;
    background: #01323D;
    border: none;
    text-decoration: none;
    margin-top: 5px;
    text-align: left;
    /* margin-right: 6px; */
}
        .main-section {
        
        overflow-x: hidden;
    }
	.lds-ripple {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
  height: 100vh;
		width: 100%;
		position: fixed;
		z-index: 10000000;
		background-color: rgb(0 0 0 / 80%);
		display: none;
		background-size: 60px !important;
}
.lds-ripple div {
	position: absolute;
    border: 4px solid #ff9a00;
    opacity: 1;
    border-radius: 50%;
    animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    margin-top: 50vh;
    margin-left: 45%;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 0;
  }
  4.9% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 0;
  }
  5% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 72px;
    height: 72px;
    opacity: 0;
  }
}
.drop-list.active{
    height:auto !important;
}

.drop-list .balance-detail {
    height: auto !important;
    padding: 8% 4% !important;
}

.balance-detail h4 {
    margin: 0 !important;
    color: #FFF;
    align-items: center;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    word-break: break-all;
    display: flex;
    flex-direction: column;
    align-items: center;
    line-height: calc(15*var(--aspect-ratio));
    width: 100%;
}

span.cur_symbol {
    color: #FEFEFE;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(9*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
.search-box {
    position: absolute;
    z-index: 9999;
    background: rgb(0, 64, 78);
    width: 170px;
    margin-top: 15px;
}
</style>
<?php if($this->input->cookie('lang',true)  == 'hebrew'){ ?>
    <style>
        .tw-btn .term-btn{
            margin-right: calc(-98*var(--aspect-ratio));
    margin-left: unset;
        }
        .text-end {
				text-align: left!important;
                display:block !important;
		}
        .main-pay .p-head img {
            width: calc(9*var(--aspect-ratio));
            height: calc(8*var(--aspect-ratio));
            transform: rotate(0deg);
        }
        #countryDropdown{
            right:unset !important;
            left : 2% !important;
        }
        .lang_flag{
            margin-right:unset !important;
            margin-left:10% !important;
        }
        body{
            direction:rtl;
        }
        .header .logo {
 
            margin-left: unset !important;
        }
        .main-test .previous-btn{
            transform: rotate(180deg);
        }
        .country-dd{
            left: calc(4*var(--aspect-ratio));
            top: calc(42*var(--aspect-ratio));
            right:unset;
        }
        .main-section {
        
            overflow-x: hidden;
        }
        .one-offer .ti-sec {
            margin-right: calc(-100*var(--aspect-ratio));
            margin-left: unset;
        }
        .drop-list.active {
            right: calc(3*var(--aspect-ratio));
            left: unset;
        }
        .one-offer .bn-btn{
            margin-right:20% !important;
        }
        #hoursDrop{
            right:20px !important;
            left:unset !important
        }
        #minutesDrop{
            right:unset !important;
            left:unset !important
        }
        .calendar-container.active{
            right:0%;
        }
        .one-offer .ti-sec {
            margin-left: calc(-100*var(--aspect-ratio)) !important;
            margin-right: unset !important;
        }
        .hours-container {
            display: none;
            position: absolute;
            z-index: 100;
            top: 80%;
            left: 2% !important;
            right: unset !important;
            width: calc(100*var(--aspect-ratio));
            height: calc(85*var(--aspect-ratio));
            border-radius: 10px;
            background: #dff9fff8;
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.10);
            padding: 4%;
        }
		.search-box.active {
			margin-right: -169px;
		}
		.i-data img {
			width: calc(50*var(--aspect-ratio));
			height: calc(50*var(--aspect-ratio));
			border-radius: 0px 10px 10px 0px;
		}
		.vo-charge .amt-pr {
			border-radius: 10px 0px 0px 10px !important;
		}
		.vo-charge .amt {
			border-radius: 0px 10px 10px 0px;
		}
		.pay-now {
			margin-right: 25% !important;
		}
		.pay-list td {
			line-height: 16px;
			text-align: right;
			word-break: break-all;
		}
		.pay-list {
			height: calc(17*var(--aspect-ratio));
		}
    </style>

    <?php } ?>


</head>
<body>
<div class="lds-ripple" id="body-preloader"><div></div><div></div></div>
    <div class="main-section">
        <div class="header">

                <div class="drop-down">
                    <div class="menu-drop">
                        <img class="menu-icon" src="<?= base_url(); ?>assets/images/menu.png" alt="">
                    </div>
                    <div class="drop-list">
                    <?php if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('name')!='') {  ?>
						<?php if($this->session->userdata('type')=='users'){ ?>
							<a href="<?= base_url('home/profile') ?>">
								<div class="balance-detail">
									<h4> <span><?= $this->session->userdata('name'); ?></span></h4>
								</div>
							</a>
						<?php }elseif($this->session->userdata('type')=='provider'  && $this->session->userdata('subtype') !='employee'){ ?>
							<a href="<?= base_url('provider/profile') ?>">
								<div class="balance-detail">
									<h4> <span><?= $this->session->userdata('name'); ?></span></h4>
								</div>
							</a>
						<?php } elseif($this->session->userdata('type')=='affiliator'){ ?>
							<a href="<?= base_url('affiliator/profile') ?>">
								<div class="balance-detail">
                            		<h4> <span><?= $this->session->userdata('name'); ?></span></h4>
                        		</div>
							</a>
						<?php } else if($this->session->userdata('type') == 'provider' && $this->session->userdata('subtype') =='employee'){ ?>
							<a href="<?= base_url('Employee/profile') ?>">
								<div class="balance-detail">
                            		<h4> <span><?= $this->session->userdata('name'); ?></span></h4>
                        		</div>
							</a>
						<?php } ?>
	                	<?php } ?>
                        <?php if($this->session->userdata('type')== 'provider' && $this->session->userdata('subtype') !='employee') { ?>
                        <div class="balance-detail">
		
                            <h4><?= lang('balance') ?> : <span><?= get_price(systemAvilableBalance($this->session->userdata('id'))); ?></span></h4>
                        </div>
	                	<?php } ?>
                        
                        <div class="list-item">
		                <?php if($this->session->userdata('type') == 'users') { ?>
                            <button class="voucher" onclick="myVouchers()">
                                <img src="<?= base_url(); ?>assets/images/voucher-icon.png" alt="">
                                <div class="text"><?= lang('my_vouchers'); ?></div>                               
                            </button>
		                <?php } ?>
                        <?php if($this->session->userdata('type')== 'provider' && $this->session->userdata('subtype') !='employee') { ?>
                            <!-- <a class="navbar-brand" href="<?= base_url(); ?>employee"><img src="<?php echo base_url(); ?>desktop_assets/images/logo.svg" width="150px"></a> -->
                            <button class="voucher reg">
                                <!-- <i class="bi bi-plus-circle"></i> -->
                                <img src="<?= base_url();?>assets/images/emp.png" alt="">
                                <div class="text" ><a href="<?= base_url(); ?>provider/employee_list"  style="color:white;"><?= lang('employee'); ?></a></div>                               
                            </button>
                            <?php } ?>
                        <?php if($this->session->userdata('type')== 'users') { ?>
							<button class="voucher reg">
                                <!-- <i class="bi bi-plus-circle"></i> -->
                                <img src="<?= base_url();?>assets/images/add.png" alt="">
                                <div class="text" ><a href="<?= base_url('NfcController') ?>"  style="color:white;"><?= lang('register_device'); ?></a></div>                               
                            </button>
                            <?php } ?>
                            <!-- <button class="language dropdown-option"> 
                                    <div class="text drops">
                                        <?php  if($this->input->cookie('lang',true)  == 'english'){ ?><img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;English 
                                        <?php }else if($this->input->cookie('lang',true)  == 'hebrew'){  ?> <img src="<?= base_url(); ?>assets/images/Israel.gif" alt="">&nbsp;&nbsp;Hebrew 
                                        <?php }else if($this->input->cookie('lang',true)  == 'russian'){ ?> <img src="<?= base_url(); ?>assets/images/Russia.gif" alt="">&nbsp;&nbsp;Russian       
                                        <?php }else if($this->input->cookie('lang',true)  == 'german'){  ?> <img src="<?= base_url(); ?>assets/images/Germany.gif" alt="">&nbsp;&nbsp;German 
                                        <?php }else if($this->input->cookie('lang',true)  == 'french'){ ?> <img src="<?= base_url(); ?>assets/images/france.jpg" alt="">&nbsp;&nbsp;French 
                                        <?php }else if($this->input->cookie('lang',true)  == 'spanish'){  ?> <img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="">&nbsp;&nbsp;Spanish 
                                        <?php }else if($this->input->cookie('lang',true)  == 'thai'){ ?> <img src="<?= base_url(); ?>assets/images/Turkey.gif" alt=""> &nbsp;&nbsp;Thai 
                                        <?php }else if($this->input->cookie('lang',true)  == 'italian'){ ?> <img src="<?= base_url(); ?>assets/images/Italy.gif" alt="">&nbsp;&nbsp;Italian 
                                            <?php }else{ ?> <img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;English <?php } ?> 
                                        &nbsp;&nbsp;
                                    </div>
                                    <div class="sub-menu">
									<a class="text language_list" onclick="change_lang('english')" href="javascript:void(0)">
										<img src="<?= base_url() ?>assets/images/U.K..gif" alt="">
										English
									</a>
									<a class="text language_list" onclick="change_lang('hebrew')" href="javascript:void(0)">
									<img src="<?= base_url(); ?>assets/images/Israel.gif" alt="">
										Hebrew
									</a>
                                        <a class="text language_list" onclick="change_lang('russian')" href="javascript:void(0)">
										<img src="<?= base_url(); ?>assets/images/Russia.gif" alt="">
										Russian
									</a>
                                        <a class="text language_list" onclick="change_lang('german')" href="javascript:void(0)">
										<img src="<?= base_url(); ?>assets/images/Germany.gif" alt="">
										German
									</a>
                                        <a class="text language_list" onclick="change_lang('french')" href="javascript:void(0)">
										<img src="<?= base_url(); ?>assets/images/france.jpg" alt="">
										French
									</a>
                                        <a class="text language_list" onclick="change_lang('spanish')" href="javascript:void(0)">
										<img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="">
										Spanish
									</a>
                                        <a class="text language_list" onclick="change_lang('thai')" href="javascript:void(0)">
										<img src="<?= base_url(); ?>assets/images/Turkey.gif" alt="">
										Thai
									</a>
                                        <a class="text language_list" onclick="change_lang('italian')" href="javascript:void(0)">
										<img src="<?= base_url(); ?>assets/images/Italy.gif" alt="">
										Italian
									</a>
                                    </div> 
                                
                            </button> -->

                            <button class="money dropdown-Curcency">
                                <!-- <img src="<?= base_url(); ?>assets/images/dollar.png" alt=""> -->
                                <?php foreach($currency as $cur){
                                    if($this->input->cookie('currency_code',true) == $cur['code']){ ?>
                                        <span class="cur_symbol"><?= $cur['symbol'] ?></span><div class="text"><?= $cur['code'] ?></div>
                                <?php } } ?>
                                <!-- <div class="text"><?= lang('select_currency'); ?></div> -->
                                   
                                <?php if(!$this->input->cookie('currency_code',true)){ 
                                    
			$condition = array('conditions' => ['code' => 'THB' ]);
			$currencies = $this->QueryModel->selectSingleRow('currencies' ,$condition);
			?>
			<!-- <img src="<?php echo base_url(); ?>desktop_assets/images/doller_icon.png" width="10px">&nbsp;&nbsp;&nbsp; -->
			<!-- THB -->
			<span class="cur_symbol"><?= $currencies['symbol'] ?>&nbsp;&nbsp;&nbsp; <?= $currencies['code'] ?></span>
		<?php } ?>
                               
                                <div class="sub-menu-currency">
                                    <?php foreach($currency as $currency){ ?>
                                         <div class="text currency_list" onclick="change_curn('<?= $currency['code']; ?>')" ><span class="cur_symbol"><?= $currency['symbol'] ?></span><?= $currency['code'] ?></div>
                                    <?php } ?>
                                </div> 
                               
                            </button>
							<a href="<?= base_url();?>home/about">
								<button class="voucher">
									<!-- <img src="<?= base_url();?>assets/images/logout-icon.png" alt=""> -->
									<div class="text"><?= lang('about') ?></div>
								</button>
							</a>
							<a href="<?= base_url();?>home/contact_us">
								<button class="voucher">
									<!-- <img src="<?= base_url();?>assets/images/logout-icon.png" alt=""> -->
									<div class="text"><?= lang('contact_us') ?></div>
								</button>
							</a>
							<a href="<?= base_url();?>home/destination">
								<button class="voucher">   
									<!-- <img src="<?= base_url();?>assets/images/logout-icon.png" alt=""> -->
									<div class="text"><?= lang('destination') ?></div>
								</button>
							</a>
                            <?php if($this->session->userdata('logged_in')  == TRUE ){?> 
                               
                                <button class="logout"  onclick="logout()">
                                    <!-- " -->
                                        <img src="<?= base_url();?>assets/images/logout-icon.png" alt="">
                                        <div class="text"><?= lang('logout'); ?></div>
                                    </button>
                            
                                <?php } else {?>
                                    <a href="<?php echo base_url();?>login">
                                    <button class="logout"   >
                                        <!-- onclick="login()" -->
                                        
                                        <img src="<?= base_url();?>assets/images/logout-icon.png" alt="">
                                        <div class="text"><?= lang('login') ?></div>
                                    </button>
                                </a>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="logo">
                <?php if($this->session->userdata('type')=='users' || $this->session->userdata('logged_in') != TRUE ){ ?>
                    <a class="active" href="<?= base_url('offer') ?>"><img src="<?= base_url(); ?>assets/images/logo.png" alt=""></a>
                <?php }else if($this->session->userdata('type')=='admin'){ ?>
                    <a class="active" href="<?= base_url(); ?>admin"><img src="<?= base_url(); ?>assets/images/logo.png" alt=""></a>
                
                <?php }else if($this->session->userdata('type')=='provider' && $this->session->userdata('subtype')=='employee'){ ?>
                    <a class="active" href="<?= base_url(); ?>employee"><img src="<?= base_url(); ?>assets/images/logo.png" alt=""></a>
                
                
                <?php }else if($this->session->userdata('type')=='provider'){ ?>
                    <a class="active" href="<?= base_url(); ?>provider"><img src="<?= base_url(); ?>assets/images/logo.png" alt=""></a>
                
                    <?php }else if($this->session->userdata('type')=='affiliator'){ ?>
                    <a class="active" href="<?= base_url(); ?>affiliator"><img src="<?= base_url(); ?>assets/images/logo.png" alt=""></a>
                
                    <?php } ?>
                </div> 
                <?php if($this->session->userdata('type')!='provider' && $this->session->userdata('type')!='affiliator'){ ?>
	  
                <div class="search">
                    <button class="search-btn">
                        <img src="<?= base_url(); ?>assets/images/seach-img.png" alt="">
                    </button>
                    <div class="search-box">
                        <div class="search-area">
                            <img src="<?= base_url(); ?>assets/images/seach-img.png" alt="">
                            <!-- <input type="text" placeholder="Search Avtivity"> -->
							<form class="d-flex mb-0" action="<?= base_url('offer') ?>" method="GET">
								<?php $search = isset($_GET['search']) ? $_GET['search']:''; 
								if($search != ''){ ?>
								<input class="form-control me-2 search-input ps-0" id="searchOffer" name="search" type="text" value="<?= $search ?>" placeholder="<?php echo lang('search_activity')?>">
								<?php }else { ?>
									<input class="form-control me-2 search-input ps-0" id="searchOffer" name="search" type="text"  placeholder="<?php echo lang('search_activity')?>">
								<?php } ?>
							</form>
                        </div>
                    </div>
                </div> 
                <?php } ?>
                <!-- <div class="country">
                    <button class="area" onclick="toggleDropdown()">
                    <?php if($area_value = $this->input->cookie('area', true)) { 
						$area = str_replace('_', ' ', $area_value); ?>
                        <div class="text"><?= $area ?></div>
                    <?php } else { ?>
                        <div class="text"><?= lang('area_name'); ?></div>
                    <?php }?>
                        <img src="<?= base_url(); ?>assets/images/white-arrow.png" alt="">
                    </button>
                    <ul class="country-dd"  id="countryDropdown">
                        <?php  if(!empty($areas)) { ?>
                        <?php   foreach($areas as $area) { ?>
                            <li class="co-list" onclick="new_getArea('<?= $area['id']; ?>')" >
                                   <a class="c-name" href="javascript:;" ><?= $area['area']; ?></a>
                            </li>
                        <?php }}  else{ ?>
                             <li class="co-list"><a class="c-name" href="#" ><?= lang('no_country_available') ?></a></li>
                        <?php } ?>
                                                   
                    </ul>
                </div> -->
                
                <div class="country">
                    <button class="area" onclick="toggleDropdown()">
                    <?php  if($this->input->cookie('lang',true)  == 'english'){ ?><img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;English 
                                        <?php }else if($this->input->cookie('lang',true)  == 'hebrew'){  ?> <img src="<?= base_url(); ?>assets/images/Israel.gif" alt="">&nbsp;&nbsp;Hebrew 
                                        <?php }else if($this->input->cookie('lang',true)  == 'russian'){ ?> <img src="<?= base_url(); ?>assets/images/Russia.gif" alt="">&nbsp;&nbsp;Russian       
                                        <?php }else if($this->input->cookie('lang',true)  == 'german'){  ?> <img src="<?= base_url(); ?>assets/images/Germany.gif" alt="">&nbsp;&nbsp;German 
                                        <?php }else if($this->input->cookie('lang',true)  == 'french'){ ?> <img src="<?= base_url(); ?>assets/images/france.gif" alt="">&nbsp;&nbsp;French 
                                        <?php }else if($this->input->cookie('lang',true)  == 'spanish'){  ?> <img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="">&nbsp;&nbsp;Spanish 
                                        <?php }else if($this->input->cookie('lang',true)  == 'thai'){ ?> <img src="<?= base_url(); ?>assets/images/Turkey.gif" alt=""> &nbsp;&nbsp;Thai 
                                        <?php }else if($this->input->cookie('lang',true)  == 'italian'){ ?> <img src="<?= base_url(); ?>assets/images/Italy.gif" alt="">&nbsp;&nbsp;Italian 
                                            <?php }else{ ?> <img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;English <?php } ?> 
                        <img src="<?= base_url(); ?>assets/images/white-arrow.png" alt="">
                    </button>
                    <ul class="country-dd"  id="countryDropdown" style="    width: auto;top: 8%;right:2%">
                    <a class="text language_list"  href="javascript:void(0)" data-language="english">
										<img class="lang_flag" src="<?= base_url() ?>assets/images/U.K..gif" alt="" style="width:20px;margin-right: 10%;">
										English
									</a>
									<a class="text language_list" href="javascript:void(0)" data-language="hebrew">
									<img class="lang_flag" src="<?= base_url(); ?>assets/images/Israel.gif" alt="" style="width:20px;margin-right: 10%;">
										Hebrew
									</a>
                                        <a class="text language_list" data-language="russian"  href="javascript:void(0)" >
										<img class="lang_flag" src="<?= base_url(); ?>assets/images/Russia.gif" alt="" style="width:20px;margin-right: 10%;">
										Russian
									</a>
                                        <a class="text language_list" data-language="german"  href="javascript:void(0)" >
										<img class="lang_flag" src="<?= base_url(); ?>assets/images/Germany.gif" alt="" style="width:20px;margin-right: 10%;">
										German
									</a>
                                        <a class="text language_list" data-language="french" href="javascript:void(0)" >
										<img class="lang_flag" src="<?= base_url(); ?>assets/images/france.gif" alt="" style="width:20px;margin-right: 10%;">
										French
									</a>
                                        <a class="text language_list" data-language="spanish" href="javascript:void(0)" >
										<img class="lang_flag" src="<?= base_url(); ?>assets/images/spain-flag.png" alt="" style="width:20px;margin-right: 10%;">
										Spanish
									</a>
                                        <a class="text language_list" data-language="thai" href="javascript:void(0)" >
										<img class="lang_flag" src="<?= base_url(); ?>assets/images/Turkey.gif" alt="" style="width:20px;margin-right: 10%;">
										Thai
									</a>
                                        <a class="text language_list" data-language="italian"  href="javascript:void(0)" >
										<img class="lang_flag" src="<?= base_url(); ?>assets/images/Italy.gif" alt="" style="width:20px;margin-right: 10%;">
										Italian
									</a>
                                                   
                    </ul>
                </div>
        </div>

        <?php $showModal = $this->session->userdata('show_modal');
        if ($this->session->userdata('logged_in')  == TRUE) { ?>
		<?php 		
		    $this->load->model('QueryModel');
			$id = $this->session->userdata('id');
			$condition = array('conditions' => ['id' => $id]);
			$userDetail = $this->QueryModel->selectSingleRow('users',$condition);
			if($userDetail['name'] == ''){
		?>
                <div class="modal" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="signupForm" >
                                     <div class="container loginContainer">
                                        <div class="">
                                            <input type="hidden" class="" id="wh_us_id" name="id" value="<?= $this->session->userdata('whatsapp_user_id') ?>">
                                            <label for="lastname" class="form-label"><?= lang('enter_your_name'); ?></label>
                                            <input type="text" class="form-control field1" id="name" name="name" placeholder="<?= lang('enter_name') ?>" >
                                        </div>
                                    </div>
                                    <div class="container" style="margin-top: 15px;">
                                    <div class="">
									<button type="button" id="save" class="btn btn-primary"><?= lang('save'); ?></button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php $this->session->unset_userdata(array('show_modal', 'whatsapp_user_id'));return; } }  ?>
<script>
            var l_lang;
  if (navigator.userLanguage) // Explorer
    l_lang = navigator.userLanguage;
  else if (navigator.language) // FF
    l_lang = navigator.language;
  else
    l_lang = "en";

var langValue = (l_lang.split('-')[0]);
if (langValue === 'en') {
    var lang = 'english';
} else if (langValue === 'he') {
    var lang = 'hebrew';
} else if (langValue === 'ru') {
    var lang = 'russian';
} else if (langValue === 'de') {
    var lang = 'german';
} else if (langValue === 'fr') {
    var lang = 'french';
} else if (langValue === 'es') {
    var lang = 'spanish';
} else if (langValue === 'th') {
    var lang = 'thai';
} else if (langValue === 'it') {
    var lang = 'italian';
} else {
    var lang = 'english';
}
// change_lang(lang);
</script>


<script>
	// Get the current URL
var currentUrl = window.location.href;

// Check if the URL ends with a slash before a query string
if (currentUrl.match(/\/\?/)) {
    // Remove the trailing slash
    var updatedUrl = currentUrl.replace(/\/\?/, '?');
    
    // Update the URL without the trailing slash
    window.history.replaceState({}, document.title, updatedUrl);
}
$(document).ready(function(){
        $(document).on('click','.language_list',function(e){
          e.preventDefault();
          var lang = $( this).data('language')
          $.ajax({
                url : "<?= base_url('dashboard/change_language') ?>",
                data : {lang : lang},
                type : "POST",
                dataType : "json",
                success : function(res)
                {
                    if(res.status == true)
                    {
                        window.location.reload();
                    }
                }
            });
        })
    })
</script>