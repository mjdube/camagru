<?php
    require 'structure/header.struc.php';
        
        if (isset($_SESSION['userid']))
        {
            

?>

            

<?php

            
        }
        else 
        {
            header("Locatioon: index.php?");
            exit();
        }


    require 'structure/footer.struc.php';
?>