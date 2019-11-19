<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru</title>
</head>
<body>
    <h1>Changing E-mail</h1>
    <h3>Please login into your new email provided for verification</h3>
    <?php
    session_start();
    session_unset();
    session_destroy();
    ?>
</body>
</html>