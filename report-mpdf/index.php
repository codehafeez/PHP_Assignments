<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);




$dataResult = '';
// $dataResult .= '<img style="margin-left:120px; width:400px; height:68px;" src="logo.png"/>';
$dataResult .= '
<style>
table, td, th {  
  	border: 1px solid #ddd;
  	text-align: left;
}

table {
  	border-collapse: collapse;
  	width: 100%;
}

th, td {
  	padding: 15px;
	text-align:center;
}
.heading{
	background:#000;
	color:#fff;
}
</style>
<table style="margin-top:20px;">
  <tr>
    <th class="heading">Serial No</th>
    <th class="heading">Date & Time</th>
    <th class="heading">Zone</th>
    <th class="heading">Tag ID</th>
    <th class="heading">Temperature</th>
  </tr>
  <tr>
    <td>1</td>
    <td>2021-06-01 15:19:01</td>
    <td>zone4</td>
    <td>ac:23:3f:45:54:4d</td>
    <td>24</td>
  </tr>
  <tr>
    <td>1</td>
    <td>2021-06-01 15:19:01</td>
    <td>zone4</td>
    <td>ac:23:3f:45:54:4d</td>
    <td>24</td>
  </tr>
  <tr>
    <td>1</td>
    <td>2021-06-01 15:19:01</td>
    <td>zone4</td>
    <td>ac:23:3f:45:54:4d</td>
    <td>24</td>
  </tr>
  <tr>
    <td>1</td>
    <td>2021-06-01 15:19:01</td>
    <td>zone4</td>
    <td>ac:23:3f:45:54:4d</td>
    <td>24</td>
  </tr>
</table>';

$mpdf->WriteHTML($dataResult);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();
// $mpdf->Output('PWAS-Report.pdf', \Mpdf\Output\Destination::FILE);
