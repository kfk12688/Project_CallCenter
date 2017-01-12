<?php
$table=$_POST['archivedata'];
if($table == 'Customer Master')
{
	header("location:customerarchive.php");
}
else if($table == 'Engineer Master')
{
	header("location:engineerarchive.php");
}
else if($table == 'Product Master')
{
	header("location:productarchive.php");
}
else if($table == 'Spare Master')
{
	header("location:sparearchive.php");
}
else if($table == 'Requests')
{
	header("location:requestarchive.php");
}
else{
	echo"error";
}

?>