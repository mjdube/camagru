<?php
    require 'structure/header.struc.php';
?>

<?php

    
    if (isset($_SESSION['userid']))
    {
        $is_verify = intval($_SESSION['is_verified']);
        if ($is_verify == 1)
        {
            include_once 'config/database.php';

            $id_img = intval($_GET['id_img']);
            
            $sql = "SELECT * FROM images WHERE id_img = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $images = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<img src="data:image/png;base64,'.base64_encode($images['imgName']).'" alt="Your Picture" class="everyone">';
            $sql = "SELECT * FROM likes WHERE id_img = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $likes = $stmt->rowCount();
            echo
                '<form action="forms/comlike.form.php?id_img='.$images['id_img'].'" method="post">
                    <button type="submit" name="comment_submit">Comment</button>
                    <button type="submit" name="like_submit">Like('.$likes.')</button>';
                    $uid_username = $_SESSION['useruid'];
                    $sql = "SELECT uid_username FROM images WHERE id_img = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id_img]);
                    $btn = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($btn['uid_username'] == $uid_username)
                    {
                        echo '<button type="submit" name="delete_submit">Delete</button>';
                    }
                    echo '<textarea name="comment" cols="30" rows="10">Write a comment...</textarea>
                </form>';
            

            $sql = "SELECT * FROM comments WHERE id_img = ? ORDER BY commentDateTime DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            while ($comments = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div>
                        <h4>'.$comments['uid_username'].'</h4>
                        <p class="comment">'.$comments['comment'].'</p>
                    </div>';
            }
        }
    }
    else if (!isset($_SESSION['userid']))
    {
        
        include_once 'config/database.php';

        $id_img = intval($_GET['id_img']);
        
        $sql = "SELECT * FROM images WHERE id_img = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        $images = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '<img src="data:image/png;base64,'.base64_encode($images['imgName']).'" alt="Your Picture" class="everyone" width="700" height="500">';
        $sql = "SELECT * FROM likes WHERE id_img = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        $likes = $stmt->rowCount();
    
        $sql = "SELECT * FROM comments WHERE id_img = ? ORDER BY commentDateTime DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        while ($comments = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo '<div>
                    <h4>'.$comments['uid_username'].'</h4>
                    <p class="comment">'.$comments['comment'].'</p>
                </div>';
        }
    }

?>

<?php
    require 'structure/footer.struc.php';
?>