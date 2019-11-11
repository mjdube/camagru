<?php

    require 'structure/header.struc.php';


        // <!-- <form action="forms/createnewpass.form.php" method="get">
        //     <input type="email" name="email" value="<?php //echo $_GET['email'] 
        //<!-- // </form> --> 

        echo '<form action="forms/createnewpass.form.php?vkey='.$_GET['vkey'].'" method="post">
            <input type="email" name="email" value="'.$_GET['email'].'">

            <br> <br>
            <label for="change1">Create new password:</label>
             <br> <br>
            <input type="password" name="pwd1" id="change1">
            <br> <br>
            <label for="change2">Retype new password:</label>
             <br> <br>
            <input type="password" name="pwd2" id="change2">
            <br> <br>
            <input type="submit" value="change" name="change">
        </form>';



    require 'structure/footer.struc.php';
?>