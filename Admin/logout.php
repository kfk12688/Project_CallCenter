<?php
include 'library.php';
date_default_timezone_set("Asia/Kolkata");
$dated = date("Y/m/d");
$timed = date("h:i:sa");
mysql_query("update login set status='Offline', dated='$dated', timed='$timed' where username='$user'")or die(mysql_error());
session_destroy();
unset($_SESSION['username']);
echo '<script type="text/javascript">window.location = "../index.html"; </script>';
?>