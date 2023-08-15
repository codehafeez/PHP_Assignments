   <?php
$res = array(); 
$sql = 'SELECT * FROM lottery WHERE lottery.status="Open"';
$result=  $this->conn->query($sql);
while($row = mysqli_fetch_array($result))
{
array_push($res, array("id"=>$row['id'],"loteryName"=>$row['loteryName']));
}
echo json_encode($res);