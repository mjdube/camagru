<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    if (isset($_POST['submit']))
    {
        include_once '../config/database.php';
        
        $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $first = htmlspecialchars($_POST['firstname']);
        $last =  htmlspecialchars($_POST['lastname']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $pwd1 =  htmlspecialchars($_POST['password']);
        $pwd2 = htmlspecialchars($_POST['repassword']);

        if (empty($first) || empty($last) || empty($username) || empty($email) || empty($pwd1) || empty($pwd2))
        {
            header("Location: ../signup.php?signingup=empty&firstname=".$first."&lastname=".$last);
            exit();
        }
        else if (!preg_match('/^[a-zA-Z]*$/', $first) or !preg_match('/^[a-zA-Z]*$/', $last))
        {
            header("Location: ../signup.php?signingup=invalidchar");
            exit();
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false || filter_var($email, FILTER_VALIDATE_EMAIL) == true) 
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == true)
            {
                $sql1 = "SELECT email FROM users WHERE email = ?";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->execute([$email]);
                $row1 = $stmt1->fetch();
                if ($row1 > 0)
                {
                    header("Location: ../signup.php?signingup=mailexist&firstname=".$first."&lastname=".$last);
                    exit();
                }
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
            {
                header("Location: ../signup.php?signingup=invalidemail&firstname=".$first."&lastname=".$last);
                exit();
            }
        }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
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
                header("Location: ../signup.php?signingup=userTaken&firstname=".$first."&lastname=".$last."&email=".$email);
                exit();
            }
            else
            {
                // Hashed password
                $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);

                // verify email 
                $vKey = md5(time().$username);

                // Sql code
                $sql = "INSERT INTO users(uid_username, firstname, lastname, email, pword, vkey) VALUES (?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$username, $first, $last, $email, $hashedpwd, $vKey]);
                
                $to = $email;

                // For email verification
                $subject = "Email Verfication";
                $message = "<a href='http://localhost:8080/camagru/verifyemail.php?vkey=$vKey'>Register Account</a>";
                $headers = "From: sirmj.dube@gmail.com";
                $headers .= "MIME-Version: 1.0"."\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
                
                // Send to a email...
                $mail = mail($to, $subject, $message, $headers);
                // if($mail){
                //     echo "Wassip";
                // }else{
                //     echo "messed up";
                // }

                // var_dump($result);
                header("Location: ../thankyou.php?success");
                exit();
            }
        }
    }
    // else
    // {
    //     header("Location: ../signup.php");
    //     exit();
    // }