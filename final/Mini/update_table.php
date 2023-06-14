<?php
include 'database.php';
$pdo = Database::connect();

$selected_date = $_GET["date"];
// Retrieve humidity and temperature data for selected date from database
$sql = "SELECT * FROM esp WHERE date = '$selected_date'";

foreach ($pdo->query($sql) as $row) {
    echo "<tr>";
    echo "<td>" . $row["time"] . "</td>";
    echo "<td>" . $row["humidity"] . "</td>";
    echo "<td>" . $row["temperature"] . "</td>";
    echo "</tr>";
}

Database::disconnect();

?>