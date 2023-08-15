$(document).ready(function()
{
$("#Clientform").hide();
$("#saveupdate").hide();
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
var mobilenumber=$("#mobilenumber").val();
var clientfather=$("#clientfather").val();
var clientname= $("#clientname").val();
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"mobilenumber="+mobilenumber+"&clientfather="+clientfather+"&clientname="+clientname, 
cache: false,
success: function(result)
{
ClearClientForm();
$("#Clientform").fadeToggle(500);
LoadClients();
}
});
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
var mobilenumber=$("#mobilenumber").val();
var clientfather=$("#clientfather").val();
var clientname= $("#clientname").val();
var clientid= $("#clientid").val();
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"umobilenumber="+mobilenumber+"&uclientfather="+clientfather+"&uclientname="+clientname+"&uclientid="+clientid, 
cache: false,
success: function(result)
{
ClearClientForm();
$("#Clientform").fadeToggle(500);
LoadClients();
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
$("#saveupdate").show();
$("#saveclient").hide();
$("#Clientform").fadeToggle(500);
}
});
});
$(document).on("click", ".deleteButton", function() 
{
var deleteid = $(this).attr('id'); 
$("#deleteclientid").val(deleteid);
$("#Deltemodal").modal('show');
});
function LoadClients()
{
$.ajax
({
type: "POST",
url: "Database/ClientController.php",
data:"clientlist="+25, 
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

