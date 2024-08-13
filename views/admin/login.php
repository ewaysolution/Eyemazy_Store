<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/login.css?i=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/style.css?i=<?php echo time(); ?>">
</head>
<body>
    
<div class="login-container">
  

  <h1>Login</h1>
  <form action="your_script.php" method="POST" enctype="multipart/form-data">
      <label for="name">Email:</label>
      <input type="text" id="email" name="email" required/>
      <label for="description">Password:</label>
      <input type="text" id="email" name="email" required/>
      <input type="submit" value="Login"/>
  </form>
</div>
</body>
</html>