<?php
session_start();
require '../db.php';
$id = $_GET['id'];
$select = "SELECT status FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$affter_assoc = mysqli_fetch_assoc($select_res);

if($affter_assoc['status']==1){
    $update = "UPDATE skills SET status=0 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['status']='Skill Deactive';
    header('location:skill.php');
}
else{
    $update = "UPDATE skills SET status=1 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['status']='Skill Acitved ';
    header('location:skill.php');
}
?>