<?php
    require('config/config.php');
    require('config/db.php');

    $query = 'SELECT * FROM posts';

    //Get Result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <h1>Posts</h1>
    <div class="container">
    <?php foreach ($posts as $post): ?>
        <div class="well">
            <h3>
                <?php   echo$post['title'];    ?>
            </h3>
            <small> Created on <?php  echo $post['created_at'];  ?> by 
                <?php     echo $post['author'];    ?>
            </small>
            <p><?php    echo $post['body'];   ?></p>
            <a class="btn btn-default" href="post.php?id<?php  echo $post['id']; ?>">Read More</a>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>