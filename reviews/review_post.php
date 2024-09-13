<?php
session_start();
require '../db.php';
if(isset($_POST['review'])){
    $reviewer_name = $_POST['reviewer_name'];
    $profession = $_POST['reviewer_profession'];
    $reviewer_email = $_POST['reviewer_email'];
    $reviewer_review = $_POST['reviewer_review'];
    if($reviewer_name != null && $profession != null && $reviewer_email != null && $reviewer_review != null){

        $insert = "INSERT INTO reviews(name, profession, email, review) VALUES('$reviewer_name', '$profession', '$reviewer_email', '$reviewer_review')";
        
        if($db_connection->query($insert)){
            $_SESSION['success_review'] = 'Review added successfully!';
            header('location:../index.php#review');
        }
        else{
            $_SESSION['error_review'] = 'Something went wrong!';
            header('location:../index.php#review');
        }
    }
    else{
        $_SESSION['error_review'] = 'Input blank fields!';
        header('location:../index.php#review');
    }
}
?>