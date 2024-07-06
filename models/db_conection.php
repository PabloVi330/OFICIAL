<?php
class DBConnection {
    private $host = "localhost";
    private $dbname = "uruz2";
    private $username = "root";
    private $password = "";
    
    private static $instance = null;
    private $connection;
  
    private function __construct() {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DBConnection();
        }
        return self::$instance->connection;
    }
}
?>
