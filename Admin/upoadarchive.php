<?php

$table=$_POST['restorearchive'];
if($table == 'customermaster')
{
    include "library.php";

    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
        echo "<h2>Displaying contents:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }

    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into customermaster(id,customerid,customername,address,contactnumber,emailid) values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";

        mysql_query($import) or die(mysql_error());
        mysql_query("DELETE FROM customermaster where id='id'" )or die(mysql_error());
    }

    fclose($handle);

    print "Import done";

  
  header("location:archivedata.php");  //view upload form
}
else if($table == 'engineermaster')
{
    header("location:engineerarchive.php");
}
else if($table == 'productmaster')
{
    header("location:productarchive.php");
}
else if($table == 'sparemaster')
{
    header("location:sparearchive.php");
}
else if($table == 'requests')
{
    header("location:requestarchive.php");
}
else{
    echo"error";
}

?>


