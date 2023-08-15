$(document).ready(function()
{
    Load_Student_ID_Function();
    function Load_Student_ID_Function()
    {
        var dataString = "Load_Student_ID";
        $.ajax({
            type:"post",
            url:"../Database/AdmissionController.php",
            data:dataString,
            success:function(data){
                $("#student_id").val(data);
            }
        });
    }
    
    $(document).on("click", "#student_save_button", function()
    {
        reset_fields_background_color();
        var student_date_of_birth = $("#student_date_of_birth").val(); 
        var student_date_of_admission = $("#student_date_of_admission").val(); 
        var date1_pieces = student_date_of_birth.split('-');
        var date2_pieces = student_date_of_admission.split('-');
        var start_year = date1_pieces[0];
        var end_year = date2_pieces[0];
        var years = end_year - start_year;
        
        var student_id = $("#student_id").val(); 
        var student_name = $("#student_name").val();
        var student_father_name = $("#student_father_name").val(); 
        var student_gender = $("#student_gender").val(); 
        var student_class = $("#student_class").val(); 
        var student_father_cnic_number = $("#student_father_cnic_number").val(); 
        var student_contact_number = $("#student_contact_number").val(); 
        var student_address = $("#student_address").val(); 
            
        if(student_id.length < 1){
            $("#student_id").css("background-color","#FAF0E6");
            $("#student_id").focus();
        }
        else if(student_name.length < 1){
            $("#student_name").css("background-color","#FAF0E6");
            $("#student_name").focus();
        }
        else if(student_father_name.length < 1){
            $("#student_father_name").css("background-color","#FAF0E6");
            $("#student_father_name").focus();
        }
        else if(student_date_of_birth.length < 1){
            $("#student_date_of_birth").css("background-color","#FAF0E6");
            $("#student_date_of_birth").focus();
        }
        else if(student_date_of_admission.length < 1){
            $("#student_date_of_admission").css("background-color","#FAF0E6");
            $("#student_date_of_admission").focus();
        }
        else if(years < 5) {
            $("#student_date_of_admission").css("background-color","#FAF0E6");
            $("#student_date_of_admission").focus();
        }        
        else if(student_father_cnic_number.length < 1){
            $("#student_father_cnic_number").css("background-color","#FAF0E6");
            $("#student_father_cnic_number").focus();
        }
        else {
            var save_stu_info = "student_name="+student_name
            +"&student_father_name="+student_father_name+"&student_gender="+student_gender
            +"&student_class="+student_class+"&student_date_of_birth="+student_date_of_birth
            +"&student_date_of_admission="+student_date_of_admission+"&student_father_cnic_number="+student_father_cnic_number
            +"&student_contact_number="+student_contact_number+"&student_address="+student_address;
    
            $.ajax({
            type:"post",
            url:"../Database/AdmissionController.php",
            data:save_stu_info,
            success:function(data) { 
                if(data !== ""){ 
                    alert("Database Error : "+data); 
                }
                else {
                    reset_from_values();
                    Load_Student_ID_Function();
                    alert("Student Successfully Save");
                }
            }
            });
        }
    });

    $(document).on("click", "#student_reset_button", function() {
        reset_from_values();
        reset_fields_background_color();
    });
    
    function reset_from_values()
    {
        $("#student_name").val("");         
        $("#student_father_name").val(""); 
        $("#student_date_of_birth").val(""); 
        $("#student_date_of_admission").val(""); 
        $("#student_father_cnic_number").val(""); 
        $("#student_contact_number").val(""); 
        $("#student_address").val(""); 
    }
    
    function reset_fields_background_color(){
        $("#student_id").css("background-color","#FFF");
        $("#student_name").css("background-color","#FFF");
        $("#student_father_name").css("background-color","#FFF");
        $("#student_date_of_birth").css("background-color","#FFF");
        $("#student_date_of_admission").css("background-color","#FFF");
        $("#student_father_cnic_number").css("background-color","#FFF");
    }
});

