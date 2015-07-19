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
// Search for emails by event
if($id == "1"){
$eventName = $_GET['eventName'];
$results1 = $db->query("SELECT Emails FROM Events where EventName = 'ViaSat Hackathon'");
}
// Search for events by location
else if($id == "2"){
$location = $_GET['location'];
$results1 = $db->query("SELECT EventName FROM Events where Location = '$location'");
}
// Search for events by date
else if($id == "3"){
$date = $_GET['date'] . "%";
$results1 = $db->query("SELECT EventName FROM Events where DateTime LIKE '$date'");
}

if(!$results1){
	throw new Exception("Database Error");
}

while ($row = $results1->fetchArray()){
   array_push($lists, $row[0]);
}
echo json_encode($lists);



// Here's some data that we want to send via JSON.
// We'll include the $id parameter so that we
// can show that it has been passed in correctly.
// You can send whatever data you like.
$data = array("Hello", $id);

// Send the data.
echo json_encode($data);

?>