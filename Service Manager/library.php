<?php
error_reporting(0);
session_start();
if($user = $_SESSION['username'])
{
$con = mysql_select_db("callcenter1", mysql_connect("localhost", "root", "root"));
$qq=mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
while($ww=mysql_fetch_object($qq))
{
	$username=$ww->username;
	$logindate=$ww->dated;
	$logintime=$ww->timed;	
}
}
else if(!isset($_SESSION['username']) || $_SESSION['username'] == '')
{
mysql_close($con);
echo '<script type="text/javascript">window.location = "../index.html"; </script>';
}
else
{
mysql_close($con);
echo '<script type="text/javascript">window.location = "../index.html"; </script>';	
}

$s=1;
$aa=mysql_query("SELECT * From notifications where receiver='$user' AND status='notopened'")or die(mysql_error());
while($ss=mysql_fetch_object($aa))
{
	$count=$s++;
}
if($count == 0)
{
	$count=0;
}	
?>