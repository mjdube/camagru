<?php
    session_start();
    
    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {
        if (isset($_POST['edit-profile']))
        {
            include_once '../config/setup.php';
            $username = $_POST['username'];
            $email = $_POST['email'];
            $currentpwd = $_POST['current-pwd'];
            if (!empty($username))
            {
                $sql = "SELECT pwod FROM users WHERE uid_username = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['useruid']]);
                $result = $stmt->fetchColumn();
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
                    echo 'password incorrect';
                }
            }
            else 
            {
                header("Location: ../editprofile.php");
                exit();
            }
            if (!empty($email))
            {
                $sql = "SELECT email FROM users WHERE uid_username = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['useruid']]);
                $result = $stmt->fetchColumn();
                $checkPwd = password_verify($result['pword'], $currentpwd);
                if ($checkPwd === true)
                {
                    // $sql = "UPDATE posts SET body = ? WHERE id = ?";
                    $sql = "UPDATE email SET uid_username = ? WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$username], [$_SESSION['userid']]);
                }
                else
                {
                    echo 'password incorrect';
                }
            }
            else 
            {
                header("Location: ../editprofile.php");
                exit();
            }
            if (empty($username) && empty($email))
            {
                header("Location: ../editprofile.php");
                exit();
            }
        }
        if (isset($_POST['edit-password']))
        {
            include_once '../config/setup.php';
            
            $pwd1 = $_POST['pwd1'];
            $pwd2 =$_POST['pwd2'];
            if ((empty($pwd1) && empty($pwd2)) || empty($pwd1) || empty($pwd2))
            {
                header("Location: ../editprofile.php");
                exit();
            }
            if (!empty($pwd1) && !empty($pwd2))
            {
                if ($pwd1 === $pwd2)
                {
                    $sql = "SELECT pwod FROM users WHERE uid_username = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_SESSION['useruid']]);
                    $result = $stmt->fetchColumn();
                    $checkPwd = password_verify($result['pword'], $currentpwd);
                    if ($checkPwd == true)
                    {
                        $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET uid_username = ? WHERE id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$username, $first, $last, $email, $hashedpwd]);
                        header("Location: ../index.php?success");
                        exit();
                    }
                    else if ($checkPwd == false)
                    {
                        echo 'Incorrect password';
                    }
                }
                else 
                {
                    echo "New password do not match";
                }
            }
        }
    }
    else
    {
        header("Location: ../editprofile.php");
        exit();
    }