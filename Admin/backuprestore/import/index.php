<?php
set_time_limit ( 0 );

   //Upload File 
    if (isset($_POST['submit'])) { 
       if (is_uploaded_file($_FILES['filename']['tmp_name'])) { 
    if (move_uploaded_file($_FILES['filename']['tmp_name'], $_FILES['filename']['name'])) {



include("location:../../library.php");
$table_name = "items";

$backup_file = $_FILES['filename']['name'];

if(!file_exists($backup_file)){
    echo "File Not Exists";
}

$sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

mysql_select_db('MM_db');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not load data : ' . mysql_error());
}
echo "Loaded  data successfully\n";
mysql_close($conn);
fclose($handle); 
     }
     ?>
     <script>
     alert('Items Uploaded Successfully');
     </script>
     <?php  
exit();
       }
    }
 header("location:../../backuprestore.php");
?>
