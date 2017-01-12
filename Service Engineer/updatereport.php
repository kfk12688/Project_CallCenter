<?php
include("library.php");
$requestid=$_POST['requestid'];
$customerid=$_POST['customerid'];
$customername=$_POST['customername'];
$contactnumber=$_POST['contactnumber'];
$address=$_POST['address'];
$summary=$_POST['summary'];
$description=$_POST['description'];
date_default_timezone_set("Asia/Kolkata");
$dated=date("Y/m/d");
$timed=date("h:i:sa");
$spare=$_POST['spare'];
$mechanicalissues=$_POST['mechanicalissues'];
$electricalissues=$_POST['electricalissues'];
$otherissues=$_POST['otherissues'];
$paymentstatus=$_POST['paymentstatus'];
$paymentmethod=$_POST['paymentmethod'];
$amountreceived=$_POST['amountreceived'];
$paymentoption=$_POST['paymentoption'];
$calibrationcertificate=$_POST['calibrationcertificate'];
$engineercomments=$_POST['engineercomments'];
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
mysql_query("INSERT INTO payments(engineerid, requestid, customerid, customername, contactnumber, address, paymentmethod, chequeno, amount, ddno, bankname, tdate, favouring, referenceno, totalamount, amountreceived, amountbalance, dated, timed)
VALUES('$user', '$requestid', '$customerid', '$customername', '$contactnumber', '$address', '$paymentmethod', '$chequeno', '$amount', '$ddno', '$bankname', '$tdate', '$favouring', '$referenceno', '$totalamount', '$amountreceived', '$amountbalance', '$dated', '$timed')")or die(mysql_error());
mysql_query("INSERT INTO reports(customerid, customername, contactnumber, address, summary, description, engineerid, requestid, dated, timed, spare, mechanicalissues, electricalissues, otherissues, paymentstatus, paymentmethod, amountreceived, paymentoption, calibrationcertificate, engineercomments, totalamount, amountbalance)
Values('$customerid', '$customername', '$contactnumber', '$address', '$summary', '$description', '$user', '$requestid', '$dated', '$timed', '$spare', '$mechanicalissues', '$electricalissues', '$otherissues', '$paymentstatus', '$paymentmethod', '$amountreceived', '$paymentoption', '$calibrationcertificate', '$engineercomments', '$totalamount', '$amountbalance')")or die(mysql_error());
mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', 'manager', 'New Report Genereted', 'completedreports', '$dated', '$timed', 'notopened')")or die(mysql_error());
header("location:serviceengineer.php");
?>