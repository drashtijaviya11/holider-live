<style>
	.suc-table {
    width: 90% !important;
    word-break: break-all !important;
}
.pay-list td {
    line-height: 20px !important;
}
</style>
<div class="psuc-container">

<div class="success-section">
	<div class="fsc-section">
		<img src="<?php echo base_url(); ?>assets/images/success-right.png" alt="">
		<div class="head-suc">
			<h2><?= lang('payment_successful'); ?></h2>
			<div class="suc-rec"></div>
		</div>
		<div class="display-msg">
			<p><?php echo lang('thank_you_we')?></p>
		</div>
	</div>

	<div class="sesc-section">
		<h2><?= lang('payment_details'); ?></h2>
		<div class="suc-table">
		<input type="hidden" name="email" class="email_for_reload" value="<?= $email; ?>">
            <input type="hidden" name="email" class="status_for_reload" value="<?= $payment_status; ?>">
			<table class="pay-item" width="100%">
				<tr class="pay-list">
					<td class="pa-item1" width="40%"><?php echo lang('offer_name')?>:</td>
					<td class="pa-item2" width="60%"><?= get_translation($offer_name); ?></td>
				</tr>
				<?php $condition_offer = array('conditions' => ['id' => $offer_id]);
        			$offer_details = $this->QueryModel->selectSingleRow('offer',$condition_offer); 
				?>
				<?php if($offer_details['offer_type']=='both'){ ?>
					<tr class="pay-list">
						<td class="pa-item1"><?php echo lang('child_qty')?>:</td>
						<td class="pa-item2"><?= $child_qty; ?></td>
					</tr>
					<tr class="pay-list">
						<td class="pa-item1"><?php echo lang('adult_qty')?>:</td>
						<td class="pa-item2"><?= $adult_qty; ?></td>
					</tr>
				<?php } ?>
				<?php if($offer_details['offer_type']=='adult'){ ?>
					<tr class="pay-list">
						<td class="pa-item1"><?php echo lang('ticket')?>:</td>
						<td class="pa-item2"><?= $adult_qty; ?></td>
					</tr>
				<?php } ?>
				<?php if($offer_details['offer_type']=='child'){ ?>
					<tr class="pay-list">
						<td class="pa-item1"><?php echo lang('ticket')?>:</td>
						<td class="pa-item2"><?= $child_qty; ?></td>
					</tr>
				<?php } ?>
				<tr class="pay-list">
					<td class="pa-item1"><?php echo lang('mobile_no')?>:</td>
					<td class="pa-item2"><?= $mobile; ?></td>
				</tr>
				<?php if(!empty($email)){ ?> 
				<tr class="pay-list">
					<td class="pa-item1"><?= lang('email'); ?>:</td>
					<td class="pa-item2"><?= $email; ?></td>
				</tr>
				<?php } ?>
				<tr class="pay-list">
					<td class="pa-item1"><?php echo lang('transaction_id')?>:</td>
					<td class="pa-item2"><?= $trans_id; ?></td>
				</tr>
				<tr class="pay-list">
					<th class="pa-item1"><?php echo lang('amount_paid')?>:</th>
					<?php if (!empty($this->input->cookie('currency_code', true))) {
						$currencycode= $this->input->cookie('currency_code', true);
					}else{
						$currencycode= 'THB';
					} ?>
					<th class="pa-item2"><?= get_currency($total_amount,$offer_currency);  ?></th>
				</tr>
			</table>
		</div>

		<div class="but-sec">
			<!-- <button class="con-booking">Continue Booking</button>
			<button class="go-site">Go To Site</button> -->
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
	</div>
</div>

</div>





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