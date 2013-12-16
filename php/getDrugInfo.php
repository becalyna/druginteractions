<?php

// Make the database connection
include("directoryConnect.php");

if (!$drug_id) {
	$drug_id = 1;
}

$debugSet = 0;

// debug when I need it.
if ($debugSet) {
	echo "drug_id passed <br>\n";
	print_r($drug_id);
	echo "\n\n";
}

//the database query			
if ($drug_id) {

	$drug_query = "SELECT drug.drug_id, drug_name, enzyme_name, enzyme_action
					FROM drug, enzyme, enzyme_action, action
					WHERE drug.drug_id = enzyme_action.drug_id
					AND enzyme.enzyme_id = enzyme_action.enzyme_id
					AND action.id = enzyme_action.action_id
					AND drug.drug_id = '$drug_id'";

	// debug
	if ($debugSet) {
		echo "<br>The Query: <br>";
		echo $query . "<br><br>\n\n";
	}

	$drug_result = mysql_query($drug_query);


	$pub_query = "SELECT drug_name, title, PMID
				FROM drug, publication
				WHERE drug.drug_id = \"$drug_id\"
				AND drug.drug_id = publication.drug_id";

	// debug
	if ($debugSet) {
		echo "<br>The Query: <br>";
		echo $query . "<br><br>\n\n";
	}

	$pub_result = mysql_query($pub_query);


	if (mysql_num_rows($drug_result) == 0) {
		echo ( "\nSorry, there was no matching record for drug with id \"$drug_id\".\n" ); 
	} else {

		$row = mysql_fetch_array($drug_result);

		$drugName = htmlentities($row['drug_name']);
		$action = htmlentities($row['enzyme_action']);
		$enzymeName = htmlentities($row['enzyme_name']);

		echo "<li>Drug: $drugName </li>";
		echo "<li>Action: $action </li>";
		echo "<li>Enzyme: $enzymeName </li>";

		if (mysql_num_rows($drug_result) > 1 ) {
			while($row = mysql_fetch_array($drug_result)) {
				$action = htmlentities($row['enzyme_action']);
				$enzymeName = htmlentities($row['enzyme_name']);
				echo "<li>Action: $action </li>";
				echo "<li>Enzyme: $enzymeName </li>";
			}
		}

		echo "<li>PubMed References:</li>";

		if (mysql_num_rows($pub_result) > 0 ) {
			while($row = mysql_fetch_array($pub_result)) {
				$title = htmlentities($row['title']);
				$pmid = htmlentities($row['PMID']);

	            echo "<li class='pubmed'>\n";
	            echo "<h3><a href='http://www.ncbi.nlm.nih.gov/pubmed/?term='$pmid'>";
	            echo "$title</a></h3>\n</li>";

			}
		}

        echo "</ul>\n";
    }
}

?>	