<?php declare(strict_types = 1);

require_once('database/connection.db.php');
require_once('util/session.php');
require_once('template/common.tpl.php');
require_once('database/user.class.php');
require_once('database/address.class.php');

$session = new Session();

if(!$session->isLoggedIn()) die(header('Location: /'));

$db= getDatabaseConnection();
$id_User= $session->getId_User();
$user= User::getUser($db, $id_User);

$address= Address::getAddressFromID($db, $user->id_Address);


drawHeaderProfile($session);


?>
  <div class="userInfo">
    <h1>Account Information</h1>
    <h2>Name: <?=$session->getName();?></h2>
    <h2>Phone: <?=$user->phone?></h2>
    <h2>Address: </h2>
    <ul> 
      <li>City: <?=$address->city?> </li>
      <li>Postal Code: <?=$address->postalCode?> </li>
      <li>Street: <?=$address->street?></li>
    </ul>
  </div>

<?php drawFooter() ?>