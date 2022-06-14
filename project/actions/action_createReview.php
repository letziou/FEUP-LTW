<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../database/review.class.php');
  require_once(__DIR__ . '/../database/restaurant.class.php');

  $db = getDatabaseConnection();


    $text = htmlentities($_POST['comment']);
    $score = $_POST['score'];
    $id_User = $session -> getId_User();
    $fname = $session -> getFirstName();
    $lname =$session -> getLastName();
    $published= date('Y-m-d');
    $id_Restaurant = $_POST['id_Restaurant'];

    $restaurant = Restaurant:: getRestaurant($db, (int)$id_Restaurant);
    $id_Cat = $restaurant->getRestaurant_Category();
    $rName = $restaurant->getResName();

      
    Review:: save_newReview($db, (int)$id_User, (int)$id_Restaurant, $published, $text, (int)$score);
    
    $id_Review = $db -> lastInsertId();

    $newReview = Review:: getReview($db, (int)$id_Review);

    if ($newReview) {
        $session->addMessage('Success', 'Review Submitted');
        header('Location: /../review.php?cat='.$id_Cat.'&id='.$id_Restaurant.'&name='.$rName);
      } 

?>