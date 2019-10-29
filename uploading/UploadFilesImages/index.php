<?php

    session_start();
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_SESSION['id']))
        {
            if (isset($_SESSION['id']) == 1)
            {
                echo "Yout are logged in as user #1";
            }
        }
    
    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="">
    <button type="submit" name="submit" >UPLOAD</button>
    </form>

    <p>Login as user</p>
    <form action="login.php" method="post">
        <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Logout as user</p>
    <form action="logout.php" method="post">
        <button type="submit" name="submitLogout">Logout</button>
    </form>

</body>
</html>