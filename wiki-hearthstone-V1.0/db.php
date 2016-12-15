<?php
$db = 'wiki-hearthstone';
$host = 'localhost';

// Éventuellement à modifier en 'root' et 'root'
$username = 'root';
$password = 'root';
try{
    return new PDO("mysql:dbname=$db;host=$host", $username, $password);
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec("SET NAMES UTF8");
