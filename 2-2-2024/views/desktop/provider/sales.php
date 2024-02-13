<section id="sales-bg">
  <div class="container">
  <div class="row pt-5">
	  <div class="col-md-12">
        <img src="<?php echo base_url();?>desktop_assets/images/left_arrow_icon.png" class="left-arrow-img">
		<span class="f-poppins fw-600 fs-50 text-white pay-text"><?= lang('my_sales') ?></span>
      </div>
    </div>
	<div class="row pt-5">
	  <div class="col-md-12">
	    <div class="border bg-white shadow-sm rounded-2 py-5">
	      <div class="row">
		    <div class="col-md-9 px-4">
			  <div class="row">
			    <div class="col-md-6">
			      <div class="dropdown mt-3">
                    <button class="btn dropdown-toggle drop-toggle-2 text-start btn-bg-2 py-2 fs-21 f-poppins client-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <?= lang('my_client_tree') ?>
                  	<img src="<?php echo base_url();?>desktop_assets/images/white_down_arrow_icon.png" width="20px" class="float-end mt-2">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('january') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('february') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('march') ?></a></li>
		  	          <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('april') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('may') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('june') ?></a></li>
		  	          <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('july') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('august') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('saptember') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('october') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('november') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('december') ?></a></li>
                    </ul>
                  </div>
				</div>
				<div class="col-md-6">
			      <div class="dropdown mt-3">
                    <button class="btn dropdown-toggle drop-toggle-2 w-100 text-start border-blue text-sky py-2 light-blue-bg fs-21 f-poppins" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					<?= lang('november') ?>
                  	<img src="<?php echo base_url();?>desktop_assets/images/down_arrow_icon.png" width="20px" class="float-end mt-2">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('january') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('february') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('march') ?></a></li>
		  	          <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('april') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('may') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('june') ?></a></li>
		  	          <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('july') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('august') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('saptember') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('october') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('november') ?></a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);"><?= lang('december') ?></a></li>
                    </ul>
                  </div>
				</div>
			  </div>
			  <br>
			  <div class="table-responsive">
			  <table class="table table-bordered text-center rounded-2">
                <thead>
                  <tr class="f-Poppins">
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?= lang('offer_name') ?></th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?= lang('quantity') ?></th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?= lang('commissions') ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    if(!empty($sale_list)){ 
                        $totalAmount = 0;
                        foreach ($sale_list as $list){
                    ?>
                  <tr>
                    <td class="bg-white fs-20 table-text-media fw-600" style="color:#8E8E8E;"><?php echo substr(get_translation($list->name), 0, 15); ?></td>
                    <td class="bg-white fs-20 table-text-media"><?php echo get_price($list->Quantity + $list->ChildQuantity) ?></td>
                    <td class="bg-white text-sky fw-bold fs-20 table-text-media"><?php echo get_price($list->childCommission + $list->adultCommission) ?></td>
                  </tr>
                  <?php
                        }
                    }
                    ?>
                </tbody>
              </table>
			 </div>
			</div>
			<div class="col-md-3 px-4 mt-2 position-relative">
			  <span class="f-poppins fw-600 position-absolute z-1 barcode-text"><?php echo lang('nfc_reader')?></span>
			  <img src="<?php echo base_url();?>desktop_assets/images/scanner_sec.png" class="w-100 scanner-sec position-relative"><br><br>
			</div>
		  </div>
		  <br>
			<h2 class="f-Poppins fw-600 text-sky fs-40 detail-text ps-5"><?php echo lang('balance_details')?>:</h2>
			<hr class="line-six mt-4">
			<div class="row mx-1 py-2 rounded-2 border mx-4 my-5 align-items-center">
		      <div class="col-md-5 align-center py-1 condition-box-media">
		        <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?php echo lang('balance_to_be_paid')?>:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw-bold f-livvic fs-20 dark-blue-bg text-white px-4 py-1 fs-14">800.00$</span>
		      </div>
		      <div class="col-md-2 col-width-3 text-center"><div class="vr" style="height: 48px;"></div></div>
		      <div class="col-md-5 align-center py-1 condition-box-media">
		        <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?php echo lang('total_earnings')?>:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw-bold f-livvic fs-20 dark-blue-bg text-white px-4 py-1 fs-14"><?= get_price($totalAmount) ?></span>
		      </div>
		    </div>
		    <div class="row ms-1">
		      <div class="col-md-6">
		        <div class="row text-center mx-0 py-3" style="background-color:#EEFAFF;">
		  	    <div class="col-lg-6">
		  	      <p class="f-Poppins fs-20" style="color:#517a83;"><?php echo lang('contact_and_support')?></p>
		  	    </div>
		  	    <div class="col-lg-6">
		  	      <p class="f-Poppins fw-600 fs-20 text-sky text-decoration-underline">support@holider.com</p>
		  	    </div>
		  	  </div>
		      </div>
		      <div class="col-md-6">
		        <hr class="line-sev mt-2">
		      </div>
		    </div>
		    <br>
		    <div class="row ms-1">
		      <div class="col-md-6">
		        <div class="row mx-0 py-3 align-items-center" style="background-color:#EEFAFF;">
		  	      <div class="col-md-6 col-sm-6 text-start my-1">
		  	        <a href="javascript:void(0);" class="f-Poppins fs-20 text-sky link-text">https://www.google.com/search?</a>
		  	      </div>
		  	      <div class="col-md-6 col-sm-6 align-end copy-btn my-1">
		  	        <button class="btn btn-bg-2 rounded-1 px-4"><?= lang('copy'); ?><img src="<?php echo base_url();?>desktop_assets/images/copy_icon.png"></button>
		  	      </div>
		  	  </div>
		      </div>
		      <div class="col-md-6"></div>
		    </div>
		</div>
	  </div>
	</div>
	<br><br>
  </div>
</section>

