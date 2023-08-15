$(document).ready(function()
{
$("#lotteryid").val(localStorage.getItem("lotteryID")); 
LoadMembers();
LoadWake();
LoadForWalkMembers();
$("#lotteryname").text("Lottery "+localStorage.getItem("Name")); 
$("#wakeform").hide();
//Wake Form Button
$("#wakeformbtn").click(function()
{
$("#wakeupdate").hide();
$("#savewake").show();
$("#wakeform").fadeToggle(500);
});
$("#savewake").click(function()
{
var lotterID=      $("#lotteryid").val();
var admincommison= $("#admincommison").val();
var wakeamount=    $("#wakeamount").val();
var wakedate=      $("#wakedate").val();
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"lotterID="+lotterID+"&admincommison="+admincommison+"&wakeamount="+wakeamount+"&wakedate="+wakedate, 
success: function(result)
{
var admincommison= $("#admincommison").val("");
var wakeamount=    $("#wakeamount").val("");    
LoadWake();
$("#wakeform").fadeToggle(500);
}
});
});
$("#savewalkmember").click(function()
{
var Lotterywalkid= $("#lotterywalkid").val();
var WalkMembers=    $("#WalkMembers").val();
var Percentage=      $("#percentage").val();
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"memberwalkid="+Lotterywalkid+"&walkmemberid="+WalkMembers+"&walkmemberperce="+Percentage, 
success: function(result)
{
var Percentage=      $("#percentage").val("");
LoadWake();
$("#addwalkmembermodal").modal('hide');
}
});    
});
//Update Entry Section
$("#wakeupdate").click(function()
{
var wakerowid=      $("#wakerowid").val();
var lotterID=      $("#lotteryid").val();
var admincommison= $("#admincommison").val();
var wakeamount=    $("#wakeamount").val();
var wakedate=      $("#wakedate").val();
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"rowid="+wakerowid+"&uadmincommison="+admincommison+"&uwakeamount="+wakeamount+"&uwakedate="+wakedate+"&uwakerowid="+wakerowid+"&ulotterID="+lotterID, 
success: function(result)
{
var admincommison= $("#admincommison").val("");
var wakeamount=    $("#wakeamount").val("");    
LoadWake();
$("#wakeform").fadeToggle(500);
}
});
});
$("#updatewalkmember").click(function()
{
var walkmemberentryid= $("#walkmemberentryid").val();
var WalkMembers=    $("#WalkMembers").val();
var Percentage=      $("#percentage").val();
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"uentryid="+walkmemberentryid+"&uwalkmemberid="+WalkMembers+"&uwalkmemberperce="+Percentage, 
success: function(result)
{
var Percentage=      $("#percentage").val("");
LoadWake();
$("#addwalkmembermodal").modal('hide');
}
});
});
//Cancel Section
$("#cancelbtnwalkform").click(function(){
$("#wakeform").hide();
});
//Delete Entry Section
$("#deleteentry").click(function(){
$.ajax
({
type:"post",
url:"Database/LotteryWakeController.php",
data:"deleteentryid="+$("#deleteentryid").val(),
success:function(data)
{
LoadWake();
$("#Deltemodal").modal('hide');
}
});
});
$("#deletewalkmemberentry").click(function(){
$.ajax
({
type:"post",
url:"Database/LotteryWakeController.php",
data:"deletewalkmemberentryid="+$("#deletewalkid").val(),
success:function(data)
{
LoadWake();
$("#DeleteWalkMember").modal('hide');
}
});
});
});
function LoadMembers()
{
$.ajax
({
type: "POST",
url: "Database/MemberController.php",
data:"getlotterymemberoption="+$("#lotteryid").val(), 
success: function(result)
{
$("#membernames").html(result);
}
});    
}
function LoadForWalkMembers()
{
$.ajax
({
type: "POST",
url: "Database/MemberController.php",
data:"getlotterywalk="+$("#lotteryid").val(), 
success: function(result)
{
$("#WalkMembers").html(result);
}
});    
}
function LoadWake()
{
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"getlotterywake="+$("#lotteryid").val(), 
success: function(result)
{
$("#waketablebody").remove();
$("#waketable").append(result);
}
});    
}
$(document).on("click", ".deletewake", function() 
{
var memberid = $(this).attr('id'); 
$("#deleteentryid").val(memberid);
$("#Deltemodal").modal('show');
});
$(document).on("click", ".deletewakemember", function() 
{
var memberid = $(this).attr('id'); 
$("#deletewalkid").val(memberid);
$("#DeleteWalkMember").modal('show');
});
$(document).on("click", ".editwake", function() 
{
var rowid = $(this).attr('id'); 
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"wakeinfo="+rowid, 
dataType: 'JSON',
success: function(result)
{
$("#wakerowid").val(rowid);
var admincommison= $("#admincommison").val(result.admincommsion);
var wakeamount=    $("#wakeamount").val(result.wakeamount);
var wakedate=      $("#wakedate").val(result.wakedate);
$("#wakeupdate").show();
$("#savewake").hide();
$("#wakeform").fadeToggle(500);
}
});
});
$(document).on("click", ".editwakememeber", function() 
{
var rowid = $(this).attr('id'); 
$.ajax
({
type: "POST",
url: "Database/LotteryWakeController.php",
data:"wakememberinfo="+rowid, 
dataType: 'JSON',
success: function(result)
{
$("#WalkMembers").val(result.memberid);
$("#percentage").val(result.perce);
$("#walkmemberentryid").val(result.id);
$("#savewalkmember").hide();
$("#addwalkmembermodal").modal('show');
}
});
});
$(document).on("click", ".openmembermodal", function() 
{
var walkID = $(this).attr('id');
$("#lotterywalkid").val(walkID);
$("#savewalkmember").show();
$("#updatewalkmember").hide();
$("#addwalkmembermodal").modal('show');
});