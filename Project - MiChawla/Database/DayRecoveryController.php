<?php
include_once './DayRecoveryDatabase.php';
$DayRecovery=new DayRecoveryDatabase();
if(isset($_POST['selectiondate']))
{
echo date('d-M-Y',strtotime($_POST['selectiondate']));    
}
if(isset($_POST['selectionmonths']))
{
echo date('M-Y',strtotime($_POST['selectionmonths']));    
}
else if(isset($_POST['getdaterecovery']))
{
echo $DayRecovery->LoadDateRecoveryLoteryTable($_POST['getdaterecovery']);    
}
else if(isset($_POST['monthdate']))
{
echo $DayRecovery->GetMonthsEntryDates($_POST['monthdate']);   
}
else if(isset($_POST['Employeedaterecovery'])&&isset($_POST['dayrecoveryemployeeid']))
{
echo $DayRecovery->LoadEmployeeDateRecoveryLoteryTable($_POST['Employeedaterecovery'],$_POST['dayrecoveryemployeeid']);  
}
else if(isset($_POST['Androidrecvoeryemployeeid'])&&isset($_POST['Androidrecvoerydate']))
{
echo $DayRecovery->GeEmployeetDateRecoveryForAndroid($_POST['Androidrecvoerydate'],$_POST['Androidrecvoeryemployeeid']); 
}
