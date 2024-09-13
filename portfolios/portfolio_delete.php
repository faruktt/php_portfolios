<?php
require '../db.php';
session_start();
$id  = $_GET['id'];
$image = $_GET['image'];
$delete = "DELETE FROM portfolios WHERE id = $id";
if($db_connection->query($delete)){
    unlink('../../iawd2403/upload/portfolios/'.$image);
    $_SESSION['delete_success'] = 'Successfully deleted!';
    header('location:portfolios.php');
}
else{
    $_SESSION['delete_error'] = 'Not delete!';
    header('location:portfolios.php');
}
?>
