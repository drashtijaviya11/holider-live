
<script src="<?php echo base_url(); ?>assets/js/calendar.js"></script>
<style>

.calendar-container.active{
    background:#f1fbff !important;
}
	.mySlides{
		display:none;
	}
    .mySlides img {
    height: 400px;
    object-fit: cover;
}
.mySlides video {
    height: 400px;
    object-fit: cover;
}
.video_image_thumbnail{
    height: 110px;
    object-fit: cover;
}
	
/* -------------------------------------calender-design--------------------------- */

.calendar-container {
    display: none;
}

.calendar-container.active {
    width: 21%;
    border-radius: 10px;
    background: #dff9fff8;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.10);
    position: absolute;
    z-index: 100;
    /* top: 100%; */
    display: block;
    right: 2%;
}
 
.calendar-container header {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 8px;
    padding-bottom: 8px;
    gap: calc(40*var(--aspect-ratio));
}
 
header .calendar-navigation {
    display: flex;
    flex-direction: row;
    align-items: center;
}
 
header .calendar-navigation span {
    margin: 0 1px;
    cursor: pointer;
    text-align: center;
    border-radius: 50%;
    user-select: none;

}

#calendar-prev {
    margin-right: 20px;
}

#calendar-next {
    margin-left: 20px;
}


header .calendar-navigation span img {
    width: 10px;
    height: 10px;
    padding: 0px;
    margin: 10px;
}
 
/* .calendar-navigation span:last-child {
    margin-right: -10px;
} */
 
header .calendar-navigation span:hover {
    background: #f2f2f2;
}
 
header .calendar-current-date {
    font-weight: 600;
    font-size: 10px;
    margin: 0 !important;
    color: #009CBE;
}
 
.calendar-body {
    padding: 0px;
    width: 100%;
}
 
.calendar-body ul {
    list-style: none;
    flex-wrap: wrap;
    padding-top: 0 !important;
    display: flex;
    text-align: center;
    margin: 0 !important;
    padding: 3%;
    border-bottom: calc(.5*var(--aspect-ratio)) solid  #0257695c;

}

.calendar-body hr {
    color: rgba(143, 143, 143, 0.36);
    height: calc(.2*var(--aspect-ratio));
}
 
.calendar-body .calendar-dates {
    margin-bottom: 10px;
    margin-left: 0 !important;
    padding-left: 2% !important;
}
 
.calendar-body li {
    width: calc(100% / 7);
    font-size: calc(6*var(--aspect-ratio));
    color: #025769;
    font-weight: 600;
}
 
.calendar-body .calendar-weekdays li {
    cursor: default;
    font-weight: 600;
    color: #3F3F3F !important;
}
 
.calendar-body .calendar-dates li {
    margin-top: calc(7*var(--aspect-ratio));
    position: relative;
    z-index: 1;
    cursor: pointer;
}
 
.calendar-dates li.inactive {
    color: #8E8E8E;
}
 
.calendar-dates li.active {
    color: #fff;
}
 
.calendar-dates li::before {
    position: absolute;
    content: "";
    z-index: -1;
    top: 50%;
    left: 50%;
    width: calc(12*var(--aspect-ratio));
    height: calc(12*var(--aspect-ratio));
    border-radius: 50%;
    transform: translate(-50%, -50%);
}
 
.calendar-dates li.active::before {
    background: #00B5DC;
}
 
.calendar-dates li:not(.active):hover::before {
    background: #e4e1e1;
}

.calendar-body .cancel {
    position: relative;
    margin-top: 5px;
    margin-left: 68%;
    margin-bottom: 11px;
    width: 82px;
    height: 36px;
    border: none;
    border-radius: 9%;
    background: rgba(0, 52, 69, 0.71);
    color: #fff;
    font-weight: 600;
    font-size: 20px;
    letter-spacing: 1px;
}

.ca-section .col {
    position: relative;
}

/* Close Calendar */
.clo .data-col {
    position: relative;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: calc(4*var(--aspect-ratio));
    width: calc(75*var(--aspect-ratio));
    height: calc(16*var(--aspect-ratio));
    border-radius: 8px;
    border: 0.5px solid #025769;
    background: #FFF;    
    box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.08);
}

.data-col .cl-tx {
    color: #006277;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(7*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(11*var(--aspect-ratio)); 
}

.data-col img {
    width: calc(9*var(--aspect-ratio));
    height: calc(9*var(--aspect-ratio));
}

.hours-container {
    display: none;
    position: absolute;
    z-index: 100;
    /* / top: 80%; / */
    right: 2%;
    width: 21%; 
    /* / height: calc(85*var(--aspect-ratio)); / */
    border-radius: 10px;
    background: #dff9fff8;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.10);
    padding: 4px;
}

.hours-container .he-hours {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
}

.he-hours h3 {
    font-family: "Poppins" ,sans-serif;
    font-size: calc(6*var(--aspect-ratio));
    font-weight: 600;
    color: #003541;
    margin: 0 !important;
}

.hours-container .input-boxes {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 100%;
    /* / margin-top: 10%; / */
}

.input-boxes .hm-input {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 8%;
}

.hm-input .hour-in {
    display: flex;
    flex-direction: column;
}

.hour-in h5 {
    margin: 0;
    font-size: calc(6*var(--aspect-ratio));
    font-family: "Poppins" ,sans-serif;
    font-weight: 600;
    color: #00ccff;
    margin-top: 5% !important;
}

.hour-in input {
    width: 100%;
    /* / height: calc(20*var(--aspect-ratio)); / */
    border-radius: 5px;
    border: none !important;
    background-color: #0094b64b;
    outline: none;
    box-shadow: none !important;
}

.hour {
    font-family: "Lora" ,serif;
    font-size: calc(12*var(--aspect-ratio));
    font-weight: 700;
    color: #00446b;
    text-align: center;
}

.hm-input .min-in {
    display: flex;
    flex-direction: column;
}

.min-in h5 {
    margin: 0;
    font-size: calc(6*var(--aspect-ratio));
    font-family: "Poppins" ,sans-serif;
    font-weight: 600;
    color: #00ccff;
    margin-top: 5% !important;
}

.min-in input {
    width: 100%;
    /* / height: calc(20*var(--aspect-ratio)); / */
    border-radius: 5px;
    border: none !important;
    background-color: #0094b64b;
    outline: none;
    box-shadow: none !important;
}

.minute {
    font-family: "Lora" ,serif;
    font-size: calc(12*var(--aspect-ratio));
    font-weight: 700;
    color: #00446b;
    text-align: center;
}

.hm-input span {
    font-family: "Lora" ,serif;
    font-size: calc(24*var(--aspect-ratio));
    color: #007bff;
    font-weight: 800;
    line-height: normal;
    margin-top: -25%;
}

.input-boxes .ap-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-left: 15%;
    margin-top: -2%;
}

.ap-btn .am-btn {
    width: calc(25*var(--aspect-ratio));
    height: calc(15*var(--aspect-ratio));
    border: none;
    background-color: #0094b64b;
    border-radius: calc(5*var(--aspect-ratio)) calc(5*var(--aspect-ratio)) 0 0;
    color: #002c36;
    font-family: "Poppins" ,sans-serif;
    font-weight: 600;
    font-size: calc(7*var(--aspect-ratio));
}

.ap-btn .pm-btn {
    width: calc(25*var(--aspect-ratio));
    height: calc(15*var(--aspect-ratio));
    border: none;
    background-color: #0094b64b;
    border-radius: 0 0 calc(5*var(--aspect-ratio)) calc(5*var(--aspect-ratio));
    color: #002c36;
    font-family: "Poppins" ,sans-serif;
    font-weight: 600;
    font-size: calc(7*var(--aspect-ratio));
}

.am-btn.selected,
.pm-btn.selected {
    background-color: #007bff; /* Green background */
    color: white;
}

.co-btn {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    margin-top: 3%;
    gap: 5%;
}

.co-btn .h-can {
    width: calc(30*var(--aspect-ratio));
    height: calc(10*var(--aspect-ratio));
    border: none;
    background-color: transparent;
    font-family: "Poppins" ,sans-serif;
    font-weight: 600;
    color: #003A46;
    font-size: calc(6*var(--aspect-ratio));
}

.co-btn .h-ok{
    width: calc(20*var(--aspect-ratio));
    height: calc(10*var(--aspect-ratio));
    border: none;
    background-color: transparent;
    font-family: "Poppins" ,sans-serif;
    font-weight: 600;
    color: #0099b8;
    font-size: calc(6*var(--aspect-ratio));

}
#hoursDrop {
    display: none;
    color: #fff;
    background: #9edcea;
    position: absolute;
    grid-template-columns: 1fr;
    top: 58px;
    /* right: 52px; */
    height: 200px;
    overflow-y: auto;
    width: 48%;
    font-size: 32px;
    font-weight: 700;
    border-radius: 5px;
    z-index: 100;
    font-family: "Lora" ,serif;
    overflow-x: hidden;
    text-align: center;
}
#minutesDrop {
    display: none;
    background: #9edcea;
    position: absolute;
    grid-template-columns: 1fr;
    top: 58px;
    /* right: 0px; */
    height: 200px;
    overflow: scroll;
    width: 48%;
    font-size: 32px;
    font-weight: 700;
    border-radius: 5px;
    z-index: 100;
    font-family: "Lora" ,serif;
    text-align: center;
}
.box-light-2 {
    box-shadow: 0px 0px 6px 3px #d7eaed;
    border-radius: 10px 10px 10px 10px;
    padding: 10px;
}


	</style>
<section>
 <div class="container">
   <div class="row py-3">
     <div class="col-md-9 my-2">
	   <div class="box-light-2 px-3 py-3">
		<?php $cUname = get_translation($offer_detail['name']); ?>
	     <h1 class="fw-bold dark-blue f-poppins"><?= $cUname ?></h1>
		 <div class="">
		 <?php 		$rating = isset($average_rating) ? floor($average_rating) : '0';
                    $fullStars = floor($rating);
					$hasHalfStar = ($rating - $fullStars) >= 0.5;
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
		 
		 <?php foreach ($imageArray as $index => $imagePath) : 
			$decodedImage = json_decode($imagePath, true);
			$mediaType = pathinfo($decodedImage['url'], PATHINFO_EXTENSION); // Get the file extension
			if ($mediaType == 'mp4') :
				// Display video
			?>
					<div class="mySlides">
						<video class="py-2 w-100 free-boat-thumnail" controls>
							<source src="<?= base_url('/' . $decodedImage['url']) ?>" type="video/mp4">
							
						</video>
					</div>
			<?php else : ?>
					<!-- Display image -->
					<div class="mySlides">
						<img src="<?= base_url('/' . $decodedImage['url']) ?>" class="py-2 w-100 free-boat-thumnail">
					</div>
			<?php endif; ?>
		<?php endforeach; ?>

		 <div class="row">
		   
		   <?php foreach ($imageArray as $index => $imagePath) : 
				$decodedImage = json_decode($imagePath, true);
				$mediaType = pathinfo($decodedImage['url'], PATHINFO_EXTENSION); // Get the file extension
				
				if ($mediaType == 'mp4') :
					// Display video
			?>
					<div class="col-md-2 col-6"  muted loop autoplay>
						<video onclick="currentSlide(<?= $index + 1 ?>)" class="py-2 w-100 video_image_thumbnail" controls>
							<source src="<?= base_url('/' . $decodedImage['url']) ?>" type="video/mp4">
							
						</video>
					</div>
			<?php else : ?>
					<!-- Display image -->
					<div class="col-md-2 col-6">
						<img src="<?= base_url('/' . $decodedImage['url']) ?>" onclick="currentSlide(<?= $index + 1 ?>)" alt="Image <?= $index + 1 ?>" class="py-2 w-100 video_image_thumbnail">
					</div>
			<?php endif; ?>
			<?php endforeach; ?>

		   
		 </div>
		 <h3 class="text-sky fw-600 f-poppins py-3"><?php echo lang('offer_detail')?>:</h3>
		 <p class="f-poppins"><?php echo get_translation_desc($offer_detail['details']);?></p><br>
	     <?php if($offer_detail['terms_and_condition'] != ''){  ?>

        <div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">
           	<div class="accordion-item">
             	<h2 class="accordion-header" id="flush-headingOne">
               		<button class="accordion-button collapsed f-poppins text-decoration-underline" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                 		<h2><?php echo lang('t_and_c')?></h2>
               		</button>
             	</h2>
				<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
					<div class="accordion-body">
						<ul>
						<li class="f-poppins">
							<?php echo $offer_detail['terms_and_condition']; ?>
						</li><br>
						
						</ul>
					</div>
				</div>
           	</div>
        </div>
		<br>
		<?php } ?>
		 
	   </div>
	 </div>
	 <div class="col-md-3 my-2">
	   <div class="box-light-2 px-3 py-3 free-boat-right-box">
        <?php if($offer_detail['offer_type']=='both') { ?>
	     <div class="row row-media">
		    <div class="col-md-6 col-sm-6 count-media w-media">
	         <h3 class="f-poppins fw-600 dark-blue fs-5"><?php echo lang('adult')?> (12-99)</h3>
			 <input type="hidden" class="adultRate" value="<?php if($offer_detail['adult_discount']==0){ echo $offer_detail['adult_price'];}else{ echo $offer_detail['adult_discount']; } ?>">
		     
			 <div class="t-detail t-price"><h4 class="" style="color: #0084a1;font-size: 15px;"><?php if($offer_detail['adult_discount']== 0){ echo get_currency($offer_detail['adult_price'],$offer_detail['currency_type']);}else{ echo get_currency($offer_detail['adult_discount'],$offer_detail['currency_type']); } ?></h4></div>
		   </div>
		   <div class="col-md-6 col-sm-6  w-media">
		     <div class="inputs d-flex flex-row justify-content-center mt-2 f-Moderno" style="height:50px;">
			   <button class="bg-white border-0" onclick="changeValue(-1)"><img src="<?php echo base_url(); ?>desktop_assets/images/minus_icon.png"></button>
		       <input class="text-center form-control border-0 rounded-0 count-width fs-5 fw-bold text-sky adult_qty_input" type="text" value="0"  maxlength="1" readonly /> 
		       <button class="bg-white border-0" onclick="changeValue(1)"><img src="<?php echo base_url(); ?>desktop_assets/images/plus_icon.png"></button>
			 </div>
		   </div>
		 </div>
		 <br><br>
         <div class="row row-media">
		   <div class="col-md-6 col-sm-6 count-media w-media">
	         <h3 class="f-poppins fw-600 dark-blue fs-5"> <?php echo lang('child')?> (2-11)</h3>
			 <input type="hidden" class="childRate" value="<?php if($offer_detail['child_discount']== 0) {echo $offer_detail['child_price'];}else {echo $offer_detail['child_discount'];} ?>">
		     <!-- <span class="f-poppins fs-12"><?php echo lang('minimum')?> 1, <?php echo lang('maximum')?> 15</span> -->
			 <div class="t-detail t-price"><h4 class="" style="color: #0084a1;font-size: 15px;"><?php if($offer_detail['child_discount']== 0) {echo get_currency($offer_detail['child_price'],$offer_detail['currency_type']);}else {echo get_currency($offer_detail['child_discount'],$offer_detail['currency_type']);} ?></h4></div>
		   </div>
		   <div class="col-md-6 col-sm-6  w-media">
		     <div class="inputs d-flex flex-row justify-content-center mt-2 f-Moderno" style="height:50px;">
			   <button class="bg-white border-0" onclick="changeValue1(-1)"><img src="<?php echo base_url(); ?>desktop_assets/images/minus_icon.png"></button>
		       <input class="text-center form-control border-0 rounded-0 count-width fs-5 fw-bold text-sky child_qty_input" type="text" value="0"  maxlength="1" readonly/> 
		       <button class="bg-white border-0" onclick="changeValue1(1)"><img src="<?php echo base_url(); ?>desktop_assets/images/plus_icon.png"></button>
			 </div>
		   </div>
		 </div>
         <?php } ?>

        <?php if($offer_detail['offer_type']=='adult') { ?>
            <div class="row row-media">
		    <div class="col-md-6 col-sm-6 count-media w-media">
	         <h3 class="f-poppins fw-600 dark-blue fs-5"><?php echo lang('ticket')?></h3>
			 <input type="hidden" class="adultRate" value="<?php if($offer_detail['adult_discount']==0){ echo $offer_detail['adult_price'];}else{ echo $offer_detail['adult_discount']; } ?>">
		     <input type="hidden" class="childRate" value="0">
             <!-- <span class="f-poppins fs-12"><?php echo lang('minimum')?> 1,<?php echo lang('maximum')?> 15</span> -->
			 <div class="t-detail t-price"><h4 class="" style="color: #0084a1;font-size: 15px;"><?php if($offer_detail['adult_discount']==0){ echo get_currency($offer_detail['adult_price'],$offer_detail['currency_type']);}else{ echo get_currency($offer_detail['adult_discount'],$offer_detail['currency_type']); } ?></h4></div>
		   </div>
		   <div class="col-md-6 col-sm-6  w-media">
		     <div class="inputs d-flex flex-row justify-content-center mt-2 f-Moderno" style="height:50px;">
			   <button class="bg-white border-0" onclick="changeValue(-1)"><img src="<?php echo base_url(); ?>desktop_assets/images/minus_icon.png"></button>
		       <input class="text-center form-control border-0 rounded-0 count-width fs-5 fw-bold text-sky adult_qty_input" type="text" value="0"  maxlength="1" readonly /> 
               <input class="text-center form-control border-0 rounded-0 count-width fs-5 fw-bold text-sky child_qty_input" type="hidden" value="0"  maxlength="1" readonly/> 
              
               <button class="bg-white border-0" onclick="changeValue(1)"><img src="<?php echo base_url(); ?>desktop_assets/images/plus_icon.png"></button>
			 </div>
		   </div>
		 </div>
		 <br>
        <?php } ?>
        <?php if($offer_detail['offer_type']=='child') { ?>
            <div class="row row-media">
		   <div class="col-md-6 col-sm-6 count-media w-media">
	         <h3 class="f-poppins fw-600 dark-blue fs-5"> <?php echo lang('ticket')?> </h3>
			 <input type="hidden" class="childRate" value="<?php if($offer_detail['child_discount']== 0) {echo $offer_detail['child_price'];}else {echo $offer_detail['child_discount'];} ?>">
             <input type="hidden" class="adultRate" value="0">
		     
             <!-- <span class="f-poppins fs-12"><?php echo lang('minimum')?> 1, <?php echo lang('maximum')?> 15</span> -->
			 <div class="t-detail t-price"><h4 class="" style="color: #0084a1;font-size: 15px;"><?php if($offer_detail['child_discount']== 0) {echo get_currency($offer_detail['child_price'],$offer_detail['currency_type']);}else {echo get_currency($offer_detail['child_discount'],$offer_detail['currency_type']);} ?></h4></div>
		   </div>
		   <div class="col-md-6 col-sm-6  w-media">
		     <div class="inputs d-flex flex-row justify-content-center mt-2 f-Moderno" style="height:50px;">
			   <button class="bg-white border-0" onclick="changeValue1(-1)"><img src="<?php echo base_url(); ?>desktop_assets/images/minus_icon.png"></button>
		       <input class="text-center form-control border-0 rounded-0 count-width fs-5 fw-bold text-sky child_qty_input" type="text" value="0"  maxlength="1" readonly/> 
               <input class="text-center form-control border-0 rounded-0 count-width fs-5 fw-bold text-sky adult_qty_input" type="hidden" value="0"  maxlength="1" readonly /> 
		       
               <button class="bg-white border-0" onclick="changeValue1(1)"><img src="<?php echo base_url(); ?>desktop_assets/images/plus_icon.png"></button>
			 </div>
		   </div>
		 </div>
        <?php } ?>
		 <br>
         <?php if($offer_detail['pickup']=='Yes'){ ?>
         <div class="row">
           <div class="col-md-12">
		     <div class="d-flex" id="openCalendar">
			   <input class="form-control f-poppins date-text fw-600 fs-20 dark-blue picDate" type="text" placeholder="<?= lang('pickup_date'); ?>">
			   <img src="<?php echo base_url(); ?>desktop_assets/images/date_icon.png" width="40px" class="date-img">
		     </div>
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
			 <br>
			 <div class="d-flex" id="openClock">
			   <input class="form-control f-poppins date-text fw-600 fs-20 dark-blue picTime" type="text" placeholder="<?= lang('hours'); ?>">
			   <img src="<?php echo base_url(); ?>desktop_assets/images/clock_icon.png"  width="45px" class="date-img">
		     </div>
			 <div class="hours-container">
				<div class="he-hours">
					<h3><?= lang('enter_time'); ?></h3>
				</div>
				<div class="input-boxes">
					<div class="hm-input">
						<div class="hour-in">
							<input class="hour" type="text" value="<?= str_pad($offer_detail['visiting_start'], 2, '0', STR_PAD_LEFT) ?>">
							<h5><?= lang('hour'); ?></h5>
							<div name="hours" id="hoursDrop" >
								<?php for ($i = 0; $i <= 23; $i++) { ?>
									<?php if($i >= $offer_detail['visiting_start'] && $i <= $offer_detail['visiting_end']){ ?>
									<?php $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
									<span class="hour-option" data-value="<?= $formattedHour ?>" style="margin-left:10px;cursor: pointer;"><?= $formattedHour ?></span></br>
								<?php } } ?>
							</div>
						</div>
						<!-- <span>:</span> -->
						<div class="min-in">
							<input class="minute" type="text" value="00">
							<h5><?= lang('minute'); ?></h5>
							<div name="minutes" id="minutesDrop">
								<?php for ($i = 0; $i <= 59; $i=$i+5) { ?>
									<?php $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
									<span class="minute-option" data-value="<?= $formattedHour ?>" style="margin-left:10px;cursor: pointer;"><?= $formattedHour ?></span></br>
								<?php  } ?>
							</div>
						</div>
					</div>
					
				</div>                    
			</div>
		   </div>
		 </div>	
         <?php }?>
         <input type="hidden" value="<?php echo $offer_detail['pickup']; ?>" id="offer_pickup_process"> 
	   </div>
      
       	
	   <button class="f-poppins btn-bg-2 border-0 rounded-2 fs-27 py-1 w-100 mt-3 btn-text buy_btn" id="buy_btn"><?php echo lang('buy_now')?><strong>  <span class="selling_price"></span></strong></button>
	   <?php if($offer_detail['pickup']=='Yes'){ ?>
        <div class="condition-box-bg box-light-2" style="margin-top:15px;">
					<img src="<?php echo base_url(); ?>desktop_assets/images/car_icon.png" class="offer-img-media" width="25px" style="margin-top:-10px;"> <span class="f-poppins fw-600 dark-blue fs-5"><?php echo lang('pickup_offered')?></span>
				</div>
				 <div class="condition-box-bg box-light-2" style="margin-top:15px;">
       <img src="<?php echo base_url(); ?>desktop_assets/images/clock_icon.png" class="offer-img-media" width="25px" style="margin-top:-10px;"> 
       <span class="f-poppins fw-600 dark-blue fs-5"><?php echo $offer_detail['traveling_time'];?>  <?php echo lang('hours')?> (<?php echo lang('approx')?>.)</span>
       </div>
		   <?php } 
		     if($offer_detail['refund']=='Yes'){ 
		    ?>
				<div class="condition-box-bg box-light-2" style="margin-top:15px;">
					<img src="<?php echo base_url(); ?>desktop_assets/images/circle_doller_icon.png" class="offer-img-media" width="25px" style="margin-top:-10px;"> <span class="f-poppins fw-600 dark-blue fs-5"><?php echo lang('free_refund')?></span>
				</div>
		   <?php } ?>
	 </div>
   </div>
 </div>
</section>
<form action="<?= base_url('payment/purchaseOffer') ?>" id="buy_form" method="post">
            
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
	    function setSessionValue(key, value) {
        sessionStorage.setItem(key, value);
    }
	function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
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



let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = $(".mySlides");
                let dots = $(".demo");
                let captionText = $("#caption");

                if (n > slides.length) { slideIndex = 1; }
                if (n < 1) { slideIndex = slides.length; }

                slides.hide();
                dots.removeClass("active");

                $(slides[slideIndex - 1]).show();
                $(dots[slideIndex - 1]).addClass("active");

                captionText.html($(dots[slideIndex - 1]).attr("alt"));
            }

            // Add event handlers for next/previous buttons if needed
            $("#prevButton").click(function () {
                plusSlides(-1);
            });

            $("#nextButton").click(function () {
                plusSlides(1);
            });

            // Add event handlers for dot indicators if needed
            $(".demo").click(function () {
                currentSlide($(this).data("slide-index"));
            });

	$("#buy_btn").click(function(){
        var adultQnty = $(".adult_Qnty").val();
        var childQnty = $(".child_Qnty").val();
        var pickupCheck = $('#offer_pickup_process').val();
        if(pickupCheck=='Yes'){
                var picDate = $(".picDate").val();
                var picTime = $(".picTime").val();
                if ((adultQnty > 0 || childQnty > 0) && (picDate !== '' && picTime !== '')) {
                    $("#buy_form").submit();
                } else {
                    if (adultQnty == 0 && childQnty == 0) {
                        showError("<?= lang('select_qnty'); ?>");
                    } else if (picTime === '') {
                        showError("<?= lang('select_time'); ?>");
                    } else if  (picDate === '') {
                        showError("<?= lang('select_date'); ?>");
                    }
                }
        }else{
            if (adultQnty > 0 || childQnty > 0) {
                    $("#buy_form").submit();
                } else {
                    if (adultQnty == 0 && childQnty == 0) {
                        showError("<?= lang('select_qnty'); ?>");
                    }
                }
        }
        

		// Function to show error using Noty
		function showError(message) {
			new Noty({
				text: message,
				type: 'error',
				theme: 'sunset',
				timeout: 2000,
				layout: 'topLeft',
			}).show();
		}
		})
function changeValue(amount) {
    var offer_id = $(".offer_id").val();
	var num1 = parseFloat($('.adult_qty_input').val()); 
    var num2 = parseFloat(amount);

	var newValue = num1 + num2;
	// var newValue = qty + amount;
	// alert(newValue);
	if (newValue >= 0 && newValue <= 15) {
   		$(".adult_qty_input").val(newValue);
		   apply(offer_id);
	}
    setSessionValue("adultQuantity", newValue);
	setCookie("adultQuantity", newValue, 1);
}

function changeValue1(amount) {
    var offer_id = $(".offer_id").val();
	var num1 = parseFloat($('.child_qty_input').val()); 
    var num2 = parseFloat(amount);
	var newValuechild = num1 + num2;
	// alert(newValue);
	if (newValuechild >= 0 && newValuechild <= 15) {
   			$(".child_qty_input").val(newValuechild);
			apply(offer_id);
	}
    setSessionValue("childQuantity", newValuechild);
	setCookie("childQuantity", newValuechild, 1);
}
function apply(id){

var adultQnty = $(".adult_qty_input").val();
var childQnty = $(".child_qty_input").val();
var adultRate = $(".adultRate").val();
var childRate = $(".childRate").val();
var sellingVal = $(".selling_price").text();
// var picDate = $(".picDate").text();
// var picTime = $(".picTime").text();

$(".adult_Qnty").val(adultQnty)
$(".child_Qnty").val(childQnty)
$(".adult_Rate").val(adultRate)
$(".child_Rate").val(childRate)
$(".sellingPrice").val(sellingVal)
// $(".picDate").val(picDate)
// $(".picTime").val(picTime)
// console.log(picTime);
// if(adultQnty > 0 || childQnty > 0){
$.ajax({
    url : "<?= base_url('dashboard/get_total_price') ?>",
    data : {id:id,adultQnty:adultQnty,childQnty:childQnty,childPrice:childRate,adultPrice:adultRate},
    dataType : "json",
    type : "POST",
	// beforeSend: function() {
	// 	$('#body-preloader').css('display', 'block');
	// },
    success : function(res)
    {
		// $('#body-preloader').css('display', 'none');
        $(".selling_price").html(res.totalPrice );
        // $(".sellingValue").val(res.totalPrice);      
    }
});
// }else{
//     new Noty({
//     text: "Please Select Minimum 1 Quantity",
//     type: 'error',
//     theme: 'sunset', 
//     timeout: 2000,
//     layout: 'topLeft',
//     }).show();
// }

};





    // calender-popup

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
	$("#openClock").click(function(){
            $(".hours-container").toggle();
            $('.calendar-container').removeClass('active');
        });


	$("#openCalendar , #closeCalendar").click(function(){
            $(".calendar-container").toggleClass('active');
            $('.hours-container').css('display', 'none');
        });

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
		setSessionValue("picTime", selectedTime);
		setCookie("picTime", selectedTime, 1);
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
