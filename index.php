<?php
    require 'structure/header.struc.php';
?>
    <section>
    <h1>Camagru</h1>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" ><br><br>
            <label for="password">Password</label>
            <input type="text" name="password" id="password"><br><br>
            <input type="submit" name="login" value="Login" >
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p>Forgot your password? <a href="">Forgot Password</a></p>
    </section>
<?php
    require 'structure/footer.struc.php';
?>