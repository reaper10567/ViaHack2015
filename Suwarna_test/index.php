
<?php

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-type: application/json');

// This ID parameter is sent by our javascript client.

$id = $_GET['id'];

$db = new SQLite3('Events.sqlite');
$lists = [];

// List of member e-mails based on event
if($id == "1"){
$eventName = $_GET['eventName'];
$results1 = $db->query("SELECT Emails FROM Events where EventName = '$eventName'");
}

// List of events based on location
else if($id == "2"){
$location = $_GET['Location'];
$results1 = $db->query("SELECT EventName FROM Events where Location = '$location'");
}

// List of events based on date
else if($id == "3"){
$date = $_GET['DateTime'] + '%';
$results1 = $db->query("SELECT EventName FROM Events where DateTime LIKE '$date'");
}

while ($row = $results1->fetchArray()){
	array_push($lists, $row[0]);
}
echo json_encode($lists);
}


?>