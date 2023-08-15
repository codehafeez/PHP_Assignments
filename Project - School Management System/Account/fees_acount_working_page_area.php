<?php include 'PopUpModel_student_fees_information.php'; ?>

<div class="page-header"> <h1> Student Fees </h1> </div>
<div class="row">
<div class="col-sm-12 tabbable">
    
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#student_fees_tab"> Student Fees </a></li>
    <li><a data-toggle="tab" id="student_fees_information_tab_change" href="#student_fees_information_tab"> Fees Information </a></li>
    </ul>
    
    <div class="tab-content">
    <div id="student_fees_tab" class="tab-pane fade in active">
    <div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Student ID </label>
        <input id="fee_student_id" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Name </label>
        <input readonly="true" data-rel="tooltip" title="Student Name" data-placement="bottom" id="fee_student_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4 limited" maxlength="20" type="text" placeholder="Student Name"/>

        <label class="col-xs-12 col-lg-2"> Class </label>
        <SELECT disabled="true" id="fee_student_class" name="fee_student_class" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
        <OPTION value="" selected="true"> 
        <OPTION value="One"> One
        <OPTION value="Two"> Two
        <OPTION value="Three"> Three
        <OPTION value="Four"> Four
        <OPTION value="Five"> Five
        </SELECT>

        <label class="col-xs-12 col-lg-2"> Father Name </label>
        <input readonly="true" id="fee_student_father_name" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4 limited" maxlength="20" type="text" placeholder="Student Father Name"/>

        <label class="col-xs-12 col-lg-2"> Fees Description </label>
        <TABLE id="Fees_Description_Id" border="1" style="border-color:#D5D5D5; margin-bottom: 15px;" class="col-xs-12 col-md-10">
        <TD>
            <input style="margin:10px;" type="checkbox" id="Fees_Description_Monthly">Monthly
            <input style="margin:10px;" type="checkbox" id="Fees_Description_Admission">Admission
            <input style="margin:10px;" type="checkbox" id="Fees_Description_MidExam">Mid Exam
            <input style="margin:10px;" type="checkbox" id="Fees_Description_FinalExam">Final Exam
        </TD>
        </TABLE>
        
        <label class="col-xs-12 col-lg-2"> Total Amount </label>
        <input id="fee_student_amount" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Issue Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="fee_student_issue_date" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Last Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="fee_student_last_date" data-rel="tooltip" title="Last Date should not be less than Issue Date" data-placement="bottom" class="form-control" type="date" />
        </div>

        <label class="col-xs-12 col-lg-2"> Submit Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input data-rel="tooltip" title="Submit Date should not be less than Issue Date" data-placement="bottom" id="fee_student_submit_date" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Note </label>
        <textarea style="resize: none" id="fee_student_note" class="col-xs-12 col-lg-4 limited" maxlength="100" placeholder="Fee Note Description"></textarea>

        <div style="margin-top: 15px;" class="pull-right">
        <button id="fee_student_print_button" class="btn btn-primary"> <i class="ace-icon fa fa-print"></i> Print Voucher </button>
        <button id="fee_student_save_button" class="btn btn-success"> <i class="ace-icon fa fa-save"></i> Save </button>
        <button id="fee_student_reset_button" class="btn btn-danger"> <i class="ace-icon fa fa-remove"></i> Reset </button>
        </div>

    </div>
    </div> <!-- End Student Fees Tab Data -->

    <div id="student_fees_information_tab" class="tab-pane fade">
        <!-- ================================ (Start) Search Layout ================================ -->
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">		
        <div class="nav-search" id="nav-search">
        <form class="form-search">
        <span class="input-icon">
        <input type="text" placeholder="Search ..." class="nav-search-input" id="student_fees_search_value" autocomplete="off" />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
        </span>
        </form>
        </div>
        </div>
        <!-- ================================== (End) Search Layout ================================ -->
        <div style="overflow: auto" id="student_load_fess_information_data_table_id"> </div>
    </div>
    </div>

</div><!-- /.col -->
</div><!-- /.row -->
