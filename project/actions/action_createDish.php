<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/dish.class.php');
  require_once(__DIR__ . '/../database/image.class.php');

  $db = getDatabaseConnection();

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $id_Restaurant = $_GET['id_Restaurant'];
    $type = $_POST['type'];
    $image = $_POST['image']; 

    Image::save_newImage($db, $type, $image);
    $id_Image = $db -> lastInsertId();
    Dish::save_newDish($db, $name, $price, $description, $id_Restaurant, (int)$id_Image, $image);

?>