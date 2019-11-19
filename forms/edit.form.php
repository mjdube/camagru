<?php
    session_start();
    
    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {
        $id = intval($_SESSION['userid']);

        if (isset($_POST['change_username']))
        {
            $username = $_POST['username'];
            $currentpwd = $_POST['current-pwd-username'];
            if (!empty($username))
            {
                include_once '../config/setup.php';
                $sql = "SELECT * FROM users WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $checkPwd = password_verify($currentpwd, $result['pword']);
                if ($checkPwd === true)
                {
                    $sql = "SELECT uid_username FROM users WHERE uid_username = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($username);
                    $result = $stmt->rowCount();
                    if ($result == 0)
                    {
                        // $sql = "UPDATE posts SET body = ? WHERE id = ?";
                        $sql = "UPDATE users SET uid_username = ? WHERE id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$username, $id]);
                        header("Location: ../editprofile.php");
                        exit();
                    }
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
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                include_once '../config/setup.php';
                $sql = "SELECT email FROM users WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
                $result = $stmt->rowCount();
                if ($result == 0)
                {
                    $sql = "SELECT * FROM users WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $checkPwd = password_verify($currentpwd, $result['pword']);
                    if ($checkPwd === true)
                    {
                        // $sql = "UPDATE posts SET body = ? WHERE id = ?";
                        $vKey = md5(time().$_SESSION['useruid']);

                        $sql = "UPDATE users SET email = ?, verify = 1, vkey = ? WHERE id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$email, $vKey, $id]);

                        $to = $email;

                        // For email verification
                        $subject = "Email Verfication";
                        $message = "<a href='http://localhost:8080/camagru/verifyemail.php?vkey=$vKey'>Email Account</a>";
                        $headers = "From: sirmj.dube@gmail.com";
                        $headers .= "MIME-Version: 1.0"."\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
                        
                        // Send to a email...
                        $mail = mail($to, $subject, $message, $headers);

                        header("Location: ../changeemail.php?success");
                        exit();
                    }
                    else
                    {
                        header("Location: ../editprofile.php?incorrectpwd");
                        exit();
                    }
                }
            }
            else 
            {
                header("Location: ../editprofile.php?emptyorincorrectemail");
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
                    $currentpwd = $_POST['current-pwd'];
                    $id = intval($_SESSION['userid']);
                    $sql = "SELECT pword FROM users WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $checkPwd = password_verify($currentpwd, $result['pword']);
                    if ($checkPwd === true)
                    {
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