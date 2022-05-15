<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/login_style.css" rel="stylesheet">
    <link href="css/login_layout.css" rel="stylesheet">
    <link href="css/page_layout.css" rel="stylesheet">
  </head>
  <body>
  <header>
    <div id="logo">>
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>  
    <div id="goback">
      <a href="index.php">
        <button class="button">Back</button>
      </a>
    </div>
  </header>
  <form action="action_login.php" method="post" class="login">
    <div class="signinbox">
      <h1> Sign in </h1>
      <div class="form-content">
        <input id="user-name" type="text" name="username" placeholder="user name" />
        <input id="password" type="password" name="password" placeholder="password" />
          <button class="login_button">Login</button>
          </br>
          <a href="register.php">
          <button class="registerbutton">Register</button>
          </a>
      </div> 
    </div>
  </form>  
  <footer>
    <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
</html>