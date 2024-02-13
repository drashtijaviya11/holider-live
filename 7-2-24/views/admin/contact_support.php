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
.modal-dialog{
  max-width:45% !important;
}
.modal-lg, .modal-xl {
    --bs-modal-width: 92% !important;
}
.dropdown-menu{
  left: -63% !important;
  min-width: fit-content !important;
  padding: 7px !important;
}
.temp{
        color: var(--bs-btn-active-color);
        background-color: var(--bs-btn-active-bg);
        border-color: var(--bs-btn-active-border-color);
    }
    .temp1{
        color: var(--bs-btn-active-color);
        background-color: var(--bs-btn-active-bg);
        border-color: var(--bs-btn-active-border-color);
    }
</style>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>
<div class="temp">
<h2>Contact & Support</h2>

<!-- <button onclick="addCategory()" class="btn btn-primary" style="height: 40px;">Add category</button> -->


</div>


<table class="table  table-striped"  style="font-size:10px; width:98%; margin:auto;">
  <tr>
    <th>Sr. No</th>
    <th>Question</th>
	<th>Answer</th>
	<th>Reply</th>
  </tr>
  <tbody class="Cont_SupportTbody">
  <?php if(!empty($contactSupport_message)){ $i = 1;
    foreach($contactSupport_message as $contactSupport_data){?>
        <tr class="data-ap" id="<?= $contactSupport_data['id']; ?>">
			<td><?= $i++; ?></td>
            <td><?= $contactSupport_data['message']; ?></td>
			<td>
				<?php foreach($contactSupport_messageReply as $reply){
					if($reply['parrent_id'] == $contactSupport_data['id']){
						echo $reply['message'].', ';
				  }}?>
			</td>
            <td><a  class="btn btn-success" onclick="reply_contactSupport(<?= $contactSupport_data['id'] ?>)"><i class="bi bi-reply"></i></td>
        </tr>
   <?php } 
  }else{ ?>
    <tr>
        <td>Data Not Found</td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<div class="modal" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content comingsoon_model">
            <div class="modal-header coming_header">               
                <button type="button" class="add_reply_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="reply_form"></div>
            </div>
        </div>
    </div>
</div>


<script>
	function reply_contactSupport(id) {
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
        url : "<?= base_url('admin/contact_support_reply_ajaxRequest'); ?>",
        type : "POST",
		data : {id:id},
        dataType : "json",
        success : function(res)
        {
          Swal.close(); 
            if(res.status == true)
            {
                console.log(res);
                $('#replyModal').css('display','block');
                $(".reply_form").html(res.html);
            }
        }
    });
}

$(".add_reply_close").click(function(){
  $('#replyModal').css('display','none');
});
</script>
