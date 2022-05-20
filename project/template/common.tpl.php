<?php declare(strict_types = 1); 
  require_once('util/session.php');?>

<?php function drawNamedButton(Session $session) { ?>

  <div id="signup">
        <a href="login.php">
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

<?php function drawHeaderRestaurant(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/fastfood_style.css" rel="stylesheet">
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



<?php function drawHeaderCasual() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/casual_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderDessert() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/dessert_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderFastfood() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/fastfood_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderHealthy() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/healthy_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawFooter() { ?>
  <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
  </html>
<?php } ?>