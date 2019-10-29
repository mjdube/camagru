<?php

$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "Flashtruth123";
$DB_NAME = "db_mdube";

$conn = mysqli_connect($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
if (!$conn)
    die("Connection Failed : ". mysqli_connect_error());
