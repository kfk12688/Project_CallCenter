<?php
 
include("../library.php");
$query1=mysql_query("SELECT * FROM engineermaster")or die(mysql_error());
while($query2=mysql_fetch_object($query1))
{
	$engineerid=$query2->engineerid;
	$engineername=$query2->engineername;
	$contactnumber=$query2->contactnumber;
	$position=$query2->position;
	$emailid=$query2->emailid;
	mysql_query("INSERT INTO engineerarchive(engineername, engineerid, contactnumber, position, emailid)values('$engineername', '$engineerid', '$contactnumber', '$position', '$emailid')")or die(mysql_error());
}
 
require 'exportcsv.inc.php';
 
$table="engineerarchive"; // this is the tablename that you want to export to csv from mysql.
 
exportMysqlToCsv($table);
 
?>
