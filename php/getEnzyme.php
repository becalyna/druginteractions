<?php

// Make the database connection
include("directoryConnect.php");

if (!$enzyme) {

	$enzyme = 0;
}

if (!$action) {
	$action = 0;
}

if (!$searchterm) {

	if ($_POST['searchterm']) {
		
		$searchterm = htmlentities($_POST['searchterm']);

		$wild="%".$searchterm."%";
	
	} else {
		$searchterm = 0;
	}
}


// Set it to a value > 0 for debug info
$debugSet = 0;


// debug when I need it.
if ($debugSet) {
	echo "enzymes passed <br>\n";
	print_r($enzyme);
	echo "\n\n";
	echo "actions passed <br>\n";
	print_r($action);
	echo "\n\n";
}


// Utility function to print results.
function printRes ($result, $class, $description) {

	// debug
	if ($debugSet) {
		echo "<br>The Result: <br>";
		print_r($result);
		echo "<br><br>\n\n";
	}

	$listDiv = '';

	while($row = mysql_fetch_array($result)) {

		$drugName = htmlspecialchars($row['drug_name']);

		$newListDiv = strtoupper($drugName[0]);

		//$err = "listDiv = " . $listDiv . ", newListDiv = " . $newListDiv ;
		//error_log($err);

		if ( $listDiv != $newListDiv ) {

			//error_log("Makeing new listDiv: " . $newListDiv);

			$listDiv = $newListDiv;

			echo "<li data-role='list-divider'>";
			echo $listDiv;
			echo "</li>\n";
		}

		echo "<li>\n";

		echo "\t<a href='druginfo.php?drug_id=" . $row['drug_id'] . "'>" . $drugName . "</a>\n";

/*
		if ($row['action_id'] == "1") {
			echo '<img src="images/blue.jpg">';
		} else if ($row['action_id'] == "2") {
			echo '<img src="images/black.jpg">';
		} else if ($row['action_id'] == "3") {
			echo '<img src="images/white.jpg">';
		}
*/

		echo "</li>\n";
	}
}


//
//  No Enzyme or Action
//
//  the database query for all drugs
if (!$enzyme && !$action) {

	//debug
	if ($debugSet) {
		echo "Doing base search \n";
	}
	
	$query = "SELECT drug_id, drug_name FROM drug order by drug_name;";

	//place the query result in an array if query exists
  	if($query) {
		$result = mysql_query($query);

		printRes($result, 'all', $value);	

	}

}



//
//  Enzyme
//
//  the database query for enzyme just searches
if ($enzyme && !$action) {

	$enzymeGroup = array();
	
	//debug
	if ($debugSet) {
		echo "inside just enzyme \n";
	}
	
	$query_base = "SELECT drug.drug_id, action_id, drug_name
					FROM drug, enzyme, enzyme_action 
					WHERE drug.drug_id = enzyme_action.drug_id
					AND enzyme.enzyme_id = enzyme_action.enzyme_id
					AND ";
				
	foreach ($enzyme as $value) {
		$query =  $query_base . "enzyme.enzyme_name = '" . $value . "' ;";
	
		// debug
		if ($debugSet) {
			echo "<br>The Query: <br><br>";
			echo $query . "<br><br>\n\n";
		}

		//place the query result in an array if query exists
	  	if($query) {
			$result = mysql_query($query);

			printRes($result, 'enzyme', $value);	

		}


	}

}




//
//  ACTION
//
//  selecting just action
if ($action && !$enzyme) {

	//debug
	if ($debugSet) {
		echo "inside just action \n";
	}

	// base query
	$query_base = "SELECT DISTINCT drug.drug_id, action_id, drug_name
					FROM drug, enzyme, enzyme_action
					WHERE drug.drug_id = enzyme_action.drug_id
					AND enzyme.enzyme_id = enzyme_action.enzyme_id
					AND ";
	
	// A separate query for each
	foreach ($action as $value) {

		if ($value == "1") { $action_name = "Substrate"; }
		if ($value == "2") { $action_name = "Inhibitor"; }
		if ($value == "3") { $action_name = "Inducer"; }

		$query =  $query_base . "enzyme_action.action_id = '" . $value . "' ORDER BY drug_name;";

		// debug
		if ($debugSet) {
			echo "<br>The Query: <br><br>";
			echo $query . "<br><br>\n\n";
		}
	
		//place the query result in an array if query exists
	  	if($query) {
			$result = mysql_query($query);

			printRes($result, 'action', $action_name);	

		}

	}

}


//
//  ENZYME AND ACTION
//
// Selecting enzyme and actions
if ($enzyme && $action) {

	// Local counting
	$count = 0;

	//debug
	if ($debugSet) {
		echo "inside enzyme AND action \n";
	}

	// base query
	$query_base = "SELECT drug.drug_id, drug_name, enzyme_name, action_id
					FROM drug, enzyme, enzyme_action
					WHERE drug.drug_id = enzyme_action.drug_id 
					AND enzyme.enzyme_id = enzyme_action.enzyme_id
					";

	
	//--------------------------------------------------------------
	// Appending action to $query using OR's
	$query_base .= "AND (";
	foreach ($action as $value) {
		$count++;
		
		// Only need the OR if more than one.
		if ($count != 1) {
			$query_base .= "OR ";
		}
		
		$query_base .= "enzyme_action.action_id = '" . $value . "' ";
	}

	$query_base .= ")";
	//--------------------------------------------------------------
	
	// just to make query look better in debug output
	$query_base .= "
	";
	// resetting count
	$count = 0;


	foreach ($enzyme as $value) {
		$query =  $query_base . "AND enzyme.enzyme_name = '" . $value . "' ;";
	
		// debug
		if ($debugSet) {
			echo "<br>The Query: <br><br>";
			echo $query . "<br><br>\n\n";
		}
	
		//place the query result in an array if query exists
	  	if($query) {
			$result = mysql_query($query);

			printRes($result, 'enzyme', $value);	
		}

	}
}

?>	
