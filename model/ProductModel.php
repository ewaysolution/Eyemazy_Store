<?php
require_once BASE_PATH . '/config/db.php';

class Product {
    private $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection;  
    }

    public function create($name,$qty, $image,$price, $description) {
        $stmt = $this->databaseConnection->prepare("INSERT INTO products (name,qty,image, price, description, active) VALUES (?, ?,?, ?,?,?)");
        $stmt->execute([$name, $qty, $image, $price, $description, 1]); 
    }

    public function read() {
        $stmt = $this->databaseConnection->query("SELECT * FROM products where active = 1"); 
        return $stmt->fetchAll();  
    }



    public function delete($id) {
        $stmt = $this->databaseConnection->prepare("UPDATE products SET active = 0 WHERE id = ?");
        $stmt->execute([$id]);  
        if ($stmt->rowCount() > 0) {
            echo "<script type='text/javascript'>alert('Product deleted successfully');</script>";
        } else {
            return false;
        }
    }
    public function update($id, $name, $price, $description) {
        $stmt = $this->databaseConnection->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $price, $description, $id]); 
    
    }
}