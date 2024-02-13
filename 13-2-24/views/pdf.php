<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
   body {
      font-family: 'DejaVu Sans'; / Use a font that supports Unicode characters /
   }
</style>
</head>
<body>
    <div >
        <div>
            <div>
                <img src="<?php echo base_url(); ?>assets/images/img-logo.png" alt="" style="width: 200px; height: 55px;">
            </div>
            <div>
             <!-- <p>Amount: &#x20B9;500</p> -->
                <p ><?= lang('hi');  ?> <?=  $username; ?>,</p>
                <p >
								<?= lang('we_are_sending_this_mail_because_you_use') ?>
                </p>
            </div>

            <div >
                
                <h4 >
								<?= lang('here_is_you_voucher_details') ?>
                </h4>

                <div >
                    <table>
                        <tr >
                            <td ><?= lang('voucher_name'); ?>:</td>
                            <td ><?= get_translation($offer_name); ?></td>
                        </tr>
                        <tr >
                            <td ><?= lang('purchase_date'); ?>:</td>
                            <td ><?php echo $purchasedate; ?></td>
                        </tr>
                        <tr >
                            <td ><?= lang('voucher_value'); ?></td>
                            <td ><?= get_currency($offer_price,$currency_type); ?></td>
                        </tr>
                        <tr >
                            <td ><?= lang('expiration_date'); ?>:</td>
                            <td ><?= $expire_date; ?></td>
                        </tr>
                       
                        <tr >
                            <td ><?= lang('hour') ?>:</td>
                            <td ><?php echo $pickup_time ?></td>
                        </tr>
                        <tr >
                            <td ><?= lang('provider_name') ?>:</td>
                            <td ><?php echo $provider_name; ?></td>
                        </tr>
                        <tr >
                            <td ><?= lang('phone') ?>:</td>
                            <td ><?php echo $provider_phone; ?></td>
                        </tr>
                        <tr >
                            <td ><?= lang('address') ?>:</td>
                            <td ><?php echo $provider_address; ?></td>
                        </tr>
                    </table>
                </div>
                
                <div >
                    <table >
                        <tr >
                            <th ><?= lang('selection_name'); ?></th>
                            <th ><?= lang('quantity'); ?></th>
                            <th ><?= lang('price'); ?></th>
                        </tr>
                        <tr >
                            <td ><?= lang($type); ?></th>
                            <td >1</th>
                            <td ><?= get_currency($offer_price,$currency_type); ?></th>
                        </tr>
                        
                        <tr >
                            <th ><?= lang('total'); ?>:</th>
                            <th>1</th>
                            <th ><?= get_currency($offer_price,$currency_type); ?></th>
                        </tr> 
                    </table>
                </div>
            </div>
            <div >
                <div>
                    <img src="<?= base_url().$qr_image; ?>" alt="" style="width: 160px; height: 160px;">
                </div>
            </div>
        </div>
    </div>
 </body>
</html>