<?php
include "library.php";
$table=$_POST['restorearchive'];
if($table == 'Customer Master')
{ 
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        readfile($_FILES['filename']['tmp_name']);
    }
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into customermaster(id,customerid,customername,address,contactnumber,emailid) values('','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM customermaster where customerid='customerid'" )or die(mysql_error());
    }
    fclose($handle);  
    echo '<script type="text/javascript">alert("Data Restored Successfully"); window.location="archivedata.php"</script>'; 
}
else if($table == 'Engineer Master')
{
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
          readfile($_FILES['filename']['tmp_name']);
    }
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into engineermaster(id,engineerid,engineername,position,contactnumber,emailid) 
        values('','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM engineermaster where engineerid='engineerid'" )or die(mysql_error());
    }
    fclose($handle);  
    echo '<script type="text/javascript"> window.location="archivedata.php";alert("Data Restored successfully");</script>'; 
}
else if($table == 'Product Master')
{
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
          readfile($_FILES['filename']['tmp_name']);
    }
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into productmaster(id,productid,productname,producttype,category,series) 
        values('','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM productmaster where productid='productid'" )or die(mysql_error());
    }
    fclose($handle);  
    echo '<script type="text/javascript"> window.location="archivedata.php";alert("Data Restored successfully");</script>'; 
}
else if($table == 'Spare Master')
{
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
          readfile($_FILES['filename']['tmp_name']);
    }
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into sparemaster(id,spareid, sparetype, sparename) 
        values('','$data[1]','$data[2]','$data[3]')";
        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM sparemaster where spareid='spareid'" )or die(mysql_error());
    }
    fclose($handle);  
    echo '<script type="text/javascript"> window.location="archivedata.php";alert("Data Restored successfully");</script>'; 
}
else if($table == 'Requests')
{
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
          readfile($_FILES['filename']['tmp_name']);
    }
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into newrequest(id, customerid, customername,  contactnumber, address, productid, productname, producttype, modelnumber, serialnumber,warrentytype, requestid, dated, timed, summary, servicetype, description) 
        values('','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]')";
        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM newrequest where customerid='customerid'" )or die(mysql_error());
    }
    fclose($handle);  
    echo '<script type="text/javascript"> window.location="archivedata.php";alert("Data Restored successfully");</script>'; 
}
else{
echo '<script type="text/javascript"> window.location="archivedata.php";alert("Error In Data Restoring");</script>'; 
}

?>


