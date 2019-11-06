<?php
    require 'structure/header.struc.php';
?>
    <form action="forms/edit.form.php" method="post">
        <input type="text" name="username" placeholder="Change Username...">
        <input type="email" name="email" placeholder="Change Email...">
        <input type="password" name="current-pwd" placeholder="Password...">
        <input type="submit" name="edit-profile" value="Change">
        <br><br>
        <input type="password" name="pwd1" placeholder="Change Password...">
        <input type="password" name="pwd2" placeholder="Retype Password...">
        <input type="password" name="current-pwd" placeholder="Current Password...">
        <input type="submit" name="edit-password" value="Change Password">
    </form>
<?php
    require 'structure/footer.struc.php';
?>