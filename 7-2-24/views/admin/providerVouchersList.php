<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.temp{
  margin-right: 10px;
  height: 40px;
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  margin-bottom: 20px;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>



<div class="temp" style="">
  <h2>Voucher List</h2>
</div>

<table class="table  table-striped">
  <tr>
    <th>Sr. No</th>
    <th>Offer Name</th>
    <th>Price</th>
    <th>Purchase Date</th>
    <th><?= lang('expire_date');?></th>

  </tr>
  <?php if(!empty($vouchers)){  $i = 1;
    foreach($vouchers as $vouchers_data){?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $vouchers_data['offer_name'] ?></td>
            <td><?= get_price($vouchers_data['price']) ?></td>
            <td><?= $vouchers_data['purchase_date'] ?></td>
            <td><?= $vouchers_data['expire_date'] ?></td>
        </tr>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="5" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  
  
</table>