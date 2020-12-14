<?php
require 'structure/header.struc.php';
?>
    

    <div class="container text-center">
        <form action="forms/signup.form.php" method="POST">
            <img class="mb-4" src="includes/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
            <div class="row">
                <?php
                if (isset($_GET['firstname'])) {
                    $first = $_GET['firstname'];
                    echo '
                <div class="col">
                <label for="useremail" class="sr-only">Firstname</label>
                <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="' . $first . '"></div>';
                } else {
                    echo '
                <div class="col">
                <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                </div>';
                }
                if (isset($_GET['lastname'])) {
                    $last = $_GET['lastname'];
                    echo '
                <div class="col">
                <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="' . $last . '">
                </div>
                </div><br>';
                } else {
                    echo '
                <div class="col">
                <input type="text" name="lastname" class="form-control" id="" placeholder="Lastname">
                </div>
                </div><br>';
                }
                if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                    echo '
                <div class="row">
                <div class="col">
                <input type="text" name="email" class="form-control" placeholder="E-mail" value="' . $email . '"></div>';
                } else {
                    echo '
                <div class="row">
                <div class="col">
                <input type="text" name="email" class="form-control" placeholder="E-mail">
                </div>';
                }
                if (isset($_GET['username'])){
                    $username = $_GET['username'];
                    echo '
                    <div class="col">
                    <input type="text" name="username" placeholder="Username" value="'.$username.'" class="form-control">
                    </div>
                    </div>
                    <br>
                    ';
                } else {
                    echo '
                    <div class="col">
                    <input class="form-control" type="text" name="username" id="" placeholder="Username">
                    </div>
                    </div>
                    <br>
                    ';
                }
                ?>
        <input class="form-control" type="password" name="password" id="" placeholder="Password" required pattern="^(?=.*[A-Z])(?=.*[0-9]).{6,32}$" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' : 'invalid password.');"><br>
        
        <input class="form-control" type="password" name="repassword" id="" placeholder="Retype Password"><br>
    
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>

    </div>
    <br>
                <!-- <label for="useremail" class="sr-only">Username/Email</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="Enter Username/Email" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Enter Password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="login-msg">Don't have an account? <a href="signup.php">Sign Up</a></p>
            <p class="login-msg">Forgot your password? <a href="forgotpassword.php">Forgot Password</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p> -->
            <p class="text-center">Already have an account? <a href="index.php">Login</a></p>
    <p class="text-center">Forgot your password? <a href="forgotpassword.php">Forgot Password</a></p>
        </form>
        
    </div>
    <?php
    if (!isset($_GET['signingup']))
        exit();
    else {
        if ($_GET['signingup'] == "empty")
            echo '<p class="error">Please enter fields!</p>';
        else if ($_GET['signingup'] == "invalidchar")
            echo '<p class="error">Invaild characters!</p>';
        else if ($_GET['signingup'] == "invalidemail")
            echo '<p class="error">Invalid email!.</p>';
        else if ($_GET['signingup'] == "passwordfail")
            echo '<p class="error">The password do not match!</p>';
        else if ($_GET['signingup'] == "mailexist")
            echo '<p class="error">You using an existing e-mail!</p>';
        else if ($_GET['signingup'] == "usererror")
            echo '<p class="error">Invaild characters!</p>';
        else if ($_GET['signingup'] == "usertaken")
            echo '<p class="error">Invaild characters!</p>';
    }
    ?>
<?php
require 'structure/footer.struc.php';
?>