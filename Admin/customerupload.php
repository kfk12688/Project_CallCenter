<?php
include "library.php";

$deleterecords = "TRUNCATE TABLE customermaster"; //empty the table of its current records
mysql_query($deleterecords);
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
        echo "<h2>Displaying contents:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }

    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into customermaster(id,customerid,customername,address,contactnumber,emailid) values('','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";

        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM customermaster where id='1'" )or die(mysql_error());
    }

    fclose($handle);

    print "Import done";

  
  header("location:customermaster.php");  //view upload form
?>
