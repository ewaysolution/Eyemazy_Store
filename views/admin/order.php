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
                <th>Product Name</th>
                <th>Qty</th>
                <th>Image</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            
            <tr>
                <td>Lois</td>
                <td>Griffin</td>
                <td><img class="prd_image"
                        src="https://eurofresh.fi/wp-content/uploads/2023/01/f9b38e_4e6486ee6b8d46e0846bc5a91e3173b0_mv2.png">
                </td>
                <td>$100</td>
                <td> <select class="dropdownList">
                        <option >Pending</option>
                        <option>Hold</option>
                        <option>Processing</option>
                        <option>Completed</option>

                    </select></td>
                <td>
                    <form action="your_script.php" method="POST">
                        <input type="submit" class="deletebtn" value="Delete">
                        <input type="submit" class="editbtn" value="Edit">
                        <input type="submit" class="updatebtn" value="Update">
                    </form>

                </td>
            </tr>

        </table>
    </div>
</body>

</html>