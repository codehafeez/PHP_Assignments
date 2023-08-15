<?php
include_once './MemberDatabase.php';
$MemberDatabase = new MemberDatabase();
if(isset($_POST['clientname'])&&isset($_POST['lotteryname']))
{
echo $MemberDatabase->AddMember($_POST['clientname'],$_POST['lotteryname']);
}
else if(isset($_POST['lotterymember'])){
echo $MemberDatabase->GetLotteryMember($_POST['lotterymember']);
}
else if(isset($_POST['getlotterymember']))
{
echo $MemberDatabase->GetLotteryMemberForRecovery($_POST['getlotterymember']);
}
else if(isset($_POST['getlotterymemberoption']))
{
echo $MemberDatabase->GetLotteryMemberOption($_POST['getlotterymemberoption']);
}
else if(isset($_POST['getlotterywalk']))
{
echo $MemberDatabase->GetLotteryMemberOption($_POST['getlotterywalk']);
}
else if (isset ($_POST['androidlotterymemberlist'])) 
{
echo $MemberDatabase->AndroidGetCustomerByLottery($_POST['androidlotterymemberlist']);
}