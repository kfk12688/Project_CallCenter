<?php
include("library.php");
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
	<script type="text/javascript">
$(function(){
	$('#chequeno').hide();
	$('#date').hide();
	$('#amount').hide();
	$('#favouring').hide();
	$('#particulars').hide();
	$('#ddno').hide();
	$('#bankname').hide();
	$('#referenceno').hide();
	$('#cheque').click(function(){
	$('#chequeno').show();
	$('#date').show();
	$('#amount').show();
	$('#bankname').show();
	$('#ddno').hide();
	$('#particulars').hide();
	$('#referenceno').hide();
	});
	$('#dd').click(function(){
	$('#ddno').show();
	$('#date').show();
	$('#amount').show();
	$('#bankname').show();
	$('#favouring').show();
	$('#chequeno').hide();
	$('#particulars').hide();
	$('#referenceno').hide();	
	});
	$('#cash').click(function(){
	$('#amount').show();
	$('#particulars').show();
	$('#chequeno').hide();
	$('#date').hide();
	$('#favouring').hide();
	$('#ddno').hide();
	$('#bankname').hide();
	$('#referenceno').hide();
	});
	$('#netbanking').click(function(){
	$('#date').show();
	$('#amount').show();
	$('#bankname').show();		
	$('#referenceno').show();
	$('#chequeno').hide();
	$('#ddno').hide();
	$('#favouring').hide();
	$('#particulars').hide();
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
								<li><a class="submenu" href="sparesrequired.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Spare <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Requirements</span></a></li>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Service Report</h2>
						<div class="box-icon">
							<a href="servicereport.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="updatereport.php">
						  <fieldset>
							 
							<?php
							$query444 = mysql_query("SELECT * FROM login where username='$user'")or die(mysql_error());
							while($query555=mysql_fetch_object($query444))
							{								
								$requestid=$query555->report;	
							}
							$requestid1=$requestid;
							$query66 = mysql_query("SELECT * FROM newrequest where requestid='$requestid1'")or die(mysql_error());
							while($query77=mysql_fetch_object($query66))
							{
								$customerid = $query77->customerid;
								$customername = $query77->customername;
								$contactnumber = $query77->contactnumber;;
								$address = $query77->address;
								echo'<div class="control-group">
								<label class="control-label">Customer ID</label>
								<div class="controls"><input type="hidden" name="requestid" value='.$query77->requestid.'>								  
									<label class="control-label"><input type="hidden" name="customerid" value="'.$customerid.'" ><b>'.$customerid.'</b></label>  								  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Customer Name</label>
								<div class="controls">								  
									<label class="control-label"><input type="hidden" name="customername" value="'. $customername.'"><b>'. $customername.'</b></label>	  								  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Contact Number</label>
								<div class="controls">								  
									<label class="control-label"><input type="hidden" name="contactnumber" value="'.$contactnumber.'"><b>'.$contactnumber.'</b></label>  								  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Address</label>
								<div class="controls">								  
									<label class="control-label"><input type="hidden" name="address" value="'.$address.'" ><b>'.$address.'</b></label>	  
								</div>
							  </div>';
							}


							?> 
							<div class="control-group">
								<label class="control-label">Summary</label>
								<div class="controls">								  
									<textarea  row="5" name="summary" placeholder="Summary"></textarea>	  
								</div>
							  </div>  
							<div class="control-group">
								<label class="control-label">Problem Description</label>
								<div class="controls">								  
									<textarea  row="5" name="description" placeholder="Problem Description"></textarea>	  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Mechanical Issues</label>
								<div class="controls">								  
									<textarea  row="5" name="mechanicalissues" placeholder="Mechanical Issues"></textarea>	  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Electrical Issues</label>
								<div class="controls">								  
									<textarea  row="5" name="electricalissues" placeholder="Electrical Issues"></textarea>	  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Other Issues</label>
								<div class="controls">								  
									<textarea  row="5" name="otherissues" placeholder="Other Issues"></textarea>	  
								</div>
							  </div>							  							  							   
							   <div class="control-group">
							  <label class="control-label" for="typeahead">Spare Parts Required</label>	  
								<div class="controls">
								  <select id="" data-rel="chosen" name="spare">
								  	<option></option>
									<option>YES</option>
									<option>NO</option>																
								  </select>
								</div>
							  </div>
							   <div class="control-group">
							  <label class="control-label" for="typeahead">Calibration Certificate</label>	  
								<div class="controls">
								  <select id="" data-rel="chosen" name="calibrationcertificate">
								  	<option></option>
									<option>Required</option>
									<option>Not Required</option>																
								  </select>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Engineer Comments</label>
								<div class="controls">								  
									<textarea  row="5" name="engineercomments" placeholder="Engineer Comments"></textarea>	  
								</div>
							  </div>
							 
							  
						  </fieldset>
						 

					</div>
				</div><!--/span-->
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Payments</h2>
						<div class="box-icon">
							<a href="servicereport.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">						
						  <fieldset class="form-horizontal">							 
							  <div class="control-group">
							  <label class="control-label" for="typeahead"><b>Payment Options</b></label>	  
								<div class="controls">								 
								  </div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Payment Status</label>	  
								<div class="controls">
								  <select id="" data-rel="chosen" name="paymentstatus">
								  	<option></option>
									<option>YES</option>
									<option>NO</option>																
								  </select>
								  </div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Total Amount</label>
								<div class="controls">								  
									<input type="text" name="totalamount" placeholder="Total Amount">	
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Payment Option</label>
								<div class="controls">
								<label class="radio">															  
									<input type="radio" name="paymentmethod" id="cheque" value="Cheque">Cheque											
								  </label>
								</div>
								<div class="controls">
								<label class="radio">								
									<input type="radio" name="paymentmethod" id="cash" value="Cash">Cash	
								  </label>
								</div>
								<div class="controls">
								<label class="radio">								
									<input type="radio" name="paymentmethod" id="dd" value="DD">DD	
								  </label>
								</div>							  
							  <div class="controls">
								<label class="radio">								
									<input type="radio" name="paymentmethod" id="netbanking" value="Net Banking">Net Banking	
								  </label>
								</div>
							  </div>
							  <div class="control-group" id="date">
								<label class="control-label">Date</label>
								<div class="controls">								  
									<input type="date" name="tdate"  placeholder="Date">	
								</div>
							  </div>
							   <div class="control-group" id="ddno">
								<label class="control-label">DD No</label>
								<div class="controls">								  
									<input type="text" name="ddno"  placeholder="DD No">	
								</div>
							  </div>
							  <div class="control-group" id="chequeno">
								<label class="control-label">Cheque No</label>
								<div class="controls">								  
									<input type="text" name="chequeno"  placeholder="Cheque No">	
								</div>
							  </div>
							  <div class="control-group" id="bankname">
								<label class="control-label">Bank Name</label>
								<div class="controls">								  
									<input type="text" name="bankname"  placeholder="Bank Name">	
								</div>
							  </div>
							  <div class="control-group" id="amount">
								<label class="control-label">Amount</label>
								<div class="controls">								  
									<input type="text" name="amount"  placeholder="Amount">	
								</div>
							  </div>
							  <div class="control-group" id="favouring">
								<label class="control-label">Favouring</label>
								<div class="controls">								  
									<input type="text" name="favouring"  placeholder="Favouring">	
								</div>
							  </div>
							  <div class="control-group" id="referenceno">
								<label class="control-label">Reference No</label>
								<div class="controls">								  
									<input type="text" name="referenceno"  placeholder="Reference No">	
								</div>
							  </div>								  
							  <div class="control-group" id="particulars">
								<label class="control-label">Particulars</label>
								<div class="controls">								  
									<textarea name="particulars" placeholder="Particulars"></textarea>	
								</div>
							  </div>
							   	<div class="control-group">
							  <label class="control-label" for="typeahead">Payment Option</label>
							  <div class="controls">
								  <select id="" data-rel="chosen" name="paymentoption">
								  	<option></option>
									<option>Full Payment</option>
									<option>Partial Payment</option>
									<option>Credit</option>																
								  </select><br>
								  							  
								</div>
							  </div>						  
							   <div class="control-group">
								<label class="control-label">Amount Received</label>
								<div class="controls">								  
									<input type="text" name="amountreceived" placeholder="Amount Received">	
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Balance Due</label>
								<div class="controls">								  
									<input type="text" name="amountbalance" placeholder="Balance Due">	
								</div>
							  </div>							   
							  						   
							  <div class="form-actions">							  
							  <button type="submit" class="btn btn-primary">Create Report</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
					</div>
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
