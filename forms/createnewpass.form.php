<?php

include_once '../config/setup.php';

    $email = htmlspecialchars($_POST['email']);
    
    if (!isset($email))
    {
        if (isset($_POST['change-pass']))
        {
            // $email = htmlspecialchars($_GET['email']);
            $pwd1 = htmlspecialchars($_POST['pwd1']);
            $pwd2 = htmlspecialchars($_POST['pwd2']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if ($pwd1 === $pwd2)
                {
                    $sql = "SELECT vkey FROM users WHERE email = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$email]);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $verify = $row['vkey'];
                    print_r($verify);
                    if ($verify === 1)
                    {
                        $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET pword = ? WHERE email = {$result['email']}";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$hashedpwd]);
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
    }
    else
    {
        header("Location: ../signup.php?signup=signup");
        exit();
    }