<?php
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/model/OrderModel.php';

class OrderController {
    private $orderModel;

    public function __construct($databaseConnection) {
        $this->orderModel = new Order($databaseConnection);
        
    }

    public function handleRequest() {
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
                if (isset($_POST['addToCart'])) {
                 $this-> orderModel->create($_POST['user_id'], $_POST['product_id'], $_POST['qty'], $_POST['price']);
                } 
               
       
        }
        return $this->orderModel->read();
    }
}