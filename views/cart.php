<?php 
define('BASE_PATH', __DIR__ . '/..');
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controller/ProductController.php';
require_once BASE_PATH . '/controller/OrderController.php';
 
// Instantiate the controller and handle the request
$productController = new ProductController($databaseConnection);
$products = $productController->handleRequest();

$orderController = new OrderController($databaseConnection);
$order = $orderController->handleRequest();
 

 

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Site</title>


    <link rel="stylesheet" href=" ../public/css/cartList.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href=" ../public/css/navbar.css?i=<?php echo time(); ?>">
</head>

<body> <?php
  
    $session_data = $_SESSION['cart'];
    include '../views/header/navbar.php';
    ?>

    <div class="container">


        <h1>Cart</h1>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Qty</th>
                <!-- <th>Image</th> -->
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>


            <?php
             
              
            foreach ($session_data as $key => $value) {
                echo "<tr >";
                echo "<td>" . $value['product_id'] . "</td>";
                echo "<td> <input class='qty' type='number' min='1' max='100' value='" . $value['qty'] . "' style='   text-align: center'> </td>";
                echo "<td>" . $value['price'] . "</td>";
                echo "<td>" . $value['total'] . "</td>";
                echo '<td style="text-align: center;">  <form action="your_script.php" method="POST">
                <input type="submit" value="Update">
                <input type="submit" value="Remove">
            </form> </td>';
                echo "</tr>";
            }
            
        ?>

            <tr>

            </tr>
            <tr>
                <td colspan="6" style="padding: 0; text-align: right;">
                    <div style="  text-align: right;">

                        <table style="width: 40%; text-align: right; margin: 0 0 0 auto; padding: 10px 0 0 0;">
                            <tr>
                                <th style="text-align: right;">Total</th>
                                <th style="text-align: right;">
                            <?php $total_cart_amount =  array_sum(array_column($session_data, 'total')); echo $total_cart_amount?>
                            </th>
                            </tr>
                            <tr>
                                <th style="text-align: right;">Shipping</th>
                                <th style="text-align: right;"><?php $shipping = 0; echo $shipping ?></th>
                            </tr>
                            <tr>
                                <th style="text-align: right;">Grand Total</th>
                                <th style="text-align: right;"><?php $total = $total_cart_amount + $shipping; echo $total ?></th>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">
                                    <form action="your_script.php" method="POST">
                                        <input type="submit" value="Checkout">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>



        </table>

    </div>























</body>

</html>