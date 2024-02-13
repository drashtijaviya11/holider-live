<style>
    .card-errors p {
    color: #f00;
    font-size: 18px;
    text-align: center;
    font-weight: bold;
    background-color: white;
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid transparent;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
    margin-top: 10px;
}
.pay_currency_list {
    list-style: none;
    background: rgba(0, 156, 190, 0.10);
    display: none;
    z-index: 99;
    height: 150px;
    overflow: scroll;
    width: 100%;
    padding: 0;
    margin : 0;
    border-radius: 10px;
}

/* Add styling for individual list items if needed */
.pay_currency_list li {
    padding: 4px;
    cursor: pointer;
    text-align: center; /* Center the text */
}

/* Hover effect for list items */
.pay_currency_list li:hover {
    background-color: #00C1EB;
    color: white;
}

ul li{
    color: #00B5DC;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(9*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
.pmnt_currency_dropdown{
	display: none;
	top: 138px;
    background: rgb(1 87 106 / 97%);
    width: 100%;
    position: relative;
    z-index: 9999;
	border-radius: 5px;
}
.cur-te{
	padding: 2px;
	text-align: center;
}
.cur-te:hover{
	background: rgb(63 181 207 / 97%);
	color: white;
}
.cr-c {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 0;
    padding-left: calc(50*var(--aspect-ratio)) !important;
    padding-right: calc(50*var(--aspect-ratio)) !important;
    width: 100% !important;
    height: calc(20*var(--aspect-ratio));
    margin-left: 0 !important;
    background-color: #ECECEC;
    border-radius: 8px;
    border: none;
    text-align: center;
}
    </style>
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>
<script src="https://www.paypal.com/sdk/js?client-id=Af9_351YlAM37EG4NTVB5Nf-ZUt6RrVDK9tL9Ov2L5HnqzZHuO1jcfNZ57pHP0CMxpQG1ca629DXdaeB"></script>

        <div class="payment-container">

                <div class="main-pay">
                    <div class="p-head" onclick="goBackToSingleOffer()">
                        <img src="<?= base_url(); ?>assets/images/arrow-blue-right.png" alt="">
                        <h3><?= lang('payment');?></h3>
                    </div>
                    
                    <div class="payment-rec">
                        <div class="p-detail">
                            <!--<button class="cr-c" onclick="toggleSection('card')">-->
                            <button class="cr-c">
                                <img src="<?= base_url(); ?>assets/images/creditcard.png" alt="">
                                <div class="cr-te"><?= lang('c_card'); ?></div>
                            </button>
                        
                            <!-- <button class="pay-c" onclick="toggleSection('paypal')">
                                <img src="<?= base_url(); ?>assets/images/paypal.png" alt="">
                                <div class="pay-te"><?= lang('paypal') ?></div>
                            </button> -->
                        </div>  
						<div class="card-errors"></div>
                        <div class="card-d">
                            <!--<div class="bu-sec">-->
                            <!--    <button class="new-c">Add New Card</button>-->
                            <!--    <button class="save-c">Use Saved Card</button>-->
                            <!--</div>-->
                            <div class="c-div"> 
                                <h3><?= lang("currency_charge") ?></h3>
								<button name="currencyName" id="currencyName" class="cur-charge">
								<?php $currency = $this->input->cookie('currency_code',true)  ;
									if (isset($currency)) {
										echo $currency;
									} else {
										echo 'THB'; // Default currency code
									}
								?>
								</button>
								<div class="pay_currency_list">
								<?php foreach($currencies as $cur){ ?>
									<div class="cur-te" onclick="change_curn('<?= $cur['code']; ?>')"><?= $cur['code'] ?></div>
									<?php }  ?>
								</div>
								<!-- <select name="currencyName" id="currencyName" class="cur-charge">
										<?php foreach($currencies as $cur){ ?>
											<option class="cur-te" value="<?= $cur['code'] ?>"  onclick="change_curn('<?= $cur['code']; ?>')"><?= $cur['code'] ?></option>
										<?php }  ?>
								</select> -->
							</div>
                                    <!-- <img src="<?= base_url(); ?>assets/images/arrow-blue-right.png" alt=""> -->
                            </div>
                            <div class="vo-charge">
                                <button class="amt"><?= lang('amount'); ?></button>
                                <?php  $check_condition = array('conditions' => ['id' => $offer_id]);
        $offers = $this->QueryModel->selectSingleRow('offer', $check_condition); ?>
                                <button class="amt-pr">
                                    <?php if(!empty($totalValue)){
                                        $totalValue= $totalValue;
                                    }else{
                                        $totalValue =0;
                                    } ?>
                                    <?php if(!empty($totalValue)){ 
                                        echo get_currency($totalValue,$offers['currency_type']); 
                                        } ?></button>
                            </div>
                            <!--<div class="input-data">-->
                            <!--    <div class="cnum">-->
                            <!--        <h3>Card Number</h3>-->
                            <!--        <input type="text" class="card-num">-->
                            <!--    </div>-->
                            <!--    <div class="cvnum">-->
                            <!--        <h3>Card CVC</h3>-->
                            <!--        <input type="text" class="cvc-num">-->
                            <!--    </div>   -->
                            <!--    <div class="mm-yy">-->
                            <!--        <h3>MM/YY</h3>-->
                            <!--        <input type="text" class="my-num">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="main-sbtn">-->
                            <!--    <input class="check-card" type="checkbox">-->
                            <!--    <button class="save-ca-btn">Save Card Detail</button>-->
                            <!--</div>-->
                            <!--<button class="pay-now">Pay Now</button>-->
<form action="https://holider.com/demo/stripe-payment/public/create-checkout-session.php" method="POST">
        <!-- Add a hidden field with the lookup_key of your Price -->
        <?php $new_price = $totalValue ; 
        if(!empty($new_price)){
            $new_price=$new_price;
        }else{
            $new_price= 0;
        }
        $check_condition = array('conditions' => ['id' => $offer_id]);
        $offers = $this->QueryModel->selectSingleRow('offer', $check_condition);
        ?>
	<input type="hidden" name="offername" value="<?php echo $offername ?>">
        
        <?php if($new_price !='' && $new_price != 0){ ?>
            <?php $final_key_val=get_currency_without_symbol_user_view($new_price,$offers['currency_type']); ?>
        <input type="hidden" name="lookup_key" value="<?= $final_key_val * 100 ?>" />
         <input type="hidden" name="offer_id" id="offer_id" value="<?= $offer_id ?>">
        <input type="hidden" name="picTime" id="picTime" value="<?= $picTime ?>">
        <input type="hidden" name="adult_Qnty" id="adult_Qnty" value="<?= $adult_Qnty ?>">
        <input type="hidden" name="child_Qnty" id="child_Qnty" value="<?= $child_Qnty ?>">
        <input type="hidden" name="adult_Rate" id="adult_Rate" value="<?= $adult_Rate ?>">
        <!-- <input type="hidden" name="sellingPrice" id="sellingPrice" value="<?= $sellingPrice ?>"> -->
        <input type="hidden" name="picDate" id="picDate" value="<?= $picDate ?>">
		<!-- <input type="hidden" name="currencytype" id="currencytype" value="usd"> -->
        <input type="hidden" name="default_offer_currency" id="default_offer_currency" value="<?php if($this->input->cookie('currency_code',true)){  echo strtolower($this->input->cookie('currency_code')); } else{ echo 'thb'; } ?>">
        <input type="hidden" name="currencytype" id="currencytype" value="<?php echo $offers['currency_type']; ?>">
       
        <input type="hidden" name="child_Rate" id="child_Rate" value="<?= $child_Rate ?>">
        <button id="checkout-and-portal-button" type="submit" class="pay-now" style="width: auto;"><?= lang('pay_now'); ?></button>
        <?php }else{?>
            <button id="checkout-and-portal-button" type="submit" class="pay-now" disabled style="width: auto;"><?= lang('pay_now'); ?></button>
        <?php } ?>

      </form>
                        </div>

                        <div class="pay-d">
                            <!-- <div class="c-div"> 
                                <h3>Currency Charge</h3>
                                <button class="cur-charge">
                                <?php foreach($currency as $cur){ ?>
                                    <div class="cur-te"><?= $cur['code'] ?></div>
                                    <?php } ?>
                                    <img src="<?= base_url(); ?>assets/images/arrow-blue-right.png" alt="">
                                </button>
                            </div> -->
                            <div class="vo-charge">
                                <button class="amt"><?= lang('amount'); ?></button>
                                <input type="hidden" class="paypal_final_amount" value="<?php if(!empty($totalValue)){ echo $totalValue; } ?>">
                                <button class="amt-pr"><?php if(!empty($totalValue)){ echo get_price($totalValue); } ?></button>
                            </div>
                            <!--<button class="pay-now">Pay Now</button>-->
                             <!-- <div id="paypal-button-container"></div> -->
                        </div>
                    </div>
                </div>

        </div>
        <input type="hidden" name="offer_id" id="offer_id" value="<?= $offer_id ?>">
        <input type="hidden" name="picTime" id="picTime" value="<?= $picTime ?>">
        <input type="hidden" name="adult_Qnty" id="adult_Qnty" value="<?= $adult_Qnty ?>">
        <input type="hidden" name="child_Qnty" id="child_Qnty" value="<?= $child_Qnty ?>">
        <input type="hidden" name="adult_Rate" id="adult_Rate" value="<?= $adult_Rate ?>">
        <!-- <input type="hidden" name="sellingPrice" id="sellingPrice" value="<?= $sellingPrice ?>"> -->
        <input type="hidden" name="picDate" id="picDate" value="<?= $picDate ?>">
        <input type="hidden" name="child_Rate" id="child_Rate" value="<?= $child_Rate ?>">

<!-- Add more input elements as needed -->

        <script>
$(".cur-charge").click(function(event){
	event.stopPropagation();
	$(".pmnt_currency_dropdown").toggle();
});
$(document).click(function(event) {
    if (!$(event.target).closest('.cur-charge').length && !$(event.target).closest('.pmnt_currency_dropdown').length) {
        $(".pmnt_currency_dropdown").hide();
    }
});

        // paypal.Buttons({
        //     createOrder: function(data, actions) {
        //         return actions.order.create({
        //             purchase_units: [{
        //                 amount: {
        //                     value: $(".paypal_final_amount").val() // Replace with the actual amount
        //                 }
        //             }]
        //         });
        //     },
        //     onApprove: function(data, actions) {
        //         return actions.order.capture().then(function(details) {
        //             console.log(details);
        //             // Store the PayPal order ID in the hidden field
        //             document.getElementById('paypal-order-id').value = details.id;

        //             // Submit the custom form
        //             document.getElementById('custom-form').submit();
        //         });
        //     },
        //     onCancel: function(data) {
        //         // Handle payment cancellation, e.g., redirect to a cancel page
        //         window.location.href = '<?php echo site_url('payment/cancel'); ?>';
        //     }
        // }).render('#paypal-button-container');
    </script>

        <script>
            $(document).ready(function(){
                $(".card-d").css({ display: 'block' });
                $(".pay-c").click(function(){
                    $(".card-d").css({ display: 'none' });
                })
            });


            // $(".pay-now").click(function(){
            //     // $('.pay-now').attr("disabled", "disabled");
            //     var offer_id = $("#offer_id").val();
            //     var picTime = $("#picTime").val();
            //     var adult_Qnty = $("#adult_Qnty").val();
            //     var child_Qnty = $("#child_Qnty").val();
            //     var adult_Rate = $("#adult_Rate").val();
            //     // var sellingPrice = $("#sellingPrice").val(); // Commented out as it's not in your HTML
            //     var picDate = $("#picDate").val();
            //     var child_Rate = $("#child_Rate").val();
            //     var cardNum = $(".card-num").val();
            //     var cvcNum = $(".cvc-num").val();
            //     var dateText = '01';//$(".date-text").text();
            //     var yearText = '2025';//$(".year-text").text();
            //     Stripe.createToken({
            //     			number: cardNum,
            //     			exp_month: dateText,
            //     			exp_year: yearText,
            //     			cvc: cvcNum
            //     		}, stripeResponseHandler);
            //     var requestData = {
            //     offer_id: offer_id,
            //     picTime: picTime,
            //     adult_Qnty: adult_Qnty,
            //     child_Qnty: child_Qnty,
            //     adult_Rate: adult_Rate,
            //     picDate: picDate,
            //     child_Rate: child_Rate,
            //     cardNum: cardNum,
            //     cvcNum: cvcNum,
            //     dateText: dateText,
            //     yearText: yearText
            // };

                // $.ajax({
                //     url : '<?= base_url('payment/createPayment') ?>',
                //     data : requestData,
                //     type : "POST",
                //     dataType : "json",
                //     success : function(res)
                //     {
                //         console.log(res);
                //     }
                // });

            // });
        </script>
        <script>
// Set your publishable key
Stripe.setPublishableKey('pk_test_51OQ1ocSF7RP1CIRsUskPlfn0RmWWGuDq9IQd7cJvdJbFEThKaswNiGVgEMYRowGqMv68OPmJxcN1x8IYmz8ECG7f00q93EWJDD');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
	if (response.error) {
		// Enable the submit button
		// $('.pay-now').removeAttr("disabled");
        // $('.pay-now').attr("disabled", "disabled");
		// Display the errors on the form
		$(".card-errors").html('<p>'+response.error.message+'</p>');
	} else {
		var form$ = $("#paymentFrm");
		// Get token id
		var token = response.id;
		// Insert the token into the form
		// form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
		// // Submit form to the server
		// form$.get(0).submit();
        $('.pay-now').attr("disabled", "disabled");
                var offer_id = $("#offer_id").val();
                var picTime = $("#picTime").val();
                var adult_Qnty = $("#adult_Qnty").val();
                var child_Qnty = $("#child_Qnty").val();
                var adult_Rate = $("#adult_Rate").val();
                // var sellingPrice = $("#sellingPrice").val(); // Commented out as it's not in your HTML
                var picDate = $("#picDate").val();
                var child_Rate = $("#child_Rate").val();
                var cardNum = $(".card-num").val();
                var cvcNum = $(".cvc-num").val();
                var dateText = '01';//$(".date-text").text();
                var yearText = '2025';//$(".year-text").text();
                var stripeToken = token;
                var requestData = {
                offer_id: offer_id,
                picTime: picTime,
                adult_Qnty: adult_Qnty,
                child_Qnty: child_Qnty,
                adult_Rate: adult_Rate,
                picDate: picDate,
                child_Rate: child_Rate,
                cardNum: cardNum,
                cvcNum: cvcNum,
                dateText: dateText,
                yearText: yearText,
                stripeToken:stripeToken
            };
                $.ajax({
                    url : '<?= base_url('payment/createPayment') ?>',
                    data : requestData,
                    type : "POST",
                    dataType : "json",
					// beforeSend: function() {
					// 	$('#body-preloader').css('display', 'block');
					// },
                    success : function(res)
                    {
						// $('#body-preloader').css('display', 'none');
                        console.log(res);
                    }
                });
	}
}

$(document).ready(function() {
	// On form submit
	$("#paymentFrm").submit(function() {
		// Disable the submit button to prevent repeated clicks
		$('#payBtn').attr("disabled", "disabled");
		
		// Create single-use token to charge the user
		Stripe.createToken({
			number: $('#card_number').val(),
			exp_month: $('#card_exp_month').val(),
			exp_year: $('#card_exp_year').val(),
			cvc: $('#card_cvc').val()
		}, stripeResponseHandler);
		
		// Submit from callback
		return false;
	});
});

$(".cur-charge").click(function(){
    $(".pay_currency_list").toggle();
})
$(document).ready(function(){
	$("#currencyName").change(function(){
		var curType = $("#currencyName").val();
		console.log(curType);
		$('#currencytype').val(curType);
	});
});
// Function to delete a value from session storage

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
function goBackToSingleOffer()
{
	var redirect_from = getCookie('redirect_from');
    if (redirect_from) {
        var decodedURL = decodeURIComponent(redirect_from);
        window.location.href = decodedURL; 
    } else {
        window.history.back();
    }
}

</script>