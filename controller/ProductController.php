<?php
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/model/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct($databaseConnection) {
        $this->productModel = new Product($databaseConnection);
    }

    public function handleRequest() {
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['add_products'])) {
                 $this-> productModel->create($_POST['name'], $_POST['qty'], $_POST['image'], $_POST['price'], $_POST['description']);
                }elseif (isset($_POST['delete_product'])) {
                        $this->productModel->delete($_POST['product_id']);
                        
                    }
      
            // if (isset($_POST['create'])) {
            //     $this->productModel->create($_POST['name'], $_POST['price'], $_POST['description']);
            // } elseif (isset($_POST['update'])) {
            //     $this->productModel->update($_POST['id'], $_POST['name'], $_POST['price'], $_POST['description']);
            // } 
       
            
            // }
        }
        return $this->productModel->read();
    }
}