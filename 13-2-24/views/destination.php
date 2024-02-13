<style>
.position-absolute{
    position:absolute !important;
}

.sed-sec h2 {
    margin: 0;
    color: #005B6F;
    font-family: "Roboto" ,sans-serif;
    font-weight: 600;
    font-size: calc(10*var(--aspect-ratio)) !important;
}


    </style>
        <div class="destination-container">

            <div class="des-sec position-relative">
                <div class="des-main-img">
                    <img src="<?php echo base_url() ?>assets/images/des-bg.jpg" alt="">
                </div>
                <div class="bg-des position-absolute"></div>
                <div class="des-text position-absolute">
                    <button class="head-des"><?php echo lang('destinations')?></button>
                    <div class="des-content">
                        <div class="lft-rec"></div>
                        <div class="dc-text">
                            <p><?php echo lang('destinations_to_inspire')?> </br><?php echo lang('adventure')?></p>
                        </div>
                        <div class="rgt-rec"></div>
                    </div>
                </div>

            

            </div>

            <div class="des-detail-section">
			<?php if(!empty($destinations)){
				foreach($destinations as $destination) { ?>
                <div class="destination-box">
                    <div class="fir-sec">
                        <img src="<?php echo base_url() ?>assets/images/malaysia.jpg" alt="">
                    </div>
                    <div class="sed-sec">
                        <h2><?= $destination['area']; ?></h2>
                        <button class="more-dest" onclick="new_getArea('<?= $destination['id']; ?>')"><?php echo lang('more')?></button>
                    </div>
                </div>
				<?php } } ?>
                <!-- <div class="destination-box">
                    <div class="fir-sec">
                        <img src="<?php echo base_url() ?>assets/images/france.jpg" alt="">
                    </div>
                    <div class="sed-sec">
                        <h2>Paris</h2>
                        <button class="more-dest">MORE</button>
                    </div>
                </div>

                <div class="destination-box">
                    <div class="fir-sec">
                        <img src="<?php echo base_url() ?>assets/images/Indonesia.jpg" alt="">
                    </div>
                    <div class="sed-sec">
                        <h2>Indonesia</h2>
                        <button class="more-dest">MORE</button>
                    </div>
                </div>

                <div class="destination-box">
                    <div class="fir-sec">
                        <img src="<?php echo base_url() ?>assets/images/tahiti.jpg" alt="">
                    </div>
                    <div class="sed-sec">
                        <h2>Tahiti</h2>
                        <button class="more-dest">MORE</button>
                    </div>
                </div>

                <div class="destination-box">
                    <div class="fir-sec">
                        <img src="<?php echo base_url() ?>assets/images/ladakh.jpg" alt="">
                    </div>
                    <div class="sed-sec">
                        <h2>Ladakh</h2>
                        <button class="more-dest">MORE</button>
                    </div>
                </div>

                <div class="destination-box">
                    <div class="fir-sec">
                        <img src="<?php echo base_url() ?>assets/images/south-korea.jpg" alt="">
                    </div>
                    <div class="sed-sec">
                        <h2>South Korea</h2>
                        <button class="more-dest">MORE</button>
                    </div>
                </div> -->
            </div>

        </div>


