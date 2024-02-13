
<style>
.offer-container .top-list {
    width: 100%;
    height: auto;
    position: sticky;
    padding: 5% 1%;
    background-color: white;
    margin-top: 0 !important;
    / padding-left: 0px !important; /
    overflow: auto;
    scrollbar-width: none;
}

.top-list .list {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: calc(12*var(--aspect-ratio));
    padding: 0 !important;
    white-space: nowrap;
}
.offer-list-1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: calc(10*var(--aspect-ratio));
    position: relative;
}

.offer-view {
    width: 92%;
    height: auto;
    display: flex;
    flex-direction: column;
    margin: auto;
    / margin: calc(3*var(--aspect-ratio)); /
    border-radius: 4%;
    background: #F4FDFF;
    box-shadow: 0px 0px 3px 1px rgba(0, 37, 45, 0.26);
}
.rating_area img {
    width: 20px;
    margin-top: 0;
    /* margin-bottom: 10px !important;
    padding-bottom: 10px; */
}
.blank_star_css {
    height: 22px !important;
    width: 22px !important;
}
.half_star_css{
    height: 25px !important;
    width: 25px !important;
}
.tooltip {
   visibility: hidden;
   background-color: rgba(0, 0, 0, 0.7);
   color: #fff;
   text-align: center;
   border-radius: 5px;
   position: absolute;
   z-index: 999;
   bottom: 100%;
   padding: 5px;
   white-space: nowrap;
   opacity: 0;
   transition: opacity 0.3s;
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
/* Show the tooltip on hover */
.f-col:hover .tooltip {
   visibility: visible;
   opacity: 1;
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
    .top-list .l-item{
        cursor: pointer;
    }
    .offer-list ,.offer-container{
    overflow-y: auto; /* or overflow: scroll; */
    overflow-x:hidden !important;
    /* Other styles... */
}

    .list .active {
    border-bottom: 2px solid #0098B9;
}
#signupModal {
    top: 35% !important;
}
.top-list{
    position: sticky;
    top: 0;
    z-index: 1;
}
#video{
	width: 100%;
    border-radius: 10px 10px 0 0;
    height: calc(70*var(--aspect-ratio));
}
.offer-list-1 {
		margin-bottom: 20px;
	}
</style>
        
<div class="offer-container">
    <div class="top-list">
        <ul class="list">
            <?php foreach ($category as $cat) { ?>
                <li class="l-item" data="#<?= url_title($cat['category_name'], 'underscore', true); ?>">
                    <a class="l-name" href="#<?= url_title($cat['category_name'], 'underscore', true); ?>" data-id="<?php echo $cat['id']; ?>">
                        <?= get_categories_translation($cat['category_name']); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="offerList">
        <?php foreach ($category as $cat) { 
            $offer_condition = array('conditions' => ['categories' => $cat['id']]);
            $categories_offer =$this->QueryModel->selectSingleRow('offer',$offer_condition);
            if(!empty($categories_offer)){
            ?>
            <div id="<?= url_title($cat['category_name'], 'underscore', true); ?>" class="offer-list-1">
                <?php foreach ($offers as $offer) {
                    if ($offer['categories'] == $cat['id']) { ?>
                    <a href="<?= base_url();?>offer/single_offer/<?= $offer['id'];?>" style="width:100%;">
                        <div class="offer-view">  
                            <!-- onclick="view_offer(<?php echo $offer['id'] ?>)" -->
                            <div class="first-view">
                                <?php
                                    if (!empty($offer['first_image'])) {
                                        $file_extension = pathinfo($offer['first_image'], PATHINFO_EXTENSION);
                                            if (strtolower($file_extension) === 'mp4') { ?>
                                                <video controls id="video">
                                                    <source src="<?= base_url() . '/' . $offer['first_image']; ?>" type="video/mp4">
                                                </video>
                                                <?php
                                            } else { ?>
                                                <img src="<?= base_url() . '/' . $offer['first_image']; ?>" alt="">
                                        <?php }
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
        <?php } } ?>
    </div>
</div>

<script>
// Function to delete a value from session storage
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
$(document).ready(function () {
    $('.l-item').on('click', function (event) {
        event.preventDefault(); // Prevent default behavior of anchor tag
        var targetId = $(this).find('.l-name').attr('href');
        var targetElement = $(targetId);
        if (targetElement.length) {
            $('.offer-container').animate({
                scrollTop: targetElement.offset().top - $('.offer-container').offset().top + $('.offer-container').scrollTop() - 40
            }, 400);
        }
    });
});
    $('.offer-container').scroll(function () {
        var scrollPosition = window.screenY;
        var cardHeight = $('.offer-container').height();
        var buffer = 100;
        $('.offer-list-1').each(function () {
            var sectionId = $(this).attr('id');
            var sectionOffset = $(this).offset().top - $('.offer-container').offset().top;
            if (scrollPosition >= sectionOffset - buffer && scrollPosition < (sectionOffset + cardHeight + buffer)) {
                $('.l-item').removeClass('active');
                $('a[href="#' + sectionId + '"]').parent().addClass('active');
            }
        });
    });
	$("#searchOffer").keyup(function () {
		var srch_value = $("#searchOffer").val();
		if (srch_value.length >= 3 || srch_value.length === 0) {
		$.ajax({
			url: '<?= base_url('offer/getSearchOfferMobile'); ?>',
			data: {keyUpsrch_value:srch_value},
			dataType: "json",
			type: "POST",
			// beforeSend: function() {
			// 	$('#body-preloader').css('display', 'block');
			// },
			success: function (res) {
						console.log(res);
				// $('#body-preloader').css('display', 'none');
				$(".offerList").html(res.html);
			},
			error: function(xhr, status, error) {
						// $('#body-preloader').css('display', 'none');
				console.error('Ajax request failed:', xhr, status, error);
							console.log(xhr.responseText);
			}
		});
	}
	});
</script>
