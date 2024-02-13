
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

<div class="card-container">
    <div class="card">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="test1" role="tabpanel">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp"><?= lang('add_user') ?></div>
                        <hr>
                    </div>
                    <form action="" id="add_user"  method="post" >
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
                            <div class="col-6 mt-1">
                                <label for=""><?= lang('password') ?></label>
                                <input type="password" name="password" class="form-control temp" placeholder="<?= lang('password') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('confirm password') ?></label>
                                <input type="password" name="password_confirmation" class="form-control temp" placeholder="<?= lang('confirm_password') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('state'); ?></label>
                                <input type="text" name="state" class="form-control temp" placeholder="<?= lang('enter_state_name') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('country'); ?></label>
                                <input type="text" name="country" class="form-control temp" placeholder="<?= lang('enter_country_name') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('username') ?></label>
                                <input type="text" name="username" class="form-control temp" placeholder="<?= lang('enter_username') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('mobile') ?></label>
                                <input type="text" name="phone" class="form-control temp" placeholder="<?= lang('enter_mobile_no') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6 mt-1">
                                <label for="category"><?= lang('type') ?></label>
                                <select class="form-control temp" name="user_type" id="category">
                                    <option value="" selected disabled><?= lang('select_option') ?></option>
                                    <option value="provider"><?= lang('provider') ?></option>
                                    <option value="influencer"><?= lang('influencer') ?></option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('address') ?></label>
                                <input type="text" name="address" class="form-control temp" placeholder="<?= lang('enter_address') ?>">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("#add_user").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
    
            $.ajax({
                url : "<?= base_url('admin/save_new_user') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
				// beforeSend: function() {
				// 	$('#body-preloader').css('display', 'block');
				// },
                success : function(res)
                {
					// $('#body-preloader').css('display', 'none');
                    if(res.status == true)
                    {
                        window.location = res.url;
                    }
                }
            });
        });
    });
</script>