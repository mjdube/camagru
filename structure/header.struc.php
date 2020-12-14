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

    <link rel="stylesheet" href="includes/TakeIt.css?version=51" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="includes/TakeIt.css" > -->
    <!-- <script type="text/javascript" src="includes/main.js"></script> -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .myfooter {
            width: auto;
            max-width: 680px;
            padding: 0 15px;
        }

        .footer {
            background-color: #f5f5f5;
        }

        /* Custom page CSS
-------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        /* .container {
            width: auto;
            max-width: 680px;
            padding: 0 15px;
        } */
    </style>
    <title>Camagru</title>
</head>

<body>

    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
            <img src="includes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Camagru
        </a> 
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
    </ul>
  </div>
        <?php
        if (isset($_SESSION['userid'])) {
            echo '
                            <div class="login-nav">
                                <form class="login-form-nav" action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                                </form>
                            </div>
                            ';
        } else {
            echo '
                        
                        <div class="login-nav">
                            <form class="login-form-nav" action="forms/login.form.php" method="post">
                                <input type="text" name="useremail" placeholder="Username/Email...">
                                <input type="password" name="password" placeholder="Password...">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </form>
                        </div>';
        }
        ?>
    </nav>

    <!-- <a class="navbar-brand" href="index.php">
            <img src="includes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Camagru
        </a> -->