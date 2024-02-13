
	<?php if(!empty($unused_vouchers)){ 
		foreach($unused_vouchers as $unVoucher){ ?>
	<div class="f-v" onclick="voucher_detail('<?= $unVoucher['id'] ?>')">
		<div class="i-data">
			<?php  $image = json_decode($unVoucher['image'], true); ?>
			<img src="<?= base_url().$image[0]['url']; ?>" alt="">
			<div class="fv-de">
					<?php 
					$new_translated_string = get_translation($unVoucher['offer_name']);
					if(strlen($unVoucher['offer_name']) > 20) {
						$cUname = mb_substr(get_translation($unVoucher['offer_name']), 0, 30,'UTF-8');
					} else {
						$cUname = get_translation($unVoucher['offer_name']);
					}
					
				?>
				<h2><?= $cUname ?></h2>
				<span><?= date("d.m.Y",strtotime($unVoucher['purchase_date'] )); ?></span><span><?= lang(strtolower($unVoucher['person_type'])); ?></span>
				<span><?= get_currency($unVoucher['price'],$unVoucher['currency_type']); ?></span>
				
			</div>
				
			<button class="de-btn" ><?= lang('redeem'); ?></button>
			
		</div>
	</div>  
	<?php }} ?>
