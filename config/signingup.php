<?php

    if (isset($_POST['submit']))
    {
        include 'database.php';

        $first = mysqli_real_escape_string($conn, $_POST['firstname']);
        $last = mysqli_real_escape_string($conn, $_POST['lastname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd1 = mysqli_real_escape_string($conn, $_POST['password']);
        $pwd2 = mysqli_real_escape_string($conn, $_POST['repassword']);

        if (empty($first) or empty($last) or empty($username) or empty($email) or empty($pwd1) or empty($pwd2))
        {
            header("Location: signup.php?signingup=empty");
            exit();
        }
        if (!preg_match('/^[a-zA-Z]*$/', $first) or !preg_match('/^[a-zA-Z]*$/', $last))
        {
            header("Location: signup.php?signingup=char");
            exit();
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) 
        {
            header("Location: signup.php?signingup=email");
            exit();
        }
        if (password_verify($pwd1, $pwd2) == false)
        {
            header("Location: signup.php?signingup=passfail");
            exit();
        }
    }