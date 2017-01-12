<?php
include("library.php");
	$aa=mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($bb=mysql_fetch_object($aa))
	{
		$assiggen=$bb->assign;
	}
	$engineerid=$_POST['engineerid'];
	date_default_timezone_set("Asia/Kolkata");
	$dated = date("Y/m/d");
	$timed = date("h:i:sa");
	$query1=mysql_query("SELECT * From engineermaster where engineerid='$engineerid'")or die(mysql_error());
	while($query2=mysql_fetch_object($query1))
	{
		$rangefrom=$query2->rangefrom;
		$updaterange=$rangefrom+1;
		mysql_query("UPDATE engineermaster SET rangefrom='$updaterange' where engineerid='$engineerid'")or die(mysql_error());
	}
	mysql_query("INSERT into temp (engineersid, requestid, dated, timed, requestalert)VALUES('$engineerid', '$assiggen', '$dated', '$timed', 'YES')")or die(mysql_error());
	mysql_query("UPDATE newrequest set status='Assigned' where requestid='$assiggen'")or die(mysql_error());
	mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', '$engineerid', 'New Task Assigned', 'newtask', '$dated', '$timed', 'notopened')")or die(mysql_error());
header("location:viewrequest.php");

?>