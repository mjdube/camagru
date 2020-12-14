<?php
    require 'structure/header.struc.php';

    
        if (isset($_SESSION['userid']) && $_SESSION['is_verified'] == 1)
        {
            ?>
            <a href="editprofile.php"></a>
            <!--  Display username -->
            <h1 class="display-3 text-center"><?php echo $_SESSION['useruid']?></h1>
            <a href="editprofile.php" class="text-center">Edit Profile</a>
            <?php
            echo '<div class="container">';
            include_once 'config/setup.php';
            $user_id = intval($_SESSION['userid']);
            // $uid_username = $_SESSION['useruid'];
            $sql = "SELECT * FROM images WHERE id = ? ORDER BY imgDateTime DESC";
            if (!($stmt = $pdo->prepare($sql)))
            {
                header("Location: profile.php");
                exit();
            }
            else 
            {
                $stmt->execute([$user_id]);
                $result = $stmt->rowCount();
                    
                $results_per_page = 5;
                $number_of_pages = ceil($result/$results_per_page);
                    
                if (!(isset($_GET['page'])))
                    $page = 1;
                else 
                    $page = $_GET['page'];
                    
           
                $this_page_first_result = ($page - 1) * $results_per_page;
                $new = intval($this_page_first_result);
                    

                include_once 'config/setup.php';
                $sql = "SELECT * FROM images WHERE id = ? ORDER BY imgDateTime DESC LIMIT ".$new.",".$results_per_page;
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$user_id]);
                while ($images = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $image = explode(".", $images['imgName']);
                    $fileActualExt = end($image);
                    $allowed = array("jpg", "jpeg", "png","gif");
                    if (in_array($fileActualExt, $allowed))
                    {
                        echo '
                            
                                <a href="comment.php?id_img='.$images['id_img'].'">
                                <img src="'.$images['imgName'].'" alt="Your Picture" class="img-thumbnail">
                                </a>
                            ';
                    }
                    else 
                    {
                        $imgData = base64_encode($images['imgName']);
                        echo '
                            
                                <a href="comment.php?id_img='.$images['id_img'].'">
                                <img src="data:image/png;base64,'.$imgData.'" alt="Your Picture" class="img-thumbnail" width="700" height="500" ><br><br>
                                </a>
                            ';
                    }
                }
                
                echo '
        

        <div class="container">
        <nav aria-label="Page navigation example" class="text-center">
        <ul class="pagination">
        ';
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<li class="page-item"><a class="page-link" href="profile.php?page=' . $page . '">' . $page . '</a></li>';
        }
        echo '
        </ul>
        </nav>
        </div>';
 
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
            exit();
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