$(document).ready(function()
{
LoadLoteryOption();
LoadDateWiseRecovery();
LoadEmployeeOption();
localStorage.setItem("days",0);   
$("#recoveryform").hide();    
$("#cashform").hide();
$("#checkform").hide();
//Change The Option
$("#lotteryname").change(function(){
var lotteryname=$("#lotteryname").val();
var date=$("#textdate").text();
if(lotteryname!="")
{
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"Checklotteryname="+lotteryname+"&Checklotterydate="+date, 
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
$("#employeename").change(function(){
var employeename=$("#employeename").val();
if(employeename!="")
{
$.ajax({
type:"post",
url:"Database/RecoveryController.php",
data:"employeeRecvoerydate="+$("#textdate").text()+"&employeerecoveryid="+employeename,
success:function(data)
{
$("#dailyenterytablebody").remove();
$("#dailyenterytable").append(data);
}
});
}
else
{
LoadDateWiseRecovery();
}
});
//Click Function
$("#searchbtn").click(function(){
$("#textdate").text($("#searchdate").val()); 
LoadDateWiseRecovery();
$("#searchdate").val("");
});
$("#CashSaveButton").click(function(){
var date=$("#textdate").text();
var cashamount=$("#cashamount").val();
var clientname=$("#rmemberid").val();
var recoverylotteryid=$("#lotteryname2").val();
var userid=$("#entryemployeename").val();
if(date!==""&&cashamount!==""&&clientname!==""&&recoverylotteryid!==0)
{
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"cashdate="+date+"&cashamount="+cashamount+"&cashclientname="+clientname+"&cashrecoverylotteryid="+recoverylotteryid+"&employeeid="+userid, 
success: function(result)
{
$("#Paymentype").val("");    
$("#cashamount").val("");
$("#cashform").fadeToggle(500);
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
var userid=      $("#entryemployeename").val();
var bankname=    $("#bankname").val();
var checknumber= $("#checknumber").val();
var checkamount= $("#checkamount").val();
if(date!==""&&checkamount!==""&&clientname!==""&&recoverylotteryid!==0&&bankname!==""&&checknumber!==0&&checkamount!==0)
{
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"bankdate="+date+"&bankamount="+checkamount+"&bankclientname="+clientname+"&bankrecoverylotteryid="+recoverylotteryid+"&bankemployeeid="+userid+"&bankname="+bankname+"&bankchecknumber="+checknumber, 
success: function(result)
{
$("#Paymentype").val("");
$("#bankname").val("");
$("#checknumber").val("");
$("#checkamount").val("");
$("#nameresult").hide();    
$("#checkform").fadeToggle(500);
LoadDateWiseRecovery();
}
}); 
}
else
{
alert("Please The Enter The Correct Data");    
}
});
//Recovery Button
$("#recoverybtn").click(function()
{
$("#saverecovery").show();
$("#saverecoveryupdate").hide();
$("#recoveryform").fadeToggle(500);    
});
//Date Section
$("#PreviousDate").click(function(){
var days=localStorage.getItem("days"); 
days--;
localStorage.setItem("days",days);
var dates=days+"days";
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"selectiondate="+dates, 
cache: false,
success: function(result)
{
$("#textdate").html(result);
LoadDateWiseRecovery();
}
});
});    
$("#NextDate").click(function(){
var days=localStorage.getItem("days"); 
days++;
localStorage.setItem("days",days);
var dates=days+"days";
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"selectiondate="+dates, 
cache: false,
success: function(result)
{
$("#textdate").html(result);
LoadDateWiseRecovery();
}
});
});    
$("#clientname").keyup(function(){
$("#nameresult").fadeToggle(500);
$.ajax({
type:"post",
url:"Database/ClientController.php",
data:"namesuggestion="+$("#clientname").val(),
success:function(data)
{
$("#nameresult").html(data);
}
});
});
$("#Paymentype").change(function(){
if($("#Paymentype").val()==="Cash")
{
$("#cashform").fadeToggle(1000);  
$("#checkform").hide();  
}
else if($("#Paymentype").val()==="Payment")
{
$("#cashform").hide();  
$("#checkform").fadeToggle(1000);  
}
else
{
$("#cashform").hide();
$("#checkform").hide();  
}
});

$("#deleteentry").click(function(){
$.ajax
({
type:"post",
url:"Database/RecoveryController.php",
data:"deleteentryid="+$("#deleteentryid").val(),
success:function(data)
{
LoadDateWiseRecovery();
$("#Deltemodal").modal('hide');
}
});
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
function LoadEmployeeOption()
{
$.ajax
({
type:"post",
url:"Database/EmployeeController.php",
data:"EmployeeOption="+2,
success:function(data)
{
$("#employeename").append(data);
$("#entryemployeename").append(data);
}
});
}
function LoadDateWiseRecovery()
{
$.ajax({
type:"post",
url:"Database/RecoveryController.php",
data:"Recvoerydate="+$("#textdate").text(),
success:function(data)
{
$("#dailyenterytablebody").remove();
$("#dailyenterytable").append(data);
}
});
}
$(document).on("click", ".getname", function() 
{
var rowid = $(this).attr('id'); 
$("#clientname").val(rowid);
$("#nameresult").hide();
var array=rowid.split('-');
$.ajax
({
type:"post",
url:"Database/RecoveryController.php",
data:"LoadLoteryList="+array[0],
success:function(data)
{
$("#ClientLotteryList").html(data);
}
});
});
$(document).on("click", ".radiovalue", function() 
{
var rowid = $(this).attr('id'); 
$("#recoverylotteryid").val(rowid);
});
$(document).on("click", ".memberid", function() 
{
var memberid = $(this).attr('id'); 
$("#rmemberid").val(memberid);
});
$(document).on("click", ".deletebutton", function() 
{
var memberid = $(this).attr('id'); 
$("#deleteentryid").val(memberid);
$("#Deltemodal").modal('show');
});
