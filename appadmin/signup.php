<?php 
    include "includes/head_top.php";
    include "includes/head_bottom.php";
    include "includes/navigation.php";
?>


<!--validating the sign up form-->
<?php
$empty_field_warning = " ";
    $response = " ";
    $username_warning = " ";
    $email_warning = " ";
    $password_warning = " ";
    $cpassword_warning = " ";

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        
        if(empty($username) or empty($email) or empty($role) or empty($password) or empty($cpassword)) {
            $empty_field_warning = "Please fill all fields.";
        }
        
        else if(strlen($username) < 4) {
            $username_warning = "Must be more than 3 characters";
        }
        
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_warning = "Please enter a valid email";
        }
        
        else if(strlen($password) < 8) {
            $password_warning = "Must be at least 8 characters";
        }
        
        else if($cpassword != $password) {
            $cpassword_warning ="Passwords don't match.";
        }
        else {
        $response = "<p class='text-success lead font-weight-bold'>" . $username . ", your account has been successfully registered.</p>";
        }
    }
?>

    <div id="admin-form-wrapper">
        <div class="col-md-6 mx-auto">
            <div id="form-wrapper" class="container p-4">
                <div id="form-header">
                    <h3 class="text-center">Create an account</h3>
                    <?php
                        echo $response;
                    ?>
                        <?php
                        echo $empty_field_warning;
                    ?>
                </div>
                <form-body>
                    <form action="signup.php" method="post" class="form">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                            <p class="form-error">
                                <?php echo $username_warning; ?>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>

                            <p class="form-error">
                                <?php echo $email_warning; ?>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" id="role" name="role" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="pass" class="form-control" required>

                            <p class="form-error">
                                <?php echo $password_warning; ?>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" id="cpassword" name="cpass" class="form-control" required>

                            <p class="form-error">
                                <?php echo $cpassword_warning; ?>
                            </p>
                        </div>

                        <input class="btn btn-success btn-sm" type="submit" name="submit" value="Register">

                        <br />
                        <p class="my-2">Already registered? <span><a href="index.php"> Sign In</a></span></p>
                    </form>
                </form-body>
            </div>
        </div>
    </div>
    <?php
    include "includes/footer.php";
?>
