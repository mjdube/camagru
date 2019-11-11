<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_GET['vkey']))
    {
        include_once 'config/setup.php';
        $vkey = $_GET['vkey'];

        $sql = "SELECT verify, vkey FROM users WHERE verify = 0 AND vkey = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$vkey]);
        $result = $stmt->fetch();
        if ($result['vkey'] === $vkey)
        {
            $sql = "UPDATE users SET verify = 1 WHERE vkey = ? LIMIT 1 ";
            $stmt = $pdo->prepare($sql);
            $update = $stmt->execute([$vkey]);
            if ($update === true)
            {
                header("Location: index.php?verifyemail=success");
                exit();
            }
            else 
            {
                header("Location: index.php?verifyemail=somethingwrong");
                exit();
            }
        }
        else 
        {
            header("Location: index.php?verifyemail=already");
            exit();
        }
    }
    else
    {
        header("Location: ../index.php?verifyemail=notverified");
        exit();
    }