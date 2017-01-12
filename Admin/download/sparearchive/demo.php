<?php
 
include("../../library.php");

$query1 = mysql_query("SELECT * FROM sparemaster where download='YES'")or die(mysql_error());
while($query2 = mysql_fetch_object($query1))
{
	$spareid = $query2->spareid;
	$sparename = $query2->sparename;
	$sparetype = $query2->sparetype;
	mysql_query("INSERT INTO sparearchive(spareid, sparename, sparetype)
		Values('$spareid', '$sparename', '$sparetype')")or die(mysql_error());
} 



require 'exportcsv.inc.php';
 
$table="sparearchive"; // this is the tablename that you want to export to csv from mysql.
 
exportMysqlToCsv($table);
 
?>
