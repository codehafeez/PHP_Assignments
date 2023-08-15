$(document).ready(function()
{
    $(document).on("click", "#setting_update_password_button", function()
    {
        reset_field_background_color();
        var setting_old_password = $("#setting_old_password").val(); 
        var setting_new_password = $("#setting_new_password").val();
        var setting_confirm_password = $("#setting_confirm_password").val(); 
        
        if(setting_old_password.length < 1){
            $("#setting_old_password").css("background-color","#FAF0E6");
            $("#setting_old_password").focus();
        }
        else if(setting_new_password.length < 1){
            $("#setting_new_password").css("background-color","#FAF0E6");
            $("#setting_new_password").focus();
        }
        else if(setting_confirm_password !== setting_new_password){
            $("#setting_confirm_password").css("background-color","#FAF0E6");
            $("#setting_error_message").html("Sorry, Both Password not match....!");
            $("#setting_confirm_password").focus();
        }
        else 
        {
            var update_password_info = "setting_old_password="+setting_old_password+"&setting_new_password="+setting_new_password;;
            $.ajax({
            type:"post",
            url:"../Database/ChangePasswordController.php",
            data:update_password_info,
            success:function(data) 
            { 
                $("#setting_confirm_password").css("background-color","#FFF");
                $("#setting_error_message").html("");
                if(data !== "Successfully Update Password" && data !== "Incorrect Old Password"){ 
                    reset_from_values(); alert("Database Error : "+data); 
                }
                else if(data !== "Successfully Update Password"){ 
                    $("#setting_confirm_password").css("background-color","#FAF0E6");
                    $("#setting_error_message").html(data);
                    $("#setting_confirm_password").focus();
                }
                else { alert(data); }
            }});
        }
    });

    $(document).on("click", "#setting_reset_password_button", function() {
        reset_from_values();
        reset_field_background_color();
    });
    
    function reset_from_values() {
        $("#setting_old_password").val("");         
        $("#setting_new_password").val(""); 
        $("#setting_confirm_password").val(""); 
        $("#setting_error_message").html("");
    }
    
    function reset_field_background_color(){
        $("#setting_old_password").css("background-color","#FFF");
        $("#setting_new_password").css("background-color","#FFF");
        $("#setting_confirm_password").css("background-color","#FFF");
    }
});
