<?php

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-type: application/json');

// This ID parameter is sent by our javascript client.

$id = $_GET['id'];
$db = new SQLite3('Events.sqlite');

$searchTerm = $_GET['searchTerm'];
// Search for emails by event
if($id == "1"){
$results1 = $db->query("SELECT * FROM Events where EventName = '$searchTerm'");
}
// Search for events by location
else if($id == "2"){
$results1 = $db->query("SELECT * FROM Events where Location = '$searchTerm'");
}
// Search for events by date
else if($id == "3"){
$searchTerm = $searchTerm . "%";
$results1 = $db->query("SELECT * FROM Events where DateTime LIKE '$searchTerm'");
}

if(!$results1){
	throw new Exception("Database Error");
}
$allResults = [];

while ($row = $results1->fetchArray()){
   $lists = [];
   array_push($lists, $row[0]);
   array_push($lists, $row[1]);
   array_push($lists, $row[2]);
   array_push($lists, $row[3]);
   array_push($lists, $row[4]);
   array_push($lists, $row[5]);
   array_push($lists, $row[6]);
   array_push($lists, $row[7]);
   array_push($lists, $row[8]);
   array_push($lists, $row[9]);
   array_push($allResults, $lists);
}

echo json_encode($allResults);


?>