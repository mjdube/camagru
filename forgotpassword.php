<?php
    require 'structure/header.struc.php';
?>

    <h1>Forgotten Password...</h1>
    <form action="forms/forgot.form.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="Submit" name="submit_forgot">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    <p>Already have an account? <a href="index.php">Login</a></p>
    
<?php
    require 'structure/footer.struc.php';
?>