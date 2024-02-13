<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
@media (max-width: 767px) {
        .temp,label {
            font-size: 10px;
        }
    }
</style>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp">Edit Provider</div>
                        <hr>
                    </div>
                    <form action="" id="edit_provider"  method="post" >
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('name') ?></label><i class="bi bi-star-fill"></i>
                                <input type="hidden" name="id"  value="<?= $provider['id']; ?>" >
                                <input type="text" name="name" class="form-control temp requre" value="<?= $provider['name']; ?>" >
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('email') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="email" class="form-control temp requre" value="<?= $provider['email']; ?>" >
                            </div>
                        </div>
                        <!-- <div class="row mt-2">
                            <div class="col-6 mt-1">
                                <label for=""><?= lang('password') ?></label>
                                <input type="password" name="password" class="form-control temp" placeholder="<?= lang('password') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('confirm password') ?></label>
                                <input type="password" name="password_confirmation" class="form-control temp" placeholder="<?= lang('confirm_password') ?>">
                            </div>
                        </div> -->
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('country'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="country" id="country" class="form-select temp requre">
                                    <?php foreach ($country as $c) : ?>
                                        <?php $selected = ($c['id'] == $provider['country']) ? 'selected' : ''; ?>
                                        <option value="<?= $c['id'] ?>" <?= $selected ?>><?= $c['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" name="country" class="form-control temp rqure" placeholder="<?= lang('enter country name') ?>"> -->
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('state'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="state" id="state" class="form-select temp requre">
                                    <?php  foreach($state as $s) : ?> 
                                    <?php  $selected = ($s['id'] == $provider['state']) ? 'selected' : ''; ?>
                                        <option value="<?= $s['id'] ?>" <?= $selected ?> ><?= $s['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" name="state" class="form-control temp rqure" placeholder="<?= lang('enter state name') ?>"> -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">Status</label><i class="bi bi-star-fill"></i>
                                <select class="form-select form-control temp requre" name="status" id="category">
                                    <?php if($provider['status']  == 1){ ?>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Not Active</option>
                                    <?php  }else{ ?>
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Not Active</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('mobile') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="phone" class="form-control temp requre" value="<?= $provider['phone']; ?>" style="margin:0px">
								<p style="font-size: 10px;color: #838383eb;">Please add your mobile number with country code (Example Country Code: 91 Mobile:  916524514875) </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('address') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="address" class="form-control temp requre" value="<?= $provider['address']; ?>" >
                            </div>
                            <div class="col-6">
                                <label for="">Bank Name</label>
                                <input type="text" name="bank_name" class="form-control temp" placeholder="<?= lang('enter_bank_name') ?>" value="<?= $provider['bank_name']; ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">Account Number</label>
                                <input type="text" name="acc_number" class="form-control temp" placeholder="<?= lang('enter_account_number') ?>"  value="<?= $provider['account_number']; ?>">
                            </div>
                            <div class="col-6">
                                <label for="">Account Holder Name</label>
                                <input type="text" name="account_name" class="form-control temp" placeholder="<?= lang('enter_account_holder_name') ?>" value="<?= $provider['account_name']; ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">IFSC Code</label>
                                <input type="text" name="ifsc_code" class="form-control temp" placeholder="<?= lang('enter_ifsc_code') ?>" value="<?= $provider['ifsc_code']; ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('default_currency') ?></label><i class="bi bi-star-fill"></i>
                                <!-- <input type="text" name="default_currency" class="form-control temp requre" value="<?= $provider['default_currency']; ?>" > -->
								<select name="default_currency" id="" class="form-select requre temp">
									<?php foreach($currency as $curr) { ?>
										<?php  $selected = ($provider['default_currency'] == $curr['code']) ? 'selected' : ''; ?>
										<option value="<?= $curr['code']; ?>"  <?= $selected ?> ><?= $curr['code']; ?></option>
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        $("#edit_provider").submit(function(e){
            e.preventDefault();
            var inputNumber = $('input[name="phone"]').val();
            if (inputNumber === "") {
                new Noty({
                            text: 'Mobile number is required',
                            type: 'error',
                            timeout: 9000,
                        }).show();
                return false;
            }
            var formValid = true;
            $(this).find('.requre, select').each(function () {
                // Check if the element is a select or text input
                if ($(this).is('select')) {
                    // For select elements, check if a value is selected
                    if ($(this).val() === null || $(this).val() === "") {
                        formValid = false;
                        return false; // exit the loop
                    }
                }
				if ($(this).is('.requre')) {
                    // For text inputs, check if the value is empty
                    if ($(this).val().trim() === "") {
                        formValid = false;
                        return false; // exit the loop
                    }
                }
            });

                if (!formValid) {
                    new Noty({
                        text: '* Fields are Required',
                        type: 'error',
                        timeout: 5000
                    }).show();
                    return; 
                    console.log("fill all fields");
                }
            // Swal.fire({
            //     title: 'Loading...',
            //     showConfirmButton: false,
            //     allowOutsideClick: false,
            //     willOpen: () => {
            //         Swal.showLoading();
            //     }
            // });
            var formData = new FormData(this);
            $.ajax({
                url : "<?= base_url('admin/edit_provider') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                {
                    // Swal.close();
                    if(res.status == true)
                    {
                        $('#providerModal').css('display','none');
                        $(".tbodyPro #"+res.id+"").html(res.html);
                    }
                    else{
                        new Noty({
                            text: res.Message,
                            type: 'error',
                            timeout: 9000,
                        }).show();
                    }
                }
            });
        });
    });

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
</script>