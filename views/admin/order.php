<?php 
define('BASE_PATH', __DIR__ . '../../../');
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controller/ProductController.php';
require_once BASE_PATH . '/controller/OrderController.php';
 
// Instantiate the controller and handle the request
$productController = new ProductController($databaseConnection);
$products = $productController->handleRequest();

$orderController = new OrderController($databaseConnection);
$order = $orderController->handlePlaceOrders();
        //  echo '<pre>';
        // print_r( $order);
        // echo '</pre>';
 

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Site</title>
    <link rel="stylesheet" href="../../public/css/order.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/style.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/admin/navbar.css?i=<?php echo time(); ?>">
</head>

<body> <?php
    include '../header/admin/navbar.php';
    ?>



    <div class="container">


        <h1>Order</h1>
        <table>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>

            <?php foreach ($order as $order) {
                echo '
 <tr>
 <td> '. $order['id'].' </td>
 <td> '. $order['user_id'].' </td>
 <td> '. $order['total'].' </td>
 <td>';
 
 
  if($order['status'] == 1){
     echo 'Paid';
 }else{
     echo 'Unpaid';
 } 
 
 echo '</td>

 <td> <select class="dropdownList">
         <option >Pending</option>
         <option>Hold</option>
         <option>Processing</option>
         <option>Completed</option>
         <option>Cancelled</option>

     </select></td>
 <td>
 <div style="   display: flex;">

 <form method="POST">
  <div style="display: flex; margin: 10px; gap: 4px"> 
     <div>
         <button type="submit" name="edit_product" class="btn" style="cursor: pointer">
         <svg height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 32 32" xml:space="preserve">
<g>
	<g id="loop_x5F_alt1">
		<g>
			<path style="fill:#030104;" d="M26,16l-6,6h4c0,1.102-0.898,2-2,2H10c-1.102,0-2-0.898-2-2v-2H4v2c0,3.309,2.691,6,6,6h12
				c3.309,0,6-2.691,6-6h4L26,16z"/>
			<path style="fill:#030104;" d="M22,4H10c-3.309,0-6,2.691-6,6v0.062H0L6,16l6-5.938H8V10c0-1.102,0.898-2,2-2h12
				c1.102,0,2,0.898,2,2v2h4v-2C28,6.691,25.309,4,22,4z"/>
		</g>
	</g>
</g>
</svg>
         </button>
     </div>

     <div>
         <button type="submit" name="delete_product" class="btn" style="cursor: pointer">
             <svg width="20px" height="20px" viewBox="0 0 1024 1024"
                 xmlns="http://www.w3.org/2000/svg">
                 <path fill="#000000"
                     d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z" />
             </svg>
         </button>
     </div>
     </div>



 </form>
</div>

 </td>
</tr>';

            }
             ?>


        </table>
    </div>
</body>

</html>