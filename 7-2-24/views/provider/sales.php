
    <div class="main-section">
        <div class="sale-container">

            <div class="sale-header">
                <button class="back-sale">
                    <img src="<?= base_url() ?>assets/images/arrow-blue.png" alt="">
                    <div class="bs-text">MY SALES</div>
                </button>
                <button class="cat-tree">
                    <div class="cat-text">My Client’s Tree</div>
                    <img src="<?= base_url() ?>assets/images/white-arrow.png" alt="">
                </button>
            </div>

            <div class="sale-dm">
               <!-- <button class="sale-dd">
                    <div class="sale-te">November</div>
                    <img src="<?/*= base_url() */?>assets/images/arrow-blue.png" alt="">
                </button>-->
                <select class="sale-dd">
                    <?php
                    // Get the current month number (1 to 12)
                    $currentMonth = date('n');

                    // Array of month names
                    $monthNames = array(
                        1 => 'January',
                        2 => 'February',
                        3 => 'March',
                        4 => 'April',
                        5 => 'May',
                        6 => 'June',
                        7 => 'July',
                        8 => 'August',
                        9 => 'September',
                        10 => 'October',
                        11 => 'November',
                        12 => 'December'
                    );

                    // Generate the dropdown options
                    foreach ($monthNames as $monthNumber => $monthName) {
                        $selected = ($monthNumber == $currentMonth) ? 'selected' : '';
                        $class= 'sale-te';
                        echo "<option class=\"$class\" value=\"$monthNumber\" $selected >$monthName</option>";
                    }
                    ?>
                </select>
            </div>

            
            <div class="sale-table">
                <table class="sli-item" width="100%">
                    <tr class="sale-list">
                        <th class="sh-item">Offer Name</th>
                        <th class="sh-item">Quantity</th>
                        <th class="sh-item">Commissions</th>
                    </tr>
                    <?php
                    if(!empty($sale_list)){ 
                        $totalAmount = 0;
                        foreach ($sale_list as $list){
                    ?>
                    <tr class="sale-main-list">
                        <td class="sm-item" width="40%"><?php echo substr($list->name, 0, 15); ?></th>
                        <td class="sm-item" width="30%"><?php echo get_price($list->Quantity + $list->ChildQuantity) ?></th>
                        <td class="sm-item1" width="30%"><?php echo get_price($list->childCommission + $list->adultCommission) ?></th>
                        <?php $totalAmount += $list->totalAmount; ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            
            <div class="balance-data">
                <div class="ba-hed">BALANCE</div>           
                <div class="balance-det">
                    <div class="bgba"></div>
                    <div class="ba-det">
                        <div class="paid-ba">
                            <h3>Balance To be paid:</h3>
                            <button>800.00$</button>
                        </div>
                        <div class="total-ba">
                            <h3>Total Earnings:</h3>
                            <button><?= get_price($totalAmount) ?></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="con-detail">
                <h3>Contact & Support</h3>
                <span>support@holider.com</span>
            </div>

            <div class="copy-link">
                <input type="text" class="copy-input" placeholder="https://www.google.com/search?" disabled>
                <button class="copy-btn">
                    <div class="copy-text">Copy</div>
                    <img src="<?= base_url() ?>assets/images/copy-icon.png" alt="">
                </button>
            </div>
            
            <div class="button-detail">
                <div class="vvbg"></div>
                <button class="show-btn" onclick="showQR()">SHOW QR CODE</button>
            </div>
            
           

        </div>

        <div class="scan-area-overlay"></div>
            <div class="scan-area">
                
                <div class="det-scan">
                    <p>Use NFC reader to redeem voucher</p>
                    <span>OR</span>
                    <div class="scanner-img">
                        <img src="<?= base_url() ?>assets/images/scanqr-img.png" alt="">
                    </div>
               </div>
            </div>
        </div>
