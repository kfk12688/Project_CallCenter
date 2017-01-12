<?php
include("library.php");

$qq=mysql_query("SELECT * FROM engineermaster")or die(mysql_error());
while($aa = mysql_fetch_object($qq))
{
	$engineerid=$aa->engineerid;
}
$oldids=$engineerid;
$lastId = $oldids;
$letter = $lastId[0].$lastId[1].$lastId[2];
$number = $lastId[3].$lastId[4].$lastId[5];
if ($number < 999) {
    $newId = $letter.sprintf("%03d", $number+1);
} else {
    $ascii = ord($letter);
    $newLetter = chr($ascii+1);
    $newId = $newLetter.'001';
}

if(isset($_POST['buttonsave']))
{
	$sql = "INSERT INTO login(username, password, accounttype)
	VALUES('{$_POST['id']}', '{$_POST['password']}', 'engineer')";
	$result = mysql_query($sql);
	$sql = "INSERT INTO engineermaster(engineername, engineerid, contactnumber, emailid, rangefrom, rangeto)
	VALUES('{$_POST['name']}', '{$_POST['id']}', '{$_POST['contactnumber']}', '{$_POST['emailid']}', '{$_POST['rangefrom']}', '{$_POST['rangeto']}' )";
	$result = mysql_query($sql);
	if($result)
	{
		echo "Successfully Insert";
	}
	exit();
}
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
	$sql = "SELECT * FROM engineermaster WHERE id = '{$_POST['id']}' ";
	$row = mysql_query($sql);
	$rows = mysql_fetch_object($row);
	header ("Content-type: text/x-json");
	echo json_encode($rows);
	exit();
}
if(isset($_POST['update']))
{

	$sqll = "UPDATE engineermaster SET 
			engineername = '{$_POST['name']}', 
			emailid = '{$_POST['emailid']}', 
			contactnumber = '{$_POST['contactnumber']}',
			 rangefrom = '{$_POST['rangefrom']}',
			 rangeto = '{$_POST['rangeto']}'
			WHERE id = '{$_POST['id']}'";
	$resl = mysql_query($sqll);
	if($resl)
	{
		echo"success Update";
	}
	}
if(isset($_POST['showtable']))
{
	$sql = "SELECT * From engineermaster";
	$result = mysql_query($sql);
	while($row = mysql_fetch_object($result))
	{
		echo'<tr>
			<td class="center">'.$row->engineerid.'</td>
			<td class="center">'.$row->engineername.'</td>
			<td class="center">'.$row->emailid.'</td>
			<td class="center">'.$row->contactnumber.'</td>
			<td class="center">'.$row->rangefrom.'-'.$row->rangeto.'</td>
			<td class="center">									
				<a ide='.$row->id.' class="edit btn btn-info btn-small" href="#?id='.$row->id.'"><i class="icon-edit"></i></a>									
				<a idd='.$row->id.' class="delete btn btn-danger btn-small" href="#?id='.$row->id.'"><i class="icon-remove"></i></a>
			</td>
		</tr>	';
	}
	exit(); 
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
	showdata();
	$('#update').hide();
	$('#update').click(function(){
		var id = $('#id').val()-0;
		var name = $('#name').val();
		var emailid = $('#emailid').val();
		var contactnumber = $('#contactnumber').val();
		var rangefrom = $('#rangefrom').val();
		var rangeto = $('#rangeto').val();
		$.ajax({
			url   :   "usermanagement.php",
			type  :   "POST",
			async :  false,
			data  : {

				update    : 1,
				id     :  id,
				name  :  name,
				emailid  : emailid,
				contactnumber  : contactnumber,
				rangefrom   :   rangefrom,
				rangeto   :   rangeto
			},
			success : function(up)
			{
				 $("form")[0].reset();
				$('#save').show();
				$('#1').show();
				$('#2').show();
				$('#3').show();
				$('#update').hide();
				showdata();
			}
		});
	});
	$('body').delegate('.delete', 'click',function(){
		var IdDelete = $(this).attr('idd');
		var test = window.confirm(" Do You Want To Delete ");
		if(test)
		{
			$.ajax({
					url   :  "usermanagement.php",
					type  :  "POST",
					async : false,
					data : {
						deletes  : 1,
						id       :  IdDelete
					},
					success : function()
					{
						alert("Success Delete");
						showdata();
					}			
				});
		}
	});
	$('body').delegate('.edit', 'click',function(){
		$('#save').hide();
		$('#update').show();
		$('#1').hide();
		$('#2').hide();
		$('#3').hide();
		var IdEdit = $(this).attr('ide');
		$.ajax({
			url   :   "usermanagement.php",
			type  :   "POST",
			datatype : "JSON",
			data  : {
						editvalue  : 1,
						id         : IdEdit
			},
			success : function(show)
			{	
				$('#id').val(show.id);			
				$('#name').val(show.engineername);
				$('#emailid').val(show.emailid);
				$('#contactnumber').val(show.contactnumber);
				$('#rangefrom').val(show.rangefrom);
				$('#rangeto').val(show.rangeto);

			}
		});
	});
	$('#save').click(function(){
	var id = $('#id').val();
	var name = $('#name').val();
	var emailid = $('#emailid').val();
	var contactnumber = $('#contactnumber').val();
	var password = $('#password').val();
	var cpassword = $('#cpassword').val();
	var rangefrom = $('#rangefrom').val();
	var rangeto = $('#rangeto').val();
	if(name == '' || emailid == '' || contactnumber =='' || password =='' || cpassword =='')
	{
		alert("Enter All the Fields");
		return false;
	}
	else if(password != cpassword)
	{
		alert("Passwords Dosent Match");
		return false;
	}
	$.ajax({
		url   :  "usermanagement.php",
		type  :  "POST",
		async :  false,
		data  :{
			buttonsave  :  1,
			id   : id,
			name :  name,
			emailid      :  emailid,
			contactnumber       :  contactnumber,
			password  : password,
			rangefrom   :   rangefrom,
				rangeto   :   rangeto
		},
		success :function(result)
		{
			showdata();
		}
	});
});
});
function showdata()
{
	$.ajax({
		url   :   "usermanagement.php",
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
								&nbsp;&nbsp;<i class="halflings-icon white user"></i> Admin
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
						<li><a href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>						
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">  Data Management</span></a>
							<ul>
								<li><a class="submenu" href="customermanagement.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Customer Management</span></a></li>
								<li><a class="submenu" href="usermanagement.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Engineer Management</span></a></li>
								<li><a class="submenu" href="sparemanagement.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Spare Management</span></a></li>
								<li><a class="submenu" href="productmanagement.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Product Management</span></a></li>
							</ul>	
						</li>						
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Master Data</span></a>
							<ul>
								<li><a class="submenu" href="customermaster.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Customer Master</span></a></li>
								<li><a class="submenu" href="sparemaster.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Spare Master</span></a></li>
								<li><a class="submenu" href="productmaster.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Product Master</span></a></li>
								<li><a class="submenu" href="engineermaster.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Engineer Master</span></a></li>
							</ul>	
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
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Payment Reports </span></a>
							<ul>
								<li><a class="submenu" href="paymentpendings.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Payment Pendings </span></a></li>
								<li><a class="submenu" href="chequepayments.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Cheque Payments </span></a></li>
								<li><a class="submenu" href="ddpayments.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> DD Payments </span></a></li>
								<li><a class="submenu" href="cashpayments.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Cash Payments </span></a></li>
								<li><a class="submenu" href="netbankings.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Net Bankings </span></a></li>
							</ul>	
						</li>
						<li><a href="backuprestore.php"><i class="icon-edit"></i><span class="hidden-tablet"> Backup / Restore Data</span></a></li>
						<li><a href="archivedata.php"><i class="icon-font"></i><span class="hidden-tablet"> Archive Data</span></a></li>
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
					<a href="#">Engineer Management</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
			<div class="box span5">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create New Engineer</h2>
						<div class="box-icon">
							<a href="usermanagement.php" ><i class="halflings-icon refresh"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
						  	<div class="control-group" id="1">
							  <label class="control-label" for="typeahead">ID</label>	  
								<div class="controls">
								 <input type="hidden" name="id" id="id" value="<?php echo $newId; ?>">
								  <span class="uneditable-input"><?php echo $newId; ?></span>
								</div>
							  </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name</label>	  
								<div class="controls">
								 <input type="text" name="name" id="name" placeholder="Name" >
								</div>
							  </div>							  
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Email Id</label>	  
								<div class="controls">
								 <input type="text" name="emailid" id="emailid" placeholder="Email Id" >
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Contact Number</label>	  
								<div class="controls">
								 <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" >
								</div>
							  </div>							  
							   <div class="control-group" id="2">
							  <label class="control-label" for="typeahead">Password</label>	  
								<div class="controls">
								 <input type="password" name="password" id="password" placeholder="Password">
								</div>
							  </div>
							   <div class="control-group" id="3">
							  <label class="control-label" for="typeahead">Confirm Password</label>	  
								<div class="controls">
								 <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
								</div>
							  </div>
							   <div class="control-group" id="4">
							  <label class="control-label" for="typeahead">Report Range</label>	  
								<div class="controls">
								 <input type="number" style="width: 80px;" name="rangefrom" id="rangefrom" placeholder="From">-
								  <input type="number" style="width: 80px;" name="rangeto" id="rangeto" placeholder="To">
								</div>
							  </div>							   							  						
							<div class="form-actions">
							  <a name="save" id="save" class="btn btn-primary">Create User</a>
							   <a name="update" id="update" class="btn btn-primary">Update</a>
							 <input type="reset" class="btn" value="Cancel">
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				<div class="box span7">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Engineer Details</h2>
						<div class="box-icon">
							<a href="usermanagement.php" ><i class="halflings-icon refresh"></i></a>
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
								  <th>Engineer ID</th>									  
								  <th>Engineer Name</th>							 
								  <th>Email ID</th>
								   <th>Contact Number</th>
								   <th>Report Range</th>
								  <th>Option</th>
							  </tr>
						  </thead>   
						  <tbody id="showdata">
													
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
