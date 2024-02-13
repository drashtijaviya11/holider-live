<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.temp{
  margin-right: 10px;
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  margin-bottom: 20px;
  height: 50px;
  padding: 1%;
}
.modal-dialog{
  max-width:78% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 72% !important;
}
.tbodyAffil a{
  /* color: #1e5b8b; */
  text-decoration: none;
  font-weight: 700;
}
img{
    max-width: 100px;
    max-height: 100px;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>



<div class="temp" style="">
  <h2>Testimonials</h2>
  <button onclick="addTestimonials()" class="btn btn-primary" style="height: 100%;">Add Testimonials</button>
</div>

<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
    <th>Heading</th>
    <th>Content</th>
	<th>Name</th>
	<th>Photo</th>
	<th>Edit</th>
	<th>Delete</th>
  </tr>
  <tbody class="tbodyTestimonials">

  <?php if(!empty($testimonial)){ 
    foreach($testimonial as $testimonial_data){?>
        <tr id="<?= $testimonial_data['id'] ?>">
            <td><?= $testimonial_data['heading'] ?></td>
			<td><?= $testimonial_data['content'] ?></td>
            <td><?= $testimonial_data['name'] ?></td>
			<td>
			<?php
			if (!empty($testimonial_data['photo'])) {
				$images = json_decode($testimonial_data['photo'], true);
				if ($images !== null) {
					foreach ($images as $image) {
						// Display each image
				?>
						<img class="imgFile" src="<?= base_url() . $image ?>" alt="">
				<?php
					}
				}
			}
			?>
			</td>
			<td><a href="javascript:void(0)" onclick="edit_testimonial(<?= $testimonial_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
			<a onclick="openItemTranslationModal(<?= $testimonial_data['id'] ?>)" class="btn btn-success">
                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                <i class="bi bi-translate"></i>
            </a></td>
			<td><a href="javascript:void(0)" onclick="delete_testimonial(<?= $testimonial_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="6" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
</table>

<div class="modal" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content comingsoon_model">
      <div class="modal-header coming_header">               
        <button type="button" class="add_testimonial_data_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="testimonial_form"></div>
      </div>
    </div>
  </div>
</div> 
<!-- Item Translation Modal -->
<div class="modal" id="itemLanguageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="itemLanguageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="saveNewItemTranslations">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-12 d-flex" style="justify-content: space-between; align-items: center;">
                            <div style="font-family: 'Poppins'; font-style: normal; font-weight: 500; font-size: 24px; color: #000000;cousor:pointer">Edit Testimonial</div>
                            <img src="<?= base_url(); ?>assets/images/close.png" width="24px" height="auto" style="cursor: pointer;" alt="" data-dismiss="modal">
                        </div>
                    </div>
                    <div class="row mx-0">
                        <?php 
                            $all_languages = get_all_language_from_db();
                            if(!empty($all_languages)){
                                foreach ($all_languages as $key => $language) {
                                    ?>
                                        <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                            <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>" style="font-weight: bold;">
                                                <?= $language['language_name'] ?>
                                            </div>
                                            
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label">Our content</label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-content" id="<?= strtolower($language['language_name']) ?>-item-content" rows="5"></textarea>
                                            </div>
                                            
                                        </div>
                                    <?php
                                }
                            }else{
                        ?>
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">english');?></div>
                                
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our content</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-content" id="english-item-content" rows="5"></textarea>
                                </div>
                                
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">dutch');?></div>
                              
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our content</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-content" id="dutch-item-content" rows="5"></textarea>
                                </div>
                               
                            </div>
                            
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">french');?></div>
                                
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our content</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-content" id="french-item-content" rows="5"></textarea>
                                </div>
                                
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">german');?></div>
                                
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our content</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-content" id="german-item-content" rows="5"></textarea>
                                </div>
                               
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">hebrew');?></div>
                                
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our content</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-content" id="hebrew-item-content" rows="5"></textarea>
                                </div>
                                
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <input type="hidden" name="offer_id" id="current-item-id">
                <input type="hidden" name="tlang_id" id="current-tlangi-id">
                <div class="modal-footer border-0">
                    <button type="button" class="category_item_translate_cancel_btn" data-dismiss="modal">close</button>
                    <button type="submit" class="category_item_translate_save_btn">save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
	function addTestimonials()
	{
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
		$.ajax({
			url : "<?= base_url('admin/addtestimonial_ajaxRequest'); ?>",
			type : "POST",
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					// console.log(res);
					$('#testimonialModal').css('display','block');
					$(".testimonial_form").html(res.html);
				}
			}
		});
	}

	$(".add_testimonial_data_close").click(function(){
		$('#testimonialModal').css('display','none');
	});
	function openItemTranslationModal(id) {
        $.ajax({
            url: '<?= base_url('admin/get_testimonial_translations') ?>',
            type: 'POST',
            data: {
                'id': id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.status == true) {
                    let title = data.data.title;
                    let content = data.data.content;
                    $.each(content, function(key, val) {
                        $('#'+val.title+'-item-content').val(val.trans); 
                    });
                    $('#current-item-id').val(id)
                    $('#current-tlangi-id').val(data.data.tlang_id)
                    // setTimeout(() => {
                        $('#itemLanguageModal').modal('show')
                        $('#itemLanguageModal').css('display','block');
                        // hideLLoader()
                    // }, 1500);
                } else {
                    var noty_id = noty({
                        layout: 'topRight',
                        text: 'wrong_alert',
                        type: 'error',
                        timeout: 1000,
                    });
                }
                setTimeout(() => {
                    // hideLLoader()
                }, 2000);
            },
        });
    }
	$('#saveNewItemTranslations').on('submit', function(e) {
        e.preventDefault();
        $('#itemLanguageModal').modal('hide');
        $('#itemLanguageModal').css('display','none');
        // showLLoader();
        formData = new FormData(this)
        $.ajax({
            url: '<?= base_url('admin/sav_testimonial_translations') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status == true) {
                    var noty_id = noty({
                        layout: 'topRight',
                        text: data.msg,
                        type: 'success',
                        timeout: 1000,
                    });
                    setTimeout(() => {
                        // category_render();
                    }, 1500);
                } else {
                    var noty_id = noty({
                        layout: 'topRight',
                        text: '<?= $this->lang->line('wrong_alert') ?>',
                        type: 'error',
                        timeout: 1000,
                    });
                    $('#itemLanguageModal').modal('show');
                    $('#itemLanguageModal').css('display','block');
                }
                setTimeout(() => {
                    // hideLLoader()
                }, 2000);
            },
        });
    })
	function edit_testimonial(id)
	{
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

	$.ajax({
			url : "<?= base_url('admin/edit_testimonial_ajaxRequest'); ?>",
			type : "POST",
			data : {id:id},
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					console.log(res);
					$('#testimonialModal').css('display','block');
					$(".testimonial_form").html(res.html);
				}
			}
		});
	}

	function delete_testimonial(id)
	{
		Swal.fire({
			title: 'Are you sure?',
			text: 'You won\'t be able to revert this!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?= base_url('admin/delete_testimonialAjaxRequest'); ?>",
					type: "POST",
					data: { id: id },
					dataType: "json",
					success: function (res) {
						console.log(res);
						if (res.status == true) {
							$("#"+id+"").fadeOut();
						}
					}
				});
			}
		});

	}

</script>
