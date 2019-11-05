<?php

    require 'database.php';

    
    try
    {
        $sql = "CREATE DATABASE IF NOT EXISTS db_mdube";
        $pdo->exec($sql);
        echo "Successfully created"."<br>";
    }
    catch (PDOException $e)
    {
        echo "Can't create database".$e->getMessage();
        exit();
    }

    $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // PARENT TABLE <----------------------- 
    try
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            uid_username VARCHAR(100) NOT NULL,
            firstname VARCHAR(100) NOT NULL, 
            lastname VARCHAR(100) NOT NULL, 
            email VARCHAR(100) NOT NULL,
            pword VARCHAR(200) NOT NULL,
            verify BIT DEFAULT 0
        );";
        $pdo->exec($sql);
        echo " Created users table successfully..."."<br>";
    }
    catch (PDOException $e)
    {
        echo " Can not create a users table.".$e->getMessage();
    }

    // try 
    // {
    //     // $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
    //     // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $sql = "CREATE TABLE pwdRest (
    //         pwdRestId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    //         pwdRestEmail TEXT NOT NULL,
    //         pwdRestSelector TEXT NOT NULL,
    //         pwdRestToken LONGTEXT NOT NULL,
    //         pwdResetExpires TEXT NOT NULL
    //     );";
    //     $pdo->exec($sql);
    // }
    // catch (PDOException $e)
    // {
    //     echo " Can not create a pwdRset table.".$e->getMessage();
    // }
    

    // CHILD <----------------------- PARENT to comments and likes
    try
    {
        $sql = "CREATE TABLE IF NOT EXISTS images (
            id_img int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            id int NOT NULL,
            FOREIGN KEY (id) REFERENCES users(id),
            imgName LONGTEXT NOT NULL,
            orderImg LONGTEXT NOT NULL
        );";
        $pdo->exec($sql);
    }
    catch (PDOException $e)
    {
        echo " Can not create a images table.".$e->getMessage();
    }

    try
    {
        $sql = "CREATE TABLE IF NOT EXISTS comments (
            users_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            comment LONGTEXT NOT NULL,
            FOREIGN KEY (users_id) REFERENCES images(id_img)
        );";
        $pdo->exec($sql);
    }
    catch (PDOException $e)
    {
        echo " Can not create a comments table.".$e->getMessage();
    }

    // CHILD <-----------------------
    try
    {
        $sql = "CREATE TABLE IF NOT EXISTS likes (
            id_like int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            users_id int(11) NOT NULL,
            FOREIGN KEY (users_id) REFERENCES images(id_img),
            imgName LONGTEXT NOT NULL
        );";
        $pdo->exec($sql);
    }
    catch (PDOException $e)
    {
        echo " Can not create a likes table.".$e->getMessage();
    }