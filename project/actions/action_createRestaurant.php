<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/address.class.php');
  require_once(__DIR__ . '/../database/image.class.php');
  require_once(__DIR__ . '/../database/restaurant.class.php');

  $db = getDatabaseConnection();

    $name = $_POST['name'];
    $category = $_GET['category'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];
    $type = $_POST['type'];
    $image = $_POST['image'];  

    Image::save_newImage($db, $type, $image);
    $id_Image = $db -> lastInsertId();
    Address::save_newAddress($db, $city, $postalCode, $street);
    $id_Address = $db -> lastInsertId();
    Restaurant::save_newRestaurant($db, $name, $category, (int)$id_Address, (int)$id_Image, $image);
  
?>