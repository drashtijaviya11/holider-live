
<!-- ================================header csss start================================ -->
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<!-- -------- -------- -------- -------- end  -------- -------- -------------- -->

        
            <form action="#" method="post" id="loginForm">
                <div class="imgcontainer">
                    <div class="login_header"> <?=  lang('login'); ?></div>
                </div>

                <div class="container">
                    <label for="uname"><b><?=  lang('username'); ?></b></label>
                    <input type="text" placeholder="<?=  lang('enter').' '. lang('username'); ?>" id="uname" name="uname" required>

                    <label for="psw"><b><?=  lang('password'); ?></b></label>
                    <input type="password" placeholder="<?=  lang('enter').' '. lang('password'); ?>" id="psw" name="psw" required>

                    <button type="button" class="login_button"><?=  lang('login'); ?></button>
                    <label>
                    <input type="checkbox" id="rem" checked="checked" name="remember"><?=  lang('remember_me'); ?>
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <span class="psw"> <a href="<?= base_url('dashboard/login_with_code'); ?>"><?=  lang('forgot')." ".  lang('password'); ?> ?</a></span>
                </div>
            </form>

            <script>
$(document).ready(function () {
    $(".login_button").click(function(e) {
        e.preventDefault();
        var uname = $("#uname").val();
        var psw = $("#psw").val();

        var formData = new FormData(document.getElementById('loginForm'));

        var remember_me = $("#rem").prop("checked") ? 1 : 0;
        formData.append('remember_me', remember_me);

        if (uname && psw) {
            console.log("Valid credentials");

            $.ajax({
                url: "<?= base_url('Login/login') ?>",
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
				// beforeSend: function() {
				// 	$('#body-preloader').css('display', 'block');
				// },
                success: function(res) {
					// $('#body-preloader').css('display', 'none');
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
                        window.location = res.url;
                    }, 2000);
                    }else{
                        new Noty({
                              text: res.message,
                              type: 'error',
                              theme: 'sunset', 
                              timeout: 2000,
                              layout: 'topLeft',
                          }).show();
                    }
                },
                error: function(err) {
                    console.error("Error in AJAX request:", err);
                }
            });
        } else if(uname != '' && psw == '') {
                        new Noty({
                              text: "Password Field Are Required",
                              type: 'error',
                              theme: 'sunset', 
                              timeout: 2000,
                              layout: 'topLeft',
                          }).show();
        } else if(uname == '' && psw != ''){
                        new Noty({
                              text: "Username Field Are Required",
                              type: 'error',
                              theme: 'sunset', 
                              timeout: 2000,
                              layout: 'topLeft',
                          }).show();
        } else {
                        new Noty({
                              text: "All Field Are Required",
                              type: 'error',
                              theme: 'sunset', 
                              timeout: 2000,
                              layout: 'topLeft',
                          }).show();
        }
    });
});




</script>