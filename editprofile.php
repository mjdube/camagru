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
        '<form action="forms/edit.form.php" method="post">

            <h4>Current Username: '.$info['uid_username'].'</h4>
            <input type="text" name="username" placeholder="Change Username..."><br><br>
            <input type="password" name="current-pwd-username" placeholder="Password..."><br><br>
            <button type="submit" name="change_username">Change Username</button>
            
            <h4>Current Email: '.$info['email'].'</h4>
            <input type="email" name="email" placeholder="Change Email..."><br><br>
            <input type="password" name="current-pwd-email" placeholder="Password..."><br><br>
            <button type="submit" name="change_email">Change Email</button>

        <br><br>
            <h4>Change your password</h4>
            <input type="password" name="pwd1" placeholder="Change Password..."><br><br>
            <input type="password" name="pwd2" placeholder="Retype Password..."><br><br>
            <input type="password" name="current-pwd" placeholder="Current Password..."><br><br>
            <button type="submit" name="edit-password">Change Password</button><br><br>
            <h4>Notification Preference</h4>';
        if ($notify == 1)
        {    
            echo '
            <h5>Notification :</h5>
            <button type="submit" name="off_submit">Off</button>
             </form>';
        }
        else if ($notify == 0)
        {
            echo '
            <h5>Notification :</h5>
            <button type="submit" name="on_submit">On</button>
             </form>';
        }
    
    }
    else 
    {
        header("Location: index.php");
        exit();
    }
        require 'structure/footer.struc.php';
?>