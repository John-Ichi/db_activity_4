<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_activity_4';

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    echo 'Database Connected!';
}
catch(Exception $e) {
    die("Connection Failed..." . $e->getMessage());
}

?>