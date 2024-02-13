<section id="faq-bg">
  <div class="container">
    <!-- ::Begin Heading section -->
    <div class="row contact-text">
      <div class="col-md-12 text-center">
        <span class="f-Playfair fw-bold fs-90 text-white pay-text"><?php echo lang('faq')?></span>
		<div class="row px-5 align-items-center py-5">
		  <div class="col-md-4">
		    <div class="grad3"></div>
		  </div>
		  <div class="col-md-4">
		    <span class="f-Poppins fw-500 text-white fs-15 grad-text"> <?php echo lang('this_is_a_great_site_for')?> </span>
		  </div>
		  <div class="col-md-4">
		    <div class="grad4"></div>
		  </div>
		</div>
      </div>
    </div>
	<!-- ::End Heading section -->
  </div>
</section>
<section>
  <div class="container px-4">
    <div class="row py-4 align-items-center">
	  <div class="col-md-6 my-1">
	    <img src="<?php echo base_url(); ?>desktop_assets/images/help_center_img.png" class="w-100 max-h-475">
	  </div>
	  <div class="col-md-6 my-1">
	    <h2 class="f-livvic fw-600 text-sky fs-40 help-text"><?php echo lang('help_center')?></h2>
	    <h2 class="f-livvic fw-600 dar-blue py-3 fs-40 help-text"><?php echo lang('how_can_we_help_you')?></h2>
		<p class="f-nunito fw-600 help-paragraph"><?php echo lang('this_is_a_great_site')?></p>
	  </div>
	</div>
  </div>
</section>
<section>
  <div class="container-fluid px-4">
    <div class="row" >
		<?php $i =1 ; foreach($faqs as $faq) {  ?>
	  <div class="col-md-6 my-2">
	    <div class="accordion accordion-flush accor-box" id="accordionFlushExample">
          <div class="accordion-item accor-border">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button accor-btn-sec collapsed f-livvic py-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?= $faq['id']; ?>" aria-expanded="false" aria-controls="flush-<?= $faq['id']; ?>">
                <div class="row" style="display: contents;">
				  <div class="col-md-1 col-1">
				    <span class="fs-24 fw-600 accor-text"><?= $i++.":"; ?></span>
				  </div>
				  <div class="col-md-11 col-11 accor-media">
				    <h2 class="fs-24 fw-600 accor-text ps-0"><?= get_trans_faq($faq['question'],'question') ; ?></h2>
				  </div>
				</div>
              </button>
            </h2>
            <div id="flush-<?= $faq['id']; ?>" class="accordion-collapse collapse accor-collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body bg-white py-0">
                <ul class="">
                  <li class="f-nunito fw-600" style="list-style:none;"><?= get_trans_faq($faq['answer'],'answer') ; ?></li>
                </ul>
              </div>
            </div>
          </div>
	  </div>
	</div>
	<?php } ?>
	<br><br>
  </div>
</section>
