<?php if(!empty($default_currency)) {
foreach($default_currency as $curr) { ?>
	<option value="<?= $curr['code']; ?>"><?= $curr['code']; ?></option>
<?php } } ?>
