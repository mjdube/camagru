<?php

$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "Flashtruth123";
$DB_NAME = "db_mdube";

try
{
    $dsn = "mysql:host=".$DB_DSN.";dbname=".$DB_NAME;
    $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo "Connection failed".$e->getMessage();
    echo "Hello";
}

// $sql = "INSERT INTO users(uid_username, firstname, lastname, email, pword) VALUES ('Mlu','Dube','mlungisi','sir@gmail.com','123')";
// $stmt = $pdo->prepare($sql);
//     $stmt->execute([$username]);
            // $row = $stmt->fetch();