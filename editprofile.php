<?php
    require 'structure/header.struc.php';
    
    
    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {
        require 'config/setup.php';
        $id = intval($_SESSION['userid']);
        
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        $notify = intval($info['notify']);
        echo 
        '<div class="container">
        <form action="forms/edit.form.php" method="post">

            <h4 class="text-center">Current Username: '.$info['uid_username'].'</h4>
            <input type="text" class="form-control" name="username" placeholder="Change Username..."><br>
            <input type="password" class="form-control" name="current-pwd-username" placeholder="Password..."><br>
            <button type="submit" name="change_username" class="btn btn-primary">Change Username</button>
            <br>

            <h4 class="text-center">Current Email: '.$info['email'].'</h4>
            <input type="email" name="email" class="form-control" placeholder="Change Email..."><br>
            <input type="password" name="current-pwd-email" class="form-control" placeholder="Password..."><br>
            <button type="submit" name="change_email" class="btn btn-primary">Change Email</button>

            <br>
            <h4 class="text-center">Change your password</h4>
            <input type="password" name="pwd1" class="form-control" placeholder="Change Password..."><br>
            <input type="password" name="pwd2" class="form-control" placeholder="Retype Password..."><br>
            <input type="password" name="current-pwd" class="form-control" placeholder="Current Password..."><br>
            <button class="btn btn-primary" type="submit" name="edit-password">Change Password</button><br><br>
            <h4>Notification Preference</h4>';
        if ($notify == 1)
        {    
            echo '
            <button type="submit" name="off_submit" class="btn btn-primary">Off</button>
             </form>
             </div>';
        }
        else if ($notify == 0)
        {
            echo '          
            <button type="submit" name="on_submit" class="btn btn-primary">On</button>
             </form>
             </div>';
        }
    }
    else 
    {
        header("Location: index.php");
        exit();
    }
        require 'structure/footer.struc.php';
