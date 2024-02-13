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
  height: 55px;
  padding: 1%;
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
  <h2>Area List</h2>
  <button onclick="addArea()" class="btn btn-primary" style="height: 100%;">Add Area</button>
</div>

<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
    <th>Sr. No.</th>
    <th>Area Name</th>
	<th>edit</th>
	<th>delete</th>
  </tr>
  <tbody class="tbodyarea">

  <?php if(!empty($areas)){ $i = 1;
    foreach($areas as $area){?>
        <tr id="<?= $area['id'] ?>">
            <td><?= $i++; ?></td>
            <td><?= $area['area'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit_area(<?= $area['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
			<td><a href="javascript:void(0)" onclick="delete_area(<?= $area['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
   <?php } 
  }else{ ?>

    <tr>
        <td colspan="4" style="text-align:center">Data Not Found</td>
    </tr>
  <?php } ?>
 
  </tbody>
</table>

<div class="modal" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="areaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content comingsoon_model">
      <div class="modal-header coming_header">               
        <button type="button" class="add_area_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="area_form"></div>
      </div>
    </div>
  </div>
</div> 

<script>
	function addArea()
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
			url : "<?= base_url('admin/addArea_ajaxRequest'); ?>",
			type : "POST",
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					// console.log(res);
					$('#areaModal').css('display','block');
					$(".area_form").html(res.html);
				}
			}
		});
	}

	$(".add_area_close").click(function(){
		$('#areaModal').css('display','none');
	});

	function edit_area(id)
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
			url : "<?= base_url('admin/edit_area_ajaxRequest'); ?>",
			type : "POST",
			data : {id:id},
			dataType : "json",
			success : function(res)
			{
			Swal.close(); 
				if(res.status == true)
				{
					console.log(res);
					$('#areaModal').css('display','block');
						$(".area_form").html(res.html);
				}
			}
		});
	}

	function delete_area(id)
	{
		Swal.fire({
			title: 'Are you sure?',
			text: 'You won\'t be able to revert this!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?= base_url('admin/delete_AreaAjaxRequest'); ?>",
					type: "POST",
					data: { id: id },
					dataType: "json",
					success: function (res) {
						console.log(res);
						if (res.status == true) {
							$("#"+id+"").fadeOut();
						}
					}
				});
			}
		});

	}

</script>
