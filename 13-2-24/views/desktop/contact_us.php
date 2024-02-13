
<section id="contact-us-bg">
  <div class="container">
    <!-- ::Begin Heading section -->
    <div class="row contact-text">
      <div class="col-md-12 text-center">
        <span class="f-Playfair fw-bold fs-90 text-white pay-text"> <?php echo lang('contact_us'); ?> </span>
      </div>
    </div>
	<!-- ::End Heading section -->
    <br>
    <br>
	<!-- ::Begin Card section -->
    <div class="row pt-5">
      <div class="col-md-12">
        <div class="border-inner bg-white shadow-sm">
          <div class="row px-1">
		    <div class="col-md-6 p-5">
			  <h2 class="f-literata fw-600 text-sky-2 fs-40 send-text"><?php echo lang('send_us_message')?></h2><br>
			
        <form id="contact-form" name="myForm" class="form" action="javascript:;" onsubmit="return validateForm()" method="POST" role="form">
			     <div class="mb-3">
                   <label for="exampleInputEmail1" id="nameLabel" class="form-label f-poppins dark-blue-2 fs-24 label-text"><?php echo lang('name')?>:</label>
                   <input type="text" name="name" id="name" class="form-control rounded-0 " placeholder="<?php echo lang('enter_your_name')?>">
                 </div>
                 <div class="mb-3">
                   <label for="exampleInputEmail1" id="emailLabel" class="form-label f-poppins dark-blue-2 fs-24 label-text"><?php echo lang('email')?>:</label>
                   <input type="email" name="email" id="email" class="form-control rounded-0 "  placeholder="<?php echo lang('enter_your_email')?>">
                 </div>
				 <div class="mb-3">
                   <label for="exampleInputEmail1" id="subjectLabel"class="form-label f-poppins dark-blue-2 fs-24 label-text"><?php echo lang('subject')?>:</label>
                   <!-- <label class="form-label" id="subjectLabel" for="sublect"></label> -->

                   <input type="text" name="subject" id="subject" class="form-control rounded-0 " placeholder="<?php echo lang('your_subject')?>">
                 </div>
				 <div class="mb-3">
                   <label for="comment" id="messageLabel" class="form-label f-poppins dark-blue-2 fs-24 label-text"><?php echo lang('message')?></label>
                   <textarea class="form-control f-poppins rounded-0 " rows="5" id="message" name="text" placeholder="<?php echo lang('your_message')?>"></textarea>
                 </div>
                 <button type="submit" class="btn dark-blue-bg text-white w-100 f-poppins fw-600 rounded-0 sub-btn"><?php echo lang('send_message')?></button>
              </form>
            </div>
			<div class="col-md-6 right-box">
			  <br><br><br><br><br>
			    <h2 class="f-literata fw-600 text-sky fs-40 ps-5 get-text"><?php echo lang('get_in_touch')?></h2><br>
				<div class="row ps-5 py-2">
				  <div class="col-md-2 col-3 pe-0">
                    <img src="<?php echo base_url() ?>desktop_assets/images/whatsap_icon.png" width="40px" class="icon-media">
			      </div>
				  <div class="col-md-10 col-9 col-icon ps-0">
                    <p class="f-poppins fs-20 fw-500 icon-text">+1 (332) 242-6444</p>
			      </div>
				  
			    </div>
				<div class="row ps-5 py-2">
				  <div class="col-md-2 col-3 pe-0">
                    <img src="<?php echo base_url() ?>desktop_assets/images/message_icon.png" width="40px" class="icon-media">
			      </div>
				  <div class="col-md-10 col-9 col-icon ps-0">
                    <p class="f-poppins fs-20 fw-500 icon-text">info@holider.com</p>
			      </div>
			    </div>
				<div class="row ps-5 py-2">
				  <div class="col-md-2 col-3 pe-0">
                    <img src="<?php echo base_url() ?>desktop_assets/images/tell_icon.png" width="40px" class="icon-media">
			      </div>
				  <div class="col-md-10 col-9 col-icon ps-0">
                    <p class="f-poppins fs-20 fw-500 icon-text">+33767049930</p>
			      </div>
			    </div>
				<br><br><br>
				
			</div>
          </div>
        </div>
      </div>
    </div>
	<!-- ::End Card section -->
    <br>
    <br>
  </div>
</section> 
<!-- Include jQuery -->
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
		// 			$('#contactUsForm')[0].reset();
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
    var send = '<?php echo lang("your_information_has_been_sent_to_admin_successfully")?>!';
    var error = '<?php echo lang("something_went_wrong")?>!';
    	
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
            url:  "https://biz1.co.il/api.php?api=add_lead&api_token=M9196X5JJHUG7P524372&source=holider&subject="+s+"&email="+e+"&message="+m+"&phone="+n,
			dataType:'json',
			beforeSend: function() {
               $('.loader').show();
            },
            success: function(result) {
               	if(result.success==true){
					$('.loader').hide();
					$('#contact-form').trigger("reset");
					$('.message').html('<div class="alert alert-success" role="alert">'+send+'</div>');
					$('#messageLabel').html('');
					$('#messageLabel').html('<?php echo lang("message")?>');
					$('#message').css('borderColor', '#4d767ea4');

				} else {
					$('.loader').hide();
					$('#contact-form').trigger("reset");
					$('.message').html('<div class="alert alert-danger" role="alert">'+error+'</div>');
				}
            }
		});
    }
    return false;  
}
</script>
