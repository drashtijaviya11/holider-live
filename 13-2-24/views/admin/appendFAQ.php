<?php 
if(!empty($faq)){ $i = 1;
    foreach($faq as $faq_data){?>
            <td><?= $faq_data['question'] ?></td>
            <td><?= $faq_data['answer'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit_area(<?= $faq_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
			<td><a href="javascript:void(0)" onclick="delete_area(<?= $faq_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
   <?php } 
  } ?>
