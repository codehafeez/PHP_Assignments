$(document).ready(function()
{
LoadLoteryOption();
$("#membersform").hide();
//Change Section
$("#lotteryname").change(function(){
$("#Memberstable").show();
$.ajax({
type:"post",
url:"Database/MemberController.php",
data:"lotterymember="+$("#lotteryname").val(),
success:function(data)
{
$("#Memberstablebody").remove();
$("#Memberstable").append(data);
}
});
});
//Save Member Section
$("#savemember").click(function()
{
var clientname=$("#clientname").val();
var lotteryname2= $("#lotteryname2").val();
var array=clientname.split('-');
$.ajax
({
type:"post",
url:"Database/MemberController.php",
data:"clientname="+array[0]+"&lotteryname="+lotteryname2,
success:function(data)
{
ClearMemberForm();   
$("#membersform").fadeToggle("500");
}
});
});
$("#clientname").keyup(function(){
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
$("#membersbtn").click(function(){
$("#saveupdate").hide();
$("#saveclient").show();
ClearMemberForm();
$("#membersform").fadeToggle("500");
});
});
$(document).on("click", ".getname", function() 
{
var rowid = $(this).attr('id'); 
$("#clientname").val(rowid);
});
function LoadLoteryOption()
{
$.ajax({
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
function ClearMemberForm(){
var clientname=$("#clientname").val("");
var lotteryname2= $("#lotteryname2").val("");
}