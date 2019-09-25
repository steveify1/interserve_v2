<?php
include_once "./model_utils/model_utils.php";

/**
 * Creates the User object. It is a sub_class of the Database(DBh) class
 */
class User extends ModelUtils {

    /**
     * User Object constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create a new user
     */
    public function create($fname, $lname, $email, $password, $cpassword, $user_type) {
        // sanitize input
        
        // validate the email
        if($this->validateEmail($email)) {
            
            // validate the passwords
            if($this->validatePassword($password)) {
                //
            }

        }
        
    }
}