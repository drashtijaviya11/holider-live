<table class="table  table-striped"  style="font-size:10px">
  <tr>
    <th>Offer Name</th>
    <th>Commission</th>
    <th>Date</th>
  </tr>
  <tbody class="tbodyAffilUser">

  <?php if(!empty($affiliatorCommissionOffer)){
    foreach($affiliatorCommissionOffer as $affiliatorUserOffer){?>
        <tr id="<?= $affiliatorUserOffer['id'] ?>">
            <td><?= $affiliatorUserOffer['offer_detail'] ?></td>
            <td><?= get_price($affiliatorUserOffer['amount']) ?></td>
            <td><?= $affiliatorUserOffer['created_at'] ?></td>
        </tr>
   <?php } 
  }else{ ?>
    <tr>
        <td colspan="3" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
  
  
</table>
