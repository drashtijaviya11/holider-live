<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.dataTables_wrapper {
  padding: 1% !important
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
.modal-dialog{
  max-width:98% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 92% !important;
}

.dataTables_scrollBody {
    padding-bottom  : 7% !important;
}
.dropdown-menu{
  /*left: -63% !important;*/
  min-width: fit-content !important;
  padding: 7px !important;
}

.data-ap a{
  /* color: #1e5b8b; */
  text-decoration: none;
  font-weight: 700;
}
</style>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     -->
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="temp">
<h2>Provider List</h2>

<button onclick="addProvider()" class="btn btn-primary" style="height: 100%;">Add Provider</button>


</div>
<table class="table" style="font-size:10px;" id="providerTable">
<thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Country</th>
    <th>State</th>
    <th>Redeemed</th>
    <th>Unredeemed</th>
    <th>Paid</th>
    <th>Unpaid</th>
    <th>Admin Commission</th>
    <th>Affiliator Commission</th>
    <th style="text-align:center">Offer</th>
    <th>Actions</th>
  </tr>
</thead>
  <tbody class="tbodyPro">
  <?php if(!empty($provider)){
    foreach($provider as $provider_data){?>
        <tr class="data-ap" id="<?= $provider_data['id'] ?>">
            <td><?= $provider_data['name'] ?></td>
            <td><?= $provider_data['email'] ?></td>
            <td><?= $provider_data['phone'] ?></td>
            <td>
              <?php
              $countryNameFound = false;
              foreach ($country as $cntry) {
                  if ($provider_data['country'] === $cntry['id']) {
                      echo $cntry['name'];
                      $countryNameFound = true;
                      break;
                  }
              }
              if (!$countryNameFound) {
                  echo $provider_data['country'];
              }
              ?>
            </td>
            <td>
            <?php
              $stateNameFound = false;
              foreach ($state as $sta) {
                  if ($provider_data['state'] === $sta['id']) {
                      echo $sta['name'];
                      $stateNameFound = true;
                      break;
                  }
              }
              if (!$stateNameFound) {
                  echo $provider_data['state'];
              }
              ?>
            </td>
            <td><a href="javascript:void(0)" onclick="reedemVoucher(<?= $provider_data['id'] ?>)"><?= get_price($provider_data['redm_vouchers']); ?></a></td>
            <td><a href="javascript:void(0)" onclick="unReedemVoucher(<?= $provider_data['id'] ?>)"><?= get_price($provider_data['unredm_vouchers']); ?></a></td>
            <td><a href="javascript:void(0)" onclick="paidTransaction(<?= $provider_data['id'] ?>)"><?=get_price($provider_data['paid']) ?></a></td>
            <td><a href="javascript:void(0)" onclick="unPaidTransaction(<?= $provider_data['id'] ?>)"><?=get_price($provider_data['unpaid']) ?></a></td>
            <td><?= get_price($provider_data['commission']); ?></td>
            <td><?= get_price($provider_data['aff_comission']); ?></td>
            <td><a  class="btn btn-secondary" onclick="viewOfferList(<?= $provider_data['id'] ?>)"><i class="bi bi-eye"></i></a>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary"  onclick="addOffer(<?= $provider_data['id'] ?>)"><i class="bi bi-file-plus"></i></a></td>
            <td>
              <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" aria-labelledby="providerDropdown" style="position: absolute; left: -100%;";>
                    <a href="javascript:void(0)" class="dropdown-item" onclick="edit_provider(<?= $provider_data['id'] ?>)" >Edit</a>
                    <a href="javascript:void(0)" class="dropdown-item" id="status" class="ee" onclick="activeDeactive(<?= $provider_data['id'] ?>, <?= $provider_data['status'] ?>)">
                        <?php echo ($provider_data['status'] == 1) ? 'Deactive' : 'Active'; ?>
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item" onclick="providerOfferVoucher(<?= $provider_data['id']; ?>)">Vouchers</a>
                    <a class="dropdown-item" href="<?= base_url('admin/'.$provider_data['id'].'/employee'); ?>">Employee</a>
                      <!-- Add more items or customize as needed -->
                  </div>
              </div>
          </td>
   <?php } 
  }else{ ?>

    <tr>
      <td colspan="12" class="text-center">Data Not Found</td>
    </tr>
  <?php } ?>
  </tbody>
  
</table>
<div class="modal" id="providerModal" tabindex="-1" role="dialog" aria-labelledby="providerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content comingsoon_model">
            <div class="modal-header coming_header">               
                <button type="button" class="add_provider_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="provider_form"></div>
            </div>
        </div>
    </div>
</div>


<script>

  function addProvider() {
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
        url : "<?= base_url('admin/provider_ajaxRequest'); ?>",
        type : "POST",
        dataType : "json",
        success : function(res)
        {
            if(res.status == true)
            {
              Swal.close();
                console.log(res);
                $('#providerModal').css('display','block');
                $(".provider_form").html(res.html);
            }
        }
    });
}

$(".add_provider_close").click(function(){
  $('#providerModal').css('display','none');
});

function edit_provider(id)
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
        url : "<?= base_url('admin/edit_provider_ajaxRequest'); ?>",
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {
            if(res.status == true)
            {
              Swal.close();
                console.log(res);
                $('#providerModal').css('display','block');
                $(".provider_form").html(res.html);
            }
        }
    });
}

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
                url: "<?= base_url('admin/activeDeactiveProvider') ?>",
                type: "POST",
                data: { id: id, sta: sta },
                dataType: "json",
                success: function (res) {
                  console.log(res);
                    if (res.status === true) {
                      window.location.reload();
                    }
                }
            });
        }
    });
}

function addOffer(id)
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
          url : "<?= base_url('admin/add_offer_by_provider'); ?>",
          data : {id:id},
          type : "POST",
          dataType : "json",
          success : function(res)
          {
            Swal.close();
              console.log(res);
              if(res.status == true)
              {
                $('#providerModal').css('display','block');
                $(".provider_form").html(res.html);
              }
          }
      });
    }

    function loadOfferList(id,page)
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
            url : "<?= base_url('admin/providerOfferList'); ?>",
            data : {id:id,page:page},
            type : "POST",
            dataType : "json",
            success : function(res)
            {
              Swal.close();
                console.log(res);
                if(res.status == true)
                {
                  $('#providerModal').css('display','block');
                  $(".provider_form").html(res.content);
                }
            }
        });
    }
    function loadOfferListPagination()
    {
        $('#pagination').on('click', '.pagination-link', function(e) {
            e.preventDefault();
            console.log("object");
            var pageNumber = $(this).data('page');
            loadOfferList(id,pageNumber);
        });
    }
    function viewOfferList(id)
    {
      loadOfferList(id,1);
      loadOfferListPagination(id)
    }

    function reedemVoucher(id)
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
        url : '<?= base_url('admin/reedemVoucherList') ?>',
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {         
          Swal.close();    
          $('#providerModal').css('display','block');
          $(".provider_form").html(res.html);
        }
      });
    }
    function unReedemVoucher(id)
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
        url : '<?= base_url('admin/unReedemVoucherList') ?>',
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {
          Swal.close();
          $('#providerModal').css('display','block');
          $(".provider_form").html(res.html);
        }
      });
    }

    function unPaidTransaction(id)
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
        url : '<?= base_url('admin/unPaidList') ?>',
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {        
          Swal.close();     
          $('#providerModal').css('display','block');
          $(".provider_form").html(res.html);
        }
      });
    }

    function paidTransaction(id)
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
        url : '<?= base_url('admin/paidList') ?>',
        type : "POST",
        data : {id:id},
        dataType : "json",
        success : function(res)
        {
          Swal.close();
          $('#providerModal').css('display','block');
          $(".provider_form").html(res.html);
        }
      });
    }
    function providerOfferVoucher(id)
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
            url : "<?= base_url('admin/viewProviderOfferQr') ?>",
            data : {id:id},
            dataType : "json",
            type : "POST",
            success : function(res){
              Swal.close();
                $('#providerModal').css('display','block');
                $(".provider_form").html(res.html);
            }
        });
    }
		$(document).ready(function() {
    var rowCount = $("#providerTable tbody tr").length;

    if (rowCount > 0) {
        $('#providerTable').DataTable({
            "autoWidth": false,
            "responsive": true,
            "scrollX": true,
            // Add more options as needed...
        });
    }
});

</script>
</body>
</html>

