<style>
	.no_data_found{
		padding: 15px;
    color: red;
    font-weight: 700;
    text-align: center;
	}
	.offer-list-1 {
		margin-bottom: 5px;
	}

</style>
<?php 
if(!empty($offers)){
foreach ($category as $cat) { ?>
            <div id="<?= url_title($cat['category_name'], 'underscore', true); ?>" class="offer-list-1">
            <?php foreach ($offers as $offer) {
                if ($offer['categories'] == $cat['id']) { ?>
                 <a href="<?= base_url();?>offer/single_offer/<?= $offer['id'];?>" style="width:100%;">
                <div class="offer-view" >
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
                                            echo $cUname = extractFirst60Characters(get_translation($offer['name']));
                                        } else {
                                            echo $cUname = get_translation($offer['name']);
                                        } 
                                    ?>
                                </div>
                            </div>
                            <hr style="margin-top: unset;margin-bottom: unset;">
                            <div class="second-view">
                                <div class="f-col">
                                    <?php 
                                        if($offer['offer_type'] !='child'){
                                            if($offer['adult_discount']!=0){ ?>
                                                <div class="text1"><?= get_currency($offer['adult_discount'],$offer['currency_type']) ?>&nbsp;&nbsp;&nbsp;<del> <?= get_currency($offer['adult_price'],$offer['currency_type']); ?></del></div>
                                            <?php }else{ ?>
                                                <div class="text1"><?= get_currency($offer['adult_price'],$offer['currency_type']); ?></div>
                                            <?php } 
                                        }else{ 
                                            if($offer['child_discount']!=0){ ?>
                                               <div class="text1"><?= get_currency($offer['child_discount'],$offer['currency_type']) ?>&nbsp;&nbsp;&nbsp;<del> <?= get_currency($offer['child_price'],$offer['currency_type']); ?></del></div>
                                            <?php }else{ ?>
                                                <div class="text1"><?= get_currency($offer['child_price'],$offer['currency_type']); ?></div>
                                                 <?php } 
                                        } 
                                    ?>
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
                                                    <img class="half_star_css" src="<?php echo base_url(); ?>desktop_assets/images/half_star_icon.png">
                                                <?php }
                                                // Display blank stars
                                                for ($i = 1; $i <= $blankStars; $i++) { ?>
                                                    <img class="blank_star_css" src="<?php echo base_url(); ?>desktop_assets/images/blank_star.png">
                                                <?php	} ?>
                                    </div>
                                </div>
                                <div class="s-col">
                                <?php if(!empty($offer['traveling_time'])){ ?>
                                    <div class="hours">
                                        <img src="<?= base_url();?>assets/images/clock.png" alt="">
                                        <div class="text"> <?php echo $offer['traveling_time'];?> <?=   lang('hours'); ?></div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                    
                </div>
                                                </a>
                <?php } ?>
            <?php } ?>
               
            </div>
            <?php } }else{ ?>
				<div class="offer-view no_data_found"><?= lang('no_data_found'); ?></div>
			<?php } ?>
