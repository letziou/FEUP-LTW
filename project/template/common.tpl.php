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

<?php function pickCSSType(int $id_Category) { 
  switch ($id_Category){ 
    case 1: ?>
       <link href="css/fastfood_style.css" rel="stylesheet">
       <?php break; 
    case 2: ?>
         <link href="css/casual_style.css" rel="stylesheet">
        <?php break; 
    case 3: ?>
        <link href="css/healthy_style.css" rel="stylesheet">
        <?php break; 
    case 4: ?>
        <link href="css/dessert_style.css" rel="stylesheet">
        <?php break; 
    default: ?>    
        <link href="css/fastfood_style.css" rel="stylesheet">
     <?php break;  }
 } ?>

<?php function drawHeaderIndex(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/index_style.css" rel="stylesheet">
    <link href="css/index_layout.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
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
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
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
        <i class="fa-solid fa-arrow-left button"></i>
      </a>
    </div>
    <div id="logout">
      <a href="/actions/action_logout.php">
      <button class="button">Logout</button>
      </a>
    </div>
    </header>

<?php } ?>

<?php function drawHeaderRestaurant(Session $session, int $id_Category, int $id_Restaurant, string $name) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="javascript/add_cart.js"></script> 
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
    
    <?php pickCSSType($id_Category)?>
    
    <link href="css/page_layout.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    
  </head>
  <body id="food">
  <header>
  <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>
    <?php 
        if ($session->isLoggedIn()) drawNamedButton($session);
        else drawSignupButton($session);
      ?>
    <div id="goback">
      <a href="restaurant_category.php?id=<?=$id_Category?>">
        <i class="fa-solid fa-arrow-left button"></i>
      </a>
    </div>
    <div id="cart">
      <a href="review.php?cat=<?=$id_Category?>&id=<?=$id_Restaurant?>&name=<?=$name?>">
        <button class="button">Reviews</button>
      </a>  
    </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>

<?php } ?>

<?php function drawHeaderReviews(Session $session, int $id_Category, int $id_Restaurant, string $name) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
    
    <?php pickCSSType($id_Category)?>
    
    <link href="css/review_layout.css" rel="stylesheet">
    
  </head>
  <body id="food">
  <header>
  <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>
    <?php 
        if ($session->isLoggedIn()) drawNamedButton($session);
        else drawSignupButton($session);
      ?>
    <div id="goback">
      <a href="restaurant.php?cat=<?=$id_Category?>&id=<?=$id_Restaurant?>&name=<?=$name?>">
        <i class="fa-solid fa-arrow-left button"></i>
      </a>
    </div>
    </header>
<?php } ?>

<?php function drawHeaderRestaurantCat(Session $session, int $id_Category) { ?>
  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="javascript/add_cart.js"></script> 
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
    
    <?php pickCSSType($id_Category)?>
    
    <link href="css/page_layout.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    
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
        <i class="fa-solid fa-arrow-left button"></i>
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
    <script src="javascript/add_cart.js"></script> 
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <header>
    <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>  
    <div id="goback">
      <a href="index.php">
        <i class="fa-solid fa-arrow-left button"></i>
      </a>
    </div>
  </header>
<?php } ?>

<?php function drawHeaderRegister(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/register_layout.css" rel="stylesheet">
    <link href="css/register_style.css" rel="stylesheet">
    <link href="css/page_layout.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <header>
    <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>
    <div id="goback">
      <a href="login.php">
        <i class="fa-solid fa-arrow-left button"></i>
      </a>
    </div>
  </header>
<?php } ?>

<?php function drawHeaderCart(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/register_layout.css" rel="stylesheet">
    <link href="css/register_style.css" rel="stylesheet">
    <link href="css/page_layout.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c012e79c3.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <header>
    <div id="logo">
      <img src="images/hasburgi2.png" alt="hasburgi logo">
    </div>
    <div id="goback">
      <a href="restaurant_category.php">
        <i class="fa-solid fa-arrow-left button"></i>
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