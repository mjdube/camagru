<?php

require 'structure/header.struc.php';

if (isset($_SESSION['userid']) && $_SESSION['is_verified'] == 1) {
    // <br><br>
    // <form action="forms/imgs.form.php" method="post">
    // </form>

    // width="400" height="300"
    // <canvas id="canvas" height="300" width="400"></canvas>
    echo '
    <div class=container>

    <div class="camera">
                    <div class="container">
                    <div class="row">
                        <video src="" id="video" width="400" height="300" class="col-md-4"></video>
                        <canvas id="canvas" height="300" width="400"class="col-md-4"></canvas>
                    </div>
                    </div> 
                </div>
                
                <div class="btns text-center">
                    <a href="#" id="capture1" class="btn btn-primary">Take</a>
                    <form action="forms/imgs.form.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="photo" name="photo">
                    <button name="photo_submit" type="submit" id="upload-btn" class="btn btn-primary">Upload</button> 
                    </form>
                    <br><br>
                    <form action="forms/imgs.form.php" method="post">
                    </form>
                </div>
                
                <div class="container">
                    <button class="btn btn-primary" onclick="addSticker(1)"> thinking </button>
                    <button class="btn btn-primary" onclick="addSticker(2)"> poo </button>
                    <button class="btn btn-primary" onclick="addSticker(3)"> android </button>
                    <button class="btn btn-primary text-center" onclick="addSticker(4)"> peacock </button>
                </div><br>
                <script type="text/javascript" src="includes/main.js"></script>
                ';

    include_once 'config/setup.php';
    // $userID = intval($_SESSION['userid']);

    $sql = "SELECT * FROM images ORDER BY imgDateTime DESC";

    if (!($stmt = $pdo->prepare($sql))) {
        header("Location: home.php");
    } else {

        $stmt->execute();
        $result = $stmt->rowCount();
        
        // var_dump($result);
        // die();

        $results_per_page = 5;
        $number_of_pages = ceil($result / $results_per_page);

        if (!(isset($_GET['page'])))
            $page = 1;
        else
            $page = $_GET['page'];

        // determine the sql LIMIT starting number for the results on the displaying page
        $this_page_first_result = ($page - 1) * $results_per_page;
        $new = intval($this_page_first_result);

        // SELECT contact_id, last_name, first_name FROM contacts WHERE website = 'TechOnTheNet.com' ORDER BY contact_id DESC LIMIT 5;
        // SELECT column_name(s)FROM table_name WHERE condition LIMIT number;
        include_once 'config/setup.php';
        // retrieve selected results from database and display them on page
        // $sql = "SELECT * FROM images LIMIT ".$new.','.$results_per_page;
        $sql = "SELECT * FROM images ORDER BY imgDateTime DESC LIMIT " . $new . "," . $results_per_page;
        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        echo '';
        
        while ($images = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image = explode(".", $images['imgName']);
            $fileActualExt = end($image);
            $allowed = array("jpg", "jpeg", "png", "gif");
            if (in_array($fileActualExt, $allowed)) {
                echo '
                <a href="comment.php?id_img=' . $images['id_img'] . '">
                                    <img src="' . $images['imgName'] . '" alt="Your Picture"  class="img-thumbnail"><br><br>
                                      </a> 
                                ';
            } else {
                $imgData = base64_encode($images['imgName']);
                echo '
                
                                    
                <a href="comment.php?id_img=' . $images['id_img'] . '">
                <img src="data:image/png;base64,' . $imgData . '" alt="Your Picture"  class="img-thumbnail"><br><br>
                </a>
                                ';
            }
        }
// <a href="comment.php?id_img=' . $images['id_img'] . '">
        echo '
        
        <div class="container">
        <nav aria-label="Page navigation example" class="text-center">
        <ul class="pagination">
        ';
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<li class="page-item"><a class="page-link" href="home.php?page=' . $page . '">' . $page . '</a></li>';
        }
        echo '
        </ul>
        </nav>
        </div>';
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
} else if (!isset($_SESSION['userid'])) {
    include_once 'config/setup.php';
    // $userID = intval($_SESSION['userid']);
    $sql = "SELECT * FROM images ORDER BY imgDateTime DESC";
    if (!($stmt = $pdo->prepare($sql))) {
        header("Location: index.php");
        exit();
    } else {
        $stmt->execute();
        $result = $stmt->rowCount();

        $results_per_page = 5;
        $number_of_pages = ceil($result / $results_per_page);

        if (!(isset($_GET['page'])))
            $page = 1;
        else
            $page = $_GET['page'];


        $this_page_first_result = ($page - 1) * $results_per_page;
        $new = intval($this_page_first_result);


        include_once 'config/setup.php';
        $sql = "SELECT * FROM images ORDER BY imgDateTime DESC LIMIT " . $new . "," . $results_per_page;
        $stmt = $pdo->prepare($sql);

        $stmt->execute();
        echo '';
        while ($images = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image = explode(".", $images['imgName']);
            $fileActualExt = end($image);
            $allowed = array("jpg", "jpeg", "png", "gif");
            if (in_array($fileActualExt, $allowed)) {
                echo '
                
                <a href="comment.php?id_img=' . $images['id_img'] . '">
                                    <img src="' . $images['imgName'] . '" alt="Your Picture"  class="img-thumbnail"><br><br>
                                      </a>   
                                ';
            } else {
                $imgData = base64_encode($images['imgName']);
                echo '
                                
                <a href="comment.php?id_img=' . $images['id_img'] . '">
                                    <img src="data:image/png;base64,' . $imgData . '" alt="Your Picture"  class="img-thumbnail"><br><br>
                                    </a>
                                
                                ';
            }
        }
        // <a href="comment.php?id_img=' . $images['id_img'] . '">
        echo '
        

        <div class="container">
        <nav aria-label="Page navigation example" class="text-center">
        <ul class="pagination">
        ';
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<li class="page-item"><a class="page-link" href="home.php?page=' . $page . '">' . $page . '</a></li>';
        }
        echo '
        </ul>
        </nav>
        </div>';
    }
} else {
    header("Location: index.php?");
    exit();
}

require 'structure/footer.struc.php';
