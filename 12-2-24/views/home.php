<style>
	.rating_area img {
    width: 20px;
    margin-top: 0;
    /* margin-bottom: 10px !important;
    padding-bottom: 10px; */
}

.book-now {
    width: 60% !important;
    white-space: nowrap;
}

.offer_name_class .text {
    padding: 10px;
    width: 100%;
    height: auto;
    margin: 0;
    color: #013743;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: 25px;
    text-align: start;
}
.half_star_css {
    height: 22px;
    width: 22px;
}
</style>
        <div class="main-home">
            <div class="hero-section">
                <div class="hero-image">
                    <img src="<?php echo base_url() ?>assets/images/home-bg.png" alt="">
                </div>
                <div class="hero-bg"></div>
                <div class="hero-detail">
                    <h1><?= lang('lets_make_your')?><br><?= lang('best_trip_ever')?></h1>
                    <p><?= lang('plan_and_book_your_perfect')?></p>
					<button class="book-now"><a style="color: black;" href="<?= base_url('offer')?>"><?= lang('book_now')?></a></button>
                </div>
            </div> 

            <div class="info-section">
                <div class="info-rec">
                    <h2><?= lang('we_travel_the_world')?></h2>
                    <p><?= lang('proin_gravida_nibh_vel_velit'); ?></p>
                </div>
            </div>

            <div class="home-offer-section" style="position:absolute">

                <div class="heading-offer">
                    <h3><?= lang('special_offers')?></h3>
                    <div class="heading-off-rec"></div>
                </div>
                <div class="all-offer">
				<?php foreach($offers as $offer){ ?>
                    <a href="<?= base_url();?>offer/single_offer/<?= $offer['id'];?>">
                    <div class="offer-view">
                        <div class="first-view">
                            <?php
                                if (!empty($offer['first_image'])) {
                                    $file_extension = pathinfo($offer['first_image'], PATHINFO_EXTENSION);
                                    if (strtolower($file_extension) === 'mp4') {
                                        // Display video
                                        ?>
                                        <video controls id="video">
                                            <source src="<?= base_url() . '/' . $offer['first_image']; ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <?php
                                    } else {
                                        // Display image
                                        ?>
                                        <img src="<?= base_url() . '/' . $offer['first_image']; ?>" alt="">
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="offer_name_class">
                            <div class="text">
								<?php 
									if(strlen($offer['name']) > 20) {
										echo $cUname = extractFirst100Characters(get_translation($offer['name']));
									} else {
										echo $cUname = get_translation($offer['name']);
									} 
								?>
                            </div>
                        </div>
                        <hr style="margin-top: unset;margin-bottom: unset;">
                        <div class="second-view">
                            <div class="f-col">
                            <?php if($offer['offer_type'] !='child'){
                                if($offer['adult_discount']!=0){ ?>
                                    <div class="text1"><?= get_currency($offer['adult_discount'],$offer['currency_type']) ?>&nbsp;&nbsp;&nbsp;<del> <?= get_currency($offer['adult_price'],$offer['currency_type']); ?></del></div>
                                <?php }else{ ?>
                                    <div class="text1"><?= get_currency($offer['adult_price'],$offer['currency_type']); ?></div>
                                <?php } }
                            else{ 
                                if($offer['child_discount']!=0){ ?>
                                    <div class="text1"><?= get_currency($offer['child_discount'],$offer['currency_type']) ?>&nbsp;&nbsp;&nbsp;<del> <?= get_currency($offer['child_price'],$offer['currency_type']); ?></del></div>
                                <?php }else{ ?>
                                    <div class="text1"><?= get_currency($offer['child_price'],$offer['currency_type']); ?></div>
                                <?php } 
                             } ?>
								<div class="rating_area">
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
                            <div class="s-col">
                            <?php if(!empty($offer['traveling_time'])){ ?>
                                <div class="hours">
                                    <img src="<?= base_url() ?>assets/images/clock-blue.png" alt="">
                                    <div class="text"><?php echo $offer['traveling_time'];?> <?=lang('hours')?></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                                    </a>
                    <?php } ?>
                </div>

                <div class="go-offer">
				<button class="show-m">
					<a style="color: white;" href="<?= base_url('offer')?>"><?= lang('show_more_offer')?></a >
				</button>
                </div>
            </div>
        </div>

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
