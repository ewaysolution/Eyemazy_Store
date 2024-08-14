<!DOCTYPE html>
<html lang="en">
<?php 
define('BASE_PATH', __DIR__ . '/..');
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controller/ProductController.php';
require_once BASE_PATH . '/controller/OrderController.php';
 
// Instantiate the controller and handle the request
$productController = new ProductController($databaseConnection);
$products = $productController->handleRequest();

$orderController = new OrderController($databaseConnection);
$order = $orderController->place_order();
 

 

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/success.css?i=<?php echo time(); ?>">
    <title>Success</title>
</head>

<body>
    <h1 class="success">Payment successful</h1>
    <button><a href="../index.php">Home</a></button>
</body>

</html>
