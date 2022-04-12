<!DOCTYPE html>
<html lang="en-US">
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
      <h2> Login </h2>
      <form action="action_login.php" method="post" class="login">
        <div id='username'>
        <input type="text" name="username" placeholder="username">
        </div>
        <div id='password'>
        <input type="password" name="password" placeholder="password">
        </div>
        <button type="submit">Login</button>
                <a href="register.php">Register here?</a>
        </form>
    <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
    </footer>
  </body>
</html>