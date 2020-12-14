<?php
require 'structure/header.struc.php';
?>
<div class="container text-center">
    <?php
    if (isset($_SESSION['userid'])) {
        $is_verify = intval($_SESSION['is_verified']);
        if ($is_verify == 1) {
            include_once 'config/database.php';

            $id_img = intval($_GET['id_img']);

            $sql = "SELECT * FROM images WHERE id_img = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $images = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '
            <img src="data:image/png;base64,' . base64_encode($images['imgName']) . '" alt="Your Picture" class="img-thumbnail text-center">
            ';

            $sql = "SELECT * FROM likes WHERE id_img = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $likes = $stmt->rowCount();

            echo
                '
                <form action="forms/comlike.form.php?id_img=' . $images['id_img'] . '" method="POST">
                
                <div class="input-group mb-3">
                <div class="input-group-prepend" id="button-addon3">
                  <button name="comment_submit" class="btn btn-outline-secondary" type="submit">Comment</button>
                  <button name="like_submit" class="btn btn-outline-secondary" type="submit">Like (' . $likes . ')</button>
                ';
            $uid_username = $_SESSION['useruid'];
            $sql = "SELECT uid_username FROM images WHERE id_img = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $btn = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($btn['uid_username'] == $uid_username) {
                echo '<button name="delete_submit" class="btn btn-outline-secondary" type="submit">Delete</button>';
            }
            echo '
                </div>
                <input name="comment" type="text" class="form-control" placeholder="Write Comment..." aria-label="Example text with two button addons" aria-describedby="button-addon3">
              </div>
              </form>';


            //BUTTONS
            // <button type="submit" name="comment_submit" class="btn btn-primary text-right" >Comment</button>
            // <button type="submit" name="like_submit" class="btn btn-primary">Like ('.$likes.')</button>

            $sql = "SELECT * FROM comments WHERE id_img = ? ORDER BY commentDateTime DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            while ($comments = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div>
                        <h4>' . $comments['uid_username'] . '</h4>
                        <p class="comment">' . $comments['comment'] . '</p>
                    </div>';
            }

            
        }
    } else if (!isset($_SESSION['userid'])) {

        include_once 'config/database.php';

        $id_img = intval($_GET['id_img']);

        $sql = "SELECT * FROM images WHERE id_img = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        $images = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '
        <img src="data:image/png;base64,' . base64_encode($images['imgName']) . '" alt="Your Picture" class="img-thumbnail">
        ';

        $sql = "SELECT * FROM likes WHERE id_img = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        $likes = $stmt->rowCount();

        $sql = "SELECT * FROM comments WHERE id_img = ? ORDER BY commentDateTime DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_img]);
        while ($comments = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div>
                    <h4>' . $comments['uid_username'] . '</h4>
                    <p class="comment">' . $comments['comment'] . '</p>
                </div>';
        }
    }
    ?>
    
</div>

<?php
require 'structure/footer.struc.php';
?>
