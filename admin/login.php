<?php
    include_once("./includes/admin_header.php");
    
    /**
     * Set the User to the login page if they are not logged in
     */
    if(!isset($_SESSION["admin"])) {
        // header("location: login.php");
    }
    ?>

    <!-- Page Content -->
    <h1>
        I am admin login page
    </h1>

    <!-- Page Content Ends -->

<?php
    include_once("./includes/admin_footer.php");
?>

