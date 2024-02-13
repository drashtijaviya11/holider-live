<style>
    .voucher_details{
        height: 50px;
    overflow: auto;
    }
	.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.btn-trf.text-center {
    display: block;
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

label {
    margin-bottom: 8px;
}

input, .open-modal-btn {
    margin-bottom: 16px;
    padding: 10px;
    font-size: 16px;
}

.open-modal-btn,.sub-modal-btn {
    width: 60%;
    font-weight: 600;
    background: #EEFAFF;
	cursor: pointer;
	border: none;
    border-radius: 5px;
}
.sub-modal-btn {
    width: 100%;
}

.open-modal-btn:hover {
    background-color: #c2e5f3;
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
            border: 1px solid #ccc;
            margin-bottom: 5px;
            background-color: #fff;
			overflow: scroll;
			/* margin-top: 30px; */
			max-height: 300px;

        }

        .chat-accordion-header {
            background-color: #EEFAFF;
			color: #333;
            padding: 10px;
            cursor: pointer;
			position: absolute;
    		width: 100%;
        }

        .chat-accordion-content {
            display: none;
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
        .re-scan img {
            width: calc(85*var(--aspect-ratio));
            height: calc(80*var(--aspect-ratio));
        }
        .main-ov .re-scan {
            width: 55%;
            height: calc(80*var(--aspect-ratio));
        }
        .voucher_code{
            padding-left: 6px;
            font-size: 16px;
        }
    </style>
        <div class="v-detail-container">
            
            <div class="heading">
                <button class="m-voucher"  onclick="goBack()">
                    <img src="<?= base_url(); ?>assets/images/arrow-blue.png" alt="">
                    <div class="m-te"><?= lang('offer_detail');?></div>
                </button>
            </div>

            <div class="main-ov">
                <div class="id-sec">
                    <?php  $image = json_decode($voucher['image'], true); ?>
                    <img src="<?= base_url().$image[0]['url']; ?>" alt="">
                </div>
                <div class="i-text">
                    <div class="fi-text">
                    <?php 
                                if(strlen($voucher['offer_name']) > 20) {
                                    $cUname = mb_substr(get_translation($voucher['offer_name']), 0, 64,'UTF-8');
                                } else {
                                    $cUname = get_translation($voucher['offer_name']);
                                }
                            ?>
                        <h3><?= $cUname; ?></h3>

                        <span><?= get_currency($voucher['price'],$voucher['currency_type']) ?></span>
                    </div>
                    <?php 
                    $condition = array('conditions' => ['id' => $voucher['offer_id']]);
                    $offers = $this->QueryModel->selectSingleRow('offer',$condition);
                    $provider_con = array('conditions' => ['id' => $voucher['provider_id']]);
                $provider =$this->QueryModel->selectSingleRow('users',$provider_con);
                    ?>
                    <p class="voucher_details"><?= get_translation_desc($offers['details']); ?></p>
  
                </div>
					<?php $condition = array('conditions' => ['id' => $voucher['offer_id']]); ?>
				<?php $data = $this->QueryModel->selectSingleRow('offer',$condition); ?>
				<?php if(!empty($data['special_offer'])){ ?>
				<div class="ov-name">
                    <h2>
			       	<?php  echo  get_special_offer($data['special_offer']); ?>
				   </h2>
                </div>
				<?php } ?>

                <div class="cn-detail">
                    <div class="head-con">
                        <h3><?= lang('con_detail');?></h3>
                    </div>
                    <div class="det-con">
                        <?php if(!empty($provider['email'])){ ?>
                            <div class="mail">
                                <img src="<?= base_url(); ?>assets/images/email-icon.png" alt="">
                                <div class="mail-te"><?= $provider['email'] ?></div>
                            </div>
                        <?php } ?>
                        <?php if(!empty($provider['phone'])){ ?>
                            <div class="call">
                                <img src="<?= base_url(); ?>assets/images/call-icon.png" alt="">
                                <div class="call-te"><?= $provider['phone'] ?></div>
                            </div>
                        <?php } ?>
                        <?php if(!empty($provider['country'])){ ?>
                        <div class="loc">
                            <img src="<?= base_url(); ?>assets/images/location-icon.png" alt="">
                            <div class="loc-te">
                                <?php              
                                    $countryNameFound = false; foreach($country as $cntry) {
                                        if ($provider['country'] === $cntry['id']) {
                                            echo $cntry['name'];
                                            $countryNameFound = true;
                                            break;
                                        }
                                    }
                                    if (!$countryNameFound) { echo $provider['country']." , ";}
                                        $stateNameFound = false; foreach ($state as $sta) {
                                            if ($provider['state'] === $sta['id']) {
                                                echo $sta['name'];
                                                $stateNameFound = true;
                                                break;
                                            }
                                        }
                                    if(!$stateNameFound) {echo $provider['state'];} 
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>


                <div class="d-t-sec">
                    <div class="p-date">
                        <h4><?= lang('purch_d_and_t'); ?></h4>
                        <span><?= $voucher['purchase_date'] ?></span>
                    </div>

                    <div class="e-date">
                        <h4><?= lang('exp_date'); ?></h4>
                        <span><?= $voucher['expire_date'] ?></span>
                    </div>
                </div>

                <div class="re-scan">
                    <!-- <h2>Redeem Your Voucher</h2> -->
                    
                    <?php if($voucher['status']=='unreedem'){ ?>
                        <img src="<?= base_url().$voucher['qr_image']; ?>" alt="">
                        <span class="voucher_code"><?= $voucher['voucher_code']; ?></span>
                   <?php } else{ ?>
                        <h2 style="color:red"><?= lang('voucher_used'); ?></h2> 
                    <?php } ?>
                   
                </div>
                <?php $redeem_con = array('conditions' => ['offer_purchase_id' => $voucher['offer_purchase_id'],'status'=>$voucher['status']]);
                $next_voucher_redeem =$this->QueryModel->selectData('vouchers',$redeem_con);
                $next_voucher_count= count($next_voucher_redeem); ?>
                <?php if($next_voucher_count > 1){ 
                foreach($next_voucher_redeem as $next_voucher_redeem_id){ 
                    if($next_voucher_redeem_id['id'] !=$voucher['id']){
                    ?>
                    <div class="btn-trf text-center">
                        <a href="<?php echo base_url();?>dashboard/get_voucher_detail/<?php echo $next_voucher_redeem_id['id']; ?>"><button class="next_voucher_btn"><?= lang('next_voucher'); ?></button></a>			
				    </div>
                <?php break; }} } ?>
                <div class="btn-trf">
                    <button class="t-c-btn"><?= lang('t_and_c'); ?></button>

					<button class="refund-btn1 open-modal-btn" id="openSupportModel" onclick="openModal()"><?= lang('ask_question'); ?></button>
                </div>

					<div class="chat-accordion">
						<div class="chat-accordion-section">
							<div class="chat-accordion-header open-modal-btn" onclick="toggleAccordion(this)"><?= lang('contact_support'); ?></div>
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
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$("#openSupportModel").click(function(){
		console.log("open");
		$('#myModal').css('display', 'block');
	});

    function closeModal() {
        $('#myModal').css('display', 'none');
    }

    $(document).ready(function() {
        $(window).on('click', function(event) {
            var modal = $('#myModal');
            if (event.target === modal[0]) {
                modal.css('display', 'none');
            }
        });
    });


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
                text: '<?= lang('please_fill_input_fields') ?>',
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
				$(".chat-accordion-content").append('<div class="chat-message sender-message">'+response.message+'</div>');
				$('#contactSupport').trigger("reset");
                console.log(response);
                closeModal();
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});

function toggleAccordion(header) {
        var content = header.nextElementSibling;

        // Close all sections
        document.querySelectorAll('.chat-accordion-content').forEach(function(item) {
            if (item !== content) {
                item.style.display = 'none';
            }
        });

        // Toggle the display of the selected section
        content.style.display = (content.style.display === 'block') ? 'none' : 'block';
    }
</script>
