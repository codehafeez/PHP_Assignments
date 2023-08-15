$(document).ready(function()
{
$("#Clientform").hide();
$("#saveupdate").hide();
$("#lotteryid").val(localStorage.getItem("lotteryID")); 
$("#lotteryname").text("Lottery "+localStorage.getItem("Name"));
LoadClients();
//Submit Button Section
$("#clientbutton").click(function(){
$("#saveupdate").hide();
$("#saveclient").show();
ClearClientForm();
$("#Clientform").fadeToggle(500);
});
// Insert Database Section
$("#saveclient").click(function()
{

var mobilenumber= $("#mobilenumber").val();
var clientfather= $("#clientfather").val();
var clientname=   $("#clientname").val();
var lotteryID=    $("#lotteryid").val();
var nametype=     $("#nametype").val();
if(mobilenumber>0&&mobilenumber!=""&&clientfather!=""&&lotteryID!=""&&nametype!="")
{
$("#Messagebox").modal('show');
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"mobilenumber="+mobilenumber+"&clientfather="+clientfather+"&clientname="+clientname+"&lotteryid="+lotteryID+"&nametype="+nametype, 
cache: false,
success: function(result)
{
$("#Clientform").fadeToggle(500);
LoadClients();
}
});
}
else
{
alert("Fill The Complete The Form");    
}
});
$("#deleteclient").click(function()
{
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"deleteclienteditid="+$("#deleteclientid").val(), 
cache: false,
success: function(result)
{
$("#Deltemodal").modal('hide');
LoadClients();
}
});
});
// Update Database Section
$("#saveupdate").click(function()
{
var mobilenumber =  $("#mobilenumber").val();
var clientfather =  $("#clientfather").val();
var clientname   =  $("#clientname").val();
var clientid     =  $("#clientid").val();
var nametype     =  $("#nametype").val();
if(mobilenumber!=""&&clientfather!=""&&clientname!=""&&clientid!=""&&nametype!="")
{
$("#Messagebox").modal('show');
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"umobilenumber="+mobilenumber+"&uclientfather="+clientfather+"&uclientname="+clientname+"&unametype="+nametype+"&uclientid="+clientid, 
cache: false,
success: function(result)
{
ClearClientForm();
$("#Clientform").fadeToggle(500);
LoadClients();
}
});
}
else
{
alert("Fill The Complete The Form");    
}
});
$("#deleteentry").click(function()
{
$.ajax
({
type:"post",
url:"Database/ClientController.php",
data:"deleteclienteditid="+$("#deleteentryid").val(),
success:function(data)
{
LoadClients();
$("#Deltemodal").modal('hide');
}
});
});
});
$(document).on("click", ".editclient", function() 
{
var rowid = $(this).attr('id'); 
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"clienteditid="+rowid, 
dataType: 'JSON',
success: function(result)
{
$("#clientid").val(result.id);
$("#mobilenumber").val(result.contactnumber);
$("#clientfather").val(result.fathername);
$("#clientname").val(result.name);
$("#nametype").val(result.type);
$("#saveupdate").show();
$("#saveclient").hide();
$("#Clientform").fadeToggle(500);
}
});
});
$(document).on("click", ".deleteButton", function() 
{
var deleteid = $(this).attr('id'); 
$("#deleteentryid").val(deleteid);
$("#Deltemodal").modal('show');
});
function LoadClients()
{
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"lotteryID="+$("#lotteryid").val(), 
success: function(result)
{
$("#clientstablebody").remove();
$("#clientstable").append(result);
}
});    
}
function ClearClientForm()
{
var mobilenumber=$("#mobilenumber").val("");
var clientfather=$("#clientfather").val("");
var clientname= $("#clientname").val("");
}




