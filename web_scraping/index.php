<?php
include('simple_html_dom.php');
$html = file_get_html('https://m.netdania.com/commodities/xauusdoz/idc');
$goldPrice = $html->find('span[id=recid-1-f6]');

echo "Gold Price : ".$goldPrice[0];
echo "<br><br>";

$html = file_get_html('https://m.netdania.com/commodities/xagusd/netdania-rt');
$silverPrice = $html->find('span[id=recid-1-f6]');
echo "Silver Price : ".$silverPrice[0];
