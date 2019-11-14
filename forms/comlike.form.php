<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_SESSION['userid']))
    {
        if (isset($_POST['comment_submit']))
        {
            
            $comment = $_POST['comment'];
            if (preg_match("/^[a-zA-Z ]*$/", $comment))
            {
                
                include_once '../config/setup.php';
                $user = intval($_SESSION['userid']);
                $userid = $_SESSION['useruid'];
                $sql = "INSERT INTO comments (id, uid_username, comment) VALUES (?,?,?)";
                $stmt= $pdo->prepare($sql);
                $stmt->execute([$user, $userid, $comment]);
                header("Location: ../home.php");
            }
            else 
            {
                echo 'did not comment';
            }
        }
        else if (isset($_SESSION['like_submit']))
        {

        }
        else 
        {
            echo 'didnt comment or didnt like';
        }
    }
    else 
    {
        echo 'Not allowd';
    }