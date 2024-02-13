
<?php $provider_id = $this->uri->segment(2) ; ?>
  <section id="content-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="resData">
            <?php if(isset($employee)){ ?>
          <div class="temp">
              <h2>Employee List</h2>
              <button onclick="addEmployee(<?= $provider_id ?>)" class="btn btn-primary" style="height: 40px;">Add Employee</button>
          </div>
            <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php 
                  foreach($employee as $employee_data){?>
                      <tr class="data-ap">
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
                <?php } ?>
              </table>
              <?php } ?>
          </div>
          <div id="pagination"  style="justify-content: center; display: flex;"></div>
          </div>
        </div>
      </div>
  </section>

</div>

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
