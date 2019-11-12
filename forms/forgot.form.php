<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_POST['submit_forgot']))
    {
        include_once '../config/setup.php';
        
        $email = htmlspecialchars($_POST['email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo var_dump($result);
            if ($result['email'] === $email)
            {
                $vKey = md5(time().$result['uid_username']);
                $sql = "UPDATE users SET vkey = '$vKey' WHERE uid_username = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$result['uid_username']]);

                $subject = "Forgot Password";
                $message = "<a href='http://localhost:8080/camagru/createnewpass.php?vkey=$vKey&email=$email'>Forgot Password</a>";
                $headers = "From: sirmj.dube@gmail.com";
                $headers .= "MIME-Version: 1.0"."\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
                mail($result['email'], $subject, $message, $headers);
                header("Location: ../index.php?vkey=$vKey&email=$email'");
            }
            else 
            {
                header("Location: ../forgotpassword.php?email=doesnotexit");
                exit();
            }
        }
        else 
        {
            header("Location: ../forgotpassword.php?email=notemail");
            exit();
        }
    }
    else 
    {
        echo "failed";
    }


?>