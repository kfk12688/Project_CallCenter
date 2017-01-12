<?php
mysql_select_db("callcenter1", mysql_connect("localhost", "root", "root"))or die(mysql_error());
$username = $_POST['username'];
$usermailid = $_POST['usermailid'];
$position = $_POST['position'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if($password == $cpassword)
{
	if($position == 'Service Manager')
	{
	$query1 = mysql_query("SELECT * From login")or die(mysql_error());
while($query2 = mysql_fetch_array($query1))
{
	$oldid = $query2['userid'];
}
$lastId = $oldid;
$letter = $lastId[0];
$number = $lastId[1].$lastId[2].$lastId[3].$lastId[4];

if ($number < 9999) {
    $newId = $letter.sprintf("%03d", $number+1);
} else {
    $ascii = ord($letter);
    $newLetter = chr($ascii+1);
    $newId = $newLetter.'001';
}
	}
	$userid = $newId;
$query11 = mysql_query("INSERT INTO login(userid, username, password)VALUES('$userid', '$username', '$password')")or die(mysql_error());
$query22 = mysql_query("INSERT INTO profiles(username, usermailid, position)VALUES('$username', '$password', '$position')")or die(mysql_error());
}
header("location:newuser.html");
?>