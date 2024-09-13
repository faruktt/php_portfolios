<?php
session_start();
require '../db.php';
$id = $_GET['id'];
$select = "SELECT status FROM services WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$affter_assoc = mysqli_fetch_assoc($select_res);

if($affter_assoc['status']==1){
    $update = "UPDATE services SET status=0 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['status']='service Deactive';
    header('location:service.php');
}
else{
    $update = "UPDATE services SET status=1 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['status']='service Acitved ';
    header('location:service.php');
}
?>