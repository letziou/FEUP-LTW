<?php declare(strict_types =1);

require_once('util/session.php');
$session = new Session();

require_once('database/connection.db.php');
require_once('database/restaurant.class.php');

require_once('template/common.tpl.php');
require_once('template/restaurant.tpl.php');
    

$db= getDatabaseConnection();
$dishes = Dish::getDishes($db, intval($_GET['id']));

    drawHeaderRestaurant($session, intval($_GET['id']));
    drawRestaurant($_GET['name'],$dishes);
    drawFooter();
  ?>