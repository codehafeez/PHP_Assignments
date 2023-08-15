<div class="page-header"> <h1> New Admission </h1> </div>
<div class="row" style="margin-left:10px; margin-right: 10px;">
<div style="margin-right: 10px;">

<!-- Full Screen Use (4+4+4=12) and Small Screen (12) -->
<label class="col-xs-12 col-lg-2"> Student ID </label>
<input readonly="true" id="student_id" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10" type="text" placeholder="Student ID"/>

<label class="col-xs-12 col-lg-2"> Student Name </label>
<input id="student_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4 limited" maxlength="20" type="text" placeholder="Student Name"/>

<label class="col-xs-12 col-lg-2"> Father Name </label>
<input id="student_father_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4 limited" maxlength="20" type="text" placeholder="Student Father Name"/>

<label class="col-xs-12 col-lg-2"> Gender </label>
<SELECT id="student_gender" name="student_gender" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
<OPTION selected> Male
<OPTION> Female
</SELECT>
    
<label class="col-xs-12 col-lg-2"> Class </label>
<SELECT id="student_class" name="student_class" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
<OPTION selected> One
<OPTION> Two
<OPTION> Three
<OPTION> Four
<OPTION> Five
</SELECT>
</div>   
    

<div style="margin-top:15px;" class="col-xs-12 col-lg-4">
<label> Date of Birth : </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
<input id="student_date_of_birth" class="form-control" type="date" />
</div>
</div>

<div style="margin-top:15px;" class="col-xs-12 col-lg-4">
<label> Date of Admission : </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
<input data-rel="tooltip" title="Student shoud be 5 years old" data-placement="bottom" id="student_date_of_admission" class="form-control" type="date" />
</div>
</div>

<div style="margin-top:15px;" class="col-xs-12 col-lg-4">
<label> Father CNIC Number: </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-newspaper-o"></i> </span>
<input id="student_father_cnic_number" class="form-control input-mask-cnic-number" type="text" placeholder="Father CNIC Number" />
</div>
</div>

<div style="margin-top:15px;" class="col-xs-12 col-lg-4">
<label> Contact Number: </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i> </span>
<input id="student_contact_number" class="form-control input-mask-phone" type="text" placeholder="Contact Number" />
</div>
</div>

<div style="margin-top:15px;" class="col-xs-12 col-lg-8">
<label> Address: </label>
<div class="input-group">
<span class="input-group-addon"> <i class="ace-icon fa fa-map-marker"></i> </span>
<input id="student_address" class="form-control limited" maxlength="100" type="text" placeholder="Address" />
</div>
</div>

<button id="student_save_button" class="btn btn-success pull-right" style="margin-top:20px; margin-left:10px; margin-right:10px;"> <i class="ace-icon fa fa-save"></i> Save </button>
<button id="student_reset_button" style="margin-top:20px;" class="btn btn-danger pull-right"> <i class="ace-icon fa fa-remove"></i> Reset </button>

</div>