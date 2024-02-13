<style>
.video-section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.video-image-section {
	position: relative;
    width: 60%;
    height: 100%;
    background: #b8b8b8d1;
}

.video-image-section video {
    max-width: 100%;
    max-height: 100%;
    padding: 15px;
    width: 100%;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.video-cover {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
}

.video-cover p {
    color: #fff;
    font-size: 24px;
}


</style>
<section id="about-us-bg">
  <div class="container">
    <!-- ::Begin Heading section -->
    <div class="row contact-text">
      <div class="col-md-12 text-center">
        <span class="f-Playfair fw-bold fs-90 text-white pay-text"> <?php echo lang('about_us') ?> </span>
      </div>
    </div>
	<!-- ::End Heading section -->
  </div>
</section>

<section>
  <div class="container">
    <div class="row py-5">
	  <div class="col-md-12 text-center">
	    <h2 class="f-livvic fw-600 dark-blue-3 metasur-text"><?php echo get_trans_about($about['heading'],'heading'); ?></h2>
	  </div>
	</div>
  </div>
</section>
<section id="sky-bg">
  <div class="container">
    <div class="row text-center py-5 px-5">
	  <div class="col-md-4">
	    <h2 class="f-livvic fw-600 dark-blue-3"><?php echo lang('our_mission'); ?></h2><br>
		<p class="f-livvic fw-600"><?php echo get_trans_about($about['our_mission'],'our_mission'); ?></p>
	  </div>
	  <div class="col-md-4">
	    <h2 class="f-livvic fw-600 dark-blue-3"><?php echo lang('our_vision'); ?></h2><br>
		<p class="f-livvic fw-600"><?php echo get_trans_about($about['our_vision'],'our_vision'); ?></p>
	  </div>
	  <div class="col-md-4">
	    <h2 class="f-livvic fw-600 dark-blue-3"><?php echo lang('our_history'); ?></h2><br>
		<p class="f-livvic fw-600"><?php echo get_trans_about($about['our_history'],'our_history'); ?></p>
	  </div>
	</div>
  </div>
</section>
<br><br>
		<div class="video-section">
			<div class="video-image-section">
				<!-- <img src="<?php echo base_url(); ?>assets/images/aa.jpg" alt="">
				<div class="video-bg"></div>
				<img class="play-video" src="<?php echo base_url(); ?>assets/images/aaaa.mp4" alt=""> -->
				<?php $filesArray = json_decode($about['files'], true); 
				if($filesArray !== '') { 
					foreach ($filesArray as $file) { ?>
					<video controls>
						<source src="<?php echo base_url().$file; ?>" type="video/mp4">
					</video>
				<?php } } ?>
			</div>
		</div>
		<br><br>
<section>
  <div class="container px-0">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" style="background-image: url(<?php echo base_url(); ?>desktop_assets/images/about_slider_bg_img.png);background-size: cover;background-repeat: no-repeat;">
			<div id="testimonial-carousel" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<?php foreach ($testimonial as $key => $testimonialData) : ?>
						<div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?> text-center text-white py-5">
							<h2 class="fw-bold fs-40 slider-heading"><?php echo lang('testimonials'); ?></h2>
							<div class="row">
								<div class="col-4"></div>
								<div class="col-4">
									<div class="line-ten"></div>
								</div>
								<div class="col-4"></div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-lg-8 pt-5">
									<p class="f-nunito fw-bold fs-24 slider-paragraph"><?= get_trans_testimonials($testimonialData['content']); ?></p>
									<?php $image = json_decode($testimonialData['photo']); ?>
									<img class="rounded-circle shadow-1-strong" src="<?php echo base_url() . $image[0] ?>" alt="avatar" style="width:80px;height:80px;">
									<h5 class="my-3 f-nunito fw-bold"><?= $testimonialData['name'] ?>-</h5>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?php echo lang('previous'); ?></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?php echo lang('next'); ?></span>
      </button>
    </div>
  </div>
</section>
<br><br><br><br>
