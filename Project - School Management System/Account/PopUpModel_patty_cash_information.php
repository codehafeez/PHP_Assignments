<!-- This Hidden Field For Update & Delete Record in DB -->
<input id="patty_cash_id" type="hidden" />

<!-- ========================================================================================================= -->
<!-- =========================================== View PopUp-Model ============================================ -->
<!-- ========================================================================================================= -->
<div class="modal fade" id="show_model_patty_cash_employee_salary_information_view" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Patty Cash Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input readonly="true" id="patty_cash_amount_view" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input readonly="true" id="patty_cash_date_view" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Description </label>
        <textarea readonly="true" style="resize: none" id="patty_cash_description_view" class="col-xs-12 col-lg-10 limited" maxlength="100" placeholder="Cash Description"></textarea>
        
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

<div class="modal fade" id="show_model_patty_cash_information_update" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Update Patty Cash Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input id="patty_cash_amount_update" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="patty_cash_date_update" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Description </label>
        <textarea style="resize: none" id="patty_cash_description_update" class="col-xs-12 col-lg-10 limited" maxlength="200" placeholder="Cash Description"></textarea>
        
</div>
</div>
<div class="modal-footer">
<button class="btn btn-primary" id="patty_cash_information_update_model_button"><i class='fa fa-pencil-square-o'></i> Yes Update </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>

<!-- ========================================================================================================= -->
<!-- =========================================== Delete PopUp-Model ========================================== -->
<!-- ========================================================================================================= -->
<div class="modal fade" id="show_model_employee_salary_information_delete" role="dialog">
<div class="modal-dialog" style="width:60%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Delete Patty Cash Information </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:10px; margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input readonly="true" id="patty_cash_amount_delete" type="text" style="margin-bottom: 15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />

        <label class="col-xs-12 col-lg-2"> Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input readonly="true" id="patty_cash_date_delete" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Description </label>
        <textarea readonly="true" style="resize: none" id="patty_cash_description_delete" class="col-xs-12 col-lg-10 limited" maxlength="100" placeholder="Cash Description"></textarea>

</div>
</div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" id="patty_cash_information_delete_model_button"><i class='fa fa-trash-o'></i> Yes Delete </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>
