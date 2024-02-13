<style>
   
	.scan-area {
    position: absolute;
    width: 100%;
    height: auto;
    padding: calc(8*var(--aspect-ratio));
    left: 50%;
    top: 50%;
    display: none;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 2;
}
.row{
    width:100% !important;
    text-align:center;
}
.col-12{
    width:100% !important;
    text-align:center;
}

.det-scan {
    width: 90%;
    height: calc(220*var(--aspect-ratio));
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: calc(7*var(--aspect-ratio));
    background: #FFF;
    box-shadow: 0px 0px 5px 1px rgba(0, 116, 141, 0.15);
    padding: 0 3% 7% 3%;
}

.det-scan .head-cbtn {
    width: 100%;
    height: calc(15*var(--aspect-ratio));
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: flex-end;
}

.head-cbtn .close-scan {
    width: calc(12*var(--aspect-ratio));
    height: calc(12*var(--aspect-ratio));
    border-radius: 50%;
    border: none;
    background: #007bff;
    padding: 0 !important;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.close-scan img {
    width: calc(5*var(--aspect-ratio)) !important;
    height: calc(5*var(--aspect-ratio)) !important;
}
.head-list {
    height: calc(25*var(--aspect-ratio));    
    
}

.head-list th {
    color: #00B5DC;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(6*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(7*var(--aspect-ratio));
    /* color: #00B5DC;
    font-family: "Poppins", sans-serif;
    font-size: calc(5*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(7*var(--aspect-ratio));
    padding: 1%;
    white-space: nowrap; 
    word-wrap: break-word; */
}

.main-list {
    width: 100%;
    height: auto !important;
    
}

.main-list .ml-item {
    background-color: #fff;
    text-align: left;
    color: #8E8E8E;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(6*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(7*var(--aspect-ratio));
    padding: 2%;
    
}
</style>
<div class="main-section">
        <div class="olist-container">
            <div class="drop-dm">
                <!--<button class="m-dd" onclick="m">-->
                <!--    <div class="dd-te">November</div>-->
                <!--    <img src="<?= base_url()?>assets/images/arrow-blue.png" alt="">-->
                <!--</button>-->
                <select class="m-dd" id="month_change" >
                    <?php
                    // Get the current month number (1 to 12)
                    $currentMonth = date('n');

                    // Array of month names
                    $monthNames = array(
                      1 => lang('january'),
                        2 => lang('february'),
                        3 => lang('march'),
                        4 => lang('april'),
                        5 => lang('may'),
                        6 => lang('june'),
                        7 => lang('july'),
                        8 => lang('august'),
                        9 => lang('september'),
                        10 => lang('october'),
                        11 => lang('november'),
                        12 => lang('december')
                    );

                    // Generate the dropdown options
                    foreach ($monthNames as $monthNumber => $monthName) {
                        $selected = ($monthNumber == $currentMonth) ? 'selected' : '';
                        $class= 'dd-te';
                        echo "<option class=\"$class\" value=\"$monthNumber\" $selected >$monthName</option>";
                    }
                    ?>
                </select>
            </div>
			
            <div class="offer-table">
                <table class="oli-item" width="100%">
                    <thead>
                        <tr class="head-list">
                        <th class="hl-item1 text-center"><?php echo lang('offer_name') ?></th>
                        <th class="hl-item2"><?php echo lang('realized') ?></th>
                        <th class="hl-item3"><?php echo lang('non_realized') ?></th>
                        <th class="hl-item4"><?php echo lang('total_offer') ?></th>
                    </tr>
                    </thead>
                    <tbody id="get_voucher_section">
                        
                    </tbody>
                </table>
            </div>  
            <div class="balance-data">
                <div class="ba-hed"><?php echo lang('balance') ?></div>           
                <div class="balance-det">
                    <div class="bgba"></div>
                    <div class="ba-det">
                   <?php
			$user_id = $this->session->userdata('id');
			$condition = array('conditions' => ['id' => $user_id , 'type' => 'provider']);
			$provider = $this->QueryModel->selectSingleRow('users' ,$condition);
			$default_currency = $provider['default_currency'];
			$currency_code = $this->input->cookie('currency_code',true);
		   ?>
                        <div class="paid-ba">
                            <h3><?php echo lang('balance_to_be_paid')?>:</h3>
                            <button><?= getCurrencySymbol($currency_code).$tobePaid ?></button>
                        </div>
                        <div class="total-ba">
                            <h3><?php echo lang('total_earnings')?>:</h3>
                            <button><?= getCurrencySymbol($currency_code).$credited_amount; ?></button>
                        </div>
                       
                    </div>
                    
                </div>
            </div>

            <div class="con-detail">
                <h3><?php echo lang('contact_and_support')?></h3>
                <span><?php echo lang('support@holider.com') ?></span>
            </div>

            <div class="btn-detail">
                <div class="vvbg"></div>
                <button class="re-voucher-btn" onclick="showQR()">
                <div class="rv-text"><?php echo lang('redeem')?> <?php echo lang('voucher')?></div>
                 <img src="<?= base_url()?>assets/images/re-voucher.png" alt="">
                </button>   
            </div>

        </div>

    <div class="scan-area-overlay"></div>
        
            <div class="scan-area" id="qrModal">
                <div class="det-scan">
					<div class="head-cbtn">
						<button class="close-scan">
							<img src="<?= base_url() ?>assets/images/close-white.png" alt="">
						</button>
					</div> 
                    <div class="row nfc_area_row">
                        <div class="col-12">
                            <a href="javascript:;" class="nfcreader"><?php echo lang('nfc_reader')?></a>
                        </div> 
                    </div>
                    <div class="row nfc_area_row">
                        <div class="col-12">
                            <div id="output" class="output" style="display:none">
                                <div id="content" style="margin:20px;"></div>
                                <div id="status" style="margin:20px;"></div>
                            </div>
                        </div> 
                    </div>
                    <div class="row nfc_area_row">
                        <div class="col-12">
                            <span class="qr_span"><?= lang('or')?></span>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="javascript:;" class="QrCodeReader" id="start-scan"><?php echo lang('scan_qr') ?>
                        <!-- </a> -->
                </br>
                        <!-- </div> 
                    </div>
                    <div class="row">
                        <div class="col-12"> -->
                            <!-- <a href="javascript:;" class="QrCodeReader" id="start-scan"> -->
                                <img src="<?= base_url();?>assets/images/scanarea.png" class="scan_qr_img"></a>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="scanner-imgs">
                                <video id="qr-video" width="300px" height="300px" playsinline></video>
                            </div> 
                        </div>
                    </div>
                    <!--<input type="hidden" id="start-scan">-->
                </div>
            </div>
            <div class="nfc-voucher-area-overlay"></div>
            <div class="scan-nfc-area" id="voucherModal">
                <div class="nfc-voucher-list">
                    <table class="oli-item" width="100%" border="1">
                        <tbody id="list_voucher_data">
                            
                        </tbody>
                    
                    
                    </table>
                </div>
            </div>
    </div>
    <style>
        .oli-item {
			min-height: auto;
    		max-height: 450px;
          overflow-y: auto;  
          overflow-x:hidden;/* Add a vertical scrollbar when content overflows */
            display: block;    /*  Allow setting height and overflow
           /* margin-top: 10% !important;
            margin: 0 auto;
            border-radius: calc(3*var(--aspect-ratio));
            background-color: rgba(0, 181, 220, 0.10);
            padding: .5%;  
            / border-collapse: collapse; /
            table-layout: fixed;
            width: 100%; */
        }

		
        .scan-area .scanner-imgs {
        border-radius: calc(10*var(--aspect-ratio));
        margin-top: 10%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
}
/* .scan-area .scanner-imgs {
    width: 90%;
    height: calc(110*var(--aspect-ratio));
    overflow:hidden;
} */
.nfcreader{
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(9*var(--aspect-ratio));
    margin: 0 !important;
    text-align: center;}
    .nfc-voucher-area-overlay{
    display: none;
    position: absolute;
    backdrop-filter: blur(2px);
    top: 0% !important;
    left: 0;
    width: 100%;
    height: calc(600*var(--aspect-ratio));
    background: rgba(0, 0, 0, 0.315);
    z-index: 1;
}
.QrCodeReader{
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(9*var(--aspect-ratio));
    margin: 0 !important;
    text-align: center;}
    .nfc-voucher-area-overlay{
    display: none;
    position: absolute;
    backdrop-filter: blur(2px);
    top: 0% !important;
    left: 0;
    width: 100%;
    height: calc(600*var(--aspect-ratio));
    background: rgba(0, 0, 0, 0.315);
    z-index: 1;
}
.scan-nfc-area{
    position: absolute;
    border-radius: calc(20*var(--aspect-ratio)) calc(20*var(--aspect-ratio)) 0 0;
    width: 100%;
    height: auto;
    padding: calc(8*var(--aspect-ratio));
    left: 50%;
    top: 50%;
    display: none;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 2;
}
.nfc-voucher-list{
    height: calc(250*var(--aspect-ratio));
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: calc(10*var(--aspect-ratio));
    background: #FFF;
    box-shadow: 0px 0px 5px 1px rgba(0, 116, 141, 0.15);
    padding: 5%;
    overflow: auto;
}
#list_voucher_data td{padding: 5px;}
    </style>
    
            </div>
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
 var offset = 0;
 var isLoading = false;
    // Function to load more items via AJAX
    function loadMoreItems() {
        //$('#loader').show();
    if (isLoading) {
            return;
        }

    isLoading = true;
		$.ajax({
            url: '<?= base_url('provider/get_voucher_items') ?>/',
			data : {offset:offset},
            type: 'POST',
            dataType: 'json',
			// beforeSend: function() {
			// 	$('#body-preloader').css('display', 'block');
			// },
            success: function(data) {
				// $('#body-preloader').css('display', 'none');
				if(data.length>0){
					$('#get_voucher_section').append(renderItems(data));
					offset += data.length;
					isLoading = false;
				}
            }
        });
    }

    // Function to render items
    function renderItems(items) {
		var html = '';
		//console.log(items.length);
		if(items.length > 0)
		{
			//console.log(items)
			// Modify this based on your item structure
			$.each(items, function(index, item) {
				html += '<tr class="main-list">';
				html += '<td class="ml-item" width="50%">'+ item.name +'</th>';
				html += '<td class="ml-item" width="15%">'+ item.reedem_voucher +'</th>';
				html += '<td class="ml-item" width="15%">'+ item.unreedem_voucher +'</th>';
				html += '<td class="ml-item" width="20%">'+ item.total_sale_amount +'</th>';
				html += '</tr>';
			});
		}

        return html;
    }

    // Load more items when user scrolls to the bottom
        $(".oli-item").scroll(function() {
            if ($(this).scrollTop() + $(this).height() >= $(this)[0].scrollHeight - 100) {
                loadMoreItems();
            }
        });
    // Initial load
    $(document).ready(function() {
        loadMoreItems();
    });
</script>
<script>
$(document).ready(function() {
   newScanVoucher(); 
   let scanner = null;
    $(document).on('click', '#start-scan',function() {
        console.log('scan process start');
        $('#status').text('');
        $("#output").css("display","none");
        // Create a new Instascan scanner
        $(".scanner-imgs").css("display","block");
        $(".scan_qr_img").css("display","none");
        $(".nfcreader").css("display","none");
        $(".qr_span").css("display","none");
        $(".nfc_area_row").css("display","none");
        scanner = new Instascan.Scanner({ video: document.getElementById('qr-video') });

        // Add a callback function to handle scanned QR codes
        scanner.addListener('scan', function(content) {
            //console.log('Scanned QR Code:', content);
            //alert(content);
            sendScannedDataToServer(content);
            // Add your logic to save or process the scanned data here
        });

        // Start the scanning process
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                const rearCamera = cameras.find(camera => camera.name.includes('back'));
                if (rearCamera) {
                    // Assuming size is a numerical property, increase it by a certain value (e.g., 10)
                    rearCamera.size += 10;
                    //console.log("Increased size of front camera:", frontCamera);
                }
                 scanner.start(rearCamera); // Use the first available camera
                //$('#start-scan').hide();
                //$('#stop-scan').show();
            } else {
                console.error('<?php echo lang('no_camera_found');?>.');
            }
        }).catch(function(error) {
            console.error('<?php echo lang('error_getting_cameras');?>:', error);
        });
        $('#qr-video').show();
    });
    
    $('#stop-scan').on('click', function() {
        // Stop the scanning process
        if (scanner !== null) {
            scanner.stop();
            $('#start-scan').show();
            $('#stop-scan').hide();
        }
    });
});
$(document).on('click', ".close-scan", function () {
            //alert(scanner);
			$(".scan-area-overlay").hide();
            // $('#qr-video').hide();
            $(".scanner-imgs").css("display","none");
            $(".scan_qr_img").css("display","inline-block");
            $(".nfcreader").css("display","block");
            $(".qr_span").css("display","block");
            $(".nfc_area_row").css("display","block");
            $("#qrModal").hide();
            /*if (scanner !== null) {
                scanner.stop();
                stopCamera();
		       alert('scaner stope');
            }
            alert(scanner);*/
            // stopCamera();
		});
// function stopCamera() {
//     if (scanner) {
//         scanner.stop();
//         $('#qr-video').hide();
//     }
// }
function showQR(){
    /*showConfirmationDialog('open').then((result) => {
            if (result.isConfirmed) {
                showQRArea();
            }
        });*/
        $('#qr-video').hide();
        $(".scan_qr_img").css("display","inline-block");
        $(".nfcreader").css("display","block");
        $(".qr_span").css("display","block");
	showQRArea();
}
function showQRArea() {
    $(".scan_qr_img").css("display","inline-block");
    $(".nfcreader").css("display","block");
    $(".qr_span").css("display","block");
    var saleContainer = document.querySelector('.olist-container');
    var scanArea = document.querySelector('.scan-area');
    var scanAreaOverlay = document.querySelector('.scan-area-overlay');
    var isScanAreaHidden = scanArea.style.display === 'none' || scanArea.style.display === '';
    scanArea.style.display = isScanAreaHidden ? 'block' : 'none';
    scanAreaOverlay.style.display = isScanAreaHidden ? 'block' : 'none';
    /*setTimeout(function() {
        showConfirmationDialog('open').then((result) => {
            if (result.isConfirmed) {
                $('#start-scan').trigger("click");
            }
        });
	    }, 2000);*/
    
}

function showConfirmationDialog(action) {
    let message = action === 'open' ?
        '<?= lang('are_you_sure_you_want_to_redeem_voucher_and_close_the_scanner'); ?>' :
        '<?= lang('are_you_sure_you_want_to_redeem_voucher_close_the_scan_area'); ?>';
    return Swal.fire({
        title: '<?php echo lang('confirmation') ?>',
        text: message,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<?php echo lang('yes') ?>',
        cancelButtonText: '<?php echo lang('no') ?>',
    });
}
function sendScannedDataToServer(data){
    //alert('Your ajax work here : '+data);
    var qr_code = data;
    showConfirmationDialog('open').then((result) => {
        if (result.isConfirmed) {
           //alert(qr_code);
            $.ajax({
                url : "<?php echo base_url(); ?>provider/verify_voucher",
                data : {qr_code : qr_code},
                type : "POST",
                dataType : "json",
				beforeSend: function() {
                    // stopCamera();
                    $('#qr-video').hide();
                    $(".scanner-imgs").html('please wait ...');
				// 	$('#body-preloader').css('display', 'block');
				},
                success : function(res)
                {
                    //alert(res.code);
                    //return false;
					// $('#body-preloader').css('display', 'none');
                        window.location = res.url;
                }
            });
        }else if (result.dismiss) {
            //alert('working progress');
        stopCamera();
    }
         
    });
    //  scanner.stop();
            
}
function showConfirmationDialogNfc() {
    return Swal.fire({
        title: '<?php echo lang('confirmation') ?>',
        text: `<?php echo lang('are_you_sure_with_name_of_the_voucher') ?>`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<?php echo lang('yes') ?>',
        cancelButtonText: '<?php echo lang('no') ?>',
    });
}
$('.nfcreader').on("click", async () => {
    //checkDeviceWithVoucher('04:d7:1b:42:fd:16:90'); 
    //return false;
    $("#output").css("display","block");
  $('#status').text('');
  $('#content').text('');
  $('#status').text("<?php echo lang('user_clicked_scan_button') ?>");   
  try {
    const ndef = new NDEFReader();
    await ndef.scan();   
    $('#status').text("<?php echo lang('scan_started') ?>");

    ndef.addEventListener("readingerror", () => {
      $('#status').text("<?php echo lang('argh_cannot_read_data') ?>");
    });

    ndef.addEventListener("reading", ({ message, serialNumber }) => {
       // console.log(serialNumber);  
      var serialNumber = serialNumber; 
      ndef.stop().then(() => {
            console.log('<?php echo lang('scanning_stopped') ?>');
        }).catch((error) => {
            console.error('<?php echo lang('error_stopping_scanning') ?>:', error);
        });
    showConfirmationDialogNfc('open').then((result) => {
            if (result.isConfirmed) {
                checkDeviceWithVoucher(serialNumber);
            }
        });
     
    });
  } catch (error) {
    $('#status').text(error);
  }
});
function checkDeviceWithVoucher(serialNumber){
    $('#list_voucher_data').html('');
	$.ajax({
	url : "<?php echo base_url()?>provider/checkDeviceWithVoucher/"+serialNumber,
	data : {serialNumber : serialNumber},
	type : "GET",
	dataType : "json",
	// beforeSend: function() {
	// 	$('#body-preloader').css('display', 'block');
	// },
	success : function(res)
	{
		// $('#body-preloader').css('display', 'none');
        if(res.status==true){
            var jsonData = res.data;
            if (jsonData && jsonData.length > 0) {
                var tbody = $('#list_voucher_data');
                $.each(jsonData, function(index, item) {
                        var row = $('<tr>');
                        row.append('<td>' + item.offer_name + '</td>');
                        row.append('<td>' + item.voucher_code + '</td>');
                        row.append('<td><input type="radio" name="radio" value="'+item.voucher_code+'" class="voucherApply" id="voucher_'+item.voucher_code+'"></td>');
                        row.append('</tr>');
                    tbody.append(row);
                });
                shownfcVoucher();
            } else {
                $('#status').text(res.message); 
            }
        }else{
            $('#status').text(res.message);  
        }
	}
	});
}
function shownfcVoucher() {
    var saleContainer = document.querySelector('.olist-container');
    var scanArea = document.querySelector('.scan-nfc-area');
    var scanAreaOverlay = document.querySelector('.nfc-voucher-area-overlay');
    var isScanAreaHidden = scanArea.style.display === 'none' || scanArea.style.display === '';
    scanArea.style.display = isScanAreaHidden ? 'block' : 'none';
    scanAreaOverlay.style.display = isScanAreaHidden ? 'block' : 'none';
    
}
$(document).ready(function(){
    $(document).on('click','.voucherApply',function(){
        var qr_code = $(this).val();
        showConfirmationDialogNfc().then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url : "<?php echo base_url();?>provider/verify_nfc_voucher",
                data : {qr_code : qr_code},
                type : "POST",
                dataType : "json",
				// beforeSend: function() {
				// 	$('#body-preloader').css('display', 'block');
				// },
                success : function(res)
                {
					// $('#body-preloader').css('display', 'none');
                   //alert(res);
                    //if(res.status == true)
                    //{ //alert(res.code);
                        // window.location.reload();
                        window.location = res.url;
                   // }
                }
            });
            }
        });
      
    });


    $("#month_change").change(function () {
        $('#get_voucher_section').html('');
            var selectedMonth = $(this).val();
            // alert("Selected month: " + selectedMonth);
            $.ajax({
            url : '<?php echo base_url()?>provider/getVoucherListByMonth',
            type: 'POST',
            dataType : "json",
			// beforeSend: function() {
			// 	$('#body-preloader').css('display', 'block');
			// },
            data: { selectedMonth: selectedMonth },
            success : function(res) {
				// $('#body-preloader').css('display', 'none');
                if (res && res.length > 0) {
                    $('#get_voucher_section').html(renderItems(res));
                }else{
					$('#get_voucher_section').html('<tr class="main-list"><td  class="ml-item" colspan="4" style="width: 25%;">No Data Found</td></tr>');
				}
            },
       
            });
        });
});
function newScanVoucher(){
    var fullUrl = window.location.href;
    /*function getQueryParam(name) {
        var match = RegExp('[?&]' + name + '=([^&]*)').exec(fullUrl);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }*/
    var paramName = 'action';
    var paramValue = getQueryParam(paramName);
    if (paramValue !== null && paramValue==='scan') {
      showQRArea();
      updateUrlState('action'); 

    } 
}
function updateUrlState(action){
    var currentUrl = window.location.href;
    var paramToRemove = action;
    var paramValue = getQueryParam(paramToRemove);
    if (paramValue !== null && paramValue==='scan') {
        var searchParams = new URLSearchParams(window.location.search);
        searchParams.delete(paramToRemove);
        var newUrl = window.location.origin + window.location.pathname;
        history.replaceState(null, document.title, newUrl);
    } 
}   
function getQueryParam(name) {
    var fullUrl = window.location.href;
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(fullUrl);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}
</script>