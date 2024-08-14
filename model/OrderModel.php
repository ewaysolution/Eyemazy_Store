<?php
require_once BASE_PATH . '/config/db.php';

class Order{
    private $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection; // Assign the connection to the class property
    }

    public function create($user_id, $status  , $data, $total) {
 
        if(isset($user_id)) {
     
            $stmt = $this->databaseConnection->prepare("INSERT INTO orders (user_id,total, status,order_status) VALUES (?,?,?,?)");
            $stmt->execute([$user_id, '1000', $status, 0]); // Execute the prepared statement with bound parameters

            $order_id = $this->databaseConnection->lastInsertId();
            
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';


            foreach ($data as $key => $value) {
                $product_id = $value['product_id'];
                $qty = $value['qty'];
                $price = $value['price'];
             
               
                $stmt = $this->databaseConnection->prepare("INSERT INTO order_items (order_id,product_id,qty,price) VALUES (?,?,?,?)");
                $stmt->execute([$order_id, $product_id, $qty, $price]); // Execute the prepared statement with bound parameters
            }

            if ($stmt->rowCount() > 0) {
                echo "<script type='text/javascript'>alert('Order placed successfully');</script>";
                $_SESSION['cart'] = [];
            } else {
                return false;
            }
          

       
      
        
        
        }

       

       


       
        return $order_id;

    }

    public function read() {
        $stmt = $this->databaseConnection->query("SELECT * FROM orders"); // Execute a query to fetch all products
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


    
    public function getPlacedOrders() {
        $stmt = $this->databaseConnection->query("SELECT * FROM orders"); // Execute a query to fetch all products
        return $stmt->fetchAll(); // Fetch all results as an associative array
    }
}