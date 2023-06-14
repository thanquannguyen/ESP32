<?php

include 'database.php';
$pdo = Database::connect();

// $myObj = (object)array();
$data = array(); // create an empty array


$selected_date = $_GET["date"];

// Retrieve humidity and temperature data for selected date from database
$sql = "SELECT * FROM esp WHERE date = '$selected_date'";

// foreach ($pdo->query($sql) as $row) {
//     $myObj->humidity = $row["humidity"];
//     $myObj->temperature = $row["temperature"];
//     $myJSON = json_encode($myObj);
//     echo $myJSON;
// }

foreach ($pdo->query($sql) as $row) {
    $obj = new stdClass(); // create a new object for each row
    $obj->time = $row["time"];
    $obj->humidity = $row["humidity"];
    $obj->temperature = $row["temperature"];
    $data[] = $obj; // add the object to the array
}

echo json_encode($data);

Database::disconnect();
?>