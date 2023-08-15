<?php include 'PopUpModel_employee_salary_information.php'; ?>
<div class="page-header"> <h1> Employee Salary </h1> </div>
<div class="row">
<div class="col-sm-12 tabbable">
    
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#employee_salary_tab"> Employee Salary </a></li>
    <li><a data-toggle="tab" id="employee_salary_information_tab_change" href="#employee_salary_information_tab"> Salary Information </a></li>
    </ul>
    
    <div class="tab-content">
    <div id="employee_salary_tab" class="tab-pane fade in active">
    <div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Employee ID </label>
        <input id="salary_employee_id" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10" type="text"/>

        <label class="col-xs-12 col-lg-2"> Employee Name </label>
        <input readonly="true" data-rel="tooltip" title="Employee Name" data-placement="bottom" id="salary_employee_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text" placeholder="Employee Name"/>

        <label class="col-xs-12 col-lg-2"> Father Name </label>
        <input readonly="true" id="salary_employee_father_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text" placeholder="Employee Father Name"/>

        <label class="col-xs-12 col-lg-2"> Job Title </label>
        <SELECT disabled="true" id="salary_employee_job_title" name="salary_employee_job_title" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
        <OPTION value="">
        <OPTION value="Teacher"> Teacher
        <OPTION value="Accountant" > Accountant
        <OPTION value="Principle" > Principle
        <OPTION value="Pion" > Pion
        <OPTION value="Maid" > Maid
        </SELECT>

        <label class="col-xs-12 col-lg-2"> Father CNIC </label>
        <input readonly="true" id="salary_employee_father_cnic" type="text" placeholder="Employee Father CNIC" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"/>

        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input id="salary_employee_amount" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Submit Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="salary_employee_submit_date" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Note </label>
        <textarea style="resize: none" id="salary_employee_note" class="col-xs-12 col-lg-4 limited" maxlength="100" placeholder="Employee Note Description"></textarea>

        <div style="margin-top: 15px;" class="pull-right">
        <button id="salary_employee_save_button" class="btn btn-success"> <i class="ace-icon fa fa-save"></i> Save </button>
        <button id="salary_employee_reset_button" class="btn btn-danger"> <i class="ace-icon fa fa-remove"></i> Reset </button>
        </div>

    </div>        
    </div> <!-- End Employee Salary Tab Data -->

    <div id="employee_salary_information_tab" class="tab-pane fade">
        <!-- ================================ (Start) Search Layout ================================ -->
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">		
        <div class="nav-search" id="nav-search">
        <form class="form-search">
        <span class="input-icon">
        <input type="text" placeholder="Search ..." class="nav-search-input" id="employee_salary_search_value" autocomplete="off" />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
        </span>
        </form>
        </div>
        </div>
        <!-- ================================== (End) Search Layout ================================ -->
        <div style="overflow: auto" id="employee_load_salary_information_data_table_id"> </div>
    </div>
    </div>

</div><!-- /.col -->
</div><!-- /.row -->
