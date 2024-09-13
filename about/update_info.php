
<?php
session_start();
require '../db.php';
$designation = $_POST['designation'];
$name = $_POST['name'];
$desp = $_POST['desp'];


$update = "UPDATE abouts SET designation='$designation', name='$name', desp='$desp' WHERE id=1" ;

mysqli_query($db_connection, $update);
$_SESSION['update_info'] ='About Info Updated!';
header('location:about.php');

?>