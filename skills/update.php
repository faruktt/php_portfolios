<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$title =  $_POST['tittle'];
$percentage = $_POST['percentage'];

$update = "UPDATE skills SET tittle='$title',percentage='$percentage' WHERE id=$id";
mysqli_query($db_connection,$update);
$_SESSION['status']='Skill upadt e';
header('location:skill.php');
