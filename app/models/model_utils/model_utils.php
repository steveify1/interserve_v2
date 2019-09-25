<?php
// Importing the Database class
include_once "../../config/dbh.php";

/**
 * A class of helper methods for our models
 */
class ModelUtils extends DBh
{
    // Protected variables
    // protected $conn;

    /**
     * The constructor function instantiates the database class
     */
    public function __construct()
    {
        parent::__construct();
    }


    protected function validateEmail($e)
    { }

    protected function validatePassword($p)
    { }

    /**
     * Sanitizes the user input
     */
    protected function sanitzeInput($array)
    {
        // Checking that the associative arrays is not empty
        if (!array_count_values($array)) {
            //sanitized array
            $sanitizedArray = array();
            // Loop through each of the values in the array and sanitize it
            foreach ($array as $item) {
                if ($item == "email") {
                    $sanitizedArray[$item] = FILTER_SANITIZE_STRIPPED(FILTER_VALIDATE_EMAIL($array[$item]));
                } else {
                    $sanitizedArray[$item] = FILTER_SANITIZE_STRIPPED($array[$item]);
                }
            }
        }
    }

    public function emailExists($e)
    {
        // Check DB to see if the given email($e) exists
        $sql = "SELECT * FROM users WHERE user_email=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$e]);
        print_r($stmt->fetch());
        // return boolval($stmt->rowCount());
        return $stmt->rowCount();
    }
}

$t = new ModelUtils();

echo $t->emailExists("steve");
