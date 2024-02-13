
<script src="<?php echo base_url(); ?>assets/js/calendar.js"></script>
<style>
    .hide_opacity{
        opacity: 0 !important;
    }
    .mySlides {
    display: none;
    }
    .read_more_content
    {
        overflow-y: auto;
        display: none;
        background-color: #f1f1f1;
        padding: 20px;
        position: fixed;
        bottom: 0;
        height: 50%;
        width: 100%;
        box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 30px 30px 0px 0px;
    }

.tc-area{
    position: absolute;
    border-radius: calc(20*var(--aspect-ratio)) calc(20*var(--aspect-ratio)) 0 0;
    background: #FBFEFF;
    box-shadow: 0px 2px 2px 0px #003B48 inset;
    width: 100%;
    height: calc(280*var(--aspect-ratio));
    padding: calc(8*var(--aspect-ratio));
    left: calc(89.5*var(--aspect-ratio)) !important;
    bottom: 0 !important;
    top: calc(257*var(--aspect-ratio)) !important;
    display: none;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 2;
}
.tc-area .tc-btn{
    width: calc(55*var(--aspect-ratio));
    height: calc(2*var(--aspect-ratio));
    border: none;
    border-radius: 4px;
    background: rgba(0, 157, 191, 0.28);
    margin-left: calc(55*var(--aspect-ratio));
}
.i-data-section .text-section {
    position: absolute;
    display: flex;
    flex-direction: column;
    padding-left: calc(7*var(--aspect-ratio));
    top: 16%;
}
#tcContentOverlay{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: calc(500*var(--aspect-ratio));
    background: rgba(0, 0, 0, 0.7);
    z-index: 1;
}
.hours-container button {
    height: calc(10*var(--aspect-ratio)) !important;
}
.hours-container.active {
    height: calc(55*var(--aspect-ratio));
    z-index: 999;
    display: block;
}
.st-time
{
    justify-content: center;
    display: flex;
    margin-top: 20px;
}
.unchecked {
    font-size: calc(8*var(--aspect-ratio));
    color: #f2f0e7;
    margin-left: 2px;
}
.rating {
    border: none;
    min-width: 0;
    padding: 0;
    margin: 0;
    border: 0;
}
.checked {
    color: #ffd600;
    font-size: calc(8*var(--aspect-ratio));
    margin-left: 2px;
}
.header{
    position: sticky !important ;
    top: 0 !important;
    z-index: 100 !important;
}
.c-tx{
    color: #006277;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(7*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(11*var(--aspect-ratio));
}
.term-area{
    position: absolute;
    border-radius: 10px 10px 0px 0px;
    background: #FFF;
    box-shadow: 0px 0px 5px 1px rgba(0, 116, 141, 0.15);
    width: 92%;
    height: auto;
    padding-bottom: 5%;
    overflow: hidden;
    left: 4% !important;
    bottom: 0%;
    top: 12%;
    display: none;
}
.hm-input .hour-in {
    display: flex;
    flex-direction: column;
    /* margin-top: -20px; */
}
.hm-input .min-in {
    display: flex;
    flex-direction: column;
    /* margin-top: -20px; */
}
.input-boxes .ap-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    /* margin-left: 15%; */
    margin-top: -20%;
}
.hours-container {
    display: none;
    position: absolute;
    z-index: 100;
    top: 80%;
    right: 2%;
    width: calc(100*var(--aspect-ratio));
    height: calc(85*var(--aspect-ratio));
    border-radius: 10px;
    background: #dff9fff8;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.10);
    padding: 4%;
}
.termCl-btn{
    border-radius: 50%;
    width: 40px;
    height: 40px;
    position: absolute;
        top: 0;
        right: 0;
}
.hour-option{
    font-size: calc(12*var(--aspect-ratio)) !important;
    color: #000 !important;
}
.minute-option{
    font-size: calc(12*var(--aspect-ratio)) !important;
    color: #000 !important;
}
#hoursDrop{
    display: none;
    background: #aee3ef;
    position: absolute;
    grid-template-columns: 1fr;
    top: 100px;
    /* left: 14px; */
    height: 200px;
    overflow: scroll;
    width: 60px;
    font-size: calc(12*var(--aspect-ratio));
    font-weight: 700;
    border-radius: 5px;
    z-index: 100;
    font-family: "Lora" ,serif;
    text-align:center;
}
#minutesDrop{
    display: none;
    background: #aee3ef;
    position: absolute;
    grid-template-columns: 1fr;
    top: 100px;
    /* left: 29%; */
    height: 200px;
    overflow: scroll;
    width: 60px;
    font-size: calc(12*var(--aspect-ratio));
    font-weight: 700;
    border-radius: 5px;
    z-index: 100;
    font-family: "Lora" ,serif;
    text-align:center;
}
.text-section P{
    height:unset !important;
}
#playVedio{
	width: 100%;
    height: calc(180*var(--aspect-ratio));
    border-radius: 10px 10px 0 0;
}
#TconditionVedio{
	border-radius: 10px 10px 0px 0px;
    width: 100%;
    height: calc(80*var(--aspect-ratio));
}
.rating_area img {
    width: 20px;
    margin-top: 0;
    /* margin-bottom: 10px !important;
    padding-bottom: 10px; */
}
.half_star_css {
    height: 32px !important;
    width: 24px !important;
    margin-top: 5px !important;
}
</style>
        <div class="offer-detail-container" id="detail-container">
            <div class="one-offer">
            <div class="p-head" onclick="goBack()" style="display: flex;
    flex-direction: row;
    align-items: center;
    gap: calc(5*var(--aspect-ratio));">
                        <img src="<?= base_url(); ?>assets/images/arrow-blue-right.png" alt="" style="width: calc(9*var(--aspect-ratio));
    height: calc(8*var(--aspect-ratio));
    transform: rotate(180deg);">
                        <h3 style="color: #474747;font-family: sans-serif;
    font-size: calc(11*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin: 0 !important;"><?= lang('offer');?></h3>
                    </div>
                <div class="fis-section">
                    <div class="i-data-section">
					<?php foreach ($imageArray as $index => $imagePath) : 
							$decodedImage = json_decode($imagePath, true);
							$mediaType = pathinfo($decodedImage['url'], PATHINFO_EXTENSION); // Get the file extension
							
							if ($mediaType == 'mp4') :
								// Display video without controls for direct viewing
						?>
								<div class="mySlides">
									<video class="w-100" id="playVedio" muted loop autoplay>
										<source src="<?= base_url('/' . $decodedImage['url']) ?>" type="video/mp4">
										Your browser does not support the video tag.
									</video>
								</div>
						<?php else : ?>
								<!-- Display image -->
								<div class="mySlides">
									<img src="<?= base_url('/' . $decodedImage['url']) ?>" alt="">
								</div>
						<?php endif; ?>
						<?php endforeach; ?>
                        <div class="bg"></div>
                        <div class="text-section">
                            <!--<h3>Free Boat</h3>--><h3 style="margin:0px;width: 100%;" title="<?php echo $offer_detail['name']; ?>">
                                <?php 
                                    if(strlen($offer_detail['name']) > 20) {
                                        $cUname = substr(get_translation($offer_detail['name']), 0, 64).'...';
                                    } else {
                                        $cUname = get_translation($offer_detail['name']);
                                    } 
                                ?>
                        <?= ucfirst($cUname);  ?>   </h3>
                            <!-- <p style="padding: 0px;font-size: 10px;margin: 0px;height: 18px;width: 85%;">
							<?php              
                             $countryNameFound = false; foreach($country as $cntry) {
                                if ($offer_detail['country'] === $cntry['id']) {
                                    echo $cntry['name'];
                                    $countryNameFound = true;
                                    break;
                                }
                            }
                            if (!$countryNameFound) {
                                echo $offer_detail['country']." , ";}
                                
                                $stateNameFound = false;
                                foreach ($state as $sta) {
                                    if ($offer_detail['state'] === $sta['id']) {
                                        echo $sta['name'];
                                        $stateNameFound = true;
                                        break;
                                    }
                                }
                                if (!$stateNameFound) {echo $offer_detail['state'];} ?>
							</p> -->
                        <!-- <fieldset class="rating">
                            <?php
                                $rating = isset($average_rating) ? floor($average_rating) : '0';
                                $maxRating = 5; // Maximum rating
                                
                                for ($i = 1; $i <= $maxRating; $i++) {
                                    $starClass = ($i <= $rating) ? 'checked' : 'unchecked';
                                    echo '<span class="fa fa-star ' . $starClass . '"></span>';
                                }
                            ?>
                        </fieldset> -->
						<div class="rating_area">
									<?php 
							$fullStars = floor($average_rating);
							$hasHalfStar = ($average_rating - $fullStars) >= 0.5;
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
								<img src="<?php echo base_url(); ?>desktop_assets/images/blank_star.png">
							<?php	} ?>
						</div>
                        <p style="min-width: 280px;"><?php echo extractFirst150Characters(get_translation_desc($offer_detail['details']));?></p>
                       
                            <div class="tw-btn">
                                <?php if($offer_detail['details'] != '') { ?>
                                        <button class="detail" id="read_more" >
                                            <div class="read-text"><?= lang('read_more') ?></div>
                                            <!--<button id="read_more" class="detail"><?= lang('read_more') ?></button>  -->
                                            <img src="<?= base_url(); ?>assets/images/right-arrow.png" alt="">
                                        </button>
                                    <?php } ?>
                                <?php if($offer_detail['terms_and_condition'] != ''){ ?>  
                                <button class="term-btn" id="term-btn"> <?= lang('t_and_c'); ?></button>
                                <?php } ?>
                            </div>                              
                        </div>
                    
                    </div>
                   <div class="image-show" style="overflow-x: scroll;overflow-y: hidden;">
				   <?php foreach ($imageArray as $index => $imagePath) : 
						$decodedImage = json_decode($imagePath, true);
						$mediaType = pathinfo($decodedImage['url'], PATHINFO_EXTENSION); // Get the file extension
						
						if ($mediaType == 'mp4') :
							// Display video without controls for direct viewing
					?>
							<video class="py-2 w-100" onclick="currentSlide(<?= $index + 1 ?>)" muted loop autoplay>
								<source src="<?= base_url('/' . $decodedImage['url']) ?>" type="video/mp4">
								<!-- Your browser does not support the video tag. -->
							</video>
					<?php else : ?>
							<!-- Display image -->
							<img src="<?= base_url('/' . $decodedImage['url']) ?>" onclick="currentSlide(<?= $index + 1 ?>)" alt="Image <?= $index + 1 ?>">
					<?php endif; ?>
					<?php endforeach; ?>

                    </div>
                </div>

               

                <div class="bal">
                    <?php if($offer_detail['offer_type']=='both'){ ?>
                        <div class="a-data">
                            <div class="t-detail">
                                <h4><?= lang('adult'); ?> (12-99)</h4>
                                <input type="hidden" class="adultRate" value="<?php if($offer_detail['adult_discount']==0){ echo $offer_detail['adult_price'];}else{ echo $offer_detail['adult_discount']; } ?>">
                                <!-- <span><?= lang('minimum')?> 1 <?= lang('maximum') ?> 15</span> -->
                            </div>
                            <div class="t-detail t-price">
                                <h4 class="" style="color: #0084a1;"><?php if($offer_detail['adult_discount']==0){ echo  get_currency($offer_detail['adult_price'],$offer_detail['currency_type']);}else{ echo get_currency($offer_detail['adult_discount'],$offer_detail['currency_type']); } ?></h4>
                            </div>
                            <div class="c-detail">
                                <button class="less-btn" onclick="changeValue(-1)">-</button>
                                <span class="num adultQnty">0</span>
                                <button class="more-btn" onclick="changeValue(1)">+</button>
                            </div>
                        </div>
                        <div class="c-data">
                            <div class="t-detail">
                                <h4><?= lang('child'); ?> (2-11)</h4>
                                <input type="hidden" class="childRate" value="<?php if($offer_detail['child_discount']== 0) {echo $offer_detail['child_price'];}else {echo $offer_detail['child_discount'];} ?>">
                                <!-- <span><?= lang('minimum')?> 1 <?= lang('maximum') ?> 15</span> -->
                            </div>
                            <div class="t-detail t-price">
                                <h4 class="" style="color: #0084a1;"><?php if($offer_detail['child_discount']== 0) {echo get_currency($offer_detail['child_price'],$offer_detail['currency_type']);}else {echo get_currency($offer_detail['child_discount'],$offer_detail['currency_type']);} ?></h4>
                            </div>
                            <div class="c-detail">
                                <button class="less" onclick="changeValue1(-1)">-</button>
                                <span class="number childQnty">0</span>
                                <button class="more" onclick="changeValue1(1)">+</button>
                            </div>
                        </div>
                   <?php } ?>
                   <?php if($offer_detail['offer_type']=='adult'){ ?>
                    <div class="a-data">
                        <div class="t-detail">
                            <h4><?= lang('ticket'); ?></h4>
                            <input type="hidden" class="adultRate" value="<?php if($offer_detail['adult_discount']==0){ echo $offer_detail['adult_price'];}else{ echo $offer_detail['adult_discount']; } ?>">
                            <input type="hidden" class="childRate" value="0">
                            
                            <!-- <span><?= lang('minimum')?> 1 <?= lang('maximum') ?> 15</span> -->
                        </div>
                        <div class="t-detail t-price">
                            <h4 class="" style="color: #0084a1;"><?php if($offer_detail['adult_discount']==0){ echo  get_currency($offer_detail['adult_price'],$offer_detail['currency_type']);}else{ echo get_currency($offer_detail['adult_discount'],$offer_detail['currency_type']); } ?></h4>
                        </div>
                        <div class="c-detail">
                            <button class="less-btn" onclick="changeValue(-1)">-</button>
                            <span class="num adultQnty">0</span>
                            <!-- <input type="hidden" class="childQnty" value="0"> -->
                            <span class="hide_opacity childQnty">0</span>
                            <button class="more-btn" onclick="changeValue(1)">+</button>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($offer_detail['offer_type']=='child'){ ?>
                    <div class="c-data">
                        <div class="t-detail">
                            <h4><?= lang('ticket'); ?></h4>
                             <input type="hidden" class="childRate" value="<?php if($offer_detail['child_discount']== 0) {echo $offer_detail['child_price'];}else {echo $offer_detail['child_discount'];} ?>">
                             <input type="hidden" class="adultRate" value="0">
                            
                             <!-- <span><?= lang('minimum')?> 1 <?= lang('maximum') ?> 15</span> -->
                        </div>
                        <div class="t-detail t-price">
                            <h4 class="" style="color: #0084a1;"><?php if($offer_detail['child_discount']== 0) {echo get_currency($offer_detail['child_price'],$offer_detail['currency_type']);}else {echo get_currency($offer_detail['child_discount'],$offer_detail['currency_type']);} ?></h4>
                        </div>
                        <div class="c-detail">
                            <button class="less" onclick="changeValue1(-1)">-</button>
                            <span class="number childQnty">0</span>
                            <!-- <input type="hidden" class="adultQnty" value="0"> -->
                            <span class="hide_opacity adultQnty">0</span>
                            <button class="more" onclick="changeValue1(1)">+</button>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($offer_detail['pickup']=='Yes'){ ?>
                    <div class="ca-section">
                        <div class="cal">
                            <button class="data-cal" id="openCalendar">
                                <div class="c-tx picDate"  id="pickupDateText"><?= lang('pickup_date'); ?></div>
                                <img src="<?= base_url() ?>assets/images/calendar.png" alt="">
                            </button>
                            <div class="calendar-container">
                                <header class="calendar-header">
                                    
                                    <div class="calendar-navigation">
                                        <span id="calendar-prev"
                                              class="material-symbols-rounded">
                                            <img src="<?= base_url() ?>assets/images/arrow-blue.png" alt="">
                                        </span>
                                        <p class="calendar-current-date"></p>
                                        <span id="calendar-next"
                                              class="material-symbols-rounded">
                                              <img src="<?= base_url() ?>assets/images/arrow-blue-right.png" alt="">
                                            </span>
                                    </div>
                                </header>
                         
                                <div class="calendar-body">
                                    <ul class="calendar-weekdays">
                                        <li><?= lang('sun'); ?></li>
                                        <li><?= lang('mon'); ?></li>
                                        <li><?= lang('tue'); ?></li>
                                        <li><?= lang('wed'); ?></li>
                                        <li><?= lang('thu'); ?></li>
                                        <li><?= lang('fri'); ?></li>
                                        <li><?= lang('sat'); ?></li>
                                    </ul>
                                    <ul class="calendar-dates"></ul>
                                    <button class="cancel" id="closeCalendar"><?= lang('cancel'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="clo">
                            <button class="data-col" id="openTime">
                                <div class="c-tx picTime"><?= lang('hours'); ?></div>
                                <img src="<?= base_url() ?>assets/images/clock-blue.png" alt="">
                            </button>
                            <div class="hours-container">
                                <div class="he-hours">
                                    <h3><?= lang('enter_time'); ?></h3>
                                </div>
                                <div class="input-boxes">
                                    <div class="hm-input">
                                        <div class="hour-in">
                                            <input class="hour" type="text" value="<?= str_pad($offer_detail['visiting_start'], 2, '0', STR_PAD_LEFT) ?>">
                                            <h5><?= lang('hour'); ?></h5>
                                            <div name="hours" id="hoursDrop">
                                                <?php for ($i = 0; $i <= 23; $i++) { ?>
													<?php if($i >= $offer_detail['visiting_start'] && $i <= $offer_detail['visiting_end']){ ?>
                                                    <?php $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                                    <span class="hour-option" data-value="<?= $formattedHour ?>" style="margin-left:10px;"><?= $formattedHour ?></span>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        <span>:</span>
                                        <div class="min-in">
                                            <input class="minute" type="text" value="00">
                                            <h5><?= lang('minute'); ?></h5>
                                            <div name="minutes" id="minutesDrop">
                                                <?php for ($i = 0; $i <= 59; $i += 10) : ?>
                                                    <?php $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                                    <span class="minute-option" data-value="<?= $formattedHour ?>" style="margin-left:10px;"><?= $formattedHour ?></span>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <!-- <span>:</span> -->
                                        <!-- <div class="ap-btn">
                                            <button class="am-btn">AM</button>
                                            <button class="pm-btn">PM</button>
                                        </div> -->
                                    </div>
                                    
                                </div>  
                                 
                                                         
                            </div>
                            
                            
                        </div>
                    </div>
                    <?php } ?>
                    <input type="hidden" value="<?php echo $offer_detail['pickup'];?>" id="offer_pickup_process"> 
                </div>

               <div class="ti-sec">
                    <div class="h-detail">
                        <img src="<?= base_url() ; ?>assets/images/clock-s.png" alt="">
                        <span class="sk-text"><?php echo $offer_detail['traveling_time'];?> <?= lang('hours') ?>(<?= lang('approx') ?>.) </span>
                    </div>
		    <?php if($offer_detail['pickup']=='Yes'){ ?>
                    <div class="po-detail">
                        <img src="<?= base_url() ; ?>assets/images/car-s.png" alt="">
                        <span class="sk-text"> <?= lang('pickup_offered') ?></span>
                    </div>
		    <?php } 
		     if($offer_detail['refund']=='Yes'){ 
		    ?>
                    <div class="fr-detail">
                        <img src="<?= base_url() ; ?>assets/images/refund-s.png" alt="">
                        <span class="sk-text"><?= lang('free_refund') ?></span>
                    </div>
                    <?php } ?>
                </div>

                 <button class="bn-btn buy_btn" id="buy_btn"><?= lang('buy_now') ?>  <span class="selling_price"></span></button>
            </div>
            <div class="t-area" id="popupContent" style="top:12%;">
                <div class="image-header">
				<?php $decodedImages = array_map('json_decode', $imageArray); $singleimg = $decodedImages[0]->url; ?>
				<?php
					if (!empty($singleimg)) {
						$file_extension = pathinfo($singleimg, PATHINFO_EXTENSION);

						if (strtolower($file_extension) === 'mp4') {
							// Display video
							?>
							<video controls id="TconditionVedio">
								<source src="<?= base_url() . '/' . $singleimg; ?>" type="video/mp4">
								Your browser does not support the video tag.
							</video>
							<?php
						} else {
							// Display image
							?>
							<img src="<?= base_url() . '/' . $singleimg; ?>" alt="">
							<?php
						}
					}
				?>
                    <button class="cl-btn" id="closeButton">
                        <img src="<?= base_url(); ?>assets/images/orange-close.png" alt="">
                    </button>
                </div>
                <div class="name-off">
                   <?php 
                            if(strlen($offer_detail['name']) > 20) {
                                $cUname = substr(get_translation($offer_detail['name']), 0, 16).'...';
                            } else {
                                $cUname = get_translation($offer_detail['name']);
                            }
                        ?>
                        <?= ucfirst($cUname);?>  

                        <?php if($offer_detail['adult_discount']!=0){ ?>
                            <span><del></del><?= get_currency($offer_detail['adult_discount'],$offer_detail['currency_type'])  ?></span>
                        <?php }else{ ?>
                            <span><del></del><?= get_currency($offer_detail['adult_price'],$offer_detail['currency_type'])  ?></span>
                        <?php   } ?>

                </div>
                <div class="full-detail">
                     <p style="min-width: 320px;"><?php echo get_translation_desc($offer_detail['details']); ?></p>
                </div>

                 <!-- <button class="bn-btn buy_btn" id="buy_btn"><?= lang('buy_now') ?>  <span class="selling_price"></span></button> -->
                
            </div>
            
	    <div class="term-area" id="termPopupContent">
                <div class="image-header" style="position: relative;">
                    <button class="termCl-btn" id="termCloseButton">
                        <img src="<?= base_url(); ?>assets/images/orange-close.png" alt="" style="height: 25px;width: 25px;">
                    </button>
                </div>
                <div class="name-off">
                    <h3><?= lang('t_and_c'); ?></h3>

                </div>
                <div class="full-detail">
                     <p><?= $offer_detail['terms_and_condition']; ?></p>
				</div>
            </div>
        </div>
        <form action="<?= base_url('payment/purchaseOffer') ?>" id="buy_form" method="post">
            <input type="hidden" name="offername" value="<?php echo $offer_detail['name'] ?>">
            <input type="hidden" name="offer_id" class="offer_id" value="<?= $offer_detail['id']; ?>">
            <input type="hidden" name="picTime" class="picTime" value="">
            <input type="hidden" name="adult_Qnty" class="adult_Qnty" value="0">
            <input type="hidden" name="child_Qnty" class="child_Qnty" value="0">
            <input type="hidden" name="adult_Rate" class="adult_Rate" value="0">
            <input type="hidden" name="child_Rate" class="child_Rate" value="0">
            <input type="hidden" name="sellingPrice" class="sellingPrice" value="0">
            <input type="hidden" name="picDate" class="picDate" value="">
        </form>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
        let date = new Date();
        let year = date.getFullYear();
        let month = date.getMonth();

        const day = $(".calendar-dates");
        const currdate = $(".calendar-current-date");
        const prenexIcons = $(".calendar-navigation span");

        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

        const manipulate = () => {
            let date = new Date();
            let dayone = new Date(year, month, 1).getDay();
            let lastdate = new Date(year, month + 1, 0).getDate();
            let dayend = new Date(year, month, lastdate).getDay();
            let monthlastdate = new Date(year, month, 0).getDate();
            let lit = "";

            for (let i = dayone; i > 0; i--) {
                let inactiveDate = new Date(year, month - 1, monthlastdate - i + 1);
                lit += `<li class="inactive" data-date="${inactiveDate}">${monthlastdate - i + 1}</li>`;
            }

            for (let i = 1; i <= lastdate; i++) {
                let currentDate = new Date(year, month, i);
                let isToday =
                    i === date.getDate() &&
                    month === date.getMonth() &&
                    year === date.getFullYear()
                        ? "active"
                        : "";

                let isPastDate = currentDate < date;

                lit += `<li class="${isToday} ${isPastDate ? 'inactive' : ''}" data-date="${currentDate}">${i}</li>`;
            }

            for (let i = dayend; i < 6; i++) {
                let inactiveDate = new Date(year, month + 1, i - dayend);
                lit += `<li class="inactive" data-date="${inactiveDate}">${i - dayend + 1}</li>`;
            }

            currdate.text(`${months[month]} ${year}`);
            day.html(lit);

            $(".calendar-dates li").on("click", function () {
                const clickedDate = new Date($(this).data("date"));

                if (clickedDate >= date.setHours(0, 0, 0, 0)) {
                    const selectedDate = `${clickedDate.getDate()}/${clickedDate.getMonth() + 1}/${clickedDate.getFullYear()}`;
                    $('.data-cal .c-tx').text(selectedDate);
                    $('.calendar-container').removeClass('active');
                    $(".picDate").val(selectedDate);
                    setSessionValue("picDate", selectedDate);
                    setCookie("picDate", selectedDate, 1);
                    console.log(selectedDate);
                }
            });
        };

        manipulate();

        prenexIcons.on("click", function () {
            month = $(this).attr("id") === "calendar-prev" ? month - 1 : month + 1;
            if (month < 0 || month > 11) {
                date.setMonth(month);
                year = date.getFullYear();
                month = date.getMonth();
            } else {
                date.setMonth(month);
                console.log("Clicked month:", month);
            }
            manipulate();
        });
    });
$(document).ready(function() {
    var adultQuantity = getSessionOrCookieValue("adultQuantity");
    var childQuantity = getSessionOrCookieValue("childQuantity");
    var selectedTime = getSessionOrCookieValue("picDate");
    var selectedDate = getSessionOrCookieValue("picTime");

    if (adultQuantity) {
        // console.log(adultQuantity);
        var adultQnty = parseInt(adultQuantity);
        changeValue(adultQnty);
    }

    if (childQuantity) {
        // console.log(childQuantity);
        var childQnty = parseInt(childQuantity);
        changeValue1(childQnty);
    }

    if (selectedTime) {
        // console.log(selectedTime);
        $(".picDate").html(selectedTime);
        $(".picDate").val(selectedTime);
    }

    if (selectedDate) {
        // console.log(selectedDate);
        $(".picTime").html(selectedDate);
        $(".picTime").val(selectedDate);
    }
});

function getSessionOrCookieValue(key) {
    var sessionValue = getSessionValue(key);

    if (sessionValue !== null) {
        return sessionValue;
    } else {
        return getCookie(key);
    }
}

function getCookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');

    for(var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}

function getSessionValue(key) {
    return sessionStorage.getItem(key);
}
$(".hour").click(function(){
    $("#minutesDrop").css("display", "none");
    $("#hoursDrop").toggle();
});

$(".minute").click(function(){
    $("#minutesDrop").toggle();
    $("#hoursDrop").css("display", "none");
});

$(document).ready(function() {
    $(".hour-option").click(function() {
        var selectedHour = $(this).attr("data-value");
        $(".hour").val(selectedHour);
        const hourValue = selectedHour;
        const minuteValue = $('.minute').val();
        const selectedTime = padWithZero(hourValue, 2) + ':' + padWithZero(minuteValue, 2);
        $(".picTime").html(selectedTime);
        $(".picTime").val(selectedTime);
        setSessionValue("picTime", selectedTime);
		setCookie("picTime", selectedTime, 1);
    });

    $(".minute-option").click(function() {
        var selectedMinute = $(this).attr("data-value");
        $(".minute").val(selectedMinute);
        const hourValue = $('.hour').val();
		const minuteValue = selectedMinute;
		const selectedTime = padWithZero(hourValue, 2) + ':' + padWithZero(minuteValue, 2);
        $(".picTime").html(selectedTime);
		$(".picTime").val(selectedTime);
        $("#minutesDrop").css("display", "none");
		setSessionValue("picTime", selectedTime);
		setCookie("picTime", selectedTime, 1);
		closeHoursContainer();
    });
});


        </script>

<script>
    // $(".tooltip").tooltip();
    $(document).ready(function() {
    var id = $(".offer_id").val();
    var adultQnty = $(".adultQnty").text();
    var childQnty = $(".childQnty").text();
    var adultPrice = $(".adultprice").text();
    var childPrice =  $(".childprice").text();
    var totalChildPrice = adultQnty * adultPrice;
    var totalChildPrice =  childQnty * childPrice;
    var total = totalChildPrice + totalChildPrice;
    console.log(adultPrice);

});
    // $("#buy_btn").click(function(){
    //     var adultQnty = $(".adult_Qnty").val();
    //     var childQnty = $(".child_Qnty").val();

    //     if((adultQnty > 0 || childQnty > 0))
    //     {
    //         $("#buy_form").submit();
    //     }else{
    //         new Noty({
    //         text: "Please Select Minimum 1 Quantity",
    //         type: 'error',
    //         theme: 'sunset', 
    //         timeout: 2000,
    //         layout: 'topLeft',
    //         }).show();
    //     }
    // })



// $(".data-cal").click(function(){
//     console.log("object");
//     $(".calendar-container").toggleClass("active");  
// });
$(".cancel").click(function(){
    $(".calendar-container").removeClass("active");  
});
$(".data-col").click(function(){
    console.log("object");
    $(".hours-container").toggleClass("active");  
});
$(".cancel").click(function(){
    $(".hours-container").removeClass("active");  
})


// Assuming you have included jQuery library

// Assuming you have included jQuery library

// Assuming you have included jQuery library

$(document).ready(function() {
    $(".set-button").on("click", function() {
        // Get the values of hours, minutes, and seconds
        var hours = parseInt($(".h-show").text());
        var minutes = parseInt($(".m-show").text());
        var seconds = parseInt($(".s-show").text());

        // Print the selected time in console
        console.log("Selected Time: " + padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds));

        $(".picTimer").text(padZero(padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds)));
        $(".hours-container").removeClass("active");
    });

    $(".hours-container button").on("click", function() {
        // Your existing code for increasing and decreasing time values
        var timeUnit = $(this).data("time-unit");
        var currentValue = parseInt($("." + timeUnit + "-show").text());

        if ($(this).hasClass(timeUnit + "-increase")) {
            currentValue = (currentValue + 1) % (timeUnit === "h" ? 24 : 60);
        } else if ($(this).hasClass(timeUnit + "-decrease")) {
            currentValue = (currentValue - 1 + (timeUnit === "h" ? 24 : 60)) % (timeUnit === "h" ? 24 : 60);
        }

        $("." + timeUnit + "-show").text(padZero(currentValue));
    });

    // Function to pad zero to single-digit numbers
    function padZero(num) {
        return num.toString().padStart(2, "0");
    }
});



</script>

<script>
    $("#openCalendar, #closeCalendar").click(function(){
        $(".calendar-container").toggleClass('active');
        $('.hours-container').css('display', 'none'); // Corrected syntax
    });

    $("#openTime").click(function(){
        $(".hours-container").toggle('active');
        $(".calendar-container").removeClass('active'); // Corrected syntax
    });

         
         $("#buynow").click(function(){
                var qtyAdult = $(".qtyAdult").val();
                var qtyChild = $(".qtyChild").val();
                console.log('qtyAdult');
                console.log('qtyChild');
         });
    // gghj
    $(document).ready(function() {
    $(".hour-option").click(function() {
        var selectedHour = $(this).attr("data-value");
        $(".hour").val(selectedHour);
		const hourValue = selectedHour;
        const minuteValue = $('.minute').val();
        const selectedTime = padWithZero(hourValue, 2) + ':' + padWithZero(minuteValue, 2);
        $(".picTime").val(selectedTime);
        setSessionValue("picTime", selectedTime);
		setCookie("picTime", selectedTime, 1);
        $("#hoursDrop").css("display", "none");
    });

    $(".minute-option").click(function() {
        var selectedMinute = $(this).attr("data-value");
        $(".minute").val(selectedMinute);
        const hourValue = $('.hour').val();
		const minuteValue = selectedMinute;
		const selectedTime = padWithZero(hourValue, 2) + ':' + padWithZero(minuteValue, 2);
		$(".picTime").val(selectedTime);
        $("#minutesDrop").css("display", "none");
		closeHoursContainer();
    });

});


function setSelectedTime() {
    const hourValue = $('.hour').val();
    const minuteValue = $('.minute').val();
    
    // if (selectedPeriod !== '') {
        const selectedTime = padWithZero(hourValue, 2) + ':' + padWithZero(minuteValue, 2);
        $(".picTime").val(selectedTime);
        console.log(selectedTime);
        setSessionValue("picTime", selectedTime);
		setCookie("picTime", selectedTime, 1);

        $('.picTime').html(selectedTime);
    // } else {
    //     $('.c-tx').text('Select AM or PM');
    // }
    
    closeHoursContainer(); 
}
    function closeHoursContainer() {
        $('.hours-container').css('display', 'none');
    }
// Utility function to pad a number with zeros
function padWithZero(value, length) {
    return String(value).padStart(length, '0');
}

$(document).ready(function() {
    function selectAM() {
        selectedPeriod = 'AM';
        $('.am-btn').addClass('selected');
        $('.pm-btn').removeClass('selected');
    }

    function selectPM() {
        selectedPeriod = 'PM';
        $('.pm-btn').addClass('selected');
        $('.am-btn').removeClass('selected');
    }

    // Assuming you have click events for your buttons
    $('.am-btn').on('click', selectAM);
    $('.pm-btn').on('click', selectPM);
});
function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
$(document).ready(function(){
	deleteCookie('redirect_from');
});
</script>