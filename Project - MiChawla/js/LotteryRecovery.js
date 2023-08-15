$(document).ready(function()
{
localStorage.setItem("days",0);  
$("#lotteryid").val(localStorage.getItem("lotteryID")); 
LoadDateWiseRecovery();
$("#recoveryform").hide();    
$("#cashform").hide();
$("#checkform").hide();
$("#lotteryname").text("Lottery "+localStorage.getItem("Name"));
$("#recoverybtn").click(function()
{
$("#saverecovery").show();
$("#saverecoveryupdate").hide();
$("#recoveryform").fadeToggle(500);    
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
cache: false,
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
$.ajax({
type:"post",
url:"Database/RecoveryController.php",
data:"Checklotterydate2="+$("#textdate").text()+"&Checklotteryname2="+$("#lotteryid").val(),
success:function(data)
{
$("#dailyenterytablebody").remove();
$("#dailyenterytable").append(data);
}
});
}


