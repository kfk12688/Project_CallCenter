<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("../library.php");
?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$("#hide").click(function(){
		$('#hide').hide();
		$('#hide1').hide();
		window.print();
	});
	});
	</script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <textarea id="address">
            	Company
            	Coimbatore
            	Phone No:0422-526984</textarea>

            <div id="logo">            

             
              
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">Customer Address
</textarea>

            <table id="meta">
            	<tr>
                    <td class="meta-head">Customer Id</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due  INR</td>
                    <td><div class="due"></div></td>
                </tr>

            </table>
		
		</div>
		<form method="POST" action="../updatesparesrequired.php">
		<table id="items">
		
		  <tr>
		  
		      <th>Item Name</th>
		      <th>Product Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  <?php
		  $query22=mysql_query("SELECT * FROM login where username='$user'")or die(mysql_error());
		  while($query33=mysql_fetch_object($query22))
		  {
		  	$invoice=$query33->invoice;
		  	$user=$query33->user;
		  }
		  $invoices=$invoice;
		  $query=mysql_query("SELECT * FROM spares where id='$invoices'")or die (mysql_error());
		  while($query1=mysql_fetch_object($query))
		  {
		  	$id=$query1->id;
		  	$requestid=$query1->requestid;
		  	$engineerid=$query1->engineerid;
		  	$productitem1=$query1->productitem1;
		  	$quantity1=$query1->quantity1;
		  	$productitem2=$query1->productitem2;
		  	$quantity2=$query1->quantity2;
		  	$productitem3=$query1->productitem3;
		  	$quantity3=$query1->quantity3;
		  	$productitem4=$query1->productitem4;
		  	$quantity4=$query1->quantity4;
		  	$productitem5=$query1->productitem5;
		  	$quantity5=$query1->quantity5;
		  	$productitem6=$query1->productitem6;
		  	$quantity6=$query1->quantity6;
		  }
		  ?>
		  <tr class="item-row">
				
				<input type="hidden" name="engineerid" value="<?php echo $engineerid; ?>">
		      <td class="item-name"><input type="hidden" name="requestid" value="<?php echo $requestid; ?>"><div class="delete-wpr"><input type="hidden" name="id" value="<?php echo $id; ?>"><textarea ><?php echo $productitem1; ?></textarea></div></td>
		      <td class="description"><textarea  name="description1"></textarea></td>
		      <td><textarea class="cost"  name="unitcost1"></textarea></td>
		      <td><textarea class="qty" ><?php echo $quantity1;?></textarea></td>
		      <td><span class="price" name="price1"></span></td>
		  </tr>

		   <tr class="item-row">
		   
		      <td class="item-name"><div class="delete-wpr"><textarea><?php echo $productitem2; ?></textarea></div></td>
		      <td class="description"><textarea  name="description2"></textarea></td>
		      <td><textarea class="cost"  name="unitcost2"></textarea></td>
		      <td><textarea class="qty" ><?php echo $quantity2;?></textarea></td>
		      <td><span class="price" name="price2"></span></td>
		  </tr>
		   <tr class="item-row">
		 
		      <td class="item-name"><div class="delete-wpr"><textarea ><?php echo $productitem3; ?></textarea></div></td>
		      <td class="description"><textarea  name="description3"></textarea></td>
		      <td><textarea class="cost"  name="unitcost3"></textarea></td>
		      <td><textarea class="qty" ><?php echo $quantity3;?></textarea></td>
		      <td><span class="price" name="price3"></span></td>
		  </tr>
		   <tr class="item-row">
		
		      <td class="item-name"><div class="delete-wpr"><textarea ><?php echo $productitem4; ?></textarea></div></td>
		      <td class="description"><textarea  name="description4"></textarea></td>
		      <td><textarea class="cost"  name="unitcost4"></textarea></td>
		      <td><textarea class="qty" ><?php echo $quantity4;?></textarea></td>
		      <td><span class="price" name="price4"></span></td>
		  </tr>
		   <tr class="item-row">
	
		      <td class="item-name"><div class="delete-wpr"><textarea ><?php echo $productitem5; ?></textarea></div></td>
		      <td class="description"><textarea  name="description5"></textarea></td>
		      <td><textarea class="cost"  name="unitcost5"></textarea></td>
		      <td><textarea class="qty" ><?php echo $quantity5;?></textarea></td>
		      <td><span class="price" name="price5"></span></td>
		  </tr>	 
		   <tr class="item-row">

		      <td class="item-name"><div class="delete-wpr"><textarea ><?php echo $productitem6; ?></textarea></div></td>
		      <td class="description"><textarea  name="description6"></textarea></td>
		      <td><textarea class="cost"  name="unitcost6"></textarea></td>
		      <td><textarea class="qty" ><?php echo $quantity6;?></textarea></td>
		      <td><span class="price" name="price6"></span></td>
		  </tr>	 
		 
		  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal&nbsp;&nbsp;&nbsp;INR</td>
		      <td class="total-value"><div id="subtotal"></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total&nbsp;&nbsp;&nbsp;INR</td>
		      <td class="total-value"><div id="total"></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid&nbsp;&nbsp;&nbsp;INR</td>

		      <td class="total-value"><textarea id="paid"></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due&nbsp;&nbsp;&nbsp;INR</td>
		      <td class="total-value balance"><div class="due"></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5></h5>
		 
		</div>
	
	</div>
	
<input type="button" value="Print Invoice" id="hide"  /><input type="submit" id="hide1" value="SEND" />
</form>
</body>

</html>