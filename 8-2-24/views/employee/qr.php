<style>
    .try-b .try-again {
        text-align: center;
     padding: 3%;
    }
</style>
    <div class="main-section">
      
   
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
                        <a href="<?php echo base_url()?>employee?action=scan" class="try-again"> <?php echo lang('redeem_one_more');?></a>
                    </div>
                <?php }else{ ?>
                    <div class="try-b">
                        <a href="<?php echo base_url()?>employee?action=scan" class="try-again"><?php echo lang('try_again');?></a>
                    </div>
                <?php } ?>

        </div>
      
    
       
    </div>
    <style>
        .image-scan {background: none;}
    </style>
    <!-- <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
<script>


</script>
