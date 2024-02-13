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
.modal-dialog{
  max-width:78% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 72% !important;
}
.tbodyAffil a{
  /* color: #1e5b8b; */
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
  <h2>Affiliator List</h2>
  <button onclick="addaffiliator()" class="btn btn-primary" style="height: 40px;">Add Affiliator</button>
</div>

<table class="table  table-striped"  style="font-size:10px">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Commission</th>
    <th>Paid</th>
    <th>UnPaid</th>
    <th>Country</th>
    <th>State</th>
    <th>Edit</th>
    <th>Active/Dactive</th>
    <th>Action</th>
  </tr>
  <tbody class="tbodyAffil">

  <?php if(!empty($affiliator)){
    foreach($affiliator as $affiliator_data){?>
        <tr id="<?= $affiliator_data['id'] ?>">
            <td><?= $affiliator_data['name'] ?></td>
            <td><?= $affiliator_data['email'] ?></td>
            <td><?= $affiliator_data['phone'] ?></td>
						<td style="cursor:pointer;color:">
							<a href="javascript:void(0)" onclick="commissionOffer(<?= $affiliator_data['id'] ?>)" ><?= $affiliator_data['affiliatorTotalCommission'] != ''? get_price($affiliator_data['affiliatorTotalCommission']):get_price(0); ?></a>	
						</td>
						<td><?= $affiliator_data['Paid'] != '' ? get_price($affiliator_data['Paid']) : get_price(0); ?></td>
						<td><?= $affiliator_data['Unpaid'] != '' ? get_price($affiliator_data['Unpaid']) : get_price(0); ?></td>
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
						<td>
							<?php  if($affiliator_data['status'] == 1) { ?>
								<a class="btn btn-warning" onclick="activeDeactive(<?= $affiliator_data['id'] ?>,<?= $affiliator_data['status'] ?>)"><i class="bi bi-hand-thumbs-up"></i>
							<?php } else { ?>
								<a  class="btn btn-danger" onclick="activeDeactive(<?= $affiliator_data['id'] ?>,<?= $affiliator_data['status'] ?>)"><i class="bi bi-hand-thumbs-down"></i>
							<?php } ?>
						</td>
						<td>
							<div class="dropdown">
							<button class="btn btn-warning dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu" aria-labelledby="providerDropdown" style="left: -94% !important;cursor:pointer;">
								<a  class="dropdown-item " onclick="viewAffiliatorUser(<?= $affiliator_data['id'] ?>)">View User</a>
							</div>
							</div>
						</td>
        </tr>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="8" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
  
  
</table>
<div class="modal" id="affiliatorModal" tabindex="-1" role="dialog" aria-labelledby="affiliatorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content comingsoon_model">
      <div class="modal-header coming_header">               
        <button type="button" class="add_afiliator_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="affiliator_form"></div>
      </div>
    </div>
  </div>
</div> 
<script>

  function addaffiliator() {
      /**********Loader**************/
      Swal.fire({
      title: 'Loading...',
      showConfirmButton: false,
      allowOutsideClick: false,
      willOpen: () => {
          Swal.showLoading();
      }
  });                    
  /**********Loader**************/
    $.ajax({
        url : "<?= base_url('admin/affiliator_ajaxRequest'); ?>",
        type : "POST",
        dataType : "json",
        success : function(res)
        {
          Swal.close(); 
            if(res.status == true)
            {
                console.log(res);
                $('#affiliatorModal').css('display','block');
                $(".affiliator_form").html(res.html);
            }
        }
    });
}

$(".add_afiliator_close").click(function(){
  $('#affiliatorModal').css('display','none');
});

function activeDeactive(id, sta) {
  if(sta == 1){
    var result = "Deacivate";
  }else{
    var result = "Acivate";
  }
    Swal.fire({
        title: 'Confirmation',
        text: 'Are you sure you want to '+result+' this user?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('admin/activeDeactiveProvider'); ?>",
                type: "POST",
                data: { id: id, sta: sta },
                dataType: "json",
                success: function (res) {
                    if (res.status == true) {
                        window.location.reload();
                    }
                }
            });
        }
    });
}

function edit_affiliator(id)
{
  /**********Loader**************/
  Swal.fire({
    title: 'Loading...',
    showConfirmButton: false,
    allowOutsideClick: false,
    willOpen: () => {
        Swal.showLoading();
    }
  });                    
  /**********Loader**************/

  $.ajax({
        url : "<?= base_url('admin/edit_affiliator_ajaxRequest'); ?>",
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {
          Swal.close(); 
            if(res.status == true)
            {
                console.log(res);
                $('#affiliatorModal').css('display','block');
                $(".affiliator_form").html(res.html);
            }
        }
    });
}

function viewAffiliatorUser(id)
{

/**********Loader**************/
// Swal.fire({
// 	title: 'Loading...',
// 	showConfirmButton: false,
// 	allowOutsideClick: false,
// 	willOpen: () => {
// 			Swal.showLoading();
// 	}
// });                    
/**********Loader**************/
$.ajax({
        url : "<?= base_url('admin/viewAffiliatorUser'); ?>",
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {
					console.log(res);
          // Swal.close(); 
            if(res.status == true)
            {
                // console.log(res);
                $('#affiliatorModal').css('display','block');
                $(".affiliator_form").html(res.html);
            }
        }
    });
}

function commissionOffer(id)
{
	$.ajax({
        url : "<?= base_url('admin/affiliatorCommissionOffer'); ?>",
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {
					console.log(res);
          // Swal.close(); 
            if(res.status == true)
            {
                // console.log(res);
                $('#affiliatorModal').css('display','block');
                $(".affiliator_form").html(res.html);
            }
        }
    });
}
</script>

</body>
</html>

