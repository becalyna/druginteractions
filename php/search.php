<?php

	// Make the database connection
	include("directoryConnect.php");

	// assign the GET or POST variable for searchterm
	$searchterm=$_REQUEST['searchterm'];

	$debugSet = $_REQUEST['debugSet'];
	
	// debug when I need it.
	if ($debugSet) {
		echo "searchterm passed <br>\n";
		print_r($searchterm);
		echo "\n\n";
	}

	$wild="%".$searchterm."%";
	
	//the database query			
	if ($searchterm) {
		$query = "SELECT drug_name FROM drug WHERE (drug_name like \"$wild\") order by drug_name";
		$result = mysql_query($query);

		// debug
		if ($debugSet) {
			echo "<br>The Result: ";
			print_r($result);
			echo "<br><br>\n\n";
		}
		
		if (mysql_num_rows($result) == 0) {
			echo ( "\nSorry, there was no matching record for \"$searchterm\".\n" ); 
		}	

		while($row = mysql_fetch_array($result)) {
			echo "<div class='drug'>";
			echo $row['drug_name'];
			echo "</div>\n";
		}
	}
?>	
