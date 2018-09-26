<?php

class Database {
    private $_connection;
    private static $_instance;
    //The single instance
    private $_type = DB_TYPE;
    private $_host = DB_HOST;
    private $_username = DB_USER;
    private $_password = DB_PASS;
    private $_database = DB_NAME;

    // Constructor
    private function __construct() {
        try {
            // charset =$this->_charset;
            $this -> _connection = new PDO(DB_TYPE . ":host=$this->_host;dbname=$this->_database", $this -> _username, $this -> _password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            /*** echo a message saying we have connected ***/
            
            // echo '<pre>Connected to database</pre>';
        } catch (PDOException $e) {
            echo "Connection to database failed at this time. Please consider the following: " . $e -> getMessage();
        }
    }

    /*
     Get an instance of the Database
     @return Instance
     */
    public static function getInstance() {
        if (!self::$_instance) {// If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone() {
    }

    // Get mysql pdo connection
    public function getConnection() {
        return $this -> _connection;
    }

}
?>