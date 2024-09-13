<?php require '../db.php';
session_start();
$image = $_FILES['about_image'];


$select = " SELECT * FROM abouts WHERE id=1";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);



$after_explode = explode('.', $image['name']);
$extension = end($after_explode);
$allowed_extension = array('png','jpg');

if (in_array($extension, $allowed_extension)) {
    if ($image['size'] <= 1000000) {
        $delete_from = '../upload/about/'.$after_assoc['image']; 
        unlink($delete_from);
        $file_name = uniqid() . '.' . $extension;
        $new_location = '../upload/about/' . $file_name;
        move_uploaded_file($image['tmp_name'], $new_location);
        $update = "UPDATE abouts SET image='$file_name' WHERE id=1"; 
        mysqli_query($db_connection, $update);
        header('location:about.php');

    } else {
        $_SESSION['errr'] = 'Logo Size max 1MB'; 
        header('location:about.php?id');
    }

}
 else {
    $_SESSION['errr'] = 'Only PNG format is allowed'; 
    header('location:about.php');
}

?>