<?php
session_start();
require '../db.php';
if(isset($_POST['portfoilo'])){
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $image = $_FILES['image'];

    if($title != null && $sub_title != null){
        if($image['size'] != 0){
            $after_explode = explode('.', $image['name']);
            $extension = end($after_explode);
            $extension_type = ['jpg', 'JPG', 'jpeg', 'png', 'gif', 'webp'];
            if(in_array($extension, $extension_type)){
                if($image['size'] <= 10000000){

                    //unlink will apply here

                    $file_name = uniqid().'.'.$extension;
                    $photo_sql = "INSERT INTO portfolios(title, sub_title, image) VALUES('$title', '$sub_title', '$file_name')";

                    if($db_connection->query($photo_sql)){
                        move_uploaded_file($image['tmp_name'], '../../iawd2403//upload/portfolios/'.$file_name);
                        $_SESSION['success'] = 'Portfolio added successfully!';
                        header('location:portfolios.php');
                    }else{
                        $_SESSION['title'] = $title;
                        $_SESSION['sub_title'] = $sub_title;
                        $_SESSION['error_image'] = 'File not uploaded!';
                        header('location:portfolios.php');
                    }

                }else{
                    $_SESSION['title'] = $title;
                    $_SESSION['sub_title'] = $sub_title;
                    $_SESSION['error_image'] = 'Image must be under 10 MB.';
                    header('location:portfolios.php');
                }
            }
            else{
                $_SESSION['title'] = $title;
                $_SESSION['sub_title'] = $sub_title;
                $_SESSION['error_image'] = 'Only jpg, jpeg, png, gif, webp extension acceptable!';
                header('location:portfolios.php');
            }
        }else{
            $_SESSION['title'] = $title;
            $_SESSION['sub_title'] = $sub_title;
            $_SESSION['error_image'] = 'Upload image to continue.';
            header('location:portfolios.php');
        }
    }

 
    
}
?>