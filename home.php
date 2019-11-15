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
                    <a href="#" id="capture2" class="booth-capture-button">
                    <form action="forms/imgs.form.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="photo" name="photo">
                    <input type="submit" value="UPLOAD" name="photo-submit" id="upload-btn">
                    </form></a>
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
                        echo '
                            <div class="box" height="500" width="900">
                                <img src="data:image/png;base64,'.base64_encode($images['imgName']).'" alt="Your Picture">
                                <form action="'.setCommet().'" method="post">
                                    <input type="submit" name="comment_submit" value="Comment">
                                    <input type="submit" name="like_submit" value="Like">
                                    <textarea name="comment" cols="30" rows="10">Write a comment...</textarea>
                                </form>
                            </div>';
                    }
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


                           