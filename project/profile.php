<?php declare(strict_types = 1);

require_once('util/session.php');
require_once('template/common.tpl.php');
$session = new Session();

drawHeaderProfile($session);
?>
  <div class="userInfo">
    <h1>Account Information</h1>
    <h2>Name: <?=$session->getName();?></h2>
    <h2>Phone: 999999999</h2>
    <h2>Address: </h2>
    <ul> 
      <li>City: </li>
      <li>Postal Code: </li>
      <li>Street: </li>
    </ul>
  </div>

<?php drawFooter() ?>