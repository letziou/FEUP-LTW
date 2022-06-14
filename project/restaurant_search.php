<?php
  declare(strict_types = 1);

  require_once('util/session.php');
  $session = new Session();

    require_once('database/connection.db.php');
    require_once('database/image.class.php');
    require_once('database/restaurant.class.php');
    require_once('template/restaurant.tpl.php');
    require_once('template/common.tpl.php');

    $db = getDatabaseConnection();

    $search = $_GET['search'];
   

    $restaurants = Restaurant::searchRestaurants($db, $search);
    echo sizeof($restaurants);
    
    drawHeaderRestaurantCat($session,1);
    drawRestaurants($restaurants);
    drawFooter();
    
 
?>