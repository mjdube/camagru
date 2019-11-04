<?php

    require 'database.php';

    try
    {
        $sql = "CREATE DATABASE IF NOT EXISTS db_mdube";
        $pdo->exec($sql);
        echo "Successfully created";
    }
    catch (PDOException $e)
    {
        echo "Can't create database".$e->getMessage();
        exit();
    }

    $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try
    {
        // $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE users (
            id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            uid_username VARCHAR(100) NOT NULL,
            firstname VARCHAR(100) NOT NULL, 
            lastname VARCHAR(100) NOT NULL, 
            email VARCHAR(100) NOT NULL,
            pword VARCHAR(200) NOT NULL,
            verify BIT DEFAULT 0
        );";
        $pdo->exec($sql);
        echo " Created table successfully...";
    }
    catch (PDOException $e)
    {
        echo "Can not create a users table".$e->getMessage();
    }

    try 
    {
        // $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE pwdRest (
            pwdRestId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            pwdRestEmail TEXT NOT NULL,
            pwdRestSelector TEXT NOT NULL,
            pwdRestToken LONGTEXT NOT NULL,
            pwdResetExpires TEXT NOT NULL
        );";
        $pdo->exec($sql);
    }
    catch (PDOException $e)
    {
        echo "Can not create a pwdRset table".$e->getMessage();
    }



    