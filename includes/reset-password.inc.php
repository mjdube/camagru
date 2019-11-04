<?php

    if (isset($_POST['reset-password-submit']))
    {
        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];
        
    }
    else
    {
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();
    }