<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/dish.class.php');

  $db = getDatabaseConnection();

  // continuar get dish quando, o resto das cenas fica no script.js, e no api ( seguir restivo) 
  $dish = Dish::getDish($db, intval($_GET['id_Dish']));

  echo json_encode($dish);
?>