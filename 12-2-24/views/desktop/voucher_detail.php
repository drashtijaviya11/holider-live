<style>


.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    /* background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    position: relative; */

	background-color: #fefefe;
    margin: auto; 
    margin-top: 10%; 
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    position: relative;
}

.close {
    position: absolute;
    top: 0px;
    background: red;
    right: 0px;
    width: 32px;
    text-align: center;
    border-radius: 2px 5px 2px 2px;
    font-size: 20px;
    cursor: pointer;
}

form {
    display: flex;
    flex-direction: column;
}
button.next_voucher_btn {
    border: 0px;
    border-radius: 10px;
    text-align: center;
    padding: 5px;
    color: #fff;
    background: #0e9fbe;
    font-weight: bold;
}
label {
    margin-bottom: 8px;
}

input, .open-modal-btn {
    margin-bottom: 16px;
    padding: 10px;
    font-size: 16px;
}

.open-modal-btn,.sub-modal-btn {
    width: 100%;
    font-weight: 600;
    background: #EEFAFF;
	cursor: pointer;
	border: none;
    border-radius: 5px;
}

.open-modal-btn:hover {
    background-color: #c2e5f3;
}
.model_head{
	text-align: center;
    background: #c2e5f3;
    width: 97%;
	padding: 5px;
}

		/* chat accordian */

		.chat-accordion {
            width: 100%;
			text-align: center;
			font-weight: 600;

        }

        .chat-accordion-section {
            /*border: 1px solid #ccc;*/
            margin-bottom: 5px;
            background-color: #fff;
			overflow: scroll;
			margin-top: 10px;
			max-height: 300px;

        }

        .chat-accordion-header {
            background-color: #EEFAFF;
			color: #333;
            padding: 10px;
            cursor: pointer;
			/* position: absolute; */
    		width: 100%;
            background: linear-gradient(180deg, #5EE2FF 0%, #00B5DC 8%, #00B5DC 92.5%, #60E3FF 100%);
            border: none;
            border-radius: calc(2*var(--aspect-ratio));
        }

        .chat-accordion-content {
            display: block;
            padding: 10px;
			margin-top: 30px;
        }

        .chat-message {
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            max-width: 70%; /* Adjust as needed */
        }

        .sender-message {
			width: 100%;
            background-color: #b4e7fc;
            color: #333;
            float: right;
        }

        .receiver-message {
			width: 100%;
            background-color: #ddd;
            color: #333;
            float: left;
        }
</style>
<section id="voucher-datails-bg">
  <div class="container">
    <div class="row voucher-text">
	  <div class="col-md-12 ps-5">
	  <?php 
                                if(strlen($voucher['offer_name']) > 20) {
                                    $cUname = mb_substr(get_translation($voucher['offer_name']), 0, 64,'UTF-8');
                                } else {
                                    $cUname = get_translation($voucher['offer_name']);
                                }
                            ?>
                        
		<span class="f-Poppins fw-600 fs-58 text-white free-boat-text"><?= $cUname; ?></span><br>
		<span class="f-Moderno fw-600 fs-27 text-white amount-text"><?= get_currency($voucher['price'],$voucher['currency_type']) ?></span>
      </div>
    </div>
	<br><br>
	<div class="row pt-5">
	  <div class="col-md-12">
	    <div class="border bg-white shadow-sm rounded-2 py-5">
	      <div class="row row-media-2">
		    <div class="col-md-8">
			
			  <h2 class="f-Poppins fw-bold fs-50 my-special-text ps-5">
			
				<?php $condition = array('conditions' => ['id' => $voucher['offer_id']]); ?>
				<?php $data = $this->QueryModel->selectSingleRow('offer',$condition); ?>
				<?php if(!empty($data['special_offer'])){ ?>
			       <?php  echo  get_special_offer($data['special_offer']); ?>
				   <?php } ?>
			  </h2>
			  <hr class="line-fiv mt-4">
			 
			</div>
			<?php if($voucher['status'] == 'unreedem'){ ?> 
			<div class="col-md-4 px-4 position-relative col-media-3 text-center scanner-img">

			  <img src="<?php echo base_url(); ?>desktop_assets/images/scanner_sec.png" class="w-100 max-w-275 scanner-sec position-relative box-light-3 rounded-1"><br>
			  <p class="nfcreader" style="position: absolute;
    top: 0;
    color: #000;
    font-weight: bold;
    text-align: center;
    left: 12%;"><?php echo lang('nfc_reader')?></p>
			  <p style="position: absolute;
    top: 25px;
    color: #000;
    font-weight: bold;
    text-align: center;
    left: 45%;"><?= lang('OR')?></p>
			  <p class="QrCodeReader" id="start-scan" style="position: absolute;
    top: 50;
    color: #000;
    font-weight: bold;
    text-align: center;
    left: 43%;"><?php echo lang('scan_qr') ?></p>
			  <img src="<?= base_url().$voucher['qr_image']; ?>" class="barcode scanner-sec position-relative">
			  <p style="position: absolute;top: 75%;left: 30%;color: fff;font-weight: bold;"><?= $voucher['voucher_code']; ?></p>
			</div>
			<?php } else { ?>
				<div class="col-md-4 px-4 position-relative col-media-3 text-center scanner-img">
				<div class="re-scan" style="margin-top: 200px;">
					<h2 style="color:red"><?= lang('voucher_used'); ?></h2> 				
				</div>
				</div>
			<?php } ?>
            <?php 
				$condition = array('conditions' => ['id' => $voucher['offer_id']]);
				$offers = $this->QueryModel->selectSingleRow('offer',$condition);

                $provider_con = array('conditions' => ['id' => $voucher['provider_id']]);
                $provider =$this->QueryModel->selectSingleRow('users',$provider_con);
                
                $redeem_con = array('conditions' => ['offer_purchase_id' => $voucher['offer_purchase_id'],'status'=>$voucher['status']]);
                $next_voucher_redeem =$this->QueryModel->selectData('vouchers',$redeem_con);
                $next_voucher_count= count($next_voucher_redeem);
                print_r($next_voucher_count);
			?>
            <?php if($next_voucher_count > 1){ 
                foreach($next_voucher_redeem as $next_voucher_redeem_id){ 
                    if($next_voucher_redeem_id['id'] !=$voucher['id']){
                    ?>
                <div class="col-md-12 px-4 position-relative col-media-3 text-end scanner-img">
				<div class="re-scan">
                <a href="<?php echo base_url();?>dashboard/get_voucher_detail/<?php echo $next_voucher_redeem_id['id']; ?>"><button class="next_voucher_btn"><?= lang('next_voucher'); ?></button></a>		
				</div>
				</div>
                
                
            <?php  break; }} } ?>
            
		  </div>
          
			<h2 class="fs-40 f-Poppins fw-600 text-sky pt-5 detail-text ps-5"><?= lang('voucher_details')?></h2>
			<br>
			
			<p class="f-poppins fs-22 lorem-text px-5"><?= get_translation_desc($offers['details']); ?></p><br>
		    <h2 class="f-Poppins fw-600 text-sky fs-40 detail-text ps-5"><?= lang('con_detail');?></h2>
			<hr class="line-six mt-4">
			<div class="row mx-1 py-2 rounded-2 border mx-4 my-5 align-items-center">
			<?php if(!empty($provider['email'])){ ?>
				<div class="col-md-3 col-width-2 align-center py-1 condition-box-media">
					<img src="<?php echo base_url(); ?>desktop_assets/images/email.png" class="offer-img-media-2" width="15px" style="margin-top:-10px;"> <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?= $provider['email'] ?></span>
				</div>
				<div class="col-md-1 col-width-1 text-center"><div class="vr" style="height: 48px;"></div></div>
				<?php } ?>
		   <?php if(!empty($provider['phone'])){ ?>
				<div class="col-md-3 col-width-2 align-center py-1 condition-box-media">
					<img src="<?php echo base_url(); ?>desktop_assets/images/tell.png" class="offer-img-media-2" width="15px" style="margin-top:-10px;"> <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?= $provider['phone'] ?></span>
				</div>
				<div class="col-md-1 col-width-1 text-center"><div class="vr" style="height: 48px;"></div></div>
			<?php } ?>
		   <div class="col-md-3 col-width-2 align-center py-1 condition-box-media">
		     <img src="<?php echo base_url(); ?>desktop_assets/images/location.png" class="offer-img-media-2" width="15px" style="margin-top:-10px;"> <span class="f-poppins fw-600 ps-2 fs-20 offer-media-2"><?= lang('location'); ?></span>
		   </div>
		 </div>
		 <div class="row">
		   <div class="col-md-6">
		     <div class="row text-center mx-0 py-3" style="background-color:#EEFAFF;">
			   <div class="col-md-6">
			     <p class="f-Poppins fw-600 fs-20"><?= lang('purch_d_and_t'); ?></p>
				 <span class="f-Poppins fw-600 fs-20 text-date"><?= $voucher['purchase_date'] ?></span>
			   </div>
			   <div class="col-md-6">
			     <p class="f-Poppins fw-600 fs-20"><?= lang('exp_date'); ?></p>
				 <span class="f-Poppins fw-600 text-date fs-20"><?= $voucher['expire_date'] ?></span>
			   </div>
			 </div>
		   </div>
		   <div class="col-md-6">
		     <hr class="line-sev mt-2">
		   </div>
		 </div>
		 <br><br><br>

		   <?php if(!empty($offers['terms_and_condition'])) { ?>
			<div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
						<button class="accordion-button collapsed f-poppins text-decoration-underline px-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
						
								<h2><?= lang('t_and_c'); ?></h2>
						</button>
						</h2>
							<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body">
										<ul>
										<li class="f-poppins"><?= get_trans_termcondition($offers['terms_and_condition']); ?></li><br>
										
										</ul>
									</div>
							</div>
				    </div>
            </div>
		   <?php } ?>
		</div>
		<div class="col-md-12">
			<div class="row">
				
				<div class="col-6">
						<div class="chat-accordion">
							<div class="chat-accordion-section">
								<div class="chat-accordion-header open-modal-btn" onclick="openModal()"><?= lang('contact_support'); ?></div>
								<div class="chat-accordion-content">
								<?php foreach($contactSupport_message as $contactSupport_data){?>
									<div class="chat-message sender-message"><?= $contactSupport_data['message']; ?></div>
									<?php foreach($contactSupport_messageReply as $reply){
										if($reply['parrent_id'] == $contactSupport_data['id']){ ?>
									<div class="chat-message receiver-message"><?= $reply['message'] ?></div>
									<?php }} ?>
									
									<?php } ?>
									<!-- Add more chat messages as needed -->
								</div>
							</div>
						</div>

				</div>
                <div class="col-6">
					<!-- <button class="open-modal-btn" onclick="openModal()"><?= lang('ask_question'); ?></button> -->
				</div>
			</div>
		</div>
	  </div>
	</div>
	<br><br>
  </div>
  <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h4 class="model_head"><?= lang('contact_support'); ?></h4>
			<p class=""><?= mb_substr(get_translation($voucher['offer_name']), 0, 64,'UTF-8') ?></p>
            <form action="<?= base_url('dashboard/contactSupport')?>" id="contactSupport">
				<input type="hidden" id="voucher_id" name="voucher_id" value="<?= $voucher['id'] ?>">
				<input type="hidden" id="offer_id" name="offer_id" value="<?= $voucher['offer_id'] ?>">
                <label for="name"><?= lang('message'); ?>:</label>
				<textarea id="message" class="require" name="message" rows="4" cols="50" placeholder="<?= lang('type_your_message_here')?>..."></textarea>

                <button class="sub-modal-btn" type="submit" style="margin-top: 20px;"><?= lang('submit'); ?></button>
            </form>
        </div>
    </div>
</section>
<script>
	function openModal() {
    document.getElementById('myModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('myModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}

$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault(); 
		var isValid = true;
        $('.require').each(function() {
            if ($(this).val().trim() === '') {
                isValid = false;
                return false; // exit the loop if any required field is empty
            }
        });

        if (!isValid) {
            new Noty({
                type: 'error',
                text: '<?php echo lang('please_fill_input_fields'); ?>',
                timeout: 3000,
            }).show();
            return;
        }
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
				$('#contactSupport').trigger("reset");
				$(".chat-accordion-content").append('<div class="chat-message sender-message">'+response.message+'</div>');
                console.log(response);
                closeModal();
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});

/* function toggleAccordion(header) {
        var content = header.nextElementSibling;

        Close all sections
        document.querySelectorAll('.chat-accordion-content').forEach(function(item) {
            if (item !== content) {
                item.style.display = 'none';
            }
        });

        Toggle the display of the selected section
        content.style.display = (content.style.display === 'block') ? 'none' : 'block';
    } */
</script>

