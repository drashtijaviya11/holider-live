<?php if(!empty($offers)){
    foreach($offers as $offers_data){?>

            <td><?= $offers_data['name'] ?></td>
            <td><?= $offers_data['category'] ?></td>
            <td><?php foreach ($providers as $provider) {if ($provider['id'] == $offers_data['provider_id']) {echo $provider['name'];}} ?></td>
            <td><?= get_currency($offers_data['child_price'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['child_commission'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['child_discount'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['adult_price'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['adult_commission'],$offers_data['currency_type']) ?></td>
            <td><?= get_currency($offers_data['adult_discount'],$offers_data['currency_type']) ?></td>
            <td><?= $offers_data['countOffer'] ?></td>
            <td><?= $offers_data['chld_purchased_offer'] + $offers_data['adlt_purchased_offer'] ?></td>
            <td><?= get_currency($offers_data['totalAmount'],$offers_data['currency_type']) ?></td>
            <td>
              <?php
              $countryNameFound = false;
              foreach ($country as $cntry) {
                  if ($offers_data['country'] === $cntry['id']) {
                      echo $cntry['name'];
                      $countryNameFound = true;
                      break;
                  }
              }
              if (!$countryNameFound) {
                  echo $offers_data['country'];
              }
              ?>
            </td>
            <td>
            <?php
              $stateNameFound = false;
              foreach ($state as $sta) {
                  if ($offers_data['state'] === $sta['id']) {
                      echo $sta['name'];
                      $stateNameFound = true;
                      break;
                  }
              }
              if (!$stateNameFound) {
                  echo $offers_data['state'];
              }
              ?>
            </td>
            <td><a onclick="edit_offer(<?= $offers_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
            <a onclick="openItemTranslationModal(<?= $offers_data['id'] ?>)" class="btn btn-success">
                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                <i class="bi bi-translate"></i>
            </a>
          </td>
          <td>
            <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" aria-labelledby="providerDropdown">
                    <a  class="dropdown-item " onclick="deleteOffer(<?= $offers_data['id'] ?>)">Delete</a>
                    <a  class="dropdown-item " onclick="viewOfferDetail(<?= $offers_data['id'] ?>)">View</a>
                  </div>
            </div>
          </td>

    <?php } 
    }else{ ?>
        <tr>
            <td>Data Not Found</td>
        </tr>
    <?php } ?>