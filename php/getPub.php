<?php

	// Make the database connection
	include("directoryConnect.php");

	// assign the GET or POST variable for searchterm
	$drug_id = $_REQUEST['drug_id'];

	$debugSet = $_REQUEST['debugSet'];
	
	// debug when I need it.
	if ($debugSet) {
		echo "drug_id passed <br>\n";
		print_r($drug_id);
		echo "\n\n";
	}

	//the database query			
	if ($drug_id) {
		$query = "SELECT drug_name, title, PMID
					FROM drug, publication
					WHERE drug.drug_id = \"$drug_id\"
					AND drug.drug_id = publication.drug_id";

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

		while($row = mysql_fetch_array($result)) {
			echo "<div class='drugInfo'>\n";
			echo "\t<div class='name'>";
			echo $row['drug_name'];
			echo "</div>\n";
			echo "\t<div class='title'>";
			echo $row['title'];
			echo "</div>\n";
			echo "\t<div class='PMID'>";
			echo "<a href='http://www.ncbi.nlm.nih.gov/pubmed/?term=" . $row['PMID'] . "'>" . $row['PMID'] . "</a>";
			echo "</div>\n";
			echo "</div>\n";
		}
	}
?>	