$(document).ready(function()
{
LoadLoteryOption();
LoadDateWiseRecovery();
localStorage.setItem("days",0);   
$("#recoveryform").hide();    
$("#cashform").hide();
$("#checkform").hide();
//Change The Option
$("#lotteryname").change(function()
{
var lotteryname=$("#lotteryname").val();
var date=$("#textdate").text();
if(lotteryname!="")
{
$.ajax
({
type: "POST",
url: "Database/OutFlowController.php",
data:"Checklotteryname="+lotteryname+"&Checklotterydate="+date, 
success: function(result)
{
$("#dailyenterytablebody").html(result);
}
});
}
else
{
LoadDateWiseRecovery();
} 
});
$("#lotteryname2").change(function()
{
var lotteryname=$("#lotteryname2").val();
$.ajax
({
type: "POST",
url: "Database/OutFlowController.php",
data:"getlotterymember="+lotteryname, 
success: function(result)
{
$("#walklist").html(result);
$("#membernamelist").html("");
}
}); 
});
//Click Function
$("#searchbtn").click(function()
{
$("#textdate").text($("#searchdate").val()); 
LoadDateWiseRecovery();
$("#searchdate").val("");
});
$("#CashSaveButton").click(function(){
var date=             $("#cashdateamount").val();
var clientid=         $("#clientid").val();
var walkid=           $("#walkid").val();
var cashamount=       $("#cashamount").val();
var recoverylotteryid=$("#lotteryname2").val();
if(date!==""&&cashamount!==""&&clientid!==""&&recoverylotteryid!==0)
{
$.ajax
({
type: "POST",
url: "Database/OutFlowController.php",
data:"cashdate="+date+"&cashamount="+cashamount+"&cashclientname="+clientid+"&cashrecoverylotteryid="+recoverylotteryid+"&cashwalkid="+walkid, 
success: function(result)
{
$("#walklist").html("");
$("#membernamelist").html("");
$("#Paymentype").val("");
$("#lotteryname2").val("");
$("#cashamount").val("");
$("#cashform").fadeToggle(500);
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
var date=    $("#bankdateamount").val();
var clientid=$("#clientid").val();
var walkid=  $("#walkid").val();
var recoverylotteryid=$("#lotteryname2").val();
var bankname=$("#bankname").val();
var checknumber=$("#checknumber").val();
var checkamount=$("#checkamount").val();
if(date!==""&&checkamount!==""&&clientid!==""&&recoverylotteryid!==0&&bankname!==""&&checknumber!==0&&checkamount!==0)
{
$.ajax
({
type: "POST",
url: "Database/OutFlowController.php",
data:"bankdate="+date+"&bankamount="+checkamount+"&bankclientname="+clientid+"&bankrecoverylotteryid="+recoverylotteryid+"&bankwalkid="+walkid+"&bankname="+bankname+"&bankchecknumber="+checknumber, 
success: function(result)
{
$("#walklist").html("");
$("#membernamelist").html("");
$("#Paymentype").val("");
$("#lotteryname2").val("");
$("#bankname").val("");
$("#checknumber").val("");
$("#checkamount").val("");
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
var dates=days+"months";
$.ajax
({
type: "POST",
url: "Database/RecoveryController.php",
data:"monthlydate="+dates, 
cache: false,
success: function(result)
{
$("#textdate").html(result);
LoadDateWiseRecovery();
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
$("#textdate").html(result);
LoadDateWiseRecovery();
}
});
});    
$("#Paymentype").change(function()
{
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
$("#deleteentry").click(function()
{
$.ajax
({
type:"post",
url:"Database/OutFlowController.php",
data:"deleteid="+$("#deleteid").val(),
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
function LoadLoteryMembers()
{
$.ajax
({
type:"post",
url:"Database/OutFlowController.php",
data:"getlotterymembers="+$("#lotteryname2").val(),
success:function(data)
{
$("#membernamelist").html(data);
}
});
}
function LoadDateWiseRecovery()
{
$.ajax
({
type:"post",
url:"Database/OutFlowController.php",
data:"getoutflow="+$("#textdate").text(),
success:function(data)
{
var array=data.split('*');   
$("#dailyenterytablebody").html(array[0]);
$("#Balance").text("Balance:- "+array[1]);
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
$(document).on("click", ".walkid", function() 
{
var rowid = $(this).attr('id'); 
$("#walkid").val(rowid);
$.ajax
({
type:"post",
url:"Database/WalkMemberController.php",
data:"loadwalkmember="+rowid,
success:function(data)
{
$("#membernamelist").html(data);
}
});
});
$(document).on("click", ".clientid", function() 
{
var rowid = $(this).attr('id'); 
$("#clientid").val(rowid);
});
$(document).on("click", ".memberid", function() 
{
var memberid = $(this).attr('id'); 
$("#rmemberid").val(memberid);
});
$(document).on("click", ".deletebutton", function() 
{
var memberid = $(this).attr('id'); 
$("#deleteid").val(memberid);
$("#Deltemodal").modal('show');
});



