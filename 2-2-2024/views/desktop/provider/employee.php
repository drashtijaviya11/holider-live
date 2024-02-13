
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
@media (max-width: 767px) {
        .temp,label {
            font-size: 10px;
        }
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

<!-- <div class="card-container">
    <div class="card">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="test1" role="tabpanel"> -->
                <section class="pt-4">
                  <div class="container">
                    <div class="row">
                	  <div class="col-lg-6">
                	    <div class="row">
                	 	   <div class="col-md-4 my-1 text-center">
                	          <h4 class="fw-bold employe-text"><?php echo lang('add_employee') ?></h4>
                	 	      <div class="employe-line my-0"></div>
                	       </div>
                		   <div class="col-md-4 my-1"></div>
                		   <div class="col-md-4 my-1"></div>
                	    </div>
                	  </div>
                	  <div class="col-lg-6"></div>
                	</div>
                  </div>
                </section>
				<br>
				<div class="container">
                    <form action="" id="add_user" method="post" style="background-color: #F1FBFF;" class="rounded-2 employe-form">
                        <div class="row mt-2 my-4">
                            <div class="col-md-6 my-1">
							    <label class="form-label fs-6"><?= lang('name') ?></label>
                                <input type="text" name="name" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_employee_name') ?>">
                            </div>
                            <div class="col-md-6 my-1">
							    <label class="form-label fs-6"><?= lang('email') ?></label>
                                <input type="text" name="email" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_email') ?>">
                            </div>
                        </div>
                        <div class="row mt-2 my-4">
                            <!-- <div class="col-md-6 my-1">
                                <input type="text" name="state" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_state_name') ?>">
                            </div> -->
                            <!-- <div class="col-md-6 my-1">
                                <input type="text" name="country" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_country_name') ?>">
                            </div> -->
                        </div>
                        <div class="row mt-2 my-4">
                        <div class="col-md-6 my-1">
						        <label class="form-label fs-6"><?= lang('mobile') ?></label>
                                <input type="text" name="phone" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_mobile_no') ?>">
                                <p style="font-size: 10px; color: #838383eb;">
                             <?php echo lang('please_add_mobile_number_with_country_code') . ' (' . lang('example_country_code') . ': 91 ' . lang('mobile') . ': 916524514875)'; ?>
                             </p>
                                   </div>
                            <div class="col-md-6 my-1">
							    <label class="form-label fs-6"><?= lang('status') ?></label>
                                <select class="form-control name-text fw-600 fs-20 dark-blue" name="status_employee"  id="status_employee">
                                    <option value="" selected disabled><?= lang('select_option') ?></option>
                                    <option value="1"><?= lang('active') ?></option>
                                <option value="0"><?= lang('deactive') ?></option>
                                </select>
                            </div>
                           
                        </div>
                        <div class="row mt-2 my-4">
                            <!-- <div class="col-md-6 my-1 mt-1">
                                <select class="form-control name-text fw-600 fs-20 dark-blue" name="user_type" id="category">
                                    <option value="" selected disabled><?= lang('select_option') ?></option>
                                    <option value="provider"><?= lang('provider') ?></option>
                                    <option value="influencer"><?= lang('influencer') ?></option>
                                </select>
                            </div> -->
                            <!-- <div class="col-md-6 my-1">
                                <input type="text" name="address" class="form-control name-text fw-600 fs-20 dark-blue" placeholder="<?= lang('enter_address') ?>">
                            </div> -->
                        </div>
                        <div class="row mt-5">
						    <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
			                  <input type="submit" value="<?php echo lang('save'); ?>" class="btn-bg-2 border-0 rounded-2 fs-27 py-1 w-100 mt-3 btn-text">
                            </div>
							<div class="col-md-4"></div>
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
                text: 'Please enter employee name',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // Validation for email
            if(email.trim() == '') {
				new Noty({
                type: 'error',
                text: 'Please enter email',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }
            // Email format validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailPattern.test(email)) {
				new Noty({
                type: 'error',
                text: 'Please enter a valid email address',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // Validation for phone number
            if(phone.trim() == '') {
				new Noty({
                type: 'error',
                text: 'Please enter phone number',
                timeout: 3000 // Duration for which the notification will be displayed (in milliseconds)
            }).show();
                return false;
            }

            // Validation for status
            if(status_employee == '' || status_employee == null) {
				new Noty({
                type: 'error',
                text: 'Please select status',
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