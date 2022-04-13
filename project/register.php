<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
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
  <h2> Register </h2>
    <form action="action_register.php" method="post" class="register">
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
      <button type="submit">Register</button>
        <br>
      <a href="login.php">Login here</a>
    </form>
    <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
</html>