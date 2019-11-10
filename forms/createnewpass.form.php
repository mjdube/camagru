<?php

include_once '../config/setup.php';
include_once 'forgot.form.php';

    if (isset($_POST['change-pass']))
    {
        $pwd1 = htmlspecialchars($_POST['pwd1']);
        $pwd2 = htmlspecialchars($_POST['pwd2']);

        if ($pwd1 === $pwd2)
        {
            $sql = "SELECT vkey FROM users WHERE vkey = {$result['vkey']}";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $verify = $row['vkey'];
            if ($verify === 1)
            {
                $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET pword = ? WHERE email = {$result['email']}";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$hashedpwd]);
                header("Location: ../index.php?passchange=y");
                exit();
            }
            else 
            {
                header("Location: ../createnewpass.php?passchange=n");
                exit();
            }
        }
        else 
        {
            header("Location: ../createnewpass.php?passwordnotmatch");
            exit();
        }
    }