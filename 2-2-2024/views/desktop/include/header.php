<html>
  <head>
    <title>Desktop Holider</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8"> 
   
    <meta http-equiv="Content-Type" content="text/html; charset=utf8mb4" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> 
	<link href="<?php echo base_url(); ?>desktop_assets/css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    
	<!--<link href="https://fonts.googleapis.com/css2?family=Comforter&family=Inter&family=Marcellus&family=MuseoModerno:ital@1&family=Noto+Sans+Georgian&family=Nunito&family=Open+Sans&family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Inter&family=Marcellus&family=Mulish&family=MuseoModerno:ital@0;1&family=Noto+Sans+Georgian&family=Nunito&family=Nunito+Sans:opsz@6..12&family=Open+Sans&family=Playfair+Display&family=Raleway&family=Readex+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Inter&family=Marcellus&family=Mulish&family=MuseoModerno:ital@1&family=Noto+Sans+Georgian&family=Nunito&family=Nunito+Sans:opsz@6..12&family=Open+Sans&family=Playfair+Display&family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Inter&family=Marcellus&family=Mulish&family=MuseoModerno:ital@1&family=Noto+Sans+Georgian&family=Nunito&family=Nunito+Sans:opsz@6..12&family=Open+Sans&family=Playfair+Display&family=Raleway&family=Readex+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Inter&family=Literata:opsz@7..72&family=Livvic&family=Lora&family=Marcellus&family=Mulish&family=MuseoModerno:ital@0;1&family=Noto+Sans+Georgian&family=Nunito&family=Nunito+Sans:opsz@6..12&family=Open+Sans&family=Playfair+Display&family=Raleway&family=Readex+Pro&display=swap" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css2?family=Comforter&family=Inter&family=Literata:opsz@7..72&family=Livvic&family=Lora&family=Marcellus&family=Mulish&family=MuseoModerno:ital@0;1&family=Noto+Sans+Georgian&family=Nunito&family=Nunito+Sans:opsz@6..12&family=Open+Sans&family=Playfair+Display&family=Raleway&family=Readex+Pro&family=Rubik&display=swap" rel="stylesheet">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="<?php echo base_url(); ?>assets\css\bootstrap.min.css" rel="stylesheet"/> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets\js\bootstrap.bundle.min.js"></script>
           <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
	<!--	<script src="<?php echo base_url(); ?>assets\js\jquery-3.6.4.min.js"></script>-->
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.noty.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/noty.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/noty.css" />
<style>
	a{
		text-decoration: none !important;
	}
	.half_star_css{
		height:22px;
		width:22px;
	}
	.lang_dropdown img,.language_list img {
		width: 16px;
    	height: 10px;
	}
	.sub-menu{
		display: none;
		position: absolute;
		color: rgb(255, 255, 255);
		background: rgb(0 64 78);
		z-index: 9999999;
		box-shadow: 0px 0px 1px 2px rgba(0, 86, 105, 0.29);
		text-align:center;
		margin-top: 0px;
		width: 120px;
	}
	.language_list{
		width: calc(70*var(--aspect-ratio));
		height: calc(16.5*var(--aspect-ratio));
		display: block;
		/* / justify-content: space-between; / */
		align-items: center;
		padding: calc(7*var(--aspect-ratio)) !important;
		color: #FFF;
		background: #01323D;
		border: none;
		text-decoration: none;
		margin-top: 5px;
		text-align: center;
	}
	/* .curen{
		display: flex;
	} */
	.sub-menu-currency{
		display: none; 
		width:120px;
		position: absolute;
		color: rgb(255, 255, 255);
		background: rgb(0 64 78);
		z-index: 9999999;
		box-shadow: 0px 0px 1px 2px rgba(0, 86, 105, 0.29);
		text-align:center;
		margin-top: 0px;
	}
	
	.currency_list {
    width: calc(70*var(--aspect-ratio));
    height: calc(16.5*var(--aspect-ratio));
    display: block;
    justify-content: space-between;
    align-items: center;
    padding: calc(7*var(--aspect-ratio)) !important;
    color: #FFF;
    background: #01323D;
    border: none;
    text-decoration: none;
    margin-top: 5px;
    text-align: center;
	cursor: pointer;
}
	.area_drop{
		min-height: auto;
		max-height: 200px;
		overflow: scroll;
		overflow-x: hidden;
        }
		::-webkit-scrollbar {
			width: 5px;
	}

	::-webkit-scrollbar-track {
			background: transparent;
	}

	::-webkit-scrollbar-thumb {
			background-color: black;
			border-radius: 20px;
			border: 3px solid #ced4da;
	}
	/* #body-preloader {
		background: url('https://holider.com/demo/desktop_assets/images/spinner.gif') no-repeat center center;
		height: 100vh;
		width: 100%;
		position: fixed;
		z-index: 10000000;
		background-color: rgba(0, 0, 0, 0.8);
		display: none;
		background-size: 60px !important;
	} */
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

	body::-webkit-scrollbar {
		width: 5px; /* Width of the entire scrollbar */
	}

	body::-webkit-scrollbar-track {
		background: transparent; /* Transparent background of the tracking area */
	}

	body::-webkit-scrollbar-thumb {
		background-color: transparent; /* Transparent color of the scroll thumb */
		border-radius: 20px; /* Roundness of the scroll thumb */
		border: 3px solid #ced4da;; /* Transparent border to create padding around scroll thumb */
	}
	.dropItem{
		height: auto;
	}
	</style>
	<?php if($this->input->cookie('lang',true)  == 'hebrew'){ ?>
    <style>
		#email_login_modal{
			left:unset !important;
			right:22%;
		}
		.text-end {
				text-align: left!important;
		}
.f-Moderno{
	margin-right: unset;
	margin-left:10px;
}
	
		a.dropdown-item.text-white {
			display: flex !important;
		}
		.ps-7 {
			padding-right: 7rem !important;
			padding-left : unset !important;
		}
		.dropdown-menu[data-bs-popper] {
			/* width: 150%; */
			top: 110% !important;
			left: -20px !important;
			margin-top: var(--bs-dropdown-spacer);
		}
        body{
            direction:rtl !important;
        }
		.date-text {
			border: 1px solid #025769 !important;
			border-radius: 0px 7px 7px 0px !important;
			border-left: 0 !important;
			/* border-right: unset !important; */
		}
		.date-img {
			background-color: white;
			padding: 6px;
			border: 1px solid #025769 !important;
			border-radius: 7px 0px 0px 7px !important;
			border-right: 0;
			/* border-left : unset; */
		}
		.calendar-container.active {
    	    left: 2% !important;
			right : unset !important;
		}
		header .calendar-navigation{
			direction:ltr !important;
		}
		.hours-container{
			left: 2% !important;
			right : unset !important;
		}
		</style>
		<?php } ?>
  </head>
  <body>
  <!-- <div id="body-preloader" style="display:block;"></div> -->
  <div class="lds-ripple" id="body-preloader"><div></div><div></div></div>
  <!-- <div class="lds-roller" id="body-preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div> -->
   <section>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
  <div class="container">
  <?php if($this->session->userdata('type')=='users' || $this->session->userdata('logged_in') != TRUE){ ?>
	<a class="navbar-brand" href="<?= base_url('home') ?>"><img src="<?php echo base_url(); ?>desktop_assets/images/logo.svg" width="150px"></a>
  <?php }else if($this->session->userdata('type')=='admin'){ ?>
	<a class="navbar-brand" href="<?= base_url(); ?>admin"><img src="<?php echo base_url(); ?>desktop_assets/images/logo.svg" width="150px"></a>           
	<?php }else if($this->session->userdata('type')=='provider' && $this->session->userdata('subtype')=='employee'){ ?>
		<a class="navbar-brand" href="<?= base_url(); ?>employee"><img src="<?php echo base_url(); ?>desktop_assets/images/logo.svg" width="150px"></a>

	
	
	<?php }else if($this->session->userdata('type')=='provider'){ ?>
		<a class="navbar-brand" href="<?= base_url(); ?>provider"><img src="<?php echo base_url(); ?>desktop_assets/images/logo.svg" width="150px"></a>

		<?php }else if($this->session->userdata('type')=='affiliator'){ ?>
		<a class="navbar-brand" href="<?= base_url(); ?>affiliator"><img src="<?php echo base_url(); ?>desktop_assets/images/logo.svg" width="150px"></a>

	
		<?php } ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav mx-auto fw-bold fs-5">
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="<?php echo base_url(); ?>home"><?php echo lang('home')?></a>
        </li>
		<?php if($this->session->userdata('type')=='provider' && $this->session->userdata('subtype')!='employee'){ ?>
		<li class="nav-item px-2">
          <a class="nav-link text-white" href="<?= base_url(); ?>provider/employee_list">
		  <!-- <img src="<?php echo base_url(); ?>desktop_assets/images/emp.png" width="15px">
			&nbsp;&nbsp;&nbsp;   -->
		  <?php echo lang('employee')?></a>
        </li>
		<?php } ?>
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="<?php echo base_url(); ?>home/destination"><?php echo lang('destination')?></a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="<?php echo base_url(); ?>home/about"><?php echo lang('about')?></a> 
        </li>
		<li class="nav-item px-2"> 
          <a class="nav-link text-white" href="<?php echo base_url(); ?>home/faq"><?php echo lang('faq')?></a> 
        </li>
		<li class="nav-item px-2">
          <a class="nav-link text-white" href="<?php echo base_url(); ?>home/contact_us"><?php echo lang('contact')?></a> 
        </li>
      </ul>
	  <div class="d-flex">
	  <?php if($this->session->userdata('type')!='provider' && $this->session->userdata('type')!='affiliator'){ ?>
	  	<div class="dropdown f-poppins">
				<button type="button" class="btn dropdown-toggle arrow fw-bold searchBtn" data-bs-toggle="dropdown">
				<a href="javascript:void(0);">
					<img src="<?php echo base_url(); ?>desktop_assets/images/search_icon.png" width="38px">
				</a>
				</button>
                <div class="dropdown-menu searchDrop btn-bg rounded-0 fs-14 py-2 drop-search">
				  <div class="d-flex align-items-center">
					<button class="btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-white" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
							</svg>
					</button>
				  <input class="form-control me-2 search-input ps-0" id="search_offer" name="search" type="text"  placeholder="<?= lang('search_activity')?>">
                    <!-- <form class="d-flex mb-0" action="<?= base_url('offer') ?>" method="GET">
					  <?php $search = isset($_GET['search']) ? $_GET['search']:''; 
					  if($search != ''){ ?>
                      <input class="form-control me-2 search-input ps-0" name="search" type="text" value="<?= $search ?>" placeholder="<?php echo lang('search_activity')?>">
						<?php }else { ?>
							<input class="form-control me-2 search-input ps-0" id="search_offer" name="search" type="text"  placeholder="<?php echo lang('search_activity')?>">
						<?php } ?>
					</form> -->
                  </div>
			</div>
        </div>
		<?php } ?>
	  <div class="dropdown f-poppins">
    <button type="button" class="btn dropdown-toggle arrow fw-bold" data-bs-toggle="dropdown" data-bs-auto-close="outside">
      <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>desktop_assets/images/user_icon.png" width="38px"></a>
    </button>
    <ul class="dropdown-menu user-dropdown-menu btn-bg rounded-0 fs-14 py-0 media-drop dropItem">	 
	<?php if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('name')!='') {  ?>
		<?php if($this->session->userdata('type')=='users'){ ?>
		<a href="<?= base_url('home/profile') ?>">
			<li class="text-center"><h5 class="dropdown-header text-white"><span class="opacity-75"></span><span class="f-Moderno text-white fw-bold"><?= $this->session->userdata('name'); ?></span></h5></li>
			<hr class="my-0">
		</a>
		<?php }elseif($this->session->userdata('type')=='provider'  && $this->session->userdata('subtype') !='employee'){ ?>
		<a href="<?= base_url('provider/profile') ?>">
			<li class="text-center"><h5 class="dropdown-header text-white"><span class="opacity-75"></span><span class="f-Moderno text-white fw-bold"><?= $this->session->userdata('name'); ?></span></h5></li>
			<hr class="my-0">
		</a>
		<?php } elseif($this->session->userdata('type')=='affiliator'){ ?>
		<a href="<?= base_url('affiliator/profile') ?>">
			<li class="text-center"><h5 class="dropdown-header text-white"><span class="opacity-75"></span><span class="f-Moderno text-white fw-bold"><?= $this->session->userdata('name'); ?></span></h5></li>
			<hr class="my-0">
		</a>
		<?php } else if($this->session->userdata('type') == 'provider' && $this->session->userdata('subtype') =='employee'){ ?>
			<a href="<?= base_url('Employee/profile') ?>">
			<li class="text-center"><h5 class="dropdown-header text-white"><span class="opacity-75"></span><span class="f-Moderno text-white fw-bold"><?= $this->session->userdata('name'); ?></span></h5></li>
			<hr class="my-0">
			</a>
		<?php } ?>
	<?php } ?>
	<?php if($this->session->userdata('type')== 'provider' && $this->session->userdata('subtype') !='employee') { ?>
	  <li class="text-center"><h5 class="dropdown-header text-white"><span class="opacity-75"><?php echo lang('balance')?>:</span> &nbsp;<span class="f-Moderno text-white fw-bold"><?= get_price(systemAvilableBalance($this->session->userdata('id'))); ?></span></h5></li>
      <hr class="my-0">
	<?php } ?>
	<?php if($this->session->userdata('type') == 'users') { ?>
	  <li><a class="dropdown-item text-white" href="javascript:void(0);" onclick="myVouchers()"><img src="<?php echo base_url(); ?>desktop_assets/images/voucher_icon.png" width="20px">&nbsp;&nbsp;&nbsp; <?= lang('my_vouchers'); ?> </a></li>
	  <hr class="my-0">
	<?php } ?>
	
	<?php if($this->session->userdata('type')== 'users') { ?> 

	  <li><a class="dropdown-item text-white" href="<?= base_url('NfcController') ?>" ><img src="<?= base_url();?>assets/images/add.png" alt="" width="20px">&nbsp;&nbsp;&nbsp; <?= lang('register_device'); ?> </a></li>
      <hr class="my-0">
	<?php }?>
	<!-- <li class="lang_dropdown">
		<a class="dropdown-item text-white" href="javascript:void(0);">&nbsp;&nbsp;&nbsp; 
		<?php  if($this->input->cookie('lang',true)  == 'english'){ ?><img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;&nbsp;English 
			<?php }else if($this->input->cookie('lang',true)  == 'hebrew'){  ?> <img src="<?= base_url(); ?>assets/images/Israel.gif" alt="">&nbsp;&nbsp;&nbsp;&nbsp;Hebrew 
			<?php }else if($this->input->cookie('lang',true)  == 'russian'){ ?> <img src="<?= base_url(); ?>assets/images/Russia.gif" alt="">&nbsp;&nbsp;&nbsp;Russian       
			<?php }else if($this->input->cookie('lang',true)  == 'german'){  ?> <img src="<?= base_url(); ?>assets/images/Germany.gif" alt="">&nbsp;&nbsp;&nbsp;German 
			<?php }else if($this->input->cookie('lang',true)  == 'french'){ ?> <img src="<?= base_url(); ?>assets/images/france.jpg" alt="">&nbsp;&nbsp;&nbsp;French 
			<?php }else if($this->input->cookie('lang',true)  == 'spanish'){  ?> <img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="">&nbsp;&nbsp;&nbsp;Spanish 
			<?php }else if($this->input->cookie('lang',true)  == 'thai'){ ?> <img src="<?= base_url(); ?>assets/images/Turkey.gif" alt="">&nbsp;&nbsp;&nbsp;Thai 
			<?php }else if($this->input->cookie('lang',true)  == 'italian'){ ?> <img src="<?= base_url(); ?>assets/images/Italy.gif" alt="">&nbsp;&nbsp;&nbsp;Italian 
				<?php }else{ ?> <img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;English <?php } ?> 
			&nbsp;&nbsp;
		</a>
		<div class="sub-menu">
		</div>
			<div class="sub-menu">
				<a class="text language_list" onclick="change_lang('english')" href="javascript:void(0)">
					<img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;
					English
				</a>
				<a class="text language_list" onclick="change_lang('hebrew')" href="javascript:void(0)">
				<img src="<?= base_url(); ?>assets/images/Israel.gif" alt="">&nbsp;&nbsp;
					Hebrew
				</a>
					<a class="text language_list" onclick="change_lang('russian')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Russia.gif" alt="">&nbsp;&nbsp;
					Russian
				</a>
					<a class="text language_list" onclick="change_lang('german')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Germany.gif" alt="">&nbsp;&nbsp;
					German
				</a>
					<a class="text language_list" onclick="change_lang('french')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/france.jpg" alt="">&nbsp;&nbsp;
					French
				</a>
					<a class="text language_list" onclick="change_lang('spanish')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="">&nbsp;&nbsp;
					Spanish
				</a>
					<a class="text language_list" onclick="change_lang('thai')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Turkey.gif" alt="">&nbsp;&nbsp;
					Thai
				</a>
					<a class="text language_list" onclick="change_lang('italian')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Italy.gif" alt="">&nbsp;&nbsp;
					Italian
				</a>
			</div> 
	</li> -->
    <hr class="my-0">
	<li class="dropdown-Curcency">
	<a class="dropdown-item text-white curen" href="javascript:void(0);">
		<?php
		$currencyCode = false; // Initialize $currencyCode outside the loop
		foreach ($currency as $cur) {
			if ($this->input->cookie('currency_code', true) == $cur['code']) {
				$currencyCode = true;
				?>
				<span class="cur_symbol"><?= $cur['symbol'] ?>&nbsp;&nbsp;&nbsp; <?= $cur['code'] ?></span>
			<?php } ?>
		<?php } ?>
		<?php if (!$currencyCode) { 
			$condition = array('conditions' => ['code' => 'THB' ]);
			$currencies = $this->QueryModel->selectSingleRow('currencies' ,$condition);
			?>
			<!-- <img src="<?php echo base_url(); ?>desktop_assets/images/doller_icon.png" width="10px">&nbsp;&nbsp;&nbsp; -->
			<!-- THB -->
			<span class="cur_symbol"><?= $currencies['symbol'] ?>&nbsp;&nbsp;&nbsp; <?= $currencies['code'] ?></span>
		<?php } ?>
	</a>
		<div class="sub-menu-currency">
				<?php foreach($currency as $currency){ ?>
					<div class="text currency_list" onclick="change_curn('<?= $currency['code']; ?>')" > <span class="cur_symbol"><?= $currency['symbol'] ?> &nbsp;&nbsp;&nbsp;<?=  $currency['code'] ?></div>
				<?php } ?>
			</div> 
	</li> 
	<hr class="my-0">
	<li>
	<?php if($this->session->userdata('logged_in')  == TRUE ){?> 
		<a class="dropdown-item text-white" href="javascript:void(0);" onclick="logout()">
			<img src="<?php echo base_url(); ?>desktop_assets/images/logout_icon.png" width="15px">
			&nbsp;&nbsp;&nbsp; <?php echo lang('logout')?>
		</a>
	<?php } else {?>
		<a class="dropdown-item text-white" href="<?php echo base_url()?>login">
			<img src="<?php echo base_url(); ?>desktop_assets/images/logout_icon.png" width="15px">
			&nbsp;&nbsp;&nbsp; <?php echo lang('login')?>
		</a>
	<?php } ?>
	</li>
    </ul>
  </div>
  &nbsp;&nbsp;
  <!-- <div class="dropdown f-poppins py-2">
    <button type="button" class="btn btn-bg dropdown-toggle fw-bold rounded-0" data-bs-toggle="dropdown">
	<?php
		if ($area_value = $this->input->cookie('area', true)) {
			$area = str_replace('_', ' ', $area_value);
			echo $area;
		}else{ 
			echo lang('area_name');
	 } ?>
    </button>
    <ul class="dropdown-menu area_drop btn-bg rounded-0 fs-14 py-0">
	<?php  if(!empty($areas)) { ?>
		<?php foreach($areas as $areaName) { ?>
      	<li onclick="new_getArea('<?= $areaName['id']; ?>')">
		  <a class="dropdown-item text-white" href="javascript:void(0);">
			<?= $areaName['area']; ?>
		  </a>
		</li>
		<?php }}  else{ ?>
			<li class="co-list"><a class="c-name" href="#" ><?= lang('no_country_available') ?></a></li>
		<?php } ?>
	<hr class="my-0">
    </ul>
  </div> -->

   <div class="dropdown f-poppins py-2">
    <button type="button" class="btn btn-bg dropdown-toggle fw-bold rounded-0" data-bs-toggle="dropdown">
	<?php  if($this->input->cookie('lang',true)  == 'english'){ ?><img src="<?= base_url() ?>assets/images/U.K..gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;English 
			<?php }else if($this->input->cookie('lang',true)  == 'hebrew'){  ?> <img src="<?= base_url(); ?>assets/images/Israel.gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;Hebrew 
			<?php }else if($this->input->cookie('lang',true)  == 'russian'){ ?> <img src="<?= base_url(); ?>assets/images/Russia.gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;Russian       
			<?php }else if($this->input->cookie('lang',true)  == 'german'){  ?> <img src="<?= base_url(); ?>assets/images/Germany.gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;German 
			<?php }else if($this->input->cookie('lang',true)  == 'french'){ ?> <img src="<?= base_url(); ?>assets/images/france.jpg" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;French 
			<?php }else if($this->input->cookie('lang',true)  == 'spanish'){  ?> <img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;Spanish 
			<?php }else if($this->input->cookie('lang',true)  == 'thai'){ ?> <img src="<?= base_url(); ?>assets/images/Turkey.gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;Thai 
			<?php }else if($this->input->cookie('lang',true)  == 'italian'){ ?> <img src="<?= base_url(); ?>assets/images/Italy.gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;&nbsp;Italian 
				<?php }else{ ?> <img src="<?= base_url() ?>assets/images/U.K..gif" alt="" style="width: 20px;height: 16px;">&nbsp;&nbsp;English <?php } ?> 
    </button>
    <ul class="dropdown-menu area_drop btn-bg rounded-0 fs-14 py-0">
		<!-- <li onclick="new_getArea('<?= $areaName['id']; ?>')">
		  <a class="dropdown-item text-white" href="javascript:void(0);">
			<?= $areaName['area']; ?>
		  </a>
		</li> -->
		<a class="text language_list" onclick="change_lang('english')" href="javascript:void(0)">
					<img src="<?= base_url() ?>assets/images/U.K..gif" alt="">&nbsp;&nbsp;
					English
				</a>
				<a class="text language_list" onclick="change_lang('hebrew')" href="javascript:void(0)">
				<img src="<?= base_url(); ?>assets/images/Israel.gif" alt="">&nbsp;&nbsp;
					Hebrew
				</a>
					<a class="text language_list" onclick="change_lang('russian')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Russia.gif" alt="">&nbsp;&nbsp;
					Russian
				</a>
					<a class="text language_list" onclick="change_lang('german')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Germany.gif" alt="">&nbsp;&nbsp;
					German
				</a>
					<a class="text language_list" onclick="change_lang('french')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/france.jpg" alt="">&nbsp;&nbsp;
					French
				</a>
					<a class="text language_list" onclick="change_lang('spanish')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/spain-flag.png" alt="">&nbsp;&nbsp;
					Spanish
				</a>
					<a class="text language_list" onclick="change_lang('thai')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Turkey.gif" alt="">&nbsp;&nbsp;
					Thai
				</a>
					<a class="text language_list" onclick="change_lang('italian')" href="javascript:void(0)">
					<img src="<?= base_url(); ?>assets/images/Italy.gif" alt="">&nbsp;&nbsp;
					Italian
				</a>
		
	<hr class="my-0">
    </ul>
  </div> 
  </div>
    </div>
  </div>
</nav>
<?php 
function get_string($string){
	$lang = array();
	$lang['Home'] = 'Home';
	$lang['Destination'] = 'Destination';
	$lang['About'] = 'About';
	$lang['Faq'] = 'Faq';
	$lang['Contact'] = 'Contact';
	$lang['Afghanistan'] = 'Afghanistan';
	$lang['Aland_Islands'] = 'Aland Islands';
	$lang['India'] = 'India';
	$lang['Bangladesh'] = 'Bangladesh';
	$lang['Australia'] = 'Australia';
	$lang['Spain'] = 'Spain';
	$lang['China'] = 'China';
	$lang['Italy'] = 'Italy';
	$lang['Belgium'] = 'Belgium';
	$lang['Dutch'] = 'Dutch';
	$lang['Area_Name'] = 'Area Name';
	$lang['Currency'] = 'Currency';
	$lang['Log_Out'] = 'Log Out';
	$lang['Balance'] = 'Balance';
	$lang['currency_sign'] = '$';
	$lang['Lets_Make_Your'] = "Let's Make Your";
	$lang['Best_Trip_Ever'] = "Best Trip Ever";
	$lang['Plan_and_book_your_perfect'] = "Plan and book your perfect trip with expert advice, travel tips, destination information and inspiration from us.";
	$lang['Book_Now'] = "Book Now";
	$lang['We_travel_the_world'] = "We travel the world, and tell you how it looks!";
	$lang['Proin_gravida_nibh_vel_velit'] = "Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis 
		   bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
		   Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi";
	$lang['Special_Offers'] = "Special Offers";
	$lang['Know_More'] = "Know More";
	$lang['Redeem'] = "Redeem";
	$lang['hours'] = "hours";
	$lang['Welcome_Back!'] = "Welcome Back!";
	$lang['Privacy_Policy'] = "Privacy Policy";
	$lang['Terms_&_Condition'] = "Terms & Condition";
	$lang['You_are_not_logged_In'] = "You are not logged In";
	$lang['Login_with_Whatsapp'] = "Login with Whatsapp";
	$lang['Send_the_word_Login_to'] = 'Send the word "Login" to';
	$lang['number_123456'] = 'number "123456"';
	$lang['I_Got_Code'] = 'I Got Code';
	$lang['OR'] = 'OR';
	$lang['Categories'] = "Categories";
	$lang['buy_now'] = "Buy Now";
	$lang['Minimum'] = "Minimum";
	$lang['Maximum'] = "Maximum";
	$lang['Child'] = "Child";
	$lang['Adult'] = "Adult";
	$lang['Free_Refund'] = "Free Refund";
	$lang['Pickup_Offered'] = "Pickup Offered";
	$lang['approx'] = "approx";
	$lang['Offer_Details'] = "Offer Details";
	$lang['Payment'] = "Payment";
	$lang['Credit_Card'] = "Credit Card";
	$lang['Pay_Pal'] = "Pay Pal";
	$lang['Currency_Charge'] = "Currency Charge";
	$lang['currency_name'] = "USD";
	$lang['Amount'] =   "Amount";
	$lang['Card_Number'] = "Card Number";
	$lang['Card_CVC'] = "Card CVC";
	$lang['MM/YY'] = "MM/YY";
	$lang['Save_Card_Detail'] = "Save Card Detail";
	$lang['Pay_Now'] = "Pay Now";
	$lang['My_Voucher'] = "My Voucher";
	$lang['Future_Order'] = "Future Order";
	$lang['Used_Order'] = "Used Order";
	return $lang[$string];
}?>
</header>
</section>



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
							<form id="signupForm">
								<div class="container loginContainer">
									<div class="">
										<input type="hidden" class="" id="wh_us_id" name="id" value="<?= $this->session->userdata('whatsapp_user_id') ?>">
										<label for="lastname" class="form-label"><?= lang('enter_your_name'); ?></label>
										<input type="text" class="form-control field1" id="name" name="name" placeholder="<?= lang('enter_name') ?>">
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
        <?php $this->session->unset_userdata(array('show_modal', 'whatsapp_user_id'));return; }  } ?>
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
            </script>

