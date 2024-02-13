
<script src="<?php echo base_url(); ?>assets/js/calendar.js"></script>
<style>
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
</style>
        <div class="offer-detail-container" id="detail-container">

            <div class="one-offer">
                <div class="fis-section">
                    <div class="i-data-section">
                        <!--<img src="<?= base_url(); ?>assets/images/b-img.png" alt="">-->
                        <?php foreach ($imageArray as $index => $imagePath) : 
                         $decodedImage = json_decode($imagePath, true); ?>
                            <div class="mySlides">
                                <img src="<?= base_url('/' . $decodedImage['url']) ?>" alt="">
                            </div>
                        <?php endforeach;?>
                        <div class="bg"></div>
                        <div class="text-section">
                            <!--<h3>Free Boat</h3>--><h3 style="margin:0px;" title="<?php echo $offer_detail['name']; ?>">
                                <?php 
                                    if(strlen($offer_detail['name']) > 20) {
                                        $cUname = substr(get_translation($offer_detail['name']), 0, 16).'...';
                                    } else {
                                        $cUname = get_translation($offer_detail['name']);
                                    } 
                                ?>
                        <?= ucfirst($cUname);  ?>   </h3>
                            <p style="padding: 0px;font-size: 10px;margin: 0px;height: 18px;height: 18px;"><?php echo $offer_detail['country'].','.$offer_detail['state']; ?></p>
                        <fieldset class="rating">
                            <?php
                                $rating = isset($average_rating) ? floor($average_rating) : '0';
                                $maxRating = 5; // Maximum rating
                                
                                for ($i = 1; $i <= $maxRating; $i++) {
                                    $starClass = ($i <= $rating) ? 'checked' : 'unchecked';
                                    echo '<span class="fa fa-star ' . $starClass . '"></span>';
                                }
                            ?>
                        </fieldset>
                        <p><?php echo get_translation_desc($offer_detail['details']);?></p>
                       
                            <div class="tw-btn">
                                <button class="detail" id="read_more" >
                                    <div class="read-text">Read More</div>
                                    <!--<button id="read_more" class="detail"><?= lang('read_more') ?></button>  -->
                                    <img src="<?= base_url(); ?>assets/images/right-arrow.png" alt="">
                                </button>  
                                <button class="term-btn"> Terms & Condition</button>
                            </div>                              
                        </div>
                    
                    </div>
                    <!--<div class="image-show">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-1.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-2.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-3.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-4.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-5.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-1.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-2.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-3.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-4.png" alt="">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/i-5.png" alt="">-->
                    <!--</div>-->
                    <div class="image-show" style="overflow-x: scroll;overflow-y: hidden;">
                        <?php  foreach ($imageArray as $index => $imagePath) : 
                         $decodedImage = json_decode($imagePath, true); ?>
                            <img src="<?= base_url('/' . $decodedImage['url']) ?>" onclick="currentSlide(<?= $index + 1 ?>)" alt="Image <?= $index + 1 ?>">
                        <?php endforeach; ?>
                    </div>
                </div>

               

                <div class="bal">
                    <div class="a-data">
                        <div class="t-detail">
                            <h4>Adult (12-99)</h4>
                            <input type="hidden" class="adultRate" value="<?= $offer_detail['prices'] * (1 - $offer_detail['discount_rate']/100) ?>">
                            
                            <span>Minimum 1, Maximum 15</span>
                        </div>
                        <div class="c-detail">
                            <button class="less-btn" onclick="changeValue(-1)">-</button>
                            <span class="num adultQnty">0</span>
                            <button class="more-btn" onclick="changeValue(1)">+</button>
                        </div>
                    </div>
                    <div class="c-data">
                        <div class="t-detail">
                            <h4>Child (2-11)</h4>
                             <input type="hidden" class="childRate" value="<?= $offer_detail['prices'] * (1 - $offer_detail['discount_rate']/100) ?>">
                            <span>Minimum 1, Maximum 15</span>
                        </div>
                        <div class="c-detail">
                            <button class="less" onclick="changeValue1(-1)">-</button>
                            <span class="number childQnty">0</span>
                            <button class="more" onclick="changeValue1(1)">+</button>
                        </div>
                    </div>

                    <div class="ca-section">
                        <div class="cal">
                            <button class="data-cal" id="openCalendar">
                                <div class="c-tx"  id="pickupDateText">Pickup Date</div>
                                <img src="<?= base_url(); ?>assets/images/calendar.png" alt="">
                            </button>
                            <div class="calendar-container">
                                <header class="calendar-header">
                                    
                                    <div class="calendar-navigation">
                                        <span id="calendar-prev"
                                              class="material-symbols-rounded">
                                            <img src="<?= base_url(); ?>assets/images/arrow-blue.png" alt="">
                                        </span>
                                        <p class="calendar-current-date"></p>
                                        <span id="calendar-next"
                                              class="material-symbols-rounded">
                                              <img src="<?= base_url(); ?>assets/images/arrow-blue-right.png" alt="">
                                            </span>
                                    </div>
                                </header>
                         
                                <div class="calendar-body">
                                    <ul class="calendar-weekdays">
                                        <li>Sun</li>
                                        <li>Mon</li>
                                        <li>Tue</li>
                                        <li>Wed</li>
                                        <li>Thu</li>
                                        <li>Fri</li>
                                        <li>Sat</li>
                                    </ul>
                                    <ul class="calendar-dates"></ul>
                                    <button class="cancel" id="closeCalendar">CANCEL</button>
                                </div>
                            </div>
                        </div>
                        <div class="clo">
                            <button class="data-col">
                                <div class="c-tx">Hours</div>
                                <img src="<?= base_url(); ?>assets/images/clock-blue.png" alt="">
                            </button>
                            <div class="hours-container">
                                <div class="hours">
                                    <h6>Hour</h6>
                                    <button class="h-show">15</button>
                                </div>
                                <div class="mins">
                                    <h6>Minute</h6>
                                    <button class="m-show">37</button>
                                </div>
                                <div class="sec">
                                    <h6>second</h6>
                                    <button class="s-show">52</button>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ti-sec">
                    <div class="h-detail">
                        <img src="<?= base_url() ; ?>assets/images/clock-s.png" alt="">
                        <span class="sk-text"><?php echo $offer_detail['history_time'];?> <?= lang('hours') ?>(<?= lang('approx') ?>.) </span>
                    </div>
                    <div class="po-detail">
                        <img src="<?= base_url() ; ?>assets/images/car-s.png" alt="">
                        <span class="sk-text"><?php echo $offer_detail['traveling_time'];?> <?= lang('hours') ?>(<?= lang('approx') ?>.)</span>
                    </div>
                    <div class="fr-detail">
                        <img src="<?= base_url() ; ?>assets/images/refund-s.png" alt="">
                        <span class="sk-text"><?php echo $offer_detail['payment_time'];?> <?= lang('hours') ?>(<?= lang('approx') ?>.)</span>
                    </div>
                    <!--<div class="h-detail">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/clock-s.png" alt="">-->
                    <!--    <span class="sk-text">5 hours(approx.)</span>-->
                    <!--</div>-->
                    <!--<div class="po-detail">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/car-s.png" alt="">-->
                    <!--    <span class="sk-text">Pickup Offered</span>-->
                    <!--</div>-->
                    <!--<div class="fr-detail">-->
                    <!--    <img src="<?= base_url(); ?>assets/images/refund-s.png" alt="">-->
                    <!--    <span class="sk-text">Free Refund</span>-->
                    <!--</div>-->
                </div>

                <!--<button class="bn-btn">Buy Now <span>$20.45</span></button>-->
                <button class="bn-btn" id="buy_btn"><?= lang('buy now') ?>  <span class="selling_price"></span></button>
            </div>


            <div class="t-area" id="popupContent">
                <div class="image-header">
                    <img src="<?= base_url(); ?>assets/images/1-img.png" alt="">
                    <button class="cl-btn" id="closeButton">
                        <img src="<?= base_url(); ?>assets/images/orange-close.png" alt="">
                    </button>
                </div>
                <div class="name-off">
                    <!--<h3>Free Boat</h3>-->
                    <?php 
                            if(strlen($offer_detail['name']) > 20) {
                                $cUname = substr(get_translation($offer_detail['name']), 0, 16).'...';
                            } else {
                                $cUname = get_translation($offer_detail['name']);
                            }
                        ?>
                        <?= ucfirst($cUname);?>  
                    <span><del>$23.70</del>$20.50</span>
                </div>
                <div class="full-detail">
                     <p><?php echo get_translation_desc($offer_detail['details']); ?></p>
                </div>

                <!--<button class="bn-btn">Buy Now <span>$20.45</span></button>-->
                
                <button class="bn-btn" id="buy_btn"><?= lang('buy now') ?>  <span class="selling_price"></span></button>
                
            </div>
            
        </div>
        <form action="<?= base_url('payment/purchaseOffer') ?>" id="buy_form" method="post">
            
            <input type="hidden" name="offer_id" class="offer_id" value="<?= $offer_detail['id']; ?>">
            <input type="hidden" name="picTime" class="picTime" value="">
            <input type="hidden" name="adult_Qnty" class="adult_Qnty" value="0">
            <input type="hidden" name="child_Qnty" class="child_Qnty" value="0">
            <input type="hidden" name="adult_Rate" class="adult_Rate" value="">
            <input type="hidden" name="child_Rate" class="child_Rate" value="">
            <input type="hidden" name="sellingPrice" class="sellingPrice" value="">
            <input type="hidden" name="picDate" class="picDate" value="">
        </form>

<script>
    $(".tooltip").tooltip();
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

    
    $("#buy_btn").click(function(){
        var adultQnty = $(".adult_Qnty").val();
        var childQnty = $(".child_Qnty").val();
        if((adultQnty > 0 || childQnty > 0))
        {
            $("#buy_form").submit();
        }else{
            new Noty({
            text: "Please Select Minimum 1 Quantity",
            type: 'error',
            theme: 'sunset', 
            timeout: 2000,
            layout: 'topLeft',
            }).show();
        }
    })



$(".data-cal").click(function(){
    console.log("object");
    $(".calendar-container").toggleClass("active");  
});
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
