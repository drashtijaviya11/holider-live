<?php if(!empty($affiliator)){
    foreach($affiliator as $affiliator_data){?>

            <td><?= $affiliator_data['name'] ?></td>
            <td><?= $affiliator_data['email'] ?></td>
            <td><?= $affiliator_data['phone'] ?></td>
			<td><?= get_price(0) ?></td>
			<td><?= get_price(0) ?></td>
			<td><?= get_price(0) ?></td>
            <td>
              <?php
              $countryNameFound = false;
              foreach ($country as $cntry) {
                  if ($affiliator_data['country'] === $cntry['id']) {
                      echo $cntry['name'];
                      $countryNameFound = true;
                      break;
                  }
              }
              if (!$countryNameFound) {
                  echo $affiliator_data['country'];
              }
              ?>
            </td>
            <td>
            <?php
              $stateNameFound = false;
              foreach ($state as $sta) {
                  if ($affiliator_data['state'] === $sta['id']) {
                      echo $sta['name'];
                      $stateNameFound = true;
                      break;
                  }
              }
              if (!$stateNameFound) {
                  echo $affiliator_data['state'];
              }
              ?>
            </td>
            <td><a onclick="edit_affiliator(<?= $affiliator_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
            <?php  if($affiliator_data['status'] == 1) { ?>
            <td><a  class="btn btn-warning" onclick="activeDeactive(<?= $affiliator_data['id'] ?>,<?= $affiliator_data['status'] ?>)"><i class="bi bi-hand-thumbs-up"></i>
            <?php } else { ?>
            <td><a  class="btn btn-danger" onclick="activeDeactive(<?= $affiliator_data['id'] ?>,<?= $affiliator_data['status'] ?>)"><i class="bi bi-hand-thumbs-down"></i>
            <?php } ?>
			<td>
				<div class="dropdown">
				<button class="btn btn-warning dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
				<div class="dropdown-menu" aria-labelledby="providerDropdown" style="left: -94% !important;cursor:pointer;">
					<a  class="dropdown-item " onclick="viewAffiliatorUser(<?= $affiliator_data['id'] ?>)">View User</a>
				</div>
				</div>
			</td>
            
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="8" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>