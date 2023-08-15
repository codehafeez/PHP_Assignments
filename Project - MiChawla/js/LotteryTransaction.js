$(document).ready(function()
{
$("#lotteryid").val(localStorage.getItem("lotteryID")); 
$("#lotteryname").text("Lottery "+localStorage.getItem("Name"));
LoadWakeTranscation();
});
function LoadWakeTranscation()
{
$.ajax
({
type:"post",
url:"Database/LotteryWakeController.php",
data:"WalkTrancation="+$("#lotteryid").val(),
success:function(data)
{
$("#Transactiontablebody").html(data);
}
});
}


