<?php

$db = new SQLite3('Events.sqlite');

$results = $db->query('SELECT id, EventName FROM Events');
while ($row = $results->fetchArray()){
    printf("ID: %s Name: %s", $row[0],$row[1]);
}


// 





?>
