<?php
 
include("../library.php");
$query1=mysql_query("SELECT * FROM sparemaster")or die(mysql_error());
while($query2=mysql_fetch_object($query1))
{
	$spareid=$query2->spareid;
	$sparename=$query2->sparename;	
	$sparetype=$query2->sparetype;
	mysql_query("INSERT INTO sparearchive(sparename, spareid, sparetype)values('$sparename', '$spareid', '$sparetype')")or die(mysql_error());
}
 
require 'exportcsv.inc.php';
 
$table="sparearchive"; // this is the tablename that you want to export to csv from mysql.
 
exportMysqlToCsv($table);
 
?>
