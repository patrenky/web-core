<?php
class Database {

    // database credentials
    private $host = "innodb.endora.cz:3306";
    private $db_name = "jttest"; // jatdb
    private $username = "jtadmin";
    private $password = "jtapiadmin";
    public $conn;
 
    // get the database connection
    public function getConnection() {
 
        $this->conn = null;
 
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>