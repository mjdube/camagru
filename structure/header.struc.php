<?php
    session_start();
    include_once 'config/setup.php';
    // $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="includes/TakeIt.css" >
    <!-- <script type="text/javascript" src="includes/main.js"></script> -->
    <title>Camagru</title>
</head>
<body>
    <header>
       <nav>
           <img id="logo" src="includes/logo.png" alt="logo">
               <?php
                    if (isset($_SESSION['userid']))
                    {
                        // if ($_SESSION['is_verified'] == 1)
                        // {
                            echo'
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                            </ul>
                            <div class="login-nav">
                                <form class="login-form-nav" action="includes/logout.inc.php" method="post">
                                    <input type="submit" name="logout" value="Logout" >
                                </form>
                            </div>
                            ';
                        // }
                    }
                    else 
                    {
                        echo '
                        <div class="login-nav">
                            <form class="login-form-nav" action="forms/login.form.php" method="post">
                                <input type="text" name="useremail" placeholder="Email...">
                                <input type="password" name="password" placeholder="Password...">
                                <input type="submit" name="login" value="Login" >
                            </form>
                        </div>';
                    }
               ?>
           </div>
       </nav>
    </header>