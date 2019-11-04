<?php

    if (isset($_POST['reset-request-submit']))
    {
        
        $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "localhost:8080/camagru/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
        
        // Located expiring time
        $expires = date("U") + 1800;
        
        $userEmail = $_POST['email'];
        require '../config/database.php';
        $sql = "DELETE FROM pwdRest WHERE pwdResetEmail = ?";
        if ((!$stmt = $pdo->prepare($sql)))
        {
            echo "There was an error";
            exit();
        }
        else
        {
            $stmt->execute([$userEmail]);
        }

        $sql = "INSERT INTO pwdRest (pwdReset, pwdRestSelector, pwdResetToken, pwdRestExpires) VALUE (?,?,?,?)";
        if (!($stmt = $pdo->prepare($sql)))
        {
            echo "There was an error";
            exit();
        }
        else 
        {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $stmt->execute([$userEmail, $selector, $hashedToken, $expires]);
        }
        
        $to = $userEmail;

        $subject = 'Reset your password';

        $message = '<p>Receive a password reset request. The link to reset your password make this request,
         you can ignore this email</p>';
        $message .= '<p>Here is your password reset link:  <br>';
        $message .= '<a href="'.$url.'">'.$url.'"</a></p>';

        $headers = "From: mjdube <mdube@student.wethinkcode.co.za>\r\n";
        $headers .= "Reply-To: mdube@student.wethinkcode.co.za\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);
        header("Location: ../reset-password.php?reset=success");
    }
    else
    {
        header("Location: ../index.php");
        exit();
    }