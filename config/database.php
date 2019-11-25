<?php

$DB_DSN = "mysql:host=localhost;";
$DB_dsn = "mysql:host=localhost;dbname=db_mdube";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "db_mdube";

try
{
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo "Connection failed".$e->getMessage();
}