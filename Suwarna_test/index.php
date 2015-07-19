
<?php

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-type: application/json');

// This ID parameter is sent by our javascript client.

$id = $_GET['id'];


if($id == "1"){
$eventName = $_GET['eventName'];
$db = new SQLite3('Events.sqlite');
$lists = [];

$results1 = $db->query("SELECT Emails FROM Events where EventName = '$eventName'");
while ($row = $results1->fetchArray()){
	array_push($lists, $row[0]);
    //printf("Member : %s", $row[0]);
}

echo json_encode($lists);
}

?>