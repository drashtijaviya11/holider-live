
    <div class="main-section">
        <div class="voucher-container">
            
            <div class="heading">
                <button class="m-voucher"  onclick="goBack()">
                    <img src="<?= base_url() ?>assets/images/arrow-blue.png" alt="">
                    <div class="m-te">My Vouchers</div>
                </button>
            </div>
            
            <div class="vo-detail">
            
                <div class="v-head">
                    <button class="f-ord" onclick="showTab('main-fv', 'f-ord')">Future Order</button>
                    <button class="u-ord" onclick="showTab('main-uv', 'u-ord')">Used Order</button>
                </div>
                

                <div class="main-uv">
                <?php foreach($used_vouchers as $usVoucher){ ?>
                    <div class="f-v">
                        <div class="i-data">
                            <img src="<?= base_url(); ?>assets/images/v1.jpg" alt="">
                            <div class="fv-de">
                                 <?php 
                                    $new_translated_string = get_translation($usVoucher['offer_name']);
                                    if(strlen($usVoucher['offer_name']) > 15) {
                                        // mb_internal_encoding("UTF-8");
                                        $cUname =substr($new_translated_string, 0, 10);

                                    } else {
                                        $cUname = $new_translated_string;
                                    }
                                   
                                ?>
                                <h2><?= $cUname ?></h2>
                                <span><?= $usVoucher['expire_date'] ?></span>
                                <span><?= get_price($usVoucher['price']); ?></span>
                                
                            </div>
                            <button class="de-btn" onclick="providerVouchers('<?= $usVoucher['id'] ?>')">Redeem</button>
                            
                        </div>
                    </div>  
                <?php } ?>    
                </div>

                <div class="main-fv">
                    
                <?php foreach($unused_vouchers as $unVoucher){ ?>
                    <div class="f-v" >
                        <div class="i-data">
                            <img src="<?= base_url(); ?>assets/images/v1.jpg" alt="">
                            <div class="fv-de">
                                 <?php 
                                    $new_translated_string = get_translation($unVoucher['offer_name']);
                                    if(strlen($unVoucher['offer_name']) > 15) {
                                        // mb_internal_encoding("UTF-8");
                                        $cUname =substr($new_translated_string, 0, 10);

                                    } else {
                                        $cUname = $new_translated_string;
                                    }
                                   
                                ?>
                                <h2><?= $cUname ?></h2>
                                <span><?= $unVoucher['expire_date'] ?></span>
                                <span><?= get_price($unVoucher['price']); ?></span>
                                
                            </div>
                            <button class="de-btn" onclick="providerVouchers('<?= $unVoucher['id'] ?>')">Redeem</button>
                        </div>
                    </div>  
                <?php } ?>
                </div>
                </div>

        </div>


    </div>
<script>
    //Start My Vouchers

function providerVouchers(id)
{
    $.ajax({
        url : "<?= base_url('provider/voucher_detail_ajax'); ?>",
        data : {id:id},
        type : "POST",
        dataType : "json",
		beforeSend: function() {
			$('#body-preloader').css('display', 'block');
		},
        success : function(res)
        {
			$('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}
        function goBack() {
        window.history.back();
        }
</script>