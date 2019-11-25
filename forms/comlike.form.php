<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    // if (isset($_SESSION['userid']))
    // {
    //     if (isset($_POST['comment_submit']))
    //     {
    //         $comment = htmlspecialchar($_POST['comment']);
    //         if (preg_match("/^[a-zA-Z]*$/", $comment))
    //         {
    //             include_once '../config/setup.php';
    //             $user = intval($_SESSION['userid']);
    //             $userid = $_SESSION['useruid'];
    //             $sql = "INSERT INTO comments (id, uid_username, comment) VALUES (?,?,?)";
    //             $stmt= $pdo->prepare($sql);
    //             $stmt->execute([$user, $userid, $comment]);
    //         }
    //     }
    // }
    if (isset($_SESSION['userid']))
    {
        $id_img = intval($_GET['id_img']);

        $id = intval($_SESSION['userid']);
        $uid_username = $_SESSION['useruid'];
        if (isset($_POST['comment_submit']))
        {
            $comment = htmlspecialchars($_POST['comment']);
            if (!empty($comment))
            {
                include_once '../config/setup.php';
                
                $sql = "INSERT INTO comments (id_img, id, uid_username, comment) VALUES (?,?,?,?)";
                $stmt= $pdo->prepare($sql);
                $stmt->execute([$id_img, $id, $uid_username, $comment]);

                $sql = "SELECT id FROM images WHERE id_img = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id_img]);
                $images = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_image = intval($images['id']);

                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute([$id_image]);
                $users = $stmt->fetch(PDO::FETCH_ASSOC);
                $user_notify = intval($users['notify']);
                $user_id = intval($users['id']);
                $user_email = $users['email'];
                if ($user_notify == 1 && $id != $user_id)
                {
                    $to = $user_email;

                    // For email Notification
                    $subject = "Notification";
                    $message = "<a href='http://localhost:8080/camagru/comment.php?id_img=$id_img'>Someone commented on your post</a>";
                    $headers = "From: sirmj.dube@gmail.com";
                    $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
                    
                    // Send to a email...
                    $mail = mail($to, $subject, $message, $headers);

                    header("Location: ../comment.php?id_img=".$id_img);
                    exit();
                }
                else 
                {
                    header("Location: ../comment.php?id_img=".$id_img);
                    exit();
                }
            }
            else 
            {
                header("Location: ../comment.php?id_img=".$id_img);
                exit();
            }
        }
        if (isset($_POST['like_submit']))
        {
            include_once '../config/setup.php';
            $user_id = intval($_SESSION['userid']);
            $sql = "INSERT INTO likes (id_img, id) VALUES (?, ?) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img, $user_id]);
            header("Location: ../comment.php?id_img=".$id_img);
            exit();
        }
        
        if (isset($_POST['delete_submit']))
        {
            include_once '../config/setup.php';
            $sql = "DELETE FROM likes WHERE id_img = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $sql = "DELETE FROM comments WHERE id_img = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            $sql = "DELETE FROM images WHERE id_img = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_img]);
            header("Location: ../home.php");
            exit();
        }
    }
    else 
    {
        header("Location: ../index.php");
        exit();
    }