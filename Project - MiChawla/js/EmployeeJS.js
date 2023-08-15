$(document).ready(function()
{
$("#EmployeeForm").hide();
$("#saveUpdateButton").hide();
$("#cancelUpdateButton").hide();
$(".insertButton").click(function()
{
$("#saveUpdateButton").hide();
$("#cancelUpdateButton").hide();
$("#saveButton").show();
$("#EmployeeForm").toggle(500);
// Set Textfields Null
clearFunction();        
});
$(document).on("click", ".updateButton", function() 
{
$("#saveButton").hide();
$("#saveUpdateButton").show();
$("#cancelUpdateButton").show();
$("#EmployeeForm").toggle(500);
});
function clearFunction()
{
$("#username").val("");
$("#password").val("");
}    
LoadEmployeeTable();        
function LoadEmployeeTable()
{
$.ajax(
{
type:"post",
url:"Database/EmployeeController.php",
data:"LoadEmployeeTable",
success:function(data)
{
$("#LotteryTableBody").html(data);
}
});
}
// Insert Data
$("#saveButton").click(function()
{
var username = $("#username").val(); 
var userType = $("#userType").val(); 
var password = $("#password").val(); 
var dataString = "username="+username+"&userType="+userType+"&password="+password;           
if(username !=="" || userType!=="" || password !=="")
{
$.ajax({
type:"post",
url:"Database/EmployeeController.php",
data:dataString,
success:function(data)
{
$("#LoadEmployeeTableBodyId").remove();
$("#EmployeeForm").fadeToggle(500);
LoadEmployeeTable();
clearFunction();
}
});
}
});
// Update Data
$(document).on("click", ".updateButton", function() 
{
var updateId = $(this).attr('id');
$.ajax({
type:"post",
url:"Database/EmployeeController.php",
data:"updateId="+ updateId,
success:function(data)
{
var user = JSON.parse(data);
$("#id").val(user.id);
$("#username").val(user.username);
$("#userType").add(user.userType);
$("#password").val(user.password);
}});});
// Update Data
$("#saveUpdateButton").click(function()
{
var id = $("#id").val(); 
var username = $("#username").val(); 
var userType = $("#userType").val(); 
var password = $("#password").val(); 
var dataString = "idUpdate="+id+"&usernameUpdate="+username+"&userTypeUpdate="+userType+"&passwordUpdate="+password;
if(username !=="" || userType!=="" || password !=="")
{
$.ajax({
type:"post",
url:"Database/EmployeeController.php",
data:dataString,
success:function(data){
$("#LoadEmployeeTableBodyId").remove();
LoadEmployeeTable();
$("#EmployeeForm").fadeToggle(500);
}
});
}
});

$(document).on("click", ".StatusButton", function() 
{
var updateId = $(this).attr('id');
var array=updateId.split('+');
$.ajax({
type:"post",
url:"Database/EmployeeController.php",
data:"uupdateId="+ array[0]+"&ustatus="+ array[1],
success:function(data)
{
LoadEmployeeTable();
}});});
});
