
<section id="credit-bg">
  <div class="container">
    <div class="row pt-5">
	  <div class="col-md-2"></div>
	  <div class="col-md-10" onclick="goBackToSingleOffer()" style="cursor:pointer">
        <img src="<?php echo base_url(); ?>desktop_assets/images/left_arrow_icon.png" class="left-arrow-img">
		<span class="f-poppins fw-600 fs-50 text-white pay-text"><?php echo lang('payment')?></span>
      </div>
    </div>
	<br><br>
	<div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">
	    <div class="border bg-white shadow-sm rounded-2 p-5">
	     <button class="f-poppins fw-bold text-white bg-orange w-100 border-0 rounded-3 fs-22 py-1"><img src="<?php echo base_url(); ?>desktop_assets/images/wallet_icon.png" class="me-4" width="25px" style="margin-top:-4px;"><?php echo lang('credit_card')?></button><br><br>
	     <!-- <button class="f-poppins fw-bold text-dark w-100 border-0 rounded-3 fs-22 py-1"><img src="<?php echo base_url(); ?>desktop_assets/images/paypal.png" class="me-4" width="20px" style="margin-top:-4px;"><?php echo lang('paypal')?></button> -->
	     <br><br>
		 <span class="f-poppins fw-600"><?= lang("currency_charge") ?></span>
		 <div class="dropdown mt-3">
           <button class="btn dropdown-toggle drop-toggle-2 w-100 text-start border-blue text-sky py-2 light-blue-bg fs-21 f-poppins" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
		   <?php $currency = $this->input->cookie('currency_code',true)  ;
				if (isset($currency)) {
					echo $currency;
				} else {
					echo 'THB'; // Default currency code
				}
			?>
         	<img src="<?php echo base_url(); ?>desktop_assets/images/down_arrow_icon.png" width="20px" class="float-end mt-2">
           </button>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 100%;">
			<?php foreach($currencies as $currency) { ?>
             <li><a class="dropdown-item" href="javascript:void(0);" onclick="change_curn('<?= $currency['code']; ?>')"><?= $currency['code']; ?></a></li>
			<?php } ?>
             <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
             <li><a class="dropdown-item" href="#">Something else here</a></li> -->
           </ul>
         </div>
		 <br>
		 <div class="row mx-1">
		   <div class="col-md-6 light-blue-bg px-3 py-2">
		     <span class="fw-600 f-poppins"><?php echo lang('amount')?></span>
		   </div>
		   <div class="col-md-6 dark-blue-bg px-3 py-2">
		   <?php  $check_condition = array('conditions' => ['id' => $offer_id]);
        $offers = $this->QueryModel->selectSingleRow('offer', $check_condition); ?>
		     <span class="f-poppins text-white fw-bold"> <?php if(!empty($totalValue)){
                                        $totalValue= $totalValue;
                                    }else{
                                        $totalValue =0;
                                    } ?>
                                    <?php if(!empty($totalValue)){ 
                                        echo get_currency($totalValue,$offers['currency_type']); 
                                        } ?></span>
		   </div>
		 </div>
		 <br>
		 <!-- <div class="row mx-1">
		   <div class="col-md-6 ps-0 pe-4 py-2">
		     <span class="f-poppins fw-600"><?php echo get_string('Card_Number')?></span><br>
			 <input type="text" class="bg-gray border-0 mt-2 rounded-1 w-100">
		   </div>
		   <div class="col-md-6 ps-0 py-2">
		     <span class="f-poppins fw-600"><?php echo get_string('Card_CVC')?></span><br>
			 <input type="text" class="bg-gray border-0 mt-2 rounded-1 w-100">
		   </div>
		 </div>
		 <div class="row mx-1">
		   <div class="col-md-6 ps-0 pe-4 py-2">
		     <span class="f-poppins fw-600"><?php echo get_string('MM/YY')?></span><br>
			 <input type="text" class="bg-gray border-0 mt-2 rounded-1 w-100">
		   </div>
		   <div class="col-md-6 ps-0 py-2">
		   </div>
		 </div>
		 <div class="form-check">
           <input type="checkbox" class="form-check-input border-blue mt-2" id="exampleCheck1">
           <label class="form-check-label text-sky mt-1 f-poppins" for="exampleCheck1"><?php echo get_string('Save_Card_Detail')?></label>
         </div>
		 <br> -->
		 <!-- <div class="row mx-1">
		   <div class="col-md-6 ps-0 py-2">
		     <button class="f-poppins btn-bg-2 border-0 rounded-1 fs-20 w-100 mt-3 btn-text"><?php echo get_string('Pay_Now')?></button>
		   </div>
		   <div class="col-md-6 ps-0 py-2">
		   </div>
		 </div> -->
		 <form action="https://holider.com/demo/stripe-payment/public/create-checkout-session.php" method="POST">
        <!-- Add a hidden field with the lookup_key of your Price -->
        <?php $new_price = $totalValue;
		$check_condition = array('conditions' => ['id' => $offer_id]);
        $offers = $this->QueryModel->selectSingleRow('offer', $check_condition); ?>
		<input type="hidden" name="offername" value="<?= $offername ?>">
		<?php $final_key_val=get_price_without_symbol($new_price,$offers['currency_type']);?>
        <input type="hidden" name="lookup_key" value="<?= $final_key_val * 100 ?>" />
         <input type="hidden" name="offer_id" id="offer_id" value="<?= $offer_id ?>">
        <input type="hidden" name="picTime" id="picTime" value="<?= $picTime ?>">
        <input type="hidden" name="adult_Qnty" id="adult_Qnty" value="<?= $adult_Qnty ?>">
        <input type="hidden" name="child_Qnty" id="child_Qnty" value="<?= $child_Qnty ?>">
        <input type="hidden" name="adult_Rate" id="adult_Rate" value="<?= get_price_without_symbol($adult_Rate,$offers['currency_type']); ?>">
        <!-- <input type="hidden" name="sellingPrice" id="sellingPrice" value="<?= $sellingPrice ?>"> -->
        <input type="hidden" name="picDate" id="picDate" value="<?= $picDate ?>">
        <input type="hidden" name="currencytype" id="currencytype" value=" <?php if($this->input->cookie('currency_code',true)){  echo strtolower($this->input->cookie('currency_code')); } else{ echo 'thb'; } ?>">
        <input type="hidden" name="child_Rate" id="child_Rate" value="<?= get_price_without_symbol($child_Rate,$offers['currency_type']); ?>">
        <button id="checkout-and-portal-button" type="submit" class="f-poppins btn-bg-2 border-0 rounded-1 fs-20 w-100 mt-3 btn-text"><?= lang('pay_now'); ?></button>
      </form>
		</div>
	  </div>
	  <div class="col-md-2"></div>
	</div>
	<br><br>
  </div>
  
</section>
<script>
 $(document).ready(function(){
  $('#currencytype').on('change',function(){
	var selectcurrency = $(this).val();
		selectcurrency = selectcurrency.toLowerCase();  
		$('#currencytype').val(selectcurrency);
  });
 });

 function getCookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');

    for(var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}
function goBackToSingleOffer()
{
	var redirect_from = getCookie('redirect_from');
    if (redirect_from) {
        var decodedURL = decodeURIComponent(redirect_from);
        window.location.href = decodedURL; 
    } else {
        window.history.back();
    }
}
</script>
