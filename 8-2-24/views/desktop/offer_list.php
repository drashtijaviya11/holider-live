<style>
	.data_not_available {
    width: 100%;
    text-align: center;
    font-size: 18px;
    color: #f01414;
    padding: 21px;
    margin-top: 6%;
}
video{
	min-height: 205px;
	height: 205px;
	object-fit: cover;
	padding: 0.5rem!important;
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
<?php  if(!empty($offers)){ 
  foreach ($offers as $offer) {  ?>
    <div class="col-lg-4 py-1">
    <a href="<?php echo base_url().'offer/single_offer/'.$offer['id']?>" style="text-decoration:none">
      <div class="card">
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
										<video controls id="video<?= $index ?>" style="min-height: 205px;height: 205px; width: 100%; object-fit: cover;">
											<source src="<?= base_url().$imageFile['url'] ?>" type="video/mp4">
											Your browser does not support the video tag.
										</video>
									<?php else: ?>
										<img src="<?= base_url().$imageFile['url'] ?>" class="card-img-top p-2" alt="..." style="min-height: 205px;height: 205px;object-fit: cover;">
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
						<?php 
						$countImg = count($imageArray); 
						if($countImg > 1){ ?>
						<button class="carousel-control-prev ms-2" type="button" data-bs-target="#carouselExampleControls_<?= $offer['id'] ?>" data-bs-slide="prev">
							<span class="carousel-control-prev-icon-2" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next me-2" type="button" data-bs-target="#carouselExampleControls_<?= $offer['id'] ?>" data-bs-slide="next">
							<span class="carousel-control-next-icon-2" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
							<?php } ?>
						</button>
					</div>

            <div class="card-body">
              <div class="row media" style="min-height: 100px;">
                <div class="col-md-12 col-media-2">
                  <?php 
                    if(strlen($offer['name']) > 20) { $cUname = extractFirst60Characters(get_translation($offer['name']));} 
                    else { $cUname = get_translation($offer['name']);}
                  ?>
                  <p style="padding: 0px;font-size: 10px;margin: 0px;">             
                             
                             Koh Pha Nagan
                                
                              </p>
                  <h5 class="card-title f-poppins fw-600"><?= ucfirst($cUname); ?></h5>
                </div>
              </div>
              <div class="row media">
                <div class="col-md-7 col-media-2" style="white-space:nowrap">
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
                <div class="col-md-5 pe-0 align-end media col-media-2">
                  <div class="time pt-2 fw-600 fs-6 hours-text">
                    <?php if(!empty($offer['traveling_time'])){ ?>
                      <div class="media-box-2"><?php echo $offer['traveling_time'];?> <?=   lang('hours'); ?></div>
                      <div class="mt-1 media-box"><img src="<?php echo base_url(); ?>desktop_assets/images/time_icon.png" class="pe-1"></div>
                    <?php }   ?>
                  </div>
                </div>
                
              <div class="row media">
                <div class="col-md-12 col-media-2" style="margin-bottom: 10px;">
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
                </div>
              </div>
              <hr>
              </div>
              <div class="media-2">
                <?php if(!empty($offer['details'])){ ?>
                  <p class="card-text f-poppins fs-5 pt-3" style="min-height: 135px;"><?php echo $cUname = extractFirst100Characters(get_translation_desc($offer['details']));?></p>
                  <!-- <a href="javascript:;" class="btn hero-btn fw-bold text-white" onclick="view_offer(<?php echo $offer['id'] ?>)"><?= lang('know_more'); ?></a> -->
                <?php } ?>
              </div>
            </div>
            </div>
                </a>
          </div>
          <?php }  }  else{  ?>
						<div class="col-lg-12 py-1">
							<div class="card data_not_available">
								<?= lang('no_data_found'); ?>
							</div>
						</div>
					<?php } ?>
					<script>
            document.addEventListener("DOMContentLoaded", function() {
                // Delayed start after 10 seconds
                setTimeout(function() {
                    document.getElementById("delayedVideo").play();
                }, 10000); // 10000 milliseconds = 10 seconds
            });
        </script>
