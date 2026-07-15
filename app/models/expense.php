<?php


class Expense{
    private $conn;
    private $table ="expenses";
    public function __construct($db){
        $this->conn = $db;
    }
    public function getAll($user_id) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE user_id = :user_id 
                  ORDER BY expense_date DESC, id DESC";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id, $user_id) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE id = :id AND user_id = :user_id 
                  LIMIT 1";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':user_id' => $user_id
        ]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($user_id, $amount, $category, $expense_date) {
        $query = "INSERT INTO " . $this->table . " (user_id, amount, category, expense_date) 
                  VALUES (:user_id, :amount, :category, :expense_date)";
        
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([
            ':user_id' => $user_id,
            ':amount' => $amount,
            ':category' => $category,
            ':expense_date' => $expense_date
        ]);
    }
    public function delete($id, $user_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':user_id' => $user_id
        ]);
    }
public function search($user_id, $keyword = '', $category = '', $from_date = '', $to_date = '') {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $params = [':user_id' => $user_id];

        if (!empty($keyword)) {
            $query .= " AND title LIKE :keyword";
            $params[':keyword'] = '%' . $keyword . '%';
        }

        if (!empty($category)) {
            $query .= " AND category = :category";
            $params[':category'] = $category;
        }

        if (!empty($from_date)) {
            $query .= " AND expense_date >= :from_date";
            $params[':from_date'] = $from_date;
        }

        if (!empty($to_date)) {
            $query .= " AND expense_date <= :to_date";
            $params[':to_date'] = $to_date;
        }

        $query .= " ORDER BY expense_date DESC, id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
