
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> / -->
<style>
    .temp{
  margin-right: 10px;
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  margin-bottom: 20px;
}
.whatsapp{
    background-color: #055c7491;
    padding: 5px;
    font-weight: bold;
}
</style>

<?php if(isset($employee)){         $provider_id = $this->uri->segment(2); ?>
          <div class="temp">
              <h2>Employee List</h2>
              <button onclick="addEmployee(<?= $provider_id ?>)" class="btn btn-primary" style="height: 40px;">Add Employee</button>
          </div>
            <table class="table"  style="font-size:10px">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Edit</th>
                  <th>Active/Dactive</th>
                </tr>
                <tbody class="tbodyEmp">
                <?php 
                  foreach($employee as $employee_data){?>
                      <tr class="data-ap" id="<?= $employee_data['id']?>" >
                          <td><?= $employee_data['name'] ?></td>
                          <td><?= $employee_data['email'] ?></td>
                          <td><?= $employee_data['phone'] ?></td>
                          <td><a onclick="edit_employee(<?= $employee_data['id'] ?>,<?= $provider_id ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>
                          <!-- <td><a  class="btn btn-danger" onclick="deleteEmployee(<?= $employee_data['id'] ?>,<?= $employee_data['status'] ?>)"><i class="bi bi-trash"></i> -->
                          <?php  if($employee_data['status'] == 1) { ?>
                          <td><a  class="btn btn-warning" onclick="activeDeactive(<?= $employee_data['id'] ?>,<?= $employee_data['status'] ?>)"><i class="bi bi-hand-thumbs-up"></i>
                          <?php } else { ?>
                          <td><a  class="btn btn-danger" onclick="activeDeactive(<?= $employee_data['id'] ?>,<?= $employee_data['status'] ?>)"><i class="bi bi-hand-thumbs-down"></i>
                          <?php } ?>
                      </tr>
                <?php } ?>
                </tbody>
              </table>
              <?php } ?>
              <div class="modal" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content comingsoon_model">
                        <div class="modal-header coming_header">               
                            <button type="button" class="add_employee_close" data-dismiss="modal" aria-label="Close" style="margin-left: 95%;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="employee_form"></div>
                        </div>
                    </div>
                </div>
            </div>