<?php
if ($_SESSION['userid'])
{
    require 'structure/header.struc.php';
        
        if (isset($_SESSION['userid']))
        {
            


            
        }
        else 
        {
            header("Locatioon: index.php?");
            exit();
        }


    require 'structure/footer.struc.php';
}
else 
{
    header("Location: index.php?");
    exit();
}
?>