
	<?php if(!empty($used_vouchers)){ 
		foreach($used_vouchers as $usVoucher){ ?>
	<div class="f-v"  onclick="voucher_detail('<?= $usVoucher['id'] ?>')">
		<div class="i-data">
			<?php  $image = json_decode($usVoucher['image'], true); ?>
			<img src="<?= base_url().$image[0]['url'] ?>" alt="">
			<div class="fv-de">
					<?php 
					$new_translated_string = get_translation($usVoucher['offer_name']);
					if(strlen($usVoucher['offer_name']) > 20) {
						$cUname = mb_substr(get_translation($usVoucher['offer_name']), 0, 30,'UTF-8');
					} else {
						$cUname = get_translation($usVoucher['offer_name']);
					}
					
				?>
				<h2><?= $cUname ?></h2> 
				<span><?= date("d.m.Y",strtotime($usVoucher['purchase_date'] )); ?></span><span><?= lang(strtolower($usVoucher['person_type'])); ?></span>
				<span><?= get_currency($usVoucher['price'],$usVoucher['currency_type']); ?></span>
				
			</div>
			
			<button class="de-btn"  ><?= lang('used'); ?></button>
			
		</div>
	</div>  
<?php }}?>
