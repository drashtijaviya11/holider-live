
<style>
    .temp {
        /* border: 1px solid #010101 !important;
        border-radius: 0px !important; */
    }
    .whatsapp {
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
                	          <h4 class="fw-bold employe-text">Add Employee</h4>
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
                                <input type="text" name="name" class="form-control temp" placeholder="<?= lang('enter_your_name') ?>">
                            </div>
                            <div class="col-md-6 my-1">
                                <input type="text" name="email" class="form-control temp" placeholder="<?= lang('enter_email') ?>">
                            </div>
                        </div>
                        <!-- <div class="row mt-2">
                            <div class="col-6 mt-1">
                                <label for=""><?= lang('password') ?></label>
                                <input type="password" name="password" class="form-control temp" placeholder="<?= lang('password') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('confirm password') ?></label>
                                <input type="password" name="password_confirmation" class="form-control temp" placeholder="<?= lang('confirm password') ?>">
                            </div>
                        </div> -->
                        <div class="row mt-2 my-4">
                            <div class="col-md-6 my-1">
                                <input type="text" name="state" class="form-control temp" placeholder="<?= lang('enter_state_name') ?>">
                            </div>
                            <div class="col-md-6 my-1">
                                <input type="text" name="country" class="form-control temp" placeholder="<?= lang('enter_country_name') ?>">
                            </div>
                        </div>
                        <div class="row mt-2 my-4">
                            <div class="col-md-6 my-1">
                                <select class="form-control temp" name="user_type" id="category">
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="provider">Active</option>
                                    <option value="influencer">Not Active</option>
                                </select>
                            </div>
                            <div class="col-md-6 my-1">
                                <input type="text" name="phone" class="form-control temp" placeholder="<?= lang('enter_mobile_no') ?>">
                            </div>
                        </div>
                        <div class="row mt-2 my-4">
                            <div class="col-md-6 my-1 mt-1">
                                <select class="form-control temp" name="user_type" id="category">
                                    <option value="" selected disabled><?= lang('select_option') ?></option>
                                    <option value="provider"><?= lang('provider') ?></option>
                                    <option value="influencer"><?= lang('influencer') ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 my-1">
                                <input type="text" name="address" class="form-control temp" placeholder="<?= lang('enter_address') ?>">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <input type="submit" class="btn-bg-2 border-0 rounded-2 fs-27 py-1 w-100 mt-3 btn-text">
                            </div>
							<div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            <!-- </div>
        </div>
    </div> -->

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
</script>