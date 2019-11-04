<?php
    require 'structure/header.struc.php';
?>
    <section>
        <h1>Sign Up</h1>
        <form action="forms/signup.form.php" method="POST">
            <?php
            if (isset($_GET['firstname'])) 
            {
                $first = $_GET['firstname'];
                echo '<input type="text" name="firstname" placeholder="Firstname" value="'.$first.'"><br><br>';
            } 
            else
                echo '<input type="text" name="firstname"  placeholder="Firstname"><br><br>';
            if (isset($_GET['lastname'])) 
            {
                $last = $_GET['lastname'];
                echo '<input type="text" name="lastname" placeholder="Lastname" value="'.$last.'"><br><br>';
            } 
            else
                echo '<input type="text" name="lastname" id="" placeholder="Lastname"><br><br>';
            if (isset($_GET['email']))
            {
                $email = $_GET['email'];
                echo '<input type="text" name="email" placeholder="E-mail" value="'.$email.'"><br><br>';
            }
            else
                echo '<input type="text" name="email" placeholder="E-mail"><br><br>';
            ?>
            <input type="text" name="username" id="" placeholder="Username"><br><br>
            <input type="password" name="password" id="" placeholder="password"><br><br>
            <input type="password" name="repassword" id="" placeholder="retype password"><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>
        <p>Already have an account? <a href="index.php">Login</a></p>
        <p>Forgot your password? <a href="reset-password.php">Forgot Password</a></p>
        <?php
            if (!isset($_GET['signingup']))
                exit();
            else
            {
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
    </section>
<?php
    require 'structure/footer.struc.php';
?>