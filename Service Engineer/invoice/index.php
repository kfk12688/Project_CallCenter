<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("../library.php");
 function vat($price,$vat=17.5) {
    $price_with_vat=0;
    $price_with_vat = $price + ($vat*($price/100));
    $price_with_vat = round($price_with_vat, 2);
    return $price_with_vat;
}
?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>&nbsp;</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#total").hide();
	$("#hide").click(function(){
		$('#hide').hide();
		$('#hide1').hide();
		$("#total").hide();
		window.print();
	});
	});
	</script>

</head>

<body>
<?php
            	$qq=mysql_query("SELECT * FROM style where id='1'")or die(mysql_error());
            	while($aa=mysql_fetch_object($qq))
            	{
            		$tin=$aa->tin;
            		$cst=$aa->cst;
            	}
            	?>
	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            

           <div id="">             

              
              <div id="">
              	<img id="" src="images/logo.png" alt="logo" />
            	</div>
            	<textarea id="address">
            	Company Name
            	Coimbatore
            	Phone No:0422-526984
            	

            </textarea><br>
            <br><br><br>
            	<br>
            	
             
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             Shipment TO<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea id="" Placeholder="Customer Address" col="5" row="5">
			</textarea>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea id="" Placeholder="Customer Address" col="5" row="5">
			</textarea>

            <table id="meta">
            	<tr>
                    <td class="meta-head">TIN Number</td>
                    <td><textarea> <?php echo $tin; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">CST Number</td>
                    <td><textarea><?php echo $cst; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Payment Mode</td>
                    <td><textarea></textarea></td>
                </tr>
            	<tr>
                    <td class="meta-head">Customer Id</td>
                    <td><textarea><?php echo $customerid; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>                

            </table>
		
		</div>
		<form method="POST" action="">
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
		  }
		  $invoices=$invoice;

		  $query=mysql_query("SELECT * FROM spares where requestid='$invoices'")or die (mysql_error());
		  while($query1=mysql_fetch_object($query))
		  {
		  	$id=$query1->id;
		  	$engineerid=$query1->engineerid;
		  	$customerid=$query1->customerid;
		  	echo'<tr class="item-row">	
		      <td class="item-name"><div class="delete-wpr"><input type="hidden" name="id" value="<?php echo $id; ?>">
		      <textarea >'.$query1->productitem.'</textarea></div></td>
		      <td class="description"><textarea  name="description1"></textarea></td>
		      <td><textarea class="cost"  name="unitcost">'. $query1->unitcost.'</textarea></td>
		      <td><textarea class="qty" >'. $query1->quantity.'</textarea></td>
		      <td><span class="price" name="price1"></span></td>
		  </tr>';
		  	
		  }
		  
		   	$amountpaid=$_POST['amountpaid'];
		  	$balancedue=$_POST['balancedue'];		  	
		  	mysql_query("UPDATE newrequest SET amountpaid='$amountpaid', balancedue='$balancedue' where requestid='$invoices'")or die(mysql_error());
		  	mysql_query("UPDATE login SET invoice='' where username='$user'")or die(mysql_error());

		  
		
		  ?>
		   <tr class="item-row">	
		      <td class="item-name"><div class="delete-wpr"><input type="hidden" name="id" value="">
		      <textarea ></textarea></div></td>
		      <td class="description"><textarea  name="description1"></textarea></td>
		      <td><textarea class="cost"  name="unitcost"></textarea></td>
		      <td><textarea class="qty" ></textarea></td>
		      <td><span class="price" name="price1"></span></td>
		  </tr>
		 
		  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal&nbsp;&nbsp;&nbsp;</td>
		      <td class="total-value"><div id="subtotal"></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance" >VAT&nbsp;&nbsp;&nbsp;5%</td>
		      <td class="total-value balance"><textarea class="tax"></textarea></td>
		  </tr>
		   
		   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance" >Total &nbsp;&nbsp;&nbsp;</td>
		      <td class="total-value balance"><textarea class="due" name="balancedue"></textarea></td>
		  </tr>	  
		  
		  
		 
		
		</table>
		<div id="total"></div><input type="hidden" id="paid" name="amountpaid"><br>Terms And Conditions<br><br>
		
		Customer Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Engineer Signature<div id="terms"><input type="button" value="Print Invoice" id="hide"  />
		  <h5></h5>
		 
		</div>
	
	</div>
	


</form>
</body>

</html>