<?php

    if (isset($_POST['login']))
    {
        require 'config/database.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password))
        {
            header("Location: ../index.php?error=empty");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM users WHERE  uid_users = ? OR email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$]);
        }
    }
    else
    {
        header("Location: index.php");
        exit();
    }