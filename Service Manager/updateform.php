<?php
include("library.php");
date_default_timezone_set("Asia/Kolkata");
$timed=date("h:i:sa");
$dated=date("Y/m/d");
$requestid=$_POST['requestid'];
$engineerid=$_POST['engineerid'];
	foreach ($_POST['id'] AS $id)
	 {		
		$unitcost = mysql_real_escape_string( $_POST["unitcost"][$id]);		
		$update = "UPDATE spares SET unitcost='$unitcost', invoice='NO', dated='$dated', timed='$timed' where id='$id' LIMIT 1;";
		mysql_query($update)or die(mysql_error());
	}
	mysql_query("UPDATE temp SET alert='NO',invoice='NO', dated='$dated', timed='$timed' where requestid='$requestid'")or die(mysql_error());
	mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', '$engineerid', 'Spare Quotations', 'sparequote', '$dated', '$timed', 'notopened')")or die(mysql_error());
	mysql_query("UPDATE login SET invoice='' where username='$user'");
	header("location:sparequotations.php");
?>