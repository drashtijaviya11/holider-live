<style>
    .refer-button-type{
        margin-top: 8%;
        margin-right: 22%;
    }
 
 
    .scan-area {
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
    
    z-index: 1;
    }
    #closeButton{
      position: absolute;
    top: 0;
    right: 0;
    margin:10px;
    
         
    }
   #closebtn {
    position: absolute;
    top: 0;
    right: 0;
    margin:10px;

    
    }
   #myInput{ 
    margin-top: 31%;
    width: 100%;
   }
   #textcopy{
    margin-top: 7%;
    width: 37%;
   }
   .det-scan{
    width: 30%;
    position: relative;
    height: calc(200*var(--aspect-ratio));
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: calc(10*var(--aspect-ratio));
    background: #FFF;
    box-shadow: 0px 0px 5px 1px rgba(0, 116, 141, 0.15);
    padding: 5%;
   }
   </style>
   <section class="pt-4">
  <div class="container"> 
    <div class="row">
	  <div class="col-lg-6"></div>
	  <div class="col-lg-6">
	    <div class="row mx-2">
		  <div class="col-lg-4 my-1">
		    <button class="gen-link-btn text-white rounded-2 fw-bold px-3 py-2 w-100" style="background-color: #009BBD;border: 3.4px solid #00D2FF;" id="generate_link"><?php echo lang('generate_link')?></button>
		  </div>
		  <div class="col-lg-4 my-1">
		    <button class="gen-link-btn text-white rounded-2 fw-bold px-3 py-2 w-100" style="background-color: #009BBD;border: 3.4px solid #00D2FF;" id="add_qr"><?php echo lang('generate_qr')?></button>
		  </div>
		  <div class="col-lg-4 my-1">
		    <button class="gen-link-btn text-white rounded-2 fw-bold px-3 py-2 w-100" style="background-color: #009BBD;border: 3.4px solid #00D2FF;" id="scanButton"><?php echo lang('add_device')?></button>
       
      </div>
      
      <?php if($userData['nfc_serial_number']!=''){ ?>
                <h1 class="mt-5 text-center dev-data" style="font-size:25px;"> 
                <?php
                echo lang('your_registered_device_is') . ' ' .$userData['nfc_serial_number'];
                ?>
                </h1>
                <?php
                }
                ?>
              <div id="output" class="output"> 
                <div id="content" style="margin:20px;"><?php ?></div>
                <div id="status" style="margin:20px;"></div>
              </div>
              <div class="nefdevice-serial" style="display:none;margin: 20px;"> 
                    <textarea id="nefdevice-serial" name="nefdevice-serial" rows="2" cols="74">
                    </textarea>
                    <br>
                    <input type="button" value="<?= lang("submit") ?>" class="btn btn-primary <?php echo $this->agent->is_mobile()?'':'mt-2'?>" id="nefdevice_register_btn">
            </div>
		</div>
	  </div>
	</div>
  </div>
</section>
<section>
<?php
		$user_id = $this->session->userdata('id');
		$condition = array('conditions' => ['id' => $user_id ]);
		$affilator = $this->QueryModel->selectSingleRow('users' ,$condition);
		$default_currency = $affilator['default_currency'];
	?>
  <div class="container-fluid">
    <div class="row pt-5">
      <div class="col-md-12">
        <div class="row px-4">
            <div class="col-lg-3 px-4 my-2 text-center">
              <div class="px-4 py-4 border box-light-2" style="background-color: #F1FBFF;">
                <button class="btn btn-bg-2 f-Poppins px-4 rounded-1"><?php echo lang('gen')?>1 : <?php 
                if(!empty($totalCommission) && $totalCommission->amount!=''){
                $formattedNumber = (number_format($totalCommission->amount, 2)); echo get_currency($formattedNumber,$default_currency); 
                }else{
                  echo 0;
                }
                ?>
                
              </button>
              </div>
              <div class="scan-area-overlay"></div>
                <div class="scan-area" id="qrModal">
                    <div class="det-scan">

                    </div>
                </div>
            </div>
            <div class="col-lg-9 my-2">
            <div class="table-responsive">
              <table class="table table-bordered text-center rounded-2">
                <thead>
                  <tr class="f-Poppins">
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"> <?php echo lang('name')?> </th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"> <?php echo lang('offer_name')?> </th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"> <?php echo lang('commissions')?> </th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"> <?php echo lang('date')?> </th>
                    <th class="text-sky fw-600 py-3 fs-20 table-text-media"> <?php echo lang('discount')?> </th>
                  </tr>
                </thead>
                <tbody>
									<?php foreach($affiliatorCommissionList as $list) { ?>
                  <tr>
                    <td class="bg-white fs-20 table-text-media fw-600" style="color:#8E8E8E;"><?php echo get_translation($list->username); ?></td>
                    <td><?php echo get_translation($list->offer_detail); ?></td>
                    <td class="bg-white text-sky fw-bold fs-20 table-text-media"><?= get_currency($list->amount,$default_currency); ?></td>
                    <td class="bg-white fs-20 table-text-media fw-600" style="color:#8E8E8E;"><?= date('m/d/y',strtotime($list->created_at)); ?></td>
                    <td class="bg-white fs-20 table-text-media fw-600" style="color:#8E8E8E;">5%</td>
                  </tr>
									<?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>
</section> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
       
    $(document).ready(function() {
    $('#add_qr').on('click', function() {
        $('.det-scan').html('');
            $.ajax({
            url : '<?php base_url()?>affiliator/generate_QRCode', 
            type: 'POST',
            dataType : 'json',
            success: function (data) {
     
      var htm = '<a href="' + data.url + '" download>';

htm += '<img id="qrImage" src="'+data.url+'" alt="QR Code" >';
htm += '</a>'; 
htm += '<input type="text" id="myImage" value="'+data.link+'"alt="">'; 
htm += '<button   onclick="downloadimg()" id="textcopy"><?php echo lang('copy_link'); ?></button>';
htm += '<button id="closeButton" class="btn btn-secondary"><?php echo  lang('close'); ?></button>';

$('.det-scan').html(htm);
showQRArea();

}
});
$(document).on('click','#closeButton', function() {
hideQRArea();

});
});
        $('#generate_link').on('click', function() {
        $('.det-scan').html('');
            $.ajax({
            url : '<?php base_url()?>affiliator/generate_refenceLink', 
            type: 'POST',
            dataType : 'json',
            success: function (data) {
                var htm = '<span style="font-size: 16px;margin:20px">'+data.url+'</span>';
                   htm += '<button id="closebtn" class="btn btn-secondary "><?php echo lang('close'); ?></button>';
            
                   htm += '<input type="text" id="myInput" value="'+data.url+'"alt="">'; 
                   htm += '<button   onclick="myFunction()" id="textcopy"><?php echo lang('copy_link'); ?></button>';
                $('.det-scan').html(htm);
                showQRArea();
            }
            });
        });
        $(document).on('click','#closebtn', function() {
            hideQRArea();  
            });
        $(document).on('click','#downloadButton', function() {
            // Get the image source
            var imageUrl = $('#qrImage').attr('src');
            window.open(imageUrl, '_blank');
        });
       
        
});

function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
}
function downloadimg() {
    var copyimg = document.getElementById("myImage");
    copyimg .select();
    copyimg .setSelectionRange(0, 99999); 
    navigator.clipboard.writeText(copyimg .value);
  
 }


 function showQRArea() {
   
   var saleContainer = document.querySelector('.af-containe');
   var scanArea = document.querySelector('.scan-area');
   var scanAreaOverlay = document.querySelector('.scan-area-overlay');
   var isScanAreaHidden = scanArea.style.display === 'none' || scanArea.style.display === '';
   scanArea.style.display = 'block';
    scanAreaOverlay.style.display = 'block';
//     scanArea.style.display = isScanAreaHidden ? 'block';
//     scanAreaOverlay.style.display = isScanAreaHidden ? 'block' : 'none';
}
function hideQRArea() {
var scanArea = document.querySelector('.scan-area');
var scanAreaOverlay = document.querySelector('.scan-area-overlay');
scanArea.style.display = 'none';
scanAreaOverlay.style.display = 'none';

}
</script>
<script>
scanButton.addEventListener("click", async () => {
  $('#status').text('');
  $('#content').text('');
  $('#status').text("<?php echo lang('you_clicked_on_scan_button') ?>");   
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
      $.ajax({
                url : "<?= base_url('affiliator/checkDevice') ?>",
                data : JSON.stringify({serialNumber:serialNumber}),  
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
								// beforeSend: function() {
								// 	$('#body-preloader').css('display', 'block');
								// },
                success : function(res)
                { 
									// $('#body-preloader').css('display', 'none');
                    if(res.status == true)
                    {
                       $('#status').text(res.message);
                    }
                    else{
                        $('#status').text(res.message);
                    }
                }
            });
    });
  } catch (error) {
    $('#status').text('<?php echo lang("ndefreader_is_not_defined_or_not_supported_please_add_device_in_text_area"); ?>');
      $('.nefdevice-serial').show();
  }
});
$('#nefdevice_register_btn').on('click',function(){
  $('#status').text('');
            var nefdevice = $('#nefdevice-serial').val();
            var serialNumber = $.trim(nefdevice);
            if (serialNumber === "") {
                $('#status').text("Input is blank or contains only whitespace.");
                return false;
            }else{
                var serialNumber = serialNumber; 
                $.ajax({
                            url: "<?= base_url('affiliator/checkDevice') ?>",
                            data: JSON.stringify({ serialNumber: serialNumber }),  
                            dataType: "json",
                            type: "POST",
                            contentType: false,
                            processData: false,
                            success: function(res) { 
                                if (res.status == true) {
                                    //$('#status').text(res.message);
                                    $('.dev-data').text(res.Message)
                                    $('#status').text('');
                                    $('#nefdevice-serial').val('');
                                    $('.nefdevice-serial').hide();
                                } else {
                                    $('#status').text(res.Message);
                                }
                            }
                });
            }
            
        })
</script>