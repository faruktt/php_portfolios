<?php
require '../db.php';
session_start();

$id = $_SESSION['login_id'];
$name = $_POST['name'];
$email = $_POST['email'];

$update = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
mysqli_query($db_connection, $update);
$_SESSION['info_update'] = 'Profile Info Updated';
header('location:profile.php');

?>