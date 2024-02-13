<style>
    #cl-imgs{
      width: calc(12*var(--aspect-ratio));
    height: calc(12*var(--aspect-ratio));
    }
    #clsimg{
        width: calc(16*var(--aspect-ratio));
    height: calc(10*var(--aspect-ratio));
    }
 #closeButton{
   
    margin-top: -313px;
    margin-left: 91%;
    padding: 1px;
    font-size: 13px; 

    }
   #closebtn {
      margin-top: -110px;
    margin-left: 91%;
    padding: 1px;
    font-size: 13px;
    background: transparent;
    }
   #myInput{ 
		margin-top: 31%;
		width: 100%;
   }
  .af-li-item{
		min-height: auto;
		max-height: 450px;
		overflow-y: auto;
		display: block;
  }
  .th-buttons h1{
	font-size: 15px;
    margin-top: 0px;
    font-weight: 700;
  }
  #qrImage{
	margin-top: 35px;
  }

</style>
<body>
<?php
		$user_id = $this->session->userdata('id');
		$condition = array('conditions' => ['id' => $user_id ]);
		$affilator = $this->QueryModel->selectSingleRow('users' ,$condition);
		$default_currency = $affilator['default_currency'];
	?>
    <div class="main-section">
        <div class="af-container">
        <div class="th-buttons">
                <div class="button-align">
                    <button class="g-link" id="generate_link" ><?php echo lang('generate_link') ?></button>
                    <button class="g-qr" id="add_qr"><?php echo lang('generate_qr') ?></button>
                    <button class="a-devide"  id="scanButton"><?php echo lang('add_device') ?></button>
                </div>
                
                <?php if($userData['nfc_serial_number']!=''){ ?>
                <h1 class="mt-5 text-center dev-data"> 
                	 <?php echo lang('your_registered_device_is'); echo ': '.$userData['nfc_serial_number'];?>
                </h1>
                <?php
                }
                ?>  
                
            </div>
            <div id="output" class="output" style="margin-top: 35px;">  
                <div id="content"><?php ?></div>
                <div id="status" class="text-center"></div>
            </div>
            <div class="nefdevice-serial" style="display:none;margin: 20px;"> 
                    <textarea id="nefdevice-serial" name="nefdevice-serial" rows="4" cols="44">
                    </textarea>
                    <input type="button" value="<?= lang('submit') ?>" class="btn btn-primary <?php echo $this->agent->is_mobile()?'':'mt-2'?>" id="nefdevice_register_btn">
                </div>
            <div class="gen-list">
                <button class="gen1">
                    <h5><?php echo lang('gen')?>1</h5>
                    <span><?php 
                    if(!empty($totalCommission)){
                    $formattedNumber = (number_format($totalCommission->amount, 2)); echo get_currency($formattedNumber,$default_currency); 
                    }else{
                        echo 0;
                    }
                    ?></span>
                </button>
                
            </div>

            <div class="af-table">
                <table class="af-li-item">
					<thead>
						<tr class="af-list">
							<th class="al-item1" style="width: 15%;"><?php echo lang('name')?></th>
							<th class="al-item2" style="width: 40%;"><?php echo lang('offer_name')?></th>
							<th class="al-item2" style="width: 15%;"><?php echo lang('commissions')?></th>
							<th class="al-item3" style="width: 15%;"><?php echo lang('date')?></th>
							<th class="al-item4" style="width: 15%;"><?php echo lang('discount')?></th>
						</tr>
					</thead>
					<tbody class="list_section">
					<?php foreach($affiliatorCommissionList as $list) { ?>
						<tr class="af-main-list">
							<td class="af-item1" style="width: 15%;"><?php echo get_translation($list->username); ?></td>
                            <td class="af-item2" style="width: 40%;"><?php echo get_translation($list->offer_detail); ?></td>
							<td class="af-item3" style="width: 15%;"><?= get_currency($list->amount,$default_currency); ?> </th>
							<td class="af-item4" style="width: 15%;"><?= date('m/d/y',strtotime($list->created_at)); ?></th>
							<td class="af-item5" style="width: 15%;">5%</th>
						</tr>
					<?php } ?>
					</tbody>
                </table>
                
            
                <div class="scan-area-overlay"></div>
                <div class="scan-area" id="qrModal">
                    <div class="det-scan">
                    <div class="link-head-btn">
                            <!-- <button class="close-link">
                                <img src="images/close-white.png" alt="">
                            </button>
                        </div> -->
                        
                    </div>
                </div>


            </div> 
        </div>
</div>
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
                
                // var htm = '<a href="' + data.url + '" download><img id="qrImage" src="' + data.url + '" alt="QR Code"></a>';
                // var htm = '<a href="affiliator_qr/'+data.name+'" download>';
                var htm = '<a href="' + data.url + '" download>';

                   htm += '<img id="qrImage" src="'+data.url+'" alt="QR Code" >';
                   htm += '</a>'; 
                   htm += '<input type="text" id="myImage" value="'+data.link+'"alt="">'; 
                   htm += '<button   onclick="downloadimg()" class="link-c" style="width:auto;"><?php echo lang('copy_link'); ?></button>';
                   htm += '<button  id="closeButton" class="btn btn-secondary"> <img src="<?php echo base_url("assets/images/btn-close.png");  ?>" id="clsimg" alt=""></button>';
                //    htm += '<button id="closeButton" class="close-qr"><?php echo lang('close'); ?></button>';
            

            
                
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
                var htm = '<span>'+data.url+'</span>';
                   htm += '<button id="closebtn" class="btn btn-secondary"><img src="<?php echo base_url("assets/images/btn-close.png"); ?>" id="cl-imgs" alt=""></button>';
                //    htm += '<button id="closebtn" class="btn btn-secondary "><img src="<?= base_url() ?>assets/images/close-white.png" alt=""></button>';
                   htm += '<input type="text" id="myInput" value="'+data.url+'"alt="">'; 
                   htm += '<button   onclick="myFunction()" class="link-c" style="width:auto;"><?php echo lang('copy_link'); ?></button>';
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

scanButton.addEventListener("click", async () => {
  $('#status').text('');
  $('#content').text('');
  $('#status').text("You clicked scan button");   
  try {
    const ndef = new NDEFReader();
    await ndef.scan();   
    $('#status').text("> Scan started");

    ndef.addEventListener("readingerror", () => {
    //   $('#status').text("Argh! Cannot read data from the NFC tag. Try another one?");
      $('#status').text('<?php echo lang("referenceerror_ndefreader_not_defined"); ?>');

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
                                beforeSend: function() {
				$('#body-preloader').css('display', 'block');
								},
                success : function(res)
                { 
  		         	$('#body-preloader').css('display', 'none');
                    if(res.status == true)
                    {
                       $('#status').text(res.Message);
                    }
                    else{
                        $('#status').text(res.Message);
                    }
                }
            });
	    $('#body-preloader').css('display', 'none');
    });
  } catch (error) {
  $('#body-preloader').css('display', 'none');
    //$('#status').text('<?php echo lang("referenceerror_ndefreader_not_defined")?>');
    $('#status').text('<?php echo lang("ndefreader_is_not_defined_or_not_supported_please_add_device_in_text_area"); ?>');
    $('.nefdevice-serial').show();
  }
  $('#nefdevice_register_btn').on('click',function(){
            var nefdevice = $('#nefdevice-serial').val();
            var serialNumber = $.trim(nefdevice);
            if (serialNumber === "") {
                $('#status').text("input_is_blank_or_contains_only_whitespace");
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
                                    //$('#status').text(res.Message);
                                    $('#nefdevice-serial').val('');
                                    $('.nefdevice-serial').hide();
                                } else {
                                    $('#status').text(res.Message);
                                }
                            }
                });
            }
            
        })
});
</script>
