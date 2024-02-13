
<div class="main-section">

<div class="v-detail-container">
	
	<div class="heading">
		<button class="m-voucher" onclick="goBack()">
			<img src="<?= base_url() ?>assets/images/arrow-blue.png" alt="">
			<div class="m-te"><?= lang('offer_detail') ?></div>
		</button>
	</div>

	<div class="main-ov">
		<div class="id-sec">
			<img src="<?= base_url() ?>assets/images/od-img.png" alt="">
		</div>
		<div class="i-text">
			<div class="fi-text">
				<h3><?= $offer['name']; ?></h3>
				<span><?= get_price($voucher['price']);  ?></span>
			</div>
			<p>
				<?php 
				$maxCharacters = 100;
				$truncatedText = strlen($offer['details']) > $maxCharacters ? substr(get_translation($offer['details']), 0, $maxCharacters) . '...' : get_translation($offer['details']);
				echo $truncatedText;  
				 ?>   
			</p>
		</div>

		<div class="ov-name">
			<h2>
			<?php $condition = array('conditions' => ['id' => $voucher['offer_id']]); ?>
		<?php $data = $this->QueryModel->selectSingleRow('offer',$condition); ?>
		<?php if(!empty($data['special_offer'])){ ?>
		   <?php  echo  get_special_offer($data['special_offer']); ?>
		   <?php } ?>
			</h2>
		</div>

		<div class="cn-detail">
			<div class="head-con">
				<h3><?= lang('contact_support') ?></h3>
			</div>
			<div class="det-con">
				<div class="mail">
					<img src="<?= base_url() ?>assets/images/email-icon.png" alt="">
					<div class="mail-te"><?= $user['username']; ?></div>
				</div>
				<div class="call">
					<img src="<?= base_url() ?>assets/images/call-icon.png" alt="">
					<div class="call-te"><?= $user['phone']; ?></div>
				</div>
				<div class="loc">
					<img src="<?= base_url() ?>assets/images/location-icon.png" alt="">
					<div class="loc-te">305, MAB Chatrabash, Pabla, Khulna.</div>
				</div>
			</div>
		</div>


		<div class="d-t-sec">
			<div class="p-date">
				<h4><?= lang('purchase_date') ?>:</h4>
				<span><?= $voucher['purchase_date']; ?></span>
			</div>

			<div class="e-date">
				<h4><?= lang('expiration_date') ?>:</h4>
				<span><?= $voucher['expire_date']; ?></span>
			</div>
		</div>

		<div class="re-scan">
			<h2><?= lang('reedem_your_voucher') ?></h2>
			<img src="<?= base_url() ?>assets/images/scanner-image.png" alt="">
		</div>

		<div class="btn-trf">
			<button class="t-c-btn"><?= lang('term_and_condition') ?></button>

			<button class="refund-btn"><?= lang('contact_and_support') ?></button>
		</div>
	</div>
	

</div>


</div>
<style>
.i-text p {
font-size: calc(8*var(--aspect-ratio));

	.i-text {
height: calc(80*var(--aspect-ratio));  
}
}
</style>
<script>
	function goBack() {
window.history.back();
}
</script>
