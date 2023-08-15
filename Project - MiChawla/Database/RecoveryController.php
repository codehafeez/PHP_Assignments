<?php
include_once './RecoveryDatabase.php';
$RecoveryDatabase = new  RecoveryDatabase();
if(isset($_POST['selectiondate']))
{
echo date('d-M-Y',strtotime($_POST['selectiondate']));    
}
else if(isset($_POST['monthlydate']))
{
echo date('M-Y',strtotime($_POST['monthlydate']));    
}
else if(isset($_POST['deleteentryid']))
{
echo $RecoveryDatabase->DeleteEntry($_POST['deleteentryid']);    
}
else if(isset($_POST['LoadLoteryList']))
{
echo $RecoveryDatabase->SelectMember($_POST['LoadLoteryList']);    
}
else if(isset($_POST['Recvoerydate']))
{
echo $RecoveryDatabase->GetDateRecovery($_POST['Recvoerydate']);    
}
else if(isset($_POST['Checklotteryname'])&&isset($_POST['Checklotterydate']))
{
echo $RecoveryDatabase->GetLotteryDateWiseRecovery($_POST['Checklotterydate'],$_POST['Checklotteryname']);    
}
else if(isset($_POST['Checklotteryname2'])&&isset($_POST['Checklotterydate2']))
{
echo $RecoveryDatabase->GetLotteryDateWiseRecovery2($_POST['Checklotterydate2'],$_POST['Checklotteryname2']);    
}
else if(isset($_POST['cashdate'])&&isset($_POST['cashamount'])&&isset($_POST['cashclientname'])&&isset($_POST['cashrecoverylotteryid'])&&isset($_POST['employeeid']))
{
echo $RecoveryDatabase->InsertRecovery($_POST['cashrecoverylotteryid'], $_POST['cashclientname'], $_POST['cashamount'], $_POST['employeeid'], "Cash", 0, 0, $_POST['cashdate']);  
}
else if(isset($_POST['androidcashdate'])&&isset($_POST['androidcashamount'])&&isset($_POST['androidcashclientname'])&&isset($_POST['androidcashrecoverylotteryid'])&&isset($_POST['androidemployeeid']))
{
echo $RecoveryDatabase->InsertRecoveryByAndroid($_POST['androidcashrecoverylotteryid'], $_POST['androidcashclientname'], $_POST['androidcashamount'], $_POST['androidemployeeid'], "Cash", 0, 0, $_POST['androidcashdate']);  
}
else if(isset($_POST['bankdate'])&&isset($_POST['bankamount'])&&isset($_POST['bankclientname'])&&isset($_POST['bankrecoverylotteryid'])&&isset($_POST['bankemployeeid'])&&isset($_POST['bankname'])&&isset($_POST['bankchecknumber']))
{
echo $RecoveryDatabase->InsertRecovery($_POST['bankrecoverylotteryid'], $_POST['bankclientname'], $_POST['bankamount'], $_POST['bankemployeeid'], "Bank",$_POST['bankname'],$_POST['bankchecknumber'],$_POST['bankdate']);  
}
else if(isset($_POST['androidbankdate'])&&isset($_POST['androidbankamount'])&&isset($_POST['androidbankclientname'])&&isset($_POST['androidbankrecoverylotteryid'])&&isset($_POST['androidbankemployeeid'])&&isset($_POST['androidbankname'])&&isset($_POST['androidbankchecknumber']))
{
echo $RecoveryDatabase->InsertRecoveryByAndroid($_POST['androidbankrecoverylotteryid'],$_POST['androidbankclientname'],$_POST['androidbankamount'],$_POST['androidbankemployeeid'], 'Bank', $_POST['androidbankname'], $_POST['androidbankchecknumber'], $_POST['androidbankdate']); 
}
else if(isset($_POST['employeeRecvoerydate'])&&isset($_POST['employeerecoveryid']))
{
echo $RecoveryDatabase->GetDateEmployeeRecovery2($_POST['employeeRecvoerydate'],$_POST['employeerecoveryid']);
}
else if(isset($_POST['employeeidlotteryname'])&&isset($_POST['employeeidlotterydate'])&&isset($_POST['employeelotteryid']))
{
echo $RecoveryDatabase-> GetEmployeeLotteryDateWiseRecovery($_POST['employeeidlotterydate'],$_POST['employeeidlotteryname'],$_POST['employeelotteryid']);
}
else if(isset($_POST['mlotteryid'])&&isset($_POST['lotterymemberid'])&&isset($_POST['lotterymemberdate']))
{
echo $RecoveryDatabase->LoadMemberRecovery($_POST['mlotteryid'], $_POST['lotterymemberid'], $_POST['lotterymemberdate']);
}
else if(isset($_POST['LoadAllMemberLottery']))
{
echo $RecoveryDatabase->LoadAllLotteryMemberProfitAndRecovery($_POST['LoadAllMemberLottery']);    
}
else
{
echo 'Data';    
}
