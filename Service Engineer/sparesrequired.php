<?php
include"library.php";
if(isset($_POST['deletes']))
{
	$sql = mysql_query("DELETE From engineermaster WHERE id = '{$_POST['id']}'");
	if($sql)
	{
		echo "success";
	}
}
if(isset($_POST['editvalue']))
{
	$sqll = "UPDATE login SET 
			report = '{$_POST['id']}'
			WHERE username = '$user'";
	$resl = mysql_query($sqll);
	$sql = "SELECT * FROM spares WHERE id = '{$_POST['id']}' ";
	$row = mysql_query($sql);
	$rows = mysql_fetch_object($row);
	header ("Content-type: text/x-json");
	echo json_encode($rows);
	exit();
}
if(isset($_POST['update']))
{
	date_default_timezone_set("Asia/Kolkata");
	$timed=date("h:i:sa");
	$dated=date("Y/m/d");
	$sqll = "UPDATE spares SET 			
			 productitem = '{$_POST['productitem']}',
			 quantity = '{$_POST['quantity']}', 
			 dated='$dated', 
			 timed='$timed'
			WHERE id = '{$_POST['id']}'";
	$resl = mysql_query($sqll);
	mysql_query("INSERT INTO notifications(sender, receiver, message, messagefor, dated, timed, status)Values('$user', 'manager', 'Spare Quotations Resend', 'sparesrequired', '$dated', '$timed', 'notopened')")or die(mysql_error());
	if($resl)
	{
		echo"success Update";
	}
	}
if(isset($_POST['showtable']))
{
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
								$requestid = $query77->requestid;								
								echo'<div class="control-group">
								<label class="control-label">Customer ID</label>
								<div class="controls"><input type="hidden"   name="id" value="'.$query77->id.'" >								  
									<label class="control-label" ><input type="hidden"  name="customerid" value="'.$customerid.'" ><b>'.$customerid.'</b></label>  								  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Customer Name</label>
								<div class="controls">								  
									<label class="control-label" ><input type="hidden"  name="customername" value="'. $customername.'"><b>'. $customername.'</b></label>	  								  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Contact Number</label>
								<div class="controls">								  
									<label class="control-label" ><input type="hidden"  name="requestid" value="'.$requestid.'"><b>'.$requestid.'</b></label>  								  
								</div>
							  </div>
							   ';
							}
							exit();
}
if(isset($_POST['showtable2']))
{
	$query444 = mysql_query("SELECT * FROM login where username='$user'")or die(mysql_error());
							while($query555=mysql_fetch_object($query444))
							{								
								$requestid=$query555->report;	
							}
							$requestid1=$requestid;
							$query66 = mysql_query("SELECT * FROM spares where id='$requestid1'")or die(mysql_error());
							while($query77=mysql_fetch_object($query66))
							{
								$customerid = $query77->customerid;
								$customername = $query77->customername;
								$requestid = $query77->requestid;								
								echo'<div class="control-group">
								<label class="control-label">Customer ID</label>
								<div class="controls"><input type="hidden"  name="id" value="'.$query77->id.'" >								  
									<label class="control-label" id="customerid"><input type="hidden"  name="customerid" value="'.$customerid.'" ><b>'.$customerid.'</b></label>  								  
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Customer Name</label>
								<div class="controls">								  
									<label class="control-label" id="customername"><input type="hidden"  name="customername" value="'. $customername.'"><b>'. $customername.'</b></label>	  								  
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Contact Number</label>
								<div class="controls">								  
									<label class="control-label" id="requestid"><input type="hidden"  name="requestid" value="'.$requestid.'"><b>'.$requestid.'</b></label>  								  
								</div>
							  </div>
							   ';
							}
							exit();
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
	 <script type="text/javascript">
  $(document).ready(function(){
$("#idd").click(function(){
    $('#table').append('<tr><td><div class="control-group"><label class="control-label">Item Required</label><div class="controls"><input type="text" name="productitem[]" placeholder="Itemname">&nbsp;&nbsp;&nbsp;<br><br><input type="number" name="quantity[]" placeholder="Quantity"></div></div></td></tr>');
});
  });

  </script>
<script type="text/javascript">
$(function(){
	showdata();
	$('#update').hide();
	$('#update').click(function(){
		var id = $('#id').val()-0;			
		var productitem = $('#productitem').val();
		var quantity = $('#quantity').val();
		$.ajax({
			url   :   "sparesrequired.php",
			type  :   "POST",
			async :  false,
			data  : {

				update    : 1,
				id     :  id,				
				productitem   :   productitem,
				quantity   :   quantity
			},
			success : function(up)
			{
				window.location="sparesrequired.php";
			}
		});
	});
	
	$('body').delegate('.edit', 'click',function(){
		$('#idd').hide();
		$('#send').hide();
		$('#update').show();		
		var IdEdit = $(this).attr('rep');
		$.ajax({
			url   :   "sparesrequired.php",
			type  :   "POST",
			datatype : "JSON",
			data  : {
						editvalue  : 1,
						id         : IdEdit
			},
			success : function(show)
			{	
				$('#id').val(show.id);			
				$('#customername').val(show.customername);
				$('#customerid').val(show.customerid);
				$('#requestid').val(show.requestid);
				$('#productitem').val(show.productitem);
				$('#quantity').val(show.quantity);

			}
		});
	});
	
});
function showdata()
{
	$.ajax({
		url   :   "sparesrequired.php",
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
function showdata2()
{
	$.ajax({
		url   :   "sparesrequired.php",
		type  :  "POST",
		async :  false,
		data  :  {
					showtable2  :  1 
				},
		success : function(re){
			$('#showdata').hide();
			$('#showdata2').html(re);
		}
	});
}
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
						<li><a href="viewreports.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Service Reports</span></a></li>
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
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Service Engineer</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span5">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Spares Required</h2>
						<div class="box-icon">
							<a href="sparesrequired.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="updaterequiredspares.php">
						  <fieldset>
							 <div class="box-content">
							 	<div id="showdata">


							 	</div>
							 	<div id="showdata2">


							 	</div>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead"><b>Spare Requirements</b></label>	  
								<div class="controls">								 
								</div>
							  </div>
							  <table id="table" border="0">
							   <tr><td><div class="control-group">
								<label class="control-label">Item Required & Quantity</label>
								<div class="controls">
								<input type="hidden" id="id">								  
									<input type="text" name="productitem[]" id="productitem" placeholder="Itemname">&nbsp;&nbsp;&nbsp;<br><br><input type="number" id="quantity" name="quantity[]" placeholder="Quantity">
								</div>
							  </div></td></tr>							  
							  </table>
							  <div class="control-group">
								<label class="control-label"></label>								
							  </div>					
							  <div class="">
							  <a class="btn btn-primary" id="idd">Add Item</a><a class="btn btn-primary" id="update">Update</a>
							  <button type="submit" id="send" class="btn btn-primary">Send Requirements</button>
							  
							</div>
						           
					
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				<div class="box span7">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Spare Required Requests</h2>
						<div class="box-icon">
							<a href="sparesrequired.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="updaterequiredspares.php">
						  <fieldset>
							 <div class="box-content">
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>							  
							  		<th>S.No</i></th>	
							  		 <th>Date/Time</i></th>								 				
								  <th>Reques ID</i></th>							 								 
								  <th>Customer ID</i></th>
								   <th>Item Name</i></th>
								    <th>Quantity</i></th>
								     <th>Customer ID</i></th>
							  </tr>
						  </thead>
						   <tbody id="table">   
						<?php
						
						$s=1;						
						$query1 = mysql_query("SELECT * FROM spares where engineerid='$user' ORDER BY id DESC")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							$ss = $s++;
							echo'<tr>
								<td>'.$ss.'</td>
								<td class="center">'.$query2->dated.'<br>'.$query2->timed.'</td>																
								<td class="center">'.$query2->requestid.'</td>		
								<td class="center">'.$query2->customerid.'</td>	
								<td class="center">'.$query2->productitem.'</td>
								<td class="center">'.$query2->quantity.'</td>					
								<td class="center">
								<a rep='.$query2->id.' id="edit"  class="edit btn btn-primary btn-small" href="#?id='.$query2->requestid.'">Edit</a>
									
								</td>
								
							</tr>';

						}
						?>
						 </tbody>
					  </table> 
						           
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
