<div class="page-header"> <h1> Add New Employee </h1> </div>
<div class="row" style="margin-left:10px; margin-right: 10px;">
<div style="margin-right: 10px;">

<!-- Full Screen Use (4+4+4=12) and Small Screen (12) -->
<label class="col-xs-12 col-lg-2"> Employee ID </label>
<input id="employee_id" readonly="true" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10" type="text" placeholder="Employee ID"/>

<label class="col-xs-12 col-lg-2"> Employee Name </label>
<input id="employee_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4 limited" maxlength="20" type="text" placeholder="Employee Name"/>

<label class="col-xs-12 col-lg-2"> Father Name </label>
<input id="employee_father_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4 limited" maxlength="20" type="text" placeholder="Employee Father Name"/>

<label class="col-xs-12 col-lg-2"> Gender </label>
<SELECT id="employee_gender" name="employee_gender" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
<OPTION selected> Male
<OPTION> Female
</SELECT>
    
<label class="col-xs-12 col-lg-2"> Job Title </label>
<SELECT id="employee_job" name="employee_job" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
<OPTION selected> Teacher
<OPTION> Accountant
<OPTION> Principle
<OPTION> Pion
<OPTION> Maid
</SELECT>

<label class="col-xs-12 col-lg-2"> Starting Salary </label>
<input id="employee_salary" style="margin-bottom: 30px;" class="number_account_format col-xs-12 col-lg-10 limited" maxlength="6" type="text" placeholder="Employee Starting Salary"/>
</div>   
    

<div class="col-xs-12 col-lg-4">
<label> Date of Birth : </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
<input id="employee_date_of_birth" class="form-control" type="date" />
</div>
</div>

<div class="col-xs-12 col-lg-4">
<label> Joining Date : </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
<input data-rel="tooltip" title="Employee shoud be 15 years old" data-placement="bottom" id="employee_date_of_joining" class="form-control" type="date" />
</div>
</div>

<div class="col-xs-12 col-lg-4">
<label> Father CNIC Number: </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-newspaper-o"></i> </span>
<input id="employee_father_cnic_number" class="form-control input-mask-cnic-number" type="text" placeholder="Employee CNIC Number" />
</div>
</div>

<div style="margin-top:20px;" class="col-xs-12 col-lg-4">
<label> Contact Number: </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i> </span>
<input id="employee_contact_number" class="form-control input-mask-phone" type="text" placeholder="Contact Number" />
</div>
</div>

<div style="margin-top:20px;" class="col-xs-12 col-lg-8">
<label> Address: </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-map-marker"></i> </span>
<input id="employee_address" class="form-control limited" maxlength="100" type="text" placeholder="Address" />
</div>
</div>

<button id="employee_save_button" class="btn btn-success pull-right" style="margin-top:20px; margin-left:10px; margin-right:10px;"> <i class="ace-icon fa fa-save"></i> Save </button>
<button id="employee_reset_button" style="margin-top:20px;" class="btn btn-danger pull-right"> <i class="ace-icon fa fa-remove"></i> Reset </button>

</div>
