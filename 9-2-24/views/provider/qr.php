<style>
    .try-b .try-again {
        text-align: center;
     padding: 3%;
    }
</style>
    <div class="main-section">
      
    <!--<a class="m-voucher" id="back" href="<?= base_url('provider'); ?>">
    <img src="<?= base_url(); ?>assets/images/arrow-blue.png" style='margin-top:5%;' alt="">
    </a>-->
    <!-- <?php if($status == '1') { ?>
        <a href="" class="qr_span" style='margin-top:12%;text-align: right;'><?php echo lang('redeem one more');?></a>
    <?php }else{ ?>
        <a href="" class="qr_span" style='margin-top:12%;text-align: right;'><?php echo lang('Try again');?></a>
    <?php } ?>
        <div class="qr-container"> -->
            
            <!-- <div class="scan">
                <div class="scan-detail">
                    <h4>Use NFC Reader to Redeem Voucher</h4>
                    <span>OR</span>
                </div>
                <div class="image-scan">
                    <img src="<?= base_url() ?>\assets\images\scanner-image.png" alt="">
                    <video id="qr-video" width="100%" height="100%" playsinline></video>
                    <button id="start-scan">Start Scan</button>
                    <button id="stop-scan" style="display: none;">Stop Scan</button>
                </div>
                
            </div> -->
            <?php if($status == '1') { ?>
            <div class="right-msg">
                <img src="<?= base_url() ?>assets/images/smiley-face.png" alt="">
                <div class="msg-d">
                    <h4><?= lang('success'); ?></h4>   
                    <span><?= $message; ?></span>
                </div>
            </div>
            <?php }else{ ?>
            <div class="wrong-msg">
                <img src="<?= base_url() ?>assets/images/sad-face.png" alt="">
                <div class="msg-d">
                    <h4><?= lang('failed'); ?></h4>   
                    <span><?= $message; ?></span>
                </div>
               
            </div>
                <?php } ?>
                <?php if($status == '1') { ?>
                    <div class="try-b">
                        <a href="<?php echo base_url()?>provider?action=scan" class="try-again"> <?php echo lang('redeem_one_more');?></a>
                    </div>
                <?php }else{ ?>
                    <div class="try-b">
                        <a href="<?php echo base_url()?>provider?action=scan" class="try-again"><?php echo lang('try_again');?></a>
                    </div>
                <?php } ?>

        </div>
      
    
       
    </div>
    <style>
        .image-scan {background: none;}
    </style>
    <!-- <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
<script>
// $(document).ready(function() {
//     let scanner = null;

//     $('#start-scan').on('click', function() {
//         // Create a new Instascan scanner
//         scanner = new Instascan.Scanner({ video: document.getElementById('qr-video') });

//         // Add a callback function to handle scanned QR codes
//         scanner.addListener('scan', function(content) {
//             console.log('Scanned QR Code:', content);
//    alert(content);
//             // Add your logic to save or process the scanned data here
//         });

//         // Start the scanning process
//         Instascan.Camera.getCameras().then(function(cameras) {
//             if (cameras.length > 0) {
//                 const rearCamera = cameras.find(camera => camera.name.includes('back'));
//                  scanner.start(rearCamera); // Use the first available camera
//                 $('#start-scan').hide();
//                 $('#stop-scan').show();
//             } else {
//                 console.error('No cameras found.');
//             }
//         }).catch(function(error) {
//             console.error('Error getting cameras:', error);
//         });
//     });

//     $('#stop-scan').on('click', function() {
//         // Stop the scanning process
//         if (scanner !== null) {
//             scanner.stop();
//             $('#start-scan').show();
//             $('#stop-scan').hide();
//         }
//     });
// });

</script>
