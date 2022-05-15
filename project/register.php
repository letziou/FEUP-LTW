<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/login_style.css" rel="stylesheet">
    <link href="css/login_layout.css" rel="stylesheet">
  </head>
  <body>
  <header>
    <div id="logo">
      <a href="index.php">
        <img src="images/hasburgi2.png" alt="hasburgi logo">
      </a>
    </div>
  </header>
  <div id="loginbox">
  <h2> Register </h2>
    <form action="action_register.php" id="formreg" method="post" class="register">
      <input type="text" name="username" placeholder="username">
        <br>
      <input type="password" name="password" placeholder="password">
        <br>
      <input type="password" name="confirm_password" placeholder="confirm_password">
        <br>
      <input type="text" name="address" placeholder="address">
        <br>
      <input type="tel" name="phone" placeholder="phone">
        <br>
        </form>
        <span id=buttons>
      <button class="register_button" form="formreg">Register</button>
      <a href="login.php">
      <button class="login_button">Login Here</button>
      </a>
</span>
</div>
    <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
</html>