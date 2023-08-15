
<!-- ========================================================================================================= -->
<!-- =========================================== View PopUp-Model ============================================ -->
<!-- ========================================================================================================= -->

<div class="modal fade" id="show_model_employee_information_view" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Employee Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">
    
    <div style="margin-right: 10px;">
    <label class="col-xs-12 col-lg-3"> Employee ID </label>
    <input readonly="true" id="employee_id_view" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Employee Name </label>
    <input readonly="true" id="employee_name_view" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Father Name </label>
    <input readonly="true" id="employee_father_name_view" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>


    <label class="col-xs-12 col-lg-3"> Gender </label>
    <SELECT disabled="true" id="employee_gender_view" name="employee_gender_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-3"></SELECT>

    <label class="col-xs-12 col-lg-2"> Job Title </label>
    <SELECT disabled="true" id="employee_job_title_view" name="employee_job_title_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"></SELECT>
    
    <label class="col-xs-12 col-lg-3"> Employee Salary </label>
    <input readonly="true" id="employee_salary_view" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>
    </div>       

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Date of Birth: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
    <input readonly="true" id="employee_date_of_birth_view" class="form-control" type="text" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Joining Date: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
    <input readonly="true" id="employee_joining_date_view" class="form-control" type="text" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Father CNIC Number: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-newspaper-o"></i> </span>
    <input readonly="true" id="employee_father_cnic_view" class="form-control input-mask-cnic-number" type="text" placeholder="Father CNIC Number" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Contact Number: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i> </span>
    <input readonly="true" id="employee_contact_number_view" class="form-control input-mask-phone" type="text" placeholder="Contact Number" />
    </div>
    </div>

    <div style="margin-top:15px; margin-bottom:30px;" class="col-xs-12 col-lg-12">
    <label> Address: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-map-marker"></i> </span>
    <input readonly="true" id="employee_address_view" class="form-control limited" maxlength="100" type="text" placeholder="Address" />
    </div>
    </div>
    
    <div style="margin-right: 10px;">
    <label class="col-xs-12 col-lg-3"> Status: </label>
    <SELECT style="margin-bottom:15px;" disabled="true" id="employee_status_view" name="employee_status_view" class="col-xs-12 col-lg-9"></SELECT>
    
    <label class="col-xs-12 col-lg-3"> Description: </label>
    <textarea style="resize: none" readonly="true" id="employee_description_view" class="col-xs-12 col-lg-9 limited" maxlength="150" type="text" placeholder="Status Description"> </textarea>
    </div>
    
</div>
</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>

<!-- ========================================================================================================= -->
<!-- =========================================== Update PopUp-Model ========================================== -->
<!-- ========================================================================================================= -->

<div class="modal fade" id="show_model_employee_information_update" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Update Employee Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">
    
    <div style="margin-right: 10px;">
    <label class="col-xs-12 col-lg-3"> Employee ID </label>
    <input readonly="true" id="employee_id_update" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Employee Name </label>
    <input id="employee_name_update" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Father Name </label>
    <input id="employee_father_name_update" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Gender </label>
    <SELECT id="employee_gender_update" name="employee_gender_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-3">
    <OPTION selected> Male
    <OPTION> Female
    </SELECT>

    <label class="col-xs-12 col-lg-2"> Job Title </label>
    <SELECT id="employee_job_title_update" name="employee_job_title_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
    <OPTION selected> Teacher
    <OPTION> Accountant
    <OPTION> Principle
    <OPTION> Pion
    <OPTION> Maid
    </SELECT>
    
    <label class="col-xs-12 col-lg-3"> Employee Salary </label>
    <input id="employee_salary_update" style="margin-bottom: 15px;" type="text" class="number_account_format col-xs-12 col-lg-9 limited" maxlength="6" />
    </div>       

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Date of Birth: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
    <input id="employee_date_of_birth_update" class="form-control" type="date" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Joining Date: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
    <input data-rel="tooltip" title="Employee shoud be 15 years old" data-placement="bottom" id="employee_joining_date_update" class="form-control" type="date" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Father CNIC Number: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-newspaper-o"></i> </span>
    <input id="employee_father_cnic_update" class="form-control input-mask-cnic-number" type="text" placeholder="Father CNIC Number" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Contact Number: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i> </span>
    <input id="employee_contact_number_update" class="form-control input-mask-phone" type="text" placeholder="Contact Number" />
    </div>
    </div>

    <div style="margin-top:15px; margin-bottom:30px;" class="col-xs-12 col-lg-12">
    <label> Address: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-map-marker"></i> </span>
    <input id="employee_address_update" class="form-control limited" maxlength="100" type="text" placeholder="Address" />
    </div>
    </div>
    
    <div style="margin-right: 10px;">
    <label class="col-xs-12 col-lg-3"> Status: </label>
    <SELECT style="margin-bottom:15px;" id="employee_status_update" name="employee_status_update" class="col-xs-12 col-lg-9">
    <OPTION value="Continue" selected> Continue
    <OPTION value="Leave"> Leave
    <OPTION value="Fire"> Fire
    </SELECT>
    
    <label class="col-xs-12 col-lg-3"> Description: </label>
    <textarea style="resize: none" id="employee_description_update" class="col-xs-12 col-lg-9 limited" maxlength="150" type="text" placeholder="Status Description"> </textarea>
    </div>
    
</div>
</div>
<div class="modal-footer">
<button class="btn btn-primary" id="employee_update_information_model_button"><i class='fa fa-pencil-square-o'></i> Yes Update </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>

<!-- ========================================================================================================= -->
<!-- =========================================== Delete PopUp-Model ========================================== -->
<!-- ========================================================================================================= -->

<div class="modal fade" id="show_model_employee_information_delete" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Delete Employee Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">
    
    <div style="margin-right: 10px;">
    <label class="col-xs-12 col-lg-3"> Employee ID </label>
    <input readonly="true" id="employee_id_delete" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Employee Name </label>
    <input readonly="true" id="employee_name_delete" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Father Name </label>
    <input readonly="true" id="employee_father_name_delete" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>

    <label class="col-xs-12 col-lg-3"> Gender </label>
    <SELECT disabled="true" id="employee_gender_delete" name="employee_gender_delete" style="margin-bottom: 15px;" class="col-xs-12 col-lg-3"></SELECT>

    <label class="col-xs-12 col-lg-2"> Job Title </label>
    <SELECT disabled="true" id="employee_job_title_delete" name="employee_job_title_delete" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"></SELECT>
    
    <label class="col-xs-12 col-lg-3"> Employee Salary </label>
    <input readonly="true" id="employee_salary_delete" style="margin-bottom: 15px;" type="text" class="col-xs-12 col-lg-9"/>
    </div>       

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Date of Birth: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
    <input readonly="true" id="employee_date_of_birth_delete" class="form-control" type="text" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Joining Date: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
    <input readonly="true" id="employee_joining_date_delete" class="form-control" type="text" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Father CNIC Number: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-newspaper-o"></i> </span>
    <input readonly="true" id="employee_father_cnic_delete" class="form-control input-mask-cnic-number" type="text" placeholder="Father CNIC Number" />
    </div>
    </div>

    <div style="margin-top:15px;" class="col-xs-12 col-lg-6">
    <label> Contact Number: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i> </span>
    <input readonly="true" id="employee_contact_number_delete" class="form-control input-mask-phone" type="text" placeholder="Contact Number" />
    </div>
    </div>

    <div style="margin-top:15px; margin-bottom:30px;" class="col-xs-12 col-lg-12">
    <label> Address: </label>
    <div class="input-group">
    <span class="input-group-addon"> <i class="ace-icon fa fa-map-marker"></i> </span>
    <input readonly="true" id="employee_address_delete" class="form-control limited" maxlength="100" type="text" placeholder="Address" />
    </div>
    </div>
    
    <div style="margin-right: 10px;">
    <label class="col-xs-12 col-lg-3"> Status: </label>
    <SELECT disabled="true" style="margin-bottom:15px;" id="employee_status_delete" name="employee_status_delete" class="col-xs-12 col-lg-9"></SELECT>
    
    <label class="col-xs-12 col-lg-3"> Description: </label>
    <textarea readonly="true" style="resize: none" id="employee_description_delete" class="col-xs-12 col-lg-9 limited" maxlength="150" type="text" placeholder="Status Description"></textarea>
    </div>
    
</div>
</div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" id="employee_delete_information_model_button"><i class='fa fa-trash-o'></i> Yes Delete </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>
