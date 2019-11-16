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
        echo '<form action="forms/edit.form.php" method="post">
            <h4>Current Username: '.$info['uid_username'].'</h4>
            <input type="text" name="username" placeholder="Change Username..."><br><br>
            <h4>Current Email: '.$info['email'].'</h4>
            <input type="email" name="email" placeholder="Change Email..."><br><br>
            <input type="password" name="current-pwd" placeholder="Password..."><br><br>
            <input type="submit" name="edit-profile" value="Change">
        <br><br><br><br>
            <input type="password" name="pwd1" placeholder="Change Password..."><br><br>
            <input type="password" name="pwd2" placeholder="Retype Password..."><br><br>
            <input type="password" name="current-pwd" placeholder="Current Password..."><br><br>
            <input type="submit" name="edit-password" value="Change Password"><br><br>
        </form>';

    
    }
    else 
    {
        header("Location: index.php");
        exit();
    }
        require 'structure/footer.struc.php';
?>