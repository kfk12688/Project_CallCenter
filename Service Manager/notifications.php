<!DOCTYPE html>
<html lang="en">
<head><?php
include"library.php";

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
		width: 1000px;  
		overflow: scroll; /* Scrollbar are always visible */
		overflow: auto;  
	}


	</style>
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
		url   :   "notifications.php",
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
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Spares Required Notifications</h2>
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
						$query1=mysql_query("SELECT * FROM notifications where receiver='$user' AND messagefor='sparesrequired'")or die(mysql_error());
						while($query2=mysql_fetch_object($query1))
						{
							$status=$query2->status;							
							if($status == 'notopened')
							{
						echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="sparequotations.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title"><a class="label label-success" href="sparequotations.php">New</a>&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/<br>'.$query2->timed.'</b></span>
						</li>';
							}
							else
							{
								echo'<li>
							<span class="from" ><input type="checkbox"  name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="sparequotations.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title">&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/</br>'.$query2->timed.'</b></span>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Report Created Notifications</h2>
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
						  <ul class="messagesList" id="view">
						<?php
						$query1=mysql_query("SELECT * FROM notifications where receiver='$user' AND messagefor='completedreports'")or die(mysql_error());
						while($query2=mysql_fetch_object($query1))
						{
							$status=$query2->status;							
							if($status == 'notopened')
							{
						echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="viewreports.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title"><a class="label label-success" href="viewreports.php">New</a>&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/<br>'.$query2->timed.'</b></span>
						</li>';
							}
							else
							{
								echo'<li>
							<span class="from" ><input type="checkbox" name="delete['.$query2->id.']" value="'.$query2->id.'">&nbsp;&nbsp;&nbsp;<a class="icon-envelope-alt" href="viewreports.php"><i></i></a>&nbsp;&nbsp;&nbsp;<b> '.$query2->sender.'</b></span><span class="title">&nbsp;&nbsp;'.$query2->message.'</span><span class="date">'.$query2->dated.'/</br>'.$query2->timed.'</b></span>
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
		<div class="modal-header"><form method="POST" action="refresh.php">
			<a href="viewrequest.php" class="close">×</a>
			
			<h3 id="showw"> </h3>
			</div>
		<div class="modal-body">
			<div class="box-content">
								
							  </select>					 					    
					</div>
			</div>			
		<div class="modal-footer">
			<a href="viewrequest.php" class="btn">Close</a>
			<input type="submit" name="assignrequest" class="btn btn-primary" value="Assign">
		</div>
	</div></form>
	<div class="modal hide fade" id="myModal1">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Assigned Requests</h3>
			</div>
		<div class="modal-body">
			<div class="control-group"><table>
				<label class="control-label"><tr><td><b>Request ID</b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> A15489</td></tr></label>
				<label class="control-label"><tr><td><b>Assigned To </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> Engineer ID</td></tr></label>
				<label class="control-label"><tr><td><b>Range </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; </td><td>100-168</td></tr></label>
				<label class="control-label"><tr><td><b>Date </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td>2015/02/05</td></tr></label>
				<label class="control-label"><tr><td><b>Time </b></td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td> 10:00 AM</td></tr></label>	
				</table>		
			  </div>
		</div>			
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>			
		</div>
	</div>
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
