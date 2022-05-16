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
    <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>  
    <div id="goback">
      <a href="index.php">
        <button class="button">Back</button>
      </a>
    </div>
  </header>
    <div class="signinbox">
      <h1> Sign in </h1>
      <form action="action_login.php" id="formlog" method="post" class="login">
      <div class="form-content">
        <input id="user-name" type="text" name="username" placeholder="user name" />
        <input id="password" type="password" name="password" placeholder="password" />
        </form> 
        </div>
        <span id=buttons>
          <button class="login_button" form="formlog"> Login</button>
          </br>
          <a href="register.php">
          <button class="registerbutton">Register</button>
          </a>
        </span> 
    </div> 
  <footer>
    <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
</html>