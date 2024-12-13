<?php
    $host = "localhost";
    $dbname = "lm";
    $username = "root";
    $password = "";

    try {
        $database = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;", $username, $password);
    } catch (PDOException $error) {
        die("Ошибка подключения: ".$error->getMessage());
    }
?>