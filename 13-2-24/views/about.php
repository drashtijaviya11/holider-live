<style>
.test-detail {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

.testimonial-detail P {
    width: 80%;
    height: calc(40*var(--aspect-ratio));
    color: #fff;
    text-align: center;
    font-family: "Nunito Sans" ,sans-serif;
    font-size: calc(6*var(--aspect-ratio));
    font-weight: 600;
    margin: 0;
    overflow: auto;
}
.position-absolute{
    position:absolute !important;
}
.testimonial-detail {
    min-width: 250px !important;
}
.video-section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
}

.video-image-section {
	position: relative;
    width: 100%;
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
    	<?php if($this->input->cookie('lang',true)  == 'hebrew'){ ?>
    <style>
        .next-btn img{
        transform:unset
    }
    .previous-btn img{
        transform:unset
	}


</style>
    <?php } ?>

        <div class="about-container">

            <div class="about-sec position-relative">

                <div class="about-main-img">
                    <img src="<?php echo base_url(); ?>assets/images/Indonesia.jpg" alt="">
                </div>
                <div class="bg-about position-absolute"></div>
                <div class="about-text position-absolute">
                    <button class="head-about" style="width:100%"><?php echo lang('about_us'); ?></button>
                </div>

            </div>
<br><br>
            <div class="all-about">
                <div class="ab-detail-section">
                    <p><?php echo get_trans_about($about['heading'],'heading'); ?>
                    </p>
                </div>

                <div class="mi-vi">

                    <div class="mission-section">
                        <h3 class="mi-heading"><?php echo lang('our_mission'); ?></h3>
                        <p class="mi-det">
                            <?php echo get_trans_about($about['our_mission'],'our_mission'); ?>
                        </p>
                    </div>

                    <div class="vision-section">
                        <h3 class="vi-heading"><?php echo lang('our_vision'); ?></h3>
                        <p class="vi-det">
                        <?php echo get_trans_about($about['our_vision'],'our_vision'); ?>
                        </p>
                    </div>

                    <div class="history-section">
                        <h3 class="hi-heading"><?php echo lang('our_history'); ?></h3>
                        <p class="hi-det">
                        <?php echo get_trans_about($about['our_history'],'our_history'); ?>
                        </p>
                    </div>
                </div>
<br><br>
				<div class="video-section">
					<div class="video-image-section">
						<!-- <img src="<?php echo base_url(); ?>assets/images/aa.jpg" alt="">
						<div class="video-bg"></div>
						<img class="play-video" src="<?php echo base_url(); ?>assets/images/aaaa.mp4" alt=""> -->
						<?php $filesArray = json_decode($about['files'], true); 
						if($filesArray !== '') { 
							foreach ($filesArray as $file) { ?>
							<div class="video-cover">
								<!-- <p>Click to Play</p> -->
							</div>
							<video controls>
								<source src="<?php echo base_url().$file; ?>" type="video/mp4">
							</video>
						<?php } } ?>
					</div>
				</div>
                <div class="testimonial-section">
                    <div class="test-section">
                        <div class="test-img">
                            <img src="<?php echo base_url(); ?>assets/images/test-bgg.jpg" alt="">
                        </div>
                        <div class="test-bg"></div>

                        <div class="test-head">
                            <h2><?php echo lang('testimonials'); ?></h2>
                            <div class="test-rec"></div>
                        </div>

						<div class="main-test">
							<button class="previous-btn" onclick="showTestimonial('previous')">
								<img src="<?php echo base_url(); ?>assets/images/arrow-white.png" alt="Previous">
							</button>
							
							<?php $firstTestimonial = reset($testimonial); ?>
							
							<?php foreach ($testimonial as $testimonialData) : ?>
								<div class="testimonial-detail" <?php if ($testimonialData === $firstTestimonial) echo 'style="display: block;"'; else echo 'style="display: none;"'; ?>>
									<div class="test-detail">
										<p><?= get_trans_termcondition($testimonialData['content']); ?></p>
										<?php $image = json_decode($testimonialData['photo']);?>
										<img src="<?php echo base_url() . $image[0] ?>" alt="" style="border-radius: 50%;">
										<div class="test-name"><?= $testimonialData['name'] ?>-</div>
									</div>
								</div>
							<?php endforeach; ?>
							
							<button class="next-btn" onclick="showTestimonial('next')">
								<img src="<?php echo base_url(); ?>assets/images/arrow-white.png" alt="Next">
							</button>
						</div>
                    </div>
                </div>
            </div>

        </div>

		<script>
			var currentTestimonialIndex = 0;
			var testimonials = document.querySelectorAll('.testimonial-detail');

			function showTestimonial(action) {
				testimonials[currentTestimonialIndex].style.display = 'none';

				if (action === 'next') {
					currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
				} else if (action === 'previous') {
					currentTestimonialIndex = (currentTestimonialIndex - 1 + testimonials.length) % testimonials.length;
				}
				testimonials[currentTestimonialIndex].style.display = 'block';
			}
		</script>
   