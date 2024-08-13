<?php
// Define a base path constant
define('BASE_PATH', __DIR__ . '/');

require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controller/ProductController.php';
require_once BASE_PATH . '/controller/OrderController.php';

$user_id = 001;
// $_SESSION['cart'] = [];
 
$productController = new ProductController($databaseConnection);
$products = $productController->handleRequest();
  

$orderController = new OrderController($databaseConnection);
$orders = $orderController->handleRequest();
 
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Site</title>
    <link rel="stylesheet" href="public/css/style.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="public/css/navbar.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="public/css/index.css?i=<?php echo time(); ?>">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

</head>

<body>
    <?php include 'views/header/navbar.php'; 
     
    // Initialize cart if not already
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
?>




    <div class="row">


        <div class="column">
      
            <?php foreach ($products as $product) {
                 
                echo '
             <form  method="POST">
             <input type="hidden" name="product_id" value="'.$product['id'].'">
             <input type="hidden" name="user_id" value="'.$user_id.'">
             <input type="hidden" name="qty" value="1">
             <input type="hidden" name="price" value="'.$product['price'].'">
    
                <div class="card">
                <div class="card_image">
                <img name="image" src="'.$product['image'].'"alt="Avatar">
                </div>
                <div class="card_container">
                    <div>
                        <div style="width: full; height: 40px;">
                        <h4 style=" padding-bottom: 10px;"><b>' .$product['name'] .'</b></h4>

                        </div>
                        <div>
                            <p>AED   ' .$product['price'].' </p>
                        </div>
                    </div>
                    <div class="button_container">
                    <input type="submit" value="Add To Cart" name="addToCart">
                     
                    </div>
                </div>
            </div>
            </form>
                
                
                ';
          
            } ?>






        </div>
    </div>
    </div>


</body>

</html>