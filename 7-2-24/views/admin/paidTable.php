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
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  margin-bottom: 20px;
}
.modal-dialog{
  max-width:75% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 80% !important;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>
<div class="temp">
<h2>Paid List</h2>
</div>


<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Person type</th>
    <th>Price</th>
    <th>purchase_date</th>
    <th>expire_date</th>
     <th>Status</th>
  </tr>
  <?php if(!empty($paidList)){
    foreach($paidList as $list){?>
        <tr class="data-ap">
           <td><?= $list['offer_name'] ?> </td>
	    <td><?= $list['person_type'] ?> </td>
            <td><?= $list['price'] ?></td>
            <td><?= $list['purchase_date'] ?></td>
            <td><?= $list['expire_date'] ?></td>
             <td><?= $list['payment_nature'] ?></td>
    <?php } 
    }else{ ?>
        <tr>
            <td class="text-center" colspan="6">Data Not Found</td>
        </tr>
    <?php } ?>
 
  
  
</table>

<!-- <div id="pagination"  style="justify-content: center; display: flex;"></div> -->
<script>
  
</script>