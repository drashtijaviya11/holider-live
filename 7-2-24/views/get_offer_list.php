<?php foreach ($category as $cat) { ?>
            <div id="<?= url_title($cat['category_name'], 'underscore', true); ?>" class="offer-list-1">
            <?php foreach ($offers as $offer) {
                if ($offer['categories'] == $cat['id']) { ?>
                <div class="offer-view" onclick="view_offer(<?php echo $offer['id'] ?>)">
                    <div class="first-view">
                        <?php if(!empty($offer['first_image'])){ ?>
                        <img src="<?= base_url() . '/' . $offer['first_image']; ?>" alt="">
                        <?php }else{ ?>
                            <img src="<?= base_url();?>img/no-image.png" alt="">
                        <?php } ?>
                    </div>
                    <div class="second-view">
                        <div class="f-col">
                            <div class="tooltip"><?php echo $offer['name']; ?></div>   
                            <p style="padding: 0px;font-size: 10px;margin: 0px;"><?php              
                             $countryNameFound = false; foreach($country as $cntry) {
                                if ($offer['country'] === $cntry['id']) {
                                    echo $cntry['name'];
                                    $countryNameFound = true;
                                    break;
                                }
                            }
                            if (!$countryNameFound) {
                                echo $offer['country']." , ";}
                                
                                $stateNameFound = false;
                                foreach ($state as $sta) {
                                    if ($offer['state'] === $sta['id']) {
                                        echo $sta['name'];
                                        $stateNameFound = true;
                                        break;
                                    }
                                }
                                if (!$stateNameFound) {echo $offer['state'];} ?></p>
                            <?php 
                                if(strlen($offer['name']) > 20) {
                                    $cUname = mb_substr(get_translation($offer['name']), 0, 64,'UTF-8');
                                } else {
                                    $cUname = get_translation($offer['name']);
                                }
                            ?>
                         
                            <div class="text"> <?= ucfirst($cUname); ?> </div>
                            <fieldset class="rating">
                                <?php
                                    $rating = $offer['average_rate'];
                                    $maxRating = 5; // Maximum rating
                                    
                                    for ($i = 1; $i <= $maxRating; $i++) {
                                        $starClass = ($i <= $rating) ? 'checked' : 'unchecked';
                                        
                                        // Check if it's a half star
                                        if (($i - 0.5) == $rating) {
                                            $starClass .= ' halfstar';
                                        }
                                    
                                        echo '<span class="fa fa-star ' . $starClass . '"></span>';
                                    }
                                ?>
                            </fieldset>
                        </div>
                        <div class="s-col">
                            <?php if($offer['adult_discount']!=0){ ?>
                               <div class="text1"><del> <?= get_currency($offer['adult_price'],$offer['currency_type']); ?></del>&nbsp;&nbsp;&nbsp;<?= get_currency($offer['adult_discount'],$offer['currency_type']) ?></div>
                            <?php }else{ ?>
                                <div class="text1"><?= get_currency($offer['adult_price'],$offer['currency_type']); ?></div>
                                <?php } ?>
                            <div class="hours">
                                <img src="<?= base_url();?>assets/images/clock.png" alt="">
                                <div class="text"> <?php echo $offer['traveling_time'];?> <?=   lang('hours'); ?></div>
                            </div>
                            <!--<div class="text1"><del>$22.30</del>$20.00</div>-->
                            <!--<div class="hours">-->
                            <!--    <img src="<?= base_url(); ?>assets/images/clock-blue.png" alt="">-->
                            <!--    <div class="text">2 hours</div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <hr>
                    <div class="third-view">
                        <p><?php echo get_translation_desc($offer['details']); ?></p>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
               
            </div>
            <?php } ?>
