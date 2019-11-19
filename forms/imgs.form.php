<?php
    session_start();

    // Checking my errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SESSION['userid'])
{
    if (isset($_POST['submit']))
    {
        $newFileName = $_POST['imgName'];
        // if (empty($newFileName))
        //     $newFileName = "gallery";
        // else 
        //     $newFileName = strtolower(str_replace(" ", "-", $newFileName));

        //The actual image
        $file = $_FILES['file'];

        // Info about the image
        $fileName = $file['name'];

        // More Info about the image 
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        
        // Sepate filename into an array
        $fileExt = explode(".", $fileName);
        
        // Get The extension name
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png","gif");
        
        // Check if extension exist 
        if (in_array($fileActualExt, $allowed))
        {
            if ($fileError == 0)
            {
                if ($fileSize < 2000000)
                {
                    // Saving to the actual database <------------------
                    
                    include_once '../config/setup.php';
                    $id = intval($_SESSION['userid']);
                    $imgData = file_get_contents($fileTempName);    
                    $uid_username = $_SESSION['useruid'];
                    $sql = "INSERT INTO images (id, uid_username, imgName) VALUES (?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id, $uid_username, $imgData]);

                    // Saving to a folder  <------------------

                    // The unique file name
                    // $imageFullName = $newFileName.".".uniqid("", true).".".$fileActualExt;
                    // $fileDestination = "../uploads/".$imageFullName;
                    
                    // // Conecting to my database
                    // include_once "../config/database.php";
                    // $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
                    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // $sql = "SELECT * FROM images";
                    // if (!($stmt = $pdo->prepare($sql)))
                    // {
                    //     echo "Sql error1";
                    // }
                    // else
                    // {
                    //     $stmt->execute();
                    //     // $result = $stmt->fetch();
                    //     $sql = "INSERT INTO images (id, imgName) VALUES (?,?)";
                    //     if (!($stmt = $pdo->prepare($sql)))
                    //     {
                    //         echo "Sql error2";
                    //     }
                    //     else  
                    //     {
                    //         $stmt->execute([$_SESSION['userid'], $imageFullName, $setImgOrder]);
                    //         move_uploaded_file($fileTempName, $fileDestination);
                    //         header("Location: ../profile.php?success");
                    //     }
                    // }

                    header("Location: ../profile.php?success");
                }
                else
                {
                    echo "File is big";
                    exit();
                }
            }
            else
            {
                echo "You have an error";
                exit();
            }
        }
        else 
        {
            echo "You need to upload a proper file type";
        }
    }
    else if (isset($_POST['photo_submit']))
    {
        $img = explode(",", $_POST['photo']);
        $uid_username = $_SESSION['useruid'];
        $imgData = $img[1];
        $imgData = base64_decode($imgData);
        $id = $_SESSION['userid'];
        include_once '../config/setup.php';
        $sql = "INSERT INTO images (id, uid_username, imgName) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id, $uid_username, $imgData]);
        header("Location: ../home.php?success");
        exit();
    }
    else 
    {
        header("Location: ../home.php");
        exit();
    }
}
else 
{
    header("Location: ../index.php");
    exit();
}

//         isset($_POST['snap'])){
//         $img = explode("," ,$_POST['img']);
//         $imgdata = $img[1];
//         $imgdata = base64_decode($imgdata);
// ​
//         $sql = "INSERT INTO img (`image`) VALUES (?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->execute([$imgdata]);

//                   storing actual images on the data tuturial

// if (isset($_POST['submt']))
// {
//     $img = $_FILES['file']['name'];
//     $imgdata = file_get_contents($_FILES['file']['tmp_name']);

//     $imgType = $_FILES['file']['type'];

//     if (substr($imgType, 0, 5) == "image")
//     {
//         $sql = "INSERT INTO images VALUES ($img, $imgdata)";
//         echo "Image uploaded";
//     }
//     else 
//     {
//         echo "Only images are allowed";
//     }
// }


// // disaplaying images
// if(isset($_SESSION['id']))
// {
//     $id = $_SESSION['id'];
//     $sql = "SELECT * FROM images WHERE id = $_SESSION['id'];";

//     while ($row)
//     {
//         $imageData = $row['image'];
//         $imageType = $_FILES['file']['type'];
//     }
//     // tells the web that this page is an image page
//     header("content-type: image/$imgType");
// }
