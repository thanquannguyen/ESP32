<?php
include 'database.php';
$pdo = Database::connect();

$latestSql = "SELECT * FROM esp WHERE ID = (SELECT MAX(ID) FROM esp) ORDER BY time DESC LIMIT 1";

foreach ($pdo->query($latestSql) as $latestRow) {
    echo "<tr>";
    echo "<td>" . $latestRow["date"] . "</td>";
    echo "<td>" . $latestRow["time"] . "</td>";
    echo "<td>" . $latestRow["humidity"] . "</td>";
    echo "<td>" . $latestRow["temperature"] . "</td>";
    echo "</tr>";
}
Database::disconnect();

?>