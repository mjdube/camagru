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
        <form action="config/signingup.php" method="POST">
            <?php
            if (isset($_POST['firstname'])) 
            {
                $first = $_POST['firstname'];
                echo '<input type="text" name="firstname" placeholder="Firstname" value="'.$first.'"><br>';
            } 
            else
                echo '<input type="text" name="firstname" id="" placeholder="first name"><br>';
            if (isset($_POST['lastname'])) 
            {
                $last = $_POST['lastname'];
                echo '<input type="text" name="lastname" placeholder="Firstname" value="'.$last.'"><br>';
            } 
            else
                echo '<input type="text" name="lastname" id="" placeholder="Lastname"><br>';
            if (isset($_POST['username']))
            {
                $username = $_POST['username'];
                echo '<input type="text" name="username" placeholder="Firstname" value="'.$username.'"><br>';
            }
            else
                echo '<input type="text" name="username" id="" placeholder="Username"><br>';
            ?>
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="" placeholder="enter email"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="" placeholder="password"><br>
            <label for="repassword">Retype Password:</label><br>
            <input type="password" name="repassword" id="" placeholder="retype password"><br>
            <input type="submit" value="Submit" name="submit">
        </form>
        <?php
        
            if (!isset($_GET['signingup']))
                exit();
            else
            {
                if ($_GET['signingup'] == "empty")
                    echo '<p>Please enter fields.</p>';
                else if ($_GET['signingup'] == "char")
                    echo '<p>Invaild letter</p>';
                else if ($_GET['signingup'] == "email")
                    echo '<p>Invalid password.</p>';
                else if ($_GET['signing'] == "passfail")
                    echo '<p>The password do not match.</p>'
            }        
        ?>
    </section>
    <footer>
    </footer>
</body>
</html>