<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../config/setup.php';

    // $email = htmlspecialchars($_POST['email']);
    
    // if (!isset($email))
    // {
        if (isset($_POST['change']))
        {
            $vkey = htmlspecialchars($_GET['vkey']);
            $email = htmlspecialchars($_POST['email']);
            $pwd1 = htmlspecialchars($_POST['pwd1']);
            $pwd2 = htmlspecialchars($_POST['pwd2']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if ($pwd1 == $pwd2)
                {
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$email]);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $verify = $row['vkey'];
                    if ($verify == $vkey)
                    {
                        $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                        $email2 = $row['email'];
                        $sql = "UPDATE users SET pword = '$hashedpwd' WHERE vkey = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$verify]);
                        header("Location: ../index.php?passchange=y");
                        exit();
                    }
                    else 
                    {
                        header("Location: ../createnewpass.php?passchange=n");
                        exit();
                    }
                }
                else
                {
                    header("Location: ../createnewpass.php?ok=passwordnotmatch");
                    exit();
                }
            }
            else 
            {
                header("Location: ../createnewpass.php?ok=passwordnotmatch");
                exit();
            }
        }
    // }
    // else
    // {
    //     header("Location: ../signup.php?signup=signup");
    //     exit();
    // }