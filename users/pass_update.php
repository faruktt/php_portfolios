
<?php
session_start();
require '../db.php';

$id = $_SESSION['login_id'];
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,%,&,*]@', $password);

$select2 = "SELECT * FROM users WHERE id=$id";
$query2 = mysqli_query($db_connection, $select2);
$after_assoc2 = mysqli_fetch_assoc($query2);

$flag = false;
if(empty($old_password)){
    $flag = true;
    $_SESSION['old_pass_err'] = 'Please Enter Current Password';
}
else{
    if(!password_verify($old_password, $after_assoc2['password'])){
        $flag = true;
        $_SESSION['old_pass_err'] = 'Please Enter Corrent Password';
    }
}


if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter New Password';
}
else {
    if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
        $flag = true;
        $_SESSION['pass_err'] = 'Password contains Uppercase, lowecase, number, special charecter and must me min 8 charecter';
    }
}
if(empty($confirm_password)){
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Confirm Password';
}
else {
    if($password != $confirm_password){
        $flag = true;
        $_SESSION['conpass_err'] = 'Password and confirm Password dose not match';
    }
}

if($flag){
    header('location:profile.php');
}

else{
    $update = "UPDATE users SET password='$after_hash' WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['pass_update'] = 'Password Changed!';
    header('location:profile.php');
}

?>