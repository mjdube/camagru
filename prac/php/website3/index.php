<?php
    // Message Vars
    $msg = '';
    $msgClass = '';

    //Check for submit 
    if (filter_has_var(INPUT_POST, 'submit'))
    {
        // GET form data
        $name =$_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Check Required Fields
        if (!empty($email) && !empty($name) && !empty($message))
        {
            // Passed
            // Check email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            {
                $msg = 'Please use a valid email';
                // $msgClass = 'alert-danger';
            }
            else
            {
                echo "PASSED";
            }
        }
        else
        {
            // Fail
            $msg = 'Please file in all fields';
            // $msgClass = 'alert-danger';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                 <a class="navbar-brand" href="index.php">My Website</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php   if ($msg != ''):  ?>
            <div class="alert <?php echo $msgClass; ?>">
                <?php echo $msgClass; ?>
            </div>
        <?php endif;?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>