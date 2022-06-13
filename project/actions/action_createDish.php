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
    $id_Restaurant = $_POST['id_Restaurant'];
    //$type = $_POST['type'];
    $type = ".jpg";
    $image = $_POST['image']; 

    if (!is_dir('images')) mkdir('images');
    if (!is_dir('images/Food_Images')) mkdir('images/Food_Images');
    
    $originalFileName = "images/originals/$image";


    Image::save_newImage($db, $type, $image);
    $id_Image = $db -> lastInsertId();
    Dish::save_newDish($db, $name, (float)$price, $description, (int)$id_Restaurant, (int)$id_Image, $image);
    $id_Dish = $db -> lastInsertId();

    $newDish = Dish:: getDish($db, (int)$id_Dish);

    if ($newDish) {
      
        $session->addMessage('Success', 'Dish Created');
        header('Location: /../index.php');
      } 

?>