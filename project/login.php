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
  <div id="loginbox">
  <h2> Login </h2>
    <form action="action_login.php" id="formlog" method="post" class="login">
      <input type="text" name="username" placeholder="username">
        <br>
      <input type="password" name="password" placeholder="password">
        <br>
      </form>
      <span id=buttons>
          <button class="login_button" form="formlog">Login</button>
        <a href="register.php">
          <button class="registerbutton">Register Here</button>
        </a>
        </span>
  </div>
  <footer>
    <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
</html>