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
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>



<div class="temp" style="">
  <h2>FAQ</h2>
  <button onclick="addFAQ()" class="btn btn-primary" style="height: 100%;">Add FAQ</button>
</div>

<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
    <th>Question</th>
    <th>Answer</th>
	<th>Edit</th>
	<th>Delete</th>
  </tr>
  <tbody class="tbodyfaq">

  <?php if(!empty($faq)){ 
    foreach($faq as $faq_data){?>
        <tr id="<?= $faq_data['id'] ?>">
            <td><?= $faq_data['question'] ?></td>
            <td><?= $faq_data['answer'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit_faq(<?= $faq_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
			<a onclick="openItemTranslationModal(<?= $faq_data['id'] ?>)" class="btn btn-success">
                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                <i class="bi bi-translate"></i>
            </a></td>
			<td><a href="javascript:void(0)" onclick="delete_faq(<?= $faq_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="4" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
</table>

<div class="modal" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content comingsoon_model">
      <div class="modal-header coming_header">               
        <button type="button" class="add_faq_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="faq_form"></div>
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
                            <div style="font-family: 'Poppins'; font-style: normal; font-weight: 500; font-size: 24px; color: #000000;cousor:pointer">Edit FAQ</div>
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
                                                <label for="first" class="translate_language_item_label">Question</label>
                                                <input type="text" class="form-control shadow-none" value="" id="<?= strtolower($language['language_name']) ?>-item-title" name="<?= strtolower($language['language_name']) ?>-item-title">
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label">Answer</label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-answer" id="<?= strtolower($language['language_name']) ?>-item-answer" rows="5"></textarea>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }else{
                        ?>
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">english');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="first" class="translate_language_item_label">Question</label>
                                    <input type="text" class="form-control shadow-none" value="" id="english-item-title" name="english-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Answer</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-answer" id="english-item-answer" rows="5"></textarea>
                                </div>
                               
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">dutch');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">Question</label>
                                    <input type="text" class="form-control shadow-none" value="" id="dutch-item-title" name="dutch-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Answer</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-answer" id="dutch-item-answer" rows="5"></textarea>
                                </div>
                               
                            </div>
                            
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">french');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">Question</label>
                                    <input type="text" class="form-control shadow-none" value="" id="french-item-title" name="french-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Answer</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-answer" id="french-item-answer" rows="5"></textarea>
                                </div>
                               
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">german');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">Question</label>
                                    <input type="text" class="form-control shadow-none" value="" id="german-item-title" name="german-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Answer</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-answer" id="german-item-answer" rows="5"></textarea>
                                </div>
                               
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>">hebrew');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label">Question</label>
                                    <input type="text" class="form-control shadow-none" value="" id="hebrew-item-title" name="hebrew-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Answer</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-answer" id="hebrew-item-answer" rows="5"></textarea>
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
	function addFAQ()
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
			url : "<?= base_url('admin/addFAQ_ajaxRequest'); ?>",
			type : "POST",
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					// console.log(res);
					$('#faqModal').css('display','block');
					$(".faq_form").html(res.html);
				}
			}
		});
	}
	function openItemTranslationModal(id) {
        $.ajax({
            url: '<?= base_url('admin/get_faq_translations') ?>',
            type: 'POST',
            data: {
                'id': id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.status == true) {
                    // let title = data.data.title;
                    // $.each(title, function(key, val) {
                    //     $('#'+val.title+'-item-title').val(val.trans); 
                    // });

                    let question = data.data.question;
                    $.each(question, function(key, val) {
                        $('#'+val.title+'-item-title').val(val.trans); 
                    });

                    let answer = data.data.answer;
                    $.each(answer, function(key, val) {
                        $('#'+val.title+'-item-answer').val(val.trans); 
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
                        text: '<?= $this->lang->line('wrong_alert') ?>',
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
            url: '<?= base_url('admin/save_faq_translation') ?>',
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
	$(".add_faq_close").click(function(){
		$('#faqModal').css('display','none');
	});

	function edit_faq(id)
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
			url : "<?= base_url('admin/edit_faq_ajaxRequest'); ?>",
			type : "POST",
			data : {id:id},
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					console.log(res);
					$('#faqModal').css('display','block');
					$(".faq_form").html(res.html);
				}
			}
		});
	}

	function delete_faq(id)
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
					url: "<?= base_url('admin/delete_faqAjaxRequest'); ?>",
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
