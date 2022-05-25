<?php declare(strict_types = 1); 
  require_once('util/session.php');?>

<?php function drawNamedButton(Session $session) { ?>

  <div id="signup">
        <a href="profile.php">
        <button class="button"><?=$session->getName();?></button>
        </a>
  </div>
<?php } ?>

<?php function drawSignupButton(Session $session) { ?>
   
<div id="signup">
      <a href="login.php">
      <button class="button">Sign Up</button>
      </a>
</div>
<?php } ?>

<?php function pickCSSType(int $id_Category) { ?>
  <link href="css/fastfood_style.css" rel="stylesheet">  
<?php } ?>

<?php function drawHeaderIndex(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/index_style.css" rel="stylesheet">
    <link href="css/index_layout.css" rel="stylesheet">
  </head>
  <body>
  <header>
        <div id="logo">
        <img src="images/hasburgi.png" alt="">
        </div>

        <?php 
        if ($session->isLoggedIn()) drawNamedButton($session);
        else drawSignupButton($session);
      ?>

    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
      </div>

<?php } ?>

<?php function drawHeaderProfile(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/profile_style.css" rel="stylesheet">
    <link href="css/profile_layout.css" rel="stylesheet">
  </head>
  <body>
  <header>
        <div id="logo">
        <img src="images/hasburgi.png" alt="">
        </div>

        <?php 
        if ($session->isLoggedIn()) drawNamedButton($session);
        else drawSignupButton($session);
      ?>
    <div id="goback">
      <a href="index.php">
        <button class="button">Back</button>
      </a>
    </div>
    <div id="logout">
      <a href="/actions/action_logout.php">
      <button class="button">Logout</button>
      </a>
    </div>
    </header>

<?php } ?>

<?php function drawHeaderRestaurant(Session $session, int $id_Category) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <?php pickCSSType($id_Category)?>
    
    <link href="css/page_layout.css" rel="stylesheet">
  </head>
  <body>
  <header>
  <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>
    <?php 
        if ($session->isLoggedIn()) drawNamedButton($session);
        else drawSignupButton($session);
      ?>
    <div id="goback">
      <a href="index.php">
        <button class="button">Back</button>
      </a>
    </div>
    <div id="cart">
      <button class="button">Cart</button>
    </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>

<?php } ?>

<?php function drawHeaderLogin(Session $session) { ?>
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
<?php } ?>

<?php function drawFooter() { ?>
  <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
  </html>
<?php } ?>