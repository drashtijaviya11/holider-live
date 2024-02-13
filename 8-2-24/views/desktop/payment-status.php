<style>
    .site-btn {
        background: #00B5DC;
		color: #fff;
		margin: 4px;
	}
	#save:hover{
		background-color: #05809b;
	}
</style>
<section>
  <div class="container">
	<!-- ::Begin Send Us section -->
    <div class="row pt-5">
      <div class="col-md-12">
        <div class="bg-inner shadow-sm">
          

          <?php if(!empty($payment_status)){ ?>
			
			<!-- Display transaction status -->
            <input type="hidden" name="email" class="email_for_reload" value="<?= $email; ?>">
            <input type="hidden" name="email" class="status_for_reload" value="<?= $payment_status; ?>">
			<?php if($payment_status == 'success'){ ?>
                <div class="row px-1">
		    <div class="col-md-7 p-5 text-center">
			  <img src="<?php echo base_url(); ?>desktop_assets/images/success_tick_icon.png" width="85px">
			  <h2 class="f-literata fw-bold fs-40 send-text text-sky pt-4 pay-text-sec"><?php echo lang('payment_successful')?></h2>
			  <div class="row">
			  <div class="col-4"></div>
			  <div class="col-4">
			    <div class="line-eve"></div>
			  </div>
			  <div class="col-4"></div>
			</div>
			  <p class="fw-500 dark-blue-4 fs-20 py-5 thanks-paragraph"><?php echo lang('thank_you_we')?></p>
              <div class="row btn-box-media">
			    <div class="col-md-12 my-1">
			      <!-- <button class="text-sky fw-500 booking-btn px-3"><?php echo lang('continue_booking')?></button> -->
                  <?php  $user_id =$this->session->userdata('id');
		$condition_user = array('conditions' => ['id' => $user_id]);
        $users_details = $this->QueryModel->selectSingleRow('users',$condition_user);
		if(empty($users_details['email'])){ ?>
		<form action="<?= base_url('dashboard/updateUser_email');?>" id="signupForm" method="POST" style="margin-top: 3%;border: 1px solid #ccc;border-radius: 10px;padding: 3%;">
                                     <div class="container loginContainer">
                                        <div class="">
											<input type="hidden" name="inserted_value" value="<?php echo htmlentities(serialize($inserted_value)); ?>">
                                            <input type="hidden" class="" id="wh_us_id" name="id" value="<?= $this->session->userdata('id') ?>">
                                            <label for="lastname" class="form-label"><?= lang('add_email_for_voucher') ?></label>
                                            <input type="text" class="form-control field1" id="name" name="email" placeholder="<?= lang('enter_email') ?>" >
											<button type="submit" id="save" class="btn text-white fw-500 site-btn px-3"><?= lang('save'); ?></button>
                                        </div>
										
                                    
                                    </div>
                                    
                                        
                                </form>
                                <?php } ?>
			    </div>
				<!-- <div class="col-md-6 my-1">
			      
                  <a href="<?php echo base_url().'dashboard/my_voucher' ?>" class="btn-link"><button class="text-white fw-500 site-btn px-3"><?php echo lang('go_to_voucher_page')?></button></a>
			    </div> -->
			  </div>
			</div>
            <?php }else{ ?>
                <div class="row px-1">
                <div class="col-md-7 p-5 text-center">
			  <img src="<?php echo base_url(); ?>desktop_assets/images/success_tick_icon.png" width="85px">
			  <h2 class="f-literata fw-bold fs-40 send-text text-sky pt-4 pay-text-sec"><?php echo lang('the_transaction_was_successful_but_your_payment_failed')?></h2>
			  <div class="row">
			  <div class="col-4"></div>
			  <div class="col-4">
			    <div class="line-eve"></div>
			  </div>
			  <div class="col-4"></div>
			</div>
			  <p class="fw-500 dark-blue-4 fs-20 py-5 thanks-paragraph"><?php echo lang('thank_you_we')?></p>
              <div class="row btn-box-media">
			    <!-- <div class="col-md-6 my-1">
			      <button class="text-sky fw-500 booking-btn px-3"><?php echo lang('continue_booking')?></button>
			    </div> -->
				<div class="col-md-6 my-1">
			      <!-- <button class="text-white fw-500 site-btn px-3"><?php echo lang('go_to_site')?></button> -->
                  <a href="<?php echo base_url().'dashboard/my_voucher' ?>" class="btn-link"><button class="text-white fw-500 site-btn px-3"><?php echo lang('go_to_voucher_page')?></button></a>
			   
			    </div>
			  </div>
			</div>
			<!-- <h1 class="error"><?= lang('the_transaction_was_successful_but_your_payment_failed')  ?></h1> -->
			<?php } ?>
			<?php }else{ ?>
                <div class="row px-1">
		    <div class="col-md-7 p-5 text-center">
			  <img src="<?php echo base_url(); ?>desktop_assets/images/failed_tick_img.png" width="85px">
			  <h2 class="f-literata fw-bold fs-40 send-text text-sky pt-4 pay-text-sec"><?php echo lang('payment_failed')?></h2>
			  <div class="row">
			  <div class="col-4"></div>
			  <div class="col-4">
			    <div class="line-eve"></div>
			  </div>
			  <div class="col-4"></div>
			</div>
			  <p class="fw-500 dark-blue-4 fs-20 py-5 thanks-paragraph"><?php echo lang('sorry_unfortunately_we')?></p>
              <div class="row btn-box-media">
			    <!-- <div class="col-md-6 my-1">
			      <button class="text-sky fw-500 booking-btn px-3"><?php echo lang('continue_booking')?></button>
			    </div> -->
				<!-- <div class="col-md-6 my-1">
			      <button class="text-white fw-500 site-btn px-3"><?php echo lang('try_again')?></button>
                  <a href="<?php echo base_url().'dashboard/my_voucher' ?>" class="btn-link"><button class="text-white fw-500 site-btn px-3"><?php echo lang('go_to_voucher_page')?></button></a>
			   
			    </div> -->
			  </div>
			</div>
		<?php } ?>


			<div class="col-md-5 right-box-sec">
			  <br><br><br>
			    <h2 class="f-literata fw-bold text-sky fs-40 ps-5 get-text"><?php echo lang('payment_details')?></h2><br>
				<div class="row ps-5">
				  <div class="col-md-5 col-5">
                    <p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('offer_name')?></p>
			      </div>
				  <div class="col-md-7 col-7 col-icon">
                    <p class="f-poppins fs-20 fw-500 icon-text"><?= get_translation($offer_name); ?></p>
			      </div>
			    </div>
				<?php $condition_offer = array('conditions' => ['id' => $offer_id]);
        			$offer_details = $this->QueryModel->selectSingleRow('offer',$condition_offer); 
				?>
				<?php if($offer_details['offer_type']=='both'){ ?>
					<div class="row ps-5">
					<div class="col-md-5 col-5">
						<p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('child_qty')?></p>
					</div>
					<div class="col-md-7 col-7 col-icon">
						<p class="f-poppins fs-20 fw-500 icon-text"><?= $child_qty; ?></p>
					</div>
					</div>
					<div class="row ps-5">
					<div class="col-md-5 col-5">
						<p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('adult_qty')?></p>
					</div>
					<div class="col-md-7 col-7 col-icon">
						<p class="f-poppins fs-20 fw-500 icon-text"><?= $adult_qty; ?></p>
					</div>
					</div>
				<?php } ?>
				<?php if($offer_details['offer_type']=='adult'){ ?>
					<div class="row ps-5">
					<div class="col-md-5 col-5">
						<p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('ticket')?></p>
					</div>
					<div class="col-md-7 col-7 col-icon">
						<p class="f-poppins fs-20 fw-500 icon-text"><?= $adult_qty; ?></p>
					</div>
					</div>
				<?php } ?>
				<?php if($offer_details['offer_type']=='child'){ ?>
					<div class="row ps-5">
					<div class="col-md-5 col-5">
						<p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('ticket')?></p>
					</div>
					<div class="col-md-7 col-7 col-icon">
						<p class="f-poppins fs-20 fw-500 icon-text"><?= $child_qty; ?></p>
					</div>
					</div>
				<?php } ?>
				<div class="row ps-5">
				  <div class="col-md-5 col-5">
                    <p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('mobile_no')?></p>
			      </div>
				  <div class="col-md-7 col-7 col-icon">
                    <p class="f-poppins fs-20 fw-500 icon-text word-wrap"><?= $mobile; ?></p>
			      </div>
			    </div>
                <?php if(!empty($email)) { ?> 
				<div class="row ps-5">
				  <div class="col-md-5 col-5">
                    <p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('email')?>:</p>
			      </div>
				  <div class="col-md-7 col-7 col-icon">
                    <p class="f-poppins fs-20 fw-500 icon-text word-wrap"><?= $email; ?></p>
			      </div>
			    </div>
                <?php } ?>
				<div class="row ps-5">
				  <div class="col-md-5 col-5">
                    <p class="f-poppins fs-20 fw-500 icon-text"><?php echo lang('transaction_id')?></p>
			      </div>
				  <div class="col-md-7 col-7 col-icon" style="word-wrap: break-word">
                    <p class="f-poppins fs-20 fw-500 icon-text word-wrap"><?= $trans_id; ?></p>
			      </div>
			    </div>
				<div class="row ps-5 pb-5 amount-text">
				  <div class="col-md-5 col-5">
                    <p class="f-poppins fs-20 fw-500 icon-text"><strong><?php echo lang('amount_paid')?></strong></p>
			      </div>
				  <div class="col-md-7 col-7 col-icon">
				  <?php if (!empty($this->input->cookie('currency_code', true))) {
						$currencycode= $this->input->cookie('currency_code', true);
					}else{
						$currencycode= 'THB';
					} ?>
                    <p class="f-poppins fs-20 fw-500 icon-text"><strong><?= getCurrencySymbol($currencycode) .' ' .$total_amount;  ?></strong></p>
			      </div>
			    </div>
			</div>
          </div>
        </div>
      </div>
    </div>
	<!-- ::End Send Us section -->
  </div>
</section> 



<script>
	
  $(document).ready(function () {
    var email = $(".email_for_reload").val();
    var status = $(".status_for_reload").val();
    if(email !='' && status !=''){
            window.setTimeout(function() {
            window.location.href = "<?php echo base_url().'dashboard/my_voucher' ?>";
        }, 5000);
    }
});

function deleteSessionValue(key) {
    sessionStorage.removeItem(key);
}
function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

$(document).ready(function() {
    // Delete values from session storage
    deleteSessionValue('picDate');
    deleteSessionValue('picTime');
    deleteSessionValue('childQuantity');
    deleteSessionValue('adultQuantity');
	deleteCookie('picDate');
    deleteCookie('picTime');
    deleteCookie('childQuantity');
    deleteCookie('adultQuantity');

	// Delete Cookie Redirect From
		deleteCookie('redirect_from');
});
</script>
</body>
</html>