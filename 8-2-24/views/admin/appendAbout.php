<?php if(!empty($about_us)){ 
    foreach($about_us as $about_us_data){?>
            <td><?= $about_us_data['heading'] ?></td>
            <td><?= $about_us_data['our_mission'] ?></td>
			<td><?= $about_us_data['our_vision'] ?></td>
			<td><?= $about_us_data['our_history'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit_about_us(<?= $about_us_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
			<td><a href="javascript:void(0)" onclick="delete_about_us(<?= $about_us_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
   <?php } 
  } ?>
