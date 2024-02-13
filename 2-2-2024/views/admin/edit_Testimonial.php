
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Fancybox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<div class="container">
	<div class="row">
		<div class="col-12 text-center whatsapp"><?= lang('add_testimonial'); ?></div>
		<hr>
	</div>
	<form action="" id="edit_testimonial"  method="post" enctype="multipart/form-data">
		<div class="row mt-2">
			<div class="col-4">
			<input type="hidden" name="id"  value="<?= $testimonial['id']; ?>" >
				<label for=""><?= lang('heading'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="heading" class="form-control temp reqre" placeholder="<?= lang('enter_heading') ?>" value="<?= $testimonial['heading'] ?>">
			</div>
			<div class="col-4">
				<label for=""><?= lang('content'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="content" class="form-control temp reqre" placeholder="<?= lang('enter_content') ?>" value="<?= $testimonial['content'] ?>">
			</div>
			<div class="col-4">
				<label for=""><?= lang('name'); ?></label><i class="bi bi-star-fill"></i>
				<input type="text" name="name" class="form-control temp reqre" placeholder="<?= lang('enter_name') ?>" value="<?= $testimonial['name'] ?>">
			</div>
		</div>
		<div class="row mt-2">
		<div class="col-4 img_container">
			<label for=""><?= lang('photo'); ?></label><i class="bi bi-star-fill"></i>
			<input type="file" name="photo[]" class="form-control temp reqre" accept="image/*" placeholder="<?= lang('enter_photo') ?>" multiple>

			<?php
			$existingImages = [];
			if (!empty($testimonial['photo'])) {
				$images = json_decode($testimonial['photo'], true);
				if ($images !== null) {
					$existingImages = $images;

					foreach ($images as $index => $image) {
						// Display each image
			?>
						<div class="preview-image-container" data-index="<?= $index ?>">
							<img class="imgFile" class="image" src="<?= base_url() . $image ?>" alt="">
							<div class="preview-icon" onclick="showImagePreview('<?= base_url() . $image ?>')">
								<i class="bi bi-image-fill text-black btn btn-success"></i>
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

<script>
	    $(document).ready(function(){
        $("#edit_testimonial").submit(function(e){
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
                url : "<?= base_url('admin/update_testimonial') ?>",
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
						$('#testimonialModal').css('display','none');
                        $(".tbodyTestimonials #"+res.id+"").html(res.html);
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

	function showImagePreview(imageUrl) {
            $.fancybox.open({
                src: imageUrl,
                type: 'image'
            });
        }


</script>

<script>
    // function deleteImage(index) {
    //     // Assuming the hidden input with the class 'showing_img' is used to keep track of deleted images
    //     var deletedImages = $('.showing_img').val().split(',');

    //     // If the image at the given index is not already marked as deleted, mark it as deleted
    //     if (deletedImages.indexOf(index.toString()) === -1) {
    //         deletedImages.push(index.toString());

    //         // Update the hidden input value with the updated list of deleted images
    //         $('.showing_img').val(deletedImages.join(','));

    //         // Remove the corresponding preview container from the page
    //         $('.preview-image-container:eq(' + index + ')').remove();
    //     }
    // }
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
                    url : '<?= base_url("admin/deleteTestimonialImage") ?>',
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

