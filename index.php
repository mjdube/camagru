<?php
    require 'structure/header.struc.php';
?>
    <section>
    <h1 class="title">Camagru</h1>
    <div class="login-form">
        <form action="forms/login.form.php" method="POST" class="front-form">
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
            <button type="submit" name="login">Login</button>
        </form>
    </div>
        <p class="login-msg">Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p class="login-msg">Forgot your password? <a href="forgotpassword.php">Forgot Password</a></p>
    </section>
    <?php
        // if (!isset($_GET['error']))
        //     exit();
        // else if ($_GET['error'] == "useremailpassword")
        //         echo '<p class="error" >Incorrect username/email or password!</p>';
        // else if (isset($_GET['success']))
        //     echo 'Check email to verify';


        // if (!isset([$_GET['verifyemail']]))
        //     exit();
        // else if ($_GET['verifyemail'] == "success")
        //     echo '<p>Email verified, you may now login.</p>';
        // else if ($_GET['verifyemail'] == "somethingwrong")
        //     echo '<p>Please try again.</p>';
        // else if ($_GET['verifyemail'] == "already")
        //     echo '<p>The account already verified.</p>';
        // else if ($_GET['verifyemail'] == "notverified")
        //     echo '<p>Something is wrong</p>';

        
        // if (!isset($_GET['passchange']))
        //     exit();
        // else if ($_GET['passchange'] == "y")
        //     echo '<p>Password Changed</p>';
        // else if ($_GET['passchange'] == "n")
        //     echo '<p>Please try again!</p>';
    ?>
<?php
    require 'structure/footer.struc.php';
?>