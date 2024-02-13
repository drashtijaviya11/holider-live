
<section id="destination-bg">
  <div class="container">
    <!-- ::Begin Heading section -->
    <div class="row contact-text">
      <div class="col-md-12 text-center">
        <span class="f-Playfair fw-bold fs-90 text-white pay-text"> <?php echo lang('destinations')?> </span>
		<div class="row px-5 align-items-center">
		  <div class="col-md-4">
		    <div class="grad2"></div>
		  </div>
		  <div class="col-md-4">
		    <span class="f-Poppins fw-500 text-white fs-24 des-text"> <?php echo lang('destinations_to_inspire_adventure')?> </span>
		  </div>
		  <div class="col-md-4">
		    <div class="grad1"></div>
		  </div>
		</div>
      </div>
    </div>
	<!-- ::End Heading section -->
  </div>
</section>

<section>
  <div class="container">
    <div class="row px-3 py-3">
	<?php if(!empty($destinations)){
		foreach($destinations as $destination) { ?>
	  <div class="col-md-3 py-1">
        <div class="card text-center py-4 px-3 card-bg">
          <img src="<?php echo base_url() ?>desktop_assets/images/des_card_img.png" class="card-img-top p-2" alt="...">
			<div class="card-body">
				<h2 class="f-roboto fw-600 card-text"><?= $destination['area']; ?></h2><br>
				<a href="javascript:void(0);" class="text-decoration-none more-btn f-Poppins fw-600 fs-24" onclick="new_getArea('<?= $destination['id']; ?>')"><?php echo lang('more')?></a>
				<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="line-eig"></div>
				</div>
				<div class="col-sm-4"></div>
				</div>
			</div>
        </div>
       </div>
	   <?php } } ?>
		</div> 
	
  </div>
</section> 
