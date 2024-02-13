<?php if($this->input->cookie('lang',true)  == 'hebrew'){ ?>
<style>

div#status {
    right: unset;
    left: 6%;
}
</style>
<?php } ?>
<style>
#status {
    /* margin: 20px; */
    color: #ef0000;
    /* margin-top: 1px; */
    position: absolute;
    z-index: 1;
    width: 330px;
    top: 10px;
    text-align: center;
    right: 6%;
}
.table{
		min-height: auto;
		max-height: 450px;
		overflow-y: auto;  /* Add a vertical scrollbar when content overflows */
		display: block;   /* Allow setting height and overflow */
	}
	        /* Custom scrollbar styles */
			.table::-webkit-scrollbar {
            width: 5px;
        }

        .table::-webkit-scrollbar-track {
            background: transparent;
        }

        .table::-webkit-scrollbar-thumb {
            background-color: transparent;
            border-radius: 20px;
            border: 3px solid #ced4da;
        }
	@media (min-width: 1200px) {
		.barcode-text {
    top: 28px;
    left: 40px !important;
    right: 40px !important;
}
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
		    <div class="col-md-9 px-4">
			  <div class="row">
			    <div class="col-md-6">
			      
				</div>
				<div class="col-md-6">
			      <div class="dropdown mt-3">
                    <!-- <button class="btn dropdown-toggle drop-toggle-2 w-100 text-start border-blue text-sky py-2 light-blue-bg fs-21 f-poppins" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      November
                  	<img src="<?php echo base_url();?>desktop_assets/images/down_arrow_icon.png" width="20px" class="float-end mt-2">
                    </button> -->
                    <select class="btn dropdown-toggle drop-toggle-2 w-100 text-start border-blue text-sky py-2 light-blue-bg fs-21 f-poppins" type="button" id="month_change" data-bs-toggle="dropdown" aria-expanded="false" id="month_change">
                   <img src="<?php echo base_url();?>desktop_assets/images/down_arrow_icon.png" width="20px" class="float-end mt-2">
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
				</div>
			  </div>
			  <br>
			  <div class="table-responsive">
			  <table class="table table-bordered text-center rounded-2" style="display: contents;">
                <thead>
                  <tr class="f-Poppins">
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('offer_name')?></th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('realized')?></th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('non_realized')?></th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('total_offer')?></th>
                  </tr>
                </thead>
                <tbody id="get_voucher_section">
                        
                </tbody>
              </table>
			 </div>
			</div>
			<div class="col-md-3 px-4 mt-2 position-relative col-media-3 text-center">
      <div id="output" class="output">
			           <div id="content" style="margin:20px;"></div>
			           <div id="status" ></div>
		  </div>
      <a href="javascript:;" class="f-poppins fw-600 position-absolute z-1 barcode-text nfcreader"><?php echo lang('nfc_reader')?></a>
			  
      <span class="text-sky f-poppins fs-20 fw-bold position-absolute z-1 barcode-text-2 mt-3"><?php echo lang('or')?></span>
			  <img src="<?php echo base_url();?>desktop_assets/images/scanner_sec.png" class="w-100 scanner-sec position-relative"><br>
			  <img src="<?php echo base_url();?>desktop_assets/images/barcode.png" class="barcode scanner-sec position-relative">
			  <div class="text-center border shadow-sm py-4 success-section">
			   <!-- <img src="<?php echo base_url();?>desktop_assets/images/success_icon.png" width="50px" class="mb-2"><br>
				<span class="f-Poppins fw-600 fs-20 text-green"><?php echo lang('success')?></span><br>
				<span class="f-Poppins voucher-charged"><?php echo lang('One_Boat_voucher_is_now_charged')?></span>-->
			  </div>
			</div>
		  </div>
		  <br>
		  <?php
				$user_id = $this->session->userdata('id');
				$condition = array('conditions' => ['id' => $user_id , 'type' => 'provider']);
				$provider = $this->QueryModel->selectSingleRow('users' ,$condition);
				$default_currency = $provider['default_currency'];
				$currency_code = $this->input->cookie('currency_code',true);
			?>
		<h2 class="f-Poppins fw-600 text-sky fs-40 detail-text ps-5"><?php echo lang('balance_details')?>:</h2>
			<hr class="line-six mt-4">
			<div class="row mx-1 py-2 rounded-2 border mx-4 my-5 align-items-center">
		      <div class="col-md-5 align-center py-1 condition-box-media">
		        <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?php echo lang('balance_to_be_paid')?>:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw-bold f-livvic fs-20 dark-blue-bg text-white px-4 py-1 fs-14"><?= get_currency($tobePaid,$default_currency); ?></span>
		      </div>
		      <div class="col-md-2 col-width-3 text-center"><div class="vr" style="height: 48px;"></div></div>
		      <div class="col-md-5 align-center py-1 condition-box-media">
		        <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?php echo lang('total_earnings')?>:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw-bold f-livvic fs-20 dark-blue-bg text-white px-4 py-1 fs-14"><?= getCurrencySymbol($currency_code).$credited_amount; ?></span>
		      </div>
		    </div>
		 <div class="row">
		   <div class="col-md-6">
		     <div class="row text-center mx-0 py-3" style="background-color:#EEFAFF;">
			   <div class="col-lg-6">
			     <p class="f-Poppins fs-20" style="color:#517a83;"><?php echo lang('contact_and_support')?></p>
			   </div>
			   <div class="col-lg-6">
			     <p class="f-Poppins fw-600 fs-20 text-sky text-decoration-underline">support@holider.com</p>
			   </div>
			 </div>
		   </div>
		   <div class="col-md-6">
		     <!--<hr class="line-sev mt-2">-->
		   </div>
		 </div>
		 <br><br><br>
		</div>
	  </div>
	</div>
	<br><br>
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
		if(items.length > 0){
			// Modify this based on your item structure
			$.each(items, function(index, item) {
				html += '<tr class="main-list">';
				html += '<td class="ml-item">'+ item.name +'</th>';
				html += '<td class="ml-item">'+ item.reedem_voucher +'</th>';
				html += '<td class="ml-item">'+ item.unreedem_voucher +'</th>';
				html += '<td class="ml-item">'+ item.total_sale_amount +'</th>';
				html += '</tr>';
			});
		}else{
			html += '<tr colspan="4" class="main-list">No Data Found</tr>';
		}

        return html;
    }

    // Load more items when user scrolls to the bottom
	$(".table").scroll(function() {
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
                url : "https://holider.com/demo/provider/verify_voucher",
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
function showConfirmationDialogNfc(action) {
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
    $('#nfcVoucherModal').modal('show');
}

$(document).ready(function(){
    $(document).on('click','.voucherApply',function(){
        var qr_code = $(this).val();
        showConfirmationDialogNfc().then((result) => {
            if (result.isConfirmed) {
              $('.success-section').html('');
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
                   //window.location = res.url;
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
        $("#close-btn").click(function(){
            $('#nfcVoucherModal').modal('hide');
        });
       
});
</script>