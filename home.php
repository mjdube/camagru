<?php
require 'structure/header.struc.php';
    if ($_SESSION['userid'] && $_SESSION['is_verified'] == 1)
    {        

                echo '
                <div class="booth">
                <video src="" id="video" width="400" height="300"></video>
                <a href="#" id="capture" class="booth-capture-button">Take</a>
                <canvas id="canvas" height="300" width="400"></canvas>
                <input type="hidden" id="photo">
                </div>
                <script type="text/javascript" src="includes/main.js"></script> 
                ';
                // <video src="" id="video" width="400" height="300"></video>
    }
    else 
    {
        header("Location: index.php?");
        exit();
    }
require 'structure/footer.struc.php';
?>
