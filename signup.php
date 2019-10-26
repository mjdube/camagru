<?php

    if (isset($_POST['submit']))
    {
        include_once 'config/database.php';
        
    }
    else
    {
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signing Up</title>
</head>
<body>
    <h1>Welcome to Camagru</h1>
    <section>
        <h2>Sign Up</h2>
        <form action="" method="post">
            <label for="firstname">First name:</label><br>
            <input type="text" name="firstname" id="" placeholder="first name"><br>
            <label for="lastname">Last name:</label><br>
            <input type="text" name="lastname" id="" placeholder="last name"><br>
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="" placeholder="username"><br>
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="" placeholder="enter email"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="" placeholder="password"><br>
            <label for="repassword">Retype Password:</label><br>
            <input type="password" name="repassword" id="" placeholder="retype password"><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </section>
    <footer>
    </footer>
</body>
</html>