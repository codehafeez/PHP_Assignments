<?php include 'PopUpModel_patty_cash_information.php'; ?>
<div class="page-header"> <h1> Patty Cash </h1> </div>
<div class="row">
<div class="col-sm-12 tabbable">
    
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#patty_cash_tab"> Patty Cash </a></li>
    <li><a data-toggle="tab" id="patty_cash_tab_information_tab_change" href="#patty_cash_tab_information_tab"> Patty Cash Information </a></li>
    </ul>
    
    <div class="tab-content">
    <div id="patty_cash_tab" class="tab-pane fade in active">

        <div class="row" style="margin-left:10px; margin-right: 10px;">
        <div style="margin-right: 10px;">

        <label class="col-xs-12 col-lg-2"> Date </label>
        <div style="margin-bottom: 15px;" class="input-group col-xs-12 col-lg-4">
        <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
        <input id="patty_cash_date" class="form-control" type="date" />
        </div>
        
        <label class="col-xs-12 col-lg-2"> Amount </label>
        <input id="patty_cash_amount" type="text" style="margin-bottom:15px;" class="number_account_format col-xs-12 col-lg-4 limited" maxlength="6" />
        
        <label class="col-xs-12 col-lg-2"> Description </label>
        <textarea style="resize: none" id="patty_cash_description" class="col-xs-12 col-lg-10 limited" maxlength="200" placeholder="Cash Description"></textarea>

        <div style="margin-top: 15px;" class="pull-right">
        <button id="patty_cash_save_button" class="btn btn-success"> <i class="ace-icon fa fa-save"></i> Save </button>
        <button id="patty_cash_reset_button" class="btn btn-danger"> <i class="ace-icon fa fa-remove"></i> Reset </button>
        </div>

        </div>
        </div>
        
    </div> <!-- End Patty Cash Tab Data -->

    <div id="patty_cash_tab_information_tab" class="tab-pane fade">
        <!-- ================================ (Start) Search Layout ================================ -->
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">		
        <div class="nav-search" id="nav-search">
        <form class="form-search">
        <span class="input-icon">
        <input type="text" placeholder="Search ..." class="nav-search-input" id="patty_cash_search_value" autocomplete="off" />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
        </span>
        </form>
        </div>
        </div>
        <!-- ================================== (End) Search Layout ================================ -->
        <div style="overflow: auto" id="patty_cash_load_information_data_table_id"> </div>
    </div>
    </div>

</div><!-- /.col -->
</div><!-- /.row -->
