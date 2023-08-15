<?php
require('html_table.php');
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


$html ='<h1>Error Log Report - PWAS Device Perfect Vision Factory</h1>';
$html .='<br><br><br>';

$html .='<b>Error Serial Number : 01</b>';
$html .='<br><hr>';
$html .='<span>Test Message Hello WorldTest Message Hello World Test Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello World</span>';
$html .='<br><br><br>';


$html .='<b>Error Serial Number : 02</b>';
$html .='<br><hr>';
$html .='<span>Test Message Hello WorldTest Message Hello World Test Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello WorldTest Message Hello World</span>';


$pdf->SetLeftMargin(10);
$pdf->Image('logo.png',45,15,-400);
$pdf->WriteHTML("<br><br><br><br><br><br>$html",45,15);
$pdf->Output();

