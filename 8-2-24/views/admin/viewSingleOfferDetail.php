<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Category</th>
    <th>Provider Name</th>
    <th>Child Price</th>
    <th>Child Commission</th>
    <th>Child Discount</th>
    <th>Adult Price</th>
    <th>Adult Commission</th>
    <th>Adult Discount</th>
    <th>Total Sale Offer</th>
    <th>Sale Offer Qty</th>
    <th>Total Sale Price</th>
    <th>state</th>
    <th>Country</th>
  </tr>
  <tbody class="tbodyOffer">
  <?php if(!empty($offers)){
    foreach($offers as $offers_data){?>
         <?php $currency_code = $offers_data['currency_type']; ?>
        <tr class="data-ap" id="<?= $offers_data['id']  ?>">
            <td><?= $offers_data['name'] ?></td>
            <td><?= $offers_data['category'] ?></td>
            <td><?php foreach ($providers as $provider) {if ($provider['id'] == $offers_data['provider_id']) {echo $provider['name'];}} ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['child_price'] ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['child_commission'] ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['child_discount'] ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['adult_price'] ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['adult_commission'] ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['adult_discount'] ?></td>
            <td><?= $offers_data['countOffer'] ?></td>
            <td><?= $offers_data['chld_purchased_offer'] + $offers_data['adlt_purchased_offer'] ?></td>
            <td><?= getCurrencySymbol($currency_code).$offers_data['totalAmount'] ?></td>
            <td><?= $offers_data['state'] ?></td>
            <td><?= $offers_data['country'] ?></td>
    <?php } 
    }else{ ?>
        <tr>
          <td colspan="14" class="text-center">Data Not Found</td>
        </tr>
    <?php } ?>
    </tbody>
  
  
</table>