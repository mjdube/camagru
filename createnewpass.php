<?php
    require 'structure/header.struc.php';
?>


        <form action="config/createnewpass.form.php" method="post">
            <label for="change1">Create new password:</label> <br> <br>
            <input type="password" name="pwd1" id="change1">
            <label for="change2">Retype new password:</label> <br> <br>
            <input type="password" name="pwd2" id="change2">
            <br> <br>
            <input type="button" value="Submit" name="change-pass">
        </form>


<?php
    require 'structure/footer.struc.php';
?>