<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_POST['login']))
    {
        
        require '../config/setup.php';
        
        $useremail = htmlspecialchars($_POST['useremail']); 
        $password = htmlspecialchars($_POST['password']);
        
        if (empty($useremail) || empty($password))
        {
            header("Location: ../index.php?error=empty");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM users WHERE uid_username = ? OR email = ?;";
            // $stmt->execute([$email]);
            // $row = $stmt->fetch();
            if (!($stmt = $pdo->prepare($sql)))
            {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else 
            {
                $stmt->execute([$useremail, $useremail]);
                if ($result = $stmt->fetch())
                {
                    $pwdCheck = password_verify($password, $result['pword']);
                    if ($pwdCheck == false)
                    {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    else if ($pwdCheck == true)
                    {
                        // setting up the session when the user exist and password is correct
                        session_start();
                        $_SESSION['userid'] = $result['id'];
                        $_SESSION['useruid'] = $result['uid_username'];
                        $_SESSION['is_verified'] = $result['verify'];
                        $_SESSION['notify'] = $result['notify'];

                        // Changing the URL to Login     
                        header("Location: ../home.php?login=success");
                        exit();
                    }
                }
                else 
                {
                    header("Location: ../index.php?notexituser");
                }
            }   
        }
    }
    else
    {
        header("Location: ../index.php");
        exit();
    }