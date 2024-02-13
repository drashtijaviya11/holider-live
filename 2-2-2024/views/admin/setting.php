<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>

.row {
    margin-bottom: 15px;
}

label {
    display: block; 
    margin-bottom: 5px;
}

select {
    width: 100%; 
    padding: 8px; 
    box-sizing: border-box; 
}

</style>
<div class="container">
	<form id="settingForm">
        <div class="row">
            <div class="col-2">
                <label for="">Default Currency</label>
            </div>
            <div class="col-4">
                <select name="currency" id="">
                    <?php foreach($currency as $curr) { ?>
						<?php  $selected = ($curr['code'] == $setting['default_currency']) ? 'selected' : ''; ?>
                        <option value="<?= $curr['code']; ?>" <?= $selected ?>><?= $curr['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="">Default Language</label>
            </div>
            <div class="col-4">
                <select name="language" id="">
                    <?php foreach($languages as $lang) { ?>
						<?php  $selected = ($lang['language_name'] == $setting['default_lang']) ? 'selected' : ''; ?>
                        <option value="<?= $lang['language_name']; ?>" <?= $selected ?>><?= $lang['language_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
	</form>
</div>

<script>
	$("#settingForm").submit(function(e){
		e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/save_setting'); ?>',
            data: $('#settingForm').serialize(),
            success: function(res) {
				console.log(res);
                if (res.status == true) {
					new Noty({
						type: 'success',
						text: res.message,
						timeout: 3000, // 3 seconds
						progressBar: true
					}).show();
                } 
            },
            error: function() {
                console.error('An error occurred while submitting the form.');
            }
        });
	});

</script>
