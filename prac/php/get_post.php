<?php
    if (isset($_GET['name']))
    {
        $name =  htmlentities($_GET['name']);
        // echo $name;
        
        // print_r($_GET);
        // echo $_GET['email'];
    }
    /*
        if (isset($_POST['name']))
        {
            $name =  htmlentities($_POST['name']);
            echo $name;
            
            // print_r($_GET);
            // echo $_GET['email'];
        }
 
        if (isset($_REQUEST['name']))
        {
            $name =  htmlentities($_REQUEST['name']);
            echo $name;
        
            // print_r($_GET);
            // echo $_GET['email'];
        }
    */
    echo $_SERVER['QUERT_STRING']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- <form action="get_post.php" method="GET">
        <div>
            <label for="">Name</label><br>
            <input type="text" name="name" id="">
        </div>
        <div>
            <label for="">Email</label><br>
            <input type="text" name="email" id="">
        </div>
        <input type="submit" value="submit">
    </form> -->

    <form action="get_post.php" method="POST">
        <div>
            <label for="">Name</label><br>
            <input type="text" name="name" id="">
        </div>
        <div>
            <label for="">Email</label><br>
            <input type="text" name="email" id="">
        </div>
        <input type="submit" value="submit">
    </form>
    <ul>
        <li>
            <a href="get_post.php?name=">Brad</a>
        </li>
        <li>
            <a href="get_post.php?name=Steve">Steve</a>
        </li>
    </ul>
    <h1><?php echo "{$name}'s Profile" ?></h1>
</body>
</html>