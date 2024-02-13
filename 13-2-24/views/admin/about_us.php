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
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>



<div class="temp" style="">
  <h2>About Us</h2>
  <button onclick="addAbout()" class="btn btn-primary" >Add About Us</button>
</div>

<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
    <th>Heading</th>
    <th>Our Mission</th>
	<th>Our Vesion</th>
	<th>Our History</th>
	<th>edit</th>
	<th>Translate</th>
  </tr>
  <tbody class="tbodyAbout_us">

  <?php if(!empty($about_us)){ $i = 1;
    foreach($about_us as $about_us_data){?>
        <tr id="<?= $about_us_data['id'] ?>">
            <td><?= $about_us_data['heading'] ?></td>
            <td><?= $about_us_data['our_mission'] ?></td>
			<td><?= $about_us_data['our_vision'] ?></td>
			<td><?= $about_us_data['our_history'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit_about_us(<?= $about_us_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
			<td>
				<!-- <a href="javascript:void(0)" onclick="delete_about_us(<?= $about_us_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a> -->
			<a onclick="openItemTranslationModal(<?= $about_us_data['id'] ?>)" class="btn btn-success">
                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                <i class="bi bi-translate"></i>
            </a>
		</td>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="6" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
</table>

<div class="modal" id="about_usModal" tabindex="-1" role="dialog" aria-labelledby="about_usModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content comingsoon_model">
      <div class="modal-header coming_header">               
        <button type="button" class="add_about_us_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="about_us_form"></div>
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
                            <div style="font-family: 'Poppins'; font-style: normal; font-weight: 500; font-size: 24px; color: #000000;cousor:pointer">Edit About Us</div>
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
                                            <div class="input-wrapper mb-3">
                                                <label for="first" class="translate_language_item_label">Title</label>
                                                <input type="text" class="form-control shadow-none" value="" id="<?= strtolower($language['language_name']) ?>-item-title" name="<?= strtolower($language['language_name']) ?>-item-title">
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label">Our Mission</label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-mission" id="<?= strtolower($language['language_name']) ?>-item-mission" rows="5"></textarea>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label">Our Vision</label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-vision" id="<?= strtolower($language['language_name']) ?>-item-vision" rows="5"></textarea>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label">Our History</label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-history" id="<?= strtolower($language['language_name']) ?>-item-history" rows="5"></textarea>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }else{
                        ?>
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">english');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="first" class="translate_language_item_label">title</label>
                                    <input type="text" class="form-control shadow-none" value="" id="english-item-title" name="english-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Mission</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-mission" id="english-item-mission" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Vision</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-vision" id="english-item-vision" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our History</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-history" id="english-item-history" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">dutch');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">title</label>
                                    <input type="text" class="form-control shadow-none" value="" id="dutch-item-title" name="dutch-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Mission</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-mission" id="dutch-item-mission" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Vision</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-vision" id="dutch-item-vision" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our History</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-history" id="dutch-item-history" rows="5"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">french');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">title</label>
                                    <input type="text" class="form-control shadow-none" value="" id="french-item-title" name="french-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Mission</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-mission" id="french-item-mission" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Vision</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-vision" id="french-item-vision" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our History</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-history" id="french-item-history" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">german');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">title</label>
                                    <input type="text" class="form-control shadow-none" value="" id="german-item-title" name="german-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Mission</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-mission" id="german-item-mission" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Vision</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-vision" id="german-item-vision" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our History</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-history" id="german-item-history" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">hebrew');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">title</label>
                                    <input type="text" class="form-control shadow-none" value="" id="hebrew-item-title" name="hebrew-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Mission</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-mission" id="hebrew-item-mission" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our Vision</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-vision" id="hebrew-item-vision" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Our History</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-history" id="hebrew-item-history" rows="5"></textarea>
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
	function addAbout()
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
			url : "<?= base_url('admin/addabout_us_ajaxRequest'); ?>",
			type : "POST",
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					// console.log(res);
					$('#about_usModal').css('display','block');
					$(".about_us_form").html(res.html);
				}
			}
		});
	}

	$(".add_about_us_close").click(function(){
		$('#about_usModal').css('display','none');
	});

	function openItemTranslationModal(id) {
        $.ajax({
            url: '<?= base_url('admin/get_about_us_translations') ?>',
            type: 'POST',
            data: {
                'id': id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.status == true) {
                    let title = data.data.title;
                    
					let heading = data.data.heading;
                    $.each(heading, function(key, val) {
                        $('#'+val.title+'-item-title').val(val.trans); 
                    });

                    let mission = data.data.mission;
                    $.each(mission, function(key, val) {
                        $('#'+val.title+'-item-mission').val(val.trans); 
                    });

                    let vision = data.data.vision;
                    $.each(vision, function(key, val) {
                        $('#'+val.title+'-item-vision').val(val.trans); 
                    });

                    let history = data.data.history;
                    $.each(history, function(key, val) {
                        $('#'+val.title+'-item-history').val(val.trans); 
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
            url: '<?= base_url('admin/save_about_us_translations') ?>',
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
	function edit_about_us(id)
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
			url : "<?= base_url('admin/edit_about_us_ajaxRequest'); ?>",
			type : "POST",
			data : {id:id},
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					console.log(res);
					$('#about_usModal').css('display','block');
						$(".about_us_form").html(res.html);
				}
			}
		});
	}

	function delete_about_us(id)
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
					url: "<?= base_url('admin/delete_about_usAjaxRequest'); ?>",
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
