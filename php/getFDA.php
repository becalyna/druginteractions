<?php

	// Make the database connection
	include("directoryConnect.php");

	// assign the GET or POST variable for searchterm
	$fda_status = $_REQUEST['fda_status'];

	$debugSet = $_REQUEST['debugSet'];
	
	// debug when I need it.
	if ($debugSet) {
		echo "fda_status passed <br>\n";
		print_r($fda_status);
		echo "\n\n";
	}

	//the database query			
	if ($fda_status) {
		$query = "SELECT drug.drug_id, drug.drug_name, enzyme_action.fda_status
					FROM drug, enzyme_action
					WHERE drug.drug_id = enzyme_action.drug_id
					AND fda_status = $fda_status";

		// debug
		if ($debugSet) {
			echo "<br>The Query: <br>";
			echo $query . "<br><br>\n\n";
		}

		$result = mysql_query($query);

		// debug
		if ($debugSet) {
			echo "<br>The Result: <br>";
			print_r($result);
			echo "<br><br>\n\n";
		}
		
		if (mysql_num_rows($result) == 0) {
			echo ( "\nSorry, there was no matching record for fda_status with id \"$fda_status\".\n" ); 
		}	

		while($row = mysql_fetch_array($result)) {
			echo "<div class='drugInfo'>\n";
			echo "\t<div class='name'>";
			echo $row['drug_name'];
			echo "</div>\n";
			echo "</div>\n";
		}
	}
?>	