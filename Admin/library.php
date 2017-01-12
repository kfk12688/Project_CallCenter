<?php
error_reporting(0);
session_start();
if($user = $_SESSION['username'])
{
	$mysqlUserName      = "root";
    $mysqlPassword      = "root";
    $mysqlHostName      = "localhost";
    $DbName             = "callcenter1";    
$con = mysql_select_db($DbName, mysql_connect($mysqlHostName, $mysqlUserName, $mysqlPassword));
$qq=mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
while($ww=mysql_fetch_object($qq))
{
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

?>