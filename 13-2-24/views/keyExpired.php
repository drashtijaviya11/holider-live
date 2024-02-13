<!-- 
    <div class="container">
        <img src="your_logo.png" alt="Logo" class="logo">
        <h1>Key is Expired</h1>
		<p class="fw-600 f-poppins_1 text-decoration-underline" style="color:#00B5DC;"><?php echo lang('send_login_to_number');?><br> <?php echo '+1 (332) 242-6444';?></p><br>
    </div>


 -->
<div class="popup-container">

<div class="re-login-section">
	<div class="re-login-rec">
		<div class="close-sec">
			<!-- <button class="close-btn">
				<img src="<?php echo base_url('assets/images/close-white.png'); ?>" alt="">
			</button> -->
		</div>

		<div class="detail-re">
			<h1><?= lang('key_is_expired') ?></h1>
			<a href="//api.whatsapp.com/send?phone=13322426444&text=login" class="" style="font-size: 25px;">
				<p><?php echo lang('send_login_to_number');?><br> <?php echo '+1 (332) 242-6444';?></p>
			</a>
		</div>

		<div class="c-button">
			<!-- <button class="cancel-re">CANCEL</button> -->
		</div>
	</div>
</div>

</div>

