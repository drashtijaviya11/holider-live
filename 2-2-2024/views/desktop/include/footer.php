<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    const timeDlay = 200;
  function openuserModal() {
    $("#signupModal").css({ display: 'block' });
  }
    setTimeout(openuserModal, timeDlay);
	function setCookie(name, value, days) {
    var expires = "";

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }

    document.cookie = name + "=" + value + expires + "; path=/";
}

function myVouchers()
{
    $.ajax({
        url : "<?= base_url('dashboard/myVouchersAjaxRequest'); ?>",
        type : "POST",
        dataType : "json",
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}function myVouchers_provider()
{
    $.ajax({
        url : "<?= base_url('provider/myVouchersAjaxRequest'); ?>",
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
						// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}
// End My Vouchers & Start getArea 

function getArea(type,id)
{

    $.ajax({
        url : "<?= base_url('offer/getArea') ?>",
        data : {id : id,type:type},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res){
			// $('#body-preloader').css('display', 'none');
            $(".sub-area-menu").html(' ');
            if (res.status == true) {
                console.log(res);
                    window.location = res.url;
            }
        }
    });
}
function new_getArea(id)
{

    $.ajax({
        url : "<?= base_url('offer/new_getArea') ?>",
        data : {id : id},
        type : "POST",
        dataType : "json",
        success : function(res){
            // $(".sub-area-menu").html(' ');
            if (res.status == true) {
                console.log(res);
                    window.location = res.url;
            }
        }
    });
}

function getCheckedRadioValue() {
    var radioButtons = document.getElementsByName('listGroupRadio');

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            return radioButtons[i].value;
        }
    }

    // Return null if no radio button is checked
    return null;
}


function change_lang(lang){
    var hrefValue = $('.navbar-brand').attr('href');
	var currentUrl = window.location.href;
	currentUrl = currentUrl.replace(/\?.*$/, '');
	var checkedValue = getCheckedRadioValue();
	if(currentUrl == 'https://holider.com/demo/offer' || currentUrl == 'https://holider.com/demo/')
	{
		setCookie("isHomePage", true, 1);
		setCookie("checkedValue", checkedValue, 1);
	}
    $.ajax({
        url : "<?= base_url('dashboard/change_language') ?>",
        data : {lang : lang},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                window.location.reload();
            }
        }
    });
}
function changeCountry(location_href)
{
	deleteCookie('country');
    deleteCookie('state');
	window.location.href = location_href;
}
// Change Language End  ,
// Start Change currency option

function change_curn(cur_code){
    var hrefValue = $('.navbar-brand').attr('href');
	var currentUrl = window.location.href;
	currentUrl = currentUrl.replace(/\?.*$/, '');
	var checkedValue = getCheckedRadioValue();
	if(currentUrl == 'https://holider.com/demo/offer' || currentUrl == 'https://holider.com/demo/')
	{
		setCookie("isHomePage", true, 1);
		setCookie("checkedValue", checkedValue, 1);
	}
    $.ajax({
        url : "<?= base_url('dashboard/change_currency') ?>",
        data : {cur_code : cur_code},
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                window.location.reload();
            }
        }
    });
}

// End Change currency option , Start Logout
function logout()
{
    $.ajax({
        url : "<?= base_url('dashboard/logout'); ?>",
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                window.location = res.url;
            }
        }
    });
}

// End Loguot & Start Login
function login()
{
    $.ajax({
        url : "<?= base_url('dashboard/loginRequestAjax'); ?>",
        type : "POST",
        dataType : "json",
		// beforeSend: function() {
		// 	$('#body-preloader').css('display', 'block');
		// },
        success : function(res)
        {
			// $('#body-preloader').css('display', 'none');
            if(res.status == true)
            {
                console.log(res);
                window.location = res.url;
            }
        }
    });
}
// End Login & Start My Vouchers

$(document).ready(function() {
    $(".lang_dropdown").on("click", function() {
        $(".sub-menu").toggle();
        $(".sub-menu-currency").css("display", "none");
    });

    $(".dropdown-Curcency").on("click", function() {
        $(".sub-menu-currency").toggle();
        $(".sub-menu").css("display", "none");
    });
});
function goBack() {
            // $('#loader-container').css({ display: 'block' });
        window.history.back();
        }

		function view_offer(offerId) {
        // $('#loader-container').css({ display: 'block' });
        $.ajax({
            url: '<?= base_url('offer/viewOffer'); ?>',
            data: { id: offerId },
            dataType: "json",
            type: "POST",
            success: function (res) {
                // console.log(res);
                window.location = res.url;
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '#save', function() {
        var name = $("#name").val().trim();

        if (name === "") {
            new Noty({
                text: '<?= lang('enter_your_name'); ?>',
                type: 'error',
                timeout: 3000
            }).show();
            return;
        }

        $.ajax({
            url: "<?= base_url('dashboard/updateUser');?>",
            type: "POST",
            data: $("#signupForm").serialize(),
            success: function(response) {
				// window.location.href = response.url;
				$("#signupModal").css({ display: 'none' });
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("Ajax request failed:", xhr, status, error);
            }
        });
    });
});

$(".searchBtn").click(function(){
    $("#search_offer").focus();
})
</script>

</body>
</html>