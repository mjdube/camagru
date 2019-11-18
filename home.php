<?php

    require 'structure/header.struc.php';
    
    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {        

                echo '<div class="camera">
                    <div class="booth">
                        <video src="" id="video" width="400" height="300"></video>
                        <canvas id="canvas" height="300" width="400"></canvas>
                    </div> 
                </div>
                <div class="btns">
                    <a href="#" id="capture1" class="booth-capture-button">Take</a>
                    <form action="forms/imgs.form.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="photo" name="photo">
                    <button name="photo_submit" type="submit" id="upload-btn">Upload</button> 
                    </form>
                    <br><br>
                    <form action="forms/imgs.form.php" method="post">
                    </form>
                </div>

                <div>
                    <button class="btn" onclick="addSticker(1)"> thinking </button>
                    <button class="btn" onclick="addSticker(2)"> poo </button>
                    <button class="btn" onclick="addSticker(3)"> android </button>
                    <button class="btn" onclick="addSticker(4)"> peacock </button>
                </div>

                <script type="text/javascript" src="includes/main.js"></script>
                <div class="container" height="500" width="500">';
                
                include_once 'config/database.php';
                // $userID = intval($_SESSION['userid']);
                $sql = "SELECT * FROM images ORDER BY imgDateTime DESC";
                if (!($stmt = $pdo->prepare($sql)))
                    echo "SQL error 3";
                else 
                {
                    $stmt->execute();
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

                    // $sql1 = "SELECT * FROM comments ORDER BY commentDateTime DESC";
                    // $stmt1 = $pdo->prepare($sql1);
                    // $stmt1->execute();
                    // while ($comment = $stmt1->fetch(PDO::FETCH_ASSOC))
                    // {
                    //     echo '<div>
                    //     <h4>'.$comment['uid_username'].'</h4>
                    //     <p class="comment">'.$comment['comment'].'</p>
                    //     </div>';
                    // }
                    
                    
                    // echo '
                    //         <form action="forms/comlike.form.php" method="post">
                    //             <input type="submit" name="comment_submit" value="Comment">
                    //             <input type="submit" name="like_submit" value="Like">
                    //             <textarea name="comment" id="" cols="30" rows="10">Write a comment...</textarea>
                    //         </form>';
                    
                }
                
                // <video src="" id="video" width="400" height="300"></video>
    }
    else 
    {
        header("Location: index.php?");
        exit();
    }

    require 'structure/footer.struc.php';
?>

                            <!-- $sql1 = "SELECT * FROM comments ORDER BY commentDateTime DESC";
                            $stmt1 = $pdo->prepare($sql1);
                            $stmt1->execute();
                            while ($comment = $stmt1->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '<div>
                                    <h4>'.$comment['uid_username'].'</h4>
                                    <p class="comment">'.$comment['comment'].'</p>
                                </div>';
                           }     -->    

                           <!-- <form action="forms/comlike.form.php" method="post">
                                    <input type="submit" name="comment_submit" value="Comment">
                                    <input type="submit" name="like_submit" value="Like"><br><br>
                                    <textarea name="comment" cols="30" rows="10">Write a comment...</textarea>
                                </form> -->
                           