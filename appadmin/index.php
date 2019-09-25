<?php
    session_start();
    session_destroy();
    include "includes/head_top.php";
    include "includes/head_bottom.php";
    include "includes/navigation.php";

//    collecting E=error message
    if(isset($_GET['message'])) {
        $message = $_GET['message'];
    } else {
        $message = " ";
    }

//    collecting last admin username
    if(isset($_GET['admin'])) {
        $admin = $_GET['admin'];
    } else {
        $admin = null;
    }
?>
    <main id="main-container">

    <div id="admin-form-wrapper">
        <div class="col-md-6 mx-auto">
            <div id="form-wrapper" class="container p-4">
                <div id="form-header">
                    <h3 class="text-center">Login</h3>
                    <p class="form-error">
                        <?php echo $message; ?>
                    </p>
                </div>
                <form-body>
                    <form action="login_process.php" method="post" class="form">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo $admin ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="check" name="check"> &nbsp;
                            <label for="check">Keep me signed in.</label>
                        </div>

                        <input class="btn btn-success btn-sm" type="submit" name="submit" value="Login">

                        <br />
                        <br />
                        <!--                        <p class="my-2">Don't have an account? <span><a href="signup.php"> Sign Up</a></span></p>-->
                    </form>
                </form-body>
            </div>
        </div>
    </div>

    </main>
    <?php
    include "includes/footer.php";
?>
