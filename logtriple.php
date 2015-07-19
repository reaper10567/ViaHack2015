<?php
	require_once("mylib.php");

		
	// test with: logtriple.php?s=testuser&p=drank&v=water&k=testkey
	$db = open_db();
	log_to_db($db);
	

	function log_to_db($db){
		$ERROR_MSG = "usage logger.php?s=subject&p=predicate&v=value&k=key";
		
		// #1 - grab values from query string
		$subject = (array_key_exists('s',$_GET)) ?  sanitize_string($_GET['s']) : die($ERROR_MSG);
		$predicate = (array_key_exists('p',$_GET)) ?  sanitize_string($_GET['p']) : die($ERROR_MSG);
		$value = (array_key_exists('v',$_GET)) ?  sanitize_string($_GET['v']) : die($ERROR_MSG);
		$key = (array_key_exists('k',$_GET)) ?  sanitize_string($_GET['k']) : die($ERROR_MSG);
		$timestamp = time();
		
		// #2 - Check to see if user is authorized
		// if they are, we should get one match from the table
		$queryString = "SELECT * FROM AuthKey WHERE username = '$subject' AND key='$key'";
		
		// log the query string for debugging purposes
		echo ("\$queryString=$queryString<br>");
		$result = $db->query($queryString);
		$numRows = count($result->fetchAll());
		
		// #3 - no match? Exit program!
		if ($numRows == 0) die("Bad username or key!");
		
		// #4 - INSERT values into Triple table
		$queryString =  ("INSERT INTO Triple (id, subject, predicate, value, timestamp) VALUES (NULL, '$subject', '$predicate', '$value', '$timestamp')");
		
		// log the query string for debugging purposes
		echo ("\$queryString=$queryString<br>");
		$result = $db->query($queryString);
			
	}



?>
