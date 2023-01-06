<?php 

$host = 'localhost';
$dbName = 'todoApp';
$user = 'loqman';
$pass = 'loqman';

$options = 
[
    PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC, 
];

$dsn = "mysql:host=$host;dbname=$dbName";

try {
    $db = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
    
}