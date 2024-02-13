
<style>
#status {
    /* margin: 20px; */
    color: #ef0000;
    /* margin-top: 1px; */
    position: absolute;
    z-index: 1;
    top: 10px;
    text-align: center;
    
}
</style>
<section id="success-bg">
  <div class="container">
    <div style="height:225px;"></div>
	<br><br>
	<div class="row pt-5">
	  <div class="col-md-12">
	    <div class="border bg-white shadow-sm rounded-2 py-5">
	      <div class="row">
		    <div class="col-md-4 px-4">
			</div>
			<div class="col-md-3 px-4 mt-2 position-relative col-media-3 text-center">
                <div id="output" class="output">
                                <div id="content" style="margin:20px;"></div>
                                <div id="status"></div>
                    </div>
      <a href="javascript:;" class="f-poppins fw-600 position-absolute z-1 barcode-text nfcreader" style="margin-left:-13%;"><?php echo lang('nfc_reader')?></a>
			  
      <span class="text-sky f-poppins fs-20 fw-bold position-absolute z-1 barcode-text-2"><?php echo lang('or')?></span>
			  <img src="<?php echo base_url();?>desktop_assets/images/scanner_sec.png" class="w-100 scanner-sec position-relative"><br>
			  <img src="<?php echo base_url();?>desktop_assets/images/barcode.png" class="barcode scanner-sec position-relative">
			  <div class="text-center border shadow-sm py-4 success-section">
			   
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
<div class="modal fade modal-lg" id="nfcVoucherModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- No close icon, you can add content here -->
            <div class="modal-header">
                <!-- Empty header, or add your custom header content here -->
                <h5 class="modal-title" id="customModalLabel"><?= lang('model_title') ?></h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table" border="1">
                        <tbody id="list_voucher_data">
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Empty footer, or add your custom footer content here -->
                <button type="button" class="btn btn-secondary" id="close-btn" data-dismiss="modal"><?= lang('close') ?></button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
 var offset = 0;
 var isLoading = false;
    // Function to load more items via AJAX
    // function loadMoreItems() {
    //     //$('#loader').show();
    // if (isLoading) {
    //         return;
    //     }

    // isLoading = true;
    //     $.ajax({
    //         url: '<?= base_url('employee/get_voucher_items') ?>/' + offset,
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(data) {
    //             // Append the new items to the list
    //             $('#get_voucher_section').append(renderItems(data));
    //             // Increment the offset for the next request
    //             offset += data.length;

    //             // Hide the loader
    //             //$('#loader').hide();
    //         }
    //     });
    // }

    // Function to render items
    function renderItems(items) {
        var html = '';

        // Modify this based on your item structure
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
    
   let scanner = null;
    $('#start-scan').on('click', function() {
        // Create a new Instascan scanner
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
                 scanner.start(rearCamera); // Use the first available camera
                //$('#start-scan').hide();
                //$('#stop-scan').show();
            } else {
                console.error('<?php echo lang('no_camera_found');?>.');
            }
        }).catch(function(error) {
            console.error('<?php echo lang('error_getting_cameras');?>:', error);
        });
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
function showQR(){
    /*showConfirmationDialog('open').then((result) => {
            if (result.isConfirmed) {
                showQRArea();
            }
        });*/
	showQRArea();
}
function showQRArea() {
    var saleContainer = document.querySelector('.olist-container');
    var scanArea = document.querySelector('.scan-area');
    var scanAreaOverlay = document.querySelector('.scan-area-overlay');
    var isScanAreaHidden = scanArea.style.display === 'none' || scanArea.style.display === '';
    scanArea.style.display = isScanAreaHidden ? 'block' : 'none';
    scanAreaOverlay.style.display = isScanAreaHidden ? 'block' : 'none';
    setTimeout(function() {
        showConfirmationDialog('open').then((result) => {
            if (result.isConfirmed) {
                $('#start-scan').trigger("click");
            }
        });
	    }, 2000);
    
    
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
    //alert('Your ajax work here : '+data);
    var qr_code = data;
    //  scanner.stop();
    // window.location.reload();
    // alert(qr_code);
    // alert('<?=base_url() ?>'');
            $.ajax({
                url : "https://holider.com/demo/employee/verify_voucher",
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
   // checkDeviceWithVoucher('04:d7:1b:42:fd:16:90'); 
    //return false;
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
    $('#nfcVoucherModal').modal('show');
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
				// beforeSend: function() {
				// 	$('#body-preloader').css('display', 'block');
				// },
                success : function(res)
                {
					// $('#body-preloader').css('display', 'none');
                    if(res.status==true){
                    var htm = '<img src="<?php echo base_url();?>desktop_assets/images/success_icon.png" width="50px" class="mb-2"><br>';
                     htm +='<span class="f-Poppins fw-600 fs-20 text-green"><?php echo lang("success")?></span><br>';
                     htm +='<span class="f-Poppins voucher-charged">'+res.message+'</span>';
                  }else{
                    var htm = '<img src="assets/images/failed_icon.png" width="50px" class="mb-2"><br>';
                     htm +='<span class="f-Poppins fw-600 fs-20 text-red"> <?php echo lang("Failed!")?> </span><br>';
                     htm +='<span class="f-Poppins voucher-charged">'+res.message+'</span>';
                  }
                  $('#nfcVoucherModal').modal('hide');
                  $('.success-section').html(htm); 
                }
            });
            }
        });
    });
    $("#close-btn").click(function(){
            $('#nfcVoucherModal').modal('hide');
        });
});

</script>