
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
#add_user{margin: 25px;}
@media (max-width: 767px) {
        .temp,label {
            font-size: 10px;
        }
    }
</style>

<div class="v-detail-container">
    <div class="main-ov">
           <form action="<?php echo base_url('provider/employee'); ?>" id="add_user" method="post">
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for=""><?= lang('name') ?></label>
                            <input type="text" name="name" class="form-control temp" placeholder="<?= lang('enter_employee_name') ?>">
                        </div>
                        <div class="col-6">
                            <label for=""><?= lang('email') ?></label>
                            <input type="text" name="email" class="form-control temp" placeholder="<?= lang('enter_email') ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for=""><?= lang('mobile') ?></label>
                            <input type="text" name="phone" class="form-control temp" placeholder="<?= lang('enter_mobile_no') ?>">
                            <p style="font-size: 10px; color: #838383eb;">
                             <?php echo lang('please_add_mobile_number_with_country_code') . ' (' . lang('example_country_code') . ': 91 ' . lang('mobile') . ': 916524514875)'; ?>
                             </p>
                        </div>
                        <div class="col-6 mt-1">
                            <label for="status"><?php echo lang('status') ?></label>
                            <select class="form-control temp" name="status_employee" id="status_employee">
                                <option value="" selected disabled><?= lang('select_option') ?></option>
                                <option value="1"><?= lang('active') ?></option>
                                <option value="0"><?= lang('deactive') ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-12 text-center" style="margin-top:10px;">
                            <input type="submit" class="btn btn-primary" value="<?= lang("save") ?>">
                        </div>
                    </div>
                </form>
        </div>
</div>

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
