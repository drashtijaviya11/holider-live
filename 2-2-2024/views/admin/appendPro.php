</tr>
  <?php if(!empty($provider)){
    foreach($provider as $provider_data){?>

            <td><?= $provider_data['name'] ?></td>
            <td><?= $provider_data['email'] ?></td>
            <td><?= $provider_data['phone'] ?></td>
            <td>
              <?php
              $countryNameFound = false;
              foreach ($country as $cntry) {
                  if ($provider_data['country'] === $cntry['id']) {
                      echo $cntry['name'];
                      $countryNameFound = true;
                      break;
                  }
              }
              if (!$countryNameFound) {
                  echo $provider_data['country'];
              }
              ?>
            </td>
            <td>
            <?php
              $stateNameFound = false;
              foreach ($state as $sta) {
                  if ($provider_data['state'] === $sta['id']) {
                      echo $sta['name'];
                      $stateNameFound = true;
                      break;
                  }
              }
              if (!$stateNameFound) {
                  echo $provider_data['state'];
              }
              ?>
            </td>
            <td><a href="javascript:void(0)" onclick="reedemVoucher(<?= $provider_data['id'] ?>)"><?php if(!isset($provider_data['redm_vouchers'])){ echo get_price(0); }else{ echo get_price(number_format($provider_data['redm_vouchers'],2));} ?></a></td>
            <td><a href="javascript:void(0)" onclick="unReedemVoucher(<?= $provider_data['id'] ?>)"><?php if(!isset($provider_data['unredm_vouchers'])){ echo get_price(0); }else{ echo get_price(number_format($provider_data['unredm_vouchers'],2));} ?></a></td>
            <td><a href="javascript:void(0)" onclick="paidTransaction(<?= $provider_data['id'] ?>)"><?=get_price(00.00) ?></a></td>
            <td><a href="javascript:void(0)" onclick="unPaidTransaction(<?= $provider_data['id'] ?>)"><?=get_price(00.00) ?></a></td>
						<td><a href="javascript:void(0)" ><?=get_price(00.00) ?></a></td>
            <td><a  class="btn btn-secondary" onclick="viewOfferList(<?= $provider_data['id'] ?>)"><i class="bi bi-eye"></i></a>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary"  onclick="addOffer(<?= $provider_data['id'] ?>)"><i class="bi bi-file-plus"></i></a></td>
            <td>
              <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" aria-labelledby="providerDropdown">
                    <a class="dropdown-item btn btn-success" onclick="edit_provider(<?= $provider_data['id'] ?>)" >Edit</a>
                  <?php  if($provider_data['status'] == 1) { ?>
                    <a  class="dropdown-item btn btn-warning" onclick="activeDeactive(<?= $provider_data['id'] ?>,<?= $provider_data['status'] ?>)">Deactive</a>
                  <?php } else { ?>
                    <a  class="dropdown-item btn btn-danger" onclick="activeDeactive(<?= $provider_data['id'] ?>,<?= $provider_data['status'] ?>)">Active</a>
                  <?php } ?>
                      <a class="dropdown-item" href="<?= base_url('admin/'.$provider_data['id'].'/employee'); ?>">Employee</a>
                      <!-- Add more items or customize as needed -->
                  </div>
              </div>
          </td>

   <?php } 
  }else{ ?>

    <tr>
        <td>Data Not Found</td>
    </tr>
  <?php } ?>