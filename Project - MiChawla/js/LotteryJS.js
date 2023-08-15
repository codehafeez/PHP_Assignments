$(document).ready(function()
{
LoadLoteryTable();        
$("#dataForm").hide();
$(".insertButton").click(function()
{
$("#formId").hide();
$("#saveUpdateButton").hide();
$("#saveDeleteButton").hide();
$("#saveButton").show();
$("#dataForm").toggle(500);
// Set Textfields Null
$("#loteryName").val("");
$("#amount").val("");
$("#startingDate").val("");
$("#endingDate").val("");
});
// Insert Data
$("#saveButton").click(function(){
var loteryName = $("#loteryName").val(); 
var amount = $("#amount").val(); 
var startingDate = $("#startingDate").val(); 
var endingDate = $("#endingDate").val(); 
var dataString = "loteryName="+loteryName+"&amount="+amount+"&startingDate="+startingDate+"&endingDate="+endingDate;           
if(loteryName !=="" || amount!=="" || startingDate !=="" || endingDate!=="" )
{
$.ajax({
type:"post",
url:"Database/lotteryController.php",
data:dataString,
success:function(data) {
$("#dataForm").fadeToggle(500);
$("#LoadLoteryTableBodyId").remove();
LoadLoteryTable();
}
});
}});
// Update Data
$(document).on("click", ".updateButton", function() 
{
var updateId = $(this).attr('id');
$.ajax({
type:"post",
url:"Database/lotteryController.php",
data:"updateId="+ updateId,
success:function(data)
{
var user = JSON.parse(data);
$("#id").val(user.id);
$("#loteryName").val(user.loteryName);
$("#amount").val(user.amount);
$("#startingDate").val(user.startingDate);
$("#endingDate").val(user.endingDate);
}});
});
// Update Data
$("#saveUpdateButton").click(function()
{
var id = $("#id").val(); 
var loteryName = $("#loteryName").val(); 
var amount = $("#amount").val(); 
var startingDate = $("#startingDate").val(); 
var endingDate = $("#endingDate").val(); 
var dataString = "idUpdate="+id+"&loteryNameUpdate="+loteryName+"&amountUpdate="+amount+"&startingDateUpdate="+startingDate+"&endingDateUpdate="+endingDate;
if(loteryName !=="" || amount!=="" || startingDate !=="" || endingDate!=="" )
{
$.ajax({
type:"post",
url:"Database/lotteryController.php",
data:dataString,
success:function(data)
{
$("#dataForm").fadeToggle(500);
$("#LoadLoteryTableBodyId").remove();
LoadLoteryTable();
}
});
}
});
});
function LoadLoteryTable()
{
$.ajax
({
type:"post",
url:"Database/lotteryController.php",
data:"LoadLoteryTable",
success:function(data)
{
$("#LoadLoteryTableBodyId").remove();
$("#LoadLoteryTableId").append(data);
}
});
}
$(document).on("click", ".updateButton", function() 
{
$("#saveButton").hide();
$("#saveDeleteButton").hide();
$("#formId").show();
$("#saveUpdateButton").show();
$("#dataForm").fadeToggle(500);
});
$(document).on("click", ".deleteButton", function() 
{
//$("#saveButton").hide();
//$("#saveUpdateButton").hide();
//$("#formId").show();
//$("#saveDeleteButton").show();
//$("#dataForm").toggle(500);
});
//Change Lottery Section
$(document).on("click", ".closebtn", function() 
{
var Lotteryid = $(this).attr('id'); 
$.ajax({
type:"post",
url:"Database/lotteryController.php",
data:"sLotteryid="+Lotteryid+"&statusmessage="+"Close",
success:function(data)
{
LoadLoteryTable();
}
});
});
$(document).on("click", ".openbtn", function() 
{
var Lotteryid = $(this).attr('id'); 
$.ajax({
type:"post",
url:"Database/lotteryController.php",
data:"sLotteryid="+Lotteryid+"&statusmessage="+"Open",
success:function(data)
{
LoadLoteryTable();
}
});
});
$(document).on("click", ".ViewLotteryReport", function() 
{
var Lotteryid = $(this).attr('id'); 
var array=Lotteryid.split('-');
localStorage.setItem("lotteryID",array[0]);
localStorage.setItem("Name",array[1]);
window.location='LotteryHome.php'; 
});
