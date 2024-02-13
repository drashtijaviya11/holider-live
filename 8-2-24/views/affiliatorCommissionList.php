<?php
		$user_id = $this->session->userdata('id');
		$condition = array('conditions' => ['id' => $user_id ]);
		$affilator = $this->QueryModel->selectSingleRow('users' ,$condition);
		$default_currency = $affilator['default_currency'];
	?>
	<?php $currency_code = $this->input->cookie('currency_code',true); ?>
<?php foreach($affiliatorCommissionList as $list) { ?>
	<tr class="af-main-list">
		<td class="af-item1" style="width: 15%;"><?php echo get_translation($list->username); ?></td>
		<td class="af-item2" style="width: 40%;"><?php echo get_translation($list->offer_detail); ?></td>
		<td class="af-item3" style="width: 15%;"><?= get_currency($list->amount,$list->currency_type); ?> </th>
		<td class="af-item4" style="width: 15%;"><?= date('m/d/y',strtotime($list->created_at)); ?></th>
		<td class="af-item5" style="width: 15%;">5%</th>
	</tr>
<?php } ?>
