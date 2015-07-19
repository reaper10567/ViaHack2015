<?php
	require_once("mylib.php");
	
	echo ("trying to do stuff");
	$db = open_db();
	log_to_db($db);
	
	
	function log_to_db($db){
		$ERROR_MSG = "usage logger.php?u=user&n=name&t=startTime&a=address&e=email&la=latitude&ln=longitude&k=key";
		
		//Grab the values from the original query string
		$user = (array_key_exists('u',$_GET)) ?  sanitize_string($_GET['u']) : die($ERROR_MSG);
		$name = (array_key_exists('n',$_GET)) ?  sanitize_string($_GET['n']) : die($ERROR_MSG);
		
		$startTime = (array_key_exists('t',$_GET)) ?  sanitize_string($_GET['t']) : die($ERROR_MSG);
		$address = (array_key_exists('a',$_GET)) ?  sanitize_string($_GET['a']) : die($ERROR_MSG);
		$email = (array_key_exists('e',$_GET)) ?  sanitize_string($_GET['e']) : die($ERROR_MSG);
		$latitude = (array_key_exists('la',$_GET)) ?  sanitize_string($_GET['la']) : die($ERROR_MSG);
		$longitude = (array_key_exists('ln',$_GET)) ?  sanitize_string($_GET['ln']) : die($ERROR_MSG);
		$key = (array_key_exists('k',$_GET)) ?  sanitize_string($_GET['k']) : die($ERROR_MSG);
		
		//authenticate the user
		$queryString = "SELECT * FROM AuthKey WHERE username = '$user' AND password='$key'";
		
		echo ("\$queryString=$queryString<br>");
		$result = $db->query($queryString);
		$numRows = count($result->fetchAll());
		echo ($numRows);
		// #3 - no match? Exit program!
		if ($numRows == 0) die("Bad username or key!");
		echo("user is correct");
		//insert data into the table!
		$queryString = ("INSERT INTO Events (ID, EventName, Location, Emails, DateTime, Creator, Lat, Long, Reminder) VALUES (NULL, '$name', '$address', '$email', '$startTime', '$email', '$latitude', '$longitude', 'False')");
		
		echo ("\$queryString=$queryString<br>");
		$result = $db->query($queryString);
		echo ("did a thing");
	}
?>