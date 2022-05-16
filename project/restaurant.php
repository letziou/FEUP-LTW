<?php declare(strict_types =1);
session_start();
require_once('database/connection.db.php');
require_once('database/restaurant.class.php');

require_once('template/restaurant.tpl.php');
$db= getDatabaseConnection();?>

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
      <div id="signup">
        <button class="button">Signup</button>
      </div>
      <div id="goback">
      <a href="index.php">
        <button class="button">Back</button>
      </a>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>

    <?php
    
    $dishes = Dish::getDishes($db, intval($_GET['id']));

    drawRestaurant($_GET['name'],$dishes);
  ?>

    <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
    </footer>
  </body>
</html>