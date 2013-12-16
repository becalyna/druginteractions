<?php

	$dbhost = 'localhost';
	$dbuser = 'test';
	$dbpwd  = 'test';
	$dbname = 'druginteractions';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpwd);
	$db   = mysql_select_db($dbname, $conn);
	
	if ($conn) {
        //print "<p>Connected successfully to DB!</p>";
    } else {
        print "$conn -> Sorry, there was a error while connecting to the Database.<br>";
    }
?>
	
