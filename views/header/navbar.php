 
<?php
 
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controller/ProductController.php';
require_once BASE_PATH . '/controller/OrderController.php';

$user_id = 001;
// $_SESSION['cart'] = [];
 
$productController = new ProductController($databaseConnection);
$products = $productController->handleRequest();
  

$orderController = new OrderController($databaseConnection);
$countTotalOrders = $orderController->handleCount();
echo "<script>alert($countTotalOrders)</script>";
?>


 
<div class="navbar">
    <a class="active" href="../index.php">EyemazyStore</a>
    <div style=" float: right ">
        <a href="views/cart.php">Cart</a>
        <a href="views/cart.php" style="margin: 0px; padding: 0px: top: 10px; left: 0px">[<?php echo $countTotalOrders | 0 ?>]</a>
        <a href="views/login.php">Login/Register</a>
        <a href="views/profile.php">aasim782</a>
    </div>



</div>