<?php
    session_start();

    // $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../includes/TakeIt.css" type="text/css">
    <title>Camagru</title>
</head>
<body>
    <header>
       <nav>
           <ul>
               <li><a href="home.php">Home</a></li>
               <li><a href="profile.php">Profile</a></li>
           </ul>
           <div>
               <?php
                    if (isset($_SESSION['userid']))
                    {
                        echo '<form action="includes/logout.inc.php" method="post">
                        <input type="submit" name="logout" value="Logout" >
                         </form>';
                    }
                    else 
                    {
                        echo '<form action="forms/login.form.php" method="post">
                        <input type="text" name="useremail" placeholder="Email...">
                        <input type="password" name="password" placeholder="Password...">
                        <input type="submit" name="login" value="Login" >
                        </form>';
                    }
               
               ?>
           </div>
       </nav>
    </header>