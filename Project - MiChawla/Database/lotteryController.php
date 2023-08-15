<?php
include_once './LotteryDatabase.php';
$obj_class = new LotterDatabase();
if (isset($_POST['LoadLoteryTable'])) 
{
echo $obj_class->LoadLoteryTable();
}
elseif (isset ($_POST['loteryName'])&&isset ($_POST['amount'])&&isset ($_POST['startingDate'])&&isset ($_POST['endingDate'])) 
{
echo $obj_class->insertFunction($_POST['loteryName'], $_POST['amount'], $_POST['startingDate'], $_POST['endingDate']);
}     
elseif (isset ($_POST['updateId']))
{
echo $obj_class->modifyFunction($_POST['updateId']);
}
elseif (isset ($_POST['LoadLoteryOption']))
{
echo $obj_class->LoadLoteryOption();
}
elseif (isset($_POST['sLotteryid'])&&isset($_POST['statusmessage']))
{
echo $obj_class->ChangeStatus($_POST['sLotteryid'],$_POST['statusmessage']);
}
elseif (isset ($_POST['idUpdate'])&&isset ($_POST['loteryNameUpdate'])&&isset ($_POST['amountUpdate'])&&isset ($_POST['startingDateUpdate'])&&isset ($_POST['endingDateUpdate'])) 
{
echo $obj_class->updateFunction($_POST['idUpdate'], $_POST['loteryNameUpdate'], $_POST['amountUpdate'], $_POST['startingDateUpdate'], $_POST['endingDateUpdate']);
}
elseif(isset($_POST['androidlotterylist']))
{
echo $obj_class->AndroidLoteryList();   
}

?>