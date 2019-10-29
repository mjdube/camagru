<?php

    if (isset($_POST['submit']))
    {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) 
        {
            if ($fileError === 0)
            {
                if ($fileSize < 1000000)
                {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDest = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header("Location: index.php?upload=success");
                }
                else
                {
                    echo "Your file is too big";
                }
            }
            else
                echo "There wass an error uploading your file";
        }
        else
        {
            echo "You can not upload files of this type!";
        }
    }