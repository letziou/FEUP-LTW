<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  $db = getDatabaseConnection();

  $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

  if ($user) {
    $session->setId_User($user->id_User);
    $session->setName($user->fullName());
    $session->addMessage('Success', 'Welcome Back!');
    header('Location: /../index.php');
  } else {
    $session->addMessage('Error', 'Wrong Password');
    header('Location: /../login.php');
  }


?>