<?php require '../db.php';
session_start();
?>
<?php
$tittle = $_POST['tittle'];
$percentage = $_POST['percentage'];
$insert = "INSERT INTO skills (tittle, percentage) VALUES('$tittle', '$percentage')";
mysqli_query($db_connection,$insert);
$_SESSION['add']='New Skill Added';
header('location:skill.php');

?>