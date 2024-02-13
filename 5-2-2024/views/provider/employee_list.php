<style>
/* ------------employee-list page------------------------- */

.emp-container {
    width: 100%;
    height: auto;
    margin: 0 !important;
    padding-bottom: 10%;
}

.emp-btn {
    width: 100%;
    height: calc(25*var(--aspect-ratio));
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: end;
    padding-left: 4%;
    margin-top: 5%;
    margin-right: 12px;
}

.emp {
    width: auto;
    height: 70%;
    padding: 6px;
    text-align: center;
    border-radius: calc(2*var(--aspect-ratio));
    border: 2px solid #00D2FF;
    background: #009BBD;
    box-shadow: 2.143px 2.143px 10.357px 0px rgba(0, 59, 72, 0.38) inset;
    color: #fff;
    font-size: calc(7*var(--aspect-ratio));
    font-weight: 600;
    font-family: "Roboto" ,sans-serif;
}

.emp-table {
    width: 98%;
    margin-top: 0% !important;
    margin: 0 auto;
}

.emp-item {
    margin-top: 10% !important;
    margin: 0 auto;
    border-radius: calc(3*var(--aspect-ratio));
    background-color: rgba(0, 181, 220, 0.10);
    padding: .5%;  
    width: 100%;
}

.head-emp {
    height: calc(25*var(--aspect-ratio));    
    width: 100%;
}

.head-emp th {
    color: #00B5DC;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(6*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: 10px;
    word-wrap: anywhere;
    text-align: center;
}

.emp-main-list td {
    background-color: #fff;
    text-align: center;
    color: #8E8E8E;
    font-family: "Poppins" ,sans-serif;
    font-size: calc(6*var(--aspect-ratio));
    font-style: normal;
    font-weight: 600;
    line-height: calc(10*var(--aspect-ratio));
    word-wrap: anywhere;
    padding: 2%;
}

.emp-main-list .mp-item3 {
    font-size: calc(5*var(--aspect-ratio));
}

.emp-main-list .active-status {
    color: #007e00;
}

.emp-main-list .deactive-status {
    color: #ac0000;
}
     </style>
    <div class="emp-container">
        
        <div class="emp-btn">
            <a href="<?php echo base_url().'provider/employee'?>" class="emp"><?php echo lang('add_employee') ?></a>
        </div>


        <div class="emp-table">
            <table class="emp-item" style="width: 100%;">
                <thead>
                <tr class="head-emp" style="width: 100%;">
                <th class="em-item1" style="width: 50%;"><?php echo lang('name') ?></th>
                <th class="em-item2" style="width: 30%;"><?php echo lang('phone') ?></th>
                <th class="em-item3" style="width: 20%;"><?php echo lang('status') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                //echo "<pre>";print_r($employee_list);echo "</pre>";
                foreach($employee_list as $list){ ?>
                        <tr class="emp-main-list" style="width: 100%;" data-id="<?php echo $list['id'] ?>" onclick="editEmployee(<?php echo $list['id'] ?>)">
                            <td class="ml-item" style="width: 50%;"> <?php echo $list['name'] ?></td>
                            <td class="ml-item" style="width: 30%;"> <?php echo $list['phone']?></td>
                            <td class="mp-item3" style="width: 20%;"> <?php echo $list['status'] == 1 ? 'Active':'Deactive'?></td>
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
