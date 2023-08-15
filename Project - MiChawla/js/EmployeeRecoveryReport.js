$(document).ready(function()
{
localStorage.setItem("days",0);
LoadDateWiseRecovery();

$("#searchbtn").click(function(){
$("#textdate").text($("#searchdate").val()); 
LoadDateWiseRecovery();
$("#searchdate").val("");
});
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
success: function(result)
{
$("#textdate").text(result);
LoadDateWiseRecovery();
}
});
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
data:"Employeedaterecovery="+$("#textdate").text()+"&dayrecoveryemployeeid="+$("#userid").val(), 
success: function(result)
{
$("#dateenterytable").html(result);
}
}); 
}