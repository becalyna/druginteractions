<?php

	// Make the database connection
	include("directoryConnect.php");

	// assign the GET or POST variable for searchterm
	$strength = $_REQUEST['strength'];

	$debugSet = $_REQUEST['debugSet'];
	
	// debug when I need it.
	if ($debugSet) {
		echo "strength passed <br>\n";
		print_r($strength);
		echo "\n\n";
	}

	//the database query			
	if ($strength) {
		$query = "SELECT drug.drug_id, action_id, drug_name, strength
					FROM drug, enzyme, enzyme_action 
					WHERE drug.drug_id = enzyme_action.drug_id
					AND enzyme.enzyme_id = enzyme_action.enzyme_id
					AND enzyme_action.strength = '$strength'";

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
			echo ( "\nSorry, there was no matching record for drug with id \"$drug_id\".\n" ); 
		}	

		// debug
		if ($debugSet) {
			echo "<br>The Result: <br>";
			print_r($result);
			echo "<br><br>\n\n";
		}

		echo "<div class='description'>" . $strength . "</div>\n";
		echo "<div class='strength'>\n";
		while($row = mysql_fetch_array($result)) {

			echo "\t<div class='drug'>";
			if ($row['strength'] == "weak") {
				echo '<img src="images/green.jpg">';
			} else if ($row['strength'] == "moderate") {
				echo '<img src="images/orange.jpg">';
			} else if ($row['strength'] == "strong") {
				echo '<img src="images/red.jpg">';
			}
			echo "<a target=_new href='php/getPub.php?drug_id=" . $row['drug_id'] . "'>" . $row['drug_name'] . "</a>";
			echo "</div>\n";
		}
		echo "</div>\n\n";
	}

?>