$(document).ready(function()
{
    Load_Employees_DataTable_Function();
    function Load_Employees_DataTable_Function()
    {
        var dataString = "Load_Employees_Data";
        $.ajax({
            type:"post",
            url:"../Database/EmployeeInformationController.php",
            data:dataString,
            success:function(data){
                $("#employee_load_data_table_id").html(data);
            }
        });
    }    
    
    $(document).on("click", ".employee_information_view_button", function(){
        var student_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/EmployeeInformationController.php",
            data:"employee_id="+ student_id,
            success:function(data){
                var emp_obj = JSON.parse(data);
                $("#employee_id_view").val(emp_obj.employee_id);
                $("#employee_name_view").val(emp_obj.employee_name);
                $("#employee_father_name_view").val(emp_obj.employee_father_name);
                $("#employee_gender_view").html('<option>'+emp_obj.employee_gender+'</option>');
                $("#employee_job_title_view").html('<option>'+emp_obj.employee_job_title+'</option>');
                $("#employee_salary_view").val(emp_obj.employee_salary);
                $("#employee_date_of_birth_view").val(emp_obj.employee_date_of_birth);
                $("#employee_joining_date_view").val(emp_obj.employee_date_of_joining);
                $("#employee_father_cnic_view").val(emp_obj.employee_father_cnic);
                $("#employee_contact_number_view").val(emp_obj.employee_contact_number);
                $("#employee_address_view").val(emp_obj.employee_address);
                $("#employee_status_view").html('<option>'+emp_obj.employee_status+'</option>');
                $("#employee_description_view").val(emp_obj.employee_description);
                $("#show_model_employee_information_view").modal('show');
            }
        });
    });
    
    $(document).on("click", ".employee_information_update_button", function(){
        var employee_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/EmployeeInformationController.php",
            data:"employee_id="+ employee_id,
            success:function(data){
                var emp_obj = JSON.parse(data);
                $("#employee_id_update").val(emp_obj.employee_id);
                $("#employee_name_update").val(emp_obj.employee_name);
                $("#employee_father_name_update").val(emp_obj.employee_father_name);
                $("#employee_gender_update").val(emp_obj.employee_gender);
                $("#employee_job_title_update").val(emp_obj.employee_job_title);
                $("#employee_salary_update").val(emp_obj.employee_salary);
                $("#employee_date_of_birth_update").val(emp_obj.employee_date_of_birth);
                $("#employee_joining_date_update").val(emp_obj.employee_date_of_joining);
                $("#employee_father_cnic_update").val(emp_obj.employee_father_cnic);
                $("#employee_contact_number_update").val(emp_obj.employee_contact_number);
                $("#employee_address_update").val(emp_obj.employee_address);
                $("#employee_status_update").val(emp_obj.employee_status);
                $("#employee_description_update").val(emp_obj.employee_description);
                $("#show_model_employee_information_update").modal('show');
            }
        });
    });
    
    $(document).on("click", "#employee_update_information_model_button", function()
    {
        reset_field_background_color();
        var employee_date_of_birth_update = $("#employee_date_of_birth_update").val();
        var employee_joining_date_update = $("#employee_joining_date_update").val();
        var date1_pieces = employee_date_of_birth_update.split('-');
        var date2_pieces = employee_joining_date_update.split('-');
        var start_year = date1_pieces[0];
        var end_year = date2_pieces[0];
        var years = end_year - start_year;
        
        var employee_id_update = $("#employee_id_update").val();
        var employee_name_update = $("#employee_name_update").val();
        var employee_father_name_update = $("#employee_father_name_update").val();
        var employee_gender_update = $("#employee_gender_update").val();
        var employee_job_title_update = $("#employee_job_title_update").val();
        var employee_salary_update = $("#employee_salary_update").val();
        var employee_father_cnic_update = $("#employee_father_cnic_update").val();
        var employee_contact_number_update = $("#employee_contact_number_update").val();
        var employee_address_update = $("#employee_address_update").val();
        var employee_status_update = $("#employee_status_update").val();
        var employee_description_update = $("#employee_description_update").val();
        
        if(employee_id_update.length < 1){
            $("#employee_id_update").css("background-color","#FAF0E6");
            $("#employee_id_update").focus();
        }
        else if(employee_name_update.length < 1){
            $("#employee_name_update").css("background-color","#FAF0E6");
            $("#employee_name_update").focus();
        }
        else if(employee_father_name_update.length < 1){
            $("#employee_father_name_update").css("background-color","#FAF0E6");
            $("#employee_father_name_update").focus();
        }
        else if(employee_salary_update.length < 1){
            $("#employee_salary_update").css("background-color","#FAF0E6");
            $("#employee_salary_update").focus();
        }
        else if(employee_date_of_birth_update.length < 1){
            $("#employee_date_of_birth_update").css("background-color","#FAF0E6");
            $("#employee_date_of_birth_update").focus();
        }
        else if(employee_joining_date_update.length < 1){
            $("#employee_joining_date_update").css("background-color","#FAF0E6");
            $("#employee_joining_date_update").focus();
        }
        else if(years < 15) {
            $("#employee_joining_date_update").css("background-color","#FAF0E6");
            $("#employee_joining_date_update").focus();
        }        
        else if(employee_father_cnic_update.length < 1){
            $("#employee_father_cnic_update").css("background-color","#FAF0E6");
            $("#employee_father_cnic_update").focus();
        }
        else 
        {
            var update_stu_info = "employee_id_update="+employee_id_update
            +"&employee_name_update="+employee_name_update+"&employee_father_name_update="+employee_father_name_update
            +"&employee_gender_update="+employee_gender_update+"&employee_job_title_update="+employee_job_title_update+"&employee_salary_update="+employee_salary_update
            +"&employee_date_of_birth_update="+employee_date_of_birth_update+"&employee_joining_date_update="+employee_joining_date_update
            +"&employee_father_cnic_update="+employee_father_cnic_update+"&employee_contact_number_update="+employee_contact_number_update
            +"&employee_address_update="+employee_address_update+"&employee_status_update="+employee_status_update+"&employee_description_update="+employee_description_update;
            $.ajax({
                type:"post",
                url:"../Database/EmployeeInformationController.php",
                data: update_stu_info,
                success:function(data){
                    Load_Employees_DataTable_Function(); 
                    $("#show_model_employee_information_update").modal('hide');  
                }
            });
        }
    });
    
    function reset_field_background_color(){
        $("#employee_id_update").css("background-color","#FFF");
        $("#employee_name_update").css("background-color","#FFF");
        $("#employee_father_name_update").css("background-color","#FFF");
        $("#employee_salary_update").css("background-color","#FFF");
        $("#employee_date_of_birth_update").css("background-color","#FFF");
        $("#employee_joining_date_update").css("background-color","#FFF");
        $("#employee_father_cnic_update").css("background-color","#FFF");
    }
    
    $(document).on("click", ".employee_information_delete_button", function(){
        var employee_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/EmployeeInformationController.php",
            data:"employee_id="+ employee_id,
            success:function(data){
                var emp_obj = JSON.parse(data);
                $("#employee_id_delete").val(emp_obj.employee_id);
                $("#employee_name_delete").val(emp_obj.employee_name);
                $("#employee_father_name_delete").val(emp_obj.employee_father_name);
                $("#employee_gender_delete").html('<option>'+emp_obj.employee_gender+'</option>');
                $("#employee_job_title_delete").html('<option>'+emp_obj.employee_job_title+'</option>');
                $("#employee_salary_delete").val(emp_obj.employee_salary);
                $("#employee_date_of_birth_delete").val(emp_obj.employee_date_of_birth);
                $("#employee_joining_date_delete").val(emp_obj.employee_date_of_joining);
                $("#employee_father_cnic_delete").val(emp_obj.employee_father_cnic);
                $("#employee_contact_number_delete").val(emp_obj.employee_contact_number);
                $("#employee_address_delete").val(emp_obj.employee_address);
                $("#employee_status_delete").html('<option>'+emp_obj.employee_status+'</option>');
                $("#employee_description_delete").val(emp_obj.employee_description);
                $("#show_model_employee_information_delete").modal('show');
            }
        });
    });
    
    $(document).on("click", "#employee_delete_information_model_button", function(){
        var employee_id = $("#employee_id_delete").val();
        $.ajax({
            type:"post",
            url:"../Database/EmployeeInformationController.php",
            data:"employee_id_delete="+ employee_id,
            success:function(data){
                Load_Employees_DataTable_Function();
            }
        });
    });
    
    $(".employee_search").keyup(function(){ 
        var employee_search = $("#search_value_employee").val(); 
        var search_info = "employee_search="+employee_search;
        $.ajax({
            type:"post",
            url:"../Database/EmployeeInformationController.php",
            data:search_info,
            success:function(data){
                $("#employee_load_data_table_id").html(data);
            }
        });
    });
});
