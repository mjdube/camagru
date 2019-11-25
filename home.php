<?php

    require 'structure/header.struc.php';
    
    // if (isset($_SESSION['userid']) && $_SESSION['is_verified'] == 1)
    // {        

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
                    <button name="photo_submit" type="submit" id="upload-btn" class="booth-capture-button">Upload</button> 
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
                $results_per_page = 5;

                if (!($stmt = $pdo->prepare($sql)))
                {
                    header("Location: home.php");
                }
                else 
                {

                    $stmt->execute();
                    $result = $stmt->rowCount();

                    $number_of_pages = ceil($result/$results_per_page);

                    if (!isset($_GET['page']))
                        $page = 1;
                    else 
                        $page = $_GET['page'];
                    
                    // determine the sql LIMIT starting number for the results on the displaying page
                    $this_page_first_result = ($page - 1) * $results_per_page;

                    // retrieve selected results from database and display them on page
                    $sql = "SELECT * FROM images LIMIT ".$this_page_first_result.",".$results_per_page;
                    $stmt = $pdo->prepare($sql);
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
                    
                    for ($page = 1; $page <= $number_of_pages; $page++)
                    {
                        echo '<a href="home.php?page="'.$page.'>'.$page.'</a>';
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
    // }
    // else if (!isset($_SESSION['userid']))
    // {
    //             include_once 'config/setup.php';
    //             // $userID = intval($_SESSION['userid']);
    //             $sql = "SELECT * FROM images ORDER BY imgDateTime DESC";
    //             if (!($stmt = $pdo->prepare($sql)))
    //             {
    //                 header("Location: index.php");
    //                 exit();
    //             }
    //             else 
    //             {
    //                 $stmt->execute();
    //                 while ($images = $stmt->fetch(PDO::FETCH_ASSOC))
    //                 {
    //                     $image = explode(".", $images['imgName']);
    //                     $fileActualExt = end($image);
    //                     $allowed = array("jpg", "jpeg", "png","gif");
    //                     if (in_array($fileActualExt, $allowed))
    //                     {
    //                         echo '
    //                             <div class="box" height="500" width="900" >
    //                                 <a href="comment.php?id_img='.$images['id_img'].'">
    //                                 <img src="'.$images['imgName'].'" alt="Your Picture" class="everyone"><br><br>
    //                                 </a>
    //                             </div>';
    //                     }
    //                     else 
    //                     {
    //                         $imgData = base64_encode($images['imgName']);
    //                         echo '
    //                             <div class="box" height="500" width="900" >
    //                                 <a href="comment.php?id_img='.$images['id_img'].'">
    //                                 <img src="data:image/png;base64,'.$imgData.'" alt="Your Picture" class="everyone"><br><br>
    //                                 </a>
    //                             </div>';
    //                     }
    //                 }
    //             }
    // }
    // else 
    // {
    //     header("Location: index.php?");
    //     exit();
    // }

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
                           