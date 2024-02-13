
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
.employe-line {
    margin-left: 0rem !important;
    color: #00B5DC !important;
    border: 0;
    border-radius: 7px 7px 7px 7px;
    border-top: 3px solid !important;
    opacity: 1 !important;
}
.name-text {
    border: 1px solid #025769 !important;
    border-radius: 7px 7px 7px 7px !important;
}
@media (min-width: 320px) and (max-width: 1200px) {
	    .employe-form {
			padding: 2em 1em !important;
	    }
}
@media (min-width: 991px) and (max-width: 1200px) {
	    .employe-text {
	    	font-size: 20px !important;
	    }
}
@media (min-width: 1200px) {
	    .employe-form {
	    	padding-left: 8em !important;
	    	padding-right: 8em !important;
			padding-top: 2em !important;
	    	padding-bottom: 2em !important;
	    }
}
	
</style>

                <section class="pt-4">
                  <div class="container">
                    <div class="row">
                	  <div class="col-lg-6">
                	    <div class="row">
                	 	   <div class="col-md-4  text-center">
                	          <h4 class="fw-bold employe-text"><?php echo lang('add_employee') ?></h4>
                	 	      <div class="employe-line my-0"></div>
                	       </div>
                		   <div class="col-md-4 "></div>
                		   <div class="col-md-4 "></div>
                	    </div>
                	  </div>
                	  <div class="col-lg-6"></div>
                	</div>
                  </div>
                </section>
				<br>
				<div class="container">
                    <form action="" id="add_user" method="post" style="background-color: #F1FBFF;" class="rounded-2 employe-form">
                        <div class="row" style="margin-top:15px;">
                            <div class="col ">
							    <label class="form-label fs-6"><?= lang('name') ?></label>
                                <input type="text" name="name" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_employee_name') ?>">
                            </div>
						</div>
                        <div class="row" style="margin-top:15px;">
                            <div class="col ">
							    <label class="form-label fs-6"><?= lang('email') ?></label>
                                <input type="text" name="email" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_email') ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:15px;">
							<div class="col">
									<label class="form-label fs-6"><?= lang('mobile') ?></label>
									<input type="text" name="phone" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_mobile_no') ?>">
									<p style="font-size: 10px; color: #838383eb;">
								<?php echo lang('please_add_mobile_number_with_country_code') . ' (' . lang('example_country_code') . ': 91 ' . lang('mobile') . ': 916524514875)'; ?>
								</p>
							</div>
						</div>
                        <div class="row" style="margin-top:15px;">
                            <div class="col ">
							    <label class="form-label fs-6"><?= lang('status') ?></label>
                                <select class="form-control name-text fw-600 fs-20 dark-blue" name="status_employee"  id="status_employee">
                                    <option value="" selected disabled><?= lang('select_option') ?></option>
                                    <option value="1"><?= lang('active') ?></option>
                                <option value="0"><?= lang('deactive') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top:50px">
                            <div class="col text-center">
			                  <input type="submit" value="<?php echo lang('save'); ?>"  style="background: #3bceeaf2;" class="btn-bg-2 border-0 rounded-2 fs-27 py-1 w-100 mt-3 btn-text">
                            </div>
                        </div>
                    </form>
                </div>
            <!-- </div>
        </div>
    </div> -->
<!-- 
<script>
    $(document).ready(function(){
        $("#add_user").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
    
            $.ajax({
                url : "<?= base_url('admin/save_provider') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                {
                    if(res.status == true)
                    {
                        window.location = res.url;
                    }
                }
            });
        });
    });
</script> -->
<script>
    $(document).ready(function(){
        $("#add_user").submit(function(e){
            e.preventDefault();
            
            // Perform validation
            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var phone = $("input[name='phone']").val();
            var status_employee = $("#status_employee").val();

            // Validation for name
            if(name.trim() == '') {
				new Noty({
                type: 'error',
                text: '<?php echo lang('please_enter_employee_name'); ?>',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // Validation for email
            if(email.trim() == '') {
				new Noty({
                type: 'error',
                text: '<?php echo lang('enter_email'); ?>',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }
            // Email format validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailPattern.test(email)) {
				new Noty({
                type: 'error',
                text: '<?php echo lang('please_enter_valid_email_address'); ?>',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // Validation for phone number
            if(phone.trim() == '') {
				new Noty({
                type: 'error',
                text: '<?php echo lang('please_add_mobile_number_with_country_code'); ?>',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // Validation for status
            if(status_employee == '' || status_employee == null) {
				new Noty({
                type: 'error',
                text: '<?php echo lang('select_status'); ?>',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // If all validations pass, proceed with AJAX submission
            var formData = new FormData(this);

            $.ajax({
                url : "<?= base_url('provider/save_employee') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                {
                    if(res.status == true)
                    {
						new Noty({
							type: 'success',
							text: res.message,
							timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
						}).show();
						setTimeout(function() {
							window.location = res.url;
						}, 3000);
                    }else{
						new Noty({
							type: 'error',
							text: res.message,
							timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
						}).show();
						return false;
					}
                }
            });
        });
    });

</script>
