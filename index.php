<?php

    include_once 'config/database.php';

    $username = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if (isset($_POST['login']))
    {
        if (!empty($username) && (!empty($password)))
        {

        }
    }
    else
    {
        // Failed
        header("Location: index.php")
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru</title>
</head>
<body>
    <h1>Camagru</h1>
    <section>
        <form action="" method="POST">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="" placeholder="Username"><br>
            <label for="password">Password</label><br>
            <input type="text" name="password" id="" placeholder="Password"><br>
            <input type="submit" name="login" value="Login" ><br>
        </form>
        <p>Don't have an account?<a href="signup.php">Sign Up</a></p>
        <p>Forgot your email or password?<a href="">Forgot Password</a></p>
    </section>
    <footer>
    </footer>
</body>
</html>