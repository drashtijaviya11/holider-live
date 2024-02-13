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
}
.modal-dialog{
  max-width:45% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 92% !important;
}
.dropdown-menu{
  left: -63% !important;
  min-width: fit-content !important;
  padding: 7px !important;
}
.temp{
        color: var(--bs-btn-active-color);
        background-color: var(--bs-btn-active-bg);
        border-color: var(--bs-btn-active-border-color);
    }
    .temp1{
        color: var(--bs-btn-active-color);
        background-color: var(--bs-btn-active-bg);
        border-color: var(--bs-btn-active-border-color);
    }
</style>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>
<div class="temp">
<h2>category List</h2>

<button onclick="addCategory()" class="btn btn-primary" style="height: 40px;">Add category</button>


</div>


<table class="table  table-striped"  style="font-size:10px">
  <tr>
    <th>Sr. No</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <tbody class="catTbody">
  <?php if(!empty($category)){ $i = 1;
    foreach($category as $category_data){?>
        <tr class="data-ap" id="<?= $category_data['id']; ?>">
            <td><?= $category_data['id']; ?></td>
            <td><?= $category_data['category_name'] ?></td>
            <td><a  class="btn btn-success" onclick="edit_category(<?= $category_data['id'] ?>)"><i class="bi bi-pencil-square"></i>
            <a onclick="categoriesTranslationModal(<?= $category_data['id'] ?>)" class="btn btn-success">
                                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                                <i class="bi bi-translate"></i>
    </a>
        </td>
            <td><a  class="btn btn-danger" onclick="delete_category(<?= $category_data['id'] ?>)"><i class="bi bi-trash3"></td>
        </tr>
   <?php } 
  }else{ ?>
    <tr>
        <td>Data Not Found</td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<!-- Item Translation Modal -->
<div class="modal" id="itemcateLanguageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="itemcateLanguageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="saveNewItemTranslations">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-12 d-flex" style="justify-content: space-between; align-items: center;">
                            <div style="font-family: 'Poppins'; font-style: normal; font-weight: 500; font-size: 24px; color: #000000;cousor:pointer"><?= $this->lang->line('edit_itemdata_lang'); ?></div>
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
                                                <label for="first" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                                <input type="text" class="form-control shadow-none" value="" id="<?= strtolower($language['language_name']) ?>-item-title" name="<?= strtolower($language['language_name']) ?>-item-title">
                                            </div>
                                            
                                        </div>
                                    <?php
                                }
                            }else{
                        ?>
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('english');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="first" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="english-item-title" name="english-item-title">
                                </div>
                                
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('dutch');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="dutch-item-title" name="dutch-item-title">
                                </div>

                            </div>
                            
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('french');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="french-item-title" name="french-item-title">
                                </div>
                               
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('german');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="german-item-title" name="german-item-title">
                                </div>
                                
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('hebrew');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="hebrew-item-title" name="hebrew-item-title">
                                </div>
                              </div>
                        <?php } ?>
                    </div>
                </div>
                <input type="hidden" name="cat_id" id="current-item-id">
                <input type="hidden" name="tlang_id" id="current-tlangi-id">
                <div class="modal-footer border-0">
                    <button type="button" class="category_item_translate_cancel_btn" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
                    <button type="submit" class="category_item_translate_save_btn"><?= $this->lang->line('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content comingsoon_model">
            <div class="modal-header coming_header">               
                <button type="button" class="add_category_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="category_form"></div>
            </div>
        </div>
    </div>
</div>
<script>
function categoriesTranslationModal(cat_id) {
        $.ajax({
            url: '<?= base_url('admin/get_cate_translations') ?>',
            type: 'POST',
            data: {
                'cat_id': cat_id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.status == true) {
                    let title = data.data.title;
                    $.each(title, function(key, val) {
                        $('#'+val.title+'-item-title').val(val.trans); 
                    });

                    $('#current-item-id').val(cat_id)
                    $('#current-tlangi-id').val(data.data.tlang_id)
                    // setTimeout(() => {
                        $('#itemcateLanguageModal').modal('show')
                        $('#itemcateLanguageModal').css('display','block');
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
        $('#itemcateLanguageModal').modal('hide');
        $('#itemcateLanguageModal').css('display','none');
        // showLLoader();
        formData = new FormData(this)
        $.ajax({
            url: '<?= base_url('admin/cate_save_translations') ?>',
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
                    $('#itemcateLanguageModal').modal('show');
                    $('#itemcateLanguageModal').css('display','block');
                }
                setTimeout(() => {
                    // hideLLoader()
                }, 2000);
            },
        });
    })
function delete_category(id) {
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
            // User clicked "Yes"
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
                url: "<?= base_url('admin/delete_category'); ?>",
                type: "POST",
                dataType: "json",
                data: { id: id }, // Include the ID in the request
                success: function (res) {
                    Swal.close();
                    if (res.status == true) {
                        $("#"+id+"").fadeOut();
                        // $('#categoryModal').css('display', 'block');
                        // $(".sidebar-nav .category").trigger("click");
                    }
                }
            });
        }
    });
}



function addCategory() {
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
        url : "<?= base_url('admin/add_category_ajaxRequest'); ?>",
        type : "POST",
        dataType : "json",
        success : function(res)
        {
          Swal.close(); 
            if(res.status == true)
            {
                console.log(res);
                $('#categoryModal').css('display','block');
                $(".category_form").html(res.html);
            }
        }
    });
}

$(".add_category_close").click(function(){
  $('#categoryModal').css('display','none');
});


    function edit_category(id)
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
            url : "<?= base_url('admin/edit_category_ajaxRequest'); ?>",
            type : "POST",
            data : {id:id},
            dataType : "json",
            success : function(res)
            {
            Swal.close(); 
                if(res.status == true)
                {
                    $('#categoryModal').css('display','block');
                    console.log(res);
                    $(".category_form").html(res.html);
                }
            }
        });
    }
</script>
