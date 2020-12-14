<?php
require 'structure/header.struc.php';
?>

<div class="container">
    <h1>Forgotten Password...</h1>
    <form action="forms/forgot.form.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control"><br>
        <button class="btn btn-primary" name="submit_forgot">Submit</button>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </form>
</div>

<?php
require 'structure/footer.struc.php';
?>