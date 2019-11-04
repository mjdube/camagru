<?php

    if (isset($_POST['reset-password-submit']))
    {
        $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        if (empty($password) || empty($passwordRepeat))
        {
            header("Location: ../create-new-password.php?newpwd=empty");
            exit();
        }
        else if ($password != $passwordRepeat)
        {
            header("Location: ../create-new-password.php?newpwd=empty");
            exit();
        }
        $currentDate = date("U");
        require '../config/database.php';
        $sql = "SELECT * FROM pwdRest WHERE pwdResetSelector =? AND pwdRestExpires >= ?";
        if (!($stmt = $pdo->prepare($sql)))
        {

        }
        else    
        {
            $stmt->execute($selector);
            if (!($result = $stmt->fetch()))
            {
                echo "You need to resubmit your reset password";
                exit();
            }
            else
            {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $result['pwdRestToken']);
                if ($tokenCheck === false)
                {
                    echo "You need to resubmit your reset password";
                    exit();
                }
                else if ($tokenCheck === true)
                {
                    $tokenEmail = $result['pwdRestEmail'];

                    $sql = "SELECT * FROM users WHERE email = ?";
                    if (!($stmt = $pdo->prepare($sql)))
                    {
                        echo "There was an error!";
                        exit();
                    }
                    else 
                    {
                        $stmt->execute($tokenEmail);
                        if (!($result = $stmt->fetch()))
                        {
                            echo "There was an error";
                            exit();
                        }
                        else 
                        {
                            $newPwd = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "UPDATE users SET pwdUsers = ? WHERE email = ?";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([$newPwd, $tokenEmail]);

                            $sql = "DELETE FROM pwdRest WHERE pwdResetEmail = ?";
                            if (!($stmt = $pdo->prepare()))
                            {
                                echo "There was an error";
                                exit();
                            }
                            else 
                            {
                                $sql->execute([$tokenEmail]);
                                header("Location: ../signup.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
    else
    {
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();
    }