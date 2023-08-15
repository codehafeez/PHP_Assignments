<?php
include_once './OutFlowDatabase.php';
$OutFlowDatabase= new OutFlowDatabase();
if(isset($_POST['getlotterymember']))
{
echo $OutFlowDatabase->GetLotteryWakeNumber($_POST['getlotterymember']);    
}
else if(isset($_POST['getlotterymembers']))
{
echo $OutFlowDatabase->SelectMember($_POST['getlotterymembers']);    
}
else if(isset($_POST['Checklotteryname'])&&isset($_POST['Checklotterydate']))
{
echo $OutFlowDatabase->GetOutFlow2($_POST['Checklotterydate'], $_POST['Checklotteryname']);   
}
else if(isset($_POST['getoutflow']))
{
echo $OutFlowDatabase->GetOutFlow($_POST['getoutflow']);    
}
else if(isset($_POST['deleteid']))
{
echo $OutFlowDatabase->DeleteEntry($_POST['deleteid']);    
}
else if(isset($_POST['cashrecoverylotteryid'])&&isset($_POST['cashwalkid'])&&isset($_POST['cashclientname'])&&isset($_POST['cashamount'])&&isset($_POST['cashdate']))
{
$date=date_create($_POST['cashdate']);
echo $OutFlowDatabase->InsertOutFlow($_POST['cashrecoverylotteryid'], $_POST['cashwalkid'], $_POST['cashclientname'], $_POST['cashamount'],date_format($date,"d-M-Y"), 'Cash', "  ", " ");    
}
else if(isset($_POST['bankrecoverylotteryid'])&&isset($_POST['bankwalkid'])&&isset($_POST['bankclientname'])&&isset($_POST['bankamount'])&&isset($_POST['bankdate'])&&isset($_POST['bankname'])&&isset($_POST['bankchecknumber']))
{
$date=date_create($_POST['bankdate']);
echo $OutFlowDatabase->InsertOutFlow($_POST['bankrecoverylotteryid'], $_POST['bankwalkid'], $_POST['bankclientname'], $_POST['bankamount'],date_format($date,"d-M-Y"), 'Bank',$_POST['bankname'], $_POST['bankchecknumber']);    
}