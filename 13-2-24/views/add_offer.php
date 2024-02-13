
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


                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp"><?= lang('add_offer'); ?></div>
                        <hr>
                    </div>
                    <form action="" id="add_offer"  method="post" enctype="multipart/form-data">
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('offer_name'); ?></label>
                                <input type="text" name="offer_name" class="form-control temp" placeholder="<?= lang('enter_offer_name') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('address'); ?></label>
                                <input type="text" name="address" class="form-control temp" placeholder="<?= lang('enter_address') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('state'); ?></label>
                                <input type="text" name="state" class="form-control temp" placeholder="<?= lang('enter_state_name') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('country'); ?></label>
                                <input type="text" name="country" class="form-control temp" placeholder="<?= lang('enter_country_name') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for=""><?= lang('city'); ?></label>
                                <input type="text" name="city" class="form-control temp" placeholder="<?= lang('enter_city_name') ?>">
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('phone'); ?></label>
                                <input type="text" name="phone" class="form-control temp" placeholder="<?= lang('enter_mobile_no') ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6 mt-1">
                                <label for="category"><?= lang('category') ?></label>
                                <select class="form-control temp" name="category" id="category">
                                    <?php foreach($category as $catg) { ?>
                                    <option value="<?= $catg['id'] ?>"><?= $catg['category_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('detail') ?></label>
                                <textarea type="text" name="detail" class="form-control temp" placeholder="<?= lang('enter_detail') ?>"></textarea>
                                <!-- <main class="grid-container">
                                    <div id="editor2"></div>
                                </main> -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6 mt-1">
                                <label for=""><?= lang('upload_image') ?></label>
                                <input type="file" name="image[]" class="form-control temp" placeholder="" multiple>
                            </div>
                            <div class="col-6">
                                <label for=""><?= lang('price') ?></label>
                                <input type="text" name="price" class="form-control temp" placeholder="<?= lang('enter_price') ?>">
                            </div>
                        </div>
						<div class="row mt-2">
							<div class="col-6 mt-1">
								<label for=""><?= $lang('pickup'); ?></label>
								<input type="radio" class="form-control temp" name="pickup"><?= $lang('yes'); ?>
								<input type="radio" class="form-control temp" name="pickup"><?= $lang('no'); ?>
							</div>
							<div class="col-6 mt-1">
								<label for=""><?= $lang('refund'); ?></label>
								<input type="radio" class="form-control temp" name="refund"><?= $lang('yes'); ?>
								<input type="radio" class="form-control temp" name="refund"><?= $lang('no'); ?>
							</div>
						</div>
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- <script src="https://cdn.ckeditor.com/4.11.1/standard-all/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="<?= base_url('assets/js/ckfinder.js'); ?>"></script> -->
    <script>
$(document).ready(function(){
    $("#add_offer").submit(function(e){
        e.preventDefault();
        // var editorData = CKEDITOR.instances.editor2.getData();
        // console.log(editorData);
        var formData = new FormData(this);
        // formData.append('detail', editorData);
        $.ajax({
            url : "<?= base_url('admin/add_offer') ?>",
            data : formData,
            dataType : "json",
            type : "POST",
            contentType: false,
            processData: false,
			// beforeSend: function() {
			// 	$('#body-preloader').css('display', 'block');
			// },
            success : function(res)
            {
				// $('#body-preloader').css('display', 'none');
                // console.log(res);
                if(res.status == true)
                {
			window.location.reload();
                    //window.location = res.url;
                }
            }
        })

    });
});
    </script>
    <!-- <script>
	if ( typeof ClassicEditor !== 'undefined' ) {
		ClassicEditor
			.create( document.querySelector( '#editor1' ), {
				ckfinder: {
					// To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
					uploadUrl: '../core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
				},
				toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]

			} )
			.then( function( editor ) {
				console.log( editor );
			} )
			.catch( function( error ) {
				console.error( error );
			} );
	} else {
		document.getElementById( 'editor1' ).innerHTML =
			'<div class="tip-a tip-a-alert">This sample requires working Internet connection to load CKEditor 5 from CDN.</div>'
	}
	if ( typeof CKEDITOR !== 'undefined' ) {
		CKEDITOR.disableAutoInline = true;
		CKEDITOR.addCss( 'img {max-width:100%; height: auto;}' );
		var editor = CKEDITOR.replace( 'editor2', {
			extraPlugins: 'uploadimage,image2',
			removePlugins: 'image',
			height:250
		} );
		CKFinder.setupCKEditor( editor );
	} else {
		document.getElementById( 'editor2' ).innerHTML =
			'<div class="tip-a tip-a-alert">This sample requires working Internet connection to load CKEditor 4 from CDN.</div>'
	}

</script> -->
<!-- <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script> -->