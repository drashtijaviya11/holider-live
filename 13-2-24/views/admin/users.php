
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
</style>


<h2 style="width:98%; margin:auto; padding: 1% 0;">Users List</h2>

<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Country</th>
    <th>State</th>
  </tr>
  <?php if(!empty($users)){
    foreach($users as $users_data){?>
        <tr>
            <td><?= $users_data['name'] ?></td>
            <td><?= $users_data['email'] ?></td>
            <td><?= $users_data['phone'] ?></td>
            <td><?= $users_data['country'] ?></td>
            <td><?= $users_data['state'] ?></td>
        </tr>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="5">Data Not Found</td>
    </tr>
  <?php } ?>
 
  
  
</table>

</body>
</html>

