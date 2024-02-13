<table class="table  table-striped"  style="font-size:10px">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Country</th>
    <th>State</th>
  </tr>
  <tbody class="tbodyAffilUser">

  <?php if(!empty($affiliatorUser)){
    foreach($affiliatorUser as $affiliatorUser_data){?>
        <tr id="<?= $affiliatorUser_data['id'] ?>">
            <td><?= $affiliatorUser_data['name'] ?></td>
            <td><?= $affiliatorUser_data['email'] ?></td>
            <td><?= $affiliatorUser_data['phone'] ?></td>
            <td><?= $affiliatorUser_data['country'] ?></td>
            <td><?= $affiliatorUser_data['state'] ?></td>
        </tr>
   <?php } 
  }else{ ?>
    <tr>
        <td colspan="3" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
  
  
</table>
