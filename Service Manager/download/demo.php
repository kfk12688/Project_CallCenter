<?php
 
include("../library.php");

$query1 = mysql_query("SELECT * FROM newrequest where download='YES'")or die(mysql_error());
while($query2 = mysql_fetch_object($query1))
{
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
	mysql_query("INSERT INTO downloadrequest(requestid, customername, customerid, contactnumber, address, productid, productname, producttype, modelnumber, serialnumber, description, servicetype, summary, dated, timed, warrentytype)
		Values('$requestid', '$customername', '$customerid', '$contactnumber', '$address', '$productid', '$productname', '$producttype', '$modelnumber', '$serialnumber', '$description', '$servicetype', '$summary', '$dated', '$timed', '$warrentytype')")or die(mysql_error());
} 



require 'exportcsv.inc.php';
 
$table="downloadrequest"; // this is the tablename that you want to export to csv from mysql.
 
exportMysqlToCsv($table);
 
?>
