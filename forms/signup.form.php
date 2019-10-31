<?php

    if (isset($_POST['submit']))
    {
        include_once '../config/database.php';
        // $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $first = htmlspecialchars($_POST['firstname']);
        $last =  htmlspecialchars($_POST['lastname']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $pwd1 =  htmlspecialchars($_POST['password']);
        $pwd2 = htmlspecialchars($_POST['repassword']);

        if (empty($first) or empty($last) or empty($username) or empty($email) or empty($pwd1) or empty($pwd2))
        {
            header("Location: ../signup.php?signingup=empty&firstname=".$first."&lastname=".$last);
            exit();
        }
        else if (!preg_match('/^[a-zA-Z]*$/', $first) or !preg_match('/^[a-zA-Z]*$/', $last))
        {
            header("Location: ../signup.php?signingup=invalidchar");
            exit();
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) 
        {
            header("Location: ../signup.php?signingup=invalidemail&firstname=".$first."&lastname=".$last);
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header("Location: ../signup.php?signingup=usererror&email=".$email."&firstname=".$first."&lastname=".$last);
            exit();
        }
        else if ($pwd1 !== $pwd2)
        {
            header("Location: ../signup.php?signingup=passwordfail&firstname=".$first."&lastname=".$last."&email=".$email);
            exit();
        }
        else
        {
            $sql = "SELECT uid_username FROM users WHERE uid_username = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);
            $row = $stmt->fetch();
            if ($row > 0)
            {
                header("Location: ../signup.php?signingup=userTaken");
                exit();
            }
            else
            {
                $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users(uid_username, firstname, lastname, email, pword) VALUES (?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$username, $first, $last, $email, $hashedpwd]);
                header("Location: index.php?success");
                exit();
            }
        }
    }
    else
    {
        header("Location: signup.php");
        exit();
    }