<?php
    $_SESSION['username'] = "admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
<?php
include_once 'includes/dbh.inc.php';
    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "sql statement failed";
    }
    else 
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<a href="">
            <div style="background-image: url(img/gallery/'.$row['imgFullNameGallery'].');height:500px;">
                <h3>'.$row['titleGallery'].'</h3>
                <p>'.$row['descGallery'].'</p>
            </div>
        </a>';
        }
    }

    
?>
</div>


<?php
if (isset($_SESSION['username']))
    echo '<form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" name="filename" placeholder="File name...">
    <input type="text" name="filetitle" placeholder="Image title...">
    <input type="text" name="filedesc" placeholder="Image description...">
    <input type="file" name="file">
    <input type="submit" value="UPLOAD" name="submit">
    </form>'
?>
</body>
</html>