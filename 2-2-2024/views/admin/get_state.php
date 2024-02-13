<?php if(!empty($states)) {
foreach($states as $state) { ?>
	<option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
<?php } } ?>
