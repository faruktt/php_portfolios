<?php 
session_start();
require '../db.php';
$image = $_FILES['image'];


$select = " SELECT * FROM portfilos WHERE id=1";
$select_res = mysqli_query($db_connection, $select);
$logo_assoc = mysqli_fetch_assoc($select_res);


if ($image['name'] != '') {
    $after_explode = explode('.', $image['name']);
    $extension = end($after_explode);
    $allowed_extension = array('png');

    if (in_array($extension, $allowed_extension)) {
        if ($image['size'] <= 1000000) {
            $delete_from = '../upload/portfilos/'.$logo_assoc['image']; 
            unlink($delete_from);
            $file_name = uniqid() . '.' . $extension;
            $new_location = '../upload/portfilos/' . $file_name;
            move_uploaded_file($image['tmp_name'], $new_location);
            $update = "UPDATE portfilos SET image='$file_name' WHERE id=1"; 
            mysqli_query($db_connection, $update);
            $_SESSION['err'] = 'update Successfuly'; 
            header('location:portfilos_edit.php');


        } else {
            $_SESSION['err'] = 'Logo Size max 1MB'; 
            header('location:logo.php');
        }

    } else {
        $_SESSION['err'] = 'Only PNG format is allowed'; 
        header('location:logo.php');
    }

}
