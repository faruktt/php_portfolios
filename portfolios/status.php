<?php
require '../db.php';
session_start();
$id = $_GET['id'];
$select = "SELECT status FROM portfolios WHERE id = $id";
$result = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['status'] == 1){
    $update = "UPDATE portfolios SET status = 0 WHERE id = $id";

}
else{
    $update = "UPDATE portfolios SET status = 1 WHERE id = $id";
}

if($db_connection->query($update)){
    $_SESSION['update_success'] = 'Updated Successfully!';
    header('location:portfolios.php');
}
?>