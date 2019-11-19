<?php
    require 'structure/header.struc.php';

    
        if (isset($_SESSION['userid']) && $_SESSION['is_verified'] == 1)
        {
            ?>
            <a href="editprofile.php"></a>
            <!--  Display username -->
            <h3 class="profile-username">Username</h3>
            <a href="editprofile.php">Edit Profile</a>
            <?php
            echo '<div>';
            include_once 'config/database.php';
            $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $uid_username = $_SESSION['useruid'];
            $sql = "SELECT * FROM images WHERE uid_username = ? ORDER BY imgDateTime DESC";
            if (!($stmt = $pdo->prepare($sql)))
            {
                echo "SQL error 3";
            }
            else 
            {
                $stmt->execute([$uid_username]);
                while ($images = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $image = explode(".", $images['imgName']);
                    $fileActualExt = end($image);
                    $allowed = array("jpg", "jpeg", "png","gif");
                    if (in_array($fileActualExt, $allowed))
                    {
                        echo '
                            <div class="box" height="500" width="900" >
                                <a href="comment.php?id_img='.$images['id_img'].'">
                                <img src="'.$images['imgName'].'" alt="Your Picture" class="everyone"><br><br>
                                </a>
                            </div>';
                    }
                    else 
                    {
                        $imgData = base64_encode($images['imgName']);
                        echo '
                            <div class="box" height="500" width="900" >
                                <a href="comment.php?id_img='.$images['id_img'].'">
                                <img src="data:image/png;base64,'.$imgData.'" alt="Your Picture" class="everyone"><br><br>
                                </a>
                            </div>';
                    }
                }
 
            }
            echo '</div>
            <form action="forms/imgs.form.php" method="post" enctype="multipart/form-data">
            <input type="text" name="imgName">
            <input type="file" name="file" required>
            <button type="submit" name="submit">Upload</button>
            </form>';
        }
        else
        {
            header("Location: index.php");

        }
    require 'structure/footer.struc.php';
?>


<!-- while ($results = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo '
                    <div class="container">
                        <div class="box" style="background-image: url(uploads/'.$results['imgName'].');height:100px;">
                            <a href="">
                                    <p>'.$results['descGallery'].'</p>
                            </a>
                        </div>
                     </div>
                     ';
                } -->