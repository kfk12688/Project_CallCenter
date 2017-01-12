<?php
include("library.php");
if(isset($_POST['showtable']))
	{
		mysql_query("UPDATE notifications SET status='opened' where receiver='$user' AND status='notopened'")or die(mysql_error());
	}
	if(isset($_POST['delete']))
	{
		$list=implode(",", $_POST['delete']);
		$sql="DELETE from notifications Where id IN ($list)";
		mysql_query($sql)or die(mysql_error());
	}
	if(isset($_POST['delete1']))
	{
		$list=implode(",", $_POST['delete']);
		$sql="DELETE from notifications Where id IN ($list)";
		mysql_query($sql)or die(mysql_error());
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Service Engineer</title>
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
	<!-- end: Favicon -->
	<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
	<script type="text/JavaScript">
	$(document).ready(function()
	{  
$('#view').click(function(){
	showdata();		
	});

    function showdata()
	{
	$.ajax({
		url   :  "notifications.php",
		type  :  "POST",
		async :  false,
		data  :  {
					showtable  :  1 
				},
		success : function(re){
						
		}
	});
	}

    
  });
    
	

	</script>
</script>	
</head>

<body>
	
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
						<li><a href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Service Engineer </span></a></li>	
						<li>
							<a href="serviceengineer.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> &nbsp;&nbsp;View Assigned <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service Request </span></a>
						</li>
						<li>
							<a href="notifications.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> &nbsp;Notifications </span>&nbsp;
							<span class="label label-important"> <?PHP echo $count; ?> </span></a>
							</li>				
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> &nbsp;Spares </span></a>
							<ul>		
								<li><a class="submenu" href="sparesrequired.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Spare <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Requirements</span></a></li>
								<li><a class="submenu" href="receivedsparequotations.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Spare Quotations</span></a></li>								
							</ul>	
						</li>						
						<li><a href="viewreports.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Service Reports </span></a></li>
						<li><a href="logout.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> &nbsp;Logout </span></a></li>												
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
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Service Engineer</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Task Assigned Notifications</h2>
						<div class="box-icon">
							<a href="notifications.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
							<ul class="messagesList"><li>
							<span class="from"><span class=""><i></i></span>&nbsp;&nbsp;&nbsp;<b>Notifications</b></span><span class="title"><span class="label label-success"></span>&nbsp;&nbsp;</span><span class="date"><input type="submit" name="delete" class="btn btn-danger btn-mini" value="DELETE"></b></span>
						</li></ul>							
						  <ul class="messagesList" id="view">
						<?php
						$query1=mysql_query("SELECT * FROM notifications where receiver='$user' AND messagefor='newtask'")or die(mysql_error());
						while($query2=mysql_fetch_object($query1))
						{
							$status=$query2->status;							
							if($status == 'notopened')
							{
						echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="serviceengineer.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title"><a class="label label-success" href="serviceengineer.php">New</a>&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/<br>'.$query2->timed.'</b></span>
						</li>';
							}
							else
							{
								echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="serviceengineer.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title">&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/<br>'.$query2->timed.'</b></span>
						</li>';
							}
						}
						?>
						
					</ul>
					
						</form>   

					</div>
				</div><!--/span-->
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Spare Quote Notifications</h2>
						<div class="box-icon">
							<a href="notifications.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
							<ul class="messagesList"><li>
							<span class="from"><span class=""><i></i></span>&nbsp;&nbsp;&nbsp;<b>Notifications</b></span><span class="title"><span class="label label-success"></span>&nbsp;&nbsp;</span><span class="date"><input type="submit" name="delete1" class="btn btn-danger btn-mini" value="DELETE"></b></span>
						</li></ul>							
						  <ul class="messagesList"  id="view">
						<?php
						$query1=mysql_query("SELECT * FROM notifications where receiver='$user' AND messagefor='sparequote'")or die(mysql_error());
						while($query2=mysql_fetch_object($query1))
						{
							$status=$query2->status;							
							if($status == 'notopened')
							{
						echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="receivedsparequotations.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title"><a class="label label-success">New</a>&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/<br>'.$query2->timed.'</b></span>
						</li>';
							}
							else
							{
								echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="receivedsparequotations.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title">&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/<br>'.$query2->timed.'</b></span>
						</li>';
							}
						}
						?>
						
					</ul>
					
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row--> 
    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
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
