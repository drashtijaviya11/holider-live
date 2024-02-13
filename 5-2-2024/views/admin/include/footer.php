<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="<?php echo base_url(); ?>assets\js\sweetalert2@11.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> -->
<script src="<?php echo base_url(); ?>assets\js\jquery.dataTables.js"></script>
<script>
    const $button  = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
  e.preventDefault();
  $wrapper.classList.toggle('toggled');
});


$("#country").change(function(){
var countryId = $("#country").val();
console.log(countryId);
		$.ajax({
			url : "<?= base_url('admin/getState') ?>",
			data : {countryId:countryId},
			dataType : "json",
			type : "POST",
			success : function(res)
			{
				if(res.status == true)
				{
					$("#state").html(res.html);
				}
			}
		});
});

function category()
{
  $("#pagination").html('');
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
        url : "<?= base_url('admin/category'); ?>",
        type : "POST",
        dataType : "json",
        success : function(res)
        {
          Swal.close(); 
            if(res.status == true)
            {
                console.log(res);
                $(".resData").html(res.html);
            }
        }
    });
}

function loadProvider(pageNumber) {
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
            url: '<?= base_url()?>admin/provider', // Replace with your server-side script or API endpoint
            method: 'GET',
            dataType : 'json',
            data: { page: pageNumber},
            success: function(data) {
              Swal.close(); 
            if (data.status==true){
              Swal.close(); 
                console.log(data);
                $('.resData').html(data.content);
                $('#pagination').html(data.pagination);
            }
            }
        });
    }

    function loadProviderPagination()
    {
        $('#pagination').on('click', '.pagination-link', function(e) {
            e.preventDefault();
            console.log("object");
            var pageNumber = $(this).data('page');
            loadProvider(pageNumber);
        });
    }

function provider()
{
  $("#pagination").html('');
  loadProvider(1);
  loadProviderPagination();
}

function loadAffiliator(pageNumber) {
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
            url: '<?= base_url()?>admin/affiliator', // Replace with your server-side script or API endpoint
            method: 'GET',
            dataType : 'json',
            data: { page: pageNumber},
            success: function(data) {
              Swal.close(); 
            if (data.status==true){
                console.log(data);
                $('.resData').html(data.content);
                $('#pagination').html(data.pagination);
            }
            }
        });
    }
    function loadAffiliaterPagination()
    {
        $('#pagination').on('click', '.pagination-link', function(e) {
            e.preventDefault();
            console.log("object");
            var pageNumber = $(this).data('page');
            loadAffiliator(pageNumber);
        });
    }
function affiliator()
{
  $("#pagination").html('');
  loadAffiliator(1);
  loadAffiliaterPagination();
}
function users()
{
  $("#pagination").html('');
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
    // $('#loader-container').css({ display: 'block' });
    $.ajax({
        url : "<?= base_url('admin/users'); ?>",
        type : "POST",
        dataType : "json",
        success : function(res)
        {
          Swal.close(); 
          $(".resData").html(res.html);
                console.log(res);
        }
    });
}


function loadOffer(pageNumber) {
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
            url: '<?= base_url()?>admin/offer', // Replace with your server-side script or API endpoint
            method: 'GET',
            dataType : 'json',
            data: { page: pageNumber},
            success: function(data) {
              Swal.close(); 
            if (data.status==true){
                console.log(data);
                $('.resData').html(data.content);
                $('#pagination').html(data.pagination);
            }
            }
        });
    }
    function loadOfferPagination()
    {
        $('#pagination').on('click', '.pagination-link', function(e) {
            e.preventDefault();
            console.log("object");
            var pageNumber = $(this).data('page');
            loadOffer(pageNumber);
        });
    }
function offers()
{
  $("#pagination").html('');
  loadOffer(1);
  loadOfferPagination();
}

function addEmployee(id)
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
      url : "<?= base_url('admin/add_employee_ajaxRequest'); ?>",
      data : {id:id},
      type : "POST",
      dataType : "json",
      success : function(res)
      {
        Swal.close();
          console.log(res);
          if(res.status == true)
          {
            $('#employeeModal').css('display','block');
            $(".employee_form").html(res.html);
          }
      }
  });
}

function edit_employee(id,provider_id)
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
      url : "<?= base_url('admin/edit_employee_ajaxRequest'); ?>",
      data : {id:id,provider_id:provider_id},
      type : "POST",
      dataType : "json",
      success : function(res)
      {
        Swal.close();
          console.log(res);
          if(res.status == true)
          {
            $('#employeeModal').css('display','block');
            $(".employee_form").html(res.html);
          }
      }
  });
}

function deleteEmployee(id)
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
      url : "<?= base_url('admin/deleteEmployee'); ?>",
      data : {id:id},
      type : "POST",
      dataType : "json",
      success : function(res)
      {
        Swal.close();
          console.log(res);
          if(res.status == true)
          {
            // $('#employeeModal').css('display','block');
          }
      }
  });
}

// function activeDeactive(id, sta) {
//   if(sta == 1){
//     var result = "Deacivate";
//   }else{
//     var result = "Acivate";
//   }
//     Swal.fire({
//         title: 'Confirmation',
//         text: 'Are you sure you want to '+result+' this user?',
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes',
//         cancelButtonText: 'No'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: "<?= base_url('admin/activeDeactiveEmployee'); ?>",
//                 type: "POST",
//                 data: { id: id, sta: sta },
//                 dataType: "json",
//                 success: function (res) {
//                     if (res.status == true) {
//                       window.location.reload();
//                     }
//                 }
//             });
//         }
//     });
// }

$(".add_employee_close").click(function(){
  $('#employeeModal').css('display','none');
});
$(document).ready(function() {
    // Handle click events for menu items
    $(".menu-item").click(function() {
        // Remove "active" class from all menu items
        $(".menu-item").removeClass("active");

        // Add "active" class to the clicked menu item
        $(this).addClass("active");
    });
});
    </script>