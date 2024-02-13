
<style>
.temp{
    /* border: 1px solid #010101 !important;
    border-radius: 0px !important; */
}
    .whatsapp{
    background-color: #055c7491;
    padding: 5px;
    font-weight: bold;
}
.form-check-input[type=radio] {
    border-radius: 50%;
    border: 3px solid #807979 !important;
    width: 18px;
    height: 18px;
}
.form-control
{
    font-size: 1.5rem !important;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp"><?= lang('add_offer'); ?></div>
                        <hr>
                    </div>
                    <form action="" id="add_offer"  method="post" enctype="multipart/form-data">
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for=""><?= lang('offer name'); ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="offer_name" class="form-control temp rqure" placeholder="<?= lang('enter_offer_name') ?>">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('address'); ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="address" class="form-control temp rqure" placeholder="<?= lang('enter_address') ?>">
                            </div>
                            <div class="col-4">
								<label for="">Offer Type</label><i class="bi bi-star-fill"></i>
                                <select name="offer_type" id="offer_type" class="form-select temp rqure">
								<option  value=""  selected disabled>Select Type</option>
									<option  value="adult"  >Adult</option>
									<option  value="child"  >Child</option>
									<option  value="both"  >Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for=""><?= lang('country'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="country" id="country" class="form-select temp rqure">
                                <option  value=""  selected disabled> Select Country</option>
                                    <?php  foreach($country as $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="country" class="form-control temp rqure" placeholder="<?= lang('enter_country_name') ?>"> -->
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('state'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="state" id="state" class="form-select temp rqure">
                                <option  value="" selected disabled> Select State</option>
                                    <?php  foreach($state as $state) { ?>
                                        <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="state" class="form-control temp rqure" placeholder="<?= lang('enter state name') ?>"> -->
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('area'); ?></label><i class="bi bi-star-fill"></i>
								<select class="form-select temp rqure" name="area" id="area">
								<option value="" selected disabled><?= lang('select_area') ?></option>
                                    <?php foreach($areas as $area) { ?>
                                        <option value="<?= $area['id'] ?>"><?= $area['area'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="area" class="form-control temp rqure" placeholder="<?= lang('enter_area') ?>"> -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 mt-1">
                                <label for=""><?= lang('provider') ?></label><i class="bi bi-star-fill"></i>
                                <select class="form-select temp rqure" id="provider" name="provider" >
                                        <option  value="0" > Select Provider</option>
                                    <?php  foreach($provider as $provider) { ?>
                                        <option value="<?= $provider['id'] ?>" ><?= $provider['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
							<div class="col-4">
							<label for=""><?= lang('default_currency') ?></label><i class="bi bi-star-fill"></i>
                                <!-- <input type="text" name="default_currency" class="form-control temp requre" value="<?= $provider['default_currency']; ?>" > -->
								<select name="default_currency" id="currency" class="form-select readonly-select temp">
									<?php foreach($currency as $curr) { ?>
										<option value="<?= $curr['code']; ?>"><?= $curr['code']; ?></option>
									<?php } ?>
								</select>
                            </div>
                        <!-- </div>
                        <div class="row mt-2"> -->
                            <div class="col-4 mt-1">
                                <label for="category"><?= lang('category') ?></label><i class="bi bi-star-fill"></i>
                                <select class="form-select temp rqure" name="category" id="category">
								<option value="" selected disabled><?= lang('select_category') ?></option>
                                    <?php foreach($category as $catg) { ?>
                                        <option value="<?= $catg['id'] ?>"><?= $catg['category_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2"  id="adultSection" style="display:none">
							<div class="col-4">
								<label for=""><?= lang('adult_price') ?></label>
								<input type="number" name="adult_price" id="adult_price" class="form-control temp" placeholder="<?= lang('enter_adult_price') ?>" pattern="[0-9]+" inputmode="numeric"  step="any">
							</div>
							<div class="col-4">
								<label for=""><?= lang('adult_discount') ?></label>
								<input type="number" name="adult_discount" id="adult_discount" class="form-control temp" placeholder="<?= lang('enter_adult_discount') ?>" pattern="[0-9]+" inputmode="numeric"  step="any">
							</div>
							<div class="col-4">
								<label for=""><?= lang('adult_commission') ?></label>
								<input type="number" name="adult_commission" id="adult_commission" class="form-control temp" placeholder="<?= lang('enter_adult_commission') ?>" pattern="[0-9]+" inputmode="numeric"  step="any">
							</div>
                        </div>
                        <div class="row mt-2"  id="childSection" style="display:none">
							<div class="col-4">
								<label for=""><?= lang('child_price') ?></label>
								<input type="number" name="child_price" id="child_price" class="form-control temp" placeholder="<?= lang('enter_child_price') ?>" pattern="[0-9]+" inputmode="numeric" step="any">
							</div>
							<div class="col-4">
								<label for=""><?= lang('child_discount') ?></label>
								<input type="number" name="child_discount" id="child_discount" class="form-control temp" placeholder="<?= lang('enter_child_discount') ?>" pattern="[0-9]+" inputmode="numeric"  step="any">
							</div>
							<div class="col-4">
								<label for=""><?= lang('child_commission') ?></label>
								<input type="number" name="child_commission" id="child_commission" class="form-control temp" placeholder="<?= lang('enter_child_commission') ?>" pattern="[0-9]+" inputmode="numeric"  step="any">
							</div>
                        </div>
                        <div class="row mt-2">
                           
                            <div class="col-4">
                                <label for=""><?= lang('upload_image') ?></label><i class="bi bi-star-fill"></i>
                                <input type="file" name="image[]" class="form-control temp rqure" placeholder="" accept="image/*,video/mp4" multiple >
                                <!-- onclick="image_modal3()" -->
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('direct_pay') ?></label>
                                <input type="text" name="direct_pay" class="form-control temp" placeholder="<?= lang('enter_direct_pay') ?>">
                            </div>
                            <div class="col-4 mt-1">
							 	<label for=""><?= lang('special_offer') ?></label><i class="bi bi-star-fill"></i>
								 <input type="text" name="special_offer" class="form-control temp rqure" placeholder="<?= lang('special_offer') ?>">
							 </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for=""><?= lang('travelling_time') ?></label>
                                <input type="text" name="travelling_time" class="form-control temp" placeholder="<?= lang('enter_travalling_time') ?>" >
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('payment_time') ?></label>
                                <input type="text" name="payment_time" class="form-control temp" placeholder="<?= lang('payment_time') ?>">
                            </div>
                        <!-- </div>
                        <div class="row mt-2"> -->
                            <div class="col-4">
                                <label for=""><?= lang('term_and_condition') ?></label>
                                <textarea type="text" name="termsConditions" class="form-control temp" placeholder="" ></textarea>
                            </div>
							
                        </div>
						<div class="row mt-2">
							<div  class="col-4 mt-1">
								<label for=""><?= lang('detail') ?></label><i class="bi bi-star-fill"></i>
                                <textarea type="text" name="detail" class="form-control temp rqure" placeholder="<?= lang('enter_detail') ?>"></textarea>
							</div>
							<div class="col-4 mt-1">
								<label for=""><?= lang('refund'); ?></label>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="refund" id="pickup_yes" value="yes">
									<label class="form-check-label" for="refund_yes"><?= lang('yes'); ?></label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="refund" id="refund_no" value="no">
									<label class="form-check-label" for="refund_no"><?= lang('no'); ?></label>
								</div>
							</div>
                            <div class="col-4 mt-1">
								<label for=""><?= lang('pickup'); ?></label>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="pickup" id="pickup_yes" value="yes">
									<label class="form-check-label" for="pickup_yes"><?= lang('yes'); ?></label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="pickup" id="pickup_no" value="no">
									<label class="form-check-label" for="pickup_no"><?= lang('no'); ?></label>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-4">
                                <label for=""><?= lang('phone'); ?></label>
                                <input type="text" name="phone" class="form-control temp" placeholder="<?= lang('enter_mobile_no') ?>">
                            </div>
							<div class="col-4">
                                <label for="">Google Map</label>
                                <input type="text" name="google_map" class="form-control temp" placeholder="Google Map">
                            </div>
							<div class="col-4">
                                <label for="">Visit Start</label><i class="bi bi-star-fill"></i>
                                <!-- <input type="text" name="visiting_start" class="form-control temp" placeholder="Visit Start"> -->
                                <select class="form-select temp rqure" name="visiting_start" id="visiting_start">
								<option value="" selected disabled><?= lang('visiting start time') ?></option>
                                     <?php for ($i = 0; $i <= 23; $i++) { 
                                        
                                        $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT);?>
                                        <option value="<?= $formattedHour ?>"><?= $formattedHour ?></option>
                                    <?php } ?>
                                </select>
                            </div>
						</div>
						<div class="row mt-2">
							<div class="col-4">
                                <label for="">Visit End</label><i class="bi bi-star-fill"></i>
                                <!-- <input type="text" name="visiting_end" class="form-control temp" placeholder="Visit End"> -->
                                <select class="form-select temp rqure" name="visiting_end" id="visiting_end">
								<option value="" selected disabled><?= lang('visiting End time') ?></option>
                                     <?php for ($i = 0; $i <= 23; $i++) { 
                                        
                                        $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT);?>
                                        <option value="<?= $formattedHour ?>" data-value="<?= $formattedHour; ?>"><?= $formattedHour ?></option>
                                    <?php } ?>
                                </select>
                            </div>
						</div>
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal fade " id="items_modal_3_add"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered items_modal_3_add">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal_label_txt"> <?php echo $this->lang->line('image'); ?> </div>
                <button type="button" class="close close_modal_btn" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="modal-body pt-0  p-0" id="item_image_add"></div>
        </div>
    </div>
</div>
                <!-- <script src="https://cdn.ckeditor.com/4.11.1/standard-all/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="<?= base_url('assets/js/ckfinder.js'); ?>"></script>  -->
    <script>
        $(document).ready(function() {
    $('#visiting_start').change(function() {
        var firstValue = parseInt($(this).val());
        $('#visiting_end option').prop('disabled', false);
        $('#visiting_end option').each(function() {
            if (parseInt($(this).val()) <= firstValue) {
                $(this).prop('disabled', true);
            }
        });
    });
});
		    $(document).ready(function() {
				$(".readonly-select").attr('readonly', 'readonly').css('pointer-events', 'none');
			});


        function image_modal3(item_id) 
    {
        $.ajax({
            url: "<?= base_url('admin/image_modal_for_add')?>",
            type: 'POST',
            data: {
                item_id: item_id
            },
            dataType: "json",
            success: function(data) {
                if (data.status == true) {
                    $("#item_image_add").html(data.content);
                    $("#items_modal_3_add").modal('show');
                }
            },
        });
    }
$(document).ready(function(){
    $("#add_offer").submit(function(e){
        e.preventDefault();
        var formValid = true;

$(this).find('.rqure, select,input[type="file"]').each(function () {
    // Check if the element is a select or text input
    if ($(this).is('select')) {
        // For select elements, check if a value is selected
        if ($(this).val() === null || $(this).val() === "") {
            formValid = false;
            return false; // exit the loop
        }
    } else if ($(this).is('input[type="file"] , .rqure')) {
        // For text inputs, check if the value is empty
        if ($(this).val().trim() === "") {
            formValid = false;
            return false; // exit the loop
        }
    }
});

if (!formValid) {
    new Noty({
        text: 'Please * fill in all fields.',
        type: 'error',
        timeout: 5000
    }).show();
    console.log("fill all fields");
    return;
}
				// Get the value of adult fields
				var adult_price = 0;
				var adult_discount = 0;
				var adult_commission = 0;

				// Get the value of child fields
				var child_price = 0;
				var child_discount = 0;
				var child_commission = 0;
				if($('#adult_price').val()!=''){
				   adult_price = parseInt($('#adult_price').val());
				}
				if($('#adult_discount').val() != ''){
					adult_discount = parseInt($('#adult_discount').val())
				}
				if($('#adult_commission').val() != ''){
					adult_commission = parseInt($('#adult_commission').val());
				}
				if($('#child_price').val()!=''){
				   child_price = parseInt($('#child_price').val());
				}
				if($('#child_discount').val() != ''){
					child_discount = parseInt($('#child_discount').val())
				}
				if($('#child_commission').val() != ''){
					child_commission = parseInt($('#child_commission').val());
				}
				if ($('#adultSection').hasClass('active')) {
					if (adult_price === '') {
					new Noty({
						text: 'Please Enter Adult Price',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}

				if (adult_commission === '') {
					new Noty({
						text: 'Please Enter Adult Commission',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}
			
				if (adult_discount != '' && adult_discount != 0) {
					//alert(typeof adult_discount);
				//return false;
				if(adult_commission > adult_price){
						new Noty({
							text: 'Adult Price Must be grater Than Adult Commission',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
					if(adult_discount > adult_price){
						new Noty({
							text: 'Adult Price Must be grater Than Adult Discount',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
					var test_adult_discount_commission = adult_discount * 0.1;
					if (test_adult_discount_commission > adult_commission) {
						new Noty({
							text: 'Adult Commission should be at least 10% of Adult Discount',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					} else if (adult_commission > adult_discount) {
						new Noty({
							text: 'Adult Commission must be less than Adult Discount',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
				} else {
					var test_adult_price_commission = adult_price * 0.1;
					if (test_adult_price_commission > adult_commission) {
						new Noty({
							text: 'Adult Commission should be at least 10% of Adult Price',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					} else if (adult_commission > adult_price) {
						new Noty({
							text: 'Adult Commission must be less than Adult Price',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
				}
				}else{
					$('#adult_price, #adult_discount, #adult_commission').val(0);
				}


				if ($('#childSection').hasClass('active')) {
				if (child_price === '') {
					new Noty({
						text: 'Please Enter Child Price',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}

				if (child_commission === '') {
					new Noty({
						text: 'Please Enter Child Commission',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}

				if (child_discount != '' && child_discount != 0) {
					//alert(typeof adult_discount);
				//return false;
				if(child_commission > child_price){
						new Noty({
							text: 'Child Price Must be grater Than Child Commission',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
					if(child_discount > child_price){
						new Noty({
							text: 'Child Price Must be grater Than Child Discount',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
					var test_child_discount_commission = child_discount * 0.1;
					if (test_child_discount_commission > child_commission) {
						new Noty({
							text: 'Child Commission should be at least 10% of Child Discount',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					} else if (child_commission > child_discount) {
						new Noty({
							text: 'child Commission must be less than child Discount',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
				} else {
					var test_child_price_commission = child_price * 0.1;
					if (test_child_price_commission > child_commission) {
						new Noty({
							text: 'child Commission should be at least 10% of child Price',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					} else if (child_commission > child_price) {
						new Noty({
							text: 'Child Commission must be less than Child Price',
							type: 'error',
							timeout: 3000,
						}).show();
						return;
					}
				}
			}else{
				$('#child_price, #child_discount, #child_commission').val(0);
			}

var formData = new FormData(this);

  /**********Loader**************/
  Swal.fire({
    title: 'Loading...',
    showConfirmButton: false,
    allowOutsideClick: false,
    willOpen: () => {
        Swal.showLoading();
    }
});                                       
/**********Loader**************/ 
        // var editorData = CKEDITOR.instances.editor2.getData();
        // console.log(editorData);

        $.ajax({
            url : "<?= base_url('admin/save_offer') ?>",
            data : formData,
            dataType : "json",
            type : "POST",
            contentType: false,
            processData: false,
            success : function(res)
            {
                console.log(res);
                if(res.status == true)
                {
                    Swal.close(); 
                    // $(".sidebar-nav .offers").trigger("click");
                    $('#offerModal').css('display','none');
                    $(".tbodyOffer").append('<tr id='+res.id+'>'+res.html+'</tr>')
                }
            }
        });

    });
});

$("#country").change(function(){
var countryId = $("#country").val();
// console.log(countryId);
		$.ajax({
			url : "<?= base_url('admin/getState') ?>",
			data : {countryId:countryId},
			dataType : "json",
			type : "POST",
			success : function(res)
			{
				if(res.status == true)
				{
					$("#state").html(res.html);
				}
			}
		});
});

$("#provider").change(function(){
var providerId = $("#provider").val();
console.log(providerId);
		$.ajax({
			url : "<?= base_url('admin/getProviderCurrency') ?>",
			data : {providerId:providerId},
			dataType : "json",
			type : "POST",
			success : function(res)
			{
				if (res.status == true) {
					$("#currency").html("<option value='" + res.default_currency + "'>" + res.default_currency + "</option>");
				}
			}
		});
});

$(document).ready(function () {
        // Disable child_discount and child_commission initially
        $('#child_discount').prop('disabled', true);
        $('#child_commission').prop('disabled', true);

        // Enable child_discount and child_commission when child_price has a value
        $('#child_price').on('input', function () {
            var childPriceValue = $(this).val();
            var disableFields = (childPriceValue.trim() === '');

            $('#child_discount').prop('disabled', disableFields);
            $('#child_commission').prop('disabled', disableFields);
        });

		$('#adult_discount').prop('disabled', true);
        $('#adult_commission').prop('disabled', true);

        // Enable adult_discount and adult_commission when adult_price has a value
        $('#adult_price').on('input', function () {
            var adultPriceValue = $(this).val();
            var disableFields = (adultPriceValue.trim() === '');

            $('#adult_discount').prop('disabled', disableFields);
            $('#adult_commission').prop('disabled', disableFields);
        });
    });

	$(document).ready(function(){
        $("#offer_type").change(function(){
            var selectedOption = $(this).val();

			$("#adultSection, #childSection").hide();
		
			// Show the selected section
			if(selectedOption === "adult") {
				$("#childSection").removeClass('active');
				$("#adultSection").addClass('active');
				$("#adultSection").show();
			} else if(selectedOption === "child") {
				$("#adultSection").removeClass('active');
				$("#childSection").addClass('active');
				$("#childSection").show();
			} else if(selectedOption === "both") {
				// Show both sections
				$("#adultSection").addClass('active');
				$("#childSection").addClass('active');
				$("#adultSection, #childSection").show();
			}
        });
    });
    </script>
    <!-- <script>
	if ( typeof ClassicEditor !== 'undefined' ) {
		ClassicEditor
			.create( document.querySelector( '#editor1' ), {
				ckfinder: {
					// To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
					uploadUrl: '../core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
				},
				toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]

			} )
			.then( function( editor ) {
				console.log( editor );
			} )
			.catch( function( error ) {
				console.error( error );
			} );
	} else {
		document.getElementById( 'editor1' ).innerHTML =
			'<div class="tip-a tip-a-alert">This sample requires working Internet connection to load CKEditor 5 from CDN.</div>'
	}
	if ( typeof CKEDITOR !== 'undefined' ) {
		CKEDITOR.disableAutoInline = true;
		CKEDITOR.addCss( 'img {max-width:100%; height: auto;}' );
		var editor = CKEDITOR.replace( 'editor2', {
			extraPlugins: 'uploadimage,image2',
			removePlugins: 'image',
			height:250
		} );
		CKFinder.setupCKEditor( editor );
	} else {
		document.getElementById( 'editor2' ).innerHTML =
			'<div class="tip-a tip-a-alert">This sample requires working Internet connection to load CKEditor 4 from CDN.</div>'
	}

</script> -->
<!-- <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script> -->
