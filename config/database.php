<?php

$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "Flashtruth123";
$DB_NAME = "db_mdube";

try
{
    $dsn = "mysqlhost:dbname=".$DB_NAME.";host=".$DB_DSN;
    $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo "Connection failed".$e->getMessage();
}