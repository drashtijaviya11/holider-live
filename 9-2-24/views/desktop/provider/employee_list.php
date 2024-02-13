<style>
    .oli-item {
		min-height: auto;
    	max-height: 450px;
        overflow-y: auto;  /* Add a vertical scrollbar when content overflows */
        display: block;   /* Allow setting height and overflow */
    }
    .head-list th {
        color: #00B5DC;
        font-family: "Poppins" ,sans-serif;
        font-size: calc(6*var(--aspect-ratio));
        font-style: normal;
        font-weight: 500;
        line-height: 10px;
        padding: 12px;
    }
	.employe-line {
        margin-left: 0rem !important;
        color: #00B5DC !important;
        border: 0;
        border-radius: 7px 7px 7px 7px;
        border-top: 3px solid !important;
        opacity: 1 !important;
    }
    @media (min-width: 991px) and (max-width: 1200px) {
    	.employe-text {
    		font-size: 20px !important;
    	}
    	.employe-btn {
    		font-size: 12px !important;
    	}
    }
</style> 
<section class="pt-4">
  <div class="container">
    <div class="row">
	  <div class="col-lg-6">
	    <div class="row mx-2">
	 	   <div class="col-md-4 my-1 text-center">
	          <h3 class="fw-bold employe-text"><?php echo lang('employee_list') ?></h3>
	 	      <div class="employe-line my-0"></div>
	       </div>
		   <div class="col-md-4 my-1"></div>
		   <div class="col-md-4 my-1"></div>
	    </div>
	  </div>
	  <div class="col-lg-6">
	    <div class="row mx-2">
		  <div class="col-lg-4 my-1">
		    
		  </div>
		  <div class="col-lg-4 my-1">
		    
		  </div>
		  <div class="col-lg-4 my-1">
          <a href="<?php echo base_url().'provider/employee'?>" class="gen-link-btn text-white rounded-2 fw-bold px-3 py-2 w-100 employe-btn" style="background-color: #009BBD;border: 3.4px solid #00D2FF;" ><?php echo lang('add_employee') ?></a>

		    <!-- <button class="gen-link-btn text-white rounded-2 fw-bold px-3 py-2 w-100 employe-btn" style="background-color: #009BBD;border: 3.4px solid #00D2FF;">Add Employee</button> -->
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
<br>
<div class="container">       
<div class="table-responsive">
                <table class="table table-bordered text-center rounded-2">
                    <thead>
                        <tr class="head-list">
                        <th class="text-center text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('name') ?></th>
                        <th class="text-center text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('email') ?></th> 
                        <th class="text-center text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('phone') ?></th>
                        <th class="text-center text-sky fw-600 py-3 fs-20 table-text-media"><?php echo lang('status') ?></th>
                    </tr>
                    </thead>
                    <tbody id="get_voucher_section">
					<?php 
                    //echo "<pre>";print_r($employee_list);echo "</pre>";
                    foreach($employee_list as $list){ ?>
							<tr class="main-list" data-id="<?php echo $list['id'] ?>" onclick="editEmployee(<?php echo $list['id'] ?>)">
								<td class="ml-item bg-white fs-20 table-text-media fw-600"> <?php echo $list['name'] ?></td>
								<td class="ml-item bg-white fs-20 table-text-media fw-600"> <?php echo $list['email']?></td>
								<td class="ml-item bg-white fs-20 table-text-media fw-600"> <?php echo $list['phone']?></td>
								<td class="ml-item bg-white fs-20 table-text-media fw-600"> <?php echo $list['status'] == 1 ? 'Active':'Deactive'?></td>
							</tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>  
            </div>  
			<script>
	function editEmployee(id)
	{
		$.ajax({
                url : "<?= base_url('provider/editEmployeeAjaxRequest') ?>",
                data : {id:id},
                dataType : "json",
                type : "POST",
                success : function(res)
                {
					window.location = res.url;
                }
            });
	}
</script>
