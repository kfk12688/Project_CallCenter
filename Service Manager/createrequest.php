<?php
error_reporting(0);
include("library.php");
$customerid = $_POST['customerid'];
$customername = $_POST['customername'];
$contactnumber = $_POST['contactnumber'];
$address = $_POST['address'];
$productid = $_POST['productid'];
$productname = $_POST['productname'];
$producttype = $_POST['producttype'];
$modelnumber = $_POST['modelnumber'];
$serialnumber = $_POST['serialnumber'];
$warrentytype = $_POST['warrentytype'];
date_default_timezone_set("Asia/Kolkata");
$dated = date("Y/m/d");
$timed = date("h:i:sa");
$summary = $_POST['summary'];
$servicetype = $_POST['servicetype'];
$status = 'notassigned';
$description=$_POST['description'];
$query1 = mysql_query("SELECT * From newrequest")or die(mysql_error());
while($query2 = mysql_fetch_array($query1))
{
	$oldid = $query2['requestid'];
}
if($oldid != '')
{
	$oldids=$oldid;
}
else
{
	$oldids='C000';
}
$lastId = $oldids;
$letter = $lastId[0];
$number = $lastId[1].$lastId[2].$lastId[3];

if ($number < 999) {
    $newId = $letter.sprintf("%03d", $number+1);
} else {
    $ascii = ord($letter);
    $newLetter = chr($ascii+1);
    $newId = $newLetter.'001';
}

mysql_query("INSERT INTO newrequest(loginusername, customerid, customername, contactnumber, address, productid, productname, producttype, modelnumber, serialnumber, warrentytype, requestid, dated, timed, summary, servicetype, status, description)
	VALUES('$user', '$customerid', '$customername', '$contactnumber', '$address', '$productid', '$productname', '$producttype', '$modelnumber', '$serialnumber', '$warrentytype', '$newId', '$dated', '$timed', '$summary', '$servicetype', '$status', '$description')")or die(mysql_error()); 
echo '<script type="text/javascript">alert("New Request Has Been Saved Successfully");</script>';	
echo '<script type="text/javascript">window.location = "createnewrequest.php"; </script>';	
?>