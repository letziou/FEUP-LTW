<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../util/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../database/address.class.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId_User());
  $address = Address::getAddressFromID($db, (int)$user->id_Address);

    $email_new = $_POST['email'];
    $password_new = $_POST['password'];
    $password2_new = $_POST['confirm_password'];
    $street_new = $_POST['street'];
    $city_new = $_POST['city'];
    $postalCode_new = $_POST['postalCode'];
    $phone_new = $_POST['phone'];  

    if (!empty($_POST['email'])) {
        $user->email = $email_new;
    }

    if (!empty($_POST['password'])) {
        if($password_new != $password2_new ){
            $session->addMessage('Error','Passwords do not match');
            header('Location: /../edit_profile.php');
        }
        else{
            $user->save_NewPassword($db, $password_new);
        }
    }

    if (!empty($_POST['phone'])) {
        $user->phone = (int)$phone_new;
    }

    if (!empty($_POST['street'])) {
        $address->street = $street_new;
    }

    if (!empty($_POST['city'])) {
        $address->city = $city_new;
    }

    if (!empty($_POST['postalCode'])) {
        $address->postalCode = $postalCode_new;
    }


    $address->save_AddressEdit($db);
    
    $user->save_editUser($db);
    
    $newUser = User:: getUser($db, (int)$id_User);

    if ($user) {
        //$session->setId_User($user->id_User);
        //$session->setName($user->fullName());
        $session->addMessage('Success', 'Account Edited');
        header('Location: /../profile.php');
      } 

?>
