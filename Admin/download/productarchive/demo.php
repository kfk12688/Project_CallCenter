<?php
 
include("../../library.php");

$query1 = mysql_query("SELECT * FROM productmaster where download='YES'")or die(mysql_error());
while($query2 = mysql_fetch_object($query1))
{
	$productid = $query2->productid;
	$productname = $query2->productname;
	$producttype = $query2->producttype;
	$category = $query2->category;
	$series = $query2->series;
	mysql_query("INSERT INTO productarchive(productid, productname, producttype, brandname, modelnumber)
		Values('$productid', '$productname', '$producttype', '$category', '$series')")or die(mysql_error());
} 



require 'exportcsv.inc.php';
 
$table="productarchive"; // this is the tablename that you want to export to csv from mysql.
 
exportMysqlToCsv($table);
 
?>
