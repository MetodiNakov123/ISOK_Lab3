<?php
$host = "localhost";
$dbname = "praktikum161041";
$username = "root";
$pass = "";
$pdo = "";
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
} catch (PDOException $ex){
    die("Could not connect to the database $dbname :" . $ex->getMessage());
}

