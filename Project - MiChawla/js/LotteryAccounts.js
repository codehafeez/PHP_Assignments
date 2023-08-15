$(document).ready(function()
{
$("#lotteryid").val(localStorage.getItem("lotteryID")); 
$("#lotteryname").text("Lottery "+localStorage.getItem("Name"));   
LoadAllProfitAndRecovery();
});
function LoadAllProfitAndRecovery()
{
$.ajax
({
type:"post",
url:"Database/RecoveryController.php",
data:"LoadAllMemberLottery="+$("#lotteryid").val(),
success:function(data)
{
$("#Membertablebody").html(data);
}
});
}
