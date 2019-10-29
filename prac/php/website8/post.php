<?php
    require('config/db.php');
    require('config/config.php');
    

    //Get id
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Get query
    $query = "SELECT * FROM posts WHERE id = $id";

    //Get Result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $post = mysqli_fetch_assoc($result);

    // var_dump($posts);

    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP BLOG</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <a href="/" class="btn btn-default">Back</a>
        <h1><?php   echo $post['title'];    ?></h1>
            <small> Created on <?php  echo $post['created_at'];  ?> by 
                <?php     echo $post['author'];    ?>
            </small>
            <p><?php    echo $post['body'];   ?></p>
    </div>
</body>
</html>