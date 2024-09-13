<?php 
session_start();
require '../db.php';
$header_logo = $_FILES['header_logo'];
$footer_logo = $_FILES['footer_logo'];

$select = " SELECT * FROM logos WHERE id=1";
$select_res = mysqli_query($db_connection, $select);
$logo_assoc = mysqli_fetch_assoc($select_res);


if ($header_logo['name'] != '') {
    $after_explode = explode('.', $header_logo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('png');

    if (in_array($extension, $allowed_extension)) {
        if ($header_logo['size'] <= 1000000) {
            $delete_from = '../upload/logo/'.$logo_assoc['header_logo']; 
            unlink($delete_from);
            $file_name = uniqid() . '.' . $extension;
            $new_location = '../upload/logo/' . $file_name;
            move_uploaded_file($header_logo['tmp_name'], $new_location);
            $update = "UPDATE logos SET header_logo='$file_name' WHERE id=1"; 
            mysqli_query($db_connection, $update);
            $_SESSION['err'] = 'update Successfuly'; 
            header('location:logo.php');


        } else {
            $_SESSION['err'] = 'Logo Size max 1MB'; 
            header('location:logo.php');
        }

    } else {
        $_SESSION['err'] = 'Only PNG format is allowed'; 
        header('location:logo.php');
    }

}



if ($footer_logo['name'] != '') {
    $after_explode = explode('.', $footer_logo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('png');

    if (in_array($extension, $allowed_extension)) {
        if ($footer_logo['size'] <= 1000000) {
            $delete_from = '../upload/logo/'.$logo_assoc['footer_logo']; 
            unlink($delete_from);
            $file_name = uniqid() . '.' . $extension;
            $new_location = '../upload/logo/' . $file_name;
            move_uploaded_file($footer_logo['tmp_name'], $new_location);
            $update = "UPDATE logos SET footer_logo='$file_name' WHERE id=1"; 
            mysqli_query($db_connection, $update);
            $_SESSION['err2'] = 'update Succesfuly'; 
            header('location:logo.php');

        } else {
            $_SESSION['err2'] = 'Logo Size max 1MB'; 
            header('location:logo.php');
        }

    } else {
        $_SESSION['err2'] = 'Only PNG format is allowed'; 
        header('location:logo.php');
    }

}


?>