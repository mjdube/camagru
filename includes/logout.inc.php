<?php

    session_start();
    unset($_SESSION);
    var_dump($_SESSION);
    header("Location: ../index.php?logout");