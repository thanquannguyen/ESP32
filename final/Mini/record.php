<?php
require 'database.php';
$api_key_data = 'esp3212345';

if (!empty($_POST)) {
    $api_key = $_POST['api_key'];
    if ($api_key_data == $api_key) {
        date_default_timezone_set("Asia/Ho_Chi_Minh"); // Look here for your timezone : https://www.php.net/manual/en/timezones.php
        $tm = date("H:i:s");
        $dt = date("Y-m-d");
        $temperature = $_POST['temperature'];
        $humidity = $_POST['humidity'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO esp (temperature, humidity, time, date) VALUES (?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($temperature, $humidity, $tm, $dt));

        Database::disconnect();

    } else {
        echo "Wrong API Key provided.";
    }
}
?>