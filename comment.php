<?php
    require 'structure/header.struc.php';
?>


<?php

    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {
        
        include_once 'config/database.php';

        $id_img = intval($_GET['id_img']);
        
        $sql = "SELECT * FROM images WHERE id_img = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        $images = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '<img src="data:image/png;base64,'.base64_encode($images['imgName']).'" alt="Your Picture" class="everyone">';

        echo
            '<form action="forms/comlike.form.php?id_img='.$images['id_img'].'&like_id=" method="post">
                <input type="submit" name="comment_submit" value="Comment">
                <input type="submit" name="like_submit" value="Like"><br><br>
                <textarea name="comment" cols="30" rows="10">Write a comment...</textarea>
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

?>

<?php
    require 'structure/footer.struc.php';
?>