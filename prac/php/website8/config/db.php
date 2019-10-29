<?php
    // Create connection
    $conn = mysqli_connect('localhost', 'root', 'Flashtruth123', 'phpblog');
    //Check connection
    if (mysqli_connect_errno())
    {
        // Failed Connection
        echo 'Fail to connect to MySql'.mysqli_connect_errno();
    }
?>