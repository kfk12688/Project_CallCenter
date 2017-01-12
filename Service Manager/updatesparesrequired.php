<?php
include"library.php";
$requestid=$_POST['requestid'];
$engineerid=$_POST['engineerid'];
$unitcost1=$_POST['unitcost1'];
$unitcost2=$_POST['unitcost2'];
$unitcost3=$_POST['unitcost3'];
$unitcost4=$_POST['unitcost4'];
$unitcost5=$_POST['unitcost5'];
$unitcost6=$_POST['unitcost6'];
$price1=$_POST['price1'];
$price2=$_POST['price2'];
$price3=$_POST['price3'];
$price4=$_POST['price4'];
$price5=$_POST['price5'];
$price6=$_POST['price6'];
$id=$_POST['id'];
$user=$_POST['user'];
date_default_timezone_set("Asia/Kolkata");
$dated=date("Y/m/d");
$timed=date("h:i:sa");
mysql_query("UPDATE temp SET alert='NO', dated='$dated', timed='$timed' where requestid='$requestid'")or die(mysql_error());
mysql_query("UPDATE spares SET unitcost1='$unitcost1', unitcost2='$unitcost2', unitcost3='$unitcost3', unitcost4='$unitcost4', unitcost5='$unitcost5', unitcost6='$unitcost6',
price1='$price1',price2='$price2',price3='$price3',price4='$price4',price5='$price5',price6='$price6', invoice='NO', dated='$dated', timed='$timed' where id='$id'")or die(mysql_error());
echo"<b>Quotations Are Stord</b>";
?>