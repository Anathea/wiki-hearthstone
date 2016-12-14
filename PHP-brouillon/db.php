<?php
$db = 'Wiki-hs';
$host = 'localhost';
// Le username et password n'est peut-être pas le même pout vous
// Ça peut être root root (comme pour Yann)
$username = 'admin';
$password = 'admin';

try{
    return new PDO("mysql:dbname=$db;host=$host", $username, $password);
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec("SET NAMES UTF8");
