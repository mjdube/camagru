<?php
require 'structure/header.struc.php';
    if ($_SESSION['userid'])
    {        

                echo '<video id="video"></video>
                    <canvas id="canvas"></canvas>
                <button onclick="snap();">Take</button>';
    }
    else 
    {
        header("Location: index.php?");
        exit();
    }
require 'structure/footer.struc.php';
?>