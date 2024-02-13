<style>
.position-absolute{
    position:absolute !important;
}
.location-con button img {
    width: calc(16*var(--aspect-ratio));
    height: calc(17*var(--aspect-ratio));
}
.main-section {
    width: 100%;
    height: 100vh;
    padding: 0 !important;
}
    </style>

        <div class="contact-container">

            <div class="con-sec position-relative">
                <div class="main-img">
                    <img src="<?php echo base_url() ?>assets/images/aa.webp" alt="">
                </div>
                <div class="bg-con position-absolute"></div>
                <div class="bg-text position-absolute">
                    <button class="head-con" style="width:auto;margin-bottom: 10px;"><?= lang('contact_us'); ?></button>
                </div>

                <div class="con-detail-box position-absolute">
                    <div class="box-c">
                        <div class="box-head">
                            <h3><?= lang('get_in_touch'); ?></h3>
                        </div>

                        <div class="info-con">
                            <div class="location-con">
                                <button>    
			    		<img src="<?php echo base_url() ?>desktop_assets/images/whatsap_icon.png" width="40px" class="icon-media">
                                </button>
                                <span class="l-t">+1 (332) 242-644</span>
                            </div>

                            <div class="mail-con">
                                <button>
                                    <img src="<?php echo base_url() ?>assets/images/mail-white.png" alt="">
                                </button>
                                <span class="m-t">info@holider.com</span>
                            </div>

                            <div class="call-con">
                                <button>
                                    <img src="<?php echo base_url() ?>assets/images/call-white.png" alt="">
                                </button>
                                <span class="c-t">+33767049930</span>
                            </div>
                        </div>

                        <!-- <div class="social-section">
                            <button class="fb-btn">
                                <img src="<?php echo base_url() ?>assets/images/facebook-app-symbol(1).png" alt="">
                            </button>

                            <button class="in-btn">
                                <img src="<?php echo base_url() ?>assets/images/instagram.png" alt="">
                            </button>

                            <button class="wh-btn">
                                <img src="<?php echo base_url() ?>assets/images/whatsapp.png" alt="">
                            </button>

                            <button class="li-btn">
                                <img src="<?php echo base_url() ?>assets/images/linkedin.png" alt="">
                            </button>
                        </div> -->
                    </div>
                </div>

                <div class="adding-box">
                    <div class="a-box">
                        <div class="a-heading">
                            <h3><?php echo lang('send_us_message')?></h3>
                        </div>
                        <div class="input-detail">
							<form id="contactUsForm"  name="myForm" class="form" action="javascript:;" onsubmit="return validateForm()" method="POST" role="form">
								<div class="mb-3">
									<label for="exampleFormControlInput1" id="nameLabel" class="form-label"><?php echo lang('name')?>:</label>
									<input type="name" class="form-control" name='name' id="name">
								</div>
							
								<div class="mb-3">
									<label for="exampleFormControlInput2" id="emailLabel" class="form-label"><?php echo lang('email')?>:</label>
									<input type="email" class="form-control" name='email' id="email">
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput3" id="subjectLabel" class="form-label"><?php echo lang('subject')?>:</label>
									<input type="text" class="form-control" name='subject' id="subject">
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput4" id="messageLabel" class="form-label"><?php echo lang('message')?>:</label>
									<input type="message" class="form-control form-control-lg" name='text' id="message">
								</div>
								<div class="adding-btn">
									<button type="submit" class="send-m-btn"><?php echo lang('send_message')?></button>
								</div>
							</form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

		<script>
    // $(document).ready(function () {
    //     $('#contactUsForm').submit(function (e) {
    //         e.preventDefault();
    //         if (!validateForm()) {
    //             return;
    //         }
    //         var formData = $(this).serialize();
    //         $.ajax({
    //             type: 'POST',
    //             url: '<?= base_url('home/saveContectUs') ?>',
    //             data: formData,
    //             success: function (response) {
    //                 new Noty({
    //                     type: 'success',
    //                     text: 'Form submitted successfully!',
    //                     timeout: 3000 // milliseconds
    //                 }).show();
	// 				$('#contactUsForm')[0].reset();
    //             },
    //             error: function (error) {
    //                 console.log(error);
    //                 new Noty({
    //                     type: 'error',
    //                     text: 'Error submitting form. Please try again.',
    //                     timeout: 3000 // milliseconds
    //                 }).show();
    //             }
    //         });
    //     });

    //     function validateForm() {
    //         var name = $('#contactUsForm [name="name"]').val();
    //         var email = $('#contactUsForm [name="email"]').val();
    //         var subject = $('#contactUsForm [name="subject"]').val();
    //         var message = $('#contactUsForm [name="text"]').val();

    //         if (!name) {
    //             // Display an error message for the "Name" field using Noty.js
    //             new Noty({
    //                 type: 'error',
    //                 text: 'Please enter your name.',
    //                 timeout: 3000 // milliseconds
    //             }).show();
    //             return false;
    //         }

    //         if (!email) {
    //             // Display an error message for the "Email" field using Noty.js
    //             new Noty({
    //                 type: 'error',
    //                 text: 'Please enter your email address.',
    //                 timeout: 3000 // milliseconds
    //             }).show();
    //             return false;
    //         }

    //         if (!subject) {
    //             // Display an error message for the "Subject" field using Noty.js
    //             new Noty({
    //                 type: 'error',
    //                 text: 'Please enter a subject.',
    //                 timeout: 3000 // milliseconds
    //             }).show();
    //             return false;
    //         }

    //         if (!message) {
    //             // Display an error message for the "Message" field using Noty.js
    //             new Noty({
    //                 type: 'error',
    //                 text: 'Please enter your message.',
    //                 timeout: 3000 // milliseconds
    //             }).show();
    //             return false;
    //         }

    //         // You can add more specific validation if needed

    //         return true;
    //     }
    // });

	function validateForm() {
    // var n = document.getElementById('phone').value;
    var n = document.getElementById('name').value;
    var e = document.getElementById('email').value;
    var s = document.getElementById('subject').value;
    var m = document.getElementById('message').value;
    var onlyLetters =/^[a-zA-Z\s]*$/; 
    var onlyEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
	// document.getElementById('subjectLabel').innerHTML ='';
	// document.getElementById('emailLabel').innerHTML ='';
	// // document.getElementById('phoneLabel').innerHTML ='';
	// document.getElementById('messageLabel').innerHTML ='';
	$('.message').html('');
    var send = '<?php echo lang("your_information_has_been_sent_to_admin_successfully")?>';
    var error = '<?php echo lang("something_went_wrong")?>';
    	
	if(n == "" || n == null){ 
        document.getElementById('nameLabel').innerHTML ='';
        document.getElementById('nameLabel').innerHTML = ('<?php echo lang("please_enter_your_name")?>');
        document.getElementById('name').style.borderColor = "red";
        return false;
    }
	else{
		document.getElementById('nameLabel').innerHTML ='';
        document.getElementById('nameLabel').innerHTML = ('<?php echo lang("name")?>');
		document.getElementById('name').style.borderColor = "#4d767ea4";
	}

    if(e == "" || e == null ){
          document.getElementById('emailLabel').innerHTML ='';
          document.getElementById('emailLabel').innerHTML = ('<?php echo lang("please_enter_your_email")?>');
          document.getElementById('email').style.borderColor = "red";
          return false;
      }	
	else{
		document.getElementById('emailLabel').innerHTML ='';
        document.getElementById('emailLabel').innerHTML = ('<?php echo lang("email")?>');
		document.getElementById('email').style.borderColor = "#4d767ea4";
	}
  
    if (!e.match(onlyEmail)) {
        document.getElementById('emailLabel').innerHTML ='';
        document.getElementById('emailLabel').innerHTML = ('<?php echo lang("please_enter_a_valid_email_address")?>');
        document.getElementById('email').style.borderColor = "red";
        return false;
    }
	else{
		document.getElementById('emailLabel').innerHTML ='';
        document.getElementById('emailLabel').innerHTML = ('<?php echo lang("email")?>');
		document.getElementById('email').style.borderColor = "#4d767ea4";
	}

	if(s == "" || s == null ){
          document.getElementById('subjectLabel').innerHTML ='';
          document.getElementById('subjectLabel').innerHTML = ('<?php echo lang("please_enter_your_subject")?>');
          document.getElementById('subject').style.borderColor = "red";
          return false;
      }
	else{
		document.getElementById('subjectLabel').innerHTML ='';
        document.getElementById('subjectLabel').innerHTML = ('<?php echo lang("subject")?>');
		document.getElementById('subject').style.borderColor = "#4d767ea4";
	}

    if (!s.match(onlyLetters)) {
        document.getElementById('subjectLabel').innerHTML ='';
        document.getElementById('subjectLabel').innerHTML = ('<?php echo lang("please_enter_only_letters")?>');
        document.getElementById('subject').style.borderColor = "red";
        return false;
    }
	else{
		document.getElementById('subjectLabel').innerHTML ='';
        document.getElementById('subjectLabel').innerHTML = ('<?php echo lang("subject")?>');
		document.getElementById('subject').style.borderColor = "#4d767ea4";
	}
	


  
    if(m == "" || m == null){
        document.getElementById('messageLabel').innerHTML ='';
        document.getElementById('messageLabel').innerHTML = ('<?php echo lang("please_enter_your_message")?>');
        document.getElementById('message').style.borderColor = "red";
        return false;
    }
    else {
        $.ajax({
            type: "POST",
            url:  "https://biz1.co.il/api.php?api=add_lead&api_token=GC8RUZ98QWERT&source=somply&subject="+s+"&email="+e+"&message="+m+"&phone="+n,
			dataType:'json',
			beforeSend: function() {
               $('.loader').show();
            },
            success: function(result) {
               	if(result.success==true){
					$('.loader').hide();
					$('#contactUsForm').trigger("reset");
					$('.message').html('<div class="alert alert-success" role="alert">'+send+'</div>');
					$('#messageLabel').html('');
					$('#messageLabel').html('<?php echo lang("message")?>');
					$('#message').css('borderColor', '#4d767ea4');
				} else {
					$('.loader').hide();
					$('#contactUsForm').trigger("reset");
					$('.message').html('<div class="alert alert-danger" role="alert">'+error+'</div>');
				}
            }
		});
    }
    return false;  
}
</script>

   