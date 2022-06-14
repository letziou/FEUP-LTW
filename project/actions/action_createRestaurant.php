<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/address.class.php');
  require_once(__DIR__ . '/../database/image.class.php');
  require_once(__DIR__ . '/../database/restaurant.class.php');

  $db = getDatabaseConnection();

    $id_Owner=$session->getId_User();
    $name = htmlentities($_POST['name']);
    $category = $_POST['category'];
    $street = htmlentities($_POST['street']);
    $city = htmlentities($_POST['city']);
    $postalCode = htmlentities($_POST['postalCode']);
    $type = ".jpg";
    $image_path = $name.$type;

    Image::save_newImage($db, $type, $image_path);
    $id_Image = $db -> lastInsertId();

    if (!is_dir('../images')) mkdir('../images');
    if (!is_dir('../images/Rest_Logos')) mkdir('../images/Rest_Logos');

    $originalFileName = "../images/Rest_Logos/$image_path";
    
    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);


    Address::save_newAddress($db, $city, $postalCode, $street);
    $id_Address = $db -> lastInsertId();
    Restaurant::save_newRestaurant($db, $name, $category, (int)$id_Address, (int)$id_Owner, (int)$id_Image);

    $id_Restaurant = $db -> lastInsertId();

    $newRest = Restaurant:: getRestaurant($db, (int)$id_Restaurant);
    
    if ($newRest) {
      
        $session->addMessage('Success', 'Restaurant Created');
        header('Location: /../index.php');
      } 
  
?>