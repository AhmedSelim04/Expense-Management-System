<?php
class Users{
    private $conn;
    private $table ="users";
    
    public function __construct($db){
        $this->conn = $db;
    }
    public function findByEmail($email) {
        
        $query = "SELECT * FROM " . $this->table 
                . " WHERE email = :email";
        
        $stmt = $this->conn->prepare($query);
        
        $email_ = htmlspecialchars(strip_tags($email));
        
        $stmt->bindParam(':email', $email_);
        
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}