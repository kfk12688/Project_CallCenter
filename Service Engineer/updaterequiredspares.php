<?php
include("library.php");
$requestid=$_POST['requestid'];
$customerid=$_POST['customerid'];
date_default_timezone_set("Asia/Kolkata");
$timed=date("h:i:sa");
$dated=date("Y/m/d");
if (
   !empty($_POST['productitem']) && !empty($_POST['quantity']) &&
   is_array($_POST['productitem']) && is_array($_POST['quantity']) &&
   count($_POST['productitem']) === count($_POST['quantity'])
) {
    $productitem_array = $_POST['productitem'];
    $quantity_array = $_POST['quantity'];
    for ($i = 0; $i < count($productitem_array); $i++) {

        $productitem = mysql_real_escape_string($productitem_array[$i]);
        $quantity = mysql_real_escape_string($quantity_array[$i]);

        mysql_query("INSERT INTO spares(requestid, customerid, productitem, quantity, engineerid, invoice, dated, timed) VALUES ('$requestid', '$customerid', '$productitem', '$quantity', '$user', 'YES', '$dated', '$timed')")or die(mysql_error());
    } 
}
mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', 'manager', 'Spare Quotations', 'sparesrequired', '$dated', '$timed', 'notopened')")or die(mysql_error());
mysql_query("UPDATE temp SET alert='YES', invoice='YES', dated='$dated', timed='$timed' where requestid='$requestid' AND engineersid='$user'")or die(mysql_error());
header("location:sparesrequired.php");
?>


