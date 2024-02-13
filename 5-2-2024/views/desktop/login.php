<style>
 .email-box::placeholder {
   font-size: 15px;
}
.btn-emaillogin{background: rgba(0, 53, 65, 0.75);
}
.email-btn:hover {background: rgba(0, 53, 65, 0.75) !important;}
.head-mail {
    width: 100%;
    height: calc(15*var(--aspect-ratio));
    display: flex;
    flex-direction: column;
    align-items: end;
}
.head-mail .e-close {
    width: calc(12*var(--aspect-ratio));
    height: calc(12*var(--aspect-ratio));
    border-radius: 50%;
    border: none;
    background: linear-gradient(180deg, #00A6CA 0%, #003440 100%);
}
.in-mail input {
    width: 100%;
    height: calc(15*var(--aspect-ratio));
    background-color: transparent;
    border-radius: calc(1*var(--aspect-ratio));
    border: 1px solid #00B5DC;
    padding-left: 2%;
    padding: 5px;
    margin-top: 10px;
}
.main-e .in-mail {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: start;
    gap: calc(5*var(--aspect-ratio));
}
.e-logo {
    width: 100%;
    height: calc(25*var(--aspect-ratio));
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.in-mail .h_email {
    text-align: center;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    color: #003541;
}
.send-e {
    width: 100%;
    height: calc(22*var(--aspect-ratio));
    background: rgba(0, 53, 65, 0.74);
    border-radius: calc(1*var(--aspect-ratio));
    border: none;
    color: #fff;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(8*var(--aspect-ratio));
    font-weight: 600;
    letter-spacing: 1px;
    margin-top:22px;
    padding: 8px;
}
#email_login_modal{ top: 25%;
    left: 22%;}
</style>
<section>
  <div class="container">
    <div class="row mt-5 box-light">
      <div class="col-lg-6 px-0" height="550px">
        <div class="bg-img-first">
		  <h1 class="text-white fw-bold f-Readex text-center pt-14 fs-65 media-text"><?php echo lang('welcome_back')?></h1>
		  <div class="row px-3 position-relative condition-item">
		    <div class="col-md-6 media col-media">
			  <a href="javascript:void(0);" class="f-poppins_1 text-white fs-5"><?php echo lang('privacy_policy')?></a>
			</div>
			<div class="col-md-6 align-end media col-media">
			  <a href="javascript:void(0);" class="f-poppins_1 text-white fs-5"><?php echo lang('t_and_c');?></a>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-6 text-center py-5">
        <a href="javascript:void(0);" class="f-poppins_1 text-dark fs-5"><?php echo lang('you_are_not_logged_in');?></a><br><br>
        <a href="//api.whatsapp.com/send?phone=13322426444&text=<?= lang('login') ?>" class="whatsapp-btn btn btn-green text-white f-poppins_1 fw-600 rounded-pill px-5 py-3 media-font" style="font-size: 25px;">
		<img src="<?php echo base_url(); ?>desktop_assets/images/whatsapp_icon.png" width="30px" class="me-3"><?php echo lang('login_with_wp');?></a><br><br>
		
		<div class="d-flex ps-7 or-line-media"><hr class="line-sec"><span class="px-2 or-text fw-600 opacity-100"> <?php echo lang('or')?></span><hr class="line-thir"></div><br>
		<p class="fw-600 f-poppins_1 text-decoration-underline" style="color:#00B5DC;"><?php echo lang('send_login_to_number');?><br> <?php echo '+1 (332) 242-6444';?></p><br>
		
		<div class="d-flex ps-7 or-line-media"><hr class="line-sec"><span class="px-2 or-text fw-600 opacity-100"> <?php echo lang('or')?></span><hr class="line-thir"></div><br>
		<!--<p class="fw-600 f-poppins_1 text-decoration-underline show_email_box" style="color:#00B5DC; cursor:pointer">Login With Email</p>-->
       
        <button class="email-btn btn btn-emaillogin text-white f-poppins_1 fw-600 rounded-pill px-5 py-3 media-font" style="font-size: 25px;">
		<img src="<?= base_url(); ?>assets/images/email.png" width="30px" class="me-3"><?php echo lang('login_with_email');?></button>
		<a href="javascript:void(0);" id="send_email_btn" class="btn hero-btn text-white fw-bold rounded-pill fs-6 px-4 py-1 send_mail" style="display:none"><?= lang('send') ?></a><br><br>
		
		<a href="javascript:void(0);" class="btn hero-btn text-white fw-bold rounded-pill fs-4 px-5 py-2 code_btn"><?php echo lang('i_got_the_code');?></a>
	    <div class="inputs d-flex flex-row justify-content-center mt-4 px-5 f-Moderno"> 
		  <!-- <input class="input-field text-center form-control rounded" type="text" value="0"  maxlength="1" /> 
		  <input class="input-field text-center form-control rounded" type="text" value="3"  maxlength="1" /> 
		  <input class="input-field text-center form-control rounded" type="text" value="0"  maxlength="1" /> 
		  <input class="input-field text-center form-control rounded" type="text" value="5"  maxlength="1" /> 
		  <input class="input-field text-center form-control rounded" type="text" value="3"  maxlength="1" /> 
		  <input class="input-field text-center form-control rounded" type="text" value="3"  maxlength="1" />  -->
		  <div class="in-otp">
                    <div class="otp" style="display:flex">
                        <!-- <input type="text">
                        <input type="text">
                        <input type="text">
                        <input type="text">
                        <input type="text">
                        <input type="text">   -->
                    </div>
                </div>
		</div>
	  </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="email_login_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="head-mail">
                <button class="e-close">
                    <img src="https://holider.com/demo/assets/images/close.png" alt="">
                </button>
            </div>
            <div class="modal-body">
            <div class="e-logo">
                <img src="<?= base_url(); ?>assets/images/img-logo.png" alt="">
            </div>
            <div class="main-e">
                <div class="in-mail">
                    <div class="h_email"><?= lang('email') ; ?></div>
                    <input type="text" class="login_email_input">
                </div>
                <button class="send-e send_mail"><?= lang('send') ; ?></button>
            </div>
            </div>
            </div>
        </div>
    </div>
  </div>
  
</section>
<script>
    $(document).ready(function() {
        $('.send_mail').click(function() {
            var email_id =$(".login_email_input").val();
			var email = $('.login_email_input').val().trim();
			var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

			if (email === '') {
				new Noty({
					text: '<?php echo lang('please_enter_your_email_address') ?>',
					type: 'error',
					timeout: 3000 // Adjust timeout as needed
				}).show();
				return;
			}

			if (!emailRegex.test(email)) {
				new Noty({
					text: '<?php echo lang('please_enter_valid_email_address') ?>',
					type: 'error',
					timeout: 3000 // Adjust timeout as needed
				}).show();
				return;
			}
            if(email_id !=''){
				$.ajax({
					url : "<?= base_url('dashboard/mail_otp') ?>",
					data : {email_id:email_id},
					dataType : "json",
					type : "POST",
					success : function(res){
						if(res.status == true) {
							new Noty({
								text: res.message,
								type: 'success',
								theme: 'sunset', 
								timeout: 2000,
								layout: 'topRight',
							}).show();
							setTimeout(function() {
								$('#email_login_modal').modal('hide');
								$(".code_btn").trigger('click');
								$('.in-otp').addClass('active');
							}, 1000);
						} else {
							new Noty({
								text: res.message,
								type: 'error',
								theme: 'sunset', 
								timeout: 2000,
								layout: 'topLeft',
							}).show();
						}
					}
				});
                }else{
                    new Noty({
                                        text: '<?php echo lang('please_enter_your_email_address') ?>',
                                        type: 'error',
                                        theme: 'sunset', 
                                        timeout: 2000,
                                        layout: 'topLeft',
                                    }).show();
                            
                }
        });
    $('.code_btn').click(function() {
        $('.in-otp').toggleClass('active');
        if ($('.in-otp').hasClass('active')) {
            $("#loginImage").attr("src", "<?= base_url(); ?>assets/images/login-new.png");
        } else {
            $("#loginImage").attr("src", "<?= base_url(); ?>assets/images/login-ng.png");
        }

        $('.otp').html('<input type="hidden" name="phone" value="">');
        for (let i = 1; i <= 9; i++) {
            const input = $('<input>').attr({
                class: "input-field text-center form-control rounded code_btn_box",
                type: 'text',
                maxLength: 1,
                name: 'otp[]'
            });
            $('.otp').append(input);
        }
        $('.code_btn_box:first').focus();
        $('.otp').on('keyup paste', '.code_btn_box', function(e) {
			if (e.type === 'paste') {
                // Handle paste event
                e.preventDefault();
                var pastedText = (e.originalEvent || e).clipboardData.getData('text/plain');
                
                // Distribute the pasted code among the input boxes
                for (let i = 0; i < pastedText.length && i < 9; i++) {
                    $('.code_btn_box').eq(i).val(pastedText[i]);
					$('.code_btn_box').eq(i).focus();
                }
            }else if ($(this).val().length === 1) {
                const currentIndex = $('.code_btn_box').index(this);
                const nextIndex = currentIndex + 1;

                if (nextIndex < 9) {
                    $('.code_btn_box').eq(nextIndex).focus();
                } else {
                    var otp = '';
                    $('.code_btn_box').each(function() {
                        otp += $(this).val();
                    });
					if (!$(this).data('ajax-in-progress')) {
                	$(this).data('ajax-in-progress', true); 
                    $.ajax({
                        url : "<?= base_url('dashboard/veryfy_otp') ?>",
                        data : {otp:otp},
                        dataType : "json",
                        type : "POST",
                        // beforeSend: function() {
                        //     $('#body-preloader').css('display', 'block');
                        // },
                        success : function(res){
							$(this).data('ajax-in-progress', false);
                            if(res.status == true)
                            {
                            new Noty({
                                        text: res.message,
                                        type: 'success',
                                        theme: 'sunset', 
                                        timeout: 2000,
                                        layout: 'topLeft',
                                    }).show();
                                    setTimeout(function() {
                                        $('#body-preloader').css('display', 'none');
                                        $('#loader-container').css({ display: 'block' });
                                        window.location = res.url;
                                    }, 1000);
                            }
                            else
                            {
                            new Noty({
                                        text: res.message,
                                        type: 'error',
                                        theme: 'sunset', 
                                        timeout: 2000,
                                        layout: 'topLeft',
                                    }).show();
                            }
                        }.bind(this), // Bind the current context to the success callback function
                    	complete: function() {
                        $(this).data('ajax-in-progress', false); // Reset flag after AJAX request completes, even if it fails
                    }.bind(this)
                    })
				}
                }
            } else if (e.which == 8) { // 8 is the key code for backspace
                const currentIndex = $('.code_btn_box').index(this);
                const prevIndex = currentIndex - 1;

                if (prevIndex >= 0) {
                    $('.code_btn_box').eq(prevIndex).focus();
                }
            }
        });
    });

	$(".show_email_box").click(function(){
		$("#email_box").toggle();
		$("#send_email_btn").toggle();
	})
    $('.e-close').on('click',function(){
        $('#email_login_modal').modal('hide');
    });
    $('.email-btn').on('click',function(){
        $('#email_login_modal').modal('show');
    });
    
});
</script>