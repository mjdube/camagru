<?php

    session_start();
    // $name = $_SESSION['name'];
    // $email = $_SESSION['email'];

    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';                         //<--------- To avoid errors
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'You have not subscribe';    //<---------- To avoid errors

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session</title>
</head>
<body>
    
</body>
</html>