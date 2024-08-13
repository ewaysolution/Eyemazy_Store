<?php
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/model/OrderModel.php';
 

class OrderController {
    private $orderModel;

    public function __construct($databaseConnection) {
        $this->orderModel = new Order($databaseConnection);
        
    }
// Initialize cart if not already
  
 
    public function handleRequest() {
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_POST['user_id'];
            $total = $_POST['price'] * $_POST['qty'];
            $status = 'Pending';
            $product_id = $_POST['product_id'];
            $qty = $_POST['qty'];
           $price = $_POST['price'] ;
    
       
  // Check if product already in cart
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['qty'] += $qty;
                $_SESSION['cart'][$product_id]['total'] = $_SESSION['cart'][$product_id]['qty'] * $_SESSION['cart'][$product_id]['price'];
            } else {
                $_SESSION['cart'][$product_id] = [
                    'product_id' => $product_id,
                    'qty' => $qty,
                    'price' => $price,
                    'total' => $total
                ];
            } 
//session data
            $session_data = $_SESSION['cart'];
          //just show session data in foreach
          foreach ($session_data as $key => $value) {
            echo  "Product ID: " . $value['product_id'] . ", Quantity: " . $value['qty'] . ", 
            Total: " . $value['total'] . ", 
            Price: " . $value['price'] . "<br>";
          }


         
            // if (isset($_POST['addToCart'])) {
            //     $order_id = $this->orderModel->create($user_id, $total, $status, $product_id ,$qty, $price);

            //     if ($order_id) {
            //         echo "Order created successfully. Order ID: " . $order_id;
            //     } else {
            //         echo "Failed to create order.";
            //     }
            // }


            
               
       
        }
        return $this->orderModel->read();
    }
}