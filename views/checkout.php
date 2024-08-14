<?php 
// Autoload dependencies
require __DIR__ . '../../vendor/autoload.php';

// Start the session
session_start();
$session_data = $_SESSION['cart'];
// Check if 'cart' exists in session
$grandtotal = $_SESSION['grand_total'];
// Set global data variable
 

// Stripe API key
$stripe_key = 'sk_test_51PnTD92MDGIIhOk0TAks63uDzA0joZet17vKoKdw9yAYrSifiun0kih2E2vRRGnKpBYX2EkZYaWJtIj0Axj2vxmr00EJrRkNGd';
\Stripe\Stripe::setApiKey($stripe_key);

// Create Stripe Checkout Session
$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[ 
        'price_data' => [
            "currency" => "aed",
            "unit_amount" => $grandtotal*100, // amount in cents (2000 means 20.00 AED)
            "product_data" =>  [
                "name" => "Eyemazy Store",
                "images" => ["http://localhost/EyemazyStore/public/images/eyemazy.png"],
            ]
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/EyemazyStore/views/success.php',
    'cancel_url' => 'http://localhost/EyemazyStore/views/cart.php',
    'payment_method_types' => ['card']
]);

// Redirect to the Stripe payment page
header("Location: " . $checkout_session->url);
exit;
?>
