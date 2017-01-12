<?php
 // CALL TO THE FUNCTION
require("export.php");
 $backup_response = backup_Database('localhost','root','root','callcenter1')or die(mysql_error());
  if($backup_response) {
	echo 'Database Backup Successfully Created!';
	header("location:../backuprestore.php");  
  }
  else {
	echo 'Errors in Database Backup Creating!';    
  }
 
?>