<?php

echo "<h1>PDO demo!</h1>";
$username = '<ucid here>';
$password = '<password here>';
$hostname = 'sql.njit.edu';

$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

?>
