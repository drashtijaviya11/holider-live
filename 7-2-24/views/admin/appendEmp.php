
  <?php if(!empty($employee)){
    foreach($employee as $employee_data){?>
            <td><?= $employee_data['name'] ?></td>
            <td><?= $employee_data['email'] ?></td>
            <td><?= $employee_data['phone'] ?></td>
            <td><a onclick="edit_employee(<?= $employee_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
            <?php  if($employee_data['status'] == 1) { ?>
            <td><a  class="btn btn-warning" onclick="activeDeactive(<?= $employee_data['id'] ?>,<?= $employee_data['status'] ?>)"><i class="bi bi-hand-thumbs-up"></i>
              <?php } else { ?>
              <td><a  class="btn btn-danger" onclick="activeDeactive(<?= $employee_data['id'] ?>,<?= $employee_data['status'] ?>)"><i class="bi bi-hand-thumbs-down"></i>
              <?php } ?>
            </td>

   <?php } 
  }else{ ?>

        <td colspan="8" style="text-align:center">Data Not Found</td>

  <?php } ?>
 