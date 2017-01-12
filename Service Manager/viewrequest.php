<!DOCTYPE html>
<html lang="en">
<head><?php
include"library.php";
$qs=mysql_query("SELECT * FROM reports")or die(mysql_error());
while($wd=mysql_fetch_object($qs))
{
	$requestid=$wd->requestid;
	$customerid=$wd->customerid;
	$dated=$wd->dated;
	$timed=$wd->timed;
	mysql_query("UPDATE temp SET udate='$dated', utime='$timed' where requestid='$requestid' AND taskstatus='Completed'")or die(mysql_error());
}



if(isset($_POST['submit']))
{
	if(isset($_POST['delete']))
	{
		$list=implode(",", $_POST['delete']);
		$sql="DELETE from newrequest Where id IN ($list)";
		mysql_query($sql)or die(mysql_error());
	}	
}
if(isset($_POST['views']))
{
	if(isset($_POST['delete']))
	{
	$list=implode(",", $_POST['delete']);
		$sql="UPDATE newrequest SET viewtable = 'YES' Where id IN ($list)";
		mysql_query($sql)or die(mysql_error());
}
}
if(isset($_POST['close']))
{
	if(isset($_POST['delete1']))
	{
	$list=implode(",", $_POST['delete1']);
		$sql="UPDATE newrequest SET viewtable = 'NO' Where id IN ($list)";
		mysql_query($sql)or die(mysql_error());
}
}
if(isset($_POST['download']))
{
	if(isset($_POST['delete1']))
	{
	$list=implode(",", $_POST['delete1']);
		$sql="UPDATE newrequest SET download = 'YES' Where id IN ($list)";
		mysql_query($sql)or die(mysql_error());
		header("location:download/demo.php");
}
}
if(isset($_POST['editvalue']))
{
	$sql = "UPDATE login SET 
			value = '{$_POST['id']}'			
			WHERE id = '{$user}'";
	$res = mysql_query($sql);
	if($res)
	{
		echo"success Update";
	}
}
if(isset($_POST['editvalue1']))
{
	$sql = "UPDATE login SET 
			assign = '{$_POST['id']}'			
			WHERE id = '{$user}'";
	$res = mysql_query($sql);
	if($res)
	{
		echo"success Update";
	}
}
if(isset($_POST['showtable']))
{
			$query11 = mysql_query("SELECT * From login Where username='$user'")or die(mysql_error());
			while($query22=mysql_fetch_object($query11))
			{
				$value=$query22->value;
			}
			$values = $value;
			$query33 = mysql_query("SELECT * from newrequest where id = '$values'")or die(mysql_error());
			while($query44 = mysql_fetch_object($query33))
			{
				echo'<label class="control-label"><tr><td><b>Request ID</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp; :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->requestid.'</td></tr></label>
				<label class="control-label"><tr><td><b>Customer ID</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->customerid.'</td></tr></label>
				<label class="control-label"><tr><td><b>Customer Name</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->customername.'</td></tr></label>
				<label class="control-label"><tr><td><b>Product Name</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->productname.'</td></tr></label>
				<label class="control-label"><tr><td><b>Product Type</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->producttype.'</td></tr></label>
				<label class="control-label"><tr><td><b>Model Number</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->modelnumber.'</td></tr></label>
				<label class="control-label"><tr><td><b>Serial Number</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->serialnumber.'</td></tr></label>
				<label class="control-label"><tr><td><b>Warrenty</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;  :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$query44->warrentytype.'</td></tr></label>';
			}
			
	exit(); 
}
if(isset($_POST['showtable1']))
{
$query111=mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
			while($query222=mysql_fetch_object($query111))
			{ 
				$getrequestid=$query222->assign;
			}
			echo 'Assign Requests To Request ID   '.$getrequestid;
		exit();	
}
if(isset($_POST['edits']))
{
	$sql = "UPDATE login SET 
			view = '{$_POST['check']}'			
			WHERE username = '{$user}'";
	$res = mysql_query($sql);
	if($res)
	{
		echo"success Update";
	}
}
if(isset($_POST['shows']))
{	
	$query1 = mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($query2 = mysql_fetch_object($query1))
	{
		$view = $query2->view;
	}
	$views = $view;
	$sql = "SELECT * From engineermaster where engineerid = '$views'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_object($result))
	{		
		$rangefrom = $row->rangefrom;
		$rangeto = $row->rangeto;
		$abc= $rangeto-$rangefrom;						
		echo'<option>'.$abc.'</option>';
	}
	exit(); 
}
if(isset($_POST['assign']))
{
	$aa=mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($bb=mysql_fetch_object($aa))
	{
		$assiggen=$bb->assign;
	}
	$engineerid=$_POST['eng'];
	date_default_timezone_set("Asia/Kolkata");
	$dated = date("Y/m/d");
	$timed = date("h:i:sa");
	$query1=mysql_query("SELECT * From engineermaster where engineerid='$engineerid'")or die(mysql_error());
	while($query2=mysql_fetch_object($query1))
	{
		$rangefrom=$query2->rangefrom;
		$updaterange=$rangefrom+1;
		mysql_query("UPDATE engineermaster SET rangefrom='$updaterange' where engineerid='$engineerid'")or die(mysql_error());
	}
	mysql_query("UPDATE temp set engineersid='$engineerid', dated='$dated', timed='$timed' where requestid='$assiggen'")or die(mysql_error());
	mysql_query("UPDATE newrequest set status='Assigned', dated='$dated', timed='$timed' where requestid='$assiggen'")or die(mysql_error());
	mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', '$engineerid', 'New Task Assigned', 'newtask', '$dated', '$timed', 'notopened')")or die(mysql_error());
}
if(isset($_POST['assign2']))
{
	$aa=mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($bb=mysql_fetch_object($aa))
	{
		$assiggen=$bb->assign;
	}
	$engineerid=$_POST['eng2'];
	date_default_timezone_set("Asia/Kolkata");
	$dated = date("Y/m/d");
	$timed = date("h:i:sa");
	$query1=mysql_query("SELECT * From engineermaster where engineerid='$engineerid'")or die(mysql_error());
	while($query2=mysql_fetch_object($query1))
	{
		$rangefrom=$query2->rangefrom;
		$updaterange=$rangefrom+1;
		mysql_query("UPDATE engineermaster SET rangefrom='$updaterange' where engineerid='$engineerid'")or die(mysql_error());
	}
	mysql_query("INSERT into temp (engineersid, requestid, dated, timed, requestalert)VALUES('$engineerid', '$assiggen', '$dated', '$timed', 'YES')")or die(mysql_error());
	mysql_query("UPDATE newrequest set status='Assigned' where requestid='$assiggen'")or die(mysql_error());
	mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', '$engineerid', 'New Task Assigned', 'newtask', '$dated', '$timed', 'notopened')")or die(mysql_error());
}
if(isset($_POST['engineer']))
{
$query1 = mysql_query("SELECT * FROM engineermaster")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							echo'<tr>								
								<td class="center">'.$query2->engineerid.'</td>																								
								<td class="center">	'.$query2->engineername.'</td>								
								<td class="center">'.$query2->rangefrom.'-'.$query2->rangeto.'</td>
								<td><a eng='.$query2->engineerid.' id="eng" class="eng btn btn-primary btn-mini">Assign</a></td>												
							</tr>';
						}
						exit();
}
if(isset($_POST['engineer2']))
{
$query1 = mysql_query("SELECT * FROM engineermaster")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							echo'<tr>								
								<td class="center">'.$query2->engineerid.'</td>																								
								<td class="center">	'.$query2->engineername.'</td>								
								<td class="center">'.$query2->rangefrom.'-'.$query2->rangeto.'</td>
								<td><a eng2='.$query2->engineerid.' id="eng2" class="eng2 btn btn-primary btn-mini">Assign</a></td>												
							</tr>';
						}
						exit();
}
?>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Service Manager</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<style type="text/css">
	.scroll
	{
		width: 1150px;  
		overflow: scroll; /* Scrollbar are always visible */
		overflow: auto;  
	}


	</style>
	<!-- end: Favicon -->
	
	<script type="text/javascript" src="jquery-2.1.3.min.js"></script>	
<script type="text/javascript">
$(function(){
	showdata();	
	showdata1();
	$('html').delegate('#edit', 'click',function(){	
		var IdEdit = $(this).attr('ide');		
		 var UrlToPass = 'action=edit&value='+IdEdit;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){ 
                	showdata();                   
					$('#myModal3').modal('show');
                }                           
                else{
                    alert('Problem with sql query');
                }
            }
            });
        });
	$('html').delegate('#edit1', 'click',function(){	
		var IdEdit1 = $(this).attr('idf');				
		 var UrlToPass = 'action=edit1&assign='+IdEdit1;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){ 
                	showdata1(); 
                	engineer2();                   
					$('#myModal').modal('show');
                }                           
                else{
                    alert('Problem with sql query');
                }
            }
            });
        });
	$('html').delegate('#ass', 'click',function(){	
		var IdEdit11 = $(this).attr('ide1');		
		 var UrlToPass = 'action=ass&engineer='+IdEdit11;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){                 	                
					$('#myModal').modal('hide');
                }                           
                else{
                    alert('Problem with sql query');
                }
            }
            });
        });	
	$('html').delegate('#edit11', 'click',function(){	
		var IdEdit1 = $(this).attr('idf1');				
		 var UrlToPass = 'action=edit11&assign='+IdEdit1;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){ 
                	showdata1();  
                	engineer();                 
					$('#myModal1').modal('show');
                }                           
                else{
                    alert('Problem with sql query');
                }
            }
            });
        });
	$('html').delegate('#ass1', 'click',function(){	
		var IdEdit11 = $(this).attr('ide11');		
		 var UrlToPass = 'action=ass1&engineer='+IdEdit11;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){                 	                
					$('#myModal1').modal('hide');
                }                           
                else{
                    alert('Problem with sql query');
                }
            }
            });
        });	
	function showdata()
{
	$.ajax({
		url   :   "viewrequest.php",
		type  :  "POST",
		async :  false,
		data  :  {
					showtable  :  1 
				},
		success : function(re){
			$('#showdata').html(re);
		}
	});
}
function engineer()
{
	$.ajax({
		url   :  "viewrequest.php",
		type  :  "POST",
		async :  false,
		data  :  {
					engineer  :  1 
				},
		success : function(ree){
			$('#engineer').html(ree);
		}
	});
}
function engineer2()
{
	$.ajax({
		url   :  "viewrequest.php",
		type  :  "POST",
		async :  false,
		data  :  {
					engineer2  :  1 
				},
		success : function(ree){
			$('#engineer2').html(ree);
		}
	});
}
function showdata1()
{
	$.ajax({
		url   :  "viewrequest.php",
		type  :  "POST",
		async :  false,
		data  :  {
					showtable1  :  1 
				},
		success : function(ree){
			$('#showw').html(ree);
		}
	});
}
  $('html').delegate('.eng', 'click',function(){
		var eng = $(this).attr('eng');
		$.ajax({
			url   :   "viewrequest.php",
			type  :   "POST",
			async :  false,
			data  : {

				assign    : 1,
				eng  :  eng
			},
			success : function(up)
			{
				$('#myModal1').modal('hide');
				window.location="viewrequest.php";
			}
		});
	});
  $('html').delegate('.eng2', 'click',function(){
		var eng2 = $(this).attr('eng2');
		$.ajax({
			url   :   "viewrequest.php",
			type  :   "POST",
			async :  false,
			data  : {

				assign2    : 1,
				eng2  :  eng2
			},
			success : function(up)
			{
				$('#myModal').modal('hide');
				window.location="viewrequest.php";
			}
		});
	});
});

</script>		
		
			
</head>

<body>
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><span><?php echo $value; ?></span></a>					
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								Login Time&nbsp;<?php echo $logindate.'&nbsp;-&nbsp;'.$logintime;?>
								&nbsp;&nbsp;<i class="halflings-icon white user"></i> <?php echo $username;?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="changepassword.php"><i class="halflings-icon user"></i> Change Password</a></li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Service Manager </span></a></li>		
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Customer Requests </span></a>
							<ul>		
								<li><a class="submenu" href="createnewrequest.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Create Request</span></a></li>
								<li><a class="submenu" href="viewrequest.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> View Request</span></a></li>			
							</ul>	
						</li>
						<li>
							<a href="notifications.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Notifications </span>&nbsp;
							<span class="label label-important"> <?PHP echo $count; ?> </span></a>
							</li>
							<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Reports </span></a>
							<ul>
								<li><a class="submenu" href="datebasedreport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Date Based </span></a></li>
								<li><a class="submenu" href="customerbasedreport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Customer Based</span></a></li>
								<li><a class="submenu" href="productbasedreport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Product Based</span></a></li>
								<li><a class="submenu" href="sparebasedreport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Spare Based</span></a></li>
								<li><a class="submenu" href="amountbasedreport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Amount Based</span></a></li>
								<li><a class="submenu" href="performancereport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Performance Based</span></a></li>
								<li><a class="submenu" href="consolidatedreport.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Consolidated</span></a></li>
							</ul>	
						</li>
						<li>
							<a href="viewreports.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Service Reports  </span></a>
							</li>
						
						<li><a href="sparequotations.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Spare Requirements </span></a></li>		
						<li>
						<li><a href="logout.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Logout </span></a></li>												
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Service Manager</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Basic View</h2>
						<div class="box-icon">
							<a href="viewrequest.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
							 <div class="box-content">
							 
							 <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>							  
							  		<th>S.No</th>							  		
								  <th>Option</th>
								  <th>Request ID</th>
								  <th>Service Type</th>
								  <th>Summary</th>
								  <th>Date</th>
								  <th>Time</th>
								  <th>Status</th>
								  <th>Action</th>
							  </tr>
						  </thead>
						   <tbody>   
						<?php
						$s=1;						
						$query1 = mysql_query("SELECT * FROM newrequest")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							$ss = $s++;
							$status=$query2->status;
							if($status=='Assigned')
							{
								$class='<i class="label label-warning">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$query2->status.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>';
								$val='<a class="btn btn-mini">Assign</a>&nbsp;&nbsp;';
							}
							else if($status == 'notassigned')
							{
								$class='<i class="label label-important">&nbsp;&nbsp;&nbsp;'.$query2->status.'&nbsp;&nbsp;&nbsp;</i>';
								$val='<a idf='.$query2->requestid.' id="edit1" class="edit1 btn btn-primary btn-mini">Assign</a>&nbsp;&nbsp;<a href="testsms2.php" class="btn btn-primary btn-mini">SMS</a>&nbsp;&nbsp;<a class="btn btn-primary btn-mini">Email</a>';
							}
							else if($status=='Completed')
							{
								$class='<i class="label label-success">&nbsp;&nbsp;&nbsp;&nbsp;'.$query2->status.'&nbsp;&nbsp;&nbsp;&nbsp;</i>';
								$val='<a href="viewreports.php" class="btn btn-primary btn-mini">&nbsp;&nbsp;View&nbsp;</a>&nbsp;&nbsp;';
							}
							else
							{
								$class='';
							}
							echo'<tr>
								<td>'.$ss.'</td>
								<td class="center"><input type="hidden" name="id[]" value="'.$query2->id.'">
								<input type="checkbox" class="case" name="delete['.$query2->id.']" value="'.$query2->id.'"></td>
								<td class="center"><a ide='.$query2->id.' id="edit" class="edit" href="#?id='.$query2->id.'">'.$query2->requestid.'</a></td>
								<td class="center">	'.$query2->servicetype.'</td>								
								<td class="center">'.$query2->summary.$query2->producttype.'<br>'.$query2->productname.'</td>
								<td class="center">'.$query2->dated.'</td>
								<td class="center">'.$query2->timed.'</td>
								<td class="center"><a class="" href="#?id='.$query2->requestid.'">'.$class.'</a>
								</td>
								<td>'.$val.'</td></tr>';
						}
						?>
						 </tbody>
					  </table>      
					 
						           
					</div>						
							<div class="form-actions" ><div id="requestid"></div>						
							<input type="submit" title="Click Checkboxs To View Details." data-rel="tooltip" name="views" class="btn btn-primary" value="Detailed View">&nbsp;&nbsp;
							  <input type="submit" title="Click Checkboxs To Delete Fields." data-rel="tooltip" name="submit" class="btn btn-danger" value="Delete">&nbsp;&nbsp;
							  						  <button type="reset" class="btn">Cancel</button>
							</div>						
							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->    


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Detailed View</h2>
						<div class="box-icon">
							<a href="viewrequest.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
							 <div class="box-content" id="divToPrint"> 
							 <div class="scroll">
							 <table  class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>							  
							  		<th>S.No</th>							  		
								  <th>Option</th>
								  <th>Date / Time</th>								 
								  <th>Reques ID</th>
								  <th>CustomerID</th>
								  <th>Customer Name</th>
								  <th>Mobile Number</th>
								  <th>Address</th>
								  <th>Product ID</th>
								  <th>Product Name</th>
								  <th>Product Type</th>
								  <th>Model Number</th>
								  <th>Serial Number</th>
								  <th>Warranty Details</th>
								  <th>Problem Summary</th>
								  <th>Problem Description</th>
								  <th>Service Type</th>
							  </tr>
						  </thead>
						   <tbody>   
						<?php
						$s=1;
						
						$query1 = mysql_query("SELECT * FROM newrequest where viewtable='YES'")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							$ss = $s++;
							echo'<tr>
								<td>'.$ss.'</td>
								<td class="center"><input type="hidden" name="id[]" value="'.$query2->id.'">
								<input type="checkbox" name="delete1['.$query2->id.']" value="'.$query2->id.'"></td>
								
								<td class="center">	'.$query2->dated.'/'.$query2->timed.'</td>
								<td class="center">	'.$query2->requestid.'</td>	
								<td class="center">	'.$query2->customerid.'</td>
								<td class="center">	'.$query2->customername.'</td>	
								<td class="center">	'.$query2->contactnumber.'</td>	
								<td class="center">	'.$query2->address.'</td>
								<td class="center">	'.$query2->productid.'</td>
								<td class="center">	'.$query2->productname.'</td>	
								<td class="center">	'.$query2->producttype.'</td>
								<td class="center">	'.$query2->modelnumber.'</td>	
								<td class="center">	'.$query2->serialnumber.'</td>
								<td class="center">	'.$query2->warrentytype.'</td>
								<td class="center">	'.$query2->summary.'</td>
								<td class="center">	'.$query2->description.'</td>
								<td class="center">	'.$query2->servicetype.'</td>																
							</tr>';

						}
						?>
						 </tbody>
					  </table>      
					   </div>
						           
					</div>						
							<div class="form-actions" >							
							<input type="submit"  title="Click Checkboxs To Download Data's." data-rel="tooltip" name="download" class="btn btn-primary" value="download">&nbsp;&nbsp;
							  <input type="submit" title="Click Checkboxs To Hide Details." data-rel="tooltip" name="close" class="btn btn-danger" value="Hide View">&nbsp;&nbsp;
							  						  <button type="reset" class="btn">Cancel</button>
							</div>						
							
						  </fieldset>
						</form>
					</div>
				</div><!--/span-->

			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Tasks Assigned</h2>
						<div class="box-icon">
							<a href="viewrequest.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" >
						  <fieldset>
							 <div class="box-content">
							 
							 <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>							  
							  		<th>S.No</th>
							  		 <th>Date / Time</th>
								 						  
								  <th>Reques ID</th>								 
								  <th>Assigned To</th>
								 <th>Current Status</th>
								  <th>Update Time</th>	
								   <th>Escalation</th>									 
							  </tr>
						  </thead>
						   <tbody>   
						<?php
						$s=1;						
						$query1 = mysql_query("SELECT * FROM temp")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							$ss = $s++;							
							echo'<tr>
								<td>'.$ss.'</td>
								<td class="center">'.$query2->dated.'/'.$query2->timed.'</td>																								
								<td class="center">	'.$query2->requestid.'</td>								
								<td class="center">'.$query2->engineersid.'</td>
								<td class="center">'.$query2->taskstatus.'</td>	
								<td class="center">'.$query2->udate.'-'.$query2->utime.'</td>
								<td><a idf1='.$query2->requestid.' id="edit11" class="edit11 btn btn-primary btn-mini">Assign</a></td>												
							</tr>';
						}
						?>
						 </tbody>
					  </table>      
					 
						           
					</div>						
							<div class="form-actions" ><div id="requestid"></div>						
							
							</div>						
							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->  
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header"><form method="POST">
			<a class="close">×</a>
			
			<h3 id="showw"> </h3>
			</div>
		<div class="modal-body">
			<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>		 						  
								  <th>Engineer ID</th>								 
								  <th>Engineer Name</th>
								 <th>Report Range</th>
								   <th>Option</th>									 
							  </tr>
						  </thead>
						   <tbody id="engineer2">   
						
						 </tbody>
					  </table> 		 					    
					</div>
			</div>			
		<div class="modal-footer">
			<a class="btn">Close</a>			
		</div>
	</div></form>
	<div class="modal hide fade" id="myModal1">
		<div class="modal-header"><form method="POST">
			<a class="close">×</a>
			
			<h3 id="showw"> </h3>
			</div>
		<div class="modal-body">
			<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>		 						  
								  <th>Engineer ID</th>								 
								  <th>Engineer Name</th>
								 <th>Report Range</th>
								   <th>Option</th>									 
							  </tr>
						  </thead>
						   <tbody id="engineer">   
						<?php											
						
						?>
						 </tbody>
					  </table> 		 					    
					</div>
			</div>			
		<div class="modal-footer">
			<a class="close">Close</a>			
		</div>
	</div></form>
	<div class="modal hide fade" id="myModal2">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Completed By</h3>
			</div>
		<div class="modal-body">
			<div class="control-group"><table>
				<label class="control-label"><tr><td><b>Request ID </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> A15489</td></tr></label>
				<label class="control-label"><tr><td><b>Processed By</b> </td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> Engineer ID</td></tr></label>
				<label class="control-label"><tr><td><b>Date </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> 2015/02/05</td></tr></label>
				<label class="control-label"><tr><td><b>Time </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> 10:00 AM</td></tr></label>	</table>		
			  </div>
			</div>			
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">View Report</a>
		</div>
	</div>
	<div class="modal hide fade" id="myModal3">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Assigned Requests</h3>
			</div>
		<div class="modal-body">
			<div class="control-group"><table id="showdata">
			
				</table>			
			  </div>
		</div>			
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>			
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 <a href="#"></a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
