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
                <th style="text-align: center;">Action</th>
            </tr>


            <?php
             
              
            foreach ($session_data as $key => $value) {
                echo "<tr >";
                echo "<td>" . $value['product_id'] . "</td>";
                echo "<td> <input class='qty' type='number' min='1' max='100' value='" . $value['qty'] . "' style='   text-align: center'> </td>";
                echo "<td>" . $value['price'] . "</td>";
                echo "<td>" . $value['total'] . "</td>";
                echo '<td style="text-align: center; ">  
            <form   method="POST"  >
              <div style="display: flex;">
              <div style="margin: 5px;">
              <button type="submit" name="edit_product" class="btn">
                  <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z"
                          fill="#000000" />
                  </svg>
              </button>
          </div>
             
             <div style="margin: 5px;">
              <button type="submit" name="delete_product" class="btn">
                  <svg width="20px" height="20px" viewBox="0 0 1024 1024"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill="#000000"
                          d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z" />
                  </svg>
              </button>
          </div>
              </div>
              
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
                                    <form  action="checkout.php" method="POST">
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