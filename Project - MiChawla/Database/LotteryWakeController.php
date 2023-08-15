<?php
include_once './LotteryWakeDatabase.php';
$LotteryDatabase = new LotteryWakeDatabase();
if (isset ($_POST['lotterID'])&&isset ($_POST['admincommison'])&&isset($_POST['wakeamount'])&&isset($_POST['wakeamount'])&&isset($_POST['wakedate'])) 
{
$date=date_create($_POST['wakedate']);
echo $LotteryDatabase->InsertWakeFunction($_POST['lotterID'], $_POST['wakeamount'], $_POST['admincommison'], date_format($date,"d-M-Y"));
}     
else if (isset ($_POST['rowid'])&&isset ($_POST['uadmincommison'])&&isset($_POST['uwakeamount'])&&isset($_POST['uwakeamount'])&&isset($_POST['uwakedate'])&&isset($_POST['ulotterID'])) 
{
$date2=date_create($_POST['uwakedate']);
echo $LotteryDatabase->UpdateLotteryWake($_POST['uwakeamount'], $_POST['uadmincommison'], date_format($date2,"d-M-Y"), $_POST['rowid'],$_POST['ulotterID']);
}
else if(isset ($_POST['memberwalkid'])&&isset ($_POST['walkmemberid'])&&isset ($_POST['walkmemberperce']))
{
echo $LotteryDatabase->InsertWalkeMember($_POST['memberwalkid'], $_POST['walkmemberid'], $_POST['walkmemberperce']);  
}
else if(isset ($_POST['uentryid'])&&isset ($_POST['uwalkmemberid'])&&isset ($_POST['uwalkmemberperce']))
{
echo $LotteryDatabase->updateWakeMember($_POST['uwalkmemberid'], $_POST['uwalkmemberperce'], $_POST['uentryid']);  
}
elseif (isset($_POST['getlotterywake'])) 
{
echo $LotteryDatabase->GetWakeByLottery($_POST['getlotterywake']);
}
elseif (isset($_POST['deleteentryid'])) 
{
echo $LotteryDatabase->DeleteEntry($_POST['deleteentryid']);
}
elseif (isset($_POST['wakeinfo'])) 
{
echo $LotteryDatabase->GetWakeInfo($_POST['wakeinfo']);
}
elseif (isset($_POST['WalkTrancation'])) 
{
echo $LotteryDatabase->GetWakeTranscation($_POST['WalkTrancation']);
}
elseif (isset($_POST['deletewalkmemberentryid'])) 
{
echo $LotteryDatabase->DeleteWalkMemberEntry($_POST['deletewalkmemberentryid']);
}
elseif (isset($_POST['wakememberinfo'])) 
{
echo $LotteryDatabase->GetWakeMemberInfo($_POST['wakememberinfo']);
}
