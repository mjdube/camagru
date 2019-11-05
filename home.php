<?php
    require 'structure/header.struc.php';
?>

    <?php
        if (isset($_SESSION['userid']))
        {
            ?>
            <button type="submit" name="logout">logout</button>
            <?php
            
        }
        else 
        {
            header("Locatioon: index.php?login=Errorloggedin");
            exit();
        }
    ?>

<?php
    require 'structure/footer.struc.php';
?>