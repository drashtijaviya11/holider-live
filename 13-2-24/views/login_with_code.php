
<style>
.login-contain {
    top: 18% !important;
}

.main-login {
    padding: 8% 5% !important;
}

.or-sec {
    margin-top: calc(10*var(--aspect-ratio)) !important;
}
.main-login .l-num {
    margin-top: calc(10*var(--aspect-ratio)) !important;
}
    .otp input {
    font-weight: 900;
    text-align: center;
    width:25px;
    }

    .w-login .text {
    color: #fff;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(7*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    white-space: nowrap;
    }

    .main-login .w-login {
        width: 85% !important;
    }

    .main-login .e-login {
        width: 90% !important;
        gap: 2% !important
    }

    .main-login .code {
        white-space: nowrap;
        font-size: (5*var(--aspect-ratio)) !important;
        width: 85% !important;
    }

    .welcome-text {
        white-space: nowrap;
    }

	
	/* .main-login a {
       text-align: center;
    }
	
	
	.drop-list.active {
        left: 8px;
        top: 85px;
    }
	.country-dd {
    top: 85px !important;
    }
	.main-login {
        top: 240px;
    }
	.search-area input {
        border-radius: 0;
    }
	.header {
        height: 85px;
    }
	.login-detail-container {
    position: sticky;
    }
	
	@media (min-width: 320px) and (max-width: 768px) {
		.welcome-text {
			font-size: 5vw !important;
		}
		.main-login a {
            font-size: 2.9vw !important;
        }
	} */
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- <section style="background-image: url('https://holider.com/demo/assets/images/login-ng.png');width: 100%;height: 940px;background-repeat: no-repeat;background-size: cover;">
        <div class="login-detail-container">

            <div class="main-login">
                <h2 class="welcome-text"><?= lang('welcome_to_holider') ?></h2>
                <a href="#"><?= lang('you_are_not_logged_in') ?></a>
                <a href="//api.whatsapp.com/send?phone=13322426444&text=<?= lang('login') ?>">
                    <button class="w-login">
                        <div class="text"><?= lang('login_with_wp') ?></div>
                        <img src="<?= base_url(); ?>assets/images/whatsapp.png" alt="">
                    </button>
                </a>
				<br>
                <span><?= lang('or') ?></span>
				<br>
                <a href="#"><?= lang('send_login_to_number') ?>+1 (332) 242-6444</a>
                <div class="or-sec">
                        <hr>
                        <span>OR</span>
                        <hr>
                    </div>
                    <button class="e-login">
                        <img src="<?php echo  base_url();?>assets/images/email.png" alt="">
                        <div class="text"><?php echo lang('login_with_email');?></div>    
                    </button>
                <button class="code"><?= lang('i_got_the_code') ?></button>

                <div class="in-otp">
                    <div class="otp">
                       
                    </div>
                </div>
            </div>
            <div class="email-login">
                <div class="head-mail">
                    <button class="e-close">
                        <img src="<?= base_url(); ?>assets/images/close.png" alt="">
                    </button>
                </div>
                <div class="e-logo">
                    <img src="<?= base_url(); ?>assets/images/img-logo.png" alt="">
                </div>

                <div class="main-e">
                    <div class="in-mail">
                        <div class="h_email">E-mail</div>
                        <input type="text">
                    </div>
                    <button class="send-e">SEND</button>
                </div>

            </div>
        </div>
      </section> -->
      <div class="login-detail-container">

<div class="bg-login">
    <img src="<?= base_url(); ?>assets/images/login-ng.png" alt="">
    <div class="login-overlay"></div>
</div>

<div class="login-contain">
    <div class="main-login" style="margin:auto;position:relative">
        <h2 class="welcome-text"><?= lang('welcome_to_holider') ?></h2>
        <a href="#"><?= lang('you_are_not_logged_in') ?></a>
        <a href="//api.whatsapp.com/send?phone=13322426444&text=<?= lang('login') ?>">
            <button class="w-login">
                <img src="<?= base_url(); ?>assets/images/whatsapp.png" alt="">
                <div class="text"><?= lang('login_with_wp') ?></div>    
            </button>
        </a>
        <div class="or-sec">
            <hr>
            <span><?= lang('or') ?></span>
            <hr>
        </div>

        <a href="#" class="l-num"><?= lang('send_login_to_number') ?>+1 (332) 242-6444</a>
        <div class="or-sec">
            <hr>
            <span><?= lang('or') ?></span>
            <hr>
        </div>
        <button class="e-login">
            <img src="<?= base_url(); ?>assets/images/email.png" alt="">
            <div class="text"><?php echo lang('login_with_email');?></div>    
        </button>

        <button id="code" class="code"><?= lang('i_got_the_code') ?></button>

        <div class="in-otp">
            <div class="otp">
                <!-- <input type="text" maxlength="1" class="custom-input">
                <input type="text" maxlength="1" class="custom-input">
                <input type="text" maxlength="1" class="custom-input">
                <input type="text" maxlength="1" class="custom-input">
                <input type="text" maxlength="1" class="custom-input">
                <input type="text" maxlength="1" class="custom-input"> -->
            </div> 
        </div>
        
    </div>
</div>

<div class="email-login">
    <div class="head-mail">
        <button class="e-close">
            <img src="<?= base_url(); ?>assets/images/close.png" alt="">
        </button>
    </div>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
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
								$('.email-login').css('display', 'none');
								$('.login-contain').css({ display: 'block' });
								$("#code").trigger('click');
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
    $('#code').click(function() {
        $('.in-otp').addClass('active');
        if ($('.in-otp').hasClass('active')) {
            $("#loginImage").attr("src", "<?= base_url(); ?>assets/images/login-new.png");
        } else {
            $("#loginImage").attr("src", "<?= base_url(); ?>assets/images/login-ng.png");
        }

        $('.otp').html('<input type="hidden" name="phone" value="">');
        for (let i = 1; i <= 9; i++) {
            const input = $('<input>').attr({
                class: "code_box",
                type: 'text',
                maxLength: 1,
                name: 'otp[]'
            });
            $('.otp').append(input);
        }
        $('.code_box:first').focus();

		$('.otp').on('keyup paste', '.code_box', function(e) {
    if (e.type === 'paste') {
        // Handle paste event
        e.preventDefault();
        var pastedText = (e.originalEvent || e).clipboardData.getData('text/plain');
        
        // Distribute the pasted code among the input boxes
        for (let i = 0; i < pastedText.length && i < 9; i++) {
            $('.code_box').eq(i).val(pastedText[i]);
            $('.code_box').eq(i).focus();
        }
    } else if ($(this).val().length === 1) {
        const currentIndex = $('.code_box').index(this);
        const nextIndex = currentIndex + 1;

        if (nextIndex < 9) {
            $('.code_box').eq(nextIndex).focus();
        } else {
            var otp = '';
            $('.code_box').each(function() {
                otp += $(this).val();
            });

            // Check if AJAX request is already in progress
            if (!$(this).data('ajax-in-progress')) {
                $(this).data('ajax-in-progress', true); // Set flag to indicate AJAX request in progress
                $.ajax({
                    url: "<?= base_url('dashboard/veryfy_otp') ?>",
                    data: { otp: otp },
                    dataType: "json",
                    type: "POST",
                    success: function(res) {
                        $(this).data('ajax-in-progress', false); // Reset flag after AJAX request is complete
                        if (res.status == true) {
                            new Noty({
                                text: res.message,
                                type: 'success',
                                theme: 'sunset',
                                timeout: 2000,
                                layout: 'topLeft',
                            }).show();
                            setTimeout(function() {
                                $('#loader-container').css({ display: 'block' });
                                window.location = res.url;
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
                    }.bind(this), // Bind the current context to the success callback function
                    complete: function() {
                        $(this).data('ajax-in-progress', false); // Reset flag after AJAX request completes, even if it fails
                    }.bind(this) // Bind the current context to the complete callback function
                });
            }
        }
    } else if (e.which == 8) { // 8 is the key code for backspace
        const currentIndex = $('.code_box').index(this);
        const prevIndex = currentIndex - 1;

        if (prevIndex >= 0) {
            $('.code_box').eq(prevIndex).focus();
        }
    }
});

    });
});

</script>
