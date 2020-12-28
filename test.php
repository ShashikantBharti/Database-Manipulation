<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "dailyshop";

// Set DSN
$dsn = "mysql:host=$host;dbname=$dbname";

// Create PDO Instance
$pdo = new PDO($dsn, $user, $password);

// Query
$sql = "SELECT * FROM `categories`";
$query = $pdo->query($sql);

$data = array();
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

print_r($data);






?>