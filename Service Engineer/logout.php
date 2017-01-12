<?php
include 'library.php';
mysql_query("update login set status='Offline' where username='$user'")or die(mysql_error());
session_destroy();
unset($_SESSION['username']);
echo '<script type="text/javascript">window.location = "../index.html"; </script>';
?>