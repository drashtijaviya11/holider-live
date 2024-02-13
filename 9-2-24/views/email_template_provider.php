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
    <style>
      /* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
      </style>
</head>
<body>
    <div class="main-contain" style="background-color: #f6f6f6; width: 100%; height: 100vh; ; flex-direction: column; align-items: center; padding-top: 40px;">
        <div class="c-pass-table" style="background-color: #fff; border-radius: 4px; width: 550px; ; flex-direction: column; padding: 3% 2%;">
            <div class="image-section" style="; flex-direction: column; align-items: center;">
                <img src="<?php echo base_url(); ?>assets/images/img-logo.png" alt="" style="width: 200px; height: 55px;">
            </div>
            <div class="text-section" style="; flex-direction: column; align-items: flex-start; margin-top: 5px; width: 100%;">
                <p class="p fs-6" style="font-family: Rubik,sans-serif; font-weight: 400; line-height: 20px; color: #393939;"><?= lang('hi');  ?> <?=  $provider_name; ?>,</p>
                <p style="font-family: Rubik,sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; color: #474747;">
								<?= lang('we_are_sending_this_mail_because_you_use') ?>
                </p>
            </div>

            <div class="detail-section" style="width: 100%; ; flex-direction: column; align-items: center;">
                
                <h4 style="width: 100%; display: flex; flex-direction: column; align-items: flex-start; font-size: 90%; color: #393939; font-weight: 500; font-family: Rubik ,sans-serif;">
								<?= lang('here_is_you_voucher_details') ?>
                </h4>

                <div class="detail-table" style="width: 100%; height: auto; margin-top: 1%; padding: 0%;">
                    <table class="detail-data" style="width: 100%;">
                        <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('voucher_name'); ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= get_translation($offer_name); ?></td>
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('purchase_date'); ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?php echo $purchasedate; ?></td>
                        </tr>
                        <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('voucher_value'); ?></td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= get_currency($offer_price,$currency_type); ?></td>
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('expiration_date'); ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= $expire_date; ?></td>
                        </tr>
                        <!-- <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;">Pickup Date:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?php echo $pickup_date; ?></td>
                        </tr> -->
                        <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('hour') ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?php echo $pickup_time; ?></td>
                        </tr>
                        <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('username') ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?php echo $username; ?></td>
                        </tr>
                        <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('phone') ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?php echo $phone; ?></td>
                        </tr>
                        <!-- <tr class="list" style="width: 100%; height: 1.5rem;">
                            <td class="l-item" width="30%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?= lang('address') ?>:</td>
                            <td class="l-item" width="20%" style= "color:#474747; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 15px;"><?php echo $provider_address; ?></td>
                        </tr> -->
                    </table>
                </div>
                
                <div class="ac-table" style="width: 100%; height: auto; margin-top: 2%; padding: 0%;">
                    <table class="ac-data" style="width: 100%;">
                        <tr class="head-list" style="width: 100%; height: 3rem; border-bottom: .5px solid #4D767E;">
                            <th class="hl-item1" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= lang('selection_name'); ?></th>
                            <th class="hl-item2" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= lang('quantity'); ?></th>
                            <th class="hl-item3" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= lang('price'); ?></th>
                        </tr>
                        <tr class="main-list" style="width: 100%; height: 2rem;">
                            <td class="ml-item" width="34%" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 14px;"><?= lang($type); ?></th>
                            <td class="ml-item" width="33%" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 14px;">1</th>
                            <td class="ml-item" width="33%" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 14px;"><?= get_currency($offer_price,$currency_type); ?></th>
                        </tr>
                        
                        <tr class="main-list" style="width: 100%; height: 2rem; border-bottom: .5px solid #4D767E; border-top: .5px solid #4D767E;">
                            <th class="ml-item" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= lang('total'); ?>:</th>
                            <td class="ml-item" width="33%" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 400; font-size: 14px;">1</th>
                            <th class="ml-item" style="text-align: center; color:#646464; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= get_currency($offer_price,$currency_type); ?></th>
                        </tr> 
                    </table>
                </div>
            </div>

            <div class="last" style="width: 100%; flex-direction: row; align-items: flex-end; justify-content: space-between;    margin: auto;
    text-align: center;">

                <div class="qr-detail" style="margin-top: 2%;flex-direction: column;  align-items: center;">
                    <img src="<?= base_url().$qr_image; ?>" alt="" style="width: 160px; height: 160px;">
                </div>


                <!-- <button class="web-btn" style="width: 40%; height: 45px; border-radius: 6px; background-color: #3498DB;
                border: none; color: #fff; font-family: Rubik ,sans-serif; font-weight: 600; font-size: 16px;">
                   <a href="<?= base_url(); ?>dashboard/get_voucher_detail/<?= $voucher_id; ?>" style="color: #fff;text-decoration: none;"> <?= lang('go_to_voucher'); ?></a>
                </button> -->
            </div>
            <div class="tc-link" style="width: 100%; display: flex; flex-direction: column; margin-top: 3%; margin-bottom: 3%;">
                <a href="<?= base_url();?>dashboard/voucher_tc?id=<?= $voucher_id; ?>" style="color: #3498DB; text-decoration: underline; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= lang('t_and_c'); ?></a>
            </div>
            <div class="flag-data" style="width: 100%; height: 7%; display: flex; flex-direction: row; align-items: center; padding: 2%; gap: 2%;">
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=english" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/U.K..gif" alt="" style="width: 100%; height: 100%;">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/Israel.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/Germany.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/Italy.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/Russia.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/Turkey.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/Greece.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
                <a href="<?= base_url(); ?>/dashboard/get_email_details?voucher_id=<?= $voucher_id; ?>&lang=hebrew" style="margin:5px;width: 10%; height: 100%; text-decoration: none;">
                    <img src="<?php echo base_url(); ?>assets/images/China.gif" alt="" style="width: 100%; height: 100%; box-shadow: 0px 0px 5px 1px rgba(139, 139, 139, 0.7);">
                </a>
            </div>
                  <input type="hidden" class="voucher_id" name="voucher_id" value="<?= $voucher_id; ?>" >
           
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
