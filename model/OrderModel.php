<?php
require_once BASE_PATH . '/config/db.php';

class Order{
    private $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection; // Assign the connection to the class property
    }

    public function create($user_id, $product_id ,$price, $qty) {
        $stmt = $this->databaseConnection->prepare("INSERT INTO order_tbl (user_id,product_id, price, qty) VALUES (?, ?,?,?)");
        $stmt->execute([$user_id, $product_id ,$price, $qty]); // Execute the prepared statement with bound parameters
    }

    public function read() {
        $stmt = $this->databaseConnection->query("SELECT * FROM order_tbl"); // Execute a query to fetch all products
        return $stmt->fetchAll(); // Fetch all results as an associative array
    }



    // public function delete($id) {
    //     $stmt = $this->databaseConnection->prepare("DELETE FROM order_items WHERE id = ?");
    //     $stmt->execute([$id]); // Execute the prepared statement to delete a product
    //     if ($stmt->rowCount() > 0) {
    //         echo "<script type='text/javascript'>alert('Order Item deleted successfully');</script>";
    //     } else {
    //         return false;
    //     }
    // }
    // public function update($id, $name, $price, $description) {
    //     $stmt = $this->databaseConnection->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
    //     $stmt->execute([$name, $price, $description, $id]); // Execute the prepared statement to update a product
    
    // }
}