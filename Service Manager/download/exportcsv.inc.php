<?php
$dates = date("Y/m/d");

function exportMysqlToCsv($table,$filename = "requests.csv")
{
	$csv_terminated = "\n";
	$csv_separator = ",";
	$csv_enclosed = '"';
	$csv_escaped = "\\";
	$sql_query = "select * from $table";
 
	// Gets the data from the database
	$result = mysql_query($sql_query);
	$fields_cnt = mysql_num_fields($result);
 
 
	$schema_insert = '';
 
	for ($i = 0; $i < $fields_cnt; $i++)
	{
		$l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
			stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
	} // end for
 
	$out = trim(substr($schema_insert, 0, -1));
	$out .= $csv_terminated;
 
	// Format the data
	while ($row = mysql_fetch_array($result))
	{
		$schema_insert = '';
		for ($j = 0; $j < $fields_cnt; $j++)
		{
			if ($row[$j] == '0' || $row[$j] != '')
			{
 
				if ($csv_enclosed == '')
				{
					$schema_insert .= $row[$j];
				} else
				{
					$schema_insert .= $csv_enclosed .
					str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
				}
			} else
			{
				$schema_insert .= '';
			}
 
			if ($j < $fields_cnt - 1)
			{
				$schema_insert .= $csv_separator;
			}
		} // end for
 
		$out .= $schema_insert;
		$out .= $csv_terminated;
	} // end while
 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Length: " . strlen($out));
	// Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=$filename");
	echo $out;
	
 $deleterecords = "TRUNCATE TABLE downloadrequest"; //empty the table of its current records
 mysql_query($deleterecords);
 $query1 = mysql_query("SELECT * FROM newrequest where download='YES'")or die(mysql_error());
 while($query2 = mysql_fetch_object($query1))
 {
 	$id = $query2->id;
 	$download=$query2->download;
 	mysql_query("UPDATE newrequest SET download= 'NO' where id='$id'")or die(mysql_error());
 }
 header("../viewrequest.php");
 exit;
	
}
?>
