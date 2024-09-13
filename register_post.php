<?php 
session_start();
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,%,&,*]@', $password);

$flag = false;

if(empty($name)){
    $flag = true;
    $_SESSION['nam_err'] = 'Please Enter Your Name';
}
else {
    $_SESSION['name'] = $name;
}

if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter Your Email';
}
else {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
        $_SESSION['email_err'] = 'Please Enter Valid Email';
        $_SESSION['email'] = $email;
    }
    else{
        $_SESSION['email'] = $email;
    }
    
}

if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter Your Password';
}
else {
    if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
        $flag = true;
        $_SESSION['pass_err'] = 'Password contains Uppercase, lowecase, number, special charecter and must me min 8 charecter';
    }
}


if(empty($confirm_password)){
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Your Confirm Password';
}
else {
    if($password != $confirm_password){
        $flag = true;
        $_SESSION['conpass_err'] = 'Password and confirm Password dose not match';
    }
}


if($flag){
    header('location:register.php');
}

else {

    $insert = "INSERT INTO users(name, email, password)VALUES('$name', '$email', '$after_hash')";
    mysqli_query($db_connection, $insert);

    $_SESSION['success'] = 'User Registration Success!';
    unset($_SESSION['name']);
    unset($_SESSION['email']); 
    header('location:login.php');    

}



?>