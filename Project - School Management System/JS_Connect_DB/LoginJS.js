$(document).ready(function()
{
    $(document).on("click", "#login_Button", function()
    {
        var email = $("#email").val(); 
        var password = $("#password_login").val(); 
        $("#emailMessage").html(""); 
        $("#passwordMessage").html(""); 
         
        if(email.length > 0)
        {
            $('#email').filter(function() 
            {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if( !emailReg.test(email)) { $("#emailMessage").html("Please enter valid email address."); } 
                else 
                { 
                    if(password.length < 1) { $("#passwordMessage").html("Please enter password"); }
                    else
                    {
                        var loginInformation = "email="+email+"&password="+password;
                        $.ajax({
                            type:"post",
                            url:"Database/LoginController.php",
                            data:loginInformation,
                            success:function(data) { 
                                if(data === "YesLoginTrue"){ window.location='Dashboard/dashboard_home.php'; }
                                else { $("#passwordMessage").html("Sorry!, Password or email is incorrect..."); }
                            }
                        });
                    }
                }
            });
        }
        else { $("#emailMessage").html("Please enter email address."); }
    });
});

