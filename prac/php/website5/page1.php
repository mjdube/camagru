<?php

    if (isset($_POST['submit']))
    {
        $username = htmlentities($_POST['username']);

        setcookies('username', $usename, time()+3600 ); // 1 hour

        header(page2.php);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Cookies</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="username" id="" placeholder="Enter Username">
        <br>
        <input type="text" name="submit" id="" value="Submit">
    </form>
</body>
</html>