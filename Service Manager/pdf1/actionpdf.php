<?php
require('WriteHTML.php');
include("../library.php");
$s=1;
$query1 = mysql_query("SELECT * FROM newrequest")or die(mysql_error());

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage(L);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('INVOICE<br>');

$pdf->SetFont('Arial','B',12); 	
$html='<table>';
$pdf->WriteHTML2("$html");	

while($query2 = mysql_fetch_object($query1))
{	$ss = $s++;
	$ss;
	$dated = $query2->dated;
	$timed = $query2->timed;
	$requestid = $query2->requestid;
	$customername = $query2->customername;
	$customerid = $query2->customerid;
	$contactnumber = $query2->contactnumber;
	$address = $query2->address;
	$productid = $query2->productid;
	$productname = $query2->productname;
	$producttype = $query2->producttype;
	$modelnumber = $query2->modelnumber;
	$serialnumber = $query2->serialnumber;
	$summary = $query2->summary;
	$description = $query2->description;
	$servicetype = $query2->servicetype;
	$warrentytype = $query2->warrentytype;
	$html2='<tr><td>'.$dated.'</td><td>'.$timed.'</td><td>'.$requestid.'</td><td>'.$customername.'</td><td>'.$customerid.'</td></tr>';
	$pdf->WriteHTML2("$html2");
}
$pdf->SetFont('Arial','B',12);
$html1='</table>';
$pdf->WriteHTML2("$html1");

$pdf->Output(); 
?>