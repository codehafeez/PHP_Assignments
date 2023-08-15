<!-- This Hidden Field For Update & Delete Record in DB -->
<input type="hidden" id="my_salary_id"/>
<!-- ========================================================================================================= -->
<!-- =========================================== View PopUp-Model ============================================ -->
<!-- ========================================================================================================= -->
<div class="modal fade" id="show_model_employee_salary_information_view" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Employee Salary Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Employee ID </label>
        <input readonly="true" id="salary_employee_id_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10" type="text"/>

        <label class="col-xs-12 col-lg-2"> Employee Name </label>
        <input readonly="true" id="salary_employee_name_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text" placeholder="Employee Name"/>

        <label class="col-xs-12 col-lg-2"> Father Name </label>
        <input readonly="true" id="salary_employee_father_name_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text" placeholder="Employee Father Name"/>

        <label class="col-xs-12 col-lg-2"> Job Title </label>
        <SELECT disabled="true" id="salary_employee_job_title_view" name="salary_employee_job_title_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"></SELECT>

        <label class="col-xs-12 col-lg-2"> Father CNIC </label>
        <input readonly="true" id="salary_employee_father_cnic_view" type="text" placeholder="Employee Father CNIC" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"/>

        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input readonly="true" id="salary_employee_amount_view" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Submit Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input readonly="true" id="salary_employee_submit_date_view" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Note </label>
        <textarea readonly="true" style="resize: none" id="salary_employee_note_view" class="col-xs-12 col-lg-4 limited" maxlength="100" placeholder="Employee Note Description"></textarea>

</div>
</div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" id="employee_salary_information_delete_model_button"><i class='fa fa-trash-o'></i> Yes Delete </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>

<!-- ========================================================================================================= -->
<!-- =========================================== Update PopUp-Model ========================================== -->
<!-- ========================================================================================================= -->

<div class="modal fade" id="show_model_employee_salary_information_update" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Update Student Fees Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Employee ID </label>
        <input readonly="true" id="salary_employee_id_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10" type="text"/>

        <label class="col-xs-12 col-lg-2"> Employee Name </label>
        <input readonly="true" id="salary_employee_name_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text" placeholder="Employee Name"/>

        <label class="col-xs-12 col-lg-2"> Father Name </label>
        <input readonly="true" id="salary_employee_father_name_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text" placeholder="Employee Father Name"/>

        <label class="col-xs-12 col-lg-2"> Job Title </label>
        <SELECT disabled="true" id="salary_employee_job_title_update" name="salary_employee_job_title_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"></SELECT>

        <label class="col-xs-12 col-lg-2"> Father CNIC </label>
        <input readonly="true" id="salary_employee_father_cnic_update" type="text" placeholder="Employee Father CNIC" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"/>

        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input id="salary_employee_amount_update" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Submit Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="salary_employee_submit_date_update" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Note </label>
        <textarea style="resize: none" id="salary_employee_note_update" class="col-xs-12 col-lg-4 limited" maxlength="100" placeholder="Employee Note Description"></textarea>
        
</div>
</div>
<div class="modal-footer">
<button class="btn btn-primary" id="employee_salary_information_update_model_button"><i class='fa fa-pencil-square-o'></i> Yes Update </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>
