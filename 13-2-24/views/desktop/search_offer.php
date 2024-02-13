<style>
	.cat_offer_list{
		height: 95vh;
    overflow-y: scroll;
	}
			/* Custom scrollbar styles */
	.cat_offer_list::-webkit-scrollbar {
			width: 5px;
	}

	.cat_offer_list::-webkit-scrollbar-track {
			background: transparent;
	}

	.cat_offer_list::-webkit-scrollbar-thumb {
			background-color: transparent;
			border-radius: 20px;
			border: 3px solid #ced4da;
	}
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
</style>
<section>
  <div class="container">
    <div class="row pt-5">
	    <div class="col-lg-3 mt-1">
	      <div class="p-4 border box-light-2" style="background-color: #F1FBFF;height:95vh;">
	        <h3 class="fw-600 f-livvic text-blue"><?php echo lang('categories')?></h3>
		      <hr>
		      <ul class="list-group f-lora">
          
            <?php foreach ($category as $cat) { ?>
                        
                        <li class="list-group-item">
                          <input class="form-check-input border-orange me-1 mt-2" type="radio" name="listGroupRadio" value="<?= $cat['id'] ?>" id="cat_<?= $cat['id'] ?>" onclick="get_cat_offer(<?php echo $cat['id']; ?>)">
                          <label class="form-check-label ps-2 fs-5 fw-600" for="car_<?= $cat['id'] ?>"><?= get_categories_translation($cat['category_name']); ?></label>
                        </li>
                    <?php } ?>
          </ul>
	      </div>
	    </div>
      <div class="col-lg-9">
        <div class="row cat_offer_list">
		<?php  if(!empty($offers)){ 
  foreach ($offers as $offer) {  ?>
    <div class="col-lg-4 py-1">
      <div class="card">
			<?php
					if (!empty($offer['first_image'])) {
							$file_extension = pathinfo($offer['first_image'], PATHINFO_EXTENSION);

							if (strtolower($file_extension) === 'mp4') {
									// Display video
									?>
									<video controls id="delayedVideo">
											<source src="<?= base_url() . '/' . $offer['first_image']; ?>" type="video/mp4">
											Your browser does not support the video tag.
									</video>
									<?php
							} else {
									// Display image
									?>
									<img src="<?= base_url() . '/' . $offer['first_image']; ?>" alt="" class="card-img-top p-2" alt="..." style="min-height: 205px;height: 205px;object-fit: cover;">
									<?php
							}
					}
			?>

				<!-- <?php  if(!empty($offer['first_image'])){ ?>
          <img src="<?= base_url() . '/' . $offer['first_image']; ?>" class="card-img-top p-2" alt="..." style="min-height: 205px;height: 205px;object-fit: cover;">
		  			<?php } else{ ?>
							<img src="<?= base_url();?>img/no-image.png" alt="" style="min-height: 205px;height: 205px;object-fit: cover;">
						<?php } ?> -->
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
                <div class="col-md-7 col-media-2">
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
                  <a href="javascript:;" class="btn hero-btn fw-bold text-white" onclick="view_offer(<?php echo $offer['id'] ?>)"><?= lang('know_more'); ?></a>
                <?php } ?>
              </div>
            </div>
            </div>
          </div>
          <?php }  }  else{  ?>
						<div class="col-lg-12 py-1">
							<div class="card data_not_available">
								No Data Found
							</div>
						</div>
					<?php } ?>
        </div>
      </div>
    </div>
  </div>
