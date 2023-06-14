<?php
include 'database.php';
$pdo = Database::connect();

$sql = "SELECT DISTINCT date FROM esp";
$dates = array();

foreach ($pdo->query($sql) as $row) {
    $dates[] = array("date" => $row["date"]);
}

echo json_encode($dates);

Database::disconnect();
?>