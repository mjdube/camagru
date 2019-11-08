<?php
    if (isset($_GET['vkey']))
    {
        include_once '../config/setup.php';
        $vkey = $_GET['vkey'];

        $sql = "SELECT verify, vkey FROM users WHERE verify = 0 AND vkey = '$vkey' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result == 1)
        {
            $sql = "UPDATE users SET verify = 1 WHERE vkey = '$vkey' LIMIT 1 ";
            $stmt = $pdo->prepare($sql);
            $update = $stmt->execute();
            if ($update === true)
            {
                header("Location: ../index.php?verifysuccessful=y");
                exit();
            }
            else 
            {
                header("Location: ../verifyemail.php?somethingwrong=y");
                exit();
            }
        }
        else 
        {
            header("Location: ../verifyemail.php?already=y");
            exit();
        }
    }
    else
    {
        header("Location: ../index.php?notverified");
        exit();
    }