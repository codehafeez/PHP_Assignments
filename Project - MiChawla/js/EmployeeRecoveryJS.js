$(document).ready(function()
{
LoadLoteryOption();
LoadDateWiseRecovery();
$("#recoveryform").hide();    
$("#cashform").hide();
$("#bankform").hide();
//Recovery Button
$("#recoverybtn").click(function()
{
$("#saverecovery").show();
$("#saverecoveryupdate").hide();
$("#recoveryform").fadeToggle(500);    
});

//Change Select
$("#lotteryname").change(function(){
var lotteryname=$("#lotteryname").val();
var date=$("#textdate").text();
var employeeid=$("#userid").val();
if(lotteryname!='')
{
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"employeeidlotteryname="+lotteryname+"&employeeidlotterydate="+date+"&employeelotteryid="+employeeid, 
success: function(result)
{
$("#dailyenterytablebody").remove();
$("#dailyenterytable").append(result);
}
});
}
else
{
LoadDateWiseRecovery();    
}
});
$("#lotteryname2").change(function(){
var lotteryname=$("#lotteryname2").val();
$.ajax
({
type: "POST",
url: "Database/MemberController.php",
data:"getlotterymember="+lotteryname, 
success: function(result)
{
$("#membernamelist").html(result);
}
}); 
});
$("#Paymentype").change(function(){
if($("#Paymentype").val()==="Cash")
{
$("#cashform").fadeToggle(1000);  
$("#bankform").hide();  
}
else if($("#Paymentype").val()==="Payment")
{
$("#cashform").hide();  
$("#bankform").fadeToggle(1000);  
}
else
{
$("#cashform").hide();
$("#bankform").hide();  
}
});
//Cash Save Button
$("#CashSaveButton").click(function(){
var date=$("#textdate").text();
var cashamount=$("#cashamount").val();
var clientname=$("#rmemberid").val();
var recoverylotteryid=$("#lotteryname2").val();
var userid=$("#userid").val();
if(date!==""&&cashamount!==""&&clientname!==""&&recoverylotteryid!==0)
{
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"cashdate="+date+"&cashamount="+cashamount+"&cashclientname="+clientname+"&cashrecoverylotteryid="+recoverylotteryid+"&employeeid="+userid, 
success: function(result)
{
$("#nameresult").fadeToggle(500);
$("#nameresult").hide();
LoadDateWiseRecovery();
}
}); 
}
else
{
alert("Please The Enter The Correct Data");    
}
});
$("#BankButton").click(function(){
var date=$("#textdate").text();
var clientname=$("#rmemberid").val();
var recoverylotteryid=$("#lotteryname2").val();
var userid=$("#userid").val();
var bankname=$("#bankname").val();
var checknumber=$("#checknumber").val();
var checkamount=$("#checkamount").val();
if(date!==""&&checkamount!==""&&clientname!==""&&recoverylotteryid!==0&&bankname!==""&&checknumber!==0&&checkamount!==0)
{
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"bankdate="+date+"&bankamount="+checkamount+"&bankclientname="+clientname+"&bankrecoverylotteryid="+recoverylotteryid+"&bankemployeeid="+userid+"&bankname="+bankname+"&bankchecknumber="+checknumber, 
success: function(result)
{
$("#bankform").fadeToggle(500);
LoadDateWiseRecovery();
}
}); 
}
else
{
alert("Please The Enter The Correct Data");    
}
});
});
function LoadLoteryOption()
{
$.ajax
({
type:"post",
url:"Database/lotteryController.php",
data:"LoadLoteryOption="+2,
success:function(data)
{
$("#lotteryname").append(data);
$("#lotteryname2").append(data);
}
});
}
function LoadDateWiseRecovery()
{
$.ajax({
type:"post",
url:"Database/RecoveryController.php",
data:"employeeRecvoerydate="+$("#textdate").text()+"&employeerecoveryid="+$("#userid").val(),
success:function(data)
{
$("#dailyenterytablebody").remove();
$("#dailyenterytable").append(data);
}
});
}
$(document).on("click", ".memberid", function() 
{
var memberid = $(this).attr('id'); 
$("#rmemberid").val(memberid);
});