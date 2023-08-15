$(document).ready(function()
{
    function load_total_amount_employee_salary()
    {
        var str = $("#employee_salary_total_amount").val(); 
        var arr1 = str.split(",");
        var first_step = "";
        for (var i=0; i<arr1.length; i++) { first_step += arr1[i]; }
        
        var arr2 = first_step.split("-");
        var totoal_employee_salary_count = 0;
        for (var i=0; i<arr2.length-1; i++) { totoal_employee_salary_count = totoal_employee_salary_count + parseInt(arr2[i]); }
        $("#employee_salary_total_amount").val("Total Amount "+totoal_employee_salary_count);
    }
    
    $(document).on("click", "#salary_employee_save_button", function()
    {
        reset_fields_background_color();
        var salary_employee_id = $("#salary_employee_id").val(); 
        var salary_employee_name = $("#salary_employee_name").val();
        var salary_employee_amount = $("#salary_employee_amount").val(); 
        var salary_employee_submit_date = $("#salary_employee_submit_date").val(); 
        var salary_employee_note = $("#salary_employee_note").val(); 

        if(salary_employee_id.length < 1){
            $("#salary_employee_id").css("background-color","#FAF0E6");
            $("#salary_employee_id").focus();
        }
        else if(salary_employee_name.length < 1){
            $("#salary_employee_name").css("background","#FAF0E6");
            $("#salary_employee_name").focus();
        }
        else if(salary_employee_amount.length < 1){
            $("#salary_employee_amount").css("background-color","#FAF0E6");
            $("#salary_employee_amount").focus();
        }
        else if(salary_employee_submit_date.length < 1){
            $("#salary_employee_submit_date").css("background-color","#FAF0E6");
            $("#salary_employee_submit_date").focus();
        }
        else { 
            var save_salary_info = "salary_employee_id="+salary_employee_id+"&salary_employee_amount="+salary_employee_amount
            +"&salary_employee_submit_date="+salary_employee_submit_date+"&salary_employee_note="+salary_employee_note;
    
            $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:save_salary_info,
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
            } 	        
        });
    });
    
    $(document).on("click", "#salary_employee_reset_button", function() {
        reset_from_values();
        reset_fields_background_color();
    });
    
    function reset_from_values() {
        $("#salary_employee_id").val(""); 
        $("#salary_employee_name").val(""); 
        $("#salary_employee_father_name").val(""); 
        $("#salary_employee_father_cnic").val(""); 
        $("#salary_employee_amount").val(""); 
        $("#salary_employee_submit_date").val(""); 
        $("#salary_employee_note").val(""); 
    }
    
    function reset_fields_background_color(){
        $("#salary_employee_id").css("background-color","#FFF");
        $("#salary_employee_name").css("background-color","#FFF");
        $("#salary_employee_father_name").css("background-color","#FFF");
        $("#salary_employee_father_cnic").css("background-color","#FFF");
        $("#salary_employee_amount").css("background-color","#FFF");
        $("#salary_employee_submit_date").css("background-color","#FFF");
        $("#salary_employee_note").css("background-color","#FFF");
    }

    // =========================================================================
    // ========================== Salary Information ===========================
    // =========================================================================
    
    Load_Employee_Salary_Information_DataTable_Function();
    function Load_Employee_Salary_Information_DataTable_Function()
    {
        var dataString = "Load_Salary_Information_Data";
        $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:dataString,
            success:function(data){ $("#employee_load_salary_information_data_table_id").html(data); load_total_amount_employee_salary(); }
        });
    }    

    $("#employee_salary_search_value").keyup(function(){
        var employee_salary_search_value = $("#employee_salary_search_value").val(); 
        var search_value = "search_employee_salary_data="+employee_salary_search_value;
        $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:search_value,
            success:function(data){ $("#employee_load_salary_information_data_table_id").html(data); load_total_amount_employee_salary(); }
        });
    });
    
    $(document).on("click", "#employee_salary_information_tab_change", function(){
        Load_Employee_Salary_Information_DataTable_Function();
    }); 
    
    $(document).on("click", ".employee_salary_information_view_button", function(){
        var employee_salary_id = $(this).attr('id');
        show_model_selary_inforamtion_read_only(employee_salary_id);
        $("#employee_salary_information_delete_model_button").hide(0);
    });    
    
    function show_model_selary_inforamtion_read_only(employee_salary_id)
    {
        $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:"employee_salary_id="+ employee_salary_id,
            success:function(data){
                var emp_salary_obj = JSON.parse(data);
                $("#my_salary_id").val(employee_salary_id);
                $("#salary_employee_id_view").val(emp_salary_obj.employee_id);
                $("#salary_employee_name_view").val(emp_salary_obj.employee_name);
                $("#salary_employee_father_name_view").val(emp_salary_obj.employee_father_name);
                $("#salary_employee_job_title_view").html('<option>'+emp_salary_obj.employee_job_title+'</option>');
                $("#salary_employee_father_cnic_view").val(emp_salary_obj.employee_father_cnic);
                $("#salary_employee_amount_view").val(emp_salary_obj.employee_salary_amount);
                $("#salary_employee_submit_date_view").val(emp_salary_obj.employee_salary_submit_date);
                $("#salary_employee_note_view").val(emp_salary_obj.employee_salary_description);
                $("#show_model_employee_salary_information_view").modal('show');
            }
        });
    }
    
    $(document).on("click", ".employee_salary_information_delete_button", function(){
        var employee_salary_id = $(this).attr('id');
        show_model_selary_inforamtion_read_only(employee_salary_id);
        $("#employee_salary_information_delete_model_button").show(0);
    });
    
    $(document).on("click", "#employee_salary_information_delete_model_button", function(){
        var salary_employee_id = $("#my_salary_id").val(); 
        $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:"delete_employee_salary_information="+ salary_employee_id,
            success:function(data){
                Load_Employee_Salary_Information_DataTable_Function();
            }
        });
    }); 
    
    $(document).on("click", ".employee_salary_information_update_button", function(){
        var employee_salary_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:"employee_salary_id="+ employee_salary_id,
            success:function(data){
                var emp_salary_obj = JSON.parse(data);
                $("#my_salary_id").val(employee_salary_id);
                $("#salary_employee_id_update").val(emp_salary_obj.employee_id);
                $("#salary_employee_name_update").val(emp_salary_obj.employee_name);
                $("#salary_employee_father_name_update").val(emp_salary_obj.employee_father_name);
                $("#salary_employee_job_title_update").html('<option>'+emp_salary_obj.employee_job_title+'</option>');
                $("#salary_employee_father_cnic_update").val(emp_salary_obj.employee_father_cnic);
                $("#salary_employee_amount_update").val(emp_salary_obj.employee_salary_amount);
                $("#salary_employee_submit_date_update").val(emp_salary_obj.employee_salary_submit_date);
                $("#salary_employee_note_update").val(emp_salary_obj.employee_salary_description);
                $("#show_model_employee_salary_information_update").modal('show');
            }
        });
    });    
    
    $(document).on("click", "#employee_salary_information_update_model_button", function(){
        update_model_reset_fields_background_color();
        var my_salary_id = $("#my_salary_id").val(); 
        var salary_employee_id = $("#salary_employee_id_update").val(); 
        var salary_employee_amount = $("#salary_employee_amount_update").val(); 
        var salary_employee_submit_date = $("#salary_employee_submit_date_update").val(); 
        var salary_employee_note = $("#salary_employee_note_update").val(); 

        if(salary_employee_amount.length < 1){
            $("#salary_employee_amount_update").css("background-color","#FAF0E6");
            $("#salary_employee_amount_update").focus();
        }
        else if(salary_employee_submit_date.length < 1){
            $("#salary_employee_submit_date_update").css("background-color","#FAF0E6");
            $("#salary_employee_submit_date_update").focus();
        }
        else { 
            var update_salary_info = "update_salary_employee_id="+salary_employee_id+"&my_salary_id="+my_salary_id
            +"&update_salary_employee_amount="+salary_employee_amount
            +"&update_salary_employee_submit_date="+salary_employee_submit_date+"&update_salary_employee_note="+salary_employee_note;
    
            $.ajax({
            type:"post",
            url:"../Database/SalaryController.php",
            data:update_salary_info,
            success:function(data) {
                if(data==="Update Successfully"){
                update_model_reset_fields_background_color();
                Load_Employee_Salary_Information_DataTable_Function(); 
                $("#show_model_employee_salary_information_update").modal('hide');  
                } else { alert(data); }
            }});
        }
    }); 
    
    function update_model_reset_fields_background_color(){
        $("#salary_employee_starting_date_update").css("background-color","#FFF");
        $("#salary_employee_id_update").css("background-color","#FFF");
        $("#salary_employee_name_update").css("background-color","#FFF");
        $("#salary_employee_amount_update").css("background-color","#FFF");
        $("#salary_employee_submit_date_update").css("background-color","#FFF");
        $("#salary_employee_note_update").css("background-color","#FFF");
    }
});
