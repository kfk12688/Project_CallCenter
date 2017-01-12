<?php
include("library.php");
if(isset($_POST['updatename']))
{
	$companyname=$_POST['companyname'];
	$fontfamily=$_POST['fontfamily'];
	$fontsize=$_POST['fontsize'];
	mysql_query("UPDATE style SET companyname = '$companyname', fontfamily='$fontfamily', fontsize='$fontsize' where id='1'")or die(mysql_error());
}
if(isset($_POST['number']))
{
	$tinnumber=$_POST['tinnumber'];
	$cstnumber=$_POST['cstnumber'];
	mysql_query("UPDATE style SET tin = '$tinnumber', cst='$cstnumber' where id='1'")or die(mysql_error());
}
if(isset($_POST['manager']))
{
	$managername=$_POST['managername'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	if($managername!='' && $username!='' && $password!='' && $cpassword!='')
	{
	if($password==$cpassword)
	{
		mysql_query("INSERT INTO login(username, password, accounttype)VALUES('$username', '$password', 'Manager')")or die(mysql_error());
	}
	else
	{
		echo '<script type="text/javascript">alert("Check Your Password"); </script>';	
	}
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
								<i class="halflings-icon white user"></i> Developer
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
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
						<li><a href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>						
						
						<li><a href="logout.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Logout</span></a></li>						
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
					<a href="#">Developer</a>
				</li>
			</ul>		
				
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Company Name</h2>
						<div class="box-icon">
							<a href="developer.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
						  	<div class="control-group">
								<label class="control-label">Customer Name</label>
								<div class="controls">								  
									<input type="text" name="companyname" placeholder="Company Name">						  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Font</label>
								<div class="controls">								  
									<select name="fontfamily">
									<option>Georgia,serif</option>
									<option>"Times New Roman", Times, serif</option>
									<option>"Arial Black", Gadget,san-serif</option>
									<option>"Comic Sans MS", cursive, sans-serif</option>
									<option>Impact, Charcol, Sans-serif</option>
									<option>Tahoma, Geneva, sans-serif</option>
									<option>Verdana, Geneva, sans-serif</option>
									</select>							  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Font Size</label>
								<div class="controls">								  
									<input type="number" name="fontsize" style="width:40px;">						  
								</div>
							  </div>						  			
							<div class="form-actions" >							
							  <input type="submit" name="updatename" class="btn btn-primary" value="Submit">
							  <button type="reset" class="btn">Cancel</button>
							</div>							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Logo</h2>
						<div class="box-icon">
							<a href="developer.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="addexec.php">
						  <fieldset>
						  	<div class="control-group">
								<label class="control-label">Company Logo</label>
								<div class="controls">								  
									<input type="file" name="image" >						  
								</div>
							  </div>						  
									 <div class="control-group">
								<label class="control-label">Logo Size</label>
								<div class="controls">								  
									<input type="number" name="imagesize" style="width:40px;">						  
								</div>
							  </div>			
							<div class="form-actions" ><div id="requestid"></div>
							
							  <input type="submit" name="updatename" class="btn btn-primary" value="Submit">
							  <button type="reset" class="btn">Cancel</button>

							</div>						
							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
			</div>
			<div class="row-fluid sortable">
		<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create New Manager</h2>
						<div class="box-icon">
							<a href="developer.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
						  	<div class="control-group">
								<label class="control-label">Manager Name</label>
								<div class="controls">								  
									<input type="text" name="managername" placeholder="Manager Name">						  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Username</label>
								<div class="controls">								  
									<input type="text" name="username" placeholder="User Name">						  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Password</label>
								<div class="controls">								  
									<input type="password" name="password" placeholder="New Password">						  
								</div>
							  </div>	
							  <div class="control-group">
								<label class="control-label">Confirm Password</label>
								<div class="controls">								  
									<input type="password" name="cpassword" placeholder="Confirm Password">						  
								</div>
							  </div>					  			
							<div class="form-actions" >							
							  <input type="submit" name="manager" class="btn btn-primary" value="Submit">
							  <button type="reset" class="btn">Cancel</button>
							</div>							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create New Manager</h2>
						<div class="box-icon">
							<a href="developer.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
						  	<div class="control-group">
								<label class="control-label">TIN Number</label>
								<div class="controls">								  
									<input type="text" name="tinnumber" placeholder="TIN Number">						  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">CST Number</label>
								<div class="controls">								  
									<input type="text" name="cstnumber" placeholder="CST Number">						  
								</div>
							  </div>							  					  			
							<div class="form-actions" >							
							  <input type="submit" name="number" class="btn btn-primary" value="Submit">
							  <button type="reset" class="btn">Cancel</button>
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
