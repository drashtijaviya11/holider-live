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
  height: 50px;
  padding: 1%;
}
.add_devi{
	color: white;
    text-decoration: none;
    font-weight: 700;
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
  <h2>Device List</h2>
  <button class="btn btn-primary" style="height: 100%;"><a href="<?= base_url('admin/add_device'); ?>" class="add_devi">Add Device</a></button>
</div>

<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
	<th>Sr. No.</th>
	<th>User Name</th>
    <th>Serial Number</th>
  </tr>
  <tbody class="tbodyAffil">
<?php if($devices){ $i=1;
	foreach($devices as $device) { ?>
	<tr>
	<td><?= $i++; ?></td>
	<td><?= $device['name'] ?></td>
	<td><?= $device['serial'] ?></td>
	</tr>
   <?php }  }else{ ?>

    <tr>
        <td colspan="8" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
  
  
</table>



