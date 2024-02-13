<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12 text-center whatsapp">Add Employee</div>
        <hr>
    </div>
    <form action="" id="add_employee"  method="post" >
        <div class="row mt-2">
            <div class="col-6">
                <label for=""><?= lang('name') ?></label>
                <input type="text" name="name" class="form-control temp" placeholder="<?= lang('enter_your_name') ?>">
            </div>
            <div class="col-6">
                <label for=""><?= lang('email') ?></label>
                <input type="text" name="email" class="form-control temp" placeholder="<?= lang('enter_email') ?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <label for=""><?= lang('country'); ?></label><i class="bi bi-star-fill"></i>
                <select name="country" id="country" class="form-select temp rqure">
                <option  value=""  selected disabled> Select Country</option>
                    <?php  foreach($country as $country) { ?>
                        <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                    <?php } ?>
                </select>
                <!-- <input type="text" name="country" class="form-control temp rqure" placeholder="<?= lang('enter_country_name') ?>"> -->
            </div>
            <div class="col-6">
                <label for=""><?= lang('state'); ?></label><i class="bi bi-star-fill"></i>
                <select name="state" id="state" class="form-select temp rqure">
                <option  value="" selected disabled> Select State</option>
                    <?php  foreach($state as $state) { ?>
                        <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                    <?php } ?>
                </select>
                <!-- <input type="text" name="state" class="form-control temp rqure" placeholder="<?= lang('enter_state_name') ?>"> -->
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <label for="">Status</label>
                <select class="form-control temp" name="status" id="category">
                    <option value="" selected disabled>Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>
            <div class="col-6">
                <label for=""><?= lang('mobile') ?></label>
                <input type="text" name="phone" class="form-control temp" placeholder="<?= lang('enter_mobile_no') ?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <label for=""><?= lang('address') ?></label>
                <input type="text" name="address" class="form-control temp" placeholder="<?= lang('enter_address') ?>">
            </div>
            <div class="col-6 ">
                <label for=""><?= lang('provider') ?></label>
                <input type="hidden" name="provider_id" class="form-control temp" value="<?= $provider['id']; ?>" >
                <input type="text" class="form-control temp" value="<?= $provider['name']; ?>" readonly>
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
        $("#add_employee").submit(function(e){
            e.preventDefault();
            var formValid = true;
            $(this).find('.rqure, select').each(function () {
                // Check if the element is a select or text input
                if ($(this).is('select')) {
                    // For select elements, check if a value is selected
                    if ($(this).val() === null || $(this).val() === "") {
                        formValid = false;
                        return false; // exit the loop
                    }
                } else if ($(this).is('.rqure')) {
                    // For text inputs, check if the value is empty
                    if ($(this).val().trim() === "") {
                        formValid = false;
                        return false; // exit the loop
                    }
                }
            });

                if (!formValid) {
                    new Noty({
                        text: 'Please fill in all fields.',
                        type: 'error',
                        timeout: 5000
                    }).show();
                    return; 
                    console.log("fill all fields");
                }
            /**********Loader**************/
            // Swal.fire({
            //         title: 'Loading...',
            //         showConfirmButton: false,
            //         allowOutsideClick: false,
            //         willOpen: () => {
            //             Swal.showLoading();
            //         }
            //     });                                       
            /**********Loader**************/ 
            var formData = new FormData(this);
            var phoneNumber = formData.get('phone');
            $.ajax({
                url : "<?= base_url('admin/save_employee') ?>",
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
                        console.log(res.thml);
                        $('#employeeModal').css('display','none');
                        $(".tbodyEmp").append('<tr id='+res.id+'>'+res.html+'</tr>');
                        // $(".sidebar-nav .provider").trigger("click");
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