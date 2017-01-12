<?php
include('library.php');
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../img/logo/" . $_FILES["image"]["name"]);
			
			$location="../img/logo/" . $_FILES["image"]["name"];
			$imagesize=$_POST['imagesize'];
			
			$save=mysql_query("UPDATE style SET imagelocation='$location', imagesize='$imagesize' where id='1'")or die(mysql_error());
			header("location:developer.php");
			exit();					
	}
?>
