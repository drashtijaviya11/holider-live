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
}

.main-list {
    width: 100%;
    height: auto !important;
}

.main-list .ml-item {
    / width: 25%; /
    background-color: #fff;
    text-align: center;
    color: #8E8E8E;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(7*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(7*var(--aspect-ratio));
    padding: 5%;
}
</style>
<div class="main-section">
        <div class="olist-container">

            <div class="btn-detail">
                <div class="vvbg"></div>
                <button class="re-voucher-btn" onclick="showQR()">
                <div class="rv-text"><?= lang('reedem_voucher') ?></div>
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
                            <span class="qr_span"><?= lang('OR')?></span>
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
   
    
            </div>
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
 var offset = 0;
 var isLoading = false;
    function renderItems(items) {
        var html = '';
        $.each(items, function(index, item) {
            html += '<tr class="main-list">';
            html += '<td class="ml-item">'+ item.name +'</th>';
            html += '<td class="ml-item">'+ parseFloat(item.reedem_voucher).toFixed(2) +'</th>';
            html += '<td class="ml-item">'+ parseFloat(item.unreedem_voucher).toFixed(2) +'</th>';
            html += '<td class="ml-item">'+ parseFloat(item.total_sale_amount).toFixed(2) +'</th>';
            html += '</tr>';
        });

        return html;
    }
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
		});
function showQR(){
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
}

function showConfirmationDialog(action) {
    return Swal.fire({
        title: '<?php echo lang('confirmation') ?>',
        text: `${action === 'open' ? '<?= lang('are_you_sure_you_want_to_redeem_voucher_open_the_scan_area'); ?>' : '<?= lang('are_you_sure_you_want_to_redeem_voucher_close_the_scan_area'); ?>'} ?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<?php echo lang('yes') ?>',
        cancelButtonText: '<?php echo lang('no') ?>',
    });
}
function sendScannedDataToServer(data){
    var qr_code = data;
    showConfirmationDialog('open').then((result) => {
        if (result.isConfirmed) {
                    $.ajax({
                        url : "<?php echo base_url(); ?>employee/verify_voucher",
                        data : {qr_code : qr_code},
                        type : "POST",
                        dataType : "json",
                        beforeSend: function() {
                            // stopCamera();
                            $('#qr-video').hide();
                            $(".scanner-imgs").html('please wait ...');
                        },
                        success : function(res)
                        {
                                window.location = res.url;
                        }
                    });
            }else if (result.dismiss) {
            stopCamera();
            }  
    });
}
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
      //alert(serialNumber); 
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
	url : "<?php echo base_url()?>employee/checkDeviceWithVoucher/"+serialNumber,
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
                url : "<?php echo base_url();?>employee/verify_nfc_voucher",
                data : {qr_code : qr_code},
                type : "POST",
                dataType : "json",
                success : function(res)
                {
                    window.location = res.url;
                }
            });
            }
        });
    });

});

</script>