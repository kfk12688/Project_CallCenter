<?php
include("../library.php");
$query1=mysql_query("SELECT * FROM customermaster")or die(mysql_error());
while($query2=mysql_fetch_object($query1))
{
	$customerid=$query2->customerid;
	$customername=$query2->customername;
	$contactnumber=$query2->contactnumber;
	$address=$query2->address;
	$emailid=$query2->emailid;
	mysql_query("INSERT INTO customerarchive(customername, customerid, contactnumber, address, emailid)values('$customername', '$customerid', '$contactnumber', '$address', '$emailid')")or die(mysql_error());
}

 
require 'exportcsv.inc.php';
 
$table="customerarchive"; // this is the tablename that you want to export to csv from mysql.
 
exportMysqlToCsv($table);
 
?>