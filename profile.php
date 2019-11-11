<?php
    require 'structure/header.struc.php';

    
        if (isset($_SESSION['userid']) && $_SESSION['is_verified'] == 1)
        {
            ?>
            <a href="editprofile.php"></a>
            <h3 class="profile-username"> Username <------ </h3>
            <?php
            echo '<div>';
            include_once 'config/database.php';
            $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $userID = intval($_SESSION["userid"]);
            $sql = "SELECT * FROM images WHERE id = $userID ORDER BY orderImg DESC";
            if (!($stmt = $pdo->prepare($sql)))
            {
                echo "SQL error 3";
            }
            else 
            {
                $stmt->execute();
                while ($results = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo '
                    <div class="container-profile">
                        <div class="box" style="background-image: url(uploads/'.$results['imgName'].');height:100px;">
                            <a href="">
                                    <p>'.$results['descGallery'].'</p>
                            </a>
                        </div>
                     </div>
                     ';
                }
            }
            echo '</div>
            <form action="forms/imgs.form.php" method="post" enctype="multipart/form-data">
            <input type="text" name="imgName">
            <input type="file" name="file" required>
            <input type="submit" value="UPLOAD" name="submit" >
            </form>';
        }
        else
        {
            header("Location: index.php");

        }
    require 'structure/footer.struc.php';
?>