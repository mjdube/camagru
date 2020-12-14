<?php
require 'structure/header.struc.php';
?>

<div class="container text-center">
    <form method="post" action="forms/login.form.php">
        <img class="mb-4" src="includes/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="useremail" class="sr-only">Username/Email</label>
        <?php
        
            if (isset($_GET['useremail'])) {
                $useremail = htmlspecialchars($_GET['useremail']);
                echo '<input type="text" class="form-control" name="useremail" value="' . $useremail . '" id="useremail" placeholder="Enter Username/Email..." required autofocus>';
            } else {
                echo '<input type="text" id="inputEmail" name="useremail" class="form-control" placeholder="Enter Username/Email..." required autofocus>';
            }
        ?>
        <br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter Password..." required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        <p class="login-msg">Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p class="login-msg">Forgot your password? <a href="forgotpassword.php">Forgot Password</a></p>
        <?php


        if (!isset($_GET['error']))
            exit();
        else if ($_GET['error'] == "useremailpassword")
            echo '<p class="error" >Incorrect username/email or password!</p>';
        else if (isset($_GET['success']))
            echo 'Check email to verify';


        if (!isset($_GET['verifyemail']))
            exit();
        else if ($_GET['verifyemail'] == "success")
            echo '<p>Email verified, you may now login.</p>';
        else if ($_GET['verifyemail'] == "somethingwrong")
            echo '<p>Please try again.</p>';
        else if ($_GET['verifyemail'] == "already")
            echo '<p>The account already verified.</p>';
        else if ($_GET['verifyemail'] == "notverified")
            echo '<p>Something is wrong</p>';


        if (!isset($_GET['passchange']))
            exit();
        else if ($_GET['passchange'] == "y")
            echo '<p>Password Changed</p>';
        else if ($_GET['passchange'] == "n")
            echo '<p>Please try again!</p>';
        ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</div>


<?php
require 'structure/footer.struc.php';
?>