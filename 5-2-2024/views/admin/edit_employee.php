<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
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
                        <div class="col-12 text-center whatsapp">Edit Employee</div>
                        <hr>
                    </div>
                    <form action="" id="edit_employee"  method="post" >
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('name') ?></label><i class="bi bi-star-fill"></i>
                                <input type="hidden" name="id"  value="<?= $employee['id']; ?>" >
                                <input type="text" name="name" class="form-control temp rqure" value="<?= $employee['name']; ?>" >
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('email') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="email" class="form-control temp rqure" value="<?= $employee['email']; ?>" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('country'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="country" id="country" class="form-select temp rqure">
                                    <?php  foreach($country as $countries) {
                                      $selected = ($countries['id'] == $employee['country']) ? 'selected' : ''; ?>
                                        <option value="<?= $countries['id'] ?>" <?= $selected ?> ><?= $countries['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="country" class="form-control temp rqure" placeholder="<?= lang('enter country name') ?>"> -->
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('state'); ?></label><i class="bi bi-star-fill"></i>
                                <select name="state" id="state" class="form-select temp rqure">
                                    <?php  foreach($state as $state) { 
                                      $selected = ($state['id'] == $employee['state']) ? 'selected' : ''; ?>
                                        <option value="<?= $state['id'] ?>" <?= $selected ?> ><?= $state['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" name="state" class="form-control temp rqure" placeholder="<?= lang('enter state name') ?>"> -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">Status</label><i class="bi bi-star-fill"></i>
                                <select class="form-select temp" name="status" id="category">
                                    <?php if($employee['status']  == 1){ ?>
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
                                <input type="text" name="phone" class="form-control temp rqure" value="<?= $employee['phone']; ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('address') ?></label>
                                <input type="text" name="address" class="form-control temp" value="<?= $employee['address']; ?>" >
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        $("#edit_employee").submit(function(e){
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
            Swal.fire({
                title: 'Loading...',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
            var formData = new FormData(this);
            $.ajax({
                url : "<?= base_url('admin/edit_employee') ?>",
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
                        Swal.close(); 
                        $('#employeeModal').css('display','none');
                        $(".tbodyEmp #"+res.id+"").html(res.html);
                        // console.log(res.html);
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