<?php declare(strict_types =1);

require_once('util/session.php');
$session = new Session();


require_once('database/connection.db.php');
require_once('database/user.class.php');
require_once('database/address.class.php');

require_once('template/common.tpl.php');
require_once('template/register.tpl.php');
require_once('template/restaurant.tpl.php');

  $db= getDatabaseConnection();

  drawHeaderRegister($session); 
  ?>

  <!-- FOR TESTING PURPOSES! TODO: INCLUDE THIS IN drawSignInBox-->
  <section id="messages"> 
    <?php foreach ($session->getMessages() as $messsage) { ?>
      <article class="<?=$messsage['type']?>">
        <?=$messsage['text']?>
      </article>
    <?php } ?>
  </section>
   <!-- FOR TESTING PURPOSES! TODO: INCLUDE THIS IN drawSignInBox-->

   <?php
  drawRegisterBox($session);
  drawFooter();

?>

