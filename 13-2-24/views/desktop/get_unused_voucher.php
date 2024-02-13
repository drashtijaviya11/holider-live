<style>
.f-Moderno{
	margin-right: 10px;
}
	</style>
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
					<div class="card-body">
					<div class="row media-3-3">
							<div class="col-md-6 col-media-2"></div><?php 
								$new_translated_string = get_translation($unVoucher['offer_name']);
								if(strlen($unVoucher['offer_name']) > 20) {
									$cUname = extractFirst60Characters(get_translation($unVoucher['offer_name']));
								} else {
									$cUname = get_translation($unVoucher['offer_name']);
								}
							?>
								<h5 class="card-title f-poppins fw-bold mb-0 fs-27 free-text" style="color:#005B70;min-height:97px"><?= $cUname; ?></h5></div>
						<div class="row media-3-3">
							<div class="col-md-6 col-media-2">
							<br>
								<span class="f-poppins " style="color:#007088;"><?= date("d.m.Y",strtotime($unVoucher['purchase_date'] )); ?></span></br>
								<span><?= lang(strtolower($unVoucher['person_type'])); ?></span>
							</div>
							<div class="col-md-6 pe-0 align-end media-3 col-media-2">
								<!-- <del class="pe-2">$23.70</del> -->
								<span class="f-Moderno fs-21 fw-bold price"><?= get_price($unVoucher['price']); ?></span>
								<div class="time pt-2 fw-600 fs-6">
									<a href="javascript:void(0)" class="btn hero-btn fw-bold text-white rounded-pill px-4 py-1 fs-5"><?php echo lang('redeem')?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }} ?>

