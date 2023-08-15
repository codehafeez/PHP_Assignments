$(document).ready(function()
{
    Load_Students_DataTable_Function();
    function Load_Students_DataTable_Function()
    {
        var dataString = "Load_Students_Data";
        $.ajax({
            type:"post",
            url:"../Database/StudentInformationController.php",
            data:dataString,
            success:function(data){
                $("#student_load_data_table_id").html(data);
            }
        });
    }    
    
    $(document).on("click", ".student_information_view_button", function(){
        var student_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/StudentInformationController.php",
            data:"student_id="+ student_id,
            success:function(data){
                var stu_obj = JSON.parse(data);
                $("#student_id_view").val(stu_obj.student_id);
                $("#student_name_view").val(stu_obj.student_name);
                $("#student_father_name_view").val(stu_obj.student_father_name);
                $("#student_gender_view").html('<option>'+stu_obj.student_gender+'</option>');
                $("#student_class_view").html('<option>'+stu_obj.student_class+'</option>');
                $("#student_date_of_birth_view").val(stu_obj.student_date_of_birth);
                $("#student_date_of_admission_view").val(stu_obj.student_date_of_admission);
                $("#student_father_cnic_view").val(stu_obj.student_father_cnic);
                $("#student_contact_number_view").val(stu_obj.student_contact_number);
                $("#student_address_view").val(stu_obj.student_address);
                $("#student_status_view").html('<option>'+stu_obj.student_status+'</option>');
                $("#student_description_view").val(stu_obj.student_description);
                $("#show_model_student_information_view").modal('show');
            }
        });
    });
    
    $(document).on("click", ".student_information_update_button", function(){
        var student_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/StudentInformationController.php",
            data:"student_id="+ student_id,
            success:function(data){
                var stu_obj = JSON.parse(data);
                $("#student_id_update").val(stu_obj.student_id);
                $("#student_name_update").val(stu_obj.student_name);
                $("#student_father_name_update").val(stu_obj.student_father_name);
                $("#student_gender_update").val(stu_obj.student_gender);
                $("#student_class_update").val(stu_obj.student_class);            
                $("#student_date_of_birth_update").val(stu_obj.student_date_of_birth);
                $("#student_date_of_admission_update").val(stu_obj.student_date_of_admission);
                $("#student_father_cnic_update").val(stu_obj.student_father_cnic);
                $("#student_contact_number_update").val(stu_obj.student_contact_number);
                $("#student_address_update").val(stu_obj.student_address);
                $("#student_status_update").val(stu_obj.student_status);
                $("#student_description_update").val(stu_obj.student_description);
                $("#show_model_student_information_update").modal('show');
            }
        });
    });
    
    $(document).on("click", "#student_update_information_model_button", function()
    {
        reset_fields_background_color();
        var student_date_of_birth_update = $("#student_date_of_birth_update").val();
        var student_date_of_admission_update = $("#student_date_of_admission_update").val();
        var date1_pieces = student_date_of_birth_update.split('-');
        var date2_pieces = student_date_of_admission_update.split('-');
        var start_year = date1_pieces[0];
        var end_year = date2_pieces[0];
        var years = end_year - start_year;
        
        var student_id_update = $("#student_id_update").val();
        var student_name_update = $("#student_name_update").val();
        var student_father_name_update = $("#student_father_name_update").val();
        var student_gender_update = $("#student_gender_update").val();
        var student_class_update = $("#student_class_update").val();
        var student_father_cnic_update = $("#student_father_cnic_update").val();
        var student_contact_number_update = $("#student_contact_number_update").val();
        var student_address_update = $("#student_address_update").val();
        var student_status_update = $("#student_status_update").val();
        var student_description_update = $("#student_description_update").val();
        
        if(student_id_update.length < 1){
            $("#student_id_update").css("background-color","#FAF0E6");
            $("#student_id_update").focus();
        }
        else if(student_name_update.length < 1){
            $("#student_name_update").css("background-color","#FAF0E6");
            $("#student_name_update").focus();
        }
        else if(student_father_name_update.length < 1){
            $("#student_father_name_update").css("background-color","#FAF0E6");
            $("#student_father_name_update").focus();
        }
        else if(student_date_of_birth_update.length < 1){
            $("#student_date_of_birth_update").css("background-color","#FAF0E6");
            $("#student_date_of_birth_update").focus();
        }
        else if(student_date_of_admission_update.length < 1){
            $("#student_date_of_admission_update").css("background-color","#FAF0E6");
            $("#student_date_of_admission_update").focus();
        }
        else if(years < 5) {
            $("#student_date_of_admission_update").css("background-color","#FAF0E6");
            $("#student_date_of_admission_update").focus();
        }        
        else if(student_father_cnic_update.length < 1){
            $("#student_father_cnic_update").css("background-color","#FAF0E6");
            $("#student_father_cnic_update").focus();
        }
       else 
        {
            var update_stu_info = "student_id_update="+student_id_update
            +"&student_name_update="+student_name_update+"&student_father_name_update="+student_father_name_update
            +"&student_gender_update="+student_gender_update+"&student_class_update="+student_class_update+"&student_date_of_birth_update="+student_date_of_birth_update
            +"&student_date_of_admission_update="+student_date_of_admission_update+"&student_father_cnic_update="+student_father_cnic_update
            +"&student_contact_number_update="+student_contact_number_update+"&student_address_update="+student_address_update
            +"&student_status_update="+student_status_update+"&student_description_update="+student_description_update;
            $.ajax({
                type:"post",
                url:"../Database/StudentInformationController.php",
                data: update_stu_info,
                success:function(data){
                    Load_Students_DataTable_Function(); 
                    $("#show_model_student_information_update").modal('hide');  
                }
            });
        }
    });
    
     function reset_fields_background_color(){
        $("#student_id_update").css("background-color","#FFF");
        $("#student_name_update").css("background-color","#FFF");
        $("#student_father_name_update").css("background-color","#FFF");
        $("#student_date_of_birth_update").css("background-color","#FFF");
        $("#student_date_of_admission_update").css("background-color","#FFF");
        $("#student_father_cnic_update").css("background-color","#FFF");
    }
    
    $(document).on("click", ".student_information_delete_button", function(){
        var student_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/StudentInformationController.php",
            data:"student_id="+ student_id,
            success:function(data){
                var stu_obj = JSON.parse(data);
                $("#student_id_delete").val(stu_obj.student_id);
                $("#student_name_delete").val(stu_obj.student_name);
                $("#student_father_name_delete").val(stu_obj.student_father_name);
                $("#student_gender_delete").html('<option>'+stu_obj.student_gender+'</option>');
                $("#student_class_delete").html('<option>'+stu_obj.student_class+'</option>');                
                $("#student_date_of_birth_delete").val(stu_obj.student_date_of_birth);
                $("#student_date_of_admission_delete").val(stu_obj.student_date_of_admission);
                $("#student_father_cnic_delete").val(stu_obj.student_father_cnic);
                $("#student_contact_number_delete").val(stu_obj.student_contact_number);
                $("#student_address_delete").val(stu_obj.student_address);
                $("#student_status_delete").html('<option>'+stu_obj.student_status+'</option>');
                $("#student_description_delete").val(stu_obj.student_description);
                $("#show_model_student_information_delete").modal('show');
            }
        });
    });
    
    $(document).on("click", "#student_delete_information_model_button", function(){
        var student_id = $("#student_id_delete").val();
        $.ajax({
            type:"post",
            url:"../Database/StudentInformationController.php",
            data:"student_id_delete="+ student_id,
            success:function(data){
                Load_Students_DataTable_Function(); 
            }
        });
    });

    $(".student_search").keyup(function(){ 
        var student_search = $("#search_value").val(); 
        var search_info = "student_search="+student_search;
        $.ajax({
            type:"post",
            url:"../Database/StudentInformationController.php",
            data:search_info,
            success:function(data){
                $("#student_load_data_table_id").html(data);
            }
        });
    });
});
