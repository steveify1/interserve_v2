<?php

/**
 * The database class which holds the database configuration
 */
class DBh
{
    // Define prvate properties
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    protected $pdo;

    /**
     * Object constructor
     */
    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    protected function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'interservedb';
        $this->charset = 'utf8mb4';

        //setting up db
        $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
        try {
            // Instantiating a PDO object
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Lastly, return the PDO object
            return $pdo;
        } catch (PDOException $e) {
            echo "Connetction failed: " . $e->getMessage(); 
        }
    }
}
