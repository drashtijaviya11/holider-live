<style>
.dataContent {
	text-align: center;
	background-color: #fff;
	padding: 20px;
	border-radius: 8px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.logo {
	width: 100px;
	margin-bottom: 20px;
}

h1 {
	color: #d9534f;
}

p {
	color: #333;
}
</style>
    <!-- <div class="dataContent">
        <img src="your_logo.png" alt="Logo" class="logo">
        <h1><?= lang('key_is_expired') ?></h1>
		<a href="//api.whatsapp.com/send?phone=13322426444&text=<?php lang('login') ;?>" class="" style="font-size: 25px;">
		<p class="fw-600 f-poppins_1 text-decoration-underline" style="color:#00B5DC;"><?php echo lang('send_login_to_number');?><br> <?php echo '+1 (332) 242-6444';?></p><br>
		</a>
    </div> -->

	<section>
  <div class="container">
    <div class="row pt-5 mt-5">
	  <div class="col-md-3 co-expired-1"></div>
	  <div class="col-md-6 co-expired-2">
	    <div id="expired-bg" class="text-center border py-5" style="box-shadow: 0px 0px 10px 0px #DADADA;">
	      <h3 class="text-red-sec fw-600"><?php echo lang('key_is_expired')?></h3>
		  <a href="//api.whatsapp.com/send?phone=13322426444&text=<?php lang('login') ;?>" class="" style="font-size: 25px;">
		  <p class="word-wrap text-sky fw-600 fs-20 py-4 text-decoration-underline expired-paragraph"><?php echo lang('send_login_to_number')?><br>+1 (332) 242-6444</p>
</a>
		  <!-- <button class="cancel-btn btn-bg-2 fw-600 px-5"><?php echo get_string('CANCEL')?></button> -->
	    </div>
	  </div>
	  <div class="col-md-3 co-expired-1"></div>
	</div>
  </div>
</section>


