<div class="page-header"> <h1> Change Password </h1> </div>
<div class="row" style="margin-left:10px; margin-right: 10px;">

<!-- Full Screen Use (4+4+4=12) and Small Screen (12) -->
<label class="col-xs-12 col-lg-2"> Old Password </label>
<input id="setting_old_password" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10 limited" maxlength="15" type="password" placeholder="Old Password"/>

<label class="col-xs-12 col-lg-2"> New Password </label>
<input id="setting_new_password" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10 limited" maxlength="15" type="password" placeholder="New Password"/>

<label class="col-xs-12 col-lg-2"> Confirm Password </label>
<input id="setting_confirm_password" style="margin-bottom: 15px;" class="col-xs-12 col-lg-10 limited" maxlength="15" type="password" placeholder="Confirm Password"/>
<label id="setting_error_message" style="margin-left:185px; color:red;"> </label>


<button id="setting_update_password_button" style="margin-left: 15px;" class="btn btn-success pull-right"> <i class="ace-icon fa fa-refresh"></i> Update </button>
<button id="setting_reset_password_button" class="btn btn-danger pull-right"> <i class="ace-icon fa fa-remove"></i> Reset </button>
</div>
