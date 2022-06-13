<?php declare(strict_types = 1); 
  require_once('util/session.php');?>


<?php function drawProfileInfo(Session $session, User $user, Address $address) { ?>
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
  <div class="restButton">
  <a href="">
    <button>Checkout your restaurants!</button>
  </a>
  </div>
<?php } ?>