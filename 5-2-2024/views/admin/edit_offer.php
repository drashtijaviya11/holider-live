
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

    .image-container {
        position: relative;
        display: inline-block;
        margin-right: 5px;
        overflow: hidden; /* Hide the delete icon initially */
    }

    .image-container:hover .delete-icon {
        display: block;
    }
    .image-container:hover .image-container{
        background-color: black;
    }

    .image {
        width: 50px;
        height: 50px;
    }

    .delete-icon {
        font-weight: 900;
        position: absolute;
        top: 50%;
        left: 80%;
        transform: translate(-50%, -50%);
        font-size: 14px; /* Decrease the font size of the cross symbol */
        color: red;
        cursor: pointer;
        display: none; /* Hide the delete icon initially */
    }
    .preview-icon{
        font-weight: 900;
        position: absolute;
        top: 50%;
        left: 20%;
        transform: translate(-50%, -50%);
        font-size: 14px; 
        cursor: pointer;
        display: none;
    }
    .image-container:hover  .preview-icon {
        display: block;
    }

</style>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->


                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp"><?= lang('edit_offer'); ?></div>
                        <hr>
                    </div>
                    <form action="" id="add_offer"  method="post" enctype="multipart/form-data">
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for=""><?= lang('offer name'); ?></label><i class="bi bi-star-fill"></i>
                                <input type="hidden" name="id"  value="<?= $offer['id']; ?>" >
                                <input type="text" name="offer_name" class="form-control temp requre" value="<?= $offer['name']; ?>">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('address'); ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="address" class="form-control temp requre" value="<?= $offer['address']; ?>">
                            </div>
							<div class="col-4">
								<label for="">Offer Type</label><i class="bi bi-star-fill"></i>
                                <select name="offer_type" id="offer_type" class="form-select temp rqure">
								<option  value=""  selected disabled>Select Type</option>
									<option  value="adult" <?= $offer['offer_type'] === 'adult' ? 'selected' : '' ; ?> >Adult</option>
									<option  value="child"  <?= $offer['offer_type'] === 'child' ? 'selected' : '' ; ?>  >Child</option>
									<option  value="both"  <?= $offer['offer_type'] === 'both' ? 'selected' : '' ; ?> >Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for=""><?= lang('country'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="country" id="country" class="form-select temp rqure">
                                    <?php foreach ($country as $c) : ?>
                                        <?php $selected = ($c['id'] == $offer['country']) ? 'selected' : ''; ?>
                                        <option value="<?= $c['id'] ?>" <?= $selected ?>><?= $c['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" name="country" class="form-control temp rqure" placeholder="<?= lang('enter country name') ?>"> -->
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('state'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="state" id="state" class="form-select temp rqure">
                                    <?php  foreach($state as $s) : ?> 
                                    <?php  $selected = ($s['id'] == $offer['state']) ? 'selected' : ''; ?>
                                        <option value="<?= $s['id'] ?>" <?= $selected ?> ><?= $s['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" name="state" class="form-control temp rqure" placeholder="<?= lang('enter state name') ?>"> -->
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('area'); ?></label><i class="bi bi-star-fill"></i>
								<select class="form-select temp rqure" name="area" id="area">
                                    <?php foreach($areas as $area) { ?>
										<?php if($area['id'] == $offer['area']){$select = 'selected'; }else{ $select = ''; } ?>
                                        <option value="<?= $area['id'] ?>" <?= $select; ?> ><?= $area['area'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="area" class="form-control temp rqure" placeholder="<?= lang('enter_area') ?>"> -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 mt-1">
                                <label for=""><?= lang('provider') ?></label><i class="bi bi-star-fill"></i>
                                <select class="form-select form-control temp requre" id="provider" name="provider" >
                                    <?php foreach($provider as $provider) { ?>
                                        <?php if($provider['id'] == $offer['provider_id']){$select = 'selected'; }else{ $select = ''; } ?>
                                    <option value="<?= $provider['id'] ?>" <?= $select; ?> ><?= $provider['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
							<div class="col-4">
							<label for=""><?= lang('default_currency') ?></label><i class="bi bi-star-fill"></i>
                                <!-- <input type="text" name="default_currency" class="form-control temp requre" value="<?= $provider['default_currency']; ?>" > -->
								<select name="default_currency" id="currency" class="form-select readonly-select" class="" >
									<?php foreach($currency as $curr) { ?>
										<?php if($curr['code'] == $offer['currency_type']){$select = 'selected'; }else{ $select = ''; } ?>
										<option value="<?= $curr['code']; ?>"  <?= $select; ?>><?= $curr['code']; ?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-4 mt-1">
                                <label for="category"><?= lang('category') ?></label><i class="bi bi-star-fill"></i>
                                <select class="form-select form-control temp requre" name="category" id="category">
                                    <?php foreach($category as $catg) { ?>
										<?php if($catg['id'] == $offer['categories']){$select = 'selected'; }else{ $select = ''; } ?>
                                    <option value="<?= $catg['id'] ?>" <?= $select; ?> ><?= $catg['category_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mt-2" id="adultSection">
                        <div class="col-4">
                                <label for=""><?= lang('adult_price') ?></label>
                                <input type="number" name="adult_price" id="adult_price"class="form-control temp" placeholder="<?= lang('enter_adult_price') ?>" value="<?= $offer['adult_price']; ?>" step="any">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('adult_discount') ?></label>
                                <input type="number" name="adult_discount" id="adult_discount"class="form-control temp" placeholder="<?= lang('enter_adult_discount') ?>" value="<?= $offer['adult_discount']; ?>" step="any">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('adult_commission') ?></label>
                                <input type="number" name="adult_commission" id="adult_commission"class="form-control temp" placeholder="<?= lang('enter_adult_commission') ?>" value="<?= $offer['adult_commission']; ?>" step="any">
                            </div>
                        </div>
                        <div class="row mt-2" id="childSection" >
                            <div class="col-4">
                                <label for=""><?= lang('child_price') ?></label>
                                <input type="number" name="child_price" id="child_price" class="form-control temp" placeholder="<?= lang('enter_child_price') ?>" value="<?= $offer['child_price']; ?>" step="any">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('child_discount') ?></label>
                                <input type="number" name="child_discount" id="child_discount" class="form-control temp" placeholder="<?= lang('enter_child_discount') ?>" value="<?= $offer['child_discount']; ?>" step="any">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('child_commission') ?></label>
                                <input type="number" name="child_commission" id="child_commission" class="form-control temp" placeholder="<?= lang('enter_child_commission') ?>"  value="<?= $offer['child_commission']; ?>" step="any">
                            </div>
                        </div>
                        <div class="row mt-2">
                           
                            <div class="col-4">
                                <label for=""><?= lang('direct_pay') ?></label>
                                <input type="text" name="direct_pay" class="form-control temp" placeholder="<?= lang('enter_direct_pay') ?>"  value="<?= $offer['direct_pay']; ?>">
                            </div>
                        
                            <div class="col-4 mt-1">
                                <label for=""><?= lang('travelling_time') ?></label>
                                <input type="text" name="travelling_time" class="form-control temp" placeholder="<?= lang('enter_travalling_time') ?>"  value="<?= $offer['traveling_time']; ?>">
                            </div>
                            <div class="col-4">
                                <label for=""><?= lang('payment_time') ?></label>
                                <input type="text" name="payment_time" class="form-control temp" placeholder="<?= lang('payment_time') ?>"  value="<?= $offer['payment_time']; ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 mt-1">
                                <label for=""><?= lang('term_and_condition') ?></label>
                                <textarea type="text" name="termsConditions" class="form-control temp" placeholder="" ><?= $offer['terms_and_condition']; ?></textarea>
                            </div>
                            <div class="col-4 mt-1">
							<label for=""><?= lang('special_offer') ?></label><i class="bi bi-star-fill"></i>
								<input type="text" name="special_offer" class="form-control temp rqure" placeholder="<?= lang('special_offer') ?>" value="<?= $offer['special_offer']; ?>">
							</div>
                            <div class="col-4 mt-1">
                                <label for=""><?= lang('upload_image') ?></label>
                                <input type="file" name="image[]" class="form-control temp" accept="image/*,video/mp4" multiple>
                                <?php
                                    $imageList = array();
                                    if (!empty($offer['image'])) :
                                        $imageArray = json_decode($offer['image'], true);
                                        foreach ($imageArray as $index => $imageData) {
                                            if (isset($imageData['url'])) {
                                                $fileUrl = base_url($imageData['url']);
                                                $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                                                
                                                array_push($imageList, $imageData['url']);
                                                ?>
                                                <div class="image-container" data-index="<?= $index ?>">
                                                    <?php if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) : ?>
                                                        <!-- Image preview -->
                                                        <img src="<?= $fileUrl ?>" alt="Image <?= ($index + 1) ?>" class="image" width="50" height="50">
                                                        <!-- Preview icon -->
                                                        <div class="preview-icon" onclick="showImagePreview('<?= $fileUrl ?>')"><i class="bi bi-image-fill text-white"></i></div>
                                                    <?php elseif ($fileExtension === 'mp4') : ?>
                                                        <!-- Video preview -->
                                                        <video width="50" height="50" controls>
                                                            <source src="<?= $fileUrl ?>" type="video/mp4">
                                                            <!-- Your browser does not support the video tag. -->
                                                        </video>
                                                        <!-- Preview icon -->
                                                        <div class="preview-icon" onclick="showVideoPreview('<?= $fileUrl ?>')"><i class="bi bi-film  text-white"></i></div>
                                                    <?php else : ?>
                                                    <?php endif; ?>
                                                    <div class="delete-icon" onclick="deleteImage(<?= $index ?>)">x</div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    endif;
                                    ?>
                                <input type="hidden" name="showing_img" class="showing_img" value='<?= json_encode($imageList, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>'>
                            </div>
                            
                        </div>
						<div class="row mt-2">
							<div class="col-4">
                                <label for=""><?= lang('detail') ?></label><i class="bi bi-star-fill"></i>
                                <textarea type="text" name="detail" class="form-control temp requre" ><?= $offer['details']; ?></textarea>
                                <!-- <main class="grid-container">
                                    <div id="editor2"></div>
                                </main> -->
                            </div>
							<div class="col-4 mt-1">
								<label for=""><?= lang('refund'); ?></label>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="refund" id="pickup_yes" value="yes" <?php echo ($offer['refund'] == 'Yes') ? 'checked' : ''; ?>>
									<label class="form-check-label" for="refund_yes"><?= lang('yes'); ?></label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="refund" id="refund_no" value="no" <?php echo ($offer['refund'] == 'No') ? 'checked' : ''; ?>>
									<label class="form-check-label" for="refund_no"><?= lang('no'); ?></label>
								</div>
							</div>
							<div class="col-4 mt-1">
								<label for=""><?= lang('pickup'); ?></label>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="pickup" id="pickup_yes" value="yes" <?php echo ($offer['pickup'] == 'Yes') ? 'checked' : ''; ?>>
									<label class="form-check-label" for="pickup_yes"><?= lang('yes'); ?></label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input temp" name="pickup" id="pickup_no" value="no" <?php echo ($offer['pickup'] == 'No') ? 'checked' : ''; ?>>
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
                                <input type="text" name="google_map" class="form-control temp" placeholder="Google Map" value="<?= $offer['google_map'] ?>">
                            </div>
							<div class="col-4">
                                <label for="">Visit Start</label>
								<select class="form-select temp rqure" name="visiting_start" id="visiting_start">
								<option value="" selected disabled><?= lang('visiting start time') ?></option>
                                     <?php for ($i = 0; $i <= 23; $i++) { 
                                        $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT);?>
										<?php if($formattedHour == $offer['visiting_start']){$select = 'selected'; }else{ $select = ''; } ?>
                                        <option value="<?= $formattedHour ?>" <?= $select ?>><?= $formattedHour ?></option>
                                    <?php } ?>
                                </select>
                            </div>
						</div>
						<div class="row mt-2">
							<div class="col-4">
                                <label for="">Visit End</label>
								<select class="form-select temp rqure" name="visiting_end" id="visiting_end">
								<option value="" selected disabled><?= lang('visiting End time') ?></option>
                                     <?php for ($i = 0; $i <= 23; $i++) { 
                                        $formattedHour = str_pad($i, 2, '0', STR_PAD_LEFT);?>
										<?php if($formattedHour == $offer['visiting_end']){$select = 'selected'; }else{ $select = ''; } ?>
                                        <option value="<?= $formattedHour ?>" data-value="<?= $formattedHour; ?>" <?= $select ?>><?= $formattedHour ?></option>
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
                <div class="modal" id="VedioModel" tabindex="-1" role="dialog" aria-labelledby="providerModalLabel" aria-hidden="true" style="width: 40%;left: 30%;overflow-y: hidden;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content comingsoon_model">
                            <div class="modal-header coming_header">               
                                <button type="button" class="vedio_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <video controls=""  style="height: 200px;width: 350px;">
                                    <source src="" type="video/mp4">                                            <!-- Your browser does not support the video tag. -->
                                </video>
                            </div>
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


$(".vedio_close").click(function(){
        $('#VedioModel').css('display','none');
        var videoElement = $('#VedioModel video')[0];
        videoElement.pause();
    });


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
            } else if ($(this).is('.rqure')) {
                // For text inputs, check if the value is empty
                if ($(this).val() === "") {
                    formValid = false;
                    return false; // exit the loop
                }
            }
        });
                if (!formValid) {
                    new Noty({
                        text: '* Fields are Required',
                        type: 'error',
			timeout: 9000,
                    }).show();
                    return; 
                    console.log("fill all fields");
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
			// Check if child_price is empty
			if (child_price === '') {
				new Noty({
					text: 'Please Enter Child Price',
					type: 'error',
					timeout: 3000,
				}).show();
				return;
			}

			// Check if child_commission is empty
			if (child_commission === '') {
				new Noty({
					text: 'Please Enter Child Commission',
					type: 'error',
					timeout: 3000,
				}).show();
				return;
			}

			// Check if child_discount is not empty and not equal to 0
			if (child_discount != '' && child_discount != 0) {
				// Check if child_commission is greater than child_price
				if (child_commission > child_price) {
					new Noty({
						text: 'Child Price Must be greater Than Child Commission',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}

				// Check if child_discount is greater than child_price
				if (child_discount > child_price) {
					new Noty({
						text: 'Child Price Must be greater Than Child Discount',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}

				// Calculate 10% of child_discount
				var test_child_discount_commission = child_discount * 0.1;

				// Check if child_commission is less than 10% of child_discount
				if (test_child_discount_commission > child_commission) {
					new Noty({
						text: 'Child Commission should be at least 10% of Child Discount',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				} else if (child_commission > child_discount) {
					new Noty({
						text: 'Child Commission must be less than Child Discount',
						type: 'error',
						timeout: 3000,
					}).show();
					return;
				}
			} else {
				// Calculate 10% of child_price
				var test_child_price_commission = child_price * 0.1;

				// Check if child_commission is less than 10% of child_price
				if (test_child_price_commission > child_commission) {
					new Noty({
						text: 'Child Commission should be at least 10% of Child Price',
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
        $.ajax({
            url : "<?= base_url('admin/updateOffer') ?>",
            data : formData,
            dataType : "json",
            type : "POST",
            contentType: false,
            processData: false,
            success : function(res)
            {
                Swal.close(); 
                // console.log(res);
                if(res.status == true)
                {
                    // $(".sidebar-nav .offers").trigger("click");
                    $('#offerModal').css('display','none');
                    $(".tbodyOffer #"+res.id+"").html(res.html);
                    $(".proOfferBody #"+res.id+"").html(res.html);

                }
            }
        })

    });
});
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function deleteImage(index) {
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var imageContainer = $('.image-container[data-index="' + index + '"]');
                imageContainer.hide();
                var imgValue = $('.showing_img').val();
                $.ajax({
                    url : '<?= base_url("admin/deleteImage") ?>',
                    data : {index:index,imgValue:imgValue},
                    dataType : "json",
                    type : "POST",
                    success : function(res)
                    {
                        $('.showing_img').val(res.imgValue);
                    }
                })
            }
        });
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Fancybox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
        function showImagePreview(imageUrl) {
            $.fancybox.open({
                src: imageUrl,
                type: 'image'
            });
        }

        function showVideoPreview(mediaUrl) {

            $('#VedioModel video').attr('src', mediaUrl);
            $('#VedioModel').css('display','block');
            var videoElement = $('#VedioModel video')[0];

            // Auto-play the video
            videoElement.play();
        }

		$("#country").change(function(){
		var countryId = $("#country").val();
		console.log(countryId);
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


	
	$(document).ready(function(){

    $("#adultSection, #childSection").hide();
    handleOfferTypeDisplay($("#offer_type").val());

    $("#offer_type").change(function(){
        var selectedOption = $(this).val();
        handleOfferTypeDisplay(selectedOption);
    });

	function handleOfferTypeDisplay(selectedOption) {
		// Hide all sections
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
	}

});

</script>


