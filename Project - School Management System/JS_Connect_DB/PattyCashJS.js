$(document).ready(function()
{    
    function load_total_amount_patty_cash()
    {
        var str = $("#patty_cash_total_amount").val(); 
        var arr1 = str.split(",");
        var first_step = "";
        for (var i=0; i<arr1.length; i++) { first_step += arr1[i]; }
        
        var arr2 = first_step.split("-");
        var totoal_patty_cash_count = 0;
        for (var i=0; i<arr2.length-1; i++) { totoal_patty_cash_count = totoal_patty_cash_count + parseInt(arr2[i]); }
        $("#patty_cash_total_amount").val("Total Amount "+totoal_patty_cash_count);
    }
    
    $("#patty_cash_search_value").keyup(function(){
        var patty_cash_search_value = $("#patty_cash_search_value").val(); 
        var search_value = "search_value_patty_cash="+patty_cash_search_value;
        $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:search_value,
            success:function(data){ $("#patty_cash_load_information_data_table_id").html(data); load_total_amount_patty_cash(); }
        });
    });
    
    $(document).on("click", "#patty_cash_save_button", function()
    {
        reset_fields_background_color();
        var patty_cash_date = $("#patty_cash_date").val(); 
        var patty_cash_amount = $("#patty_cash_amount").val(); 
        var patty_cash_description = $("#patty_cash_description").val();

        if(patty_cash_date.length < 1){
            $("#patty_cash_date").css("background-color","#FAF0E6");
            $("#patty_cash_date").focus();
        }
        else if(patty_cash_amount.length < 1){
            $("#patty_cash_amount").css("background-color","#FAF0E6");
            $("#patty_cash_amount").focus();
        }
        else 
        { 
            var patty_cash_info = "patty_cash_date="+patty_cash_date
            +"&patty_cash_amount="+patty_cash_amount+"&patty_cash_description="+patty_cash_description;
            $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:patty_cash_info,
            success:function(data) { alert(data); }
            });
        }
    });
    
    $("#salary_employee_id").keyup(function(){
        reset_fields_background_color();
        var salary_employee_id = $("#salary_employee_id").val(); 
        var salary_employee_id_press_key = "KeyEvent_salary_employee_id="+salary_employee_id;
        $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:salary_employee_id_press_key,
            success:function(data){
                var emp_obj = JSON.parse(data);
                $("#salary_employee_name").val(emp_obj.employee_name);
                $("#salary_employee_father_name").val(emp_obj.employee_father_name);
                $("#salary_employee_job_title").val(emp_obj.employee_job_title);
                $("#salary_employee_father_cnic").val(emp_obj.employee_father_cnic);
                
                $("#salary_employee_amount").val(emp_obj.employee_salary_amount);
                $("#salary_employee_starting_date").val(emp_obj.employee_salary_start_date);
                $("#salary_employee_submit_date").val(emp_obj.employee_salary_submit_date);
                $("#salary_employee_note").val(emp_obj.employee_salary_description);
            } 	        
        });
    });
    
    $(document).on("click", "#patty_cash_reset_button", function() {
        reset_from_values();
        reset_fields_background_color();
    });
    
    function reset_from_values() {
        $("#patty_cash_date").val(""); 
        $("#patty_cash_amount").val(""); 
        $("#patty_cash_description").val(""); 
    }
    
    function reset_fields_background_color(){
        $("#patty_cash_date").css("background-color","#FFF");
        $("#patty_cash_amount").css("background-color","#FFF");
        $("#patty_cash_description").css("background-color","#FFF");
    }
    
    // =========================================================================
    // ========================= Patty Cash Information ========================
    // =========================================================================
    
    Load_Patty_Cash_Information_DataTable_Function();
    function Load_Patty_Cash_Information_DataTable_Function()
    {
        var dataString = "Load_Patty_Cash_Information_Data";
        $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:dataString,
            success:function(data){ $("#patty_cash_load_information_data_table_id").html(data); load_total_amount_patty_cash(); }
        });
    }

    $(document).on("click", "#patty_cash_tab_information_tab_change", function(){
        Load_Patty_Cash_Information_DataTable_Function();
    }); 
    
    $(document).on("click", ".patty_cash_information_view_button", function(){
        var patty_cash_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:"patty_cash_id="+ patty_cash_id,
            success:function(data){
                var cash_obj = JSON.parse(data);
                $("#patty_cash_date_view").val(cash_obj.patty_cash_date);
                $("#patty_cash_amount_view").val(cash_obj.patty_cash_amount);
                $("#patty_cash_description_view").val(cash_obj.patty_cash_description);
                $("#show_model_patty_cash_employee_salary_information_view").modal('show');
            }
        });
    });

    $(document).on("click", ".patty_cash_information_delete_button", function(){
        var patty_cash_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:"patty_cash_id="+ patty_cash_id,
            success:function(data){
                var cash_obj = JSON.parse(data);
                $("#patty_cash_id").val(patty_cash_id);
                $("#patty_cash_date_delete").val(cash_obj.patty_cash_date);
                $("#patty_cash_amount_delete").val(cash_obj.patty_cash_amount);
                $("#patty_cash_description_delete").val(cash_obj.patty_cash_description);
                $("#show_model_employee_salary_information_delete").modal('show');
            }
        });
    });

    $(document).on("click", "#patty_cash_information_delete_model_button", function(){
        var patty_cash_id = $("#patty_cash_id").val(); 
        $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:"delete_patty_cash_information="+ patty_cash_id,
            success:function(data){
                Load_Patty_Cash_Information_DataTable_Function();
            }
        });
    }); 
    
    $(document).on("click", ".patty_cash_information_update_button", function(){
        var patty_cash_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:"patty_cash_id="+ patty_cash_id,
            success:function(data){
                var cash_obj = JSON.parse(data);
                $("#patty_cash_id").val(patty_cash_id);
                $("#patty_cash_date_update").val(cash_obj.patty_cash_date);
                $("#patty_cash_amount_update").val(cash_obj.patty_cash_amount);
                $("#patty_cash_description_update").val(cash_obj.patty_cash_description);
                $("#show_model_patty_cash_information_update").modal('show');
            }
        });
    });
    
    $(document).on("click", "#patty_cash_information_update_model_button", function(){
        update_reset_form();
        var patty_cash_id = $("#patty_cash_id").val(); 
        var patty_cash_date = $("#patty_cash_date_update").val(); 
        var patty_cash_amount = $("#patty_cash_amount_update").val(); 
        var patty_cash_description = $("#patty_cash_description_update").val(); 
        if(patty_cash_amount.length < 1){
            $("#patty_cash_amount_update").css("background-color","#FAF0E6");
            $("#patty_cash_amount_update").focus();
        }
        else if(patty_cash_date.length < 1){
            $("#patty_cash_date_update").css("background-color","#FAF0E6");
            $("#patty_cash_date_update").focus();
        }
        else 
        { 
            var patty_cash_update_info = "update_patty_cash_id="+patty_cash_id+"&update_patty_cash_date="+patty_cash_date
            +"&update_patty_cash_amount="+patty_cash_amount+"&update_patty_cash_description="+patty_cash_description;
            $.ajax({
            type:"post",
            url:"../Database/PattyCashController.php",
            data:patty_cash_update_info,
            success:function(data) { 
                update_reset_form();
                Load_Patty_Cash_Information_DataTable_Function(); 
                $("#show_model_patty_cash_information_update").modal('hide');  
            }});
        }
    }); 
    
    function update_reset_form(){
        $("#patty_cash_date_update").css("background-color","#FFF");
        $("#patty_cash_amount_update").css("background-color","#FFF");
    }
});
