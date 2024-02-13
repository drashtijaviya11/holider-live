<style>
.btn {
    /* Add any additional styles as needed */
    display: inline-block;
}
.carousel-control-prev-icon-2 {
    background-image: url('desktop_assets/images/arrow_left_icon.png') !important;
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100% 100%;
}

.carousel-control-next-icon-2 {
    background-image: url('desktop_assets/images/arrow_right_icon.png') !important;
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100% 100%;
}

</style>
<section id="hero-bg">
  <div class="container text-center">
    <div class="py-5 text-white">
      <h1 class="f-nunito fw-bold fs-58 pt-5 hero-media-h"><?= lang('lets_make_your')?><br><?= lang('best_trip_ever')?></h1>
	  <p class="f-roboto hero-paragraph pt-4  hero-media-p"><?= lang('plan_and_book_your_perfect')?></p>
      <a href="<?= base_url('offer')?>" class="btn btn-primary rounded-0 hero-btn fs-3 fw-bold px-5 text-dark mt-4"><?= lang('book_now')?></a>
    </div>
  </div>
</section>
<section class="position-relative content-box z-1">
  <div class="container text-center">
    <div class="border p-5 bg-white shadow-sm">
	<h2 class="f-Playfair fw-bold fs-1" style="color:#013743;"><?= lang('we_travel_the_world')?></h2>
	<p class="f-mulish fs-3 pt-4"><?= lang('proin_gravida_nibh_vel_velit'); ?></p>
    </div>
  </div>
</section>
<section class="bg-ligh-bue position-relative special-position">
  <div class="container">
    <div class="row position-relative">
	  <div class="col-md-8">
	    <h2 class="fw-bold f-nunito fs-1 p-5 mt-5"><?= lang('special_offers')?></h2>
		<hr class="line my-0">
	  </div>
	  <div class="col-md-4 blue-box"></div>
	</div>
	<div class="container position-relative">
	 <div class="row">
	<?php foreach($offers as $offer){ ?>
		<div class="col-lg-4 py-1 z-1">
		<a href="<?php echo base_url().'offer/single_offer/'.$offer['id']?>" style="text-decoration:none">
		<div class="card">
			<!-- Start carousal -->
			<div id="carouselExampleControls_<?= $offer['id'] ?>" class="carousel slide">
				<div class="carousel-inner">
					<?php $imageArray = json_decode($offer['image'], true); ?>
					<?php foreach ($imageArray as $index => $imageFile): ?>
						<?php
						$file_extension = pathinfo($imageFile['url'], PATHINFO_EXTENSION);
						$is_video = strtolower($file_extension) === 'mp4';
						?>
						<div class="carousel-item <?= $index === 0 ? 'active' : '' ?> text-center text-white">
							<?php if ($is_video): ?>
								<video controls id="video<?= $index ?>" style="min-height: 205px;height: 205px;object-fit: cover;">
									<source src="<?= base_url().$imageFile['url'] ?>" type="video/mp4">
									Your browser does not support the video tag.
								</video>
							<?php else: ?>
								<img src="<?= base_url().$imageFile['url'] ?>" class="card-img-top p-2" alt="..." style="min-height: 205px;height: 205px;object-fit: cover;">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php $countImg = count($imageArray); 
				if($countImg > 1){ ?>
				<button class="carousel-control-prev ms-2" type="button" data-bs-target="#carouselExampleControls_<?= $offer['id'] ?>" data-bs-slide="prev">
					<span class="carousel-control-prev-icon-2" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next me-2" type="button" data-bs-target="#carouselExampleControls_<?= $offer['id'] ?>" data-bs-slide="next">
					<span class="carousel-control-next-icon-2" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
				<?php } ?>
			</div>
		<!-- End carousal -->

		<!-- <?php  if(!empty($offer['first_image'])){ ?>
			<img src="<?= base_url() . '/' . $offer['first_image']; ?>" class="card-img-top p-2" alt="..." style="min-height: 205px;height: 205px;object-fit: cover;">
			<?php } else{ ?>
					<img src="<?= base_url();?>img/no-image.png" alt="" style="min-height: 205px;height: 205px;object-fit: cover;">
			<?php } ?> -->
		<div class="card-body">
		<div class="row media" style="min-height: 60px;">
			<div class="col-md-12 col-media">
			<p style="padding: 0px;font-size: 10px;margin: 0px;"><?= lang('koh_pha_nagan')?></p>
			<?php 
					if(strlen($offer['name']) > 20) {
						echo $cUname = extractFirst60Characters(get_translation($offer['name']));
					} else {
						echo $cUname = get_translation($offer['name']);
					} 
				?>
			</div></div>
			<div class="row media">
			<div class="col-md-6 col-media" style="white-space:nowrap">
			<h5 class="card-title f-poppins fw-600">
				
			</h5>
			<?php if($offer['offer_type'] !='child'){
                    if($offer['adult_discount']!=0){ ?>
                      <del class="pe-2"><?= get_currency($offer['adult_price'],$offer['currency_type']); ?></del><span class="f-Moderno fs-21 fw-bold price"><?= get_currency($offer['adult_discount'],$offer['currency_type']) ?></span>
                    <?php }else{ ?>
                      <span class="f-Moderno fs-21 fw-bold price"><?= get_currency($offer['adult_price'],$offer['currency_type']) ?></span>
                    <?php } ?>
                  <?php }else { 
                    if($offer['child_discount']!=0){ ?>
                      <del class="pe-2"><?= get_currency($offer['child_price'],$offer['currency_type']); ?></del><span class="f-Moderno fs-21 fw-bold price"><?= get_currency($offer['child_discount'],$offer['currency_type']) ?></span>
                    <?php }else{ ?>
                      <span class="f-Moderno fs-21 fw-bold price"><?= get_currency($offer['child_price'],$offer['currency_type']) ?></span>
                    <?php } ?>
                  <?php } ?>
			</div>
			<?php if(!empty($offer['traveling_time'])){ ?>
			<div class="col-md-6 pe-0 align-end media col-media">
			<div class="time pt-2 fw-600 fs-6"><img src="<?= base_url(); ?>desktop_assets/images/time_icon.png" class="pe-1" style="margin-top:-4px;"><?php echo $offer['traveling_time'];?> <?=lang('hours')?></div>
			</div>
			<?php } ?>
			<div class="row media">
			<div class="col-md-12 col-media" style="margin-bottom: 10px;">
			<?php 
                      $fullStars = floor($offer['average_rate']);
                      $hasHalfStar = ($offer['average_rate'] - $fullStars) >= 0.5;
                      $blankStars = 5 - ($fullStars + ($hasHalfStar ? 1 : 0));
                      // Display full stars
                      for ($i = 1; $i <= $fullStars; $i++) { ?>
                        <img src="<?php echo base_url(); ?>desktop_assets/images/star_icon.png">
                      <?php	} 
                      // Display half star if applicable
                      if ($hasHalfStar) {?>
                        <img src="<?php echo base_url(); ?>desktop_assets/images/half_star_icon.png">
                      <?php }
                      // Display blank stars
                      for ($i = 1; $i <= $blankStars; $i++) { ?>
                        <img class="half_star_css" src="<?php echo base_url(); ?>desktop_assets/images/blank_star.png">
                      <?php	} ?>
			</div></div>
			<hr>
			</div>
			<div class="media">
			<p class="card-text f-poppins fs-5 pt-3" style="min-height: 135px;"><?php echo $cUname = extractFirst100Characters(get_translation_desc($offer['details']));  ?></p>
			<!-- <a href="javascript:;" onclick="view_offer(<?php echo $offer['id'] ?>)" class="btn hero-btn fw-bold text-white"><?= lang('know_more')?></a> -->
		</div>
		</div>
		</div>
					  </a>
		</div>
	<?php } ?>
	 
	 
	</div>
	</div>
	<div class="row position-relative card-box" style="display:none">
	  <div class="col-md-4 blue-box"></div>
	  <div class="col-md-8">
	  </div>
	</div>
	<div class="row">
		<div style="text-align: center;z-index: 9999;padding-bottom: 100px;">
			<a style="background:#00B5DC" href="<?= base_url('offer')?>" class="btn btn-primary"><?= lang('show_more_offer')?></a >
		</div>
	</div>

  </div>
</section>
<script>
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
		});
</script>

