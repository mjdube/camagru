<?php
    session_start();
    
    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {

        if (isset($_POST['change_username']))
        {
            $username = $_POST['username'];
            $currentpwd = $_POST['current-pwd-username'];
            if (!empty($username))
            {
                include_once '../config/setup.php';
                $sql = "SELECT * FROM users WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['userid']]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $checkPwd = password_verify($result['pword'], $currentpwd);
                if ($checkPwd === true)
                {
                    // $sql = "UPDATE posts SET body = ? WHERE id = ?";
                    $sql = "UPDATE users SET uid_username = ? WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$username], [$_SESSION['userid']]);
                }
                else
                {
                    header("Location: ../editprofile.php?incorrectpwd");
                    exit();
                }
            }
            else 
            {
                header("Location: ../editprofile.php?empty");
                exit();
            }
        }


        if (isset($_POST['change_email']))
        {
            
            $email = $_POST['email'];
            $currentpwd = $_POST['current-pwd-email'];
            if (!empty($email))
            {
                include_once '../config/setup.php';
                $sql = "SELECT * FROM users WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['userid']]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $checkPwd = password_verify($result['pword'], $currentpwd);
                if ($checkPwd === true)
                {
                    // $sql = "UPDATE posts SET body = ? WHERE id = ?";
                    $sql = "UPDATE users SET email = ? WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$email, $_SESSION['userid']]);
                }
                else
                {
                    header("Location: ../editprofile.php?incorrectpwd");
                    exit();
                }
            }
            else 
            {
                header("Location: ../editprofile.php?empty");
                exit();
            }
        }


        if (isset($_POST['edit-password']))
        {
            $pwd1 = $_POST['pwd1'];
            $pwd2 =$_POST['pwd2'];
            if ((empty($pwd1) && empty($pwd2)) || empty($pwd1) || empty($pwd2))
            {
                header("Location: ../editprofile.php?empty");
                exit();
            }
            if (!empty($pwd1) && !empty($pwd2))
            {
                if ($pwd1 === $pwd2)
                {
                    include_once '../config/setup.php';
                    $id = $_SESSION['userid'];
                    $sql = "SELECT pword FROM users WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $checkPwd = password_verify($result['pword'], $currentpwd);
                    if ($checkPwd === true)
                    {
                        $id = $_SESSION['userid'];
                        $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET pword = ? WHERE id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$hashedpwd, $id]);
                        header("Location: ../editprofile.php?success");
                        exit();
                    }
                    else if ($checkPwd === false)
                    {
                        
                        header("Location: ../editprofile.php?incorrectpwd");
                        exit();
                    }
                }
                else 
                {
                    header("Location: ../editprofile.php?nomatch");
                    exit();
                }
            }
        }
    }
    else
    {
        header("Location: ../index.php");
        exit();
    }