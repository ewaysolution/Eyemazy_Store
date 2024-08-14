<?php
require_once BASE_PATH . '/config/db.php';

class Order{
    private $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection;  
    }

    public function create($user_id, $status  , $data, $total) {
 
        if(isset($user_id)) {
     
            $stmt = $this->databaseConnection->prepare("INSERT INTO orders (user_id,total, status,order_status) VALUES (?,?,?,?)");
            $stmt->execute([$user_id, '1000', $status, 0]);  

            $order_id = $this->databaseConnection->lastInsertId();
            
            //debug
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



     
    
    public function getPlacedOrders() {
        $stmt = $this->databaseConnection->query("SELECT * FROM orders");  
        return $stmt->fetchAll();  
    }
}