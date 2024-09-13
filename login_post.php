<?php 
session_start();
require 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT COUNT(*) as total FROM users WHERE email='$email'";
$query = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($query);

if($after_assoc['total'] == 1){
    $select2 = "SELECT * FROM users WHERE email='$email'";
    $query2 = mysqli_query($db_connection, $select2);
    $after_assoc2 = mysqli_fetch_assoc($query2);
    if(password_verify($password, $after_assoc2['password'])){
        $_SESSION['login_hoise'] = 'Ho ami login kore aisi';
        $_SESSION['login_id'] = $after_assoc2['id'];
        header('location:admin.php');
    }
    else{
        $_SESSION['wrong_pass'] = 'Incorrect Password!';
        header('location:login.php');
    }
}
else{
    $_SESSION['not_exist'] = 'Email Does Not Exist';
    header('location:login.php');
}



?>