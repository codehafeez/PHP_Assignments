<?php
include_once './WalkMemberDatabase.php';
$LotteryWakeMemberDatabase=new LotteryWakeMemberDatabase();
if(isset($_POST['loadwalkmember']))
{
echo $LotteryWakeMemberDatabase->GetWalkMemberOption($_POST['loadwalkmember']);    
}

