<?php 
require __DIR__ . '../../vendor/autoload.php';

$stripe_key = 'sk_test_51PnTD92MDGIIhOk0TAks63uDzA0joZet17vKoKdw9yAYrSifiun0kih2E2vRRGnKpBYX2EkZYaWJtIj0Axj2vxmr00EJrRkNGd';
\Stripe\Stripe::setApiKey($stripe_key);

$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[ 
        'price_data' => [
            "currency" => "aed",
            "unit_amount" => 2000,
            "product_data" => [
                "name" => "T-Shirt",
            ],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/EyemazyStore/views/success.php',
    'cancel_url' => 'http://localhost/EyemazyStore/views/cart.php',
    'payment_method_types' => ['card']
]);

header("Location: " . $checkout_session->url);
?>
