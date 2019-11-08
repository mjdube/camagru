<?php

if ($_SESSION['userid'])
{
    if (isset($_POST['login']))
    {
        
        require '../config/database.php';

        $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
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
                        // head in 
                        header("Location: ../home.php?login=success");
                        exit();
                    }
                }
            }   
        }
    }
    else
    {
        header("Location: ../index.php");
        exit();
    }
}
else
{
    header("Location: ../index.php?notvaliduser");
    exit();
}