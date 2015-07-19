
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
/*$db = new SQLite3('Events.sqlite');

$eventName = $_GET['eventName'];
$results1 = $db->query("SELECT MemberNames FROM Events where EventName = ViaSat Hackathon");
while ($row = $results1->fetchArray()){
    printf("Member : %s", $row[0]);
}*/
$data1 = array("Hi", $eventName);
echo json_encode($data1);
}


// Here's some data that we want to send via JSON.
// We'll include the $id parameter so that we
// can show that it has been passed in correctly.
// You can send whatever data you like.
$data = array("Hello", $id);

// Send the data.
echo json_encode($data);

?>