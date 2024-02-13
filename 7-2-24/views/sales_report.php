
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="/mysite/wpcontent/themes/RainForest/slider.js"></script>
<style>
input.amount_add {
    width: 90px;
    border: 0px;
    border-bottom: 2px solid #ccc;
    border-radius: 0px;
}
.ammount_area {
    width: 32%;
    background: #fff;
    height: 68px;
    margin-top: 13px;
    padding: 5px;
    border-radius: 5px;
}

.card_btn {
    margin: 16px;
    border-radius: 2px;
    border: 0.5px solid #0092B2;
    padding: 10px;
    color: #00333F;
    font-family: Livvic;
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
.card_btn.active{
    border-radius: 2px;
    background: rgba(0, 116, 141, 0.36);
    /* border-radius: 2px;
    border: 0.5px solid #0092B2; */
}
.save_card_details {
    border-radius: 2px;
    border: 0.5px solid #0092B2;
    width: 160.918px;
    height: 35px;
    color: #00333F;
    font-family: Livvic;
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    flex-shrink: 0;
    margin-left: 58%;
}

.voucher_order_type {
    text-align: center;
    color: #000;
    font-family: Literata;
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}.voucher_order_type.active {
    color: #005466;
    border-bottom: 1.5px solid #005466;
}
.offer_list_style{
    border-radius: 3px;
    border-top: 1px solid rgba(0, 152, 185, 0.38);
    border-left: 1px solid rgba(0, 152, 185, 0.38);
    background: #FFF;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
    margin: 10px;
}
.offer_title{
    color: #000;
    font-family: Livvic;
    font-size: 17px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
.offer_title_heading{
    color: #025769;
    font-family: Livvic;
    font-size: 17px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
.offer_price{
    color: #025769;
font-family: Livvic;
font-size: 17px;
font-style: normal;
font-weight: 500;
line-height: normal;
}

span.expired_date {
    font-size: 11px;
    margin-top: -6px;
    height: 12px;
    color: #4F4F4F;
font-family: Livvic;
font-size: 12px;
font-style: normal;
font-weight: 600;
/* line-height: 15px; 125% */
}
span.offer_date {
    font-size: 11px;
    margin-top: -6px;
    color: #000;
font-family: Livvic;
font-size: 11px;
font-style: normal;
font-weight: 600;
/* line-height: 15px; */
}
button.details_btn {
    border-radius: 8px;
    background: rgba(0, 116, 141, 0.36);
    width: 80px;
    height: 29px;
    /* flex-shrink: 0; */
    border: 0px;
    line-height: 29px;
    margin-top: 3px;
    color: #00333F;
    font-family: Livvic;
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
.used_details_page {
    border-radius: 3px;
    background: #FFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    padding: 10px;
}
.go_to_back{
    color: #000;
    font-family: Literata;
    font-size: 17px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
p.balance_paid {
    color: #00252D;
    font-family: Livvic;
    font-size: 11px;
    font-style: normal;
    font-weight: 600;
    line-height: 11px;
    margin-bottom: 10px;
}
button.balance_paid_btn {
    border-radius: 50px;
    background: linear-gradient(180deg, rgba(0, 116, 141, 0.25) 0%, rgba(111, 127, 131, 0.75) 100%);
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.25);
    border: 0px;
    color: #000;
    font-family: Livvic;
    font-size: 11px;
    font-style: normal;
    font-weight: 600;
    line-height: 11px;
    padding: 10px;
    width: 120px;
}
.balance_area_section{
    border-radius: 3px;
    background: #F1FDFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin: 0px;
    margin-top:10px;
    padding: 20px;
    text-align: center;
}
.contact_detail_mail{
    color: #4A4A4A;
font-family: Livvic;
font-size: 12px;
font-style: normal;
font-weight: 600;
line-height: 11px; /* 91.667% */
}
.contact_details_title{
    color: #00252D;
font-family: Livvic;
font-size: 14px;
font-style: normal;
font-weight: 600;
line-height: 11px; /* 78.571% */
}
.contact_supprot_area{
    border-radius: 4px;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
padding:10px;
margin:0px;
margin-top:10px;
}
.offer_details_bottom {
    border-radius: 2px;
    background: #FFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 86, 105, 0.29);
    /* width: 330px; */
    height: 263px;
    flex-shrink: 0;
}
.qr_code_img {
    padding: 20px;
}
.row.mt-3.date_of_offer {
    border-radius: 3px;
    background: #F1FDFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin: 3px;
    
}
p.qr_warning {
    color: #4A4A4A;
    font-family: Livvic;
    font-size: 13px;
    font-style: normal;
    font-weight: 600;
    line-height: 11px;
    text-align: center;
}
.or_class {
    text-align: center;
    color: #002128;
    font-family: Livvic;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}
button.qr_scan_btn {
    border-radius: 89.474px;
    background: linear-gradient(180deg, rgba(0, 116, 141, 0.25) 0%, rgba(111, 127, 131, 0.75) 100%);
    box-shadow: 0px 1.78947px 7.15789px 0px rgba(0, 0, 0, 0.25);
    border: 0px;
    padding: 8px;
    width: 150px;
    color: #000;
    font-family: Livvic;
    font-size: 18.286px;
    font-style: normal;
    font-weight: 600;
    line-height: 12.571px;
}
.temp{
    background-color: #015252;
    color: white;
}
.copyData
{
    display:flex;
}
.copyData input[type="text"] {
border-radius: 0px !important;
        }
        @media(max-width: 767px) {
    .back_to_offer_page,.offer_title_heading,.offer_title {
        font-size: 10px;
    }
}

</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<div class="card-container">
                <div class="card">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="test1" role="tabpanel">
                                <div class="row go_to_back" >
                                    <div class="col-12" class="back_to_offer_page">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i> <?= lang('my_sales') ?>
                                    </div>
                                </div>
                                
                               
                                
                                <div class="used_details_page">
                                    <div class="row mt-3 offer_list_style">
                                        <div class="col-4">
                                            <span class="offer_title_heading"><?= lang('offer_name') ?></span>
                                        </div>  
                                        <div class="col-4">
                                            <span class="offer_title_heading"><?= lang('quantity') ?></span>
                                        </div>  
                                        <div class="col-4">
                                            <span class="offer_title_heading"><?= lang('prices') ?></span>
                                        </div>  
                                    </div>

                                    <div class="row mt-3 offer_list_style">
                                        <div class="col-4">
                                            <span class="offer_title"><?= lang('free_offer') ?></span>
                                        </div>  
                                        <div class="col-4">
                                            <span class="offer_price">2</span>
                                        </div>  
                                        <div class="col-4">
                                            <span class="offer_date"><?= get_price(200) ?></span>
                                        </div>  
                                    </div>

                                    <div class="row mt-3 offer_list_style">
                                        <div class="col-4">
                                            <span class="offer_title"><?= lang('free_offer') ?></span>
                                        </div>  
                                        <div class="col-4">
                                            <span class="offer_price">2</span>
                                        </div>  
                                        <div class="col-4">
                                            <span class="offer_date"><?= get_price(200) ?></span>
                                        </div>  
                                    </div>

                                </div>
                               <div class="row balance_area_section">
                                    <div class="col-6">
                                        <p class="balance_paid"><?= lang('balance_to_be_paid:') ?></p>
                                        <button class="balance_paid_btn"><?= get_price(800) ?></button>
                                    </div>
                                    <div class="col-6">
                                    <p class="balance_paid"><?= lang('total_earnings:') ?></p>
                                    <button class="balance_paid_btn"><?= get_price(800) ?></button>
                                    </div>
                                </div>
                                <div class="row contact_supprot_area">
                                    <div class="col-6">
                                        <p class="contact_detail_titel"><?= lang('contact_support') ?></p>
                                     </div>
                                    <div class="col-6">
                                        <p class="contact_detail_mail">support@holider.com</p>
                                    </div>
                                </div>
                                <div class="offer_details_bottom">
                                        <div class="row mt-3">
                                            <div class="col-12  d-flex justify-content-center align-items-center">
                                                <div class="qr_code_img"><img src="<?= base_url('assets/img/qr.png'); ?>"></div>
                                            </div>  
                                            <div class="col-12  d-flex justify-content-center align-items-center">
                                                <p class="qr_warning"><?=  lang('nfc_reader'); ?></p>
                                                <p class="or_class"><?=  lang('or'); ?></p>
                                            </div>
                                            <div class="col-12  d-flex justify-content-center align-items-center">
                                            <button class="qr_scan_btn"><?=  lang('scan_qr'); ?></button>
                                            </div>  
                                        </div>
                            </div>
                            <div class="copyData">
                                <div class="input-group-prepend">
                                    <span class="input-group-text temp"><i class="bi bi-usb-c" style="transform: rotate(125deg);"></i></span>
                                </div>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text temp"><?=  lang('Copy') ; ?></span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
