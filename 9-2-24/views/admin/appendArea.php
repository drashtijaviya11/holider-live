<?php if(!empty($area)){
	$i = $this->QueryModel->record_count('area');
    foreach($area as $area_data){?>
            <td><?= $i; ?></td>
            <td><?= $area_data['area'] ?></td>
						<td><a href="javascript:void(0)" onclick="edit_area(<?= $area_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
						<td><a href="javascript:void(0)" onclick="delete_area(<?= $area_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
   <?php } 
  }
?>
