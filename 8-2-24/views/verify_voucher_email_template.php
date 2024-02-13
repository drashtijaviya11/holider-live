<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&
                family=Roboto:wght@400;700&family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main-contain" style="background-color: #f6f6f6; width: 100%; height: 100vh; ; flex-direction: column; align-items: center; padding-top: 40px;">
            <div class="c-pass-table" style="background-color: #fff; border-radius: 4px; width: 550px; ; flex-direction: column; padding: 3% 2%;">
                <div class="image-section" style="; flex-direction: column; align-items: center;">
                    <img src="<?php echo base_url(); ?>assets/images/img-logo.png" alt="" style="width: 200px; height: 55px;">
                </div>
                <div class="text-section" style="; flex-direction: column; align-items: flex-start; margin-top: 5px; width: 100%;">
                    <p class="p fs-6" style="font-family: Rubik,sans-serif; font-weight: 400; line-height: 20px; color: #393939;"><?= lang('hi');  ?> <?=  $affiliator_name; ?>,</p>
                    <p style="font-family: Rubik,sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; color: #474747;">
                    <?= get_translation($offer_name); ?>   <?= lang('voucher_redeemed'); ?> <?= $earning;  ?> <?=  lang('is_now_on_your_account') ?>
                    </p>
                </div>

                <!-- <div class="detail-section" style="width: 100%; ; flex-direction: column; align-items: center;">
                    
                    <h4 style="width: 100%; display: flex; flex-direction: column; align-items: flex-start; font-size: 90%; color: #393939; font-weight: 500; font-family: Rubik ,sans-serif;">
                                    <?= lang('here_is_you_voucher_details') ?>
                    </h4>

                    <div class="detail-table" style="width: 100%; height: auto; margin-top: 1%; padding: 0%;">
                        <table class="detail-data" style="width: 100%;">
                            <tr class="list" style="width: 100%; height: 1.5rem;">
                                <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('voucher_name'); ?>:</td>
                                <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= get_translation($offer_name); ?></td>
                            </tr>
                            <tr class="list" style="width: 100%; height: 1.5rem;">
                                <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('voucher_value'); ?></td>
                                <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= $offer_price; ?></td>
                            </tr>
                        </table>
                    </div>
                    
                    
                </div> -->

                <div class="last" style="display: flex; width: 100%; flex-direction: row; align-items: flex-end; justify-content: space-between;">
                    <button class="web-btn" style="width: 40%; height: 45px; border-radius: 6px; background-color: #3498DB;
                    border: none; color: #fff; font-family: Rubik ,sans-serif; font-weight: 600; font-size: 16px;">
                    <a href="<?= base_url(); ?>" style="color: #fff;text-decoration: none;"> <?= lang('go_to_website'); ?></a>
                    </button>
                </div>
                        
            
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>