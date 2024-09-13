<?php
require '../db.php';
session_start();
$id  = $_GET['id'];
$delete = "DELETE FROM services WHERE id = $id";

if($db_connection->query($delete)){
    $_SESSION['delete_success'] = 'Successfully deleted!';
    header('location:service.php');
}
else{
    $_SESSION['delete_error'] = 'Not delete!';
    header('location:service.php');
}
?>