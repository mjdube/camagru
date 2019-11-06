<?php
    require 'structure/header.struc.php';
?>
    <section>
    <h1>Camagru</h1>
        <form action="forms/login.form.php" method="POST">
            <label for="useremail">Username/E-mail:</label><br>
            <?php
                // if (isset($_SESSION['id']))
                if (isset($_GET['useremail']))
                {
                    $useremail = htmlspecialchars($_GET['useremail']);
                    echo '<input type="text" name="useremail" value="'.$useremail.'" id="useremail"><br><br>';
                }
                else 
                    echo '<input type="text" name="useremail" id="username"><br><br>';
            ?>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" name="login" value="Login" >
        </form>
        <?php
            if (isset($_SESSION['userid']))
            {
                echo '<p class="">You are logged in!</p>';
            }
            else
            {
                echo '<p class="">You are logged out!</p>';
            }
        ?>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p>Forgot your password? <a href="">Forgot Password</a></p>
    </section>
    <?php
        if (!isset($_GET['error']))
            exit();
        else
            if ($_GET['error'] == "useremailpassword")
                echo '<p class="error" >Incorrect username/email or password!</p>';
    ?>
<?php
    require 'structure/footer.struc.php';
?>