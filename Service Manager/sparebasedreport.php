<?php
include("library.php");
if(isset($_POST['showtable']))
{	
	$query1 = mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($query2 = mysql_fetch_object($query1))
	{
		$view = $query2->view;
	}
	$views = $view;
	$sql = "SELECT * From sparemaster where sparename = '$views'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_object($result))
	{
		$spareid = $row->sparetype;		
		echo'<option>'.$spareid.'</option>';
	}
	exit(); 
}
if(isset($_POST['showtable1']))
{	
	$query1 = mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($query2 = mysql_fetch_object($query1))
	{
		$view = $query2->view;
		$assign=$query2->assign;
	}
	$views = $view;
	$assigns = $assign;
	$sql = "SELECT * From sparemaster where sparetype = '$views' AND sparename = '$assigns'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_object($result))
	{
		$spareid = $row->spareid;		
		echo'<option>'.$spareid.'</option>';
	}
	exit(); 
}
if(isset($_POST['editvalue']))
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
if(isset($_POST['editvalue1']))
{
	$sql = "UPDATE login SET 
			view = '{$_POST['check']}', assign ='{$_POST['check1']}'			
			WHERE username = '{$user}'";
	$res = mysql_query($sql);
	if($res)
	{
		echo"success Update";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin</title>
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
	<style type="text/css">
	.scroll
	{
		width: 925px;  
		overflow: scroll; /* Scrollbar are always visible */
		overflow: auto;  
	}


	</style>
	<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
	<script type="text/JavaScript">
	$(document).ready(function()
	{
	function myStopFunction()
	{
    clearInterval(refreshId);
	}
    var refreshId = setInterval( function() 
    {
        var spareid = $('#spareid').val();
     	if (spareid != '')
     	{     		
 		$.ajax({
		url   :  "sparebasedreport.php",
		type  :  "POST",
		async :  false,
		data  :{
			editvalue  :  1,
			check : spareid
		},
		success :function(result)
		{
			showdata();			
		}
		});
     	}
       
    }, 1000);
    var refreshId2 = setInterval( function() 
    {
        var sparetype = $('#showdata').val();
        var spareid = $('#spareid').val();
     	if (sparetype != '')
     	{     		
 		$.ajax({
		url   :  "sparebasedreport.php",
		type  :  "POST",
		async :  false,
		data  :{
			editvalue1  :  1,
			check : sparetype,
			check1 : spareid
		},
		success :function(result)
		{			
			showdata1();
		}
		});
     	}
       
    }, 1000);

    function showdata()
	{
	$.ajax({
		url   :   "sparebasedreport.php",
		type  :  "POST",
		async :  false,
		data  :  {
					showtable  :  1				
				},
		success : function(re){
			$('#showdata').html(re);
			myStopFunction();
		}
	});
	}
	function showdata1()
	{
	$.ajax({
		url   :   "sparebasedreport.php",
		type  :  "POST",
		async :  false,
		data  :  {					
					showtable1  :  1
				},
		success : function(re){
			$('#showdata1').html(re);
			
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
				<a class="brand" href="#"><span><?php echo $value; ?></span></a>	<!-- start: Header Menu -->
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
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Spare Based Report</a>
				</li>
			</ul>		
			
    
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Spare Based Reports</h2>
						<div class="box-icon">
							<a href="sparebasedreport.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" >
						  <fieldset>
						<div class="control-group">
							  <label class="control-label">Item Code / Name</label>
							  <div class="controls">			  

								 <select name="sparename" id="spareid">
								 <option></option>
							  <?php
							  $query36=mysql_query("SELECT * From sparemaster")or die(mysql_error());
							  while($query37 = mysql_fetch_object($query36))
							  {
							  	echo'<option>'.$query37->sparename.'</option>';
							  }
							  ?>
							  </select>&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="spareid" id="showdata">
							  <option></option>
							  
							  </select>&nbsp;&nbsp;&nbsp;&nbsp;
							  <select name="sparetype" id="showdata1">
							  <option></option>
							  
							  </select>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
								<button class="btn btn-primary" type="submit" name="search">Search</button>
							  </div>
							</div>	
							 <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
  							  		<th>S.No</th>	
							  		<th>Date / Time</th>						  		
								   <th>Request ID</th>
								   <th>Engineer ID</th>
								  <th>Customer ID</th>								  	
								   <th>Item Name</th>
								   <th>Quantity</th>
								   <th>Unit Cost</th>					 							  
							  </tr>
						  </thead>
						   <tbody>   
						<?php
						$s=1;
						if(isset($_POST['search']))
						{
							$spareid = $_POST['spareid'];
							$sparename = $_POST['sparename']; 
						$query1 = mysql_query("SELECT * FROM spares where productitem='$sparename'")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							$ss = $s++;
							echo'<tr>
								<td>'.$ss.'</td>
								<td class="center">'.$query2->dated.'<br>'.$query2->timed.'</td>
								<td class="center">'.$query2->requestid.'</td>
								<td class="center">'.$query2->engineerid.'</td>	
								<td class="center">'.$query2->customerid.'</a></td>															
								<td class="center">'.$query2->productitem.'</td>	
								<td class="center">'.$query2->quantity.'</td>
								<td class="center">'.$query2->unitcost.'</td>																		
							</tr>';

						}						 
							
						}
						?>
						 </tbody>
					  </table>      
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
