<?php
include("library.php");
$requestid = $_POST['requestid'];
$sparepart1 = $_POST['sparepart1'];
$quantity1 = $_POST['quantity1'];
$sparepart2 = $_POST['sparepart2'];
$quantity2 = $_POST['quantity2'];
$sparepart3 = $_POST['sparepart3'];
$quantity3 = $_POST['quantity3'];
$sparepart4 = $_POST['sparepart4'];
$quantity4 = $_POST['quantity4'];
$sparepart5 = $_POST['sparepart5'];
$quantity5 = $_POST['quantity5'];
date_default_timezone_set("Asia/Kolkata");
$dated = date("Y/m/d");
$timed = date("h:i:sa");
mysql_query("INSERT INTO spares(requestid, engineerid, sparepart1, quantity1, sparepart2, quantity2, sparepart3, quantity3, sparepart4, quantity4, sparepart5, quantity5)
Values('$requestid', '$user', '$sparepart1', '$quantity1', '$sparepart2', '$quantity2', '$sparepart3', '$quantity3', '$sparepart4', '$quantity4', '$sparepart5', '$quantity5')")or die(mysql_error());

header("location:serviceengineer.php");
?>