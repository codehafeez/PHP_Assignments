$(document).ready(function()
{
$(document).on("click", "#login_Button", function()
{
var id = $("#id").val(); 
var password = $("#password").val(); 
if(id.length < 1)
{ 
$("#idMessage").html("Please enter id");
} 
else
{ 
$("#idMessage").html(""); 
if(password.length < 1){ 
$("#passwordMessage").html("Please enter password");
} 
else
{ 
$("#password").html(""); 
var dataString = "userId="+id+"&userPassowrd="+password;
$.ajax(
{
type:"post",
url:"Database/LoginController.php",
data:dataString,
success:function(data)
{
if(data === "Admin" ) 
{ 
window.location='Home.php'; 
}
else if(data === "Super Admin") 
{ 
window.location='Home.php'; 
}
else if(data === "Employee") 
{ 
window.location='EmployeePortal.php'; 
}
else 
{ 
$("#passwordMessage").html("Id or Password is Incorrect..!");  
}
}
});
}
}
});    
});
