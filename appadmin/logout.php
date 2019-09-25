<?php
    session_start();
    $admin = $_SESSION['admin'];
    
//    redirection to the login page
    header("location: index.php?admin=$admin");
?>
