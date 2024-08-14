<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/login.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="../public/css/style.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="../public/css/navbar.css?i=<?php echo time(); ?>">
</head>
<body>
<?php include '../views/header/navbar.php'; 
    
    // Initialize cart if not already
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    ?>
<div style="padding: 20px">
     <p>
     Profile Page
     </p>
</div>
  
 
    </form>
</div>
</body>
</html>