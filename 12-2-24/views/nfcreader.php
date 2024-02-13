<style>
	.reg-device-container {
    width: 100%;
    height: auto;
    margin: 0 !important;
}

.reg-device-container .button-reg {
    width: 100%;
    height: calc(50*var(--aspect-ratio));
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.button-reg .dev-button {
    border: none;
    background: linear-gradient(180deg, #5EE2FF 0%, #00B5DC 8%, #00B5DC 92.5%, #60E3FF 100%);
    border: none;
    border-radius: calc(2*var(--aspect-ratio));
    width: 60%;
    height: 50%;
    color: #fff;
    font-size: calc(8*var(--aspect-ratio));
    font-weight: 600;
    font-family: "Rubik" ,sans-serif;
}

.device-data {
    width: 100%;
    height: calc(40*var(--aspect-ratio));
    margin-top: 10%;
    margin: auto;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 0% 2%;
    background: linear-gradient(180deg, #F5FDFF 0%, #ECFCFF 100%);
    box-shadow: 0px 1px 4px 0px rgba(77, 118, 126, 0.22);
    gap: 1%;
}

.device-data .dev {
    font-size: calc(7*var(--aspect-ratio));
    font-weight: 600;
    font-family: "Poppins" ,sans-serif;
    margin: 0 !important;
    color: #004B5B;
}

.device-data .dev-data {
    font-size: calc(6*var(--aspect-ratio));
    font-weight: 600;
    font-family: "Poppins" ,sans-serif;
    margin: 0 !important;
    color: #004B5B;
}
.det-scan .link-c {
    width: 60%;
    height: calc(20*var(--aspect-ratio));
    background: #00B5DC;
    color: #fff;
    border-radius: calc(2*var(--aspect-ratio));
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-weight: 600;
    border: none;
}
#textview{
 margin-left:1%
}
</style>
<div class="container">
	<div class="reg-device-container">
		<div class="button-reg">
				<button class="dev-button"><?= lang('register_device') ?></button>
		</div> 
        <div class="nefdevice-serial <?php echo $this->agent->is_mobile()?'':'text-center'?>" style="display:none"> 
            <textarea id="nefdevice-serial" name="nefdevice-serial" rows="4" cols="47">
            </textarea>
            <?php if ($this->agent->is_mobile()){
                
                }else{
                    echo "<br>"; 
                }?>
            <input type="button" value="<?php echo lang('submit') ?>" class="btn btn-primary <?php echo $this->agent->is_mobile()?'':'mt-2'?>" id="nefdevice_register_btn">
        </div>
        <div id="output" class="output"> 
            <div id="content" style="margin:20px;"><?php ?></div>
            <div id="status" style="margin-left: 14%;"></div>
        </div>
				<?php if($userData['nfc_serial_number']!=''){ ?>
					<div class="device-data"> 
						<h3 class="dev"><?= lang('registered_device') ?>:</h3>
                      
						<span class="dev-data"> <?php echo lang('your_registered_device_is') . ': ' . $userData['nfc_serial_number']; ?></span>
                <input type="hidden" class="myidcopy" id="myidcopy" value="<?= $userData['nfc_serial_number']; ?>">
                
					</div>
                   
          <!-- <div class="button-reg">
				<button class="dev-button"onclick="copy_id()"><?= lang('copy_device_id') ?></button>
		</div>   -->
				<?php
				}
				?>
              
	</div>
</div>
<script>
$(document).ready(function() {
            $('.dev-button').on('click', async function() {
                console.log("object");
                $('#status').text('');
                $('#content').text('');
                $('#status').text("<?php echo lang('user_clicked_scan_button'); ?>");

                try {
                    const ndef = new NDEFReader();
                    await ndef.scan();   
                    $('#status').text("> Scan started");

                    ndef.addEventListener("readingerror", function() {
                        $('#status').text("<?php echo lang('argh_cannot_read_data') ?>");
                    });

                    ndef.addEventListener("reading", function({ message, serialNumber }) {
                        var serialNumber = serialNumber; 
			//alert(serialNumber);
			//return falase;  
                        $.ajax({
                            url: "<?= base_url('dashboard/checkDevice') ?>",
                            data: JSON.stringify({ serialNumber: serialNumber }),  
                            dataType: "json",
                            type: "POST",
                            contentType: false,
                            processData: false,
                            success: function(res) { 
                                if (res.status == true) {
                                    //$('#status').text(res.message);
                                    $('.dev-data').text(res.message)
                                } else {
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
        });
        $('#nefdevice_register_btn').on('click',function(){
            var nefdevice = $('#nefdevice-serial').val();
            var serialNumber = $.trim(nefdevice);
            if (serialNumber === "") {
                $('#status').text("<?php echo lang('input_blank_or_whitespace'); ?>"); //"Input is blank or contains only whitespace.");
                return false;
            }else{
                var serialNumber = serialNumber; 
                $.ajax({
                            url: "<?= base_url('dashboard/checkDevice') ?>",
                            data: JSON.stringify({ serialNumber: serialNumber }),  
                            dataType: "json",
                            type: "POST",
                            contentType: false,
                            processData: false,
                            success: function(res) { 
                                if (res.status == true) {
                                    //$('#status').text(res.message);
                                    $('.dev-data').text(res.Message)
                                    $('#status').text(res.Message);
                                    $('#nefdevice-serial').val('');
                                    $('.nefdevice-serial').hide();
                                } else {
                                    $('#status').text(res.Message);
                                }
                            }
                });
            }
            
        })
function nfcdeviceTesting(){
  var serialNumber = '04:d7:1b:42:fd:16:90';   
      $.ajax({
                url : "<?= base_url('dashboard/checkDevice') ?>",
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
}
function copy_id() {
  var copyText = document.getElementById("myidcopy");
  copyText.select();
  // copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
}
</script>
