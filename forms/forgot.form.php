<?php

    if (isset($_SESSION['submit-forgot']))
    {
        include_once '../config/setup.php';
        
        $email = htmlspecialchars($_POST['email']);
        $sql = "SELECT * FROM user WHERE email = $email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['email'] === $email)
        {
            $vKey = md5(time().$result['username']);
            $sql = "UPDATE users SET vkey = $vKey WHERE username = {$result['username']} ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $subject = "Forgot Password";
            $message = "<a href='http://localhost/camagru/createnewpass.php?vkey=$vKey>Create New Password</a>";
            $headers = "From: sirmj.dube@gmail.com";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
            mail($result['email'], $subject, $message, $headers);
            header("Location: ../forgotpassword.php?success");
        }
        else 
        {
            header("Location: ../forgotpassword.php?email=doesnotexit");
        }
    }


?>