$(document).ready(function()
{
localStorage.setItem("days",0);
LoadDateWiseRecovery();
$("#PreviousDate").click(function()
{
var days=localStorage.getItem("days"); 
days--;
localStorage.setItem("days",days);
var dates=days+"days";
$.ajax
({
type: "POST",
url: "Database/DayRecoveryController.php",
data:"selectiondate="+dates, 
cache: false,
success: function(result)
{
$("#textdate").text(result);
LoadDateWiseRecovery();
}
});
});
$("#searchbtn").click(function()
{
$("#textdate").text($("#searchdate").val()); 
LoadDateWiseRecovery();
$("#searchdate").val("");
});
$("#NextDate").click(function()
{
var days=localStorage.getItem("days"); 
days++;
localStorage.setItem("days",days);
var dates=days+"days";
$.ajax
({
type: "POST",
url: "Database/DayRecoveryController.php",
data:"selectiondate="+dates, 
cache: false,
success: function(result)
{
$("#textdate").text(result);
LoadDateWiseRecovery();
}
});
});
});
function LoadDateWiseRecovery()
{
$.ajax
({
type: "POST",
url: "Database/DayRecoveryController.php",
data:"getdaterecovery="+$("#textdate").text(), 
cache: false,
success: function(result)
{
$("#dateenterytable").html(result);
}
}); 
}

