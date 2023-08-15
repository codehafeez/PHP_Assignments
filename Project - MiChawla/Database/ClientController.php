<?php
include_once './ClientsDatabase.php';
$Clients = new ClientsDatabase();
if(isset($_POST['mobilenumber'])&&isset($_POST['clientfather'])&&isset($_POST['clientname'])&&isset($_POST['lotteryid'])&&isset($_POST['nametype']))
{
echo $Clients->AddClients($_POST['clientname'], $_POST['clientfather'], $_POST['mobilenumber'],$_POST['lotteryid'],$_POST['nametype']);   
}
else if(isset($_POST['lotteryID']))
{
echo $Clients->GetCustomerByLottery($_POST['lotteryID']);
}
else if(isset($_POST['namesuggestion']))
{
echo $Clients->SearchClients($_POST['namesuggestion']);
}
else if(isset($_POST['clienteditid']))
{
echo $Clients->GetClientInfo($_POST['clienteditid']);
}
else if(isset($_POST['deleteclienteditid']))
{
echo $Clients->DeleteClient($_POST['deleteclienteditid']);
}
else if(isset($_POST['umobilenumber'])&&isset($_POST['uclientfather'])&&isset($_POST['uclientname'])&&isset($_POST['unametype'])&&isset($_POST['uclientid']))
{
echo $Clients->UpdateClientInfo($_POST['uclientname'], $_POST['uclientfather'], $_POST['umobilenumber'],$_POST['unametype'],$_POST['uclientid']);   
}


