<?php declare(strict_types = 1);

require_once('database/connection.db.php');
require_once('util/session.php');
require_once('template/common.tpl.php');
require_once('template/profile.tpl.php');
require_once('database/user.class.php');
require_once('database/address.class.php');

$session = new Session();

if(!$session->isLoggedIn()) die(header('Location: /'));

$db= getDatabaseConnection();
$id_User= $session->getId_User();
$user= User::getUser($db, $id_User);

$address= Address::getAddressFromID($db, $user->id_Address);


drawHeaderProfile($session);
drawEditProfile($session,$user,$address);
drawFooter(); 

?>