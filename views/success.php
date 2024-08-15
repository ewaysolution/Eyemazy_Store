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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="message-box _success">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2> Your payment was successful </h2>
                    <p> Thank you for your payment. we will <br>
                        be in contact with more details shortly </p>

                    <a href="../index.php"><button class="btn">Home</button></a>

                </div>

            </div>
        </div>




    </div>



</body>

</html>