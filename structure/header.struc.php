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
       <nav class="navigation-bar">
       
         <a href="index.php" id="link_logo"><img id="logo" src="includes/logo.png" alt="logo"></a>
         <ul>
               <?php
                    if (isset($_SESSION['userid']))
                    {
                        // if ($_SESSION['is_verified'] == 1)
                        // {
                            echo'
                            
                                <li><a href="home.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                            </ul>
                            <div class="login-nav">
                                <form class="login-form-nav" action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout">Logout</button>
                                </form>
                            </div>
                            ';
                        // }
                    }
                    else 
                    {
                        echo '
                        
                            <li><a href="home.php">Home</a></li>
                        </ul>
                        <div class="login-nav">
                            <form class="login-form-nav" action="forms/login.form.php" method="post">
                                <input type="text" name="useremail" placeholder="Email...">
                                <input type="password" name="password" placeholder="Password...">
                                <button type="submit" name="login">Login</button>
                            </form>
                        </div>';
                    }
               ?>
           </div>
       </nav>
    </header>
    