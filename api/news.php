<?php
class News { 
    private $conn;
 
    public $id;
    public $title;
    public $time;
    public $text;
 
    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT *
            FROM news";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    function create(){
        $query = "INSERT INTO news
            SET title=:title, time=:time, text=:text";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":text", $this->text);

        if(!$stmt->execute()) {
            echo "[\"ERR\", \"Operácia zlyhala\"]";
        } else {
            echo "[\"OK\", \"Novinka bola pridaná\"]";
        }
    }

    function update(){
        $query = "UPDATE news
            SET title=:title, time=:time, text=:text
            WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":id", $this->id);

        if(!$stmt->execute()) {
            echo "[\"ERR\", \"Operácia zlyhala\"]";
        } else {
            echo "[\"OK\", \"Novinka bola upravená\"]";
        }
    }

    function delete(){
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":id", $this->id);

        if(!$stmt->execute()){
            echo "[\"ERR\", \"Operácia zlyhala\"]";
        } else {
            echo "[\"OK\", \"Novinka zmazaná\"]";
        }
   }
}
?>