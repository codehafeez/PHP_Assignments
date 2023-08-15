<input type="hidden" id="my_fees_id"/>
<!-- ========================================================================================================= -->
<!-- =========================================== View PopUp-Model ============================================ -->
<!-- ========================================================================================================= -->
<div class="modal fade" id="show_model_student_fees_information_view" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Student Fees Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Student ID </label>
        <input id="fee_student_id_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Name </label>
        <input readonly="true" id="fee_student_name_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Class </label>
        <SELECT disabled="true" name="fee_student_class_view" id="fee_student_class_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4">
        <OPTION value="" selected="true"> 
        <OPTION value="One"> One
        <OPTION value="Two"> Two
        <OPTION value="Three"> Three
        <OPTION value="Four"> Four
        <OPTION value="Five"> Five
        </SELECT>

        <label class="col-xs-12 col-lg-2"> Father Name </label>
        <input readonly="true" id="fee_student_father_name_view" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Fees Description </label>
        <TABLE id="Fees_Description_Id_view" border="1" style="border-color:#D5D5D5; margin-bottom: 15px;" class="col-xs-12 col-md-10">
        <TD>
            <input disabled="true" style="margin:10px;" type="checkbox" id="Fees_Description_Monthly_view">Monthly
            <input disabled="true" style="margin:10px;" type="checkbox" id="Fees_Description_Admission_view">Admission
            <input disabled="true" style="margin:10px;" type="checkbox" id="Fees_Description_MidExam_view">Mid Exam
            <input disabled="true" style="margin:10px;" type="checkbox" id="Fees_Description_FinalExam_view">Final Exam
        </TD>
        </TABLE>
        
        <label class="col-xs-12 col-lg-2"> Total Amount </label>
        <input readonly="true" id="fee_student_amount_view" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4"/>

        <label class="col-xs-12 col-lg-2"> Issue Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input readonly="true" id="fee_student_issue_date_view" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Note </label>
        <textarea readonly="true" style="resize: none" id="fee_student_note_view" class="col-xs-12 col-lg-4"></textarea>

        <label class="col-xs-12 col-lg-2"> Last Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input readonly="true" id="fee_student_last_date_view" class="form-control" type="date" />
        </div>

        <label class="col-xs-12 col-lg-2"> Submit Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input readonly="true" id="fee_student_submit_date_view" class="form-control" type="date" />
        </div>
        
</div>
</div>
<div class="modal-footer">
<button id="student_fees_information_delete_model_button" class="btn btn-danger" data-dismiss="modal"><i class='fa fa-trash-o'></i> Yes Delete </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>

<!-- ========================================================================================================= -->
<!-- =========================================== Update PopUp-Model ========================================== -->
<!-- ========================================================================================================= -->

<div class="modal fade" id="show_model_student_fees_information_update" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Update Student Fees Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Student ID </label>
        <input readonly="true" id="fee_student_id_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Name </label>
        <input readonly="true" id="fee_student_name_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Class </label>
        <SELECT disabled="true" name="fee_student_class_update" id="fee_student_class_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4"></SELECT>

        <label class="col-xs-12 col-lg-2"> Father Name </label>
        <input readonly="true" id="fee_student_father_name_update" style="margin-bottom: 15px;" class="col-xs-12 col-lg-4" type="text"/>

        <label class="col-xs-12 col-lg-2"> Fees Description </label>
        <TABLE id="Fees_Description_Id_update" border="1" style="border-color:#D5D5D5; margin-bottom: 15px;" class="col-xs-12 col-md-10">
        <TD>
            <input checked="false" style="margin:10px;" type="checkbox" id="Fees_Description_Monthly_update">Monthly
            <input checked="false" style="margin:10px;" type="checkbox" id="Fees_Description_Admission_update">Admission
            <input checked="false" style="margin:10px;" type="checkbox" id="Fees_Description_MidExam_update">Mid Exam
            <input checked="false" style="margin:10px;" type="checkbox" id="Fees_Description_FinalExam_update">Final Exam
        </TD>
        </TABLE>
        
        <label class="col-xs-12 col-lg-2"> Total Amount </label>
        <input id="fee_student_amount_update" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Issue Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="fee_student_issue_date_update" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Note </label>
        <textarea style="resize: none" id="fee_student_note_update" class="col-xs-12 col-lg-4 limited" maxlength="100" placeholder="Fee Note Description"></textarea>

        <label class="col-xs-12 col-lg-2"> Last Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="fee_student_last_date_update" data-rel="tooltip" title="Last Date should not be less than Issue Date" data-placement="bottom" class="form-control" type="date" />
        </div>

        <label class="col-xs-12 col-lg-2"> Submit Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="fee_student_submit_date_update" data-rel="tooltip" title="Submit Date should not be less than Issue Date" data-placement="bottom" class="form-control" type="date" />
        </div>
        
</div>
</div>
<div class="modal-footer">
<button class="btn btn-primary" id="student_fees_information_update_model_button"><i class='fa fa-pencil-square-o'></i> Yes Update </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>
