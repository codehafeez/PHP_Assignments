$(document).ready(function()
{
    function load_total_amount_student_fees()
    {
        var str = $("#student_fees_total_amount").val(); 
        var arr1 = str.split(",");
        var first_step = "";
        for (var i=0; i<arr1.length; i++) { first_step += arr1[i]; }
        
        var arr2 = first_step.split("-");
        var totoal_student_fees_count = 0;
        for (var i=0; i<arr2.length-1; i++) { totoal_student_fees_count = totoal_student_fees_count + parseInt(arr2[i]); }
        $("#student_fees_total_amount").val("Total Amount "+totoal_student_fees_count);
    }
    
    $("#fee_student_id").keyup(function()
    {
        reset_fields_background_color();
        var fee_student_id = $("#fee_student_id").val(); 
        var fee_student_id_press_key = "KeyEvent_fee_student_id="+fee_student_id;
        $.ajax({
            type:"post",
            url:"../Database/FeeController.php",
            data:fee_student_id_press_key,
            success:function(data){
                var stu_obj = JSON.parse(data);
                $("#fee_student_name").val(stu_obj.student_name);
                $("#fee_student_father_name").val(stu_obj.student_father_name);
                $("#fee_student_class").val(stu_obj.student_class);
            }
        });
    });
    
    $(document).on("click", "#fee_student_save_button", function()
    {
        reset_fields_background_color();
        var Fees_Description_Monthly = document.getElementById("Fees_Description_Monthly");
        var Fees_Description_Admission = document.getElementById("Fees_Description_Admission");
        var Fees_Description_MidExam = document.getElementById("Fees_Description_MidExam");
        var Fees_Description_FinalExam = document.getElementById("Fees_Description_FinalExam");
            
        var fee_student_id = $("#fee_student_id").val(); 
        var fee_student_name = $("#fee_student_name").val();
        var fee_student_amount = $("#fee_student_amount").val(); 
        var fee_student_note = $("#fee_student_note").val();         
        var fee_student_issue_date = $("#fee_student_issue_date").val(); 
        var fee_student_last_date = $("#fee_student_last_date").val(); 
        var fee_student_submit_date = $("#fee_student_submit_date").val(); 
        
        if(fee_student_id.length < 1){
            $("#fee_student_id").css("background-color","#FAF0E6");
            $("#fee_student_id").focus();
        }
        else if(fee_student_name.length < 1){
            $("#fee_student_name").css("background","#FAF0E6");
            $("#fee_student_name").focus();
        }
        else if(!Fees_Description_Monthly.checked && !Fees_Description_Admission.checked
            && !Fees_Description_MidExam.checked && !Fees_Description_FinalExam.checked){
            $("#Fees_Description_Id").css("background-color","#FAF0E6");
            $("#Fees_Description_Id").css("border-color","#F59942");
        }
        else if(fee_student_amount.length < 1){
            $("#fee_student_amount").css("background-color","#FAF0E6");
            $("#fee_student_amount").focus();
        }
        else if(fee_student_issue_date.length < 1){
            $("#fee_student_issue_date").css("background-color","#FAF0E6");
            $("#fee_student_issue_date").focus();
        }
        else if(fee_student_last_date.length < 1){
            $("#fee_student_last_date").css("background-color","#FAF0E6");
            $("#fee_student_last_date").focus();
        }
        else if(fee_student_submit_date.length < 1){
            $("#fee_student_submit_date").css("background-color","#FAF0E6");
            $("#fee_student_submit_date").focus();
        }
        else { 
            
            // ---------------------------- Check Issue Date == OR > Last Date ----------------------------
            var error_value = 0;
            var issue_date_pieces = fee_student_issue_date.split('-');
            var last_date_pieces = fee_student_last_date.split('-');
            var years = last_date_pieces[0]-issue_date_pieces[0];
            var months = last_date_pieces[1]-issue_date_pieces[1];
            var days = last_date_pieces[2]-issue_date_pieces[2];
            if(years===0){
                if(months===0) { 
                    if(days < 0){ $("#fee_student_last_date").css("background-color","#FAF0E6"); $("#fee_student_last_date").focus(); }
                    else { error_value = 1; }
                }
                else if(months < 0){ $("#fee_student_last_date").css("background-color","#FAF0E6"); $("#fee_student_last_date").focus(); }
                else { error_value = 1; }
            }
            else if(years < 0) { $("#fee_student_last_date").css("background-color","#FAF0E6"); $("#fee_student_last_date").focus(); }
            else { error_value = 1; }
            
            
            // ---------------------------- Check Issue Date == OR > Submit Date ----------------------------
            var issue_date_pieces = fee_student_issue_date.split('-');
            var submit_date_pieces = fee_student_submit_date.split('-');
            var years = submit_date_pieces[0]-issue_date_pieces[0];
            var months = submit_date_pieces[1]-issue_date_pieces[1];
            var days = submit_date_pieces[2]-issue_date_pieces[2];
            if(error_value ===1)
            {
                if(years===0)
                {
                    if(months===0) { 
                        if(days < 0){ $("#fee_student_submit_date").css("background-color","#FAF0E6"); $("#fee_student_submit_date").focus(); }
                        else { error_value = 2; }
                    }
                    else if(months < 0){ $("#fee_student_submit_date").css("background-color","#FAF0E6"); $("#fee_student_submit_date").focus(); }
                    else { error_value = 2; }
                }
                else if(years < 0) { $("#fee_student_submit_date").css("background-color","#FAF0E6"); $("#fee_student_submit_date").focus(); }
                else { error_value = 2; }
            }
            
            
            
            if(error_value===2)
            {
                var fee_student_fee_type ="";
                if(Fees_Description_Monthly.checked){ fee_student_fee_type += "Monthly,"; }
                if(Fees_Description_Admission.checked){ fee_student_fee_type += "Admission,"; }
                if(Fees_Description_MidExam.checked){ fee_student_fee_type += "Mid Exam,"; }
                if(Fees_Description_FinalExam.checked){ fee_student_fee_type += "Final Exam,"; }

                var save_fees_info = "fee_student_issue_date="+fee_student_issue_date
                +"&fee_student_id="+fee_student_id+"&fee_student_fee_type="+fee_student_fee_type
                +"&fee_student_amount="+fee_student_amount+"&fee_student_last_date="+fee_student_last_date
                +"&fee_student_submit_date="+fee_student_submit_date+"&fee_student_note="+fee_student_note;

                $.ajax({
                type:"post",
                url:"../Database/FeeController.php",
                data:save_fees_info,
                success:function(data) { alert(data); }
                });
            }
        }
    });

    $(document).on("click", "#fee_student_print_button", function() {
        window.open("fees_acount_print.php"); 
    });
    
    $(document).on("click", "#fee_student_reset_button", function() {
        reset_from_values();
        reset_fields_background_color();
    });
    
    function reset_from_values() {
        $("#fee_student_class").val(""); 
        $("#fee_student_issue_date").val(""); 
        $("#fee_student_id").val(""); 
        $("#fee_student_name").val(""); 
        $("#fee_student_father_name").val(""); 
        $("#fee_student_amount").val(""); 
        $("#fee_student_last_date").val(""); 
        $("#fee_student_submit_date").val(""); 
        $("#fee_student_note").val(""); 
    }
    
    function reset_fields_background_color(){
        $("#Fees_Description_Id").css("border-color","#D5D5D5");
        $("#Fees_Description_Id").css("background-color","#FFF");
        $("#fee_student_issue_date").css("background-color","#FFF");
        $("#fee_student_id").css("background-color","#FFF");
        $("#fee_student_name").css("background-color","#FFF");
        $("#fee_student_father_name").css("background-color","#FFF");
        $("#fee_student_amount").css("background-color","#FFF");
        $("#fee_student_last_date").css("background-color","#FFF");
        $("#fee_student_submit_date").css("background-color","#FFF");
        $("#fee_student_note").css("background-color","#FFF");
    }
    
    // =========================================================================
    // ============================ Fees Information ===========================
    // =========================================================================
    
    Load_Students_Fees_Information_DataTable_Function();
    function Load_Students_Fees_Information_DataTable_Function()
    {
        var dataString = "Load_Fees_Information_Data";
        $.ajax({
            type:"post",
            url:"../Database/FeeController.php",
            data:dataString,
            success:function(data){ $("#student_load_fess_information_data_table_id").html(data); load_total_amount_student_fees(); }
        });
    }    
    
    $("#student_fees_search_value").keyup(function(){
        var student_fees_search_value = $("#student_fees_search_value").val(); 
        var search_value = "search_student_fees_data="+student_fees_search_value;
        $.ajax({
            type:"post",
            url:"../Database/FeeController.php",
            data:search_value,
            success:function(data){ $("#student_load_fess_information_data_table_id").html(data); load_total_amount_student_fees(); }
        });
    });
    
    $(document).on("click", ".student_fees_information_view_button", function(){
        var student_id = $(this).attr('id');
        show_fees_data_model_for_view(student_id);
        $("#student_fees_information_delete_model_button").hide(0);
    });
    
    $(document).on("click", ".student_fees_information_delete_button", function(){
        var student_id = $(this).attr('id');
        show_fees_data_model_for_view(student_id);
        $("#student_fees_information_delete_model_button").show(0);
    });
    
    function show_fees_data_model_for_view(student_id)
    {
        document.getElementById("Fees_Description_Monthly_view").checked = false;
        document.getElementById("Fees_Description_Admission_view").checked = false;
        document.getElementById("Fees_Description_MidExam_view").checked = false;
        document.getElementById("Fees_Description_FinalExam_view").checked = false;
        $.ajax({
            type:"post",
            url:"../Database/FeeController.php",
            data:"student_fees_id="+ student_id,
            success:function(data)
            {
                var stu_fees_obj = JSON.parse(data);
                $("#my_fees_id").val(student_id);
                $("#fee_student_id_view").val(stu_fees_obj.student_id);
                $("#fee_student_name_view").val(stu_fees_obj.student_name);
                $("#fee_student_father_name_view").val(stu_fees_obj.student_father_name);
                $("#fee_student_class_view").html('<option>'+stu_fees_obj.student_class+'</option>'); 
                
                var arr1 = stu_fees_obj.student_fess_type.split(",");
                for (var i=0; i<arr1.length; i++){
                    if(arr1[i]==="Monthly"){ document.getElementById("Fees_Description_Monthly_view").checked = true; }
                    if(arr1[i]==="Admission"){ document.getElementById("Fees_Description_Admission_view").checked = true; }
                    if(arr1[i]==="Mid Exam"){ document.getElementById("Fees_Description_MidExam_view").checked = true; }
                    if(arr1[i]==="Final Exam"){ document.getElementById("Fees_Description_FinalExam_view").checked = true; }
                }
                
                $("#fee_student_amount_view").val(stu_fees_obj.student_fess_amount);
                $("#fee_student_issue_date_view").val(stu_fees_obj.student_fess_start_date);
                $("#fee_student_last_date_view").val(stu_fees_obj.student_fess_end_date);
                $("#fee_student_submit_date_view").val(stu_fees_obj.student_fess_submit_date);
                $("#fee_student_note_view").val(stu_fees_obj.student_fess_description);
                $("#show_model_student_fees_information_view").modal('show');
            }
        });
    }

    $(document).on("click", "#student_fees_information_delete_model_button", function(){
        var fee_student_id_delete = $("#my_fees_id").val();
        $.ajax({
            type:"post",
            url:"../Database/FeeController.php",
            data:"delete_student_fees_information="+ fee_student_id_delete,
            success:function(data){
                Load_Students_Fees_Information_DataTable_Function();
            }
        });
    });

    $(document).on("click", ".student_fees_information_update_button", function(){
        document.getElementById("Fees_Description_Monthly_update").checked = false;
        document.getElementById("Fees_Description_Admission_update").checked = false;
        document.getElementById("Fees_Description_MidExam_update").checked = false;
        document.getElementById("Fees_Description_FinalExam_update").checked = false;
        var student_id = $(this).attr('id');
        $.ajax({
            type:"post",
            url:"../Database/FeeController.php",
            data:"student_fees_id="+ student_id,
            success:function(data){
                var stu_fees_obj = JSON.parse(data);
                $("#my_fees_id").val(stu_fees_obj.student_fess_id);
                $("#fee_student_id_update").val(stu_fees_obj.student_id);
                $("#fee_student_name_update").val(stu_fees_obj.student_name);
                $("#fee_student_father_name_update").val(stu_fees_obj.student_father_name);
                $("#fee_student_class_update").html('<option>'+stu_fees_obj.student_class+'</option>'); 
                
                var arr1 = stu_fees_obj.student_fess_type.split(",");
                for (var i=0; i<arr1.length; i++){
                    if(arr1[i]==="Monthly"){ document.getElementById("Fees_Description_Monthly_update").checked = true; }
                    if(arr1[i]==="Admission"){ document.getElementById("Fees_Description_Admission_update").checked = true; }
                    if(arr1[i]==="Mid Exam"){ document.getElementById("Fees_Description_MidExam_update").checked = true; }
                    if(arr1[i]==="Final Exam"){ document.getElementById("Fees_Description_FinalExam_update").checked = true; }
                }
                
                $("#fee_student_amount_update").val(stu_fees_obj.student_fess_amount);
                $("#fee_student_issue_date_update").val(stu_fees_obj.student_fess_start_date);
                $("#fee_student_last_date_update").val(stu_fees_obj.student_fess_end_date);
                $("#fee_student_submit_date_update").val(stu_fees_obj.student_fess_submit_date);
                $("#fee_student_note_update").val(stu_fees_obj.student_fess_description);
                $("#show_model_student_fees_information_update").modal('show');
            }
        });
    });
    
    $(document).on("click", "#student_fees_information_update_model_button", function(){
        update_model_reset_fields_background_color();
        var update_Fees_Description_Monthly = document.getElementById("Fees_Description_Monthly_update");
        var update_Fees_Description_Admission = document.getElementById("Fees_Description_Admission_update");
        var update_Fees_Description_MidExam = document.getElementById("Fees_Description_MidExam_update");
        var update_Fees_Description_FinalExam = document.getElementById("Fees_Description_FinalExam_update");
                
        var update_my_fees_id = $("#my_fees_id").val();
        var update_fee_student_id = $("#fee_student_id_update").val(); 
        var update_fee_student_amount = $("#fee_student_amount_update").val(); 
        var update_fee_student_issue_date = $("#fee_student_issue_date_update").val(); 
        var update_fee_student_last_date = $("#fee_student_last_date_update").val(); 
        var update_fee_student_submit_date = $("#fee_student_submit_date_update").val(); 
        var update_fee_student_note = $("#fee_student_note_update").val(); 
        
        if(!update_Fees_Description_Monthly.checked && !update_Fees_Description_Admission.checked
            && !update_Fees_Description_MidExam.checked && !update_Fees_Description_FinalExam.checked){
            $("#Fees_Description_Id_update").css("background-color","#FAF0E6");
            $("#Fees_Description_Id_update").css("border-color","#F59942");
        }
        else if(update_fee_student_amount.length < 1){
            $("#fee_student_amount_update").css("background-color","#FAF0E6");
            $("#fee_student_amount_update").focus();
        }
        else if(update_fee_student_issue_date.length < 1){
            $("#fee_student_issue_date_update").css("background-color","#FAF0E6");
            $("#fee_student_issue_date_update").focus();
        }
        else if(update_fee_student_last_date.length < 1){
            $("#fee_student_last_date_update").css("background-color","#FAF0E6");
            $("#fee_student_last_date_update").focus();
        }
        else if(update_fee_student_submit_date.length < 1){
            $("#fee_student_submit_date_update").css("background-color","#FAF0E6");
            $("#fee_student_submit_date_update").focus();
        }
        else 
        {
            var update_fee_student_fee_type ="";
            if(update_Fees_Description_Monthly.checked){ update_fee_student_fee_type += "Monthly,"; }
            if(update_Fees_Description_Admission.checked){ update_fee_student_fee_type += "Admission,"; }
            if(update_Fees_Description_MidExam.checked){ update_fee_student_fee_type += "Mid Exam,"; }
            if(update_Fees_Description_FinalExam.checked){ update_fee_student_fee_type += "Final Exam,"; }


            // ---------------------------- Check Issue Date == OR > Last Date ----------------------------
            var error_value = 0;
            var issue_date_pieces = update_fee_student_issue_date.split('-');
            var last_date_pieces = update_fee_student_last_date.split('-');
            var years = last_date_pieces[0]-issue_date_pieces[0];
            var months = last_date_pieces[1]-issue_date_pieces[1];
            var days = last_date_pieces[2]-issue_date_pieces[2];
            if(years===0){
                if(months===0) { 
                    if(days < 0){ $("#fee_student_last_date_update").css("background-color","#FAF0E6"); $("#fee_student_last_date_update").focus(); }
                    else { error_value = 1; }
                }
                else if(months < 0){ $("#fee_student_last_date_update").css("background-color","#FAF0E6"); $("#fee_student_last_date_update").focus(); }
                else { error_value = 1; }
            }
            else if(years < 0) { $("#fee_student_last_date_update").css("background-color","#FAF0E6"); $("#fee_student_last_date_update").focus(); }
            else { error_value = 1; }
            
            
            // ---------------------------- Check Issue Date == OR > Submit Date ----------------------------
            var issue_date_pieces = update_fee_student_issue_date.split('-');
            var submit_date_pieces = update_fee_student_submit_date.split('-');
            var years = submit_date_pieces[0]-issue_date_pieces[0];
            var months = submit_date_pieces[1]-issue_date_pieces[1];
            var days = submit_date_pieces[2]-issue_date_pieces[2];
            if(error_value ===1)
            {
                if(years===0)
                {
                    if(months===0) { 
                        if(days < 0){ $("#fee_student_submit_date_update").css("background-color","#FAF0E6"); $("#fee_student_submit_date_update").focus(); }
                        else { error_value = 2; }
                    }
                    else if(months < 0){ $("#fee_student_submit_date_update").css("background-color","#FAF0E6"); $("#fee_student_submit_date_update").focus(); }
                    else { error_value = 2; }
                }
                else if(years < 0) { $("#fee_student_submit_date_update").css("background-color","#FAF0E6"); $("#fee_student_submit_date_update").focus(); }
                else { error_value = 2; }
            }
            
            
            
            if(error_value===2)
            {
                var update_fees_info = "update_student_id="+update_fee_student_id+"&update_my_fees_id="+update_my_fees_id
                +"&update_fee_student_fee_type="+update_fee_student_fee_type
                +"&update_fee_student_amount="+update_fee_student_amount+"&update_fee_student_issue_date="+update_fee_student_issue_date
                +"&update_fee_student_last_date="+update_fee_student_last_date+"&update_fee_student_submit_date="+update_fee_student_submit_date
                +"&update_fee_student_note="+update_fee_student_note;

                $.ajax({
                type:"post",
                url:"../Database/FeeController.php",
                data:update_fees_info,
                success:function(data) 
                { 
                    if(data==="Update Successfully"){
                    update_model_reset_fields_background_color();
                    Load_Students_Fees_Information_DataTable_Function(); 
                    $("#show_model_student_fees_information_update").modal('hide');  
                    } else { alert(data); }
                }});
            }
        }
    });    
    
    $(document).on("click", "#student_fees_information_tab_change", function(){
        Load_Students_Fees_Information_DataTable_Function();
    });
    
    function update_model_reset_fields_background_color(){
        $("#Fees_Description_Id_update").css("border-color","#D5D5D5");
        $("#Fees_Description_Id_update").css("background-color","#FFF");
        $("#fee_student_amount_update").css("background-color","#FFF");
        $("#fee_student_issue_date_update").css("background-color","#FFF");
        $("#fee_student_submit_date_update").css("background-color","#FFF");
        $("#fee_student_last_date_update").css("background-color","#FFF");
    }
});
