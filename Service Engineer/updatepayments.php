<?php
include("library.php");
$requestid=$_POST['requestid'];
$customerid=$_POST['customerid'];
$customername=$_POST['customername'];
$contactnumber=$_POST['contactnumber'];
$address=$_POST['address'];
date_default_timezone_set("Asia/Kolkata");
$dated=date("Y/m/d");
$timed=date("h:i:sa");
$paymentmethod=$_POST['paymentmethod'];
$amountreceived=$_POST['amountreceived'];
$paymentoption=$_POST['paymentoption'];
$chequeno=$_POST['chequeno'];
$ddno=$_POST['ddno'];
$tdate=$_POST['tdate'];
$amount=$_POST['amount'];
$bankname=$_POST['bankname'];
$favouring=$_POST['favouring'];
$particulars=$_POST['particulars'];
$referenceno=$_POST['referenceno'];
$totalamount=$_POST['totalamount'];
$amountbalance=$_POST['amountbalance'];
if($totalamount==$amountbalance)
{
	$balance=0;
}
else
{
	$balance=$amountbalance;
}
mysql_query("INSERT INTO payments(engineerid, requestid, customerid, customername, contactnumber, address, chequeno, amount, ddno, bankname, tdate, favouring, referenceno, totalamount, amountreceived, amountbalance, dated, timed)
VALUES('$user', '$requestid', '$customerid', '$customername', '$contactnumber', '$address', '$chequeno', '$amount', '$ddno', '$bankname', '$tdate', '$favouring', '$referenceno', '$totalamount', '$amountreceived', '$amountbalance', '$dated', '$timed')")or die(mysql_error());
mysql_query("UPDATE reports SET amountbalance='$balance', amountreceived='$amountreceived' where requestid='$requestid'")or die(mysql_error());
header("location:paymentstatus.php");
?>