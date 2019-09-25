<!--    connecting to the database-->
<?php
$server         = "localhost";

$username       = "root";

$password           = "";

$database       = "instantinfodb";


try {
    $connection = mysqli_connect($server, $username, $password, $database);
    if($connection) {
//        echo "Database connection was successful";
    } 
} catch (Exception $errormsg) {
    echo $errormsg->getMessage();
}

?>
