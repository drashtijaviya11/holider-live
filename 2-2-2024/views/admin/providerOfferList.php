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
  max-width:85% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 80% !important;
}
table{
  
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   -->
</head>
<body>
<div class="temp">
<h2>Offer List</h2>
</div>
<table class="table table-striped" style="font-size: 10px;">
  <tr>
    <th>Name</th>
    <th>Category</th>
    <th>Provider Name</th>
    <th>Child Price</th>
    <th>Child Commission</th>
    <th>Child Discount</th>
    <th>Adult Price</th>
    <th>Adult Commission</th>
    <th>Adult Discount</th>
    <th>Total Sale Offer</th>
    <th>Sale Offer Qty</th>
    <th>Total Sale Price</th>
    <th>Country</th>
    <th>state</th>
    <th>Offer</th>
	<th>Actions</th>
  </tr>
  <tbody class="proOfferBody">
  <?php if(!empty($offers)){
    foreach($offers as $offers_data){?>
        <tr class="data-ap" id="<?= $offers_data['id'] ?>">
            <td><?= $offers_data['name'] ?></td>
            <td><?= $offers_data['category'] ?></td>
            <td><?php foreach ($providers as $provider) {if ($provider['id'] == $offers_data['provider_id']) {echo $provider['name'];$pro_id = $provider['id'];}} ?></td>
            <td><?= get_currency($offers_data['child_price'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['child_commission'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['child_discount'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['adult_price'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['adult_commission'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['adult_discount'],$offers_data['currency_type']) ?></td>
            <td><?= $offers_data['countOffer'] ?></td>
            <td><?= $offers_data['chld_purchased_offer'] + $offers_data['adlt_purchased_offer'] ?></td>
            <td><?= get_price($offers_data['totalAmount'])  ?></td>
            <td>
              <?php
              $countryNameFound = false;
              foreach ($country as $cntry) {
                  if ($offers_data['country'] === $cntry['id']) {
                      echo $cntry['name'];
                      $countryNameFound = true;
                      break;
                  }
              }
              if (!$countryNameFound) {
                  echo $offers_data['country'];
              }
              ?>
            </td>
            <td>
            <?php
              $stateNameFound = false;
              foreach ($state as $sta) {
                  if ($offers_data['state'] === $sta['id']) {
                      echo $sta['name'];
                      $stateNameFound = true;
                      break;
                  }
              }
              if (!$stateNameFound) {
                  echo $offers_data['state'];
              }
              ?>
            </td>
            <td><a onclick="edit_offer(<?= $offers_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
            <a onclick="openItemTranslationModal(<?= $offers_data['id'] ?>)" class="btn btn-success">
                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                <i class="bi bi-translate"></i>
            </a>
            <a onclick="viewVoucher(<?= $offers_data['id'] ?>,<?= $pro_id ?>)" class="btn btn-success"><i class="bi bi-box-seam"></i></a>
          </td>
		  <td>
		  <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" aria-labelledby="providerDropdown">
				  	<a  class="dropdown-item " onclick="deleteOffer(<?= $offers_data['id'] ?>)">Delete</a>
                  </div>
            </div>
		  </td>
        </tr>
    <?php } 
    }else{ ?>
        <tr>
            <td colspan="16" class="text-center">Data Not Found</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="modal" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="offerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content comingsoon_model">
        <div class="modal-header coming_header">               
          <button type="button" class="add_offer_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <div class="offer_form"></div>
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
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label"><?= $this->lang->line('description'); ?></label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-description" id="<?= strtolower($language['language_name']) ?>-item-description" rows="5"></textarea>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="" class="translate_language_item_label">Term And Condition</label>
                                                <textarea class="form-control shadow-none item_description_txt" name="<?= strtolower($language['language_name']) ?>-item-term" id="<?= strtolower($language['language_name']) ?>-item-term" rows="5"></textarea>
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
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('description'); ?></label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-description" id="english-item-description" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Term And Condition</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="english-item-term" id="english-item-term" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('dutch');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="dutch-item-title" name="dutch-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('description'); ?></label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-description" id="dutch-item-description" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Term And Condition</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="dutch-item-term" id="dutch-item-term" rows="5"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('french');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="french-item-title" name="french-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('description'); ?></label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-description" id="french-item-description" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Term And Condition</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="french-item-term" id="french-item-term" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('german');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="german-item-title" name="german-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('description'); ?></label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-description" id="german-item-description" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Term And Condition</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="german-item-term" id="german-item-term" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-4 d-flex my-2" style="justify-content: space-between; flex-direction: column;">
                                <div class="mb-2 <?php if($this->session->userdata("site_lang") == "hebrew") { echo "d-flex justify-content-start"; } ?>"><?= $this->lang->line('hebrew');?></div>
                                <div class="input-wrapper mb-3">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('title'); ?></label>
                                    <input type="text" class="form-control shadow-none" value="" id="hebrew-item-title" name="hebrew-item-title">
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label"><?= $this->lang->line('description'); ?></label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-description" id="hebrew-item-description" rows="5"></textarea>
                                </div>
                                <div class="input-wrapper">
                                    <label for="" class="translate_language_item_label">Term And Condition</label>
                                    <textarea class="form-control shadow-none item_description_txt" name="hebrew-item-term" id="hebrew-item-term" rows="5"></textarea>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <input type="hidden" name="offer_id" id="current-item-id">
                <input type="hidden" name="tlang_id" id="current-tlangi-id">
                <div class="modal-footer border-0">
                    <button type="button" class="category_item_translate_cancel_btn" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
                    <button type="submit" class="category_item_translate_save_btn"><?= $this->lang->line('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  function edit_offer(id)
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
            url : "<?= base_url('admin/edit_offer_ajaxRequest'); ?>",
            type : "POST",
            data : {id:id},
            dataType : "json",
            success : function(res)
            {
              Swal.close(); 
                console.log(res);
                if(res.status == true)
                {
                    $('#offerModal').css('display','block');
                    $(".offer_form").html(res.html);
                }
            }
        });
    }
    $(".add_offer_close").click(function(){
        $('#offerModal').css('display','none');
    });
    function openItemTranslationModal(offer_id) {
        $.ajax({
            url: '<?= base_url('admin/get_translations') ?>',
            type: 'POST',
            data: {
                'offer_id': offer_id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.status == true) {
                    let title = data.data.title;
                    $.each(title, function(key, val) {
                        $('#'+val.title+'-item-title').val(val.trans); 
                    });

                    let description = data.data.description;
                    $.each(description, function(key, val) {
                        $('#'+val.title+'-item-description').val(val.trans); 
                    });

                    $('#current-item-id').val(offer_id)
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
            url: '<?= base_url('admin/save_translations') ?>',
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
    });

    function viewVoucher(offer_id,pro_id)
    {
        $.ajax({
            url : "<?= base_url('admin/viewproviderSingleOfferQr') ?>",
            data : {offer_id:offer_id,pro_id:pro_id},
            dataType : "json",
            type : "POST",
            success : function(res){
                $('#offerModal').css('display','block');
                $(".offer_form").html(res.html);
            }
        });
    }
	function deleteOffer(id) {
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
                url: "<?= base_url('admin/delete_offerAjaxRequest'); ?>",
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