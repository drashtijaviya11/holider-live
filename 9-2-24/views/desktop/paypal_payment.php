<?php include("header.php");?>
<section id="credit-bg">
  <div class="container">
    <div class="row pt-5">
	  <div class="col-md-2"></div>
	  <div class="col-md-10">
        <img src="assets/images/left_arrow_icon.png" class="left-arrow-img">
		<span class="f-poppins fw-600 fs-50 text-white pay-text"><?php echo get_string('Payment')?></span>
      </div>
    </div>
	<br><br>
	<div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">
	    <div class="border bg-white shadow-sm rounded-2 p-5">
	     <button class="f-poppins fw-bold text-dark w-100 border-0 rounded-3 fs-22 py-1"><img src="assets/images/wallet_dark_icon.png" class="me-4" width="25px" style="margin-top:-4px;"><?php echo get_string('Credit_Card')?></button><br><br>
	     <button class="f-poppins fw-bold text-white bg-orange w-100 border-0 rounded-3 fs-22 py-1"><img src="assets/images/paypal.png" class="me-4" width="20px" style="margin-top:-4px;"><?php echo get_string('Pay_Pal')?></button>
	     <br><br>
		 <span class="f-poppins fw-600"><?php echo get_string('Currency_Charge')?></span>
		 <div class="dropdown mt-3">
           <button class="btn dropdown-toggle drop-toggle-2 w-100 text-start border-blue text-sky py-2 light-blue-bg fs-21 f-poppins" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
             USD
         	<img src="assets/images/down_arrow_icon.png" width="20px" class="float-end mt-2">
           </button>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
             <li><a class="dropdown-item" href="#"><?php echo lang('action'); ?></a></li>
             <li><a class="dropdown-item" href="#"><?php echo lang('another_action'); ?></a></li>
             <li><a class="dropdown-item" href="#"><?php echo lang('something_else_here'); ?></a></li>
           </ul>
         </div>
		 <br>
		 <div class="row mx-1">
		   <div class="col-md-6 light-blue-bg px-3 py-2">
		     <span class="fw-600 f-poppins"><?php echo get_string('Amount')?></span>
		   </div>
		   <div class="col-md-6 dark-blue-bg px-3 py-2">
		     <span class="f-poppins text-white fw-bold"><?php echo get_string('currency_sign')?>23.45</span>
		   </div>
		 </div>
		 <br>
		 <div class="row mx-1">
		   <div class="col-md-6 ps-0 py-2">
		     <button class="f-poppins btn-bg-2 border-0 rounded-1 fs-20 w-100 mt-3 btn-text"><?php echo get_string('Pay_Now')?></button>
		   </div>
		   <div class="col-md-6 ps-0 py-2">
		   </div>
		 </div>
		</div>
	  </div>
	  <div class="col-md-2"></div>
	</div>
	<br><br>
  </div>
</section>
<?php include("footer.php");?>