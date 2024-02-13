
    <div class="main-section">

        <div class="c-offer-container">
          
            <div class="c-heading">
                <button class="c-offer" onclick="choose_offer()">
                    <img src="<?= base_url() ?>assets/images/arrow-blue.png" alt="">
                    <div class="c-te"><?= lang('choose_offer') ?></div>
                </button>
            </div>

            <div class="main-co">
                 <?php foreach($choose_offer_data as $offer_data){ ?>
                  <div class="c-o">
                    <div class="i-data" onclick="redeem(<?= $offer_data['id'] ?>)">
                       <img src="<?= base_url() ?>assets/images/v1.jpg" alt="">
                     <div class="co-de">
                            <h2><?= get_translation($offer_data['name']) ?><?= lang('one_boat') ?></h2>
                            <span><?= $newDate = date("F j, Y", strtotime($offer_data['created_at']));?></span>
                            <span class="price"><?= get_currency($offer_data['adult_price'],$offer_data['currency_type']) ?></span>     
                        </div>
                        <button class="re-btn"><?= lang('redeem') ?></button>
                       
                    </div>
                     <?php }   ?>
                </div>
          
            </div>
   
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .co-de h2 {font-size: calc(5*var(--aspect-ratio));}
        .c-o .i-data img {
            width: calc(50*var(--aspect-ratio));
            height: calc(45*var(--aspect-ratio));
            border-radius: 10px 0 0 10px;
        }
    </style>
    <script>
    function choose_offer() {
        var offerPageUrl = '<?= base_url('provider/sales') ?>';
        window.location.href = offerPageUrl;
    }
    
    function redeem(id) {
        var redeemPageUrl = '<?= base_url('provider/getVoucher_detail') ?>/'+id;
        window.location.href = redeemPageUrl;
    }
</script>
