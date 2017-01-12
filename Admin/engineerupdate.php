<?php
if(isset($_POST['buttonsave']))
{
	$sql = "INSERT INTO login(username, password)
	VALUES('{$_POST['id']}', '{$_POST['password']}')";
	$result = mysql_query($sql);
	$sql = "INSERT INTO engineermaster(engineername, engineerid, contactnumber, emailid)
	VALUES('{$_POST['name']}', '{$_POST['id']}', '{$_POST['contactnumber']}', '{$_POST['emailid']}')";
	$result = mysql_query($sql);
	if($result)
	{
		echo "Successfully Insert";
	}
	exit();
}
if(isset($_POST['deletes']))
{
	$sql = mysql_query("DELETE From newajax WHERE id = '{$_POST['id']}'");
	if($sql)
	{
		echo "success";
	}
}
if(isset($_POST['editvalue']))
{
	$sql = "SELECT * FROM engineermaster WHERE id = '{$_POST['id']}' ";
	$row = mysql_query($sql);
	$rows = mysql_fetch_object($row);
	header ("Content-type: text/x-json");
	echo json_encode($rows);
	exit();
}
if(isset($_POST['update']))
{

	$sql = "UPDATE engineermaster SET 
			engineername = '{$_POST['name']}', 
			emailid = '{$_POST['emailid']}', 
			contactnumber = '{$_POST['contactnumber']}'
			WHERE id = '{$_POST['id']}'";
	$res = mysql_query($sql);
	if($res)
	{
		echo"success Update";
	}
	}

?>