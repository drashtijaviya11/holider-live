<style>
	.main-uv,.main-fv{
		height: 800px;
    	overflow-y: scroll;
	}
	.no_voucher_found{
	padding: 15px;
    color: red;
    font-weight: 700;
    text-align: center;
	}
</style>

        <div class="voucher-container">
            
            <div class="heading">
                <button class="m-voucher"  onclick="goBack()">
                    <img src="<?= base_url(); ?>assets/images/arrow-blue.png" alt="">
                    <div class="m-te"><?= lang('my_vouchers'); ?></div>
                </button>
            </div>
            
            <div class="vo-detail">
            
                <div class="v-head">
                    <button class="f-ord" onclick="showTabnew('main-fv', 'f-ord')"><?= lang('future_voucher'); ?></button>
                    <button class="u-ord" onclick="showTabnew('main-uv', 'u-ord')"><?= lang('used_voucher'); ?></button>
                </div>
                

                <div class="main-uv">
                    
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
                                <span><?= date("d.m.Y",strtotime($usVoucher['purchase_date'] )); ?></span><span><?= lang(strtolower($usVoucher['person_type'])) ?></span>
                                <span><?= get_currency($usVoucher['price'],$usVoucher['currency_type']); ?></span>
                                
                            </div>
                            
                            <button class="de-btn"  ><?= lang('used'); ?></button>
                            
                        </div>
                    </div>  
                <?php }}else{ ?>
					<div class="f-v no_voucher_found">
                    	<span class=""><?= lang('no_voucher_found'); ?></span>
					</div> 
                <?php } ?>
                </div>

                <div class="main-fv">
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
                    <?php }} else{ ?>
						<div class="f-v no_voucher_found">
                    		<span ><?= lang('no_voucher_found'); ?></span>
						</div>
                <?php } ?>
                    
                </div>
                </div>

        </div>

<script>
    $(document).ready(function(){
        $('.main-fv').css({ display: 'block', });
        $('.f-ord').trigger('click');
        // $('.f-ord').css({ color: 'rgb(255, 255, 255)', background: 'rgb(0, 181, 220)' });
        function showTabnew(tabName, buttonClass) {
        var tabs = document.querySelectorAll('.main-fv, .main-uv');
        tabs.forEach(function(tab) {
            tab.style.display = 'none';
        });

        var buttons = document.querySelectorAll('.f-ord, .u-ord');
        buttons.forEach(function(button) {
            button.classList.remove(buttonClass + '-selected');
        });

        document.querySelector('.' + tabName).style.display = 'block';

        var clickedButton = document.querySelector('.' + buttonClass);
        clickedButton.classList.add(buttonClass + '-selected');

        buttons.forEach(function(button) {
            if (button !== clickedButton) {
                button.style.color = '';
                button.style.background = '';
            }
        });
        clickedButton.style.color = '#fff';
        clickedButton.style.background = '#00B5DC';

    
    }
    })
    function showTabnew(tabName, buttonClass) {
        var tabs = document.querySelectorAll('.main-fv, .main-uv');
        tabs.forEach(function(tab) {
            tab.style.display = 'none';
        });

        var buttons = document.querySelectorAll('.f-ord, .u-ord');
        buttons.forEach(function(button) {
            button.classList.remove(buttonClass + '-selected');
        });

        document.querySelector('.' + tabName).style.display = 'block';

        var clickedButton = document.querySelector('.' + buttonClass);
        clickedButton.classList.add(buttonClass + '-selected');

        buttons.forEach(function(button) {
            if (button !== clickedButton) {
                button.style.color = '';
                button.style.background = '';
            }
        });
        clickedButton.style.color = '#fff';
        clickedButton.style.background = '#00B5DC';

    
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
						$(".main-fv").append(data.html);
						unUsedOffset += data.voucher.length;
						isUnUsedLoading = false;
					}
				}
			});
		}
		$(".main-fv").scroll(function() {
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
						$(".main-uv").append(data.html);
						usedOffset += data.voucher.length;
						isUsedLoading = false;
					}
				}
			});
		}
		$(".main-uv").scroll(function() {
			if ($(this).scrollTop() + $(this).height() >= $(this)[0].scrollHeight - 100) {
				console.log('Scroll to bottom');
				loadMoreUsedVoucher();
			}
		});


</script>
