<?php require '../db.php';
session_start();
?>
<?php
$title = $_POST['title'];
$desp = $_POST['desp'];

$insert = "INSERT INTO services (title, desp) VALUES('$title', '$desp')";
mysqli_query($db_connection,$insert);
$_SESSION['add']='New service Added';
header('location:service.php');

?>