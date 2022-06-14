<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/dish.class.php');

  $db = getDatabaseConnection();

  $json = file_get_contents('php://input');
  $data = json_decode($json, TRUE);
  foreach($data["ids"] as $dish_id){
    $dish = Dish::getDish($db, intval($dish_id));
    //echo intval($dish);
    $session->addCart(intval($dish->dish_id));
  }   

  

  //echo($data);
  echo json_encode($dish);
  
  
?>