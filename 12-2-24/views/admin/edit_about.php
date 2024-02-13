
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
.preview-image-container {
        position: relative;
        display: inline-block;
        margin-right: 5px;
        overflow: hidden; /* Hide the delete icon initially */
    }
    .image {
        width: 50px;
        height: 50px;
    }
.preview-icon{
        font-weight: 900;
        position: absolute;
        top: 70%;
        left: 15%;
        transform: translate(-50%, -50%);
        font-size: 14px; 
        cursor: pointer;
        display: none;
    }
    .preview-image-container:hover  .preview-icon {
        display: block;
    }
	.preview-image-container:hover .delete-icon {
        display: block;
    }
    .delete-icon {
        font-weight: 900;
        position: absolute;
        top: 70%;
        left: 80%;
        transform: translate(-50%, -50%);
        font-size: 14px; /* Decrease the font size of the cross symbol */
        color: red;
        cursor: pointer;
        display: none; /* Hide the delete icon initially */
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div class="container">
	<div class="row">
		<div class="col-12 text-center whatsapp">Add About</div>
		<hr>
	</div>
	<form action="" id="update_about"  method="post" enctype="multipart/form-data">
		<div class="row mt-2">
			<div class="col-4">
				<input type="hidden" name="id"  value="<?= $about_us['id']; ?>" >
				<label for=""><?= lang('heading'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="heading" class="form-control temp reqre" placeholder="Enter Heading" value="<?= $about_us['heading'] ?>">
			</div>
			<div class="col-4">
				<label for=""><?= lang('our_mission'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="our_mission" class="form-control temp reqre" placeholder="Enter Our Mission" value="<?= $about_us['our_mission'] ?>">
			</div>
			<div class="col-4">
				<label for=""><?= lang('our_vision'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="our_vision" class="form-control temp reqre" placeholder="Enter Our Vision" value="<?= $about_us['our_vision'] ?>">
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-4">
				<label for=""><?= lang('our_history'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="our_history" class="form-control temp reqre" placeholder="Enter Our History" value="<?= $about_us['our_history'] ?>">
			</div>
			<div class="col-4 img_container">
				<label for="">Photo</label><i class="bi bi-star-fill"></i>
				<input type="file" name="photo[]" class="form-control temp reqre" accept="image/*" placeholder="<?= lang('enter_photo') ?>" multiple>

				<?php
				$existingImages = [];
				if (!empty($about_us['files'])) {
					$images = json_decode($about_us['files'], true);
					if ($images !== null) {
						$existingImages = $images;

						foreach ($images as $index => $image) {
							// Display each image
				?>
							<div class="preview-image-container" data-index="<?= $index ?>">
								<!-- Displaying video using the video tag -->
								<video class="videoFile" height="50px" width="50px" controls>
									<source src="<?= base_url() . $image ?>" type="video/mp4">
									Your browser does not support the video tag.
								</video>
								<div class="preview-icon" onclick="showVideoPreview('<?= base_url() . $image ?>')">
									<i class="bi bi-film text-black btn btn-success"></i>
								</div>
								<div class="delete-icon" onclick="deleteImage(<?= $index ?>)"><i class="bi bi-trash3 btn btn-danger"></i></div>
							</div>
				<?php
						}
					}
				}
				?>
				<input type="hidden" name="showing_img" class="showing_img" value='<?= json_encode($existingImages) ?>'>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12 text-center">
				<input type="submit" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
<div class="modal" id="VedioModel" tabindex="-1" role="dialog" aria-labelledby="providerModalLabel" aria-hidden="true" style="width: 40%;left: 30%;overflow-y: hidden;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content comingsoon_model">
			<div class="modal-header coming_header">               
				<button type="button" class="vedio_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<video controls=""  style="height: 200px;width: 350px;">
					<source src="" type="video/mp4">                                            <!-- Your browser does not support the video tag. -->
				</video>
			</div>
		</div>
	</div>
</div>
<script>

$(".vedio_close").click(function(){
	$('#VedioModel').css('display','none');
	var videoElement = $('#VedioModel video')[0];
	videoElement.pause();
});
function showVideoPreview(mediaUrl) {

$('#VedioModel video').attr('src', mediaUrl);
$('#VedioModel').css('display','block');
var videoElement = $('#VedioModel video')[0];

// Auto-play the video
videoElement.play();
}

	    $(document).ready(function(){
        $("#update_about").submit(function(e){
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
                url : "<?= base_url('admin/update_about') ?>",
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
						$('#about_usModal').css('display','none');
                        $(".tbodyAbout_us #"+res.id+"").html(res.html);
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

	function deleteImage(index) {
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var imageContainer = $('.preview-image-container[data-index="' + index + '"]');
                imageContainer.hide();
                var imgValue = $('.showing_img').val();
                $.ajax({
                    url : '<?= base_url("admin/deleteabout_usImage") ?>',
                    data : {index:index,imgValue:imgValue},
                    dataType : "json",
                    type : "POST",
                    success : function(res)
                    {
						console.log(res);
                        $('.showing_img').val(res.imgValue);
                    }
                })
            }
        });
    }
</script>
