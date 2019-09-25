<?php
    include "dbconnection.php";
    include "includes/head_top.php";
    session_start();
    
    $admin = $_SESSION['admin'];
    if(!($admin)) {
        header("location: index.php");
    }
    
    //Querying the database for admin's information 
    $admin_detail_sql = "SELECT * FROM admin WHERE username = '$admin'";
//    running the query
    $admin_detail_query = mysqli_query($connection, $admin_detail_sql) or die();
    
    $admin_detail_array = mysqli_fetch_assoc($admin_detail_query);

//    Defining Variables for Admin
    $admin_name = $admin_detail_array['username'];
    $admin_email = $admin_detail_array['email'];
    $admin_password = $admin_detail_array['password'];

?>

    <title>Admin Panel</title>
    <?php  include "includes/head_bottom.php"; ?>
    <!--//dashboard layout-->

    <!--Dashboard Menu Bar-->
    <div id="lightbox"></div>

    <div id="top"></div>

    <!-- Header -->
    <div id="header">
        <div class="sticky-to" id="admin-nav-top">
            <a id="logo" href="http://www.Instantinfosolutions.com/"><img src="../favicon/apple-touch-icon.png" alt="instant_info_solutions_logo"></a>
            <div id="navbar-items">
                <ul id="top-nav-links">
                    <li>Welcome,
                        <?php echo ucfirst($admin_name) . "."?>
                    </li>
                </ul>
                <div class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href=""><i id="menu-button" class="fa fa-user"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-item"><a class="" href="dashboard.php">Dashboard</a></li>
                        <!--                        <li class="dropdown-item"><a class="" href="profile.php">Profile</a></li>-->
                        <li class="dropdown-item"><a class="" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Menu -->
    </div>
