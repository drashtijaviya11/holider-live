<style>
	.cat_offer_list{
		height: 95vh;
    overflow-y: scroll;
	}
			/* Custom scrollbar styles */
	.cat_offer_list::-webkit-scrollbar {
			width: 5px;
	}

	.cat_offer_list::-webkit-scrollbar-track {
			background: transparent;
	}

	.cat_offer_list::-webkit-scrollbar-thumb {
			background-color: transparent;
			border-radius: 20px;
			border: 3px solid #ced4da;
	}
</style>
<section>
  <div class="container">
    <div class="row pt-5">
	    <div class="col-lg-3 mt-1">
	      <div class="p-4 border box-light-2" style="background-color: #F1FBFF;height:95vh;overflow:auto">
	        <h3 class="fw-600 f-livvic text-blue"><?php echo lang('categories')?></h3>
		      <hr>
		      <ul class="list-group f-lora">
          
            <?php foreach ($category as $cat) { ?>
                        
                        <li class="list-group-item">
                          <input class="form-check-input border-orange me-1 mt-2" type="radio" name="listGroupRadio" value="<?= $cat['id'] ?>" id="cat_<?= $cat['id'] ?>" onclick="get_cat_offer(<?php echo $cat['id']; ?>)">
                          <label class="form-check-label ps-2 fs-5 fw-600" for="car_<?= $cat['id'] ?>"><?= get_categories_translation($cat['category_name']); ?></label>
                        </li>
                    <?php } ?>
          </ul>
	      </div>
	    </div>
      <div class="col-lg-9">
        <div class="row cat_offer_list">

        </div>
      </div>
    </div>
  </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

function deleteSessionValue(key) {
		sessionStorage.removeItem(key);
}
function deleteCookie(name) {
		document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
$(document).ready(function() {
	var hrefValue = $('.navbar-brand').attr('href');
	var currentUrl = window.location.href;
	currentUrl = currentUrl.replace(/\?.*$/, '');
	var isHomePage = getCookie('isHomePage');
	if(isHomePage)
	{
		var checkedValue = getCookie('checkedValue');
		if (checkedValue !== null) {
        var radio = document.getElementById('cat_' + checkedValue);
        if (radio) {
            radio.checked = true;
            get_cat_offer(checkedValue);
        }else{
			get_cat_offer();
		}
    }
		deleteCookie('checkedValue');
		deleteCookie('isHomePage');
	}
	if(!isHomePage)
	{
		get_cat_offer();
	}
});
var offset = 10;
var isLoading = false;
var keyUsrch_value;
$("#search_offer").keyup(function () {
    var srch_value = $("#search_offer").val();
    cat_id = $("input[name='listGroupRadio']:checked").val();

    // Check if the length of the search value is greater than or equal to 3
    if (srch_value.length >= 3) {
        get_cat_offer(cat_id, srch_value);
    }
	if(srch_value.length == 0){
		get_cat_offer(cat_id, srch_value);
	}
});


function get_cat_offer(cat_id,keyUpsearch) {
	isLoading = false;
	offset = 10;
	keyUpsearch = $("#search_offer").val();
	var urlParams = new URLSearchParams(window.location.search);
    var searchParam = urlParams.get('search');
    $.ajax({
        url: '<?= base_url('offer/get_cat_offer'); ?>',
        data: { cat_id: cat_id , search: searchParam,keyUpsrch_value:keyUpsearch},
        dataType: "json",
        type: "POST",
        // beforeSend: function() {
        //     $('#body-preloader').css('display', 'block');
        // },
        success: function (res) {
			// console.log(res);
            // $('#body-preloader').css('display', 'none');
            $(".cat_offer_list").html(res.html);
        },
        error: function(xhr, status, error) {
					// $('#body-preloader').css('display', 'none');
            console.error('Ajax request failed:', xhr, status, error);
						console.log(xhr.responseText);
        }
    });
}


    function loadMoreItems(cat_id) {
    if (isLoading) {
            return;
        }
    isLoading = true;
	var srching_value = $("#search_offer").val();
	var urlParams = new URLSearchParams(window.location.search);
    var searchParam = urlParams.get('search');
		$.ajax({
            url: '<?= base_url('offer/get_offer_items') ?>',
						data : {offset:offset,cat_id:cat_id,search:searchParam,srching_value:srching_value},
            type: 'POST',
            dataType: 'json',
			// beforeSend: function() {
			// 	$('#body-preloader').css('display', 'block');
			// },
            success: function(data) {
							// $('#body-preloader').css('display', 'none');
							if(data.offer.length > 0)
							{
								$(".cat_offer_list").append(data.html);
								offset += data.offer.length;
								isLoading = false;
							}
            }
        });
    }
		$(".cat_offer_list").scroll(function() {
			var selectedCatId = $('input[name="listGroupRadio"]:checked').val();
				if ($(this).scrollTop() + $(this).height() >= $(this)[0].scrollHeight - 100) {
						loadMoreItems(selectedCatId);
				}
		});

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
		<script>

		$(document).ready(function() {
				// Delete values from session storage
				deleteSessionValue('picDate');
				deleteSessionValue('picTime');
				deleteSessionValue('childQuantity');
				deleteSessionValue('adultQuantity');
			deleteCookie('picDate');
				deleteCookie('picTime');
				deleteCookie('childQuantity');
				deleteCookie('adultQuantity');
		});
		function getCookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');

    for(var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}
function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

</script>