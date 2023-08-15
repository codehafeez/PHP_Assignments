$(document).ready(function()
{
    Load_Employee_ID_Function();
    function Load_Employee_ID_Function()
    {
        var dataString = "Load_Employee_ID";
        $.ajax({
            type:"post",
            url:"../Database/AddEmployeeController.php",
            data:dataString,
            success:function(data){
                $("#employee_id").val(data);
            }
        });
    }
    
    $(document).on("click", "#employee_save_button", function()
    {
        reset_field_background_color();
        var employee_date_of_birth = $("#employee_date_of_birth").val(); 
        var employee_date_of_joining = $("#employee_date_of_joining").val(); 
        var date1_pieces = employee_date_of_birth.split('-');
        var date2_pieces = employee_date_of_joining.split('-');
        var start_year = date1_pieces[0];
        var end_year = date2_pieces[0];
        var years = end_year - start_year;
        
        var employee_id = $("#employee_id").val(); 
        var employee_name = $("#employee_name").val();
        var employee_father_name = $("#employee_father_name").val(); 
        var employee_gender = $("#employee_gender").val(); 
        var employee_job = $("#employee_job").val(); 
        var employee_salary = $("#employee_salary").val(); 
        var employee_father_cnic_number = $("#employee_father_cnic_number").val(); 
        var employee_contact_number = $("#employee_contact_number").val(); 
        var employee_address = $("#employee_address").val(); 
        
        if(employee_id.length < 1){
            $("#employee_id").css("background-color","#FAF0E6");
            $("#employee_id").focus();
        }
        else if(employee_name.length < 1){
            $("#employee_name").css("background-color","#FAF0E6");
            $("#employee_name").focus();
        }
        else if(employee_father_name.length < 1){
            $("#employee_father_name").css("background-color","#FAF0E6");
            $("#employee_father_name").focus();
        }
        else if(employee_salary.length < 1){
            $("#employee_salary").css("background-color","#FAF0E6");
            $("#employee_salary").focus();
        }
        else if(employee_date_of_birth.length < 1){
            $("#employee_date_of_birth").css("background-color","#FAF0E6");
            $("#employee_date_of_birth").focus();
        }
        else if(employee_date_of_joining.length < 1){
            $("#employee_date_of_joining").css("background-color","#FAF0E6");
            $("#employee_date_of_joining").focus();
        }
        else if(years < 15) {
            $("#employee_date_of_joining").css("background-color","#FAF0E6");
            $("#employee_date_of_joining").focus();
        }        
        else if(employee_father_cnic_number.length < 1){
            $("#employee_father_cnic_number").css("background-color","#FAF0E6");
            $("#employee_father_cnic_number").focus();
        }
        else {
            var save_emp_info = "employee_name="+employee_name
            +"&employee_father_name="+employee_father_name+"&employee_gender="+employee_gender
            +"&employee_job="+employee_job+"&employee_date_of_birth="+employee_date_of_birth
            +"&employee_date_of_joining="+employee_date_of_joining+"&employee_father_cnic_number="+employee_father_cnic_number
            +"&employee_contact_number="+employee_contact_number+"&employee_address="+employee_address
            +"&employee_salary="+employee_salary;
    
            $.ajax({
            type:"post",
            url:"../Database/AddEmployeeController.php",
            data:save_emp_info,
            success:function(data) { 
                if(data !== ""){ 
                    alert("Database Error : "+data); 
                }
                else {
                    reset_from_values();
                    Load_Employee_ID_Function();
                    alert("Employee Successfully Save");
                }
            }
            });
        }
    });

    $(document).on("click", "#employee_reset_button", function() {
        reset_from_values();
        reset_field_background_color();
    });
    
    function reset_from_values()
    {
        $("#employee_name").val("");         
        $("#employee_father_name").val(""); 
        $("#employee_date_of_birth").val(""); 
        $("#employee_date_of_joining").val(""); 
        $("#employee_father_cnic_number").val(""); 
        $("#employee_contact_number").val(""); 
        $("#employee_address").val(""); 
        $("#employee_salary").val(""); 
    }
    
    function reset_field_background_color(){
        $("#employee_id").css("background-color","#FFF");
        $("#employee_name").css("background-color","#FFF");
        $("#employee_father_name").css("background-color","#FFF");
        $("#employee_date_of_birth").css("background-color","#FFF");
        $("#employee_date_of_joining").css("background-color","#FFF");
        $("#employee_father_cnic_number").css("background-color","#FFF");
        $("#employee_salary").css("background-color","#FFF");
    }
});
