<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets\js\jquery-3.6.4.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</div>
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>-->
<style>
    .comingsoon_model{
        border-radius: 8px;
background: linear-gradient(180deg, #BDF3FF 0%, #005669 100%);
position: relative;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #999;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
    }
    .coming_header{
        border:0px;
    }
    button.btn.btn-sm.btn-success {
        display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    border-radius: 4px;
    background: linear-gradient(180deg, #00D1FF 0%, #003C49 100%);
    color: #FFF;
font-family: Inria Serif;
font-size: 11px;
font-style: normal;
font-weight: 700;
line-height: normal;
}.coming_text{
    background: linear-gradient(180deg, #9BEDFF 0%, #FFF 74.48%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    /* text-shadow: 0px 1px 0px rgba(180, 241, 255, 0.61); */
    font-family: Kaisei Tokumin;
    font-size: 22px;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
    text-align:center;
}
.coming_logo{
    width: fit-content;
    display: flex;
    float: left;
    text-align: center;
    margin-left: 20%;
}
.coming_soon_body {
    position: relative;
    padding: 15px;
    text-align:center;
}
.coming_close{
    /* float: right; */
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
    width: 20px;
    height: 20px;
    border: 1px solid #ccc !important;
    border-radius: 100px;
    background: #00A6CA !important;
    opacity: 1;
    color: #fff;
    font-weight: 100;
    line-height: 17px;
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: 0 0;
    border: 0;
}
.coming_text2{
    color: #FFF;
font-family: Philosopher;
font-size: 17px;
font-style: normal;
font-weight: 700;
line-height: normal;
text-align:center;
}
.coming_soon_model{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 999999;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.coming_soon_dialog{
    position: relative;
    width: auto;
    margin: 10px;
}

    </style>
<!-- Modal -->
<div class="modal coming_soon_model" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog coming_soon_dialog" role="document">
            <div class="modal-content comingsoon_model">
      <div class="modal-header coming_header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <div class="logo coming_logo">
                <a class="active" href="<?= base_url('offer?country='.$this->input->cookie('country', true).'&state='.$this->input->cookie('state', true)) ?>"><img src="<?= base_url() ; ?>assets/images/logo.png" alt=""></a>
                </div>
               
        <button type="button" class="close coming_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center coming_soon_body">
        
        <div class="text-center coming_text"  style="margin: 10px;"><?= lang('coming_soon'); ?></div>
        <div class="text-center coming_text2"  style="margin: 10px;">January 2024</div>
       
        <a href="https://wa.me/972544741088" class="mt-3"><button class="btn btn-sm btn-success"><?= lang('join_our_network_now!'); ?></button></a>
      </div>
    </div>
  </div>
</div> 

<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="<?php echo base_url() ; ?>assets\js\jquery-ui.min.js"></script>
<script src="<?php echo base_url() ; ?>assets\js\jquery-1.12.4.js"></script>
<script src="<?= base_url() ; ?>assets/js/provider.js"></script>
<script src="<?= base_url() ; ?>assets/js/main.js"></script>
<script src="<?= base_url() ; ?>assets/js/login.js"></script>

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
function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
function changeCountry(location_href)
{
	deleteCookie('country');
    deleteCookie('state');
	window.location.href = location_href;
}

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



// currency Dropdown
$(document).ready(function() {
    $('#loader-container').css({ display: 'none' });
    $(".dropdown-option").on("click", function() {
    $(".sub-menu-currency").hide(); // Hide the other dropdown
    $(".sub-menu").toggle();
    $(".dropdown-Curcency").removeClass("active"); // Remove active class from the other dropdown
    $(".dropdown-option").not(this).removeClass("active");
    $(this).toggleClass("active");
});

$(".dropdown-Curcency").on("click", function() {
    $(".sub-menu").hide(); // Hide the other dropdown
    $(".sub-menu-currency").toggle();
    $(".dropdown-option").removeClass("active"); // Remove active class from the other dropdown
    $(".dropdown-Curcency").not(this).removeClass("active");
    $(this).toggleClass("active");
});

$(document).on("click", function(event) {
    if (!$(event.target).closest('.dropdown-option, .dropdown-Curcency , .drop-down, .area').length) {
        $(".sub-menu, .sub-menu-currency, .country-dd").hide();
        $(".drop-list").removeClass("active");
    }
});

$(".drop-down").click(function(){
    $(".country-dd").hide();
})

$(".area").on("click", function(event) {
    event.stopPropagation(); 
    $(".sub-area-drop").toggle();
    $(".area-drop-list").toggleClass("active");
    $(".drop-list").removeClass("active");
    $(".search-box").css('display', 'none'); 
});

$("#popupOverlay").click(function(){
    $('#popupOverlay').css({ display: 'none' });
    $('#popupContent').css({ display: 'none' });
    $('.offer-detail-container').removeClass('blur');

});

$(".term-btn").click(function(){
    $(".tc-area").css({ display: 'block' });
    $("#tcContentOverlay").css({ display: 'block' });
});
$(".tc-btn ,#tcContentOverlay").click(function(){
    $(".tc-area").css({ display: 'none' });
    $("#tcContentOverlay").css({ display: 'none' });
});

});

// End Curency Dropdown , Start Change currency option

function change_curn(cur_code){
    $.ajax({
        url : "<?= base_url('dashboard/change_currency') ?>",
        data : {cur_code : cur_code},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                window.location.reload();
            }
        }
    });
}



// End Change currency option , Start Logout
function logout()
{
    $.ajax({
        url : "<?= base_url('dashboard/logout'); ?>",
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                window.location = res.url;
            }
        }
    });
}

// End Loguot & Start Login
function login()
{
    $.ajax({
        url : "<?= base_url('dashboard/loginRequestAjax'); ?>",
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}
// End Login & Start My Vouchers

function myVouchers()
{
    $.ajax({
        url : "<?= base_url('dashboard/myVouchersAjaxRequest'); ?>",
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}
function myVouchers_provider()
{
    $('#loader-container').css({ display: 'block' });
    $.ajax({
        url : "<?= base_url('provider/myVouchersAjaxRequest'); ?>",
        type : "POST",
        dataType : "json",
		// 	beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
	// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}
// End My Vouchers & Start getArea 

function getArea(type,id)
{

    $.ajax({
        url : "<?= base_url('offer/getArea') ?>",
        data : {id : id,type:type},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res){
			// $('#body-preloader').css('display', 'none');
            $(".sub-area-menu").html(' ');
            if (res.status == true) {
                console.log(res);
                    window.location = res.url;
            }
        }
    });
}

function new_getArea(id)
{

    $.ajax({
        url : "<?= base_url('offer/new_getArea') ?>",
        data : {id : id},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res){
			// $('#body-preloader').css('display', 'none');
            // $(".sub-area-menu").html(' ');
            if (res.status == true) {
                console.log(res);
                    window.location = res.url;
            }
        }
    });
}

// End GetArea , Start Detail Offer
function voucher_detail(id) {

    $('body').css({ background: 'f0f0f45c' });
    $.ajax({
        url: "<?= base_url('dashboard/voucher_detail_ajax') ?>",
        data: { id: id },
        type: "POST",
        dataType: "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success: function (res) {
			// $('#body-preloader').css('display', 'none');
            if (res.status == true) {
                    window.location = res.url;
            }
        },
    });
}

// End Offer Detail
$("#term-btn").click(function(){
        console.log("object");
        $(".term-area").css('display', 'block');

    });
    $(".termCl-btn").click(function(){
        $(".term-area").css('display', 'none');
    });

    // Read More  
    // $(document).ready(function(){
    //     $("#read_more").hover(
    //     function () {
    //         // Show content and disable body scroll
    //         $(".read_more_content").slideDown();
    //         $("body").css("overflow-y", "hidden");
    //     },
    //     function () {
    //         // Hide content and enable body scroll
    //         $(".read_more_content").slideUp();
    //         $("body").css("overflow-y", "auto");
    //     }
    // );
    // });

// Read MOre End
    function view_offer(offerId) {

        $.ajax({
            url: '<?= base_url('offer/viewOffer'); ?>',
            data: { id: offerId },
            dataType: "json",
            type: "POST",
			// beforeSend: function() {
			// 	$('#body-preloader').css('display', 'block');
			// },
            success: function (res) {
				// $('#body-preloader').css('display', 'none');
                // console.log(res);
                window.location = res.url;
            }
        });
    }
function change_lang(lang){
    $.ajax({
        url : "<?= base_url('dashboard/change_language') ?>",
        data : {lang : lang},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                window.location.reload();
            }
        }
    });
}
// Change Language End  , Start Payment


function buy_now(id,offer_rate)
{
    var pic_date = $(".pic_date").text();
    var pic_time = $(".pic_time").text();
    var adultQnty = $(".adultQnty").text();
    var childQnty = $(".childQnty").text();
    var adultRate = $(".adultRate").val();
    var childRate = $(".childRate").val();
    var sellingVal = $(".selling_price").text();
    // var picDate = $(".picDate").text();
    // var picTime = $(".picTime").text();
    if(sellingVal != ''){
    // var qty = parseInt(adultQnty) + parseInt(childQnty);
    var offer_rate = $(".offer_rate").val();
    $.ajax({
        url : "<?= base_url('dashboard/buy_now_ajaxRequest') ?>",
        data : {id : id,offer_rate:offer_rate,sellingVal:sellingVal,adultQnty:adultQnty,childQnty:childQnty,pic_date:pic_date,pic_time:pic_time,adultRate:adultRate,childRate:childRate},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            console.log(res);
            if(res.status == true)
            {
                // window.location = res.url;
            }
            else if(res.status == false)
            {
                // window.location = res.url;
            }
        }
    });
}else{
    new Noty({
        text: "Please Select Minimum 1 Quantity",
        type: 'error',
        theme: 'sunset', 
        timeout: 2000,
        layout: 'topLeft',
    }).show();
}
}

// End  PAyment  start Apply
function changeValue(amount) {
    var offer_id = $(".offer_id").val();
    var numElement = document.querySelector('.num');
    var currentValue = parseInt(numElement.innerText);
    var newValue = currentValue + amount;
    setSessionValue("adultQuantity", newValue);
	setCookie("adultQuantity", newValue, 1);
    if (newValue >= 0 && newValue <= 15) {
        numElement.innerText = newValue;
          apply(offer_id);
    }
  
}

function changeValue1(amount) {
        var offer_id = $(".offer_id").val();
    var numberElement = document.querySelector('.number');
    var currentValue = parseInt(numberElement.innerText);
    var newValue = currentValue + amount;
    setSessionValue("childQuantity", newValue);
	setCookie("childQuantity", newValue, 1);
    if (newValue >= 0 && newValue <= 15) {
        numberElement.innerText = newValue;
         apply(offer_id);
    }
   
}
 $(".buy_btn").click(function(){
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
function apply(id){

var adultQnty = $(".adultQnty").text();
var childQnty = $(".childQnty").text();
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
        console.log(res);
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

// End Apply , STart Go Back
        function goBack() {
    
        window.history.back();
        }
// End GO Back  Start Popup MOadl
const timeDlay = 200;
  function openuserModal() {
    $("#signupModal").css({ display: 'block' });
  }
    setTimeout(openuserModal, timeDlay);




// End Pop MOdal
</script>
<!-- Image Script -->
<script>

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

</script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script>

const timeDelay = 2000;

function openModal() {
    var isModalClosed = getCookie("modalClosed");
    if (isModalClosed === "true") {
        document.getElementById('termsModal').style.display = 'none';
    } else {
        document.getElementById('termsModal').style.display = 'block';
    }
}

$(".close").click(function() {
    $("#termsModal").css({'display':'none'});
    document.cookie = "modalClosed=true; expires=" + new Date(Date.now() + 24 * 60 * 60 * 1000).toUTCString() + "; path=/";
});

setTimeout(openModal, timeDelay);

function join() {
    document.cookie = "modalClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.getElementById('termsModal').style.display = 'block';
}

function getCookie(name) {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(name + '=') === 0) {
            return cookie.substring(name.length + 1);
        }
    }
    return "";
}     
        

</script>

<script>
    $(document).ready(function () {
        var readMoreBtn = $('.detail');
        var hBtn = $('.cl-btn');
        var popupOverlay = $('#popupOverlay');
        var popupContent = $('#popupContent');
        var offerDetailContainer = $('.offer-detail-container');

        var scrollPosition = 0;

        readMoreBtn.on('click', function () {
            scrollPosition = $(window).scrollTop();
            openPopup();
        });

        hBtn.on('click', function () {
            closePopup();
        });

        function openPopup() {
            popupOverlay.css('display', 'block');
            popupContent.css('display', 'block');

            // var popupTop = `${scrollPosition}px`;
            // popupContent.css('top', popupTop);

            offerDetailContainer.addClass('blur');
            // $('body').css('overflow', 'hidden');
        }

        function closePopup() {
            popupOverlay.css('display', 'none');
            popupContent.css('display', 'none');
            offerDetailContainer.removeClass('blur');
            // $('body').css('overflow', '');
        }

        function provider_home(){
            var provider_page = '<?= base_url('provider'); ?>'
            window.location.href = 'provider_page';
        }
    });
</script>

<script>

$(document).ready(function() {
    $(document).on('click', '#save', function() {
        var name = $("#name").val().trim();

        if (name === "") {
            new Noty({
                text: '<?= lang('enter_your_name'); ?>',
                type: 'error',
                timeout: 3000
            }).show();
            return;
        }

        $.ajax({
            url: "<?= base_url('dashboard/updateUser');?>",
            type: "POST",
            data: $("#signupForm").serialize(),
            success: function(response) {
				// window.location.href = response.url;
				$("#signupModal").css({ display: 'none' });
                console.log(response);
				window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error("Ajax request failed:", xhr, status, error);
            }
        });
    });
});

$(".search-btn").click(function(){
    $(".search-box").toggle();
    $("#searchOffer").focus();
});

$(".menu-drop").click(function(){
    $(".search-box").css('display', 'none'); 
})
</script>




<!-- Image End Script -->
<script src="<?= base_url();?>assets/js/main.js"></script>
</body>
</html>