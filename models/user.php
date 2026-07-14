<?php


class Users{
    private $conn;
    private $table ="users";

    public function __construct($db){
        $this->conn = $db;
    }
    
}