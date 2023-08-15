$(document).ready(function()
{
localStorage.setItem("days",0);  
$("#lotteryid").val(localStorage.getItem("lotteryID")); 
$("#lotteryname").text("Lottery "+localStorage.getItem("Name"));
LoadLotteryMemberOption();
localStorage.setItem("days",0);
$("#PreviousDate").click(function()
{
var days=localStorage.getItem("days"); 
days--;
localStorage.setItem("days",days);
var dates=days+"months";
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"monthlydate="+dates, 
cache: false,
success: function(result)
{
$("#date").text(result);
LoadLotteryMemberRecovery();
}
});
});
$("#NextDate").click(function()
{
var days=localStorage.getItem("days"); 
days++;
localStorage.setItem("days",days);
var dates=days+"months";
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"monthlydate="+dates, 
cache: false,
success: function(result)
{
$("#date").text(result);
LoadLotteryMemberRecovery();
}
});
});
//Select Change Section
$("#lotterymembers").change(function()
{
LoadLotteryMemberRecovery();
});
});
function LoadLotteryMemberRecovery()
{
$.ajax
({
type:"post",
url:"Database/RecoveryController.php",
data:"lotterymemberid="+$("#lotterymembers").val()+"&lotterymemberdate="+$("#date").text()+"&mlotteryid="+$("#lotteryid").val(),
success:function(data)
{
$("#Membersreporttablebody").remove();
$("#Membersreporttable").append(data);
}
});
}
function LoadLotteryMemberOption()
{
$.ajax
({
type:"post",
url:"Database/MemberController.php",
data:"getlotterymemberoption="+$("#lotteryid").val(),
success:function(data)
{
$("#lotterymembers").append(data);
}
});
}

