<?php
error_reporting(0);
include"library.php";
if(isset($_POST['showtable']))
{	
	$query1 = mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($query2 = mysql_fetch_object($query1))
	{
		$view = $query2->view;
	}
	$views = $view;
	$sql = "SELECT * From customermaster where id = '$views'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_object($result))
	{
		$customername = $row->customername;
		$customerid = $row->customerid;
		$address = $row->address;
		$contactnumber = $row->contactnumber;
		echo'					<div class="control-group">
								<label class="control-label">Customer Name</label>
								<div class="controls">								  
									<input type="hidden" name="customername" placeholder="Contact Number" value='.$customername.'>
									<span class="uneditable-input">'. $customername.'</span>  								  
								</div>
							  </div>
								<div class="control-group">
								<label class="control-label">Customer Name</label>
								<div class="controls">								  
									<input type="hidden" name="customerid" placeholder="Customer Name" value='. $customerid.'>	
									<span class="uneditable-input">'. $customerid.'</span>  								  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Contact Number</label>
								<div class="controls">								  
									<input type="hidden" name="contactnumber" placeholder="Contact Number" value='.$contactnumber.'>
									<span class="uneditable-input">'. $contactnumber.'</span>  								  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Address</label>
								<div class="controls">								  
									<textarea  row="5" name="address" class="uneditable-input" placeholder="Customer Address">'.$address.'</textarea>	  
								</div>
							  </div>';
	}
	exit(); 
}
if(isset($_POST['showtable1']))
{	
	$query12 = mysql_query("SELECT * From login where username='$user'")or die(mysql_error());
	while($query23 = mysql_fetch_object($query12))
	{
		$view = $query23->productview;
	}
	$views = $view;
	$sql = "SELECT * From productmaster where id = '$views'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_object($result))
	{
		echo'<div class="control-group">
							  <label class="control-label" for="typeahead">Product ID</label>	  
								<div class="controls">
								  <input type="hidden" name="productid" value="'.$row->productid.'">	
								  <span class="uneditable-input">'.$row->productid.'</span>						  
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Product Name</label>	  
								<div class="controls">
								  <input type="hidden" name="productname" value="'.$row->productname.'">	
								  <span class="uneditable-input">'.$row->productname.'</span>						  
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Product Type</label>	  
								<div class="controls">
								  <input type="hidden" name="producttype" value="'.$row->producttype.'">
								  <span class="uneditable-input">'.$row->producttype.'</span>							  
								</div>
							  </div>';
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
			productview = '{$_POST['check']}'			
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
	<!-- end: Favicon -->
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
	<script type="text/JavaScript">
	$(document).ready(function()
	{  
$('html').delegate('.edit', 'click',function(){
		var IdEdit = $(this).attr('cus');
		$.ajax({
			url   :   "createnewrequest.php",
			type  :   "POST",
			datatype : "JSON",
			data  : {
						editvalue  : 1,
						check         : IdEdit
			},
			success : function(show)
			{
				showdata();
			}
		});
	});
$('html').delegate('.edit1', 'click',function(){
		var IdEdit = $(this).attr('pro');
		$.ajax({
			url   :   "createnewrequest.php",
			type  :   "POST",
			datatype : "JSON",
			data  : {
						editvalue1  : 1,
						check         : IdEdit
			},
			success : function(show)
			{
				showdata1();
			}
		});
	});
    function showdata()
	{
	$.ajax({
		url   :   "createnewrequest.php",
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

    function showdata1()
	{
	$.ajax({
		url   :   "createnewrequest.php",
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
							<a href="viewreports.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Service Reports  </span></a>
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
					<a href="#">Service Manager</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>New Request</h2>
						<div class="box-icon">
							<a href="createnewrequest.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="createrequest.php">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" ><b>Customer Details</b></label>	  
								<div class="controls">								  
								</div>
							  </div>
							  <div id="showdata">

							  	</div>
							   <div class="control-group">
							  <label class="control-label" for="typeahead"><b>Product Details</b></label>	  
								<div class="controls">								 
								</div>
							  </div>						   
							  		<div id="showdata1">

							  		</div>					  
							   <div class="control-group">
								<label class="control-label">Model Number</label>
								<div class="controls">								  
									<input type="text" name="modelnumber" placeholder="Model Number">	  								  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Serial Number</label>
								<div class="controls">								  
									<input type="text" name="serialnumber" placeholder="Serial Number">	  								  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Warranty Details</label>
								<div class="controls">								  
									<select name="warrentytype">
									<option>Yes</option>
									<option>No</option>
									</select>							  
								</div>
							  </div>
							   <div class="control-group">
							  <label class="control-label" for="typeahead"><b>Problem Details</b></label>	  
								<div class="controls">								 
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Defect Summary</label>
								<div class="controls">								  
									<textarea  row="5" name="summary" placeholder="Product Summary"></textarea>	  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Problem Description</label>
								<div class="controls">								  
									<textarea  row="5" name="description" placeholder="Problem Description"></textarea>	  
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Service Type</label>	  
								<div class="controls">
								  <select id="" data-rel="chosen" name="servicetype">
								  <option></option>
									<option>Service Type 1</option>
									<option>Service Type 2</option>
									<option>Service Type 3</option>
									<option>Service Type 4</option>
									<option>Service Type 5</option>
									<option>Service Type 6</option>											
								  </select>
								</div>
							  </div><br><br><br>
							  
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Create Request</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Customer Details</h2>
						<div class="box-icon">
							<a href="createnewrequest.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" >
						  <fieldset>
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Customer Name</th>
								  <th>Customer ID</th>								 
								  <th>Address</th>
								   <th>Contact Number</th>
								  <th>Option</th>
							  </tr>
						  </thead>   
						  <tbody>
								<?php
								$sql = "SELECT * From customermaster";
								$result = mysql_query($sql);
								while($row = mysql_fetch_object($result))
								{
									
									echo'<tr>
															<td>'.$row->customername.'</td>
															<td class="center">'.$row->customerid.'</td>
															<td class="center">'.$row->address.'</td>
															<td class="center">'.$row->contactnumber.'</td>
															<td class="center">									
																<a cus='.$row->id.' class="edit btn btn-info btn-small" href="#?id='.$row->id.'">Select</a>									
															</td>
														</tr>	';
								}
								?>					
						  </tbody>
					  </table>  					
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Product Details</h2>
						<div class="box-icon">
							<a href="createnewrequest.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" >
						  <fieldset>
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Name</th>
								  <th>Product ID</th>
								  <th>Product Type</th>
								  <th>Brand Name</th>
								  <th>Option</th>
							  </tr>
						  </thead>   
						  <tbody>
								<?php
								$sql = "SELECT * From productmaster";
								$result = mysql_query($sql);
								while($row = mysql_fetch_object($result))
								{
									
									echo'<tr>
															<td>'.$row->productname.'</td>
															<td class="center">'.$row->productid.'</td>
															<td class="center">'.$row->producttype.'</td>
															<td class="center">'.$row->category.'</td>
															<td class="center">									
																<a pro='.$row->id.' class="edit1 btn btn-info btn-small" href="#?id='.$row->id.'">Select</a>									
															</td>
														</tr>	';
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
