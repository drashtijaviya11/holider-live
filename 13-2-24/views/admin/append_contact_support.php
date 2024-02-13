<?php
$condition = array('conditions' => ['id' => $id]);
$temp = $this->QueryModel->SelectSingleRow('contact_support',$condition);
$questionCondition = array('conditions' => ['id' => $temp['parrent_id']]);
$question = $this->QueryModel->SelectSingleRow('contact_support',$questionCondition);
$replyCondition = array('conditions' => ['parrent_id' => $question['id']]);
$replies = $this->QueryModel->selectData('contact_support',$replyCondition);
?>


		<td><?= $id; ?></td>
		<td><?= $question['message']; ?></td>
		<td>
			<?php foreach($replies as $reply){
				if($reply['parrent_id'] == $question['id']){
					echo $reply['message'].', ';
			  }}?>
		</td>
		<td><a  class="btn btn-success" onclick="reply_contactSupport(<?= $question['id'] ?>)"><i class="bi bi-reply"></i></td>

