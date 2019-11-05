<?php

    if (isset($_POST['submit']))
    {
        $newFileName = $_POST['filename'];
        if (empty($newFileName))
        {
            $newFileName = "gallery";
        }
        else 
        {
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }
        $imgTitle = $_POST['filetitle'];
        $imgDesc = $_POST['filedesc'];

        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['Error'];
        $fileSize = $file['size'];


        $fileExt = explode("." ,$fileName);
        // get The extension name
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg", "jpeg", "png");

        if (in_array($fileActualExt, $allowed))
        {
            if ($fileError == 0)
            {
                if ($fileSize < 2000000)
                {
                    $imageFullName = $newFileName.".".uniqid("", true).".".$fileActualExt;
                    $fileDestination = "../img/gallery/".$imageFullName;

                    include_once "dbh.inc.php";
                    if (empty($imgTitle) || empty($imgDesc))
                    {
                        header("Location: ../gallery.php?upload=empty");
                        exit();
                    }
                    else
                    {
                        $sql = "SELECT * FROM gallery;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {

                        }
                        else
                        {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $rowCount = mysqli_num_rows($result);
                            $setImgOrder = $rowCount + 1;

                            $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?,?,?,?)";
                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {

                            }
                            else  
                            {
                                mysqli_stmt_bind_param($stmt, "ssss", $imgTitle, $imgDesc, $imageFullName, $setImgOrder);
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTempName, $fileDestination);

                                header("Location: ../gallery.php?success");
                            }
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