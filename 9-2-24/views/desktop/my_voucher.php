<style>
	.voucher_class{
		display:none;
	}
	.used_voucher,.unused_voucher{
		height: 500px;
    	overflow-y: scroll;
	}
	/* Custom scrollbar styles */
	::-webkit-scrollbar {
			width: 5px;
	}

	::-webkit-scrollbar-track {
			background: transparent;
	}

	::-webkit-scrollbar-thumb {
			background-color: black;
			border-radius: 20px;
			border: 3px solid #ced4da;
	}
	.voucher_active_class.active {
		color: #fff;
		background: #47bcd4;
	}
	</style>
	<style>
.f-Moderno{
	margin-right: 10px;
}
.carousel-control-prev-icon-2 {
    background-image: url('<?= base_url('desktop_assets/images/arrow_left_icon.png') ?>') !important;
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100% 100%;
}

.carousel-control-next-icon-2 {
    background-image: url('<?= base_url('desktop_assets/images/arrow_right_icon.png') ?>') !important;
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100% 100%;
}
.no_voucher_found{
	padding: 15px;
    color: red;
    font-weight: 700;
    text-align: center;
	}
	</style>
<section id="voucher-bg">
  	<div class="container">
		<div class="row voucher-text">
			<div class="col-md-12 text-center">
				<span class="f-Playfair fw-600 fs-90 text-white pay-text"><?php echo lang('my_vouchers')?></span>
			</div>
			</div>
			<br><br>
			<div class="row pt-5">
				<div class="col-md-12">
					<div class="border bg-white shadow-sm rounded-2 p-5">
						<button class="f-poppins fw-bold future-btn border-0 rounded-1 px-5 py-2 fs-27 my-1 voucher_active_class_future voucher_active_class active" onclick="future_voucher()"><?php echo lang('future_voucher')?></button>
						&nbsp;&nbsp;
						<button class="f-poppins fw-bold used-btn border-0 rounded-1 px-5 py-2 fs-27 my-2 voucher_active_class_used voucher_active_class" onclick="used_voucher()"><?php echo lang('used_voucher')?></button>
						<hr class="line-four">
						<br>
						<div class="row used_voucher voucher_class">
							<?php if(!empty($used_vouchers)){ 
							foreach($used_vouchers as $usVoucher){ ?>
								<div class="col-lg-4 py-1" <?= $usVoucher['id'] ?> onclick="voucher_detail('<?= $usVoucher['id'] ?>')">
									<div class="card">
									<div id="carouselExampleControls_<?= $usVoucher['id'] ?>" class="carousel slide">
										<div class="carousel-inner">
											<?php $imageArray = json_decode($usVoucher['image'], true); ?>
											<?php foreach ($imageArray as $index => $imageFile): ?>
												<?php
												$file_extension = pathinfo($imageFile['url'], PATHINFO_EXTENSION);
												$is_video = strtolower($file_extension) === 'mp4';
												?>
												<div class="carousel-item <?= $index === 0 ? 'active' : '' ?> text-center text-white">
													<?php if ($is_video): ?>
														<video controls id="video<?= $index ?>" style="min-height: 258px;height: 258px;object-fit: cover;">
															<source src="<?= base_url().$imageFile['url'] ?>" type="video/mp4" >
															Your browser does not support the video tag.
														</video>
													<?php else: ?>
														<img src="<?= base_url().$imageFile['url'] ?>" class="card-img-top p-2" alt="..." style="min-height: 258px;height: 258px;object-fit: cover;">
													<?php endif; ?>
												</div>
											<?php endforeach; ?>
										</div>
										<?php 
										$countImg = count($imageArray); 
										if($countImg > 1){ ?>
										<button class="carousel-control-prev ms-2" type="button" data-bs-target="#carouselExampleControls_<?= $usVoucher['id'] ?>" data-bs-slide="prev">
											<span class="carousel-control-prev-icon-2" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next me-2" type="button" data-bs-target="#carouselExampleControls_<?= $usVoucher['id'] ?>" data-bs-slide="next">
											<span class="carousel-control-next-icon-2" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
										<?php } ?>
									</div>
									<!-- <?php  $image = json_decode($usVoucher['image'], true); ?>
										<img src="<?= base_url().$image[0]['url'] ?>" class="card-img-top p-2" alt="..." style="min-height: 258px;height: 258px;object-fit: cover;"> -->
										<div class="card-body">
										<div class="row media-3-3">
												<div class="col-md-12 col-media-2"><?php 
													$new_translated_string = get_translation($usVoucher['offer_name']);
													if(strlen($usVoucher['offer_name']) > 20) {
														$cUname = mb_substr(get_translation($usVoucher['offer_name']), 0, 30,'UTF-8');
													} else {
														$cUname = get_translation($usVoucher['offer_name']);
													}
												
												?>
													<h5 class="card-title f-poppins fw-bold mb-0 fs-27 free-text" style="color:#005B70;min-height:97px"><?= $cUname; ?></h5></div></div>
											<div class="row media-3-3">
												<div class="col-md-6 col-media-2">
												<br>
													<span class="f-poppins " style="color:#007088;"><?= date("d.m.Y",strtotime($usVoucher['purchase_date'] )); ?></span> </br>
													<span><?= lang(strtolower($usVoucher['person_type'])); ?></span>
												</div>
												<div class="col-md-6 pe-0 align-end media-3 col-media-2">
													<!-- <del class="pe-2">$23.70</del> -->
													<span class="f-Moderno fs-21 fw-bold price"><?= get_currency($usVoucher['price'],$usVoucher['currency_type']); ?></span>
													<div class="time pt-2 fw-600 fs-6">
														<a href="javascript:void(0)" class="btn hero-btn fw-bold text-white rounded-pill px-4 py-1 fs-5"><?php echo lang('used')?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php }}else{ ?>
									<div class="no_voucher_found" >
										<span class=""><?= lang('no_voucher_found'); ?></span>
									</div>
							<?php } ?>
						</div>
						<div class="row unused_voucher voucher_class">
						<?php if(!empty($unused_vouchers)){ 
                        foreach($unused_vouchers as $unVoucher){ ?>
								<div class="col-lg-4 py-1" <?= $unVoucher['id'] ?>   onclick="voucher_detail('<?= $unVoucher['id'] ?>')">
									<div class="card">
										<div id="carouselExampleControls_<?= $unVoucher['id'] ?>" class="carousel slide">
											<div class="carousel-inner">
												<?php $imageArray = json_decode($unVoucher['image'], true); ?>
												<?php foreach ($imageArray as $index => $imageFile): ?>
													<?php
													$file_extension = pathinfo($imageFile['url'], PATHINFO_EXTENSION);
													$is_video = strtolower($file_extension) === 'mp4';
													?>
													<div class="carousel-item <?= $index === 0 ? 'active' : '' ?> text-center text-white">
														<?php if ($is_video): ?>
															<video controls id="video<?= $index ?>">
																<source src="<?= base_url().$imageFile['url'] ?>" type="video/mp4">
																Your browser does not support the video tag.
															</video>
														<?php else: ?>
															<img src="<?= base_url().$imageFile['url'] ?>" class="card-img-top p-2" alt="..." style="min-height: 258px;height: 258px;object-fit: cover;">
														<?php endif; ?>
													</div>
												<?php endforeach; ?>
											</div>
											<?php 
												$countImg = count($imageArray); 
												if($countImg > 1){ ?>
													<button class="carousel-control-prev ms-2" type="button" data-bs-target="#carouselExampleControls_<?= $unVoucher['id'] ?>" data-bs-slide="prev">
														<span class="carousel-control-prev-icon-2" aria-hidden="true"></span>
														<span class="visually-hidden">Previous</span>
													</button>
													<button class="carousel-control-next me-2" type="button" data-bs-target="#carouselExampleControls_<?= $unVoucher['id'] ?>" data-bs-slide="next">
														<span class="carousel-control-next-icon-2" aria-hidden="true"></span>
														<span class="visually-hidden">Next</span>
													</button>
											<?php } ?>
										</div>
									<!-- <?php  $image = json_decode($unVoucher['image'], true); ?>
										<img src="<?= base_url().$image[0]['url'] ?>" class="card-img-top p-2" alt="..." style="min-height: 258px;height: 258px;object-fit: cover;"> -->
										<div class="card-body">
										<div class="row media-3-3">
												<div class="col-md-12 col-media-2">
												<?php 
													$new_translated_string = get_translation($unVoucher['offer_name']);
													if(strlen($unVoucher['offer_name']) > 20) {
														$cUname = extractFirst60Characters(get_translation($unVoucher['offer_name']));
													} else {
														$cUname = get_translation($unVoucher['offer_name']);
													}
												?>
													<h5 class="card-title f-poppins fw-bold mb-0 fs-27 free-text" style="color:#005B70;min-height:97px"><?= $cUname; ?></h5>
												</div></div>
											<div class="row media-3-3">
												<div class="col-md-6 col-media-2">
												<br>
													<span class="f-poppins " style="color:#007088;"><?= date("d.m.Y",strtotime($unVoucher['purchase_date'] )); ?></span></br>
													<span><?= lang(strtolower($unVoucher['person_type'])) ?></span>
												</div>
												<div class="col-md-6 pe-0 align-end media-3 col-media-2">
													<!-- <del class="pe-2">$23.70</del> -->
													<span class="f-Moderno fs-21 fw-bold price"><?= get_currency($unVoucher['price'],$unVoucher['currency_type']); ?></span>
													<div class="time pt-2 fw-600 fs-6">
														<a href="javascript:void(0)" class="btn hero-btn fw-bold text-white rounded-pill px-4 py-1 fs-5"><?php echo lang('redeem')?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php }}else{ ?>
									<div class="no_voucher_found" >
										<span class=""><?= lang('no_voucher_found'); ?></span>
									</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
  	</div>
</section>

<script>
    $(document).ready(function(){
        $('.unused_voucher').css({ display: 'flex', });
		$('.used_voucher').css({ display: 'none', });

	});
	function future_voucher(){
		$(".voucher_active_class").removeClass("active");
		$(this).addClass("active");
		$(".voucher_active_class_future").addClass("active");
		$('.unused_voucher').css({ display: 'flex', });
		$('.used_voucher').css({ display: 'none', });
	}
	function used_voucher(){
		$(".voucher_active_class").removeClass("active");
		$(this).addClass("active");
		$(".voucher_active_class_used").addClass("active");
		$('.used_voucher').css({ display: 'flex', });
		$('.unused_voucher').css({ display: 'none', });
	}
	function voucher_detail(id) {
    // $('#loader-container').css({ display: 'block' });
    $('body').css({ background: 'f0f0f45c' });
    $.ajax({
        url: "<?= base_url('dashboard/voucher_detail_ajax') ?>",
        data: { id: id },
        type: "POST",
        dataType: "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success: function (res) {
			// $('#body-preloader').css('display', 'none');
            if (res.status == true) {
                    window.location = res.url;
            }
        },
    });
}
</script>
<script>
	var unUsedOffset = 10;
	var isUnUsedLoading = false;
	    function loadMoreVoucher() {
		if (isUnUsedLoading) {
				return;
			}
		isUnUsedLoading = true;
			$.ajax({
				url: '<?= base_url('dashboard/get_unused_voucher_items') ?>',
				data : {unUsedOffset:unUsedOffset},
				type: 'POST',
				dataType: 'json',
				// beforeSend: function() {
				// 	$('#body-preloader').css('display', 'block');
				// },
				success: function(data) {
					// $('#body-preloader').css('display', 'none');
					if(data.voucher.length > 0)
					{
						$(".unused_voucher").append(data.html);
						unUsedOffset += data.voucher.length;
						isUnUsedLoading = false;
					}
				}
			});
		}
		$(".unused_voucher").scroll(function() {
			if ($(this).scrollTop() + $(this).height() >= $(this)[0].scrollHeight - 100) {
				console.log('Scroll to bottom');
				loadMoreVoucher();
			}
		});


</script>

<script>
	var usedOffset = 10;
	var isUsedLoading = false;
	    function loadMoreUsedVoucher() {
		if (isUsedLoading) {
				return;
			}
		isUsedLoading = true;
			$.ajax({
				url: '<?= base_url('dashboard/get_used_voucher_items') ?>',
				data : {usedOffset:usedOffset},
				type: 'POST',
				dataType: 'json',
				// beforeSend: function() {
				// 	$('#body-preloader').css('display', 'block');
				// },
				success: function(data) {
					// $('#body-preloader').css('display', 'none');
					if(data.voucher.length > 0)
					{
						$(".used_voucher").append(data.html);
						usedOffset += data.voucher.length;
						isUsedLoading = false;
					}
				}
			});
		}
		$(".used_voucher").scroll(function() {
			if ($(this).scrollTop() + $(this).height() >= $(this)[0].scrollHeight - 100) {
				console.log('Scroll to bottom');
				loadMoreUsedVoucher();
			}
		});


</script>
