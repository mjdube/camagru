<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require 'database.php';

    try
    {
        $sql = "CREATE DATABASE IF NOT EXISTS db_mdube";
        $pdo->exec($sql);
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
            vkey VARCHAR(100) NOT NULL,
            notify BIT DEFAULT 1,
            verify BIT DEFAULT 0
        );";
        $pdo->exec($sql);
    }
    catch (PDOException $e)
    {
        echo " Can not create a users table.".$e->getMessage();
    }
    

    // PARENT <----------------------- PARENT to comments and likes
    try
    {
        $sql = "CREATE TABLE IF NOT EXISTS images (
            id_img int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            id int(11) NOT NULL,
            FOREIGN KEY (id) REFERENCES users (id),
            uid_username VARCHAR(100) NOT NULL,
            imgName LONGBLOB NOT NULL,
            imgDateTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
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
            id_comment int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            id_img int(11) NOT NULL,
            FOREIGN KEY (id_img) REFERENCES images(id_img),
            id INT(11) NOT NULL,
            uid_username VARCHAR(100) NOT NULL,
            comment LONGTEXT NOT NULL,
            commentDateTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
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
            id_img int(11) NOT NULL,
            FOREIGN KEY (id_img) REFERENCES images(id_img)
        );";
        $pdo->exec($sql);
    }
    catch (PDOException $e)
    {
        echo " Can not create a likes table.".$e->getMessage();
    }