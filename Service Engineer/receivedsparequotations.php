<?php
include"library.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
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
		<script type='text/javascript' src='js/example.js'></script>
	<script type="text/JavaScript">
	$(function(){
	$("#total").hide();
		$('html').delegate('#invoice', 'click',function(){	

		var IdEdit1 = $(this).attr('idg');		
		 var UrlToPass = 'action=invoice&assign='+IdEdit1;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){ 
                	 window.location = 'receivedsparequotations.php';
                }                           
                else{
                    alert('Problem with sql query');
                }
            }
            });
        });	
		
});
    
	

	</script>
		
		
		<style type="text/css">
	.scroll
	{
		width: 1100px;  
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
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Spare Requirements</h2>
						<div class="box-icon">
							<a href="receivedsparequotations.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">
						  <fieldset>							
							 <div class="box-content">
							 <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>							  
							  		<th>S.No&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>					
								  <th>Reques ID&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>								 
								  <th>Date&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>
								  <th>Time&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>								 
								  <th>Report&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>
							  </tr>
						  </thead>
						   <tbody>   
						<?php
						$s=1;						
						$query1 = mysql_query("SELECT * FROM temp where invoice='NO' And engineersid='$user'")or die(mysql_error());
						while($query2 = mysql_fetch_object($query1))
						{
							$requestid = $query2->requestid;													
							$ss = $s++;
							echo'<tr>
								<td>'.$ss.'</td>								
								<td class="center"><a ide='.$query2->requestid.' id="edit" class="edit" href="#?id='.$query2->id.'">'.$query2->requestid.'</a></td>								
								<td class="center">'.$query2->dated.'</td>
								<td class="center">'.$query2->timed.'</td>								
								<td class="center">
									<a idg='.$query2->requestid.' id="invoice" class="edit222 btn btn-primary" href="#?id='.$query2->id.'">View Spare Quotations</a>
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
				
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Quotations</h2>
						<div class="box-icon">
							<a href="receivedsparequotations.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="invoice/index.php">
						  <fieldset>							
							   <div class="box-content">
							   	<div class="scroll">
							 <table class="table table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>		
							  <th>S.No&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>						  							
								  <th>Item Name&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>						 
								 
								  <th>Quantity&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>								 
								  <th>Unit Price&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>
								  <th>Price&nbsp;&nbsp;&nbsp;<i class="icon-caret-down"></i></th>
							  </tr>
						  </thead>
						   <tbody>   
						 <?php
		  $s=1;	
		  $query22=mysql_query("SELECT * FROM login where username='$user'")or die(mysql_error());
		  while($query33=mysql_fetch_object($query22))
		  {
		  	$invoice=$query33->invoice;
		  }
		  $invoices=$invoice;

		  $query=mysql_query("SELECT * FROM spares where requestid='$invoices'")or die (mysql_error());
		  while($query1=mysql_fetch_object($query))
		  {
		  	$id=$query1->id;
		  	$engineerid=$query1->engineerid;
		  	$ss = $s++;
							
									
		  	echo'<tr class="item-row">	<td>'.$ss.'</td>
		      <td class="item-name"><div class="delete-wpr"><input type="hidden" name="id" value="'. $id.'">
		      <textarea>'.$query1->productitem.'</textarea></div></td>	
		      <td><textarea class="qty" >'. $query1->quantity.'</textarea></td>	      
		      <td><textarea class="cost"  name="unitcost">'. $query1->unitcost.'</textarea></td>
		      
		      <td><span class="price" name="price1"></span></td>
		  </tr>';
		}
		   echo'<tr>
		   <td colspan="3" class="blank"></td>		      
		      <td colspan="1" class="total-line">Subtotal&nbsp;&nbsp;&nbsp;</td>
		      <td class="total-value"><div id="subtotal"></div></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"></td>
		      <td colspan="1" class="total-line balance" >VAT&nbsp;&nbsp;&nbsp;5%</td>
		      <td class="total-value balance"><div class="tax" name="tax"></div></td>
		  </tr>		   
		   <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line balance" >Total Amount</td>
		      <td class="total-value balance"><div class="due" name="balancedue"></div></td>
		  </tr>	  
		  	 
		 ';
		  	echo'<div id="total"></div><input type="hidden" id="paid" name="amountpaid">';
		  
		  ?>
						 </tbody>
					  </table>      
					</div>
						           
					</div>	
					<a class="btn btn-info" href="invoice/index.php">Generate Spare Invoice</a>&nbsp;&nbsp;<a class="btn btn-info" href="invoice/index2.php">Generate Invoice</a>		
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
