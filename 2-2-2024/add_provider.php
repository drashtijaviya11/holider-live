<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- /*****************************     Noty Css And Js     ******************************** */ -->
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.noty.js"></script>
<script src="<?php echo base_url(); ?>assets/js/noty.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/noty.css" /> -->
<!-- /*****************************   End  Noty Css And Js     ******************************** */ -->
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
/* @media (max-width: 767px) {
        .temp,label {
            font-size: 10px;
        }
    } */
</style>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp">Add Provider</div>
                        <hr>
                    </div>
                    <form action="" id="add_user"  method="post" >
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('name') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="name" class="form-control temp requre" placeholder="<?= lang('enter_your_name') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('email') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="email" class="form-control temp requre" placeholder="<?= lang('enter_email') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                             <div class="col-6">
                                <label for=""><?= lang('country'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="country" id="country" class="form-select temp requre">
                                <option  value=""  selected disabled> Select Country</option>
                                    <?php  foreach($country as $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="country" class="form-control temp rqure" placeholder="<?= lang('enter country name') ?>"> -->
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('state'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="state" id="state" class="form-select temp requre">
                                <option  value="" selected disabled> Select State</option>
                                    <?php  foreach($state as $state) { ?>
                                        <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="state" class="form-control temp rqure" placeholder="<?= lang('enter state name') ?>"> -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">Status</label><i class="bi bi-star-fill"></i>
                                <select class="form-select temp requre" name="status" id="category">
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('mobile') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="phone" class="form-control temp requre" placeholder="<?= lang('enter_mobile_no') ?>" style="margin:0px">
								<p style="font-size: 10px;color: #838383eb;">Please add your mobile number with country code (Example Country Code: 91 Mobile:  916524514875) </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('address') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="address" class="form-control temp requre" placeholder="<?= lang('enter_address') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('bank_name') ?></label>
                                <input type="text" name="bank_name" class="form-control temp" placeholder="<?= lang('enter_bank_name') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('account_number') ?></label>
                                <input type="text" name="acc_number" class="form-control temp" placeholder="<?= lang('enter_account_number') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('account_holder_name') ?></label>
                                <input type="text" name="account_name" class="form-control temp" placeholder="<?= lang('enter_account_holder_name') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('ifcs_code'); ?></label>
                                <input type="text" name="ifsc_code" class="form-control temp" placeholder="<?= lang('enter_ifsc_code') ?>">
                            </div>
                            <div class="col-6">
                                <label for="">default_currency</label><i class="bi bi-star-fill"></i>
                                <!-- <input type="text" name="default_currency" class="form-control temp requre" placeholder="<?= lang('default_currency') ?>"> -->
								<select name="default_currency" id="" class="form-select">
									<?php foreach($currency as $curr) { ?>
										<option value="<?= $curr['code']; ?>"><?= $curr['code']; ?></option>
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

<script>
    $(document).ready(function(){
        $("#add_user").submit(function(e){
            e.preventDefault();
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
                        text: '* Fields are Require',
                        type: 'error',
                        timeout: 5000
                    }).show();
                    return; 
                    console.log("fill all fields");
                }
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
            var formData = new FormData(this);
            var phoneNumber = formData.get('phone');
            $.ajax({
                url : "<?= base_url('admin/save_provider') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                {
                    Swal.close(); 
                    if(res.status == true)
                    {
                        $('#providerModal').css('display','none');
                        $(".tbodyPro").append('<tr id='+res.id+'>'+res.html+'</tr>');

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