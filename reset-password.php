<?php
    require 'structure/header.struc.php';
?>

    <h2>Reset your password</h2>
    <p>Please enter your email address and go on to your email address and click on the link,
        and reset a new password.
    </p>
    <form action="includes/reset-request.inc.php" method="post">
        <label for="email">Enter your email here...</label>
        <input type="email" name="email" id="email">
        <button type="submit" name="reset-request-submit">Receive new password by email</button>
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    <?php
        if (isset($_GET['reset']))
        {
            if ($_GET['reset'] == "success")
            {
                echo '<p>Check your email</p>';
            }
        }
    ?>

<?php
    require 'structure/footer.struc.php';
?>