<?php

$db = new SQLite3('Events.sqlite');

$results = $db->query('SELECT id, EventName, MemberNames FROM Events');
while ($row = $results->fetchArray()){
//    printf("ID: %s Name: %s", $row[0],$row[1]);
}



$eventName = "ViaSat Hackathon";
$results1 = $db->query("SELECT MemberNames FROM Events where EventName = '$eventName'");
//$results1 = $db->query('SELECT MemberNames FROM Events where EventName = "ViaSat Hackathon"' );
while ($row = $results1->fetchArray()){
    printf("Member : %s", $row[0]);
}



//


?>
