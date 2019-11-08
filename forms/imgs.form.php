<?php
    session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_POST['submit']))
    {
        $newFileName = $_POST['imgName'];
        if (empty($newFileName))
            $newFileName = "gallery";
        else 
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));

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
        // get The extension name
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png");
        if (in_array($fileActualExt, $allowed))
        {
            if ($fileError == 0)
            {
                if ($fileSize < 2000000)
                {
                    // The unique file name
                    $imageFullName = $newFileName.".".uniqid("", true).".".$fileActualExt;
                    $fileDestination = "../uploads/".$imageFullName;
                    
                    // Conecting to my database
                    include_once "../config/database.php";
                    $pdo = new PDO($DB_dsn, $DB_USER, $DB_PASSWORD);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM images";
                    if (!($stmt = $pdo->prepare($sql)))
                    {
                        echo "Sql error1";
                    }
                    else
                    {
                        $stmt->execute();
                        // $result = $stmt->fetch();
                        $rowCount = $stmt->rowCount();
                        $setImgOrder = $rowCount + 1;
                        
                        $sql = "INSERT INTO images (id, imgName, orderImg) VALUES (?,?,?)";
                        if (!($stmt = $pdo->prepare($sql)))
                        {
                            echo "Sql error2";
                        }
                        else  
                        {
                            $stmt->execute([$_SESSION['userid'], $imageFullName, $setImgOrder]);
                            move_uploaded_file($fileTempName, $fileDestination);
                            header("Location: ../profile.php?success");
                        }
                    }
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