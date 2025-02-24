<?php

$conConfig = parse_ini_file(".env");

$host = $conConfig["host"];
$username = $conConfig["username"];
$password = $conConfig["password"];
$Name = $conConfig["Name"];


try {
    $pdo = new PDO(
        'mysql:host=' . $host . ';Name=' . $Name,
        $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
    echo "Successfully connected to database";
} catch (PDOException $e) {
    die("Can't connect to $Name :" . $e->getMessage());
}
?>