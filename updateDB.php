<?php
	require_once("mylib.php");

	// Prevent caching.
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

	// The JSON standard MIME header.
	header('Content-type: application/json');

	// This ID parameter is sent by our javascript client.

	$id = $_GET['i'];
	$email = $_GET['e'];

	$lists = [];

	$db = new SQLite3('Events.sqlite');

	$results1 = $db->query("SELECT Emails FROM Events where ID = '$id'");
	if(!$results1){
		throw new Exception("Database Error");
	}
	while ($row = $results1->fetchArray()){
   		array_push($lists, $row[0]);
	}
	
		
		
		
		$allEmails = $lists[0] . ", " . $email;
		//echo("Concat worked!");

		$queryString = ("UPDATE Events SET Emails='$allEmails' WHERE  ID='$id'");
		
		echo ("\$queryString=$queryString<br>");
		$result = $db->query($queryString);
		echo ("Updated");
		
?>