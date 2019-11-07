<?php
    require 'structure/header.struc.php';

    
        if (isset($_SESSION['userid']))
        {
            ?>
            
                <a href="editprofile.php">
                <div class="profile-pic">

                </div>
                </a>
            
            <h3 class="profile-username"> </h3>
            <?php
            echo '<div>';
            include_once 'config/database.php';
            $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM images ORDER BY orderImg DESC";
            if (!($stmt = $pdo->prepare($sql)))
            {
                echo "SQL error 3";
            }
            else 
            {
        //         mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);
        // while ($row = mysqli_fetch_assoc($result))
        // {
        //     echo '<a href="">
        //     <div style="background-image: url(img/gallery/'.$row['imgFullNameGallery'].');height:500px;">
        //         <h3>'.$row['titleGallery'].'</h3>
        //         <p>'.$row['descGallery'].'</p>
        //     </div>
        // </a>';
        // }
                $stmt->execute();
                // $results = $stmt->fetch(PDO::FETCH_ASSOC);
                // while ($rowCount = $stmt->rowCount())
                // {
                //     echo '<a href="">
                //         <div style="background-image: url(uploads/'.$row['imgFullNameGallery'].');height:500px;">
                //             <h3>'.$row['titleGallery'].'</h3>
                //             <p>'.$row['descGallery'].'</p>
                //         </div>
                //     </a>';
                //     $rowCount--;
                // }
                while ($results = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo '
                    <div class="container-profile">
                        <div class="box">
                            <a href="">
                                <div style="background-image: url(uploads/'.$results['imgName'].');height:500px;">
                                    <p>'.$results['descGallery'].'</p>
                                </div>
                            </a>
                        </div>
                     </div>
                     ';
                }
            }
        
            echo '</div>
            <form action="forms/imgs.form.php" method="post" enctype="multipart/form-data">
            <input type="text" name="imgName">
            <input type="file" name="file">
            <input type="submit" value="UPLOAD" name="submit">
            </form>';
        }
        else
        {
            header("Location: index.php");

        }
    require 'structure/footer.struc.php';
?>