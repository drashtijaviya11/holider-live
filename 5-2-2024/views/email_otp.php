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
                <p class="p fs-6" style="font-family: Rubik,sans-serif; font-weight: 400; line-height: 20px; color: #393939;"><?= lang('hi');  ?> <?=  $username; ?>,</p>
                <p style="font-family: Rubik,sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; color: #474747;">
								<!-- <?= lang('Your LO') ?> -->
                                login otp is
                </p>
            </div>

            <div class="detail-section" style="width: 100%; ; flex-direction: column; align-items: center;">
                
                <h4 style="width: 100%; display: flex; flex-direction: column; align-items: flex-start; font-size: 90%; color: #393939; font-weight: 500; font-family: Rubik ,sans-serif;">
								<?= $otp ?>
                </h4>

               
                
                
            </div>

           
            <!-- <div class="tc-link" style="width: 100%; display: flex; flex-direction: column; margin-top: 3%; margin-bottom: 3%;">
                <a href="<?= base_url();?>dashboard/voucher_tc?id=<?= $voucher_id; ?>" style="color: #3498DB; text-decoration: underline; font-family: Rubik ,sans-serif; font-weight: 500; font-size: 14px;"><?= lang('t_and_c'); ?></a>
            </div> -->
           
           
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
