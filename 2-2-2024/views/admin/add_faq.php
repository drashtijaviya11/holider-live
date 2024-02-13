
<style>
.temp{
    /* border: 1px solid #010101 !important;
    border-radius: 0px !important; */
}
    .whatsapp{
    background-color: #055c7491;
    padding: 5px;
    font-weight: bold;
}

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div class="container">
	<div class="row">
		<div class="col-12 text-center whatsapp">Add FAQ</div>
		<hr>
	</div>
	<form action="" id="add_faq"  method="post" enctype="multipart/form-data">
		<div class="row mt-2">
			<div class="col-6">
				<label for=""><?= lang('question'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="question" class="form-control temp reqre" placeholder="<?= lang('enter_question') ?>">
			</div>
			<div class="col-6">
				<label for=""><?= lang('answer'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="answer" class="form-control temp reqre" placeholder="<?= lang('enter_answer') ?>">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12 text-center">
				<input type="submit" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>

<script>
	    $(document).ready(function(){
        $("#add_faq").submit(function(e){
            e.preventDefault();
            var formValid = true;

			$(this).find('.reqre').each(function () {
				// Check if the element is a text input
				if ($(this).is('input[type="text"]')) {
					// For text inputs, check if the value is empty
		if ($(this).val().trim() === "") {
						formValid = false;
						return false; // exit the loop
					}
				}
			});


if (!formValid) {
    new Noty({
        text: '* Fields are Required.',
        type: 'error',
        timeout: 5000
    }).show();
    console.log("fill all fields");
    return;
}

  /**********Loader**************/
  Swal.fire({
    title: 'Loading...',
    showConfirmButton: false,
    allowOutsideClick: false,
    willOpen: () => {
        Swal.showLoading();
    }
});                                       
/**********Loader**************/ 
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url : "<?= base_url('admin/save_faq') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                {
                    Swal.close(); 
                    console.log(res);
                    if(res.status == true)
                    {
						$('#faqModal').css('display','none');
                        $(".tbodyfaq").append('<tr id='+res.id+'>'+res.html+'</tr>');
                    }
					else{
                        new Noty({
                            text: res.Message,
                            type: 'error',
                            timeout: 9000,
                        }).show();
                    }
                }
            });
        });
    });
</script>
