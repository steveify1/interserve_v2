<?php
include "dbconnection.php";

//session
session_start();

//collecting form data
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//error msg
$msg = 'Username or password is incorrect.';
$msg2 = 'Please Enter Details.';

$sql = "SELECT password FROM admin WHERE username = '$username'";

$lquery = mysqli_query($connection, $sql) or die();

print_r($lquery);
$rows = mysqli_num_rows($lquery);


if(empty($username) or empty($password)) {
    echo "Not Found";
    session_destroy();
        header("location:index.php?message=$msg2");
} else {
    if($rows != 0) {
        $d_password = mysqli_fetch_assoc($lquery)['password'];
//        echo $d_password;
        if($d_password == $password){
            $_SESSION['admin'] = $username;
            echo "Found";
            header("location: dashboard.php");
        } else {
            session_destroy();
            echo "Still Not Found";
            header("location:index.php?message=$msg");
        }
    } else {
        echo "Naaaaah not Found";
        session_destroy();
        header("location:index.php?message=$msg");
    //    echo "Username or password is incorrect.";
    }
}

?>
