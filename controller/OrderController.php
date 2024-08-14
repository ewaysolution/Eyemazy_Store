<?php
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/model/OrderModel.php';
 
session_start();

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
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'qty' => $qty,
                    'price' => $price,
                    'total' => $total,
                    'grand_total' => $total
                ];
            } 



            //session data home
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


    function place_order() {
        // Retrieve session data
        if (isset($_SESSION['cart'])) {
            $session_data = $_SESSION['cart'];
        } else {
            echo "Your cart is empty.";
            return;
        }
    
   
        // echo '<pre>';
        // print_r( $_SESSION['cart']);
        // echo '</pre>';
     
        // Iterate over session data and create order items
         // Assuming session data has only one product, accessing the first product directly
  

    // Create order
    $this->orderModel->create(1, 'completed',$_SESSION['cart'], 100);

        // $_SESSION['cart'] = [];/
        // Print success message
        // echo 'Payment successful sssssssssss';
    }

}