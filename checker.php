<?php
if($_REQUEST['action'] == 'login')
{ 
	mysql_select_db("callcenter1", mysql_connect("localhost", "root", "root"))or die(mysql_error());
	$username=htmlentities($_POST['username']); 
	$password=htmlentities($_POST['password']);	
	$query=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$password'")or die(mysql_error()); 
	$num_rows=mysql_num_rows($query); 
	if($num_rows > 0)
	{
		$fetch=mysql_fetch_array($query);
		session_start();	
		$_SESSION['username']=$fetch['username'];	
		$accounttype=$fetch['accounttype'];	
		$user=$_SESSION['username'];
		date_default_timezone_set("Asia/Kolkata");
		$dated = date("Y/m/d");
		$timed = date("h:i:sa");		
		mysql_query("update login set status='Online', dated='$dated', timed='$timed' where username='$user'")or die(mysql_error());
		if($accounttype == 'admin')
		{
			echo 0;
		}
		else if($accounttype == 'Manager')
		{
			echo 1;
		}
		else if($accounttype == 'developer')
		{
			echo 4;
		}
		else
		{
			echo 2;
		}
	} 
	else 
	{
		echo 3;
	}
	
}
if($_REQUEST['action'] == 'edit')
{ 
	include("library.php");
	$value=htmlentities($_POST['value']); 	
	if($query=mysql_query("UPDATE login SET value='$value' where username='$user'")or die(mysql_error()))
	{
		echo 0;
	} 
	else
	{
		echo 1;
	}
	
}
if($_REQUEST['action'] == 'edit1')
{ 
	include("library.php");
	$assign=htmlentities($_POST['assign']); 	
	if($query1=mysql_query("UPDATE login SET assign='$assign' where username='$user'")or die(mysql_error()))
	{
		echo 0;
	} 
	else
	{
		echo 1;
	}
	
}
if($_REQUEST['action'] == 'ass')
{ 
	include("library.php");
	$engineer=htmlentities($_POST['engineer']); 	
	if($query1=mysql_query("UPDATE login SET engineer='$engineer' where username='$user'")or die(mysql_error()))
	{	
		$query3 = mysql_query("SELECT * From login where username = '$user'")or die(mysql_error());
		while($query33 = mysql_fetch_object($query3))
		{
			$assign = $query33->assign;
			$engineer = $query33->engineer;
		}
		$dated = date("Y/m/d");
		$timed = date("h:i:sa");
		$query2 = mysql_query("INSERT INTO temp(assignedby, requestid, engineersid, dated, timed)Values('$user', '$assign', '$engineer', '$dated', '$timed')")or die(mysql_error());
		mysql_query("UPDATE newrequest SET status='Assigned' where requestid='$assign'")or die(mysql_error());
		echo 0;
	} 
	else
	{
		echo 1;
	}
	
}

?>