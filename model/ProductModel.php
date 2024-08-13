<?php
require_once BASE_PATH . '/config/db.php';

class Product {
    private $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection; // Assign the connection to the class property
    }

    public function create($name,$qty, $image,$price, $description) {
        $stmt = $this->databaseConnection->prepare("INSERT INTO products (name,qty,image, price, description) VALUES (?, ?,?, ?,?)");
        $stmt->execute([$name, $qty, $image, $price, $description]); // Execute the prepared statement with bound parameters
    }

    public function read() {
        $stmt = $this->databaseConnection->query("SELECT * FROM products"); // Execute a query to fetch all products
        return $stmt->fetchAll(); // Fetch all results as an associative array
    }



    public function delete($id) {
        $stmt = $this->databaseConnection->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]); // Execute the prepared statement to delete a product
        if ($stmt->rowCount() > 0) {
            echo "<script type='text/javascript'>alert('Product deleted successfully');</script>";
        } else {
            return false;
        }
    }
    public function update($id, $name, $price, $description) {
        $stmt = $this->databaseConnection->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $price, $description, $id]); // Execute the prepared statement to update a product
    
    }
}